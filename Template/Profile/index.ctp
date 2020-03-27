<style>
	/* common */
	section {
		margin: 0 40px;
	}

	i {
		margin-right: 7px;
	}

	.wrapper {
		width: 1060px;
		margin: 0 auto;
		padding-top: 30px;
		letter-spacing: 0.03em;
	}

	.pfheader {
		position: relative;
	}

	.bgimg {
		text-align: center;
	}

	.myimg {
		position: absolute;
		top: 170px;
		left: 80px;
	}

	.bgimg {
		opacity: 1;
		transition: 1s;
	}

	.bgimg:hover {
		opacity: 0.5;
	}

	.upload-msg {
		position: absolute;
		opacity: 0;
		color: #aba;
		font-weight: bold;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
	}

	.mypic {
		border-radius: 50%;
	}

	.chardisp {
		opacity: 1;
		transition: 1s;
	}

	.myName {
		letter-spacing: 0.04em;
		font-size: 2.3rem;
		margin: 20px 20px 20px 50px;
	}

	.gameinfo {
		display: flex;
		justify-content: space-between;
	}

	.gameinfo ul {
		list-style: none;
	}

	.r6s,
	.pubg,
	.lol {
		width: 320px;
		margin: 5px 10px 5px 10px;
		box-shadow: 0 1px 3px #0e0e0f;
		border-radius: 2px;
		position: relative;
		min-height: 300px;
	}

	.r6sinfo,
	.pubginfo,
	.lolinfo {
		padding: 5px;
	}

	.r6sinfo li,
	.pubginfo li,
	.lolinfo li {
		margin: 10px 0 5px 0;
	}

	.label-deco {
		padding-top: 3px;
		padding-bottom: 3px;
		padding-left: 10px;
		font-weight: normal;
		border-radius: 2px 2px 0 0;
		font-size: 0.9rem;
	}

	.rank-row {
		text-align: center;
	}

	.csrank-deco {
		font-size: 14px;
		text-align: center;
	}

	.rank-deco {
		color: #22bdb5;
		font-weight: bold;
		font-size: 24px;
		border-bottom: 2px solid;
		line-height: 28px;
		text-align: center;
	}

	.char-deco {
		font-size: 20px;
		color: #0093ff;
	}

	.other-deco {
		font-size: 14px;
		text-align: center;
	}

	.mypf {
		display: flex;
		flex-wrap: wrap;
		justify-content: space-between;
	}

	.content {
		font-size: 14px;
		padding: 10px 10px 10px 25px;
		line-height: 24px;
	}

	.myintro,
	.mygoal,
	.mytournament,
	.myvalues,
	.myteam,
	.mydiscord,
	.myskype {
		margin: 20px 10px 10px 10px;
		box-shadow: 0 1px 3px #0e0e0f;
		border-radius: 2px;
	}

	.myintro {
		width: 100%;
	}

	.intro-label {
		background-color: #764c5a;
	}

	.mydiscord,
	.myskype {
		width: 460px;
	}

	.mygoal,
	.mytournament,
	.myvalues,
	.myteam {
		width: 305px;
	}

	/* ラベル */
	.r6s-label,
	.myr6sgoal-label {
		background-color: #494e6b;
	}

	.pubg-label,
	.mypubggoal-label {
		background-color: #ce9848;
	}

	.lol-label,
	.mylolgoal-label {
		background-color: #3496a3;
	}

	.values-label,
	.team-label,
	.tour-label {
		background-color: #78a65b;
	}

	.discord-label {
		background-color: #596dac;
	}

	.skype-label {
		background-color: #069ecf;
	}

	.btnarea {
		text-align: center;
		margin: 20px;
	}

	a {
		text-decoration: none;
		color: white;
	}

	.pfedit-btn {
		position: relative;
		font-size: 1rem;
		width: 250px;
		height: 40px;
		color: #fff;
		background-color: #666666;
		margin-top: 30px;
		margin-bottom: 30px;
		padding: 10px;
		border-radius: 2px;
		font-weight: normal;
		border: none;
		user-select: none;
		cursor: pointer;
		outline: 0;
	}

	.pfedit-btn:hover {
		background: #b4b4b4;
	}

	.pfedit-btn:active {
		top: 1px;
	}

	.no-reg-msg {
		font-size: 0.75rem;
		width: 65vw;
		text-align: center;
		position: absolute;
		top: 60%;
		left: 50%;
		transform: translateY(-50%) translateX(-50%);
	}

	.fa-exclamation-circle {
		display: block;
		position: absolute;
		top: 35%;
		left: 47%;
		transform: translateY(-50%) translateX(-50%);
		text-align: center;
		font-size: 4rem;
	}

	/* small screen */
	@media (max-width: 600px) {
		.wrapper {
			width: 100vw;
		}

		.myimg {
			top: 70%;
			left: 50%;
			transform: translate(-50%, -50%);
		}

		.myName {
			text-align: center;
		}

		.cover-img {
			width: 100vw;
			height: 312px;
		}

		section {
			display: block !important;
		}

		.r6s,
		.pubg,
		.lol,
		.mygoal,
		.myintro,
		.mytournament,
		.myvalues,
		.myteam,
		.mydiscord,
		.myskype {
			width: 100%;
			margin: 0 auto;
			margin-bottom: 20px;
		}
	}

	/* midium screen */
	@media (min-width: 960px) {
		.cover-img {
			width: 960px;
			height: 312px;
		}
	}
