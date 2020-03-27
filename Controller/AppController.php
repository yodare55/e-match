<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        $table = $this->getTableLocator()->get("requeststats"); // requeststatsを使う
        $data = $table->find()->select(["id" => "requeststats.id", "user_id" => "requeststats.user_id", "rq_user_id" => "requeststats.rq_user_id", "username" => "users.user_name", "rq_name" => "users2.user_name", "user_stat" => "requeststats.rq_state"])->where("users.id=requeststats.user_id and users2.id=requeststats.rq_user_id")->from("requeststats, users, (select * from users) as users2")->all();
        $this->set("rq", $data);

        if (!empty($this->request->getCookie("user_id"))) {
            $table = $this->getTableLocator()->get("users"); // usersテーブルを使う宣言
            $query = $table->get($this->request->getCookie("user_id"));
            $this->set("thumbnail", $query->pf_img);
            $this->set('username', $query->user_name);
        }
    }

    function okng()
    {
        $table = $this->getTableLocator()->get("requeststats"); // usersテーブルを使う宣言
        $id = $this->request->getQuery("id");
        $id2 = $this->request->getQuery("user_id");
        $ok = $this->request->getQuery("ok");
        $data = $table->find()->where("id=" . $id)->first();
        if ($ok == "1") {
            $data->rq_state = 2;
        } else {
            $data->rq_state = 3;
        }
        $table->save($data);
        $this->redirect(["action" => "index", "id" => $id2]);
    }
}
/* -------- R6S API -------- */
class getR6sInfo extends AppController
{
    public function getPlayerInfo($name, $id, $type)
    {
        // result array
        $playerInfo = [
            "id" => "",
            "level" => "no data",
            "rank" => "no data",
            "mmr" => "no data",
            "kd" => "no data",
            "winRate" => "0",
            "httpCode" => "",
            "return" => "true",
        ];

        if ($type === 0) { // ProfileReg
            // get id
            $url = "https://r6.api.tab.one/search/uplay/" . $name;
            $r6sInfo = $this->connectionCurl($url);
            if ($r6sInfo["return"] === false) {
                $playerInfo["httpCode"] = $r6sInfo["httpCode"];
                $playerInfo["return"] = false;

                return $playerInfo;
            }
            // Search player name
            $key = false;
            foreach($r6sInfo["players"] as $key => $value) {
                if($value["profile"]["p_name"] === $name) {
                    break;
                }
                $key = false;
            }
            $playerInfo["id"] = $key;
        } else {
            $playerInfo["id"] = $id;
        }

        // get stats
        $url = "https://r6.api.tab.one/player/" . $playerInfo["id"];
        $r6sDetailInfo = $this->connectionCurl($url);
        if ($r6sDetailInfo["return"] === false) {
            $playerInfo["httpCode"] = $r6sDetailInfo["httpCode"];
            $playerInfo["return"] = false;

            return $playerInfo;
        }

        // getRank
        $playerInfo["rank"] = $r6sDetailInfo["ranked"]["rankname"];
        // getMmr
        $playerInfo["mmr"] = $r6sDetailInfo["ranked"]["actualmmr"];
        // getKd
        $playerInfo["kd"] = $r6sDetailInfo["ranked"]["allkd"];
        // getLevel
        $playerInfo["level"] = $r6sDetailInfo["stats"]["level"];
        // getWinRate
        $playerInfo["winRate"] = $r6sDetailInfo["ranked"]["allwl"];
        // http response code
        $playerInfo["httpCode"] = $r6sDetailInfo["httpCode"];

        return $playerInfo;
    }

    private function connectionCurl($url)
    {
        $curl = curl_init($url);
        curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
        curl_close($curl);

        $jsonData = json_decode($result, true);

        if ($httpCode >= 400 || empty($jsonData)) {
            $curlResult = [
                "httpCode" => $httpCode,
                "return" => false,
            ];
            return $curlResult;
        }

        $jsonData["httpCode"] = $httpCode;
        $jsonData["return"] = true;

        return $jsonData;
    }
}

