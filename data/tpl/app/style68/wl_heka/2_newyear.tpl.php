<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>

<html>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<meta name="apple-mobile-web-app-capable" content="yes">

	<meta name="apple-mobile-web-app-status-bar-style" content="black">

	<meta name="format-detection" content="telephone=no">

	<title>迎春纳福</title>

	<?php  echo register_jssdk();?>

	<link rel="stylesheet" type="text/css" href="../addons/wl_heka/style/css/common.css">

	<script>

		var $ = function (id) {

			return document.getElementById(id);

		};

		var _fromCode = "<?php  echo $_W['siteroot'];?>";

		var siteurl = "<?php  echo $_W['siteroot']?>app";

		var dataForWeixin = {

			MsgImg: _fromCode + "addons/wl_heka/style/images/newyear.jpg",

			TLImg: _fromCode + "addons/wl_heka/style/images/newyear.jpg",

			path: siteurl + "<?php  echo $this->createMobileUrl('show', array('card' => $card,'id'=>$_GET['id'],'cid'=>$show['id']));?>",

			title: "微赞祝福",

			desc: "使用微赞助手可以在朋友圈或聊天对话框发送更丰富的祝福类型",

			fakeid: "",

			callback: function () {

			}

		};

		dataForWeixin.path = dataForWeixin.path.replace('./', '/');

	</script>

</head>

<body>

<script type="text/javascript">

	// 默认分享

	wx.ready(function () {

		sharedata = {

			title: dataForWeixin.title,

			desc: dataForWeixin.desc,

			link: dataForWeixin.path,

			imgUrl: dataForWeixin.MsgImg,

			success: function(){

				_$("<?php  echo $this->createMobileUrl('share', array('card' => $card,'id'=>$_GET['id'],'cid'=>$show['id']));?>", "wid=" + _wid + "&type=card", "");

			}

		};

		wx.onMenuShareAppMessage(sharedata);

		wx.onMenuShareTimeline(sharedata);

	});

</script>

<style>

	body {

		margin: 0;

		min-width: 320px;

		background-color: #e9f0bc;

	}



	#card_loading {

		margin-top: 50px;

		text-align: center;

	}



	#card_loading img {

		width: 200px;

		height: 112px;

	}



	#card_body {

		display: none;

	}



	#card_tip {

		position: absolute;

		top: 0;

		left: 0;

		width: 100%;

		background-color: rgba(170, 21, 23, 0.9);

		padding: 13px 0;

		font-size: 14px;

		color: #ffffff;

		text-align: center;

		z-index: 999;

	}



	#card_main {

		margin-bottom: -134px;

		padding: 60px 20px 20px 20px;

		background-color: #9c181b;

	}



	#card_title, #card_content, #card_author, #card_date {

		color: #e1ce6c;

		text-shadow: 0 1px 1px #333333;

		text-align: center;

		background-color: #9c181b;

	}



	#card_title {

		font-size: 33px;

	}



	#card_content {

		margin-top: 18px;

		font-size: 22px;

		line-height: 38px;

		hiegth: 100%;

	}



	#card_author, #card_date {

		font-size: 18px;

	}



	#card_author {

		margin-top: 18px;

	}



	#card_date {

		margin-top: 5px;

	}



	#card_center img {

		width: 115px;

		height: 229px;

	}



	#card_bot {

		margin-top: -90px;

	}



	#card_bot_left {

		float: left;

		margin: 60px 0 0 80px;

	}



	#card_bot_left img {

		width: 85px;

		height: 115px;

	}



	#card_bot_right {

		float: right;

		margin: 10px 15px 0 0;

	}



	#card_bot_right img {

		width: 100px;

		height: 169px;

	}



	#card_button {

		margin: 15px;

	}

</style>

<div style="display: none;" id="card_loading">

	<img src="../addons/wl_heka/style/images/card_loading.png"

		 onerror="this.parentNode.removeChild(this)">

</div>

<div style="display: block;" id="card_body">

	<div id="card_tip">点击文字可直接编辑，按底部按钮发送</div>

	<div id="card_main">

		<div>

			<input id="card_title" type="text" value="<?php  echo $show['title'];?>"/>

		</div>

		<div>

				<textarea id="card_content"

						  style="overflow: scroll; overflow-y: hidden; overflow-x: hidden;"

						  onchange="this.style.height=this.scrollHeight+'px';">

<?php  if(empty($show['content'])) { ?>

当你看到这张贺卡，

幸运已降临到你头上，

财神已进了你家门，

祝福你新年快乐！

   <?php  } else { ?>

   <?php  echo $show['content'];?>

   <?php  } ?>

   </textarea>

			<script>

				$('card_content').style.height = $('card_content').scrollHeight + 'px';

			</script>

		</div>

		<div>

			<input id="card_author" type="text" value="<?php  echo $show['author'];?>"/>

		</div>

		<div id="card_date"><?php  echo date('Y.m.d');?></div>

	</div>

	<div id="card_center">

		<img src="../addons/wl_heka/style/images/newyear_center.png">

	</div>

	<div id="card_bot">

		<div id="card_bot_left">

			<img src="../addons/wl_heka/style/images/newyear_bot_left.png">

		</div>

		<div id="card_bot_right">

			<img src="../addons/wl_heka/style/images/newyear_bot_right.png">

		</div>

		<div class="clear"></div>

	</div>

	<div id="card_button">

		<button class="button2" onclick="_card._post();">发送</button>

	</div>

