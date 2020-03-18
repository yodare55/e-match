<style>
	input[type="text"]:focus {
		outline-color: #5aa680;
		outline: 2px solid #5aa680;
	}

	textarea:focus {
		outline-color: #5aa680;
		outline: 2px solid #5aa680;
	}


	.profile-wrapper {
		width: 960px;
		margin: 0 auto;
		padding-top: 40px;
		margin-bottom: 50px;
		border-radius: 2px;
		background: #36393F;
	}

	.profile-wrapper h2 {
		padding-top: 20px;
		text-align: center;
		letter-spacing: 3px;
	}

	.desc {
		margin-bottom: 10px;
	}

	form {
		width: 960px;
		margin: 0 auto;
		padding: 20px 50px;
		border-radius: 2px;
	}

	label {
		width: 180px;
		font-weight: bold;
		display: flex;
		align-items: center;
	}

	img {
		border-radius: 50%;
	}

	select {
		font-size: 16px;
	}

	.upbtn_label {
		position: relative;
		border: none;
		margin: 22px 20px;
		padding: 2px;
		border-radius: 2px;
		max-width: 130px;
		text-align: center;
		display: block;
		background-color: #666666;
		color: #fff;
		user-select: none;
		cursor: pointer;
	}

	.upbtn_label:hover {
		background-color: #c6c6c6;
	}

	.upbtn_label:active {
		top: 1px;
	}

	span {
		font-size: 1rem;
	}

	input {
		border-radius: 2px;
		font-size: 14px;
		padding: 5px;
		border: none;
	}

	input[type="text"] {
		width: 300px;
		height: 30px;
	}

	input[type="text"]:disabled {
		background: #aaa;
		cursor: not-allowed;
	}

	.inner-row input[type="checkbox"],
	.inner-row input[type="radio"] {
		position: relative;
		top: -2px;
		margin-right: 5px;
	}

	textarea {
		font-size: 14px;
		width: 450px;
		border-radius: 2px;
	}

	.outher-row {
		display: flex;
		margin-bottom: 30px;
	}

	.row {
		margin-bottom: 15px;
	}

	.r6s-margin {
		margin-right: 108px;
	}

	.pubg-margin {
		margin-right: 8px;
	}

	.lol-margin {
		margin-right: 103px;
	}

	.column {
		flex-direction: column;
	}

	.require-item {
		color: red;
		font-size: 12px;
	}

	.reg-btn-area {
		margin-top: 10px;
		text-align: center;
	}

	.reg-btn {
		position: relative;
		font-size: 16px;
		width: 250px;
		height: 40px;
		color: #fff;
		background-color: #5AA682;
		margin-top: 30px;
		margin-bottom: 30px;
		padding: 10px;
		border-radius: 4px;
		border: none;
		user-select: none;
		cursor: pointer;
		outline: 0;
		-webkit-appearance: none;
		/* iOSリセット */
		border-radius: 0;
		/* iOSリセット */
	}

	a {
		color: #fff;
		text-decoration: none;
	}

	.reg-btn:hover {
		background-color: #6bc499;
	}

	.reg-btn:active {
		top: 1px;
	}

	.ext-msg {
		margin-left: 10px;
		color: red;
		line-height: 26px;
		font-size: 12px;
	}

	.warning-msg {
		font-size: 12px;
	}

	.err-msg {
		margin-left: 10px;
		color: red;
		font-size: 12px;
	}

	/* Medium Screen */
	@media (max-width: 960px) {
		.profile-wrapper {
			width: 100vw;
		}

		form {
			width: 100vw;
		}

		input[type="text"] {
			display: block;
		}

		textarea {
			width: 350px;
		}

	}

	/* Small Screen */
	@media (max-width: 600px) {
		.outher-row {
			display: block;
		}

		.outher-row img {
			display: block;
			margin: 0 auto;
			margin-top: 30px;
			margin-bottom: 30px;
		}

		.warning-msg {
			margin-left: 10px;
		}

		.upbtn_label {
			display: block;
			margin: 0 auto;
			margin-top: 10px;
			margin-bottom: 20px;
		}

		.r6s-margin,
		.pubg-margin,
		.lol-margin {
			margin-left: 10px;
		}

		select {
			display: block;
			margin-top: 5px;
			margin-left: 10px;
		}

		textarea {
			margin-left: 10px;
			width: 70vw;
			height: 400px;
		}

		.desc {
			text-align: center;
		}

		input[type="radio"] {
			margin-left: 10px;
			margin-bottom: 20px;
		}

		input[type="checkbox"] {
			margin-left: 10px;
			transform: scale(1.2);
		}

		input[type="text"] {
			margin-top: 10px;
			margin-left: 10px;
			width: 70vw;
			font-size: 12px;
		}

		label {
			display: block;
			margin-bottom: 20px;
		}

		.reg-btn {
			width: 150px;
		}
	}
