<?php

namespace App\Controller;

use Cake\Filesystem\File;

class ProfileregController extends AppController //Startのみしか使われない
{
    function index()
    {
        if (empty($this->request->getCookie("user"))) {
            $this->redirect("/");
            return;
        }
    }

    function confirm()
    {
        // プロフィール確認画面へ表示
        $this->set("name", $this->request->getData('name'));

        $gameTitle = $this->request->getData('game-title');

        $r6sFlg = 0;
        $pubgFlg = 0;
        $lolFlg = 0;
        $titleArray = array();

        foreach ($gameTitle as $gameTitles) {
            switch ($gameTitles) {
                case "1":
                    array_push($titleArray, "Rainbow Six Siege");
                    $r6sFlg = 1;
                    break;
                case "2":
                    array_push($titleArray, "Player Unknown's Battle Ground");
                    $pubgFlg = 1;
                    break;
                case "3":
                    array_push($titleArray, "League Of Legends");
                    $lolFlg = 1;
                    break;
            }
        }
        $this->set("titleArray", $titleArray);
        $this->set("r6sFlg", $r6sFlg);
        $this->set("pubgFlg", $pubgFlg);
        $this->set("lolFlg", $lolFlg);
        $this->set("r6sName", $this->request->getData('r6s-name'));
        $this->set("pubgName", $this->request->getData('pubg-name'));
        $this->set("lolName", $this->request->getData('lol-name'));
        $this->set("r6sRank", $this->request->getData('r6s-rank-select'));
        $this->set("pubgRank", $this->request->getData('pubg-rank-select'));
        $this->set("lolRank", $this->request->getData('lol-rank-select'));
        $this->set("myIntro", $this->request->getData('my-intro'));
        $this->set("myTeam", $this->request->getData('my-team'));

        // サムネ画像はwebrootへアップロード後、表示(メールアドレス.ファイル名)
        $f = $this->request->getData('thumbnail-file');
        if (empty($f["name"])) {
            $c = $this->request->getCookie("user");
            $noImg = "noimage.png";
            $c = $c . "_thumbnail_" . $noImg;
            $file = new File(WWW_ROOT . "img/noimage.png");
            $file->copy(WWW_ROOT . "img/" . $c);
            $this->set("file", $c);
        } else {
            $c = $this->request->getCookie("user");
            $c = $c . "_thumbnail_" . $f["name"];
            move_uploaded_file($f["tmp_name"], "img/" . $c);
            $this->set("file", $c);
        }

        if ("0" === $this->request->getData('values')) {
            $tmp = "楽しんでゲームをしたい！";
            $this->set("values", $tmp);
            $this->set("val", $this->request->getData('values'));
        } else if ("1" === $this->request->getData('values')) {
            $tmp = "本気でゲームをしたい！";
            $this->set("values", $tmp);
            $this->set("val", $this->request->getData('values'));
        }

        if ("0" === $this->request->getData('tournament')) {
            $tmp = "大会に出場したくない！";
            $this->set("tournament", $tmp);
            $this->set("tmt", $this->request->getData('tournament'));
        } else if ("1" === $this->request->getData('tournament')) {
            $tmp = "大会に出場したい！";
            $this->set("tournament", $tmp);
            $this->set("tmt", $this->request->getData('tournament'));
        }

        $this->set("discord", $this->request->getData('discord'));
        $this->set("skype", $this->request->getData('skype'));
    }

