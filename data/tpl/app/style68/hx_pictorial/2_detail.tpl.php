<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/> 
<title><?php  echo $huabao['title'];?></title>
<script type="text/javascript">
document.write('<div id="load-layer"><div id="loading"></div></div>');
window.onload=function(){
	var load = document.getElementById("load-layer");
	load.parentNode.removeChild(load);
}
</script>
<style type="text/css">
<?php  $loadsys = $_W['siteroot'].'addons/hx_pictorial/template/mobile/img/loading.png';?>
<?php $loading = !empty($huabao['loading']) ? $huabao['load']:$loadsys;?>
#loading{background: url("<?php  echo $loading;?>");}
</style>
<link rel="stylesheet" type="text/css" href="/addons/hx_pictorial/template/mobile/css/swiper.css">
<link rel="stylesheet" type="text/css" href="/addons/hx_pictorial/template/mobile/css/index.css?v=2">
<link type="text/css" rel="stylesheet" href="/addons/hx_pictorial/template/mobile/css/manimation.css" />
<link type="text/css" rel="stylesheet" href="/addons/hx_pictorial/template/mobile/js/fancybox/fancybox.css" />
</head>
<body>
<?php  if((($huabao['open'])&&($huabao['ostyle']==1))) { ?>
<div id="mas">
	<canvas id="cas" ></canvas>
</div>  
<?php  } ?>
<div class="swiper-container">
	<!--音乐控制-->
	<div class="audio-controls on"></div>
	<!-- 滑动操作指示 -->
	<div class="start"><strong></strong></div>
	<!-- 主体 -->
	<div class="swiper-wrapper">
		<?php  $i = 0;?>
		<?php  if(is_array($result['list'])) { foreach($result['list'] as $row) { ?>
		<?php  $i++?>
		<div class="swiper-slide slide<?php  echo $i;?>" style="background: url('<?php  echo $_W['attachurl'];?><?php  echo $row['attachment'];?>') no-repeat center center; background-size: 100% 100%;" <?php  if(!empty($row['url'])) { ?>onclick="javascript:window.location.href='<?php  echo $row['url'];?>'"<?php  } ?>>
			<?php  if(is_array($row['items'])) { foreach($row['items'] as $item) { ?>
			<?php  if(($item['type']==0)) { ?>
			<?php  $size = GetImageSize($_W['attachurl'].$item['item']);?>
			<div class="<?php  echo $item['animation'];?>" style="height:<?php  echo $size['1']/10.08?>%;width:<?php  echo $size['0']/6.4?>%;top:<?php  echo $item['y']/10.08?>%;left:<?php  echo $item['x']/6.40?>%;"><?php  if($item['url']) { ?><?php  if(($item['url']=='#share')) { ?><a href="javascript:$('#mcover').show()"><?php  } else { ?><a class="fancy iframe" href="<?php  echo $item['url'];?>"><?php  } ?><img src="<?php  echo $_W['attachurl'];?><?php  echo $item['item'];?>" style="width:100%;height:100%;"/></a><?php  } else { ?><img src="<?php  echo $_W['attachurl'];?><?php  echo $item['item'];?>" style="width:100%;height:100%;"/><?php  } ?></div>
			<?php  } ?>
			<?php  } } ?>
		</div>   
		<?php  } } ?>
	</div>
</div>
<?php  if(!empty($huabao['music'])) { ?>
<!-- 背景音乐 -->
<audio id="audio" <?php  if($huabao['mauto']) { ?>autoplay="autoplay"<?php  } ?> <?php  if($huabao['mloop']) { ?>loop="loop"<?php  } ?>>
	<source src="<?php  echo $huabao['music'];?>" type="audio/mpeg" />
</audio>
<?php  } ?>
<script src="/addons/hx_pictorial/template/mobile/js/jquery.min.js"></script>
<script src="/addons/hx_pictorial/template/mobile/js/swiper.min.js"></script>
<script src="/addons/hx_pictorial/template/mobile/js/wechat.min.js"></script>
<script src="/addons/hx_pictorial/template/mobile/js/fancybox/fancybox.js"></script>
<?php  if((($huabao['open'])&&($huabao['ostyle']==1))) { ?>
<!-- 手指擦除效果 -->
<script src="/addons/hx_pictorial/template/mobile/js/tapclip.min.js"></script>
<script type="text/javascript">
var canvas = document.getElementById("cas"),ctx = canvas.getContext("2d");
var x1,y1,a=20,timeout,totimes = 100,jiange = 20;
canvas.width = document.getElementById("mas").clientWidth;
canvas.height = document.getElementById("mas").clientHeight;
var img = new Image();
img.src = "<?php  echo $_W['attachurl'];?><?php  echo $huabao['open'];?>";
img.onload = function(){
	ctx.drawImage(img,0,0,canvas.width,canvas.height)
	tapClip()
}
</script>
<?php  } ?>
<script type="text/javascript">
<!-- 滑动 -->
var mySwiper = new Swiper('.swiper-container',{
	loop:<?php  echo $huabao['isloop'];?>,
	mode:'vertical',
	tdFlow: {
		rotate :60,
		depth: 150,
	}
})
<!-- 音频暂停播放 -->
var audioAuto = document.getElementById('audio');
<?php  if($huabao['mauto']) { ?>
audioAuto.play();
<?php  } else { ?>
$(".audio-controls").removeClass("on");
<?php  } ?>
$(".audio-controls").click(function (){ 
	if (audioAuto.paused) {
		audioAuto.play();
		$(".audio-controls").addClass("on");
        }
        else {
		audioAuto.pause();
		$(".audio-controls").removeClass("on");
        }
})
</script>
<!-- 弹出层设置 -->
<script type="text/javascript">
$(document).ready(function() {
	$(".fancy").fancybox({
		'width':'100%',
		'height'	:'100%',
		'margin':'0',
		'padding':'0',
		'scrolling':'no',
		'autoScale':'false',
		'type':'iframe'
	});
});
</script>
<!-- 微信分享设置 -->
<script type="text/javascript">
WeixinApi.ready(function(Api) {
	Api.showOptionMenu();
	var wxData = {
		"imgUrl" : '<?php  echo $_W['attachurl'];?><?php  echo $huabao['icon'];?>',
		"desc" : '<?php  echo $huabao['content'];?>',
		"title" : '<?php  echo $huabao['title'];?>',
		"link" : 'http://<?php  echo $_SERVER['HTTP_HOST'];?><?php  echo $_SERVER['REQUEST_URI'];?>&wxref=mp.weixin.qq.com'
		};
	// 分享的回调
	var wxCallbacks = {
		// 分享被用户自动取消
		cancel : function(resp) {
			alert("亲，这么好的东西怎么能不分享给好朋友呢！");
		},
		// 分享失败了
		fail : function(resp) {
			alert("分享失败，可能是网络问题，一会儿再试试？");
		},
		// 分享成功
		confirm : function(resp) {
			window.location.href='<?php  echo $huabao['share'];?>';
		},
	};
	Api.shareToFriend(wxData,wxCallbacks);
	Api.shareToTimeline(wxData,wxCallbacks);
	Api.shareToWeibo(wxData,wxCallbacks);
});
</script>
<div id="mcover" onclick="$(this).hide()"><img src="./resource/images/guide.png"></div>
</body>
</html>