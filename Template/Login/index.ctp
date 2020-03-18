<style>
    /* common */
    .bg {
        background-image: url("https://school.oohara.jp/kudo/img/login-wallpaper.jpg");
        background-size: cover;
        padding-top: 66.6%;
        position: relative;
    }

    input:focus {
        outline-color: #5aa680;
        outline: 2px solid #5aa680;
    }

    .wrapper {
        position: absolute;
        top: 20%;
        left: calc(50vw - 230px);
        width: 460px;
        height: 430px;
        margin: 0 auto;
        padding: 0 0 50px 0;
        box-shadow: 1px 3px 10px #0e0e0f;
        border-radius: 2px;
        background: #36393f;
        color: #fff;
    }

    .wrapper h2 {
        text-align: center;
        font-size: 1.5rem;
        text-align: center;
        padding: 20px 0 30px 0;
        letter-spacing: 3px;
    }

    .input_area {
        width: 350px;
        font-size: 12px;
        margin: 0 auto;
    }

    input[name="mail"],
    input[name="passwd"] {
        width: 350px;
        height: 40px;
        margin-top: 5px;
        margin-bottom: 10px;
        padding-left: 10px;
        font-size: 1rem;
        border: none;
        border-radius: 2px;
        background-color: #303339;
        color: #fff;
        border: 1px solid #040405;
    }

    .btn_area {
        text-align: center;
        margin-top: 5px;
    }

    .login_btn {
        position: relative;
        font-size: 1rem;
        width: 350px;
        height: 40px;
        color: #fff;
        background-color: #5aa681;
        padding: 10px;
        border-radius: 2px;
        border: none;
        user-select: none;
        cursor: pointer;
        outline: 0;
    }

    .login_btn:active {
        top: 1px;
    }

    .login_btn:hover {
        background-color: #62b28a;
    }

    .passwd_fg {
        margin: 15px 0;
        text-align: center;
        color: #fff;
    }

    .passwd_fg a {
        color: #1e90ff;
    }

    .check_area {
        text-align: center;
        color: red;
    }

    /* midum screen */

    @media (max-width: 1024px) {
        .wrapper {
            width: 100vw;
            position: static;
            top: 0;
            left: 0;
            right: 0;
            transform: translateY(0) translateX(0);
            margin: 0 auto;
            box-shadow: none;
        }
    }

    /* small screen */
    @media (max-width: 768px) {

        .wrapper h2 {
            font-size: 1.2rem;
        }

        .input_area {
            width: 250px;
        }

        input[name="mail"],
        input[name="passwd"] {
            width: 250px;
            height: 30px;
        }

        .login_btn {
            width: 250px;
            height: 30px;
            font-size: 14px;
            padding: 0;
        }

        .err_msg {
            font-size: 12px;
        }
    }
</style>

<div class="bg"></div>
<div class="wrapper">
    <h2>ログイン</h2>
    <?php echo $this->Form->create(null, ["type" => "post", "url" => ["controller" => "login", "action" => "login"], "onsubmit" => "return window.check();"]) ?>
    <div class="input_area">
        <p>メールアドレス</p>
        <input type="email" id="mail" name="mail" max-length="100" /><br />
        <p>パスワード</p>
        <input type="password" id="pass" name="passwd" max-length="100" />
    </div>

    <div class="btn_area">
        <button class="login_btn" type="submit">ログイン</button>
    </div>
    </form>
    <p class="passwd_fg">パスワードを忘れた方は<a href="<?php echo $this->Url->build(["controller" => "passwordforget", "action" => "index"]) ?>">こちら</a></p>

    <div class="check_area">
        <p id="check" class="err_msg"><?= $err ?></p>
    </div>
</div>

<script>
    function check() {
        var mail = document.getElementById("mail");
        var pass1 = document.getElementById("pass");
        var ck = document.getElementById("check");
        ck.innerHTML = "";

        if (mail.value == "") {
            //空欄時
            ck.innerHTML = "メールアドレスが空欄です";
            return false;
        }
        //メールアドレスチェック
        if (mail.value.indexOf("@") == -1 || mail.value.indexOf(".") == -1) {
            ck.innerHTML = "メールアドレスが正確ではありません";
            return false;
        }
        if (pass1.value == "") {
            ck.innerHTML = "パスワードが空欄です";
            return false;
        }
    }
</script>