<style>
    /*  common */

    /* メインビジュアル */
    .eyecatch {
        position: relative;
    }

    .eyecatch img {
        max-width: 100%;
    }

    /* メインビジュアル内のコメント */
    .eyecatch p {
        position: absolute;
        top: 50%;
        left: 51%;
        transform: translateY(-50%) translateX(-50%);
        width: 90vw;
        font-size: 2vw;
        line-height: 3vw;
        font-weight: bold;
        padding: 10px;
        color: #fff;
        text-align: center;
        user-select: none;
        background: linear-gradient(to right,
                transparent,
                rgba(0, 0, 0, 0.5),
                25%,
                rgba(0, 0, 0, 0.5),
                75%,
                transparent);
    }

    /* 各セクションの定義 */
    section {
        width: 960px;
        margin: 0 auto;
        margin-top: 90px;
        color: #fff;
        text-align: center;
    }

    section h2 {
        font-size: 2.8rem;
    }

    /* E-matchの使い方 */
    .guide_block {
        display: flex;
        height: 350px;
        justify-content: space-around;
        align-items: center;
    }

    .img1 {
        border-radius: 50%;
        width: 230px;
        height: 230px;
    }

    .img2 {
        border-radius: 20px;
        width: 200px;
        height: 250px;
    }

    .img3 {
        border-radius: 20px;
        width: 220px;
        height: 200px;
    }

    /* 奇数行の画像と文を逆転*/
    .guide_block:nth-child(odd) {
        flex-direction: row-reverse;
    }

    /* E-matchの使い方のコメント */
    .desc h3 {
        font-size: 1.8rem;
    }

    .desc p {
        margin-top: 20px;
        font-size: 1.1rem;
        line-height: 2rem;
    }

    .desc-right {
        text-align: right;
    }

    .desc-left {
        text-align: left;
    }

    /* ゲームタイトル */
    .game_title ul {
        margin-top: 20px;
    }

    .game_title li {
        font-size: 1.5rem;
        list-style: none;
        text-align: center;
        line-height: 4rem;
    }

    /* アカウント登録 */
    .account_reg {
        padding-bottom: 90px;
    }

    .account_reg p {
        margin-top: 10px;
        text-align: center;
    }

    /* アカウント登録ボタンラッパー */
    .btn_wrapper {
        display: flex;
        justify-content: center;
        margin-top: 60px;
    }

    /* アカウント登録ボタン2 */
    .register_btn2 {
        position: relative;
        text-align: center;
        width: 320px;
        padding: 10px;
        margin: 5px;
        border: none;
        border-radius: 2px;
        color: #fff;
        cursor: pointer;
        background: #c66787;
        user-select: none;
        font-size: 1rem;
    }

    .register_btn2:hover {
        background: #d16e8f;
    }

    .register_btn2:active {
        top: 1px;
    }

    .login_btn2 {
        color: #4485aa;
    }

    .login_btn2:visited {
        color: #976777;
    }

    .logout {
        width: 100vw;
        height: 25px;
        text-align: center;
        color: white;
        background: #c66787;
        font-size: 14px;
        line-height: 30px;
        display: none;
    }

    /* Medium Screen */
    @media (max-width: 960px) {

        .guide,
        .game_title,
        .account_reg {
            width: 90vw;
        }

        section h2 {
            font-size: 1.8rem;
        }

        .guide h2 {
            margin-bottom: 30px;
        }

        .guide_block {
            display: block;
        }

        .guide_block:nth-child(3) {
            margin-bottom: 120px;
        }

        .desc {
            text-align: center;
        }

        .desc h3 {
            font-size: 1.2rem;
        }

        .desc p {
            font-size: 1rem;
            line-height: 1.1rem;
            margin-bottom: 20px;
        }

        .img1 {
            width: 180px;
            height: 180px;
        }

        .img2 {
            width: 150px;
            height: 200px;
        }

        .img3 {
            width: 170px;
            height: 150px;
        }
    }

    /*  Small Screen*/
    @media (max-width: 600px) {
        .eyecatch p {
            font-size: 3.8vw;
            line-height: 1.4rem;
        }

        .eyecatch img {
            width: 100%;
            height: auto;
        }

        .guide {
            margin-top: 40px;
        }

        .guide_block {
            margin-bottom: 20px;
            height: 250px;
        }

        section h2 {
            font-size: 1.4rem;
        }

        .desc h3 {
            margin-top: 40px;
            font-size: 1rem;
        }

        .desc p {
            font-size: 0.8rem;
            line-height: 1rem;
        }

        .game_title li {
            font-size: 1.1rem;
        }

        .img1 {
            width: 130px;
            height: 130px;
        }

        .img2 {
            width: 120px;
            height: 170px;
        }

        .img3 {
            width: 140px;
            height: 120px;
        }

        .register_btn2 {
            width: 200px;
            height: 40px;
            font-size: 0.8rem;
        }
    }

    /* topに戻る */
    #page_top {
        width: 50px;
        height: 50px;
        position: fixed;
        right: 20px;
        bottom: 10px;
        background: #3f98ef;
        opacity: 0.6;
        border-radius: 50%;
    }

    #page_top a {
        position: relative;
        display: block;
        width: 50px;
        height: 50px;
        text-decoration: none;
    }

    #page_top a::before {
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        content: '\f102';
        font-size: 25px;
        color: #fff;
        position: absolute;
        width: 25px;
        height: 25px;
        top: -5px;
        bottom: 0;
        right: 0;
        left: 0;
        margin: auto;
        text-align: center;
    }
