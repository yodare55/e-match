<style>
    /* common */
    .bg {
        background-image: url("https://school.oohara.jp/kudo/img/login-wallpaper.jpg");
        background-size: cover;
        padding-top: 66.6%;
        position: relative;
    }

    .account-reg {
        width: 460px;
        height: 460px;
        position: absolute;
        top: 20%;
        left: calc(50vw - 230px);
        margin: 0 auto;
        box-shadow: 1px 2px 7px #0e0e0f;
        background: #36393F;
        border-radius: 2px;
        user-select: none;
    }

    .account-reg h2 {
        font-size: 1.5rem;
        font-weight: normal;
        letter-spacing: 3px;
        text-align: center;
        padding: 20px 0 10px 0;
        color: #fff;
    }

    .input_area {
        width: 360px;
        margin: 0 auto;
    }

    .input_area p {
        font-size: 12px;
        margin-bottom: 5px;
    }

    .btn_area {
        text-align: center;
        margin-top: 5px;
    }

    input:focus {
        outline-color: #5aa680;
        outline: 2px solid #5aa680;
    }

    input[name="mail"] {
        padding-left: 10px;
        width: 360px;
        height: 40px;
        margin-bottom: 10px;
        font-size: 1rem;
        border-radius: 2px;
        background-color: #303339;
        color: #fff;
        border: 1px solid #040405;
    }

    input[type="password"] {
        padding-left: 10px;
        width: 360px;
        height: 40px;
        margin-bottom: 10px;
        font-size: 1rem;
        border: 1px solid #040405;
        border-radius: 2px;
        background-color: #303339;
        color: #fff;
    }

    .login_btn {
        position: relative;
        font-size: 1rem;
        width: 360px;
        height: 40px;
        margin-top: 10px;
        margin-bottom: 15px;
        color: #fff;
        background-color: #5AA681;
        padding: 10px;
        border-radius: 2px;
        border: none;
        user-select: none;
        outline: 0;
        cursor: pointer;
    }

    .login_btn:hover {
        background-color: #62b28a;
    }

    .login_btn:active {
        top: 1px;
    }

    .login-msg-area {
        text-align: center;
        margin-bottom: 10px;
    }

    .login-msg {
        font-size: 12px;
    }

    .login-msg a {
        color: #fff;
        text-decoration: none;
    }

    .login-msg a:hover {
        text-decoration: underline;
    }

    .login-msg a:visied {
        color: #fff;
    }

    .check {
        text-align: center;
        color: red;
    }

    /* midum screen */

    @media (max-width: 1024px) {
        .account-reg {
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

        .account-reg h2 {
            font-size: 1.2rem;
        }

        .input_area {
            width: 250px;
        }

        input[name="mail"],
        input[type="password"] {
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
<div class="account-reg">
    <h2>アカウント登録</h2>
    <?php echo $this->Form->create(null, ["type" => "post", "url" => ["controller" => "accountreg", "action" => "create"], "onsubmit" => "return window.check();"]) ?>
    <div class="input-wrapper">
        <div class="input_area">
            <p>メールアドレス</p>
            <input type="email" id="mail" name="mail" size="40" max-length="100" /><br />
            <p>パスワード</p>
            <input type="password" id="pass1" name="pass" size="40" max-length="100" /><br />
            <p>パスワード確認用</p>
            <input type="password" id="pass2" size="40" max-length="100" /><br />
        </div>
        <div class="btn_area">
            <button class="login_btn" type="submit">
                アカウント登録
            </button>
        </div>
        <div class="login-msg-area">
            <p class="login-msg">
                <a href="<?= $this->Url->build(["controller" => "login", "action" => "index"]) ?>">既にアカウントをお持ちですか？</a>
            </p>
        </div>
        <div class="check-area">
            <p class="check" id="check" name="check"></p>
        </div>
    </div>
    </form>
</div>

<script>
    function check() {
        var mail = document.getElementById("mail");
        var pass1 = document.getElementById("pass1");
        var pass2 = document.getElementById("pass2");
        var ck = document.getElementById("check");
        ck.innerHTML = "";
        if (mail.value == "") { //空欄時
            ck.innerHTML = "メールアドレスが空欄です";
            return false;
        }
        //メールアドレスチェック
        if (mail.value.indexOf("@") == -1 ||
            mail.value.indexOf(".") == -1) {
            ck.innerHTML = "メールアドレスが正確ではありません";
            return false;
        }
        if (pass1.value == "") {
            ck.innerHTML = "パスワードが空欄です";
            return false;
        }
        if (pass2.value == "") {
            ck.innerHTML = "パスワード確認欄が空欄です";
            return false;
        }
        if (pass1.value != pass2.value) {
            ck.innerHTML = "パスワードが不一致です";
            return false;
        }
    }
</script>