</style>

<div class="profile-wrapper">
	<h2>プロフィール編集</h2>
	<?= $this->Form->create(null, ["type" => "post", "enctype" => "multipart/form-data", "name" => "form1", "id" => "profile-form", "url" => ["action" => "confirm"]]) ?>
	<p class="desc"><span class="require-item">*</span>は入力必須の項目です</p>

	<div class="outher-row">
		<label>プロフィール画像</label>
		<img id="file-preview" src="<?= h($this->Url->image($user->pf_img)) ?>" width="80" height="80" alt="プロフィール画像">
		<div class="column">
			<label class="upbtn_label">
				ファイル選択
				<input type="file" name="thumbnail-file" id="uploadFile" class="upbtn" style="display: none" accept="image/png,image/jpeg,image/jpg">
			</label>
			<span class="warning-msg">※拡張子「.jpg」「.jpeg」「.png」のファイルを選択してください </span><br>
			<span id="ext-check" class="ext-msg"></span>
		</div>
	</div>

	<div class="outher-row">
		<label>マッチングしたい<br>ゲームタイトル<span class="require-item">*</span></label>
		<div class="inner-row column">
			<div class="row">
				<input type="checkbox" id="r6s-title" class="validate[required,minCheckbox[1]]" name="game-title[]" value="1" onclick="connectText('r6s-myName', this.checked);connectText('r6s-rank-select', this.checked);"
				<?= $user->r6s_flg === 1 ? "checked" : "" ?>>
				<span>Rainbow Six Siege</span>
			</div>
			<div class="row">
				<input type="checkbox" id="pubg-title" class="validate[required,minCheckbox[1]]" name="game-title[]" value="2" onclick="connectText('pubg-myName', this.checked);connectText('pubg-rank-select', this.checked)"
				<?= $user->pubg_flg === 1 ? "checked" : "" ?>>
				<span>Player Unknown's Battle Ground</span>
			</div>
			<div class="row">
				<input type="checkbox" id="lol-title" class="validate[required,minCheckbox[1]]" name="game-title[]" value="3" onclick="connectText('lol-myName', this.checked);connectText('lol-rank-select', this.checked)"
				<?= $user->lol_flg === 1 ? "checked" : "" ?>>
				<span>League Of Legends</span>
			</div>
		</div>
	</div>

	<div class="outher-row">
		<label>プレイヤー名<span class="require-item">*</span></label>
		<div class="inner-row column">
			<div class="row">
				<span class="r6s-margin">Rainbow Six Siege</span>
				<input type="text" name="r6s-name" id="r6s-myName" class="validate[condRequired[r6s-title],minSize[3],maxSize[15],custom[r6sCheck]]" placeholder="プレイヤー名を入力してください" <?= $user->r6s_flg === 1 ? "value=" . h($user->r6s_name) : "disabled" ?>>
			</div>
			<div class="row">
				<span class="pubg-margin">Player Unknown's Battle Ground</span>
				<input type="text" name="pubg-name" id="pubg-myName" class="validate[condRequired[pubg-title],maxSize[14],custom[r6sCheck]]" placeholder="プレイヤー名を入力してください" <?= $user->pubg_flg === 1 ? "value=" . h($user->pubg_name) : "disabled" ?>>
			</div>
			<div class="row">
				<span class="lol-margin">League Of Legends</span>
				<input type="text" name="lol-name" id="lol-myName" class="validate[condRequired[lol-title],minSize[3],maxSize[16]]" placeholder="プレイヤー名を入力してください" <?= $user->lol_flg === 1 ? "value=" . h($user->lol_name) : "disabled" ?>>
			</div>
		</div>
	</div>

	<div class="outher-row">
		<label>目標ランク</label>
		<div class="inner-row column">
			<div class="row">
				<span class="r6s-margin">Rainbow Six Siege</span>
				<select id="r6s-rank-select" name="r6s-rank-select" <?= $user->r6s_flg === 1 ? "" : "disabled" ?>>
					<option value="未設定" <?= $user->r6s_goal === "未設定" ? "selected" : "" ?>>未設定</option>
					<option value="Copper1" <?= $user->r6s_goal === "Cooper1" ? "selected" : "" ?>>Copper1</option>
					<option value="Copper2" <?= $user->r6s_goal === "Copper2" ? "selected" : "" ?>>Copper2</option>
					<option value="Copper3" <?= $user->r6s_goal === "Cooper3" ? "selected" : "" ?>>Copper3</option>
					<option value="Copper4" <?= $user->r6s_goal === "Cooper4" ? "selected" : "" ?>>Copper4</option>
					<option value="Copper5" <?= $user->r6s_goal === "Cooper5" ? "selected" : "" ?>>Copper5</option>
					<option value="Bronze1" <?= $user->r6s_goal === "Bronze1" ? "selected" : "" ?>>Bronze1</option>
					<option value="Bronze2" <?= $user->r6s_goal === "Bronze2" ? "selected" : "" ?>>Bronze2</option>
					<option value="Bronze3" <?= $user->r6s_goal === "Bronze3" ? "selected" : "" ?>>Bronze3</option>
					<option value="Bronze4" <?= $user->r6s_goal === "Bronze4" ? "selected" : "" ?>>Bronze4</option>
					<option value="Bronze5" <?= $user->r6s_goal === "Bronze5" ? "selected" : "" ?>>Bronze5</option>
					<option value="Silver1" <?= $user->r6s_goal === "Silver1" ? "selected" : "" ?>>Silver1</option>
					<option value="Silver2" <?= $user->r6s_goal === "Silver2" ? "selected" : "" ?>>Silver2</option>
					<option value="Silver3" <?= $user->r6s_goal === "Silver3" ? "selected" : "" ?>>Silver3</option>
					<option value="Silver4" <?= $user->r6s_goal === "Silver4" ? "selected" : "" ?>>Silver4</option>
					<option value="Silver5" <?= $user->r6s_goal === "Silver5" ? "selected" : "" ?>>Silver5</option>
					<option value="Gold1" <?= $user->r6s_goal === "Gold1" ? "selected" : "" ?>>Gold1</option>
					<option value="Gold2" <?= $user->r6s_goal === "Gold2" ? "selected" : "" ?>>Gold2</option>
					<option value="Gold3" <?= $user->r6s_goal === "Gold3" ? "selected" : "" ?>>Gold3</option>
					<option value="Platinum1" <?= $user->r6s_goal === "Platinum1" ? "selected" : "" ?>>Platinum1</option>
					<option value="Platinum2" <?= $user->r6s_goal === "Platinum2" ? "selected" : "" ?>>Platinum2</option>
					<option value="Platinum3" <?= $user->r6s_goal === "Platinum3" ? "selected" : "" ?>>Platinum3</option>
					<option value="Diamond" <?= $user->r6s_goal === "Diamond" ? "selected" : "" ?>>Diamond</option>
					<option value="Champion" <?= $user->r6s_goal === "Champion" ? "selected" : "" ?>>Champion</option>
				</select>
			</div>
			<div class="row">
				<span class="pubg-margin">Player Unknown's Battle Ground</span>
				<select id="pubg-rank-select" name="pubg-rank-select" <?= $user->pubg_flg === 1 ? "" : "disabled" ?>>
					<option value="未設定" <?= $user->pubg_goal === "未設定" ? "selected" : "" ?>>未設定</option>
					<option value="Beginner1" <?= $user->pubg_goal === "Beginner1" ? "selected" : "" ?>>Beginner1</option>
					<option value="Beginner2" <?= $user->pubg_goal === "Beginner2" ? "selected" : "" ?>>Beginner2</option>
					<option value="Beginner3" <?= $user->pubg_goal === "Beginner3" ? "selected" : "" ?>>Beginner3</option>
					<option value="Beginner4" <?= $user->pubg_goal === "Beginner4" ? "selected" : "" ?>>Beginner4</option>
					<option value="Beginner5" <?= $user->pubg_goal === "Beginner5" ? "selected" : "" ?>>Beginner5</option>
					<option value="Novice1" <?= $user->pubg_goal === "Novice1" ? "selected" : "" ?>>Novice1</option>
					<option value="Novice2" <?= $user->pubg_goal === "Novice2" ? "selected" : "" ?>>Novice2</option>
					<option value="Novice3" <?= $user->pubg_goal === "Novice3" ? "selected" : "" ?>>Novice3</option>
					<option value="Novice4" <?= $user->pubg_goal === "Novice4" ? "selected" : "" ?>>Novice4</option>
					<option value="Novice5" <?= $user->pubg_goal === "Novice5" ? "selected" : "" ?>>Novice5</option>
					<option value="Experienced1" <?= $user->pubg_goal === "Experienced1" ? "selected" : "" ?>>Experienced1</option>
					<option value="Experienced2" <?= $user->pubg_goal === "Experienced2" ? "selected" : "" ?>>Experienced2</option>
					<option value="Experienced3" <?= $user->pubg_goal === "Experienced3" ? "selected" : "" ?>>Experienced3</option>
					<option value="Experienced4" <?= $user->pubg_goal === "Experienced4" ? "selected" : "" ?>>Experienced4</option>
					<option value="Experienced5" <?= $user->pubg_goal === "Experienced5" ? "selected" : "" ?>>Experienced5</option>
					<option value="Skilled1" <?= $user->pubg_goal === "Skilled1" ? "selected" : "" ?>>Skilled1</option>
					<option value="Skilled2" <?= $user->pubg_goal === "Skilled2" ? "selected" : "" ?>>Skilled2</option>
					<option value="Skilled3" <?= $user->pubg_goal === "Skilled3" ? "selected" : "" ?>>Skilled3</option>
					<option value="Skilled4" <?= $user->pubg_goal === "Skilled4" ? "selected" : "" ?>>Skilled4</option>
					<option value="Skilled5" <?= $user->pubg_goal === "Skilled5" ? "selected" : "" ?>>Skilled5</option>
					<option value="Specialist1" <?= $user->pubg_goal === "Specialist1" ? "selected" : "" ?>>Specialist1</option>
					<option value="Specialist2" <?= $user->pubg_goal === "Specialist2" ? "selected" : "" ?>>Specialist2</option>
					<option value="Specialist3" <?= $user->pubg_goal === "Specialist3" ? "selected" : "" ?>>Specialist3</option>
					<option value="Specialist4" <?= $user->pubg_goal === "Specialist4" ? "selected" : "" ?>>Specialist4</option>
					<option value="Specialist5" <?= $user->pubg_goal === "Specialist5" ? "selected" : "" ?>>Specialist5</option>
					<option value="Expert" <?= $user->pubg_goal === "Expert" ? "selected" : "" ?>>Expert</option>
					<option value="Survivor" <?= $user->pubg_goal === "Survivor" ? "selected" : "" ?>>Survivor</option>
					<option value="Lone Survivor" <?= $user->pubg_goal === "Lone Survivor" ? "selected" : "" ?>>Lone Survivor</option>
				</select>
			</div>
			<div class="row">
				<span class="lol-margin">League Of Legends</span>
				<select id="lol-rank-select" name="lol-rank-select" <?= $user->lol_flg === 1 ? "" : "disabled" ?>>
					<option value="未設定" <?= $user->lol_goal === "未設定" ? "selected" : "" ?>>未設定</option>
					<option value="Iron1" <?= $user->lol_goal === "Iron1" ? "selected" : "" ?>>Iron1</option>
					<option value="Iron2" <?= $user->lol_goal === "Iron2" ? "selected" : "" ?>>Iron2</option>
					<option value="Iron3" <?= $user->lol_goal === "Iron3" ? "selected" : "" ?>>Iron3</option>
					<option value="Iron4" <?= $user->lol_goal === "Iron4" ? "selected" : "" ?>>Iron4</option>
					<option value="Bronze1" <?= $user->lol_goal === "Bronze1" ? "selected" : "" ?>>Bronze1</option>
					<option value="Bronze2" <?= $user->lol_goal === "Bronze2" ? "selected" : "" ?>>Bronze2</option>
					<option value="Bronze3" <?= $user->lol_goal === "Bronze3" ? "selected" : "" ?>>Bronze3</option>
					<option value="Bronze4" <?= $user->lol_goal === "Bronze4" ? "selected" : "" ?>>Bronze4</option>
					<option value="Silver1" <?= $user->lol_goal === "Silver1" ? "selected" : "" ?>>Silver1</option>
					<option value="Silver2" <?= $user->lol_goal === "Silver2" ? "selected" : "" ?>>Silver2</option>
					<option value="Silver3" <?= $user->lol_goal === "Silver3" ? "selected" : "" ?>>Silver3</option>
					<option value="Silver4" <?= $user->lol_goal === "Silver4" ? "selected" : "" ?>>Silver4</option>
					<option value="Gold1" <?= $user->lol_goal === "Gold1" ? "selected" : "" ?>>Gold1</option>
					<option value="Gold2" <?= $user->lol_goal === "Gold2" ? "selected" : "" ?>>Gold2</option>
					<option value="Gold3" <?= $user->lol_goal === "Gold3" ? "selected" : "" ?>>Gold3</option>
					<option value="Gold4" <?= $user->lol_goal === "Gold4" ? "selected" : "" ?>>Gold4</option>
					<option value="Platinum1" <?= $user->lol_goal === "Platinum1" ? "selected" : "" ?>>Platinum1</option>
					<option value="Platinum2" <?= $user->lol_goal === "Platinum2" ? "selected" : "" ?>>Platinum2</option>
					<option value="Platinum3" <?= $user->lol_goal === "Platinum3" ? "selected" : "" ?>>Platinum3</option>
					<option value="Platinum4" <?= $user->lol_goal === "Platinum4" ? "selected" : "" ?>>Platinum4</option>
					<option value="Diamond1" <?= $user->lol_goal === "Diamond1" ? "selected" : "" ?>>Diamond1</option>
					<option value="Diamond2" <?= $user->lol_goal === "Diamond2" ? "selected" : "" ?>>Diamond2</option>
					<option value="Diamond3" <?= $user->lol_goal === "Diamond3" ? "selected" : "" ?>>Diamond3</option>
					<option value="Diamond4" <?= $user->lol_goal === "Diamond4" ? "selected" : "" ?>>Diamond4</option>
					<option value="Master" <?= $user->lol_goal === "Master" ? "selected" : "" ?>>Master</option>
					<option value="Grandmaster" <?= $user->lol_goal === "Grandmaster" ? "selected" : "" ?>>GrandMaster</option>
					<option value="Challenger" <?= $user->lol_goal === "Challenger" ? "selected" : "" ?>>Challenger</option>
				</select>
			</div>
		</div>
	</div>

	<div class="outher-row">
		<label>自己紹介</label>
		<textarea name="my-intro" rows="15" placeholder="1000字以内で入力してください" class="validate[optipnal,maxSize[1000]]"><?= h($user->intro) ?></textarea>
	</div>

	<div class="outher-row">
		<label>所属チーム</label>
		<input type="text" name="my-team" placeholder="20字以内で入力してください" class="validate[optipnal,maxSize[20]]" value="<?= h($user->team) ?>">
	</div>

	<div class="outher-row">
		<label>ゲームをプレイする<br>上での価値観<span class="require-item">*</span></label>
		<div class="inner-row">
			<div>
				<input type="radio" id="game-Values1" name="values" class="validate[required]" value="0" <?= $user->game_values === 0 ? "checked" : "" ?>><span>楽しんでゲームをしたい</span>
			</div>
			<div>
				<input type="radio" id="game-Values2" name="values" class="validate[required]" value="1" <?= $user->game_values === 1 ? "checked" : "" ?>><span>本気でゲームをしたい</span>
			</div>
		</div>

	</div>

	<div class="outher-row">
		<label>大会出場の有無<span class="require-item">*</span></label>
		<div class="inner-row">
			<div>
				<input type="radio" id="game-Tournament1" name="tournament" class="validate[required]" value="0" <?= $user->game_values === 0 ? "checked" : "" ?>><span>大会に出場したくない</span>
			</div>
			<div>
				<input type="radio" id="game-Tournament2" name="tournament" class="validate[required]" value="1" <?= $user->game_values === 1 ? "checked" : "" ?>><span>大会に出場したい</span>
			</div>
		</div>
	</div>

	<div class="outher-row">
		<label>ボイスチャット<span class="require-item">*</span></label>
		<div class="inner-row column">
			<div class="row">
				<input type="checkbox" name="" id="discord" class="validate[required,minCheckbox[1]]" value="" onclick="connectText('discord-id', this.checked)" <?= $user->discord === "" ? "" : "checked" ?>>
				<span>Discord</span>
			</div>
			<div class="row">
				<input type="checkbox" name="" id="skype" class="validate[required,minCheckbox[1]]" value="" onclick="connectText('skype-id', this.checked)" <?= $user->skype === "" ? "" : "checked" ?>>
				<span>Skype</span>
			</div>
		</div>
	</div>

	<div class="outher-row">
		<label>Discord<span class="require-item">*</span></label>
		<input type="text" id="discord-id" name="discord" class="validate[condRequired[discord],minSize[5],maxSize[40]]" placeholder="DiscordのIDを入力してください" <?= $user->discord === "" ? "disabled" : "value=" . h($user->discord) ?>>
	</div>

	<div class="outher-row">
		<label>Skype<span class="require-item">*</span></label>
		<input type="text" id="skype-id" name="skype" class="validate[condRequired[skype],minSize[6],maxSize[32]]" placeholder="SkypeのIDを入力してください" <?= $user->skype === "" ? "disabled" : "value=" . h($user->skype) ?>>
	</div>

	<div class="reg-btn-area">
		<button type="submit" class="reg-btn" name="confirm" value="confirm">確認画面へ</button>
	</div>
	</form>
