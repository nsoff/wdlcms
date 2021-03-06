<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?php  echo $bbb['title'];?></title>
	<?php  echo register_jssdk();?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta http-equiv="Pragma" content="no-cache">
	<link rel="stylesheet" type="text/css" href="../addons/hl_bbb/template/images/main.css">
	<script>
		var bburl = "<?php  echo $this->createMobileUrl('getaward', array('id' => $id))?>";
		var image_path = "<?php  echo MODULE_URL;?>";
	</script>
	<script type="text/javascript" charset="utf-8" src="../addons/hl_bbb/template/images/jquery.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="../addons/hl_bbb/template/images/css3animate.js"></script>
	<script type="text/javascript" charset="utf-8"
			src="../addons/hl_bbb/template/images/bobing.js?v=<?php  echo time();?>"></script>
	<style>
		body {
			display: block;
			margin: 0;
			padding: 0;
			background-image: url(../addons/hl_bbb/template/images/bg-body.jpg);
			background-size: 100% auto;
			background-repeat: no-repeat;
			background-color: #000;
		}

		.afpopupbobing div {
			background-image: url(../addons/hl_bbb/template/images/pupopbg.png);
			height: 196px;
			text-align: left;
			padding-top: 50px;
			padding-left: 50px;
			padding-right: 50px;
			color: #333;
			font-size: 24px;
		}

		.infoss {
			margin: 0;
			padding: 0;
		}

		.infos {
			color: #fff;
		}

		.infos span {
			color: #fff;
			padding-left: 10px;
			background-color: #032363;
		}

		<?php  if(!empty($bbb[ 'panzi' ])) { ?>
		.bobigwan {
			background-image: url({$_W[ 'attachurl' ]}{$bbb[ 'panzi' ]});
		}
		<?php  } ?>
	</style>
</head>
<div>
	<div id="content" class="hasMenu" style="bottom: 49px; top: 44px;">
		<div id="electronCoupons" class="panel index" title="" js-scrolling="true" data-title="博饼活动"
			 style="overflow: hidden; display: block;">
			<div class="index afScrollPanel" js-scrolling="true"
				 style="-webkit-transform: translate3d(0px, 0px, 0); -webkit-transition: 0ms linear; transition: 0ms linear;">
				<div class="infoss">
					<?php  if(empty($bbb['headurl'])) { ?><?php  } else { ?><a href="<?php  echo $bbb['headurl'];?>" target="_blank"><?php  } ?>
					<?php  if(empty($bbb['headpic'])) { ?>

					<img src="../addons/hl_bbb/template/images/bg-header.jpg" width="100%">
					<?php  } else { ?>
					<img src="<?php  echo $_W['attachurl'];?><?php  echo $bbb['headpic'];?>" width="100%">
					<?php  } ?>
					<?php  if(empty($bbb['headurl'])) { ?><?php  } else { ?></a><?php  } ?>
				</div>
				<div class="bobigwan" id="bobigwan">
					<div id="wannei">
						<span id="pic1" class="b1"></span>
						<span id="pic2" class="b2"></span>
						<span id="pic3" class="b3"></span>
						<span id="pic4" class="b4"></span>
						<span id="pic5" class="b5"></span>
						<span id="pic6" class="b6"></span>
					</div>
				</div>
				<div class="infos">
					<span> 您好,<span id="theusername"><?php  echo $profile['nickname'];?></span></span>
					<span> 总点数:<span id="mytotals"><?php  echo $myuser['points'];?></span></span>
					<span> 今日次数:<span id="theRemaining"><?php  echo $arr_times['today_has'];?></span></span>
					<span> 助威次数:<span id="usercont"><?php  echo $arr_times['todayalltimes'];?></span></span>
					<span> 活动规则&darr;</span>
					<span> <a href="<?php  echo $this->createMobileUrl('rank', array('id' => $id))?>">查看排名</a></span>
				</div>
				<audio id="bobigaudio" src="../addons/hl_bbb/template/images/bbb.mp3"></audio>
			</div>
		</div>
	</div>
	<div class="afScrollbar"
		 style="position: absolute; width: 5px; height: 20px; border-top-left-radius: 2px; border-top-right-radius: 2px; border-bottom-right-radius: 2px; border-bottom-left-radius: 2px; display: none; background-color: black; top: 0px; background-position: initial initial; background-repeat: initial initial;">
	</div>
</div>
<div id="aside_menu" style="overflow: hidden;">
	<div id="aside_menu_scroller"
		 style="-webkit-transform: translate3d(0px, 0px, 0); -webkit-transition: 0ms linear; transition: 0ms linear;"></div>
	<div class="afScrollbar"
		 style="position: absolute; width: 5px; height: 20px; border-top-left-radius: 2px; border-top-right-radius: 2px; border-bottom-right-radius: 2px; border-bottom-left-radius: 2px; display: none; background-color: black; top: 0px; -webkit-transition: 0ms; transition: 0ms; background-position: initial initial; background-repeat: initial initial;"></div>
</div>
<div id="afui_modal" style="overflow: hidden;">
	<div id="modalContainer"
		 style="-webkit-transform: translate3d(0px, 0px, 0); -webkit-transition: 0ms linear; transition: 0ms linear;"></div>
	<div id="modalTransContainer"></div>
	<div class="afScrollbar"
		 style="position: absolute; width: 5px; height: 20px; border-top-left-radius: 2px; border-top-right-radius: 2px; border-bottom-right-radius: 2px; border-bottom-left-radius: 2px; display: none; background-color: black; top: 0px; background-position: initial initial; background-repeat: initial initial;"></div>
</div>
<div id="afui_mask" class="ui-loader" style="z-index: 20000; display: none;">
	<span class="ui-icon ui-icon-loading spin"></span>

	<h1>Loading Content</h1>
</div>
<script type="text/javascript">
	var bobingright = true;
	bobing.username = "";
	bobing.remainder = <?php  echo $arr_times['today_has'];?>;
	window.addEventListener('load', initializebobing, false);
	var link = "<?php  echo $_W['siteroot'].'app'. ltrim($this->createMobileUrl('lottery', array('id' => $id,'uid' => $myuser['id'])),'.')?>";

	// 摇骰子分享
	wx.ready(function () {
		sharedata = {
			title: "<?php  echo $bbb['title'];?>",
			desc: "<?php  echo $bbb['descriptions'];?>",
			link: link,
			imgUrl: "<?php  echo $_W['siteroot'];?>addons/hl_bbb/template/images/d1.png"
		};
		wx.onMenuShareAppMessage(sharedata);
		wx.onMenuShareTimeline(sharedata);
	});

</script>
</body>
</html>