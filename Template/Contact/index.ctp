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

textarea:focus {
	outline-color: #5aa680;
	outline: 2px solid #5aa680;
}

h2 {
	text-align: center;
    padding-bottom: 20px;
    letter-spacing: 3px;
}

.sub_title {
	text-align: center;
	font-size: 20px;
	margin-bottom: 20px;
}

.contact-wrapper {
    width: 570px;
    height: 570px;
    position: absolute;
    top: 20%;
    left: calc(50vw - 285px);
    background: #36393F;
	margin: 0 auto;
	padding: 30px;
	box-shadow: 1px 3px 10px #0e0e0f;
	border-radius: 2px;
}

.input_area {
    width: 460px;
    font-size: 12px;
    margin: 0 auto;
}

input[type="text"],
input[type="email"] {
	padding-left: 10px;
	width: 460px;
	height: 40px;
	margin-bottom: 10px;
	font-size: 1rem;
	border-radius: 2px;
	background-color: #303339;
	color: #fff;
	border: 1px solid #040405;
    margin-top: 10px;
    margin-bottom: 10px;
}

textarea {
	border-radius: 2px;
    width: 460px;
	padding: 10px;
	font-size: 1rem;
    resize: none;
    height: 120px;
    margin-top: 10px;
    margin-bottom: 10px;
    background-color: #303339;
    border: 1px solid #040405;
    color: #fff;
}

.btn_area {
	text-align: center;
	margin-bottom: 20px;
}

.confirm-btn {
	position: relative;
	background: #5AA681;
	border: none;
	color: white;
	font-size: 1rem;
    width: 460px;
    height: 40px;
	font-weight: normal;
    margin-top: 5px;
	padding: 10px 20px;
	border-radius: 2px;
	cursor: pointer;
	user-select: none;
}

.modal-close-btn {
	position: relative;
	background: #949494;
	border: none;
	color: white;
    width: 460px;
    height: 40px;
	font-size: 1rem;
	font-weight: normal;
	padding: 10px 20px;
    margin-top: 5px;
    margin-bottom: 5px;
	border-radius: 2px;
	cursor: pointer;
	user-select: none;
}

.submit-btn {
    position: relative;
	background: #5AA681;
	border: none;
	color: white;
    width: 460px;
    height: 40px;
	font-size: 1rem;
	font-weight: normal;
	padding: 10px 20px;
    margin-top: 5px;
    margin-bottom: 5px;
	border-radius: 2px;
	cursor: pointer;
	user-select: none;
}

.submit-btn:active,
.modal-close-btn:active {
    top: 1px;
}

.submit-btn:hover {
	background: #62b28a;
}

.modal-close-btn:hover {
	background: #b4b4b4;
}

.check_area {
	text-align: center;
	color: red;
}

.modal-blur {
    backdrop-filter: blur(14px);
    margin: 0 auto;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgb(0, 0, 0, 0.8);
    display: none;
}

.modal-wrapper {
    background: rgba(54, 57, 63, 0.7);
    width: 720px;
    height: 70vh;
    margin: 0 auto;
    margin-top: 120px;
    padding-top: 30px;
	border-radius: 2px;
    border: 1px solid #fff;
    z-index:5;
    overflow-y: auto;
}

.modal-msg {
    text-align: center;
    margin-bottom: 20px;
    font-size: 12px;
}

.modal-item {
    padding: 5px 0 0 10px;
	width: 460px;
    height: 30px;
    margin: 0 auto;
	margin-bottom: 10px;
	font-size: 14px;
	border-radius: 2px;
	background-color: #303339;
	color: #fff;
	border: 1px solid #040405;
    margin-top: 10px;
    margin-bottom: 10px;
}

.modal-item-text {
    padding: 5px 0 0 10px;
	width: 460px;
    height: auto;
    margin: 0 auto;
	margin-bottom: 10px;
	font-size: 14px;
    line-height: 18px;
	border-radius: 2px;
	background-color: #303339;
	color: #fff;
	border: 1px solid #040405;
    margin-top: 10px;
    margin-bottom: 10px;
}

/* midum screen */

