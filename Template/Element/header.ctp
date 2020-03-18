<style>
    /* common */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Varela Round", "Gill Sans", "Noto Sans JP", sans-serif;
    }

    body {
        color: white;
        letter-spacing: 0.02em;
        line-height: 1.4;
        background: #36393F;
    }

    .main-header {
        position: fixed;
        top: 0;
        width: 100%;
        max-width: 100%;
        height: 65px;
        margin: auto;
        background-color: #36393f;
        text-align: center;
        font-size: initial;
        box-shadow: 0 3px 10px 2px #222222;
        z-index: 999;
    }

    .main-header a {
        color: white;
        text-decoration: none;
    }

    .main-header-left {
        height: 65px;
        width: 145px;
        position: absolute;
        left: 5%;
        top: 0;
    }

    .main-header-left a {
        font-size: 2rem;
        font-weight: bold;
        line-height: 4rem;
    }

    .main-header-center {
        width: 100%;
    }

    .top-navigation {
        width: 60%;
        max-width: 705px;
        margin: 0 auto;
        text-align: center;
        padding-right: 30px;
        height: 65px;
    }

    .top-navigation-item {
        display: inline-block;
        width: 27%;
        max-width: 180px;
    }

    .top-navigation-item a {
        position: relative;
        display: inline-block;
    }

    .top-navigation-item a:after {
        position: absolute;
        bottom: 15px;
        left: 0;
        content: '';
        width: 100%;
        height: 2px;
        background-color: white;
        transform: scale(0, 1);
        transform-origin: left top;
        transition: transform .3s;
    }

    .top-navigation-item a:hover::after {
        transform: scale(1, 1);
    }

    .top-navi-link {
        font-weight: bold;
        font-size: 1.1em;
        line-height: 16px;
        letter-spacing: 0.1em;
        display: block;
        padding-top: 25px;
        padding-right: 15px;
        padding-bottom: 25px;
        padding-left: 15px;
    }

    .main-header-right {
        position: absolute;
        top: 27%;
        right: 4%;
    }

    .right-content-item {
        display: inline-block;
    }

    .login-button,
    .register-button {
        position: relative;
        width: 100px;
        height: 30px;
        font-size: .9em;
        border: none;
        border-radius: 2px;
        outline: 0;
        user-select: none;
        cursor: pointer;
    }

    .login-button:active,
    .register-button:active {
        top: 1px;
    }

    .login-button {
        margin-right: 15px;
        background-color: #70BA6B;
    }

    .login-button a {
        display: block;
    }

    .register-button {
        background-color: #A96866;
    }

    .register-button a {
        display: block;
    }

    .main-header-right-logged {
        position: absolute;
        height: 65px;
        top: 0;
        right: 20%;
    }

    .mypicture {
        width: 48px;
        height: 48px;
        margin-top: 8px;
        border: none;
        border-radius: 50%;
    }

    .mypicture:hover {
        border: 2px solid #5aa680;
    }

    .toggle-push {
        border: 2px solid #5aa680;
    }

    .myname {
        position: absolute;
        top: 35%;
        margin-left: 15px;
        white-space: nowrap;
    }

    i {
        margin-left: 10px;
    }

    .sub-navigation {
        user-select: none;
        cursor: pointer;
    }

    .sub-navigation-wrapper {
        width: 120px;
        background-color: #666666;
        text-align: center;
        position: absolute;
        display: none;
        right: -35px;
        z-index: 10;
    }

    .sub-navigation-item {
        height: 40px;
        padding-top: 10px;
        font-size: 14px;
        line-height: 18px;
        border-bottom: 1px solid #fff;
        list-style-type: none;
    }

    .mobile-item {
        display: none;
    }

    .space1 {
        height: 50px;
    }

    .error {
        width: 100vw;
        margin-top: 20px;
        padding: 5px;
        font-size: 13px;
        color: white;
        text-align: center;
        background: red;
    }

    .success {
        width: 100vw;
        margin-top: 20px;
        padding: 5px;
        font-size: 13px;
        color: white;
        text-align: center;
        background: #5BA682;
    }

    /* Medium Screen */
    @media (max-width: 960px) {
        .top-navigation {
            display: none;
        }

        .myname {
            display: none;
        }

        .main-header-left a {
            font-size: 1.5rem;
        }

        .mypicture {
            width: 48px;
            height: 48px;
        }

        .mobile-item {
            display: block;
        }
    }


    /* Small Screen */
    @media (max-width: 600px) {
        button {
            width: 60px;
            height: 30px;
            font-size: .8em;
        }

        .login-button {
            margin-right: 5px;
        }
        .login-button,
        .register-button {
            font-size: .7em;
            width: 60px;
        }
    }
