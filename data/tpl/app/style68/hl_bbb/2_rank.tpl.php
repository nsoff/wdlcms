<?php defined('IN_IA') or exit('Access Denied');?>﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="”apple-mobile-web-app-capable”" content="”yes”">
	<meta content="telephone=no" name="format-detection">
	<title><?php  echo $bbb['title'];?></title>
	<?php  echo register_jssdk();?>
	<link href="../addons/hl_bbb/template/images/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="page-load-container" style="opacity: 1;">
	<div class="page-load-page ranking-page">
		<div class="ranking-body" style="padding-top:0px;">
			<div class="ranking-banner">
				<img src="../addons/hl_bbb/template/images/ranking-banner.jpg" border="0" alt="">
				<span class="ranking-banner-text"><?php  echo $str;?></span>
				<span class="ranking-time"></span>
				<?php  if($showurl) { ?>
				<a  class="to-index-button" href="<?php  echo $bbb['guzhuurl'];?>">我也<br>要玩</a>
				<?php  } else { ?>
				<a  class="to-index-button" href="<?php  echo $this->createMobileUrl('lottery', array('id' => $id))?>">返回<br>游戏</a>
				<?php  } ?>
			</div>
			<div class="ranking-list" >
				<div class="tr">
					<div class="th th1">名次<span class="arrow arrow-bottom"></span></div>
					<div class="th th2">获奖者<span class="arrow arrow-bottom"></span></div>
					<div class="th th3">点数<span class="arrow arrow-bottom"></span></div>
				</div>
				<?php  $num=1?>
				<?php  if(is_array($allph)) { foreach($allph as $ph) { ?>
				<div class="tr">
					<div class="td td1 r<?php  echo $num;?>"></div>
					<div class="td td2">
						<div class="user-head ellipsis">
							<span class="week-crown"></span>
							<?php  echo $ph['nickname'];?>
						</div>
					</div>
					<div class="td td3"><?php  echo $ph['points'];?></div>
				</div>
				<div class="tr">
					<div class="td"></div>
					<div class="td"></div>
					<div class="td"></div>
				</div>
				<?php  $num++?>
				<?php  } } ?>
			</div>


		</div>
		<div class="power-by">
			@<?php  echo $_W['account']['name'];?>
		</div>

	</div>
</div>
<script type="text/javascript">
	var link = "<?php  echo $_W['siteroot'].'app'. ltrim($this->createMobileUrl('rank', array('id' => $id,'uid' => $myuser['id'])),'.')?>";
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