/* -------- PUBG API -------- */
class getPubgInfo extends AppController
{
    public function getPlayerInfo($name, $accountId, $seasonId, $type)
    {
        $pubgPlayerInfo = [
            "accountId" => "",
            "seasonId" => "",
            "soloRank" => "no data",
            "duoRank" => "no data",
            "sqRank" => "no data",
            "soloKd" => "no data",
            "duoKd" => "no data",
            "sqKd" => "no data",
            "soloPoints" => "no data",
            "duoPoints" => "no data",
            "sqPoints" => "no data",
            "httpCode" => "",
            "result" => "true"
        ];

        if ($type === 0) { // Profile Reg
            // getAccountId
            $url = 'https://api.pubg.com/shards/steam/players?filter[playerNames]=' . $name;
            $accountInfo = $this->getPubgData(0, $url);

            if ($accountInfo["result"] === false) {
                $pubgPlayerInfo["result"] = false;
                $pubgPlayerInfo["httpCode"] = $accountInfo["httpCode"];

                return $pubgPlayerInfo;
            }

            $pubgPlayerInfo["accountId"] = $accountInfo["accountId"];

            // getSeasonId
            $url = 'https://api.pubg.com/shards/steam/seasons';
            $seasonInfo = $this->getPubgData(1, $url);

            if ($seasonInfo["result"] === false) {
                $pubgPlayerInfo["result"] = false;
                $pubgPlayerInfo["httpCode"] = $seasonInfo["httpCode"];

                return $pubgPlayerInfo;
            }

            $pubgPlayerInfo["seasonId"] = $seasonInfo["seasonId"];
            $url = 'https://api.pubg.com/shards/pc-jp/players/' . $pubgPlayerInfo["accountId"] . '/seasons/' . $pubgPlayerInfo["seasonId"];
        } else if ($type === 1) { // Profile

            $pubgPlayerInfo["accountId"] = $accountId;
            $pubgPlayerInfo["seasonId"] = $seasonId;
            $url = 'https://api.pubg.com/shards/pc-jp/players/' . $pubgPlayerInfo["accountId"] . '/seasons/' . $pubgPlayerInfo["seasonId"];
        } else if ($type === 2) { // My Page

            $len = count($accountId);
            $url = 'https://api.pubg.com/shards/steam/seasons/' . $seasonId . '/gameMode/solo/players?filter[playerIds]=';
            for ($i = 0; $i < $len; $i++) {
                $url .= $accountId[$i] . ',';
            }
        }

        // getSeasonData
        $seasonData = $this->getPubgData(2, $url);
        if ($seasonData["result"] === false) {
            $pubgPlayerInfo["result"] = false;
            $pubgPlayerInfo["httpCode"] = $seasonData["httpCode"];

            return $pubgPlayerInfo;
        }

        if ($type !== 2) { // profile
            $pubgPlayerInfo["soloPoints"] = (int) $seasonData["data"]["attributes"]["gameModeStats"]["solo"]["rankPoints"];
            $pubgPlayerInfo["duoPoints"] = (int) $seasonData["data"]["attributes"]["gameModeStats"]["duo"]["rankPoints"];
            $pubgPlayerInfo["sqPoints"] = (int) $seasonData["data"]["attributes"]["gameModeStats"]["squad"]["rankPoints"];
            $pubgPlayerInfo["soloRank"] = $this->rankConversion($seasonData["data"]["attributes"]["gameModeStats"]["solo"]["rankPointsTitle"]);
            $pubgPlayerInfo["duoRank"] = $this->rankConversion($seasonData["data"]["attributes"]["gameModeStats"]["duo"]["rankPointsTitle"]);
            $pubgPlayerInfo["sqRank"] = $this->rankConversion($seasonData["data"]["attributes"]["gameModeStats"]["squad"]["rankPointsTitle"]);

            if ($seasonData["data"]["attributes"]["gameModeStats"]["solo"]["roundsPlayed"] === 0) {
                $pubgPlayerInfo["soloKd"] = "0";
            } else {
                $pubgPlayerInfo["soloKd"] = round($seasonData["data"]["attributes"]["gameModeStats"]["solo"]["kills"] / ($seasonData["data"]["attributes"]["gameModeStats"]["solo"]["roundsPlayed"] - $seasonData["data"]["attributes"]["gameModeStats"]["solo"]["wins"]), 2);
            }
            if ($seasonData["data"]["attributes"]["gameModeStats"]["duo"]["roundsPlayed"] === 0) {
                $pubgPlayerInfo["duoKd"] = "0";
            } else {
                $pubgPlayerInfo["duoKd"] = round($seasonData["data"]["attributes"]["gameModeStats"]["duo"]["kills"] / ($seasonData["data"]["attributes"]["gameModeStats"]["duo"]["roundsPlayed"] - $seasonData["data"]["attributes"]["gameModeStats"]["duo"]["wins"]), 2);
            }
            if ($seasonData["data"]["attributes"]["gameModeStats"]["squad"]["roundsPlayed"] === 0) {
                $pubgPlayerInfo["sqKd"] = "0";
            } else {
                $pubgPlayerInfo["sqKd"] = round($seasonData["data"]["attributes"]["gameModeStats"]["squad"]["kills"] / ($seasonData["data"]["attributes"]["gameModeStats"]["squad"]["roundsPlayed"] - $seasonData["data"]["attributes"]["gameModeStats"]["squad"]["wins"]), 2);
            }
        } else if ($type === 2) { // my page
            $pubgPlayerInfo = array();
            for ($i = 0; $i < $len; $i++) {
                $pubgPlayerInfo[$i]["username"] = $name[$i];
                $pubgPlayerInfo[$i]["accountId"] = $accountId[$i];
                $pubgPlayerInfo[$i]["seasonId"] = $seasonId;
                $pubgPlayerInfo[$i]["soloRank"] = $this->rankConversion($seasonData["data"][$i]["attributes"]["gameModeStats"]["solo"]["rankPointsTitle"]);
                $pubgPlayerInfo[$i]["rankPoints"] = (int) $seasonData["data"][$i]["attributes"]["gameModeStats"]["solo"]["rankPoints"];
            }
        }
        // Http Response Code
        $pubgPlayerInfo["httpCode"] = $seasonData["httpCode"];

        return $pubgPlayerInfo;
    }