</style>

<div class="main-header" ontouchstart="">
    <div class="header-wrapper">
        <div class="main-header-left">
            <a href="<?php echo $this->Url->build(["controller" => "top", "action" => "index"]) ?>">E-match</a>
        </div>
        <?php if (!empty($this->request->getCookie("user"))) { ?>
            <div class="main-header-center">
                <div class="top-navigation">
                    <div class="top-navigation-item">
                        <a href="<?php echo $this->Url->build(["controller" => "playerdetail", "action" => "index"]) ?>?g=r6s" class="top-navi-link">R6S</a>
                    </div>
                    <div class="top-navigation-item">
                        <a href="<?php echo $this->Url->build(["controller" => "playerdetail", "action" => "index"]) ?>?g=pubg" class="top-navi-link">PUBG</a>
                    </div>
                    <div class="top-navigation-item">
                        <a href="<?php echo $this->Url->build(["controller" => "playerdetail", "action" => "index"]) ?>?g=lol" class="top-navi-link">LOL</a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if (empty($this->request->getCookie("user"))) { ?>
            <div class="main-header-right">
                <div class="top-right-button-wrapper">
                    <div class="right-content-item">
                        <button type="button" name="login" class="login-button">
                            <a href="<?php echo $this->Url->build(["controller" => "login", "action" => "index"]) ?>">ログイン</a>
                        </button>
                    </div>
                    <div class="right-content-item">
                        <button type="button" name="register" class="register-button">
                            <a href="<?php echo $this->Url->build(["controller" => "accountreg", "action" => "index"]) ?>">登録</a>
                        </button>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if (!empty($this->request->getCookie("user"))) { ?>
            <div class="main-header-right-logged">
                <div class="top-right-content-wrapper">
                    <div class="right-content-item">
                        <img src="<?= h($this->Url->image($thumbnail)) ?>" id="sub-navigation-button" class="mypicture sub-navigation">
                        <div class="sub-navigation-wrapper">
                            <ul>
                                <li class="sub-navigation-item mobile-item"><a href="<?php echo $this->Url->build(["controller" => "playerdetail", "action" => "index"]) ?>?g=r6s">R6S</a></li>
                                <li class="sub-navigation-item mobile-item"><a href="<?php echo $this->Url->build(["controller" => "playerdetail", "action" => "index"]) ?>?g=pubg">PUBG</a></li>
                                <li class="sub-navigation-item mobile-item"><a href="<?php echo $this->Url->build(["controller" => "playerdetail", "action" => "index"]) ?>?g=lol">LOL</a></li>
                                <li class="sub-navigation-item"><a href="<?php echo $this->Url->build(["controller" => "profile", "action" => "index"]) ?>">プロフィール</a></li>
                                <li class="sub-navigation-item"><span style="cursor:pointer" onclick="window.modalOpen()">リクエスト通知</span></li>
                                <li class="sub-navigation-item"><a href="<?php echo $this->Url->build(["controller" => "mypage", "action" => "index"]) ?>">マイページ</a></li>
                                <li class="sub-navigation-item"><a href="<?php echo $this->Url->build(["controller" => "contact", "action" => "index"]) ?>">お問い合わせ</a></li>
                                <li class="sub-navigation-item"><a href="<?php echo $this->Url->build(["controller" => "login", "action" => "logout"]) ?>">ログアウト</a></li>
                            </ul>
                        </div>
                        <span class="myname"><?= h($username); ?></span>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<div class="space1"></div>
<?= $this->Flash->render() ?>


<script>
    //サブナビゲーション表示/非表示
    $('#sub-navigation-button').click(function() {
        $('.sub-navigation-wrapper').slideToggle(500);
    });

    // サブナビゲーションボタン押下時の 処理
    $('.mypicture').click(function() {
        $('.mypicture').toggleClass('toggle-push');
    });
</script>