<style>
/* common */
.complete {
    background: #36393f;
    color: #fff;
    width: 400px;
    margin: 0 auto;
    padding-top: 100px;
    border-radius: 2px;
    user-select: none;
}

.complete h2 {
    font-size: 1.5rem;
    text-align: center;
    padding: 20px 0 30px 0;
    letter-spacing: 3px;
}

.complete p {
    text-align: center;
    padding-bottom: 50px;
}

/* medium screen */

@media (max-width: 1024px) {
    .complete {
        width: 100vw;
    }
}

/* small screen */
@media (max-width: 768px) {
    .complete h2 {
        font-size: 1.2rem;
    }

    .complete p {
        font-size: 14px;
    }
}


/* midum screen */

@media (max-width: 1024px) {
    .complete {
        width: 100vw;
    }
}

/* small screen */
@media (max-width: 768px) {
    .complete h2 {
        font-size: 1.2rem;
    }

    .complete p {
        font-size: 14px;
    }
}

</style>

<div class="complete">
    <h2>アカウント登録完了</h2>
    <p>
        アカウントの登録が完了しました。<br />自動的にプロフィール登録ページに移動します。
    </p>
</div>

<script>
function autoLink() {
	 location.href = "<?php echo $this->Url->build(["controller"=>"profilereg","action"=>"index"])?>"; // プロフィール登録画面へのリンクへ移動 仮でtopと入れている。
	}

	setTimeout("autoLink()",5000); // 5秒後にプロフィール登録画面へ自動的に移動

</script>