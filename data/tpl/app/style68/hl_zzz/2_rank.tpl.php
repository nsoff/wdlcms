<?php defined('IN_IA') or exit('Access Denied');?>﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="”apple-mobile-web-app-capable”" content="”yes”">
	<meta content="telephone=no" name="format-detection">
	<title>做粽子-排名</title>
	<?php  echo register_jssdk();?>
	<link href="../addons/hl_zzz/template/images/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="page-load-container" style="min-height: 771px; opacity: 1;">
	<div class="page-load-page ranking-page"  style="min-height: 771px;">

		<div class="ranking-body" style="padding-top:0px;">
			<div class="ranking-banner">
				<img src="../addons/hl_zzz/template/images/ranking-banner.jpg" border="0" alt="">
				<span class="ranking-banner-text"><?php  echo $str;?></span>
				<span class="ranking-time"></span>
				<?php  if($showurl) { ?>
				<a  class="to-index-button" href="<?php  echo $zzz['guzhuurl'];?>">我也<br>要玩</a>
				<?php  } else { ?>
				<a  class="to-index-button" href="<?php  echo $this->createMobileUrl('lottery', array('id' => $id))?>">返回<br>游戏</a>
				<?php  } ?>
			</div>
			<div class="ranking-list" >
				<div class="tr">
					<div class="th th1">名次<span class="arrow arrow-bottom"></span></div>
					<div class="th th2">名字<span class="arrow arrow-bottom"></span></div>
					<div class="th th3"><?php  echo $zzz['bigunit'];?>/<?php  echo $zzz['smallunit'];?><span class="arrow arrow-bottom"></span></div>
				</div>
				<?php  $num=1?>
				<?php  if(is_array($allph)) { foreach($allph as $ph) { ?>
				<div class="tr">
					<?php  if($num>3) { ?>
					<div class="td td1 r0"><?php  echo $num;?>&nbsp;</div>
					<?php  } else { ?><div class="td td1 r<?php  echo $num;?>"></div>
					<?php  } ?>
					<div class="td td2">
						<div class="user-head ellipsis">
							<span class="week-crown"></span>
							<?php  echo $ph['nickname'];?>
						</div>
					</div>
					<div class="td td3"><?php  echo $ph['zz'];?>/<?php  echo $ph['ypoints'];?></div>
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
	// 做粽子分享
	wx.ready(function () {
		sharedata = {
			title: "<?php  echo $zzz['title'];?>",
			desc: "我在玩『<?php  echo $zzz['title'];?>』，抢头等奖。快进来助我一臂之力～～",
			link: "<?php  echo $_W['siteroot'];?>app/<?php  echo $this->createMobileUrl('rank', array('id' => $id,'uid' => $myuser['id']))?>",
			imgUrl: "<?php  echo $_W['siteroot'];?>addons/hl_zzz/icon.jpg"
		};
		wx.onMenuShareAppMessage(sharedata);
		wx.onMenuShareTimeline(sharedata);
	});
</script>
</body>
</html>