</div>
<script src="https://school.oohara.jp/kudo/js/jquery.validationEngine.js" type="text/javascript"></script>
<script src="https://school.oohara.jp/kudo/js/jquery.validationEngine-ja.js" type="text/javascript"></script>
<script>
$(function() {
    jQuery("#profile-form").validationEngine();
})
</script>
<script>
	$(function(){
		// プロフィール画像変更
		document.getElementById("uploadFile").addEventListener("change", function(e) {
			var file = e.target.files[0];
			var msg = document.getElementById("ext-check");
			msg.innerHTML = ""

			if (checkExt() == false) return false;
			if (checkSize(file.size) == false) {
				msg.innerHTML = "3MB以内の画像を選択してください"
				return false;
			}

			// ファイルリーダー作成
			var fileReader = new FileReader();
			fileReader.onload = function() {
				// Data URIを取得
				var dataUri = this.result;

				// img要素に表示
				var img = document.getElementById("file-preview");
				img.src = dataUri;
			};

			// ファイルをData URIとして読み込む
			fileReader.readAsDataURL(file);
		});
	})
	//チェックボックス有効/無効
	function connectText(textid, ischecked) {
		if (ischecked == true) {
			// チェックが入っていたら有効化
			document.getElementById(textid).disabled = false;
		} else {
			// チェックが入っていなかったら無効化
			document.getElementById(textid).disabled = true;
		}
	}

	// ファイル拡張子チェック
	// アップロード予定のファイル名の拡張子が許可されているか確認する関数
	function checkExt() {
		var msg = document.getElementById("ext-check");

		// ファイル名取得
		var fileInfo = document.querySelector("#uploadFile").files[0];
		var filename = fileInfo.name;

		// .が何文字目にあるか?
		var pos = filename.lastIndexOf(".");
		if (pos === -1) return "";

		// .の次の文字列を抜き出す
		var target = filename.slice(pos + 1);

		//アップロードを許可する拡張子
		var allow_exts = "jpg jpeg png";

		//比較のため小文字にする
		var ext = target.toLowerCase();

		//許可する拡張子の一覧(allow_exts)から対象の拡張子があるか確認する
		if (allow_exts.indexOf(ext) === -1) {
			msg.innerHTML = "ファイルの拡張子が違います";
			return false;
		} else {
			return true;
		}
	}

		// 画像容量チェック
	function checkSize(size) {
		var maxSize = 3145728; // 3MB
		if (maxSize < size) return false;
		return true;
	}
</script>