    function register()
    {
        // プロフィールカバー画像登録
        $c = $this->request->getCookie("user");
        $noImg = "bg_noimage.jpg";
        $fileName = $c . "_bg_" . $noImg;
        $file = new File(WWW_ROOT . "img/bg_noimage.jpg");
        $file->copy(WWW_ROOT . "img/" . $fileName);

        // DB登録
        $table = $this->getTableLocator()->get("users"); // usersテーブルを使う宣言
        $data = $table->get($this->request->getCookie("user_id"));
        $p = $this->request->getData();
        $data->user_name = $p["userName"];
        $data->pf_img = $p["thumbnail"];
        $data->pf_head = $fileName;
        $data->r6s_flg = $p["r6sFlg"];
        $data->pubg_flg = $p["pubgFlg"];
        $data->lol_flg = $p["lolFlg"];
        $data->r6s_name = $p["r6sName"];
        $data->pubg_name = $p["pubgName"];
        $data->lol_name = $p["lolName"];
        $data->r6s_goal = $p["r6sGoal"];
        $data->pubg_goal = $p["pubgGoal"];
        $data->lol_goal = $p["lolGoal"];
        $data->intro = $p["myIntro"];
        $data->team = $p["myTeam"];
        $data->game_values = $p["val"];
        $data->tmt_flg = $p["tmt"];
        $data->discord = $p["discord"];
        $data->skype = $p["skype"];

        // api取得
        $type = 0;

        if ($p["r6sFlg"] === "1") {
            // r6s api
            $id = "none";
            $r6sPlayerInfo = array();
            $getR6sInfo = new getR6sInfo();
            $r6sPlayerInfo = $getR6sInfo->getPlayerInfo($p["r6sName"], $id, $type);
            if ($r6sPlayerInfo["return"] === false) {
                $data->r6s_flg = 0;
            }
            $data->r6s_id = $r6sPlayerInfo["id"];
            $data->r6s_level = $r6sPlayerInfo["level"];
            $data->r6s_rank = $r6sPlayerInfo["rank"];
            $data->r6s_mmr = $r6sPlayerInfo["mmr"];
            $data->r6s_kd = $r6sPlayerInfo["kd"];
            $data->r6s_winrate = $r6sPlayerInfo["winRate"];
        }

        if ($p["pubgFlg"] === "1") {
            // pubg api
            $accountId = "none";
            $seasonId = "none";
            $getPubgInfo = new getPubgInfo();
            $pubgPlayerInfo = $getPubgInfo->getPlayerInfo($p["pubgName"], $accountId, $seasonId, $type);
            var_dump($pubgPlayerInfo);
            if ($pubgPlayerInfo["result"] === false) {
                $data->pubg_flg = 0;
            }
            $this->set('pubgPlayerInfo', $pubgPlayerInfo);
            $data->pubg_id = $pubgPlayerInfo["accountId"];
            $data->pubg_seasonid = $pubgPlayerInfo["seasonId"];
            $data->pubg_solorank = $pubgPlayerInfo["soloRank"];
            $data->pubg_duorank = $pubgPlayerInfo["duoRank"];
            $data->pubg_squadrank = $pubgPlayerInfo["sqRank"];
            $data->pubg_solokd = $pubgPlayerInfo["soloKd"];
            $data->pubg_duokd = $pubgPlayerInfo["duoKd"];
            $data->pubg_squadkd = $pubgPlayerInfo["sqKd"];
            $data->pubg_solopoints = $pubgPlayerInfo["soloPoints"];
            $data->pubg_duopoints = $pubgPlayerInfo["duoPoints"];
            $data->pubg_squadpoints = $pubgPlayerInfo["sqPoints"];
        }

        if ($p["lolFlg"] === "1") {
            // lol api
            $summonerId = "none";
            $getLolInfo = new getLolInfo();
            $lolPlayerInfo = $getLolInfo->getLolInfo($p["lolName"], $summonerId, $type);
            var_dump($lolPlayerInfo);
            if ($lolPlayerInfo["result"] === false) {
                $data->lol_flg = 0;
            }
            $this->set('lolPlayerInfo', $lolPlayerInfo);
            $data->lol_id = $lolPlayerInfo["accountId"];
            $data->lol_summonerid = $lolPlayerInfo["summonerId"];
            $data->lol_solorank = $lolPlayerInfo["soloRank"];
            $data->lol_points = $lolPlayerInfo["leaguePoints"];
            $data->lol_winrate = $lolPlayerInfo["winRate"];
        }

        // DB保存
        $table->save($data);

        // セッションを作成
        $user_name = $data->user_name;
        $session = $this->request->session();
        $session->write('username', $user_name);
        $this->set('username', $session->read('username'));

        // リダイレクト
        $this->redirect(["controller" => "top", "action" => "index"]);
    }
}
