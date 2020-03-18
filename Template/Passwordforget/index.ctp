<style>
/* common */
input:focus {
	outline-color: #5aa680;
	outline: 2px solid #5aa680;
}

.bg {
    background-image: url("https://school.oohara.jp/kudo/img/login-wallpaper.jpg");
    background-size: cover;
    padding-top: 66.6%;
    position: relative;
}

.wrapper {
    position: absolute;
    top: 20%;
    left: 50%;
    transform: translateY(-50%) translateX(-50%);
    width: 460px;
    height: 280px;
    background: #36393f;
    margin: 0 auto;
    margin-top: 200px;
    border-radius: 2px;
    box-shadow: 1px 3px 12px #0e0e0f;
    color: #fff;
}

.wrapper h2 {
    text-align: center;
    font-size: 1.5rem;
    text-align: center;
    letter-spacing: 3px;
    padding: 20px 0 30px 0;
}

.inputs {
    width: 350px;
    font-size: 12px;
    margin: 0 auto;
}

input[name="mail"] {
    width: 350px;
    height: 40px;
    margin-top: 5px;
    margin-bottom: 10px;
    padding-left: 10px;
    font-size: 16px;
    border-radius: 2px;
    border: none;
    background-color: #303339;
    color: #fff;
    border: 1px solid #040405;
}

.btn_area {
    margin-top: 10px;
    text-align: center;
}

.login_btn {
    position: relative;
    font-size: 16px;
    width: 350px;
    height: 40px;
    color: #fff;
    background-color: #5aa681;
    padding: 10px;
    border-radius: 2px;
    border: none;
    user-select: none;
    cursor: pointer;
    margin-bottom: 20px;
    outline: 0;
}

.login_btn:active {
    top: 1px;
}

.login_btn:hover {
    background: #62b28a;
}

.err_msg {
    text-align: center;
    color: red;
}

.passwd_fg {
    margin: 15px 0;
    text-align: center;
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

    .wrapper h2 {
        font-size: 1.5rem;
    }

    .inputs {
        width: 350px;
    }

    input[name="mail"] {
        width: 350px;
        height: 40px;
    }

    .login_btn {
        width: 350px;
        height: 40px;
        font-size: 1rem;
        padding: 0;
    }

    .err_msg {
        font-size: 1rem;
    }
}

/* small screen */
@media (max-width: 768px) {
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

    .wrapper h2 {
        font-size: 1.2rem;
    }

    .inputs {
        width: 250px;
    }

    input[name="mail"] {
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
    <h2>パスワード再設定</h2>
        <?php echo $this->Form->create(null, ["type" => "post", "url" => ["controller" => "passwordforget", "action" => "request"], "onsubmit" => "return window.check();"]) ?>
            <div class="inputs">
                <p class="label">メールアドレス</p>
                <input type="email" id="mail" name="mail" max-length="100" />
            </div>
            <div class="btn_area">
                <button class="login_btn" type="submit">メールを送信する</button>
            </div>
        </form>
        <p id="check" class="err_msg"></p>
    </div>
</div>

<script>
function check() {
    var mail = document.getElementById("mail");
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
}
</script>