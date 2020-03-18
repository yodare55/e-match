<style>
  /* common */
  i {
    margin-right: 7px;
  }

  body {
    background: #36393f;
  }

  li {
    list-style: none;
  }

  .game_wrapper {
    width: 1080px;
    margin: 0 auto;
    padding-top: 40px;
    color: #fff;
  }

  .game_wrapper h2 {
    font-size: 1.6rem;
    padding: 10px;
  }

  .game_wrapper h3 {
    margin-top: 20px;
    font-size: 1.2rem;
    padding-left: 20px;
  }

  .r6s_title {
    background-color: #494e6b;
    border-radius: 4px 4px 0 0;
  }

  .pubg_title {
    background-color: #ce9848;
    padding-left: 10px;
    border-radius: 4px 4px 0 0;
  }

  .lol_title {
    background-color: #3496a3;
    padding-left: 10px;
    border-radius: 4px 4px 0 0;
  }

  .wrapper {
    height: 390px;
    box-shadow: 1px 5px 14px #0e0e0f;
    margin-bottom: 40px;
    border-radius: 2px;
  }

  .row {
    width: 100%;
    height: 225px;
    padding: 20px 60px 0 60px;
  }

  .player {
    position: relative;
    width: 170px;
    height: 170px;
    padding: 10px;
    font-size: 12px;
    text-align: center;
    line-height: 20px;
    margin-left: 5px;
    margin-right: 5px;
    border-radius: 10px;
    margin-bottom: 10px;
    color: black;
    background: #fff;
  }

  .player img {
    border-radius: 50%;
    width: 80px;
    height: 80px;
    margin: 0 auto;
  }

  .player a {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    text-indent: -999px;
  }

  .more {
    width: 94%;
    text-align: right;
  }

  .more a {
    color: #fff;
    text-decoration: none;
  }

  .slick-next {
    right: 25px;
  }

  .slick-prev {
    left: 15px;
  }

  .slick-prev:before {
    font-size: 2rem;
    line-height: 1;
    outline: 0;
  }

  .slick-next:before {
    font-size: 2rem;
    line-height: 1;
    outline: 0;
  }

  .info-msg {
    font-size: 1.2rem;
    text-align: center;
    margin-top: 80px;
  }

  /* Medium Screen */
  @media (max-width: 960px) {
    .game_wrapper {
      width: 95vw;
    }

    .game_wrapper h2 {
      font-size: 1.3rem;
    }

    .game_wrapper h3 {
      font-size: 1rem;
    }

    .player img {
      width: 64px;
      height: 64px;
    }

    .info-msg {
      font-size: 1rem;
    }
  }

  /* Small Screen */
  @media (max-width: 600px) {
    .game_wrapper {
      width: 100vw;
    }

    .wrapper {
      width: 100vw;
      height: 350px;
      box-shadow: none;
    }

    .game_wrapper h2 {
      font-size: 1rem;
    }

    .r6s_title {
      border-radius: 0;
    }

    .pubg_title {
      border-radius: 0;
    }

    .lol_title {
      border-radius: 0;
    }

    .info-msg {
      font-size: 0.8rem;
    }
  }
</style>

<div class="game_wrapper">
  <div class="wrapper">
    <h2 class="r6s_title"><i class="fas fa-gamepad"></i>Rainbow Six Siege</h2>
    <h3 id="r6s_h3">おすすめのプレイヤー</h3>
    <div id="r6s_row" class="row"></div>
    <div id="r6s_more" class="more">
      <a href="<?php echo $this->Url->build(["controller" => "playerdetail", "action" => "index"]) ?>?g=r6s">もっと見る</a>
    </div>
  </div>

  <div class="wrapper">
    <h2 class="pubg_title"><i class="fas fa-gamepad"></i>Player Unknown's Battle Ground</h2>
    <h3 id="pubg_h3">おすすめのプレイヤー</h3>
    <div id="pubg_row" class="row"></div>
    <div id="pubg_more" class="more">
      <a href="<?php echo $this->Url->build(["controller" => "playerdetail", "action" => "index"]) ?>?g=pubg">もっと見る</a>
    </div>
  </div>
  <div class="wrapper">
    <h2 class="lol_title"><i class="fas fa-gamepad"></i>League Of Legends</h2>
    <h3 id="lol_h3">おすすめのプレイヤー</h3>
    <div id="lol_row" class="row"></div>
    <div id="lol_more" class="more">
      <a href="<?php echo $this->Url->build(["controller" => "playerdetail", "action" => "index"]) ?>?g=lol">もっと見る</a>
    </div>
  </div>