@media (max-width: 1024px) {
    .contact-wrapper {
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

    .contact-wrapper h2 {
        font-size: 1.2rem;
    }

    .input_area {
        width: 280px;
    }

    input[type="text"],
    input[type="email"] {
        width: 280px;
    }

    textarea {
        width: 280px;
    }

    button[type="submit"] {
        width: 280px;
        height: 30px;
        font-size: 14px;
        padding: 0;
    }

    .err_msg {
        font-size: 12px;
    }

    .modal-wrapper {
        width: 100vw;
    }

    .modal-wrapper h2 {
        font-size: 1.2rem;
    }

    .modal-item {
        width: 280px;
    }

    .modal-item-text {
        width: 280px;
    }

    .modal-close-btn {
        width: 280px;
        height: 30px;
        font-size: 14px;
        padding: 0;
    }
    .confirm-btn {
        width: 280px;
    }

}

</style>

<!-- お問い合わせ画面 -->
<?php echo $this->Form->create(null,["type"=>"post","url"=>["controller"=>"contact","action"=>"send"],"onsubmit"=>"return window.check();"])?>
<div class="bg"></div>
<div class="contact-wrapper">
    <h2>お問い合わせ</h2>
    <p class="sub_title">お問い合わせはこちらから</p>

    <div class="input_area">
        <p>名前</p>
        <input
            id="name"
            type="text"
            name="name"
            maxlength="50"
            placeholder="例）山田太郎"
            value=""
        />

        <p>メールアドレス</p>
        <input
            id="email"
            type="email"
            name="email"
            maxlength="50"
            placeholder="例）guest@example.com"
            value=""
        />

        <p>お問い合わせ内容</p>
        <textarea
            id="content"
            name="content"
            maxlength="1000"
            placeholder="お問合せ内容を入力"
        ></textarea>
    </div>
    <div class="btn_area">
        <button type="button" class="btn confirm-btn" onClick="contactModalOpen(); insertValue();">
            確認画面へ
        </button>
    </div>

    <div class="check_area">
        <p id="check"></p>
    </div>
</div>

<!-- 確認画面用モーダルウィンドウ -->
<div class="modal-blur">
    <div id="modal" class="modal-wrapper">
        <h2>お問い合わせ 内容確認</h2>
        <p class="modal-msg">
            お問い合わせ内容はこちらで宜しいでしょうか？<br />
            よろしければ「送信する」ボタンを押して下さい。
        </p>

        <form action="#" method="#" name="#">
            <div class="input_area">
                <p>名前</p>
                <p id="modal-name" class="modal-item"></p>

                <p>メールアドレス</p>
                <p id="modal-email" class="modal-item"></p>

                <p>お問い合わせ内容</p>
                <p id="modal-content" class="modal-item-text"></p>
            </div>
            <div class="btn_area">
                <input type="button" value="内容を修正する" class="modal-close-btn" onclick="contactModalClose();"><br>
                <button type="submit" class="submit-btn" name="submit">送信する</button>
            </div>
        </form>
    </div>
</div>
</form>

<script>
function check() {
	var name = document.getElementById("name");
	var email = document.getElementById("email");
	var content = document.getElementById("content");
	var ck = document.getElementById("check");
	ck.innerHTML = "";
	if (name.value == "") {
		ck.innerHTML = "名前が空欄です";
		return false;
	}
	if (email.value == "") {
		//空欄時
		ck.innerHTML = "メールアドレスが空欄です";
		return false;
	}
	//メールアドレスチェック
	if (email.value.indexOf("@") == -1 || email.value.indexOf(".") == -1) {
		ck.innerHTML = "メールアドレスが正確ではありません";
		return false;
	}

	if (content.value == "") {
		ck.innerHTML = "お問い合わせ内容が空欄です";
		return false;
	}

    return true;
}

function contactModalOpen() {
    if(check() == false) {
        return false;
    } else {
        $('.modal-blur').fadeIn();
    }
}

function contactModalClose() {
    $('.modal-blur').fadeOut();
}

function insertValue() {
    document.getElementById("modal-name").innerHTML = document.getElementById("name").value;
    document.getElementById("modal-email").innerHTML = document.getElementById("email").value;
    document.getElementById("modal-content").innerHTML = document.getElementById("content").value;
}
</script>