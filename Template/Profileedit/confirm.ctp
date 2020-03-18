<style>
* {
    box-sizing: border-box;
    font-family: "Varela Round", "Gill Sans", "Noto Sans JP", sans-serif;
}

body {
    background: #36393f;
    color: white;
    letter-spacing: 0.5px;
}

.outer {
    text-align: left;
}

.outer h2 {
    padding-top: 50px;
    text-align: center;
    letter-spacing: 3px;
}

.inner {
    margin-top: 30px;
}

table {
    border-collapse: collapse;
    border: solid 2px gray;
    margin: 0 auto;
}

table th, table td {
    border: dashed 1px gray;
}

table tr, table th, table td {
    padding: 15px;
}

img {
    border-radius:  50%;
}

.btn-area {
    margin-top: 30px;
    text-align: center;
}

.reg-btn {
    position: relative;
    font-size: 16px;
    width: 200px;
    color: #fff;
    background-color: #5aa682;
    padding: 10px;
    border-radius: 2px;
    border: none;
    user-select: none;
    cursor: pointer;
    outline: 0;
    }

    .reg-btn:hover {
    background-color: #6bc499;
    }

.reg-btn:active {
    top: 1px;
}

.back-btn {
    position: relative;
    margin-left: 10px;
    font-size: 16px;
    width: 200px;
    color: #000;
    background-color: #ccc;
    padding: 10px;
    border-radius: 2px;
    border: none;
    user-select: none;
    cursor: pointer;
    outline: 0;
}

.back-btn:hover {
    background-color: #fff;
}

.back-btn:active {
    top: 1px;
}
.top-msg {
    text-align: center;
    margin-top: 10px;
}

    /* Medium Screen */
    @media (max-width: 960px) {
        .outer {
            width: 100vw;
        }

        .inner {
            width: 100vw;
        }

        table tr, table th, table td {
            padding: 5px;
        }
    }

    /* Small Screen */
    @media (max-width: 640px) {
        .reg-btn,
        .back-btn {
            width: 100px;
        }
        .last td:last-child {
            border-bottom: solid 1px #ccc;
            width: 100%;
        }
        .tbl-r02 {
            width: 80%;
        }
        .tbl-r02 th,
        .tbl-r02 td {
            border-bottom: none;
            display: block;
            width: 100%;
            /* border: solid 1px gray; */
        }
        .tbl-r02 th {
            background: gray;
        }
    }
</style>
<div class="outer">
    <h2>プロフィール確認画面</h2>
    <p class="top-msg">下記の内容よろしいですか？<br>よろしければ登録ボタンを押してください。</p>
    <div class="inner">
        <?php echo $this->Form->create(null, ["type" => "post", "url" => ["action" => "register"]]) ?>
        <input type="hidden" name="thumbnail" value="<?= h($file); ?>">
        <input type="hidden" name="r6sFlg" value="<?= h($r6sFlg); ?>">
        <input type="hidden" name="pubgFlg" value="<?= h($pubgFlg); ?>">
        <input type="hidden" name="lolFlg" value="<?= h($lolFlg); ?>">
        <input type="hidden" name="myIntro" value="<?= h($myIntro); ?>">
        <input type="hidden" name="r6sName" value="<?= h($r6sName); ?>">
        <input type="hidden" name="pubgName" value="<?= h($pubgName); ?>">
        <input type="hidden" name="lolName" value="<?= h($lolName); ?>">
        <input type="hidden" name="r6sGoal" value="<?= h($r6sRank); ?>">
        <input type="hidden" name="pubgGoal" value="<?= h($pubgRank); ?>">
        <input type="hidden" name="lolGoal" value="<?= h($lolRank); ?>">
        <input type="hidden" name="myTeam" value="<?= h($myTeam); ?>">
        <input type="hidden" name="val" value="<?= h($val); ?>">
        <input type="hidden" name="tmt" value="<?= h($tmt); ?>">
        <input type="hidden" name="discord" value="<?= h($discord); ?>">
        <input type="hidden" name="skype" value="<?= h($skype); ?>">

        <table border="1" width="760" class="tbl-r02">
            <tr height="120">
                <th width="300">プロフィール画像</th>
                <td colspan="2">
                    <img src="<?= h($this->Url->image($file)) ?>" width="80" height="80" alt="プロフィール画像">
                </td>
            </tr>
            <tr>
                <th rowspan="1">マッチングしたいゲームタイトル</th>
                <td colspan="2">
                <?php foreach ($titleArray as $titles) : ?>
                    <span><?= h($titles); ?><br></span>
                <?php endforeach ?>
                </td>
            </tr>
            <tr height="40">
                <th rowspan="3">プレイヤー名</th>
                <td><span id="game-r6s">Rainbow Six Siege</span></td>
                <td><span><?= h($r6sName); ?></span></td>
            </tr>
            <tr height="40">
                <td><span id="game-pubg">Player Unknown's Battle Ground</span></td>
                <td><span><?= h($pubgName); ?></span></td>
            </tr>
            <tr height="40">
                <td><span id="game-lol">League Of Legends</span></td>
                <td><span><?= h($lolName); ?></span></td>
            </tr>
            <tr height="40">
                <th rowspan="3">目標ランク</th>
                <td><span id="game-r6s">Rainbow Six Siege</span></td>
                <td><span><?= h($r6sRank); ?></span></td>
            </tr>
            <tr height="40">
                <td><span id="game-pubg">Player Unknown's Battle Ground</span></td>
                <td><span><?= h($pubgRank); ?></span></td>
            </tr>
            <tr height="40">
                <td><span id="game-lol">League Of Legends</span></td>
                <td><span><?= h($lolRank); ?></span></td>
            </tr>
            <tr>
                <th>自己紹介</th>
                <td colspan="2">
                    <span><?= nl2br(h($myIntro)); ?></span>
                </td>
            </tr>
            <tr height="40">
                <th>所属チーム</th>
                <td colspan="2"><span><?= h($myTeam); ?></span></td>
            </tr>
            <tr height="40">
                <th>ゲームプレイをする上での価値観</th>
                <td colspan="2"><span><?= h($values); ?></span></td>
            </tr>
            <tr height="40">
                <th>大会出場有無</th>
                <td colspan="2"><span><?= h($tournament); ?></span></td>
            </tr>
            <tr height="40">
                <th rowspan="2">ボイスチャット</th>
                <td><span>Discord</span></td>
                <td><span><?= h($discord); ?></span></td>
            </tr>
            <tr class="last" height="40">
                <td><span>Skype</span></td>
                <td><span><?= h($skype); ?></span></td>
            </tr>
        </table>
        <div class="btn-area">
            <input type="submit" id="btn" class="reg-btn" value="登録">
            <input type="button" id="back-btn" class="back-btn" onClick="window.history.back();" value="修正する">
        </div>
        </form>
    </div>
</div>