    private function getPubgData($mode, $url)
    {
        // apiKey
        $apiKey = "apikey";

        // curlセッション初期化
        $curl = curl_init();

        // curlヘッダー情報
        $curlHeader = array(
            "Authorization: Bearer " . $apiKey,
            "Accept: application/vnd.api+json"
        );

        // curl設定情報
        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => $curlHeader
        );

        // curl実行
        curl_setopt_array($curl, $options);
        $results = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
        curl_close($curl);

        // レスポンスコード確認
        if ($httpCode >= 400) {
            $curlResult = [
                "httpCode" => $httpCode,
                "result" => false,
            ];
            return $curlResult;
        }

        $array = json_decode($results, true);

        switch ($mode) {
            case 0:
                // アカウントID取得
                $accountInfo["accountId"] = $array["data"][0]["id"];
                $accountInfo["httpCode"] = $httpCode;
                $accountInfo["result"] = true;

                return $accountInfo;

            case 1:
                // 最新のシーズンID取得
                $seasonInfo["seasonId"] = $array["data"][count($array["data"]) - 1]["id"];
                $seasonInfo["httpCode"] = $httpCode;
                $seasonInfo["result"] = true;

                return $seasonInfo;

            case 2:
                // プレイヤーステータス情報取得
                $array["httpCode"] = $httpCode;
                $array["result"] = true;

                return $array;
        }
    }

    private function rankConversion($rankPointsTitle)
    {
        switch ($rankPointsTitle) {
            case 0:
                $rankTitle = "UnRanked";
                return $rankTitle;
                break;
            case "1-5":
                $rankTitle = "Beginner 5";
                return $rankTitle;
                break;
            case "1-4":
                $rankTitle = "Beginner 4";
                return $rankTitle;
                break;
            case "1-3":
                $rankTitle = "Beginner 3";
                return $rankTitle;
                break;
            case "1-2":
                $rankTitle = "Beginner 2";
                return $rankTitle;
                break;
            case "1-1":
                $rankTitle = "Beginner 1";
                return $rankTitle;
                break;
            case "2-5":
                $rankTitle = "Novice 5";
                return $rankTitle;
                break;
            case "2-4":
                $rankTitle = "Novice 4";
                return $rankTitle;
                break;
            case "2-3":
                $rankTitle = "Novice 3";
                return $rankTitle;
                break;
            case "2-2":
                $rankTitle = "Novice 2";
                return $rankTitle;
                break;
            case "2-1":
                $rankTitle = "Novice 1";
                return $rankTitle;
                break;
            case "3-5":
                $rankTitle = "Experienced 5";
                return $rankTitle;
                break;
            case "3-4":
                $rankTitle = "Experienced 4";
                return $rankTitle;
                break;
            case "3-3":
                $rankTitle = "Experienced 3";
                return $rankTitle;
                break;
            case "3-2":
                $rankTitle = "Experienced 2";
                return $rankTitle;
                break;
            case "3-1":
                $rankTitle = "Experienced 1";
                return $rankTitle;
                break;
            case "4-5":
                $rankTitle = "Skilled 5";
                return $rankTitle;
                break;
            case "4-4":
                $rankTitle = "Skilled 4";
                return $rankTitle;
                break;
            case "4-3":
                $rankTitle = "Skilled 3";
                return $rankTitle;
                break;
            case "4-2":
                $rankTitle = "Skilled 2";
                return $rankTitle;
                break;
            case "4-1":
                $rankTitle = "Skilled 1";
                return $rankTitle;
                break;
            case "5-5":
                $rankTitle = "Specialist 5";
                return $rankTitle;
                break;
            case "5-4":
                $rankTitle = "Specialist 4";
                return $rankTitle;
                break;
            case "5-3":
                $rankTitle = "Specialist 3";
                return $rankTitle;
                break;
            case "5-2":
                $rankTitle = "Specialist 2";
                return $rankTitle;
                break;
            case "5-1":
                $rankTitle = "Specialist 1";
                return $rankTitle;
                break;
            case "6-0":
                $rankTitle = "Survivor";
                return $rankTitle;
                break;
            case "7-0":
                $rankTitle = "Lone Survivor";
                return $rankTitle;
                break;
        }
    }
}

