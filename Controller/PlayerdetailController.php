<?php

namespace App\Controller;

class PlayerdetailController extends AppController //Startのみしか使われない
{
    function index()
    {
        if (empty($this->request->getCookie("user"))) {
            $this->redirect("/");
            return;
        }

        $game = $this->request->query("g");
        $this->set("gameName", $game);

        $table = $this->getTableLocator()->get("users");
        $users = $table->find('all');

        $query = $table->get($this->request->getCookie("user_id"));
        $myName = $query->user_name;

        switch ($game) {
            case "r6s":
                $count = $users->where(["r6s_flg" => "1"])->where(["user_name IS NOT" => $myName])->count();
                $record = $users->select(["id", "user_name", "pf_img", "r6s_level", "r6s_rank"])
                                ->where(["r6s_flg" => "1"])
                                ->where(["user_name IS NOT" => $myName]);
                break;
            case "pubg":
                $count = $users->where(["pubg_flg" => "1"])->where(["user_name IS NOT" => $myName])->count();
                $record = $users->select(["id", "user_name", "pf_img", "pubg_solorank", "pubg_duorank"])
                                ->where(["pubg_flg" => "1"])
                                ->where(['user_name IS NOT' => $myName]);
                break;
            case "lol":
                $count = $users->where(["lol_flg" => "1"])->where(["user_name IS NOT" => $myName])->count();
                $record = $users->select(["id", "user_name", "pf_img", "lol_solorank", "lol_points"])
                                ->where(["lol_flg" => "1"])
                                ->where(['user_name IS NOT' => $myName]);
                break;
        }
        $this->set("count", $count);
        $this->set("record", json_encode($record));
    }
}