</div>

<script>
  //プレイヤー表示数
  const R6SPLAYER_COUNT = <?= h($r6sCnt) ?>;
  const PUBGPLAYER_COUNT = <?= h($pubgCnt) ?>;
  const LOLPLAYER_COUNT = <?= h($lolCnt) ?>;
  const IMAGEPATH = "/img/";
  const R6SFLG = <?= h($r6sFlg) ?>;
  const PUBGFLG = <?= h($pubgFlg) ?>;
  const LOLFLG = <?= h($lolFlg) ?>;

  // プレイヤーカウント
  let currentCnt = 0;

  // ---------------- R6Sプレイヤーの表示 ------------------
  function r6sPlayerDisp(playerCnt, flg) {
    if (flg == 1 && playerCnt != 0) {
      // 変数宣言
      let div = "";
      let row = document.getElementById("r6s_row");
      let r6sData = JSON.parse('<?= $r6sPlayerInfo ?>');
      for (let i = 0; i < playerCnt; i++) {
        cnt = i + 1;
        div = `
      <div class="player" id="r6s_player${cnt}">
        <img src="${IMAGEPATH + r6sData[i]['thumbnail']}" alt="プロフィール画像">
        <ul>
          <li>${r6sData[i]['username'] }</li>
          <li>Level:${r6sData[i]['level']}</li>
          <li>Rank:${r6sData[i]['rank']}</li>
        </ul>
        <a href="<?php echo $this->Url->build(["controller" => "profiledetail", "action" => "index"]) ?>?id=${r6sData[i]['accountid']}"></a>
      </div>
      `
        row.innerHTML = row.innerHTML + div;

        //currentCntに現在のiの値を保存
        currentCnt = i;
      }

    } else {
      r6s = "r6s";
      infoMsg(r6s);
    }
  }

  // ---------------- PUBGプレイヤーの表示 ------------------
  function pubgPlayerDisp(playerCnt, flg) {
    if (flg == 1 && playerCnt != 0) {
      let row = document.getElementById("pubg_row");
      let pubgData = JSON.parse('<?= $pubgPlayerInfo ?>');

      for (let i = 0; i < playerCnt; i++) {
        cnt = i + 1;
        div = `
      <div class="player" id="pubg_player${cnt}">
        <img src="${IMAGEPATH + pubgData[i]['thumbnail']}" alt="プロフィール画像">
        <ul>
          <li>${pubgData[i]['username']}</li>
          <li>SoloRank: ${pubgData[i]['soloRank']}</li>
          <li>RankPoints: ${pubgData[i]['rankPoints']}</li>
        </ul>
        <a href="<?php echo $this->Url->build(["controller" => "profiledetail", "action" => "index"]) ?>?id=${pubgData[i]['id']}"></a>
      </div>
      `
        row.innerHTML = row.innerHTML + div;
        currentCnt = i;
      }
    } else {
      pubg = "pubg";
      infoMsg(pubg);
    }
  }

  // ---------------- LOLプレイヤーの表示 ------------------
  function lolPlayerDisp(playerCnt, flg) {

    if (flg == 1 && playerCnt != 0) {
      // 変数宣言
      let div = "";
      let row = document.getElementById("lol_row");
      let lolData = JSON.parse('<?= $lolPlayerInfo ?>');
      for (let i = 0; i < playerCnt; i++) {
        cnt = i + 1;
        div = `
        <div class="player" id="lol_player${cnt}">
          <img src="${IMAGEPATH + lolData[i]['thumbnail']}" alt="プロフィール画像">
          <ul>
              <li>${lolData[i]['username'] }</li>
              <li>Rank: ${lolData[i]['soloRank']}</li>
              <li>LeaguePoints: ${lolData[i]['leaguePoints']}</li>
          </ul>
          <a href="<?= $this->Url->build(["controller" => "profiledetail", "action" => "index"]) ?>?id=${lolData[i]['accountid']}"></a>
        </div>
    `
        row.innerHTML = row.innerHTML + div;
        // currentCntに現在のiの値を保存
        currentCnt = i;
      }
    } else {
      lol = "lol";
      infoMsg(lol);
    }
  }

  function infoMsg(gameTitle) {
    var row = "";
    var more = "";
    var h3 = ""
    switch (gameTitle) {
      case "r6s":
        h3 = document.getElementById("r6s_h3");
        row = document.getElementById("r6s_row");
        more = document.getElementById("r6s_more");
        break;
      case "pubg":
        h3 = document.getElementById("pubg_h3");
        row = document.getElementById("pubg_row");
        more = document.getElementById("pubg_more");
        break;
      case "lol":
        h3 = document.getElementById("lol_h3");
        row = document.getElementById("lol_row");
        more = document.getElementById("lol_more");
        break;
    }
    div = `
    <p class="info-msg">登録されていません</p>
    `
    row.innerHTML = row.innerHTML + div;
    h3.innerHTML = "";
    more.innerHTML = "";
  }

  // ----------------- R6S Player SlideShow -----------------
  function r6sPlayerSlide(flg) {
    if (flg == 1) {
      $('#r6s_row').slick({
        autoplay: true,
        infinite: true,
        arrows: true,
        autoplaySpeed: 5000,
        slidesToShow: 6,
        slidesToScroll: 2,
        responsive: [{
          breakpoint: 960, //ブレークポイントが1000px
          settings: {
            slidesToShow: 4, //表示するスライドの数
            slidesToScroll: 2, //スクロールで切り替わるスライドの数
          }
        }, {
          breakpoint: 600, //ブレークポイントが480px
          settings: {
            slidesToShow: 2, //表示するスライドの数
            slidesToScroll: 2, //スクロールで切り替わるスライドの数
          }
        }, {
          breakpoint: 480, //ブレークポイントが480px
          settings: {
            slidesToShow: 1, //表示するスライドの数
            slidesToScroll: 1, //スクロールで切り替わるスライドの数
          }
        }, ]
      });
    }
  }

  // ----------------- PUBG Player SlideShow -----------------
  function pubgPlayerSlide(flg) {
    if (flg == 1) {
      $('#pubg_row').slick({
        autoplay: true,
        infinite: true,
        arrows: true,
        autoplaySpeed: 5000,
        slidesToShow: 6,
        slidesToScroll: 2,
        responsive: [{
          breakpoint: 960, //ブレークポイントが1000px
          settings: {
            slidesToShow: 4, //表示するスライドの数
            slidesToScroll: 2, //スクロールで切り替わるスライドの数
          }
        }, {
          breakpoint: 600, //ブレークポイントが480px
          settings: {
            slidesToShow: 2, //表示するスライドの数
            slidesToScroll: 2, //スクロールで切り替わるスライドの数
          }
        }, {
          breakpoint: 480, //ブレークポイントが480px
          settings: {
            slidesToShow: 1, //表示するスライドの数
            slidesToScroll: 1, //スクロールで切り替わるスライドの数
          }
        }, ]
      });
    }
  }

  // ----------------- LOL Player SlideShow -----------------
  function lolPlayerSlide(flg) {
    if (flg == 1) {
      $('#lol_row').slick({
        autoplay: true,
        infinite: true,
        arrows: true,
        autoplaySpeed: 5000,
        slidesToShow: 6,
        slidesToScroll: 2,
        responsive: [{
          breakpoint: 960, //ブレークポイントが1000px
          settings: {
            slidesToShow: 4, //表示するスライドの数
            slidesToScroll: 2, //スクロールで切り替わるスライドの数
          }
        }, {
          breakpoint: 600, //ブレークポイントが480px
          settings: {
            slidesToShow: 2, //表示するスライドの数
            slidesToScroll: 2, //スクロールで切り替わるスライドの数
          }
        }, {
          breakpoint: 480, //ブレークポイントが480px
          settings: {
            slidesToShow: 1, //表示するスライドの数
            slidesToScroll: 1, //スクロールで切り替わるスライドの数
          }
        }, ]
      });
    }
  }

  // ページ読み込み時処理
  window.onload = function playerDisp() {
    r6sPlayerDisp(R6SPLAYER_COUNT, R6SFLG);
    pubgPlayerDisp(PUBGPLAYER_COUNT, PUBGFLG);
    lolPlayerDisp(LOLPLAYER_COUNT, LOLFLG);
    r6sPlayerSlide(R6SFLG);
    pubgPlayerSlide(PUBGFLG);
    lolPlayerSlide(LOLFLG);
  }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>