class getLolInfo extends AppController
{
    public function getLolInfo($name, $summonerId, $type)
    {
        $lolPlayerInfo = [
            "summonerId" => "",
            "accountId" => "",
            "soloRank" => "no data",
            "leaguePoints" => "no data",
            "winRate" => "0",
            "wins" => "",
            "losses" => "",
            "httpCode" => "",
            "result" => "true",
        ];

        if (empty($name)) {
            return $lolPlayerInfo;
        }

        $apiKey = 'apikey'; // ApiKey

        if ($type === 0) {
            // getSummonerId and getLevel
            $url = 'https://jp1.api.riotgames.com/lol/summoner/v4/summoners/by-name/' . $name . '?api_key=' . $apiKey;
            $summonerInfo = $this->getLolData(0, $url);
            if ($summonerInfo["result"] === false) {
                $lolPlayerInfo["result"] = false;
                $lolPlayerInfo["httpCode"] = $summonerInfo["httpCode"];

                return $lolPlayerInfo;
            }

            $lolPlayerInfo["summonerId"] = $summonerInfo["summonerId"];
            $lolPlayerInfo["accountId"] = $summonerInfo["accountId"];
        } else {
            $summonerInfo["summonerId"] = $summonerId;
        }

        // getLolData
        $url = 'https://jp1.api.riotgames.com/lol/league/v4/entries/by-summoner/' . $summonerInfo["summonerId"] . '?api_key=' . $apiKey;
        $lolData = $this->getLolData(1, $url);
        if ($lolData["result"] === false) {
            $lolPlayerInfo["result"] = false;
            $lolPlayerInfo["httpCode"] = $lolData["httpCode"];

            return $lolPlayerInfo;
        }

        // solo
        $lolPlayerInfo["soloRank"] = strtolower($lolData[0]["tier"]);
        $lolPlayerInfo["soloRank"] = ucfirst($lolPlayerInfo["soloRank"]);
        if (($lolData[0]["tier"] != "CHALLENGER") and ($lolData[0]["tier"] != "GRANDMASTER") and ($lolData[0]["tier"] != "MASTER")) {
            $num = $this->rankConversion($lolData[0]["rank"]);
            $lolPlayerInfo["soloRank"] = $lolPlayerInfo["soloRank"] . " " . $num;
        }
        // league point
        $lolPlayerInfo["leaguePoints"] = $lolData[0]["leaguePoints"];

        // WinRate
        if($lolData[0]["wins"] != 0) {
            $all = $lolData[0]["wins"] + $lolData[0]["losses"];
            $lolPlayerInfo["winRate"] = round($lolData[0]["wins"] / $all, 2) * 100;
        } else {
            $lolPlayerInfo["winRate"] = 0;
        }
        // wins
        $lolPlayerInfo["wins"] = $lolData[0]["wins"];
        // losses
        $lolPlayerInfo["losses"] = $lolData[0]["losses"];

        // Http Response Code
        $lolPlayerInfo["httpCode"] = $lolData["httpCode"];

        return $lolPlayerInfo;
    }

    private function getLolData($mode, $url)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
        curl_close($curl);

        if ($httpCode >= 400) {
            $curlResult = [
                "httpCode" => $httpCode,
                "result" => false,
            ];
            return $curlResult;
        }

        $lolData = json_decode($result, true);

        switch ($mode) {
            case 0:
                // サモナーIDを取り出す
                $summonerInfo["summonerId"] = $lolData["id"];
                $summonerInfo["accountId"] = $lolData["accountId"];
                $summonerInfo["summonerLevel"] = $lolData["summonerLevel"];
                $summonerInfo["httpCode"] = $httpCode;
                $summonerInfo["result"] = true;

                return $summonerInfo;
                break;

            case 1:
                // ステータス情報を取り出す
                $lolData["httpCode"] = $httpCode;
                $lolData["result"] = true;

                return $lolData;
                break;
        }
    }

    private function rankConversion($rank)
    {
        switch ($rank) {
            case 'I':
                return 1;
                break;
            case 'II':
                return 2;
                break;
            case 'III':
                return 3;
                break;
            case 'IV':
                return 4;
                break;
            case 'V':
                return 5;
                break;
        }
    }
}
