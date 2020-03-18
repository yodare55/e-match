<?php

namespace App\Controller;
use Cake\Mailer\Email; // Email機能を使う宣言

class ContactController extends AppController //Startのみしか使われない
{
    function index() {
        if(empty($this->request->getCookie("user"))){
            $this->redirect("/");
            return;
        }
    }
    function send(){
        $p = $this->request->getData();
        $email = new Email();
        $email->setTo("closer0055@gmail.com")
        ->setFrom(["kudotest999@gmail.com"=>"問い合わせ"])
        ->setEmailFormat("text")
        ->setSubject("お問い合わせがありました")
        ->setViewVars(["form"=>$p])
        ->viewBuilder()
        ->setTemplate("send2")
        ->setLayout("default");
        $email->send(); //メール送信
        $this->redirect("/");
    }
}