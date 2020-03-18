<style>
    /* フッター */
    .footer {
        height: 150px;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #36393f;
        color: #fff;
    }
</style>

<div class="footer">
    <p>&#169; 2020 E-match All Rights Reserved.</p>
</div>

<style>
    .before_msg a {
        color: #4485aa;
        text-decoration: none;
    }

    .before_msg a:visited {
        color: #976777;
    }

    .modal_container {
        width: 640px;
        margin: 0 auto;
        margin-top: 60px;
        margin-bottom: 60px;
        padding-top: 10px;
        border-radius: 2px;
        background: #36393f;
        box-shadow: 2px 3px 14px #0e0e0f;
        z-index: 2;
        color: white;
        position: fixed;
        top: 70px;
        left: calc(50vw - 320px);
        height: 70vh;
        overflow: scroll;
    }

    .title {
        text-align: center;
        font-size: 1.2rem;
        padding: 10px;
        margin: 0 auto;
        width: 95%;
        border-bottom: 0.04em solid #bdc3c7;
    }

    .item {
        position: relative;
        width: 95%;
        height: 100px;
        margin: 0 auto;
        padding: 10px;
        border-bottom: 0.04em solid #bdc3c7;
    }

    .before_msg {
        position: absolute;
        top: 15%;
        left: 10px;
        width: 420px;
        font-size: 14px;
    }

    .after_msg {
        position: absolute;
        top: 55%;
        left: 10px;
        font-size: 14px;
        width: 420px;
    }

    .permit_msg {
        color: #5aa681;
    }

    .reject_msg {
        color: #c0392b;
    }

    .modal_btn_area {
        position: absolute;
        top: 35%;
        right: 0;
    }

    .btn_allow {
        position: relative;
        border: none;
        width: 70px;
        font-size: 14px;
        padding: 3px;
        margin-right: 10px;
        border-radius: 2px;
        color: #fff;
        background: #5aa681;
        user-select: none;
        cursor: pointer;
    }

    .btn_deny {
        position: relative;
        border: none;
        width: 70px;
        font-size: 14px;
        padding: 3px;
        margin-right: 10px;
        border-radius: 2px;
        color: #fff;
        background: #c0392b;
        user-select: none;
        cursor: pointer;
    }

    .btn_allow:disabled,
    .btn_deny:disabled {
        background: #545454;
        cursor: no-drop;
    }

    .btn_profile {
        position: relative;
        display: block;
        text-align: center;
        border: none;
        width: 155px;
        font-size: 14px;
        padding: 3px;
        margin-right: 10px;
        border-radius: 2px;
        color: #fff;
        background: #2980b9;
        user-select: none;
        cursor: pointer;
        color: #fff;
        text-decoration: none;
    }

    .time {
        position: absolute;
        top: 76%;
        right: 10px;
        font-size: 14px;
        color: #8e8e8e;
    }

    .btn_close_area {
        text-align: center;
        padding: 30px;
    }

    .btn_close {
        position: relative;
        width: 155px;
        background: #666666;
        border: none;
        color: white;
        font-size: 14px;
        padding: 10px 20px;
        border-radius: 2px;
    }

    .btn_allow:active,
    .btn_deny:active,
    .btn_profile:active,
    .btn_close:active {
        top: 1px;
    }

    .btn_allow:hover {
        background: #62b28a;
    }

    .btn_deny:hover {
        background: #e74c3c;
    }

    .btn_allow:disabled:hover,
    .btn_deny:disabled:hover {
        background: #545454;
        cursor: no-drop;
    }

    .btn_profile:hover {
        background: #3498db;
    }

    .btn_close:hover {
        background: #b4b4b4;
    }

    @media (max-width: 600px) {
        .modal_container {
            width: 100vw;
            left: 0;
        }

        .title {
            font-size: 1.0rem;
        }

        .item {
            height: 150px;
        }

        .modal_btn_area {
            top: 70%;
            left: 10px;
        }

        .before_msg {
            width: 95vw;
            top: 10%;
        }

        .after_msg {
            width: 95vw;
            top: 40%;
        }

        .btn_close {
            width: 130px;
            height: 40px;
        }
    }