</style>

<div class="wrapper">
	<div class="pfheader">
		<div id="bgarea" class="bgimg">
			<img id="img-preview" class="cover-img" src="<?= h($this->Url->image($user->pf_head)) ?>" alt="カバー写真" width="1060" height="312">
			<div class="upload-msg">画像を変更する（推奨画像サイズ：1060x312 容量:3MB以内）</div>
			<div style="display:none">
				<?php echo $this->Form->create(null, ["type" => "post", "id" => "my_form", "enctype" => "multipart/form-data", "url" => ["action" => "a"]]) ?>
				<input type="file" name="upload" id="uploadFile" accept="image/png,image/jpeg,image/jpg">
				</form>
			</div>
		</div>
		<div class="myimg">
			<img src="<?= h($this->Url->image($user->pf_img)) ?>" class="mypic" width="120" height="120">
		</div>
	</div>

	<p class="myName"><?= h($user->user_name) ?></p>

	<section class="gameinfo">
		<div id="r6s-section" class="r6s">
			<h3 class="r6s-label label-deco"><i class="fas fa-gamepad"></i>Rainbow Six Siege</h3>
			<ul class="r6sinfo">
				<li class="csrank-deco">Current Season Rank</li>
				<li class="other-deco">Name <span class="char-deco"><?= h($user->r6s_name) ?></li>
				<li class="rank-row"><span id="r6s-rank" class="rank-deco"><?= h($r6sPlayerInfo["rank"]) ?></li>
				<li class="other-deco"><span id="r6s-mmr" class="char-deco"><?= h($r6sPlayerInfo["mmr"]) ?></span> MMR</li>
				<li class="other-deco">Level <span id="r6s-level" class="char-deco"><?= h($r6sPlayerInfo["level"]) ?></li>
				<li class="other-deco">Win Rate <span id="r6s-rate" class="char-deco"><?= h($r6sPlayerInfo["winRate"]) ?></span></li>
				<li class="other-deco">Kill/Death Rate <span id="r6s-kd" class="char-deco"><?= h($r6sPlayerInfo["kd"]) ?></span></li>
			</ul>
		</div>

		<div id="pubg-section" class="pubg">
			<h3 class="pubg-label label-deco"><i class="fas fa-gamepad"></i>Player Unknown's Battle Ground</h3>
			<ul class="pubginfo">
				<li class="csrank-deco">Current Season Rank</li>
				<li class="other-deco">Name <span class="char-deco"><?= h($user->pubg_name) ?></li>
				<li class="rank-row">Solo <span id="pubg-solo-rank" class="rank-deco"><?= h($pubgPlayerInfo["soloRank"]) ?></span></li>
				<li class="rank-row">Duo <span id="pubg-duo-rank" class="rank-deco"><?= h($pubgPlayerInfo["duoRank"]) ?></span></li>
				<li class="rank-row">Squad <span id="pubg-sq-rank" class="rank-deco"><?= h($pubgPlayerInfo["sqRank"]) ?></span></li>
				<li class="other-deco">Kill/Death Rate(Solo) <span id="pubg-kd" class="char-deco"><?= h($pubgPlayerInfo["soloKd"]) ?></span></li>
				<li class="other-deco">Kill/Death Rate(Duo) <span id="pubg-kd" class="char-deco"><?= h($pubgPlayerInfo["duoKd"]) ?></span></li>
				<li class="other-deco">Kill/Death Rate(Squad) <span id="pubg-kd" class="char-deco"><?= h($pubgPlayerInfo["sqKd"]) ?></span></li>
			</ul>
		</div>

		<div id="lol-section" class="lol">
			<h3 class="lol-label label-deco"><i class="fas fa-gamepad"></i>League Of Legends</h3>
			<ul class="lolinfo">
				<li class="csrank-deco">Current Season Rank</li>
				<li class="other-deco">Name <span class="char-deco"><?= h($user->lol_name) ?></li>
				<li class="rank-row">Solo <span id="lol-solo-rank" class="rank-deco"><?= h($lolPlayerInfo["soloRank"]) ?></span></li>
				<li class="other-deco">League Points <span id="lol-points" class="char-deco"><?= h($lolPlayerInfo["leaguePoints"]) ?></span></li>
				<li class="other-deco">Win Rate <span id="lol-rate" class="char-deco"><?= h($lolPlayerInfo["winRate"]) ?>%</span></li>
				<li class="other-deco"><?php $g = (int) $lolPlayerInfo["wins"] + (int) $lolPlayerInfo["losses"];
										h($g) ?> games <span id="lol-rate" class="char-deco"><?= $lolPlayerInfo["wins"] ?></span> wins <span id="lol-rate" class="char-deco"><?= h($lolPlayerInfo["losses"]) ?></span> losses </li>
			</ul>
	</section>

	<section class="mypf">
		<div class="mygoal">
			<h3 class="myr6sgoal-label label-deco"><i class="far fa-hand-rock"></i>R6S目標ランク</h3>
			<p id="goal" class="content"><?= h($user->r6s_goal) ?></p>
		</div>
		<div class="mygoal">
			<h3 class="mypubggoal-label label-deco"><i class="far fa-hand-rock"></i>PUBG目標ランク</h3>
			<p id="goal" class="content"><?= h($user->pubg_goal) ?></p>
		</div>
		<div class="mygoal">
			<h3 class="mylolgoal-label label-deco"><i class="far fa-hand-rock"></i>LOL目標ランク</h3>
			<p id="goal" class="content"><?= h($user->lol_goal) ?></p>
		</div>
		<div class="myintro">
			<h3 class="intro-label label-deco"><i class="far fa-id-card"></i>自己紹介</h3>
			<p id="intro" class="content"><?= nl2br(h($user->intro)) ?></p>
		</div>

		<div class="mytournament">
			<h3 class="tour-label label-deco"><i class="fas fa-trophy"></i>大会出場有無</h3>
			<p id="tournament" class="content"><?= h($tmt) ?></p>
		</div>
		<div class="myvalues">
			<h3 class="values-label label-deco"><i class="fas fa-pen-nib"></i>ゲームの価値観</h3>
			<p id="values" class="content"><?= h($gameValues) ?></p>
		</div>
		<div class="myteam">
			<h3 class="team-label label-deco"><i class="fas fa-user-friends"></i>所属チーム</h3>
			<p id="team" class="content"><?= h($user->team) ?></p>
		</div>
		<div class="mydiscord">
			<h3 class="discord-label label-deco"><i class="fab fa-discord"></i>Discord</h3>
			<p id="discord" class="content"><?= h($user->discord) ?></p>
		</div>
		<div class="myskype">
			<h3 class="skype-label label-deco"><i class="fab fa-skype"></i>Skype</h3>
			<p id="skype" class="content"><?= h($user->skype) ?></p>
		</div>
	</section>
	<div class="btnarea">
		<button type="button" class="pfedit-btn" onclick="location.href='<?php echo $this->Url->build(["controller" => "profileedit", "action" => "index"]) ?>'">プロフィールを編集する</a></button>
	</div>
