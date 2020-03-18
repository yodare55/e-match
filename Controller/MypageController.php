<?php

namespace App\Controller;

class MypageController extends AppController //Startのみしか使われない
{
    function index()
    {
        if (empty($this->request->getCookie("user"))) {
            $this->redirect("/");
            return;
        }
        $i = 0;
        $type = 2;
        $table = $this->getTableLocator()->get("users"); // usersテーブルを使う宣言
        $query = $table->get($this->request->getCookie("user_id"));
        $this->set("r6sFlg", $query->r6s_flg);
        $this->set("pubgFlg", $query->pubg_flg);
        $this->set("lolFlg", $query->lol_flg);

        // DBからr6s情報取得
        if ($query->r6s_flg === 1) {
            $r6sMax = $query->r6s_mmr + 200;
            $r6sMin = $query->r6s_mmr - 200;
            $myName = $query->user_name;
            $r6sUsers = $table->find()->limit(12)
                ->select(['id', 'user_name', 'pf_img', 'r6s_name', 'r6s_mmr', 'r6s_id'])
                ->where(function ($exp) use ($r6sMax, $r6sMin, $myName) {
                    return $exp->between('r6s_mmr', $r6sMin, $r6sMax)->notIn('user_name', $myName);
                });
            $r6sCnt =0;
            foreach($r6sUsers as $j){
                $r6sCnt++;
            }

            $i = 0;
            foreach ($r6sUsers as $row) {
                $r6sPlayerInfo[$i] = $this->getR6sPlayerInfo($row->r6s_name, $row->r6s_id, $type);
                $r6sPlayerInfo[$i] += array('accountid' => $row->id, 'username' => $row->user_name, 'thumbnail' => $row->pf_img);
                $i++;
            }
            $r6sData = json_encode($r6sPlayerInfo);
            $this->set('r6sCnt', $r6sCnt);
            $this->set('r6sPlayerInfo', $r6sData);
        } else {
            $this->set('r6sCnt', 0);
            $this->set('r6sPlayerInfo', "test");
        }

        // DBからpubg情報取得
        if ($query->pubg_flg === 1) {
            $pubg = "pubg";
            $pubgSoloRank = $query->pubg_solorank;
            $rankResult = $this->findRank($pubgSoloRank, $pubg);
            extract($rankResult, EXTR_PREFIX_INVALID, "pubgRank");
            if (isset($rank_2)) {
                $pubgUsers = $table->find()
                    ->select(['id', 'user_name', 'pf_img', 'pubg_id', 'pubg_seasonid', 'pubg_solorank', 'pubg_duorank'])
                    ->where(['pubg_flg' => 1, 'OR' => [['pubg_solorank' => $pubgRank_0], ['pubg_solorank' => $pubgRank_1], ['pubg_solorank' => $pubgRank_2]]])
                    ->where(['user_name IS NOT' => $myName])
                    ->limit(9);
            } else {
                $pubgUsers = $table->find()
                    ->select(['id', 'user_name', 'pf_img', 'pubg_id', 'pubg_seasonid', 'pubg_solorank', 'pubg_duorank'])
                    ->where(['pubg_flg' => 1, 'OR' => [['pubg_solorank' => $pubgRank_0], ['pubg_solorank' => $pubgRank_1]]])
                    ->where(['user_name IS NOT' => $myName])
                    ->limit(9);
            }

            $pubgCnt = 0;
            foreach($pubgUsers as $j){
                $pubgCnt++;
            }

            if($pubgCnt !== 0) {
                $i = 0;
                $pubgAccountId = array();
                foreach ($pubgUsers as $row) {
                    $id[$i] = $row->id;
                    $pfImg[$i] = $row->pf_img;
                    $userName[$i] = $row->user_name;
                    $pubgAccountId[$i] = $row->pubg_id;
                    $seasonId = $row->pubg_seasonid;
                    $i++;
                }

                $pubgPlayerInfo = $this->getPubgPlayerInfo($userName, $pubgAccountId, $seasonId, $type);
                $len = count($pubgPlayerInfo);
                for ($i = 0; $i < $len - 1; $i++) {
                    $pubgPlayerInfo[$i] += array('id' => $id[$i], 'thumbnail' => $pfImg[$i]);
                }

                $pubgData = json_encode($pubgPlayerInfo);
                $this->set('pubgCnt', $pubgCnt);
                $this->set('pubgPlayerInfo', $pubgData);
            } else {
                $this->set('pubgCnt', 0);
                $this->set('pubgPlayerInfo', "none");
            }

        } else {
            $this->set('pubgCnt', 0);
            $this->set('pubgPlayerInfo', "none");
        }

        if ($query->lol_flg === 1) {
            $lol = "lol";
            $lolSoloRank = $query->lol_solorank;
            $rankResult = $this->findRank($lolSoloRank, $lol);
            extract($rankResult, EXTR_PREFIX_INVALID, "lolRank");
            if (isset($rank_2)) {
                $lolUsers = $table->find()->limit(12)
                    ->select(['id', 'user_name', 'pf_img', 'lol_summonerid', 'lol_solorank', 'lol_points'])
                    ->where(['lol_flg' => 1, 'OR' => [['lol_solorank' => $lolRank_0], ['lol_solorank' => $lolRank_1], ['lol_solorank' => $lolRank_2]]]);
            } else {
                $lolUsers = $table->find()->limit(12)
                    ->select(['id', 'user_name', 'pf_img', 'lol_summonerid', 'lol_solorank', 'lol_points'])
                    ->where(['lol_flg' => 1, 'OR' => [['lol_solorank' => $lolRank_0], ['lol_solorank' => $lolRank_1]]])
                    ->where(['user_name IS NOT' => $myName]);
            }
            $lolCnt = $lolUsers->count();
            $i = 0;
            foreach ($lolUsers as $row) {
                $LolPlayerInfo[$i] = $this->getLolPlayerInfo("none", $row->lol_summonerid, $type);
                $LolPlayerInfo[$i] += array('accountid' => $row->id, 'username' => $row->user_name, 'thumbnail' => $row->pf_img);
                $i++;
            }
            $lolCnt =0;
            foreach($lolUsers as $j){
                $lolCnt++;
            }
            $lolData = json_encode($LolPlayerInfo);
            $this->set('lolCnt', $lolCnt);
            $this->set('lolPlayerInfo', $lolData);
        } else {
            $this->set('lolCnt', 0);
            $this->set('lolPlayerInfo', "test");
        }
    }