</style>

<div class="modal_container">
    <h3 class="title">ゲームプレイリクエスト</h3>
    <?php foreach ($rq as $i) {
        if ($i->user_id == $this->request->getCookie("user_id")) {
            switch ($i->user_stat) {
                case 1:
    ?>
                    <div class="item">
                        <p class="before_msg">
                            <a href="<?php echo $this->Url->build(["controller" => "profiledetail", "action" => "index"])?>?id=<?= $i->rq_user_id ?>"><?= $i->rq_name ?></a>さんへゲームプレイリクエストを送りました。
                        </p>
                        <p class="after_msg"></p>
                        <div class="modal_btn_area">
                            <a class="btn_profile" href="<?php echo $this->Url->build(["controller" => "profiledetail", "action" => "index"])?>?id=<?= $i->rq_user_id ?>">プロフィールを見る</a>
                        </div>
                        <p class="time">1分前</p>
                    </div>
                <?php break;
                case 2:
                ?>
                <div class="item rq_permitted">
                        <p class="before_msg">
                            <a href="<?php echo $this->Url->build(["controller" => "profiledetail", "action" => "index"])?>?id=<?= $i->rq_user_id ?>"><?= $i->rq_name ?></a>さんへゲームプレイリクエストを送りました。
                        </p>
                        <p class="after_msg permit_msg">
                            <?= $i->rq_name ?>さんからゲームプレイリクエストが許可されました。
                        </p>
                        <div class="modal_btn_area">
                            <a class="btn_profile" href="<?php echo $this->Url->build(["controller" => "profiledetail", "action" => "index"])?>?id=<?= $i->rq_user_id ?>">プロフィールを見る</a>
                        </div>
                        <p class="time">1分前</p>
                    </div>
                <?php break;
                case 3:
                ?>
                    <div class="item rq_rejected">
                        <p class="before_msg">
                            <a href="<?php echo $this->Url->build(["controller" => "profiledetail", "action" => "index"])?>?id=<?= $i->rq_user_id ?>"><?= $i->rq_name ?></a>さんへゲームプレイリクエストを送りました。
                        </p>
                        <p class="after_msg reject_msg">
                            <?= $i->rq_name ?>さんからゲームプレイリクエストを拒否されました。
                        </p>
                        <div class="modal_btn_area">
                            <a class="btn_profile" href="<?php echo $this->Url->build(["controller" => "profiledetail", "action" => "index"])?>?id=<?= $i->rq_user_id ?>">プロフィールを見る</a>
                        </div>
                        <p class="time">1分前</p>
                    </div>
                <?php break;
            }
        } else if($i->rq_user_id == $this->request->getCookie("user_id")){
            // リクエストされた側
            switch ($i->user_stat) {
                case 1:
                ?>
                    <div class="item">
                        <p id="before_msg" class="before_msg">
                            <a href="<?php echo $this->Url->build(["controller" => "profiledetail", "action" => "index"])?>?id=<?= $i->user_id ?>"><?= $i->username ?></a>さんからゲームプレイリクエストが届きました。
                        </p>
                        <p id="after_msg" class="after_msg"></p>
                        <div class="modal_btn_area">
                            <button type="button" name="?id=<?= $i->id ?>&ok=1&user_id=<?= $i->user_id ?>" class="btn_allow btn_permit">
                                許可
                            </button>
                            <button type="button" name="?id=<?= $i->id ?>&ok=0&user_id=<?= $i->user_id ?>" id="btn_reject" class="btn_reject btn_deny">
                                拒否
                            </button>
                        </div>
                        <p class="time">1分前</p>
                    </div>
                <?php break;
                case 2:
                ?>
                    <div class="item rq_permitted">
                        <p class="before_msg">
                            <a href="<?php echo $this->Url->build(["controller" => "profiledetail", "action" => "index"])?>?id=<?= $i->user_id ?>"><?= $i->username ?></a>さんからゲームプレイリクエストが届きました。
                        </p>
                        <p class="after_msg permit_msg">
                            <?= $i->username ?>さんからのゲームプレイリクエストを許可しました。
                        </p>
                        <div class="modal_btn_area">
                            <button type="button" class="btn_allow btn_permit" disabled>
                                許可
                            </button>
                            <button type="button" id="btn_reject" class="btn_deny" disabled>
                                拒否
                            </button>
                        </div>
                        <p class="time">1分前</p>
                    </div>
                <?php break;
                case 3:
                ?>
                <div class="item rq_rejected">
                    <p class="before_msg">
                        <a href="<?php echo $this->Url->build(["controller" => "profiledetail", "action" => "index"])?>?id=<?= $i->user_id ?>"><?= $i->username ?></a>さんからゲームプレイリクエストが届きました。
                    </p>
                    <p class="after_msg reject_msg">
                        <?= $i->username ?>さんからのゲームプレイリクエストを拒否しました。
                    </p>
                    <div class="modal_btn_area">
                        <button type="button" class="btn_allow btn_permit" disabled>
                            許可
                        </button>
                        <button type="button" id="btn_reject" class="btn_deny" disabled>
                            拒否
                        </button>
                    </div>
                    <p class="time">1分前</p>
                </div>
    <?php break;
            }
        }
    }
    ?>
    <div class="btn_close_area">
        <button type="button" class="btn_close" onclick="modalClose();">閉じる</button>
    </div>