</div>


<script>
	$(function() {
		const R6SFLG = <?= h($r6sflg) ?>;
		const PUBGFLG = <?= h($pubgflg) ?>;
		const LOLFLG = <?= h($lolflg) ?>;

		const r6sRankArray = [
			// 24
			/Champion/,
			/Diamond/,
			/Platinum [1-3]/,
			/Gold [1-3]/,
			/Silver [1-5]/,
			/Bronze [1-5]/,
			/Copper [1-5]/,
			/Unranked/
		];

		const pubgRankArray = [
			// 29
			/LoneSurvivor/,
			/Survivor/,
			/Expert/,
			/Specialist [1-5]/,
			/Skilled [1-5]/,
			/Experienced [1-5]/,
			/Novice [1-5]/,
			/Beginner [1-5]/,
			/Unranked/
		];

		const lolRankArray = [
			// 28
			/Challenger/,
			/Grandmaster/,
			/Master/,
			/Diamond [1-4]/,
			/Platinum [1-4]/,
			/Gold [1-4]/,
			/Silver [1-4]/,
			/Bronze [1-4]/,
			/Iron [1-4]/,
			/Unranked/
		];

		document.getElementById("bgarea").addEventListener("click", function(e) {
			document.getElementById("uploadFile").click();
		});

		$("#uploadFile").on("change", function(e) {
			// 1枚だけ表示する
			var file = e.target.files[0];

			// 拡張子チェック
			if (!checkExt(file.name)) {
				alert(".jpg .jpeg .pngの拡張子ファイルを選択してください");
				return false;
			}

			//画像容量チェック
			if (!checkSize(file.size)) {
				alert("3MBまでの画像ファイルを選択してください");
				return false;
			}

			// ファイルリーダー作成
			var fileReader = new FileReader();
			fileReader.onload = function() {
				// Data URIを取得
				var dataUri = this.result;

				// img要素に表示
				var img = document.getElementById("img-preview");
				img.src = dataUri;
			}

			// ファイルをData URIとして読み込む
			fileReader.readAsDataURL(file);

			// フォームデータを取得
			uploadFile();
		});

		$("#bgarea").hover(
			function() {
				$(".upload-msg").addClass("chardisp");
			},
			function() {
				$(".upload-msg").removeClass("chardisp");
			}
		);

		var r6s = "r6s";
		var pubg = "pubg";
		var lol = "lol";

		if (R6SFLG == 1) {
			r6sRankColor();
		} else {
			infoMsg(r6s);
		}

		if (PUBGFLG == 1) {
			pubgRankColor(0);
			pubgRankColor(1);
			pubgRankColor(2);
		} else {
			infoMsg(pubg);
		}

		if (LOLFLG == 1) {
			lolRankColor();
		} else {
			infoMsg(lol);
		}

		function infoMsg(gameTitle) {
			var section = "";
			var div = "";
			switch (gameTitle) {
				case "r6s":
					section = document.getElementById("r6s-section");
					div = `
						<h3 class="r6s-label label-deco"><i class="fas fa-gamepad"></i>Rainbow Six Siege</h3>
						<i class="fas fa-exclamation-circle"></i>
						<p class="no-reg-msg">登録されていません<br>登録したプレイヤー名が誤っている可能性があるため<br>プロフィール編集からご確認ください</p>
						`
					section.innerHTML = "";
					section.innerHTML = section.innerHTML + div;
					break;
				case "pubg":
					section = document.getElementById("pubg-section");
					div = `
						<h3 class="pubg-label label-deco"><i class="fas fa-gamepad"></i>Player Unknown's Battle Ground</h3>
						<i class="fas fa-exclamation-circle"></i>
						<p class="no-reg-msg">登録されていません<br>登録したプレイヤー名が誤っている可能性があるため<br>プロフィール編集からご確認ください</p>
						`
					section.innerHTML = "";
					section.innerHTML = section.innerHTML + div;
					break;
				case "lol":
					section = document.getElementById("lol-section");
					div = `
						<h3 class="lol-label label-deco"><i class="fas fa-gamepad"></i>League Of Legends</h3>
						<i class="fas fa-exclamation-circle"></i>
						<p class="no-reg-msg">登録されていません<br>登録したプレイヤー名が誤っている可能性があるため<br>プロフィール編集からご確認ください</p>
						`
					section.innerHTML = "";
					section.innerHTML = section.innerHTML + div;
					break;
			}
		}

		function uploadFile() {
			var file = $("#uploadFile").prop('files')[0];
			var csrf = $('input[name=_csrfToken]').val();

			// POSTでアップロード
			var fd = new FormData();
			fd.append($("#uploadFile").attr('name'), file);
			$.ajax({
					url: "<?php echo $this->Url->build(["action" => "upload"]) ?>",
					type: "POST",
					data: fd,
					contentType: false,
					processData: false,
					dataType: "html",
					beforeSend: function(x) {
						x.setRequestHeader('X-CSRF-Token', csrf);
					},
				})
				.done(function(data, textStatus, jqXHR) {
					alert("画像のアップロードに成功しました");
				})
				.fail(function(jqXHR, textStatus, errorThrow) {
					alert("画像のアップロードに失敗しました");
				})
		}

		function r6sRankColor() {
			var r6sRank = document.getElementById("r6s-rank");
			for (var i = 0; i < r6sRankArray.length; i++) {
				if (r6sRankArray[i].test(r6sRank.textContent)) {
					var style = r6sRank.style;
					switch (i) {
						case 0: // Champion
							style.color = "#EF1779";
							break;
						case 1: // Diamond
							style.color = "#CCB6F7";
							break;
						case 2: // Platinum
							style.color = "#97F2F6";
							break;
						case 3: // Gold
							style.color = "#FBE03A";
							break;
						case 4: // Silver
							style.color = "#BCBBB8";
							break;
						case 5: // Bronze
							style.color = "#714928";
							break;
						case 6: // Copper
							style.color = "#B30908";
							break;
						case 7: // Unranked
							style.color = "#666666";
							break;
					}
					break;
				}
			}
		}

		function pubgRankColor(type) {

			switch (type) {
				case 0:
					var pubgRank = document.getElementById("pubg-solo-rank");
					break;
				case 1:
					var pubgRank = document.getElementById("pubg-duo-rank");
					break;
				case 2:
					var pubgRank = document.getElementById("pubg-sq-rank");
					break;
			}

			for (var i = 0; i < pubgRankArray.length; i++) {
				if (pubgRankArray[i].test(pubgRank.textContent)) {
					var style = pubgRank.style;
					switch (i) {
						case 0: // LoneSurvivor
							style.color = "#c8a048";
							break;
						case 1: // Survivor
							style.color = "#c8a048";
							break;
						case 2: // Expert
							style.color = "#c8a048";
							break;
						case 3: // Specialist
							style.color = "#7E7FD6";
							break;
						case 4: // Skilled
							style.color = "#8BACC4";
							break;
						case 5: // Experienced
							style.color = "#A59358";
							break;
						case 6: // Novice
							style.color = "#A4A8AC";
							break;
						case 7: // Beginner
							style.color = "#B57F66";
							break;
						case 8: // UnRanked
							style.color = "#666666";
							break;
					}
					break;
				}
			}
		}

		function lolRankColor() {
			var lolRank = document.getElementById("lol-solo-rank");
			for (var i = 0; i < lolRankArray.length; i++) {
				if (lolRankArray[i].test(lolRank.textContent)) {
					console.log(lolRankArray[i].test(lolRank.textContent));
					var style = lolRank.style;
					switch (i) {
						case 0: // Challenger
							style.color = "#5195E7";
							break;
						case 1: // Grandmaster
							style.color = "#FC6874";
							break;
						case 2: // Master
							style.color = "#E76EEB";
							break;
						case 3: // Diamond
							style.color = "#B389F1";
							break;
						case 4: // Platinum
							style.color = "#65D2BC";
							break;
						case 5: // Gold
							style.color = "#E8B85F";
							break;
						case 6: // Silver
							style.color = "#85887F";
							break;
						case 7: // Bronze
							style.color = "#A0623F";
							break;
						case 8: // Iron
							style.color = "#CCCBCB";
							break;
						case 9: // UnRanked
							style.color = "#666666";
							break;
					}
					break;
				}
			}
		}

		// 拡張子を取り出す
		function getExt(filename) {
			var pos = filename.lastIndexOf(".");
			if (pos === -1) return "";
			return filename.slice(pos + 1);
		}

		// 拡張子チェック
		function checkExt(ext) {
			var allow_exts = new Array("jpg", "jpeg", "png");
			var check = getExt(ext).toLowerCase();
			if (allow_exts.indexOf(check) === -1) return false;
			return true;
		}

		// 画像容量チェック
		function checkSize(size) {
			var maxSize = 3145728; // 3MB
			if (maxSize < size) return false;
			return true;
		}
	})
</script>