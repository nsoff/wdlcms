<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php  echo $reply['title'];?></title>
	<meta http-equiv="Expires" Content="-1">
    <meta name="description" content="<?php  echo $reply['description'];?>">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta http-equiv="cleartype" content="on">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="">
    <!-- <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" /> -->
    <script type="text/javascript">
		var phoneWidth = parseInt(window.screen.width);
		var phoneScale = phoneWidth/640;
		
		var ua = navigator.userAgent;
		if (/Android (\d+\.\d+)/.test(ua)){
			var version = parseFloat(RegExp.$1);
			// andriod 2.3
			if(version>2.3){
				document.write('<meta name="viewport" content="width=640, minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+', target-densitydpi=device-dpi">');
			// andriod 2.3以上
			}else{
				document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
			}
			// 其他系统
		} else {
			document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
		}
	</script>	
    <!-- <meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi"> -->
    <link rel="stylesheet" type="text/css" href="../addons/stonefish_planting/template/css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="../addons/stonefish_planting/template/css/mobile.css?20150303"/>
</head>
<body><!--  -->
	<div style="max-width:100%">
		<?php  if(!empty($reply['adpic'])) { ?><?php  if(!empty($reply['adpicurl'])) { ?><a href="<?php  echo $reply['adpicurl'];?>"><?php  } ?><img id="top_img" style="max-width: 100%;height: auto;width: auto\9;"  src="<?php  echo toimage($reply['adpic'])?>" width="100%" border="0"><?php  if(!empty($reply['adpicurl'])) { ?></a><?php  } ?><?php  } ?>   
	</div>
    <div class="rule">
	    <div class="guize">
			<p>&nbsp;&nbsp;&nbsp;</p>
			<p style="text-align:center;"><img src="../addons/stonefish_planting/template/images/time.png"></p>
			<p style="text-align:center;"><?php  echo date('Y-m-d H:i', $reply['starttime'])?> 到 <?php  echo date('Y-m-d H:i', $reply['endtime'])?></p>
		</div>
		<div class="guize">
			<p class="line"></p>
			<p style="text-align:center;"><img src="../addons/stonefish_planting/template/images/guize.png"></p>
			<p style="text-align:left; margin:0px 20px;line-height:200%;"><?php  echo htmlspecialchars_decode($share['share_txt'])?></p>
		</div>
		<div class='guize'>
		    <p class="line"></p>
            <p style="text-align:center;"><img src="../addons/stonefish_planting/template/images/prize.png"></p>
            <?php  if(is_array($prize)) { foreach($prize as $prizes) { ?>
		    <p style="text-align:center; margin:0px 20px;line-height:200%;"><img src="<?php  echo toimage($prizes['prizepic'])?>"><br/><?php  echo $prizes['prizetype'];?> - <?php  echo $prizes['prizename'];?><?php  if($reply['show_num']==2) { ?> X<?php  echo $prizes['prizetotal'];?><?php  } ?><br/>生长值<?php  echo number_format($prizes['seednum'])?>可抽此奖</p>
            <?php  } } ?>
		    <p class="line"></p>
			<p style="text-align:left; margin:0px 20px;line-height:200%;"><?php  echo htmlspecialchars_decode($reply['award_info'])?></p>
    	</div>
		<div class="guize">
		    <a class="btnLink" href="<?php  echo $this->createMobileUrl('index', array('rid' => $rid,'from_user' => $page_from_user))?>">返回</a>
		</div>
    </div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('jssdkhide', TEMPLATE_INCLUDEPATH)) : (include template('jssdkhide', TEMPLATE_INCLUDEPATH));?>
</body>
</html>