</div>

<script>
    //リクエスト許可
    function request_Permit() {
        let msg = document.getElementById("after_msg");
        let name = "<?= $i->username ?>";

        // 許可メッセージ表示
        msg.innerHTML = name + "さんからのゲームプレイリクエストを許可しました。";
        msg.classList.add("permit_msg");

        // ボタン無効化
        var btnpermit = document.getElementsByClassName("btn_permit");
        for (var i = 0; i < btnpermit.length; i++) {
            btnpermit[i].disabled = "true";
        }
        var btnreject = document.getElementsByClassName("btn_reject");
        for (var i = 0; i < btnreject.length; i++) {
            btnreject[i].disabled = "true";
        }
        location.href = "<?php echo $this->Url->build(["action" => "okng"])?>" + this.name;
    }

    // リクエスト拒否
    function request_Reject() {
        let msg = document.getElementById("after_msg");
        let name = "<?= $i->username ?>";

        // 拒否メッセージ表示
        msg.innerHTML = name + "さんからのゲームプレイリクエストを拒否しました。";
        msg.classList.add("reject_msg");

        // ボタン無効化
        var btnpermit = document.getElementsByClassName("btn_permit");
        for (var i = 0; i < btnpermit.length; i++) {
            btnpermit[i].disabled = "true";
        }
        var btnreject = document.getElementsByClassName("btn_reject");
        for (var i = 0; i < btnreject.length; i++) {
            btnreject[i].disabled = "true";
        }
        location.href = "<?php echo $this->Url->build(["action" => "okng"])?>" + this.name;
    }

    var btnpermit = document.getElementsByClassName("btn_permit");
    for (var i = 0; i < btnpermit.length; i++) {
        btnpermit[i].addEventListener("click", request_Permit, false);
    }
    var btnreject = document.getElementsByClassName("btn_reject");
    for (var i = 0; i < btnreject.length; i++) {
        btnreject[i].addEventListener("click", request_Reject, false);
    }

    // 閉じるボタン
    function modalClose() {
        $(".modal_container").fadeOut();
    }

    $(".modal_container").css("display", "none");

    function modalOpen() {
        $(".modal_container").fadeIn();
        $('.sub-navigation-wrapper').slideToggle(500);
    }
</script>