    function findRank($rank, $gameTitle)
    {
        if ($gameTitle === "pubg") {
            $rankTitle = array(
                "UnRanked",
                "Beginner5",
                "Beginner4",
                "Beginner3",
                "Beginner2",
                "Beginner1",
                "Novice5",
                "Novice4",
                "Novice3",
                "Novice2",
                "Novice1",
                "Experienced5",
                "Experienced4",
                "Experienced3",
                "Experienced2",
                "Experienced1",
                "Skilled5",
                "Skilled4",
                "Skilled3",
                "Skilled2",
                "Skilled1",
                "Specialist5",
                "Specialist4",
                "Specialist3",
                "Specialist2",
                "Specialist1",
                "Survivor",
                "Lone Survivor"
            );
        } else if ($gameTitle === "lol") {
            $rankTitle = array(
                "Iron1",
                "Iron2",
                "Iron3",
                "Iron4",
                "Bronze1",
                "Bronze2",
                "Bronze3",
                "Bronze4",
                "Silver1",
                "Silver2",
                "Silver3",
                "Silver4",
                "Gold1",
                "Gold2",
                "Gold3",
                "Gold4",
                "Platinum1",
                "Platinum2",
                "Platinum3",
                "Platinum4",
                "Diamond1",
                "Diamond2",
                "Diamond3",
                "Diamond4",
                "Master",
                "Grandmaster",
                "Challenger"
            );
        }
        $length = count($rankTitle);
        for ($i = 0; $i < $length; $i++) {
            if ($rank === $rankTitle[$i]) {
                $result[] = $rankTitle[$i];
                $index = $i;
            }
        }

        if ($index !== 0 and $index !== ($length - 1)) {
            $result[] = $rankTitle[$index + 1];
            $result[] = $rankTitle[$index - 1];
        } else if ($index === 0) {
            $result[] = $rankTitle[$index + 1];
        } else if ($index === ($length - 1)) {
            $result[] = $rankTitle[$index - 1];
        }

        return $result;
    }

    function getR6sPlayerInfo($r6sname, $id, $type)
    {
        $getR6sInfo = new getR6sInfo();
        $r6sPlayerInfo = array();
        $r6sPlayerInfo = $getR6sInfo->getPlayerInfo($r6sname, $id, $type);

        return $r6sPlayerInfo;
    }

    function getPubgPlayerInfo($name, $accountId, $seasonId, $type)
    {
        $getPubgInfo = new getPubgInfo();
        $pubgPlayerInfo = array();
        $pubgPlayerInfo = $getPubgInfo->getPlayerInfo($name, $accountId, $seasonId, $type);

        return $pubgPlayerInfo;
    }

    function getLolPlayerInfo($name, $summonerId, $type)
    {
        $getLolInfo = new getLolInfo();
        $lolPlayerInfo = array();
        $lolPlayerInfo = $getLolInfo->getLolInfo($name, $summonerId, $type);

        return $lolPlayerInfo;
    }
}