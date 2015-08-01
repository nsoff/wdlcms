<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?php  echo $reply['title'];?></title>
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
<meta http-equiv="description" content="This is my page">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1,maximum-scale=1.0,user-scalable=no">
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta content="telephone=no" name="format-detection" />
<meta http-equiv="X-UA-Compatible"	content="IE=10; IE=9; IE=8; IE=7; IE=EDGE">
<meta name="robots" content="index,follow" />
<link rel="stylesheet" type="text/css" href="../addons/stonefish_redenvelope/template/css/al_base.css">
<link href="../addons/stonefish_redenvelope/template/css/emoji.css" rel="stylesheet" type="text/css" />
<style>
.ps-info {
	font-size: 14px;
	color: #ff5357;
}

.myrank {
	border-bottom: 2px #ed3c19 solid;
	font-size: 16px;
	color: #f08729;
	padding: 5px 0;
}

.gift_nameList {
	margin: 135px auto 0;
	width: 85px;
	height: 26px;
	position: relative;
}

.gift_nameList img {
	width: 85px;
	height: 26px;
	margin: 0;
}

.topBanner .con .banner03 {
	position: relative;
	top: 72px;
	width: 215px;
	height: 51px;
	margin: 0 auto;
	background: url(../addons/stonefish_redenvelope/template/images/banner_03.png);
	background-size: 100% 100%;
}

/* body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,code,form,fieldset,legend,input,textarea,p,blockquote,th,td
	{
	margin: 0;
	padding: 0;
	width: 100%;
	font: 16px/1.5 Microsoft YaHei, Helvitica, Verdana, Arial, san-serif;
} */

a {
	text-decoration: none
}

input {
	border: none;
	padding: 10px;
	color: #333;
	width: 90%;
}

body {
	overflow-x: hidden
}

#mcover {
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: rgba(0, 0, 0, 0.7);
	display: none;
	z-index: 20000;
}

#mcover img {
	position: fixed;
	right: 18px;
	top: 5px;
	width: 260px;
	height: 180px;
	z-index: 20001;
}

.container {
	width: 90%;
	padding: 10px;
	overflow: hidden;
	margin: auto;
	
}

 .block {
	display: block;
	width: 90%;
	margin: auto;
	margin-top: 10px;
	border-radius: 5px;
}
 
.white {
	background: <?php  echo $reply['rulebgcolor'];?>;
	color: #000
}
.white img{
	width:100%;
}
.btn {
	background-color: #0000ff;
	color: #fff;
}

.n {
	color: red;
	font-size: 16px;
}

 p {
	margin-top: 10px;
	font: 14px/1.5 Microsoft YaHei, Helvitica, Verdana, Arial, san-serif;
} 

.link {
	color: #fff;
}

.join {
	width: 100%;
}

		.topBanner .con .banner01 {
		position: relative;
		top: 5px;
		left: 3px;
		width: 304px;
		height: 80px;
		margin: 0 auto;
		background: url(<?php  echo $_W['attachurl'];?><?php  echo $reply['banner_pic'];?>);
		background-size: 100% 100%
	}
	

</style>
<style>
body {
	background: <?php  echo $reply['bgcolor'];?>;
	color: <?php  echo $reply['fontcolor'];?>;
}
.btnLink {
	background: <?php  echo $reply['btncolor'];?>;
	color: <?php  echo $reply['btnfontcolor'];?>;
}
a:link,a:visited,a:hover,a:active {color:<?php  echo $reply['btnfontcolor'];?>;}
.money .btnLink,.money1 .btnLink {
	background: <?php  echo $reply['txcolor'];?>;
	color: <?php  echo $reply['txfontcolor'];?>;
}
.wrap .helpLink {
	background: <?php  echo $reply['txcolor'];?>;
	color: <?php  echo $reply['txfontcolor'];?>;
}
</style>
</head>

<body>

	<div style="max-width:100%">
		<?php  if(!empty($reply['adpic'])) { ?><?php  if(!empty($reply['adpicurl'])) { ?><a href="<?php  echo $reply['adpicurl'];?>"><?php  } ?><img id="top_img" style="max-width: 100%;height: auto;width: auto\9;"  src="<?php  echo toimage($reply['adpic'])?>" width="100%" border="0"><?php  if(!empty($reply['adpicurl'])) { ?></a><?php  } ?><?php  } ?>
    </div> 
		<div class="container block white">
			<p style="font-size: 18px/1.5em">
				<b>活动时间</b>
			</p>
			<p></p>
			<p><?php  echo date('Y-m-d H:i', $reply['starttime'])?> 到 <?php  echo date('Y-m-d H:i', $reply['endtime'])?></p>
		</div>
		<div class="container block white">
			<p style="font-size: 18px/1.5em">
				<b>活动规则</b>
			</p>
			<?php  echo htmlspecialchars_decode($share['share_txt'])?>
		</div>
		<?php  if(empty($reply['envelope'])) { ?>
		<div class='container block white'>
        <p style='font-size:18px/1.5em'><b>活动奖品<?php  if($reply['award_times']!=0) { ?>(只能选择奖品中的<?php  echo $reply['award_times'];?>个奖品领取)<?php  } else { ?><?php  } ?></b></p>
        <?php  if(is_array($prize)) { foreach($prize as $prizes) { ?>
		    <p style="text-align:center; margin:0px 20px;"><img src="<?php  echo toimage($prizes['prizepic'])?>"><br/><?php  echo $prizes['prizetype'];?> - <?php  echo $prizes['prizename'];?><?php  if($reply['show_num']==2) { ?> X<?php  echo $prizes['prizetotal'];?><?php  } ?><br/>需要<?php  echo number_format($prizes['point'])?>元方可兑换</p>
			<?php  if($reply['award_times']>$prizenum) { ?>
			<?php  if($prizes['point']<=$fans['inpoint']-$fans['outpoint']) { ?><p><a class="btnLink" href="<?php  echo $this->createMobileUrl('exchange', array('rid' => $rid,'pid' => $prizes['id'],'uid' => $fans['id']))?>">立即兑换</a></p><?php  } ?>
			<?php  } ?>
	        <p class="line"></p>
        <?php  } } ?>
		    <p><?php  echo htmlspecialchars_decode($reply['award_info'])?></p>
    	</div>
		<?php  } ?>
		<div class="container block">
		<a class="btnLink" href="<?php  echo $this->createMobileUrl('index', array('rid' => $rid))?>">返回</a>
		</div>
	<script type="text/javascript" src="../addons/stonefish_redenvelope/template/js/zepto.min.js"></script>
	<script src="../addons/stonefish_redenvelope/template/js/emoji.js"></script>
	<script>
		$(function() {

			$(".nickname").each(function() {
				var html = $(this).html().trim().replace(/\n/g, '<br/>');
				html = jEmoji.softbankToUnified(html);
				html = jEmoji.googleToUnified(html);
				html = jEmoji.docomoToUnified(html);
				html = jEmoji.kddiToUnified(html);
				$(this).html(jEmoji.unifiedToHTML(html));
			}).css({
				width : $(window).width() - 200,
				height : 50,
				overflow : 'hidden'
			});
		});
	</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('jssdkhide', TEMPLATE_INCLUDEPATH)) : (include template('jssdkhide', TEMPLATE_INCLUDEPATH));?>
</body>
</html>