<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
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
<div class="page-load-container">
	<div class="page-load-page ranking-page">
		<div class="ranking-body" style="padding-top:0px;">
			<div class="ranking-banner">
				<?php  if(empty($bbb['headurl'])) { ?><?php  } else { ?><a href="<?php  echo $bbb['headurl'];?>" target="_blank"><?php  } ?>
				<?php  if(empty($bbb['headpic'])) { ?>
				<img src="../addons/hl_bbb/template/images/bg-header.jpg" width="100%">
				<?php  } else { ?>
				<img src="<?php  echo $_W['attachurl'];?><?php  echo $bbb['headpic'];?>" width="100%">
				<?php  } ?>
				<?php  if(empty($bbb['headurl'])) { ?><?php  } else { ?></a><?php  } ?>
			</div>
			<div class="rule"><?php  echo $bbb['rule'];?></div>
		</div>
		<div class="power-by">
			@<?php  echo $_W['account']['name'];?>
		</div>
	</div>
</div>
<style>
	.footerbar {position: fixed;left: 0;bottom: 0;width: 100%;height: 77px;text-align:center;}
</style>
<div class="footerbar">
	<a  href="<?php  echo $this->createMobileUrl('lottery', array('id' => $id))?>">
		<img src="../addons/hl_bbb/template/images/start-button.png">
	</a>
</div>
<script type="text/javascript">
	var link = "<?php  echo $_W['siteroot'].'app'. ltrim($this->createMobileUrl('info', array('id' => $id,'uid' => $myuser['id'])),'.')?>";
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