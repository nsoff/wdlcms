<?php defined('IN_IA') or exit('Access Denied');?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title><?php  echo $share['title'];?></title>
	<meta name="format-detection" content="telephone=no, address=no">
	<meta name="apple-mobile-web-app-capable" content="yes" /> <!-- apple devices fullscreen -->
	<meta name="apple-touch-fullscreen" content="yes"/>
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	<meta name="keywords" content="" />
	<meta name="description" content="<?php  echo $share['title'];?>" />
	<link href="../addons/mon_weishare/css/bootstrap.min.css" rel="stylesheet">
	<link href="../addons/mon_weishare/css/font-awesome.min.css" rel="stylesheet">
	<link href="../addons/mon_weishare/css/animate.css" rel="stylesheet">
	<link href="../addons/mon_weishare/css/common.css" rel="stylesheet">
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script src="../addons/mon_weishare/js/require.js"></script>
	<script src="../addons/mon_weishare/js/app/config.js"></script>
	<script type="text/javascript" src="../addons/mon_weishare/js/lib/jquery-1.11.1.min.js"></script>
	<script type="text/javascript">
		window.sharedata = {
			'appId': '', // 服务号可以填写appId
			'imgUrl' : '', // 缩略图
			'link': '', // 内容链接
			'title': '', // 内容标题
			'desc': '' // 内容简介
		};
		window.onshared = ''; 
	</script>
	
</head>
<body>
<div class="container container-fill">
	
<style>
	body{background:url(<?php  echo $_W['attachurl'];?><?php  echo $share['image'];?>);background-repeat:no-repeat;background-size:cover;}
	.panel{margin:.5em;padding-top:90%;border:none;background:rgba(0,0,0,0);text-align:center;}
	.panel a{color:#fff;line-height:30px;}
	.btn{border: 0; height: 40px; line-height: 40px; font-size: 18px;}
	.btn span{color: #FF0000; font-size:26px;}
	.btn.btn-info{background: #FFF; color: #333;}
	.btn.btn-primary{background: #F2CB0F; color: #333;}
	#mcover{position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0, 0, 0, 0.7);display:none;z-index:20000;}
	#mcover img{position:fixed;right: 18px;top:5px;width:260px;height:180px;z-index:20001;}
	
	.cropyt {
		margin-top: 10px;
		font: 14px/1.5 Microsoft YaHei, Helvitica, Verdana, Arial, san-serif;
		text-align: center;
		width: 100%;
	}
</style>
<div class="panel panel-info">
	<div class="panel-body">
		<a class="btn btn-info btn-block">已充值金额<span><b><?php  echo $shareUser['income'];?></b></span><?php  echo $share['unit'];?></a>
		<?php  if($isallow) { ?>
			<a href="javascript:void(0)" id="share_friend" class="btn btn-primary btn-block">邀请好友助力</a>
		<?php  } ?>
		
		<?php  if(!$isallow) { ?>
			<a href="javascript:void(0)"  class="btn btn-primary btn-block"><?php  echo $resText;?></a>
		<?php  } ?>
		
		<a href="<?php  echo $this->createMobileUrl('sort',array("id"=>$share['id'],"uid"=>$shareUser['id']))?>"  class="btn btn-primary btn-block">积分排名</a>
		
		<p><?php  echo $share['tip'];?>，<a href="<?php  echo $this->createMobileUrl('rule',array("id"=>$share['id'],"uid"=>$shareUser['id']))?>">点击查看活动规则>>></a></p>
	</div>
	
	<span class="cropyt" style="text-align: center;"><?php  echo $share['copyright'];?></span>
</div>
 
<div id="mcover" onclick="$(this).hide()"><img src="../addons/mon_weishare/images/guide.png"></div>

<script>require(['bootstrap']);</script>


			
			
	<?php  echo register_jssdk(false);?>
<script type="text/javascript">

	wx.ready(function () {
		sharedata = {
			title: "<?php  echo $share['shareTitle'];?>",
			desc: "<?php  echo $share['shareContent'];?>",
			link: '<?php  echo $_W['siteroot'];?>app<?php  echo str_replace('./','/',$this->createMobileUrl('Auth',array('id'=>$share['id'],'uid'=>$shareUser['id'],'au'=>1)))?>',
			imgUrl: "<?php  echo $_W['attachurl'];?><?php  echo $share['shareIcon'];?>",
			success: function(){
				
			},
			cancel: function(){
				
			}
		};
		wx.onMenuShareAppMessage(sharedata);
	});
	

	
</script>


	<script type="text/javascript">
	/*
		wx.config({
			appId: "<?php  echo $wx['appId'];?>",
			debug: false,
			timestamp: <?php  echo $wx['timestamp'];?>,
			nonceStr: "<?php  echo $wx['nonceStr'];?>",
			signature: "<?php  echo $wx['signature'];?>",
			jsApiList: [
				'checkJsApi',
				'onMenuShareTimeline',
				'onMenuShareAppMessage',
				'onMenuShareQQ',
				'onMenuShareWeibo',
				'hideMenuItems',
				'showMenuItems',
				'hideAllNonBaseMenuItem',
				'showAllNonBaseMenuItem',
				'translateVoice',
				'startRecord',
				'stopRecord',
				'onRecordEnd',
				'playVoice',
				'pauseVoice',
				'stopVoice',
				'uploadVoice',
				'downloadVoice',
				'chooseImage',
				'previewImage',
				'uploadImage',
				'downloadImage',
				'getNetworkType',
				'openLocation',
				'getLocation',
				'hideOptionMenu',
				'showOptionMenu',
				'closeWindow',
				'scanQRCode',
				'chooseWXPay',
				'openProductSpecificView',
				'addCard',
				'chooseCard',
				'openCard'

			]
		});
		wx.ready(function () {




			var shareData = {
				title: '<?php  echo $share['shareTitle'];?>',
				desc: '<?php  echo $share['shareContent'];?>',
				link: "<?php  echo $_W['siteroot'];?><?php  echo $this->createMobileUrl('Auth',array('id'=>$share['id'],'uid'=>$shareUser['id'],'au'=>1))?>",
				imgUrl: '<?php  echo $_W['attachurl'];?><?php  echo $share['shareIcon'];?>'
			};
			//分享朋友
			wx.onMenuShareAppMessage({
				title: shareData.title,
				desc: shareData.desc,
				link: shareData.link,
				imgUrl:shareData.imgUrl,
				trigger: function (res) {

				},
				success: function (res) {

				},
				cancel: function (res) {

				},
				fail: function (res) {

				}
			});
			//朋友圈
			wx.onMenuShareTimeline({
				title: shareData.title,
				desc: shareData.desc,
				link: shareData.link,
				imgUrl:shareData.imgUrl,
				trigger: function (res) {
				},
				success: function (res) {
					//window.location.href =adurl;
				},
				cancel: function (res) {
				},
				fail: function (res) {
					alert(JSON.stringify(res));
				}
			});

		});*/
	</script>




	<script type="text/javascript">



	$(document).ready(function(){
	
		$("#share_friend").click(function(){
			$("#mcover").show();
			
		});
	});



	//对分享时的数据处理
	function _removeHTMLTag(str) {
		str = str.replace(/<script[^>]*?>[\s\S]*?<\/script>/g,'');
		str = str.replace(/<style[^>]*?>[\s\S]*?<\/style>/g,'');
		str = str.replace(/<\/?[^>]*>/g,'');
		str = str.replace(/\s+/g,'');
		str = str.replace(/&nbsp;/ig,'');
		return str;
	}
</script>
</body>
</html>