</style>

<div class="logout">ログアウトしました</div>
<div class="bg"></div>
<!-- eyecatch -->
<div class="eyecatch">
    <picture>
        <source media="(min-width: 600px)" srcset="https://school.oohara.jp/kudo/img/eyecatch.jpeg">
        <img src="https://school.oohara.jp/kudo/img/eyecatch_mobile.jpeg">
    </picture>
    <p id="letter">
        あなたにピッタリのゲーム仲間を見つけよう！<br />E-matchはあなたと同じ価値観を持った<br />プレイヤーとマッチングすることができます！
    </p>
</div>
<!-- /eyecatch -->

<!-- guide -->
<section class="guide">
    <h2>E-matchの使い方</h2>
    <div class="guide_block">
        <div class="desc desc-right">
            <h3>１．メールアドレスを登録</h3>
            <p>アカウント登録画面からメールアドレスを登録します。</p>
        </div>
        <img class="img1" src="https://school.oohara.jp/kudo/img/guide_img1.jpg" alt="ガイド画像1" />
    </div>
    <div class="guide_block">
        <div class="desc desc-left">
            <h3>２．プロフィールを登録</h3>
            <p>
                自分のプロフィールを登録しましょう！<br />具体的に書くことで同じ価値観を持ったプレイヤーと<br />一緒にプレイできる可能性が高くなります。
            </p>
        </div>
        <img class="img2" src="https://school.oohara.jp/kudo/img/guide_img2.jpg" alt="ガイド画像2" />
    </div>
    <div class="guide_block">
        <div class="desc desc-right">
            <h3>３．プレイヤーにリクエストを出す</h3>
            <p>
                希望のプレイヤーを見つけてリクエストしましょう。<br />リクエストが許可されるとお互いのDiscord、SkypeのIDが<br />プロフィールから閲覧できプレイヤー同士の交流が可能になります。
            </p>
        </div>
        <img class="img3" src="https://school.oohara.jp/kudo/img/guide_img3.jpg" alt="ガイド画像3" />
    </div>
</section>
<!-- /guide -->

<!-- game_title -->
<section class="game_title">
    <h2>ゲームタイトル</h2>
    <ul>
        <li>Rainbow Six Siege</li>
        <li>Player Unknown's Battle Ground</li>
        <li>League Of Legends</li>
    </ul>
</section>
<!-- /guide -->

<!-- account_reg -->
<?php if (empty($this->request->getCookie("user"))) { ?>
    <section class="account_reg">
        <h2>アカウント登録</h2>
        <div class="btn_wrapper">
            <button type="button" class="register_btn2" onclick="location.href ='<?php echo $this->Url->build(["controller" => "accountreg", "action" => "index"]) ?>'">アカウント登録</button>
        </div>
        <p>登録済みの方はこちらから<a href="<?php echo $this->Url->build(["controller" => "login", "action" => "index"]) ?>" class="login_btn2">ログイン</a></p>
    </section>
<?php } ?>
<!-- /account_reg -->
<div id="page_top"><a href="#"></a></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    jQuery(function() {
        var appear = false;
        var pagetop = $('#page_top');
        $(window).scroll(function() {
            if ($(this).scrollTop() > 200) { //200pxスクロールしたら
                if (appear == false) {
                    appear = true;
                    pagetop.stop().animate({
                        'bottom': '50px' //下から50pxの位置に
                    }, 300); //0.3秒かけて現れる
                }
            } else {
                if (appear) {
                    appear = false;
                    pagetop.stop().animate({
                        'bottom': '-50px' //下から-50pxの位置に
                    }, 300); //0.3秒かけて隠れる
                }
            }
        });
        pagetop.click(function() {
            $('body, html').animate({
                scrollTop: 0
            }, 500); //0.5秒かけてトップへ戻る
            return false;
        });
    });
</script>