</div>

<script>

	var siteurl = "<?php  echo $_W['siteroot']?>app";

	var _wid = 13777, _PUBLIC = "../addons/wl_heka/style/", _cardName = "新年贺卡", _cardType = "newyear";

	(function () {

		dataForWeixin.title = "使用微赞助手在微信发送" + _cardName;

		dataForWeixin.desc = "通过微赞助手的发送贺卡功能，向亲友传递最美好的祝福！";

	})();

	String.prototype.innerText = function () {

		return this.replace(/(<[^>]+>)|(&nbsp;)/ig, "");

	};

	String.prototype.htmlDecode = function () {

		return this.replace(/&amp;/ig, "&").replace(/&nbsp;/ig, " ").replace(/&[a-z]{2,4};/ig, "");

	};



	var _card = {

		_post: function () {

			var _title = $("card_title").value.innerText().trim(), _content = $("card_content").value.replace(/(<(br|div|\/div)>)+/ig, "\n").innerText(), _author = $("card_author").value.innerText().trim();

			if (_title == "" || _title == "收卡人") {

				_system._toast("没有输入收卡人名字");

				return;

			}

			if (_title.len() > 20) {

				_system._toast("收卡人名字在20字节以内");

				return;

			}

			if (_content.len() < 10) {

				_system._toast("祝福语太短了");

				return;

			}

			if (_content.len() > 200) {

				_system._toast("祝福语太长了");

				return;

			}

			if (_author == "" || _author == "署名") {

				_system._toast("请署上你的大名");

				return;

			}

			if (_author.len() > 20) {

				_system._toast("署名请在20字节以内");

				return;

			}

			if (_title == '<?php  echo $show['title'];?>' && _author == '<?php  echo $show['author'];?>') {

				_system._guide();

				return;

			}

			_$("<?php  echo $this->createMobileUrl('set', array('card' => $card,'id'=>$_GET['id']));?>", "wid=" + _wid + "&card=" + _cardType + "&title=" + _title.encode() + "&content=" + _content.encode() + "&author=" + _author.encode() + "&cardName=" + _cardName.encode(), "请稍候", "_card._ok");

		},

		_ok: function (json) {

			if (json.state == "0") {

				_system._toast("你填写的内容有问题");

				return;

			}

			dataForWeixin.path = siteurl + "<?php  echo $this->createMobileUrl('show',array('card' => $card));?>";

			dataForWeixin.path = dataForWeixin.path.replace('./', '/').replace('do=show', 'do=show&cid=' + json.id);

			dataForWeixin.title = "收到一张来自" + $("card_author").value.innerText().htmlDecode().trim() + "的" + _cardName;

			dataForWeixin.desc = $("card_content").value.innerText().htmlDecode().trim().left(88);

			dataForWeixin.callback = function () {

				_$("<?php  echo $this->createMobileUrl('share', array('card' => $card,'id'=>$_GET['id']));?>", "wid=" + _wid + "&type=card&cid=" + json.id, "", "");

			};

			_system._guide();



			// 发送贺卡后分享

			wx.ready(function () {

				sharedata = {

					title: dataForWeixin.title,

					desc: dataForWeixin.desc,

					link: dataForWeixin.path,

					imgUrl: dataForWeixin.MsgImg,

					success: function(){

						_$("<?php  echo $this->createMobileUrl('share', array('card' => $card,'id'=>$_GET['id']));?>", "wid=" + _wid + "&type=card&cid=" + json.id, "");

					}

				};

				wx.onMenuShareAppMessage(sharedata);

				wx.onMenuShareTimeline(sharedata);

			});

		}

	};

	window.onload = function () {

		$("card_body").show();

		$("card_loading").hide();

	};

</script>

<div id="ok">

	<img src="../addons/wl_heka/style/images/ok.png">

	<div id="ok_text"></div>

</div>

<div id="cover"></div>

<div id="loading">

	<img src="../addons/wl_heka/style/images/loading.gif">

	<div id="loading_text"></div>

</div>

<div id="guide">

	<div>

		<img src="../addons/wl_heka/style/images/guide.png">

	</div>

	<div id="guide_button">

		<div class="left">

			<button class="button2"

					onclick="location.href=dataForWeixin.path+'&pre=true'">预览

			</button>

		</div>

		<div class="left">

			<button class="button2" onclick="location.reload()">再发一条</button>

		</div>

		<div class="left">

			<button class="button2" onclick="location.href='<?php  echo $this->createMobileUrl('index', array('card' => $card,'id'=>$_GET['id']));?>'">

				放弃

			</button>

		</div>

		<div class="clear"></div>

	</div>

	<div id="guide_button2">

		<button class="button2" onclick="_system._guideHide()">取消</button>

	</div>

</div>

<div id="guide2">

	<img src="../addons/wl_heka/style/images/guide2.png">

</div>

<div id="guide3">

	<img src="../addons/wl_heka/style/images/guide3.png">

</div>

<div id="toast"></div>

<script src="../addons/wl_heka/style/js/common.js?v=<?php  echo time();?>"></script>

</body>

</html>