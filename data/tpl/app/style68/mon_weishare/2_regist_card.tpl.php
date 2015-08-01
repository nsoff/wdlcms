<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
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
	<link rel="stylesheet" type="text/css"
	href="../addons/mon_weishare/css/sweet-alert.css" />
	
	<script src="../addons/mon_weishare/js/require.js"></script>
	<script src="../addons/mon_weishare/js/app/config.js"></script>
	<script type="text/javascript" src="../addons/mon_weishare/js/lib/jquery-1.11.1.min.js"></script>
	
	<script src="../addons/mon_weishare/js/sweet-alert.min.js"></script>
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
		margin-top: 30px;
		font: 14px/1.5 Microsoft YaHei, Helvitica, Verdana, Arial, san-serif;
		text-align: center;
		width: 100%;
	}
</style>
<div class="panel panel-info">
	

	<?php  if($isallow) { ?>
	<div class="panel-body">
		<input type="text" class="form-control"
					placeholder="请输入手机号" id="tel" name="tel" />
					
					
					<br/>
		
		<a href="javascript:void(0)" id="btn_regist" class="btn btn-primary btn-block">领取<?php  echo $share['cardname'];?></a>
		<p><?php  echo $share['tip'];?>，<a href="<?php  echo $this->createMobileUrl('rule',array("id"=>$share['id']))?>">点击查看活动规则>>></a></p>
	</div>
	<?php  } ?>
	
		<?php  if(!$isallow) { ?>
		
			<a href="javascript:void(0)"  class="btn btn-primary btn-block"><?php  echo $resText;?></a>
		<?php  } ?>
	

	
	<p class="cropyt" style="text-align: center;"><?php  echo $share['copyright'];?></p>
</div>
<div id="mcover" onclick="$(this).hide()"><img src="../addons/mon_weishare/images/guide.png"></div>
<script>require(['bootstrap']);</script>
<script type="text/javascript">

$(document).ready(function(){
	
	$("#btn_regist").click(function(){
		
		var mobile=$("#tel").val();
		if(mobile==""){
			swal({   title: "错误!",   text: "请输入手机号码!",   type: "error",   confirmButtonText: "确定" });
			return ;
		}else if(mobile.length!=11){
			swal({   title: "错误!",   text: "请输入有效的手机号码!",   type: "error",   confirmButtonText: "确定" });
			return ;	
		}else {
			
			
			 var myreg = /^1\d{10}$/;
		        if(!myreg.test(mobile)) {
		        	swal({   title: "错误!",   text: "请输入有效的手机号码!",   type: "error",   confirmButtonText: "确定" });
		           
		            return false;
		        }
			
			
		}
	
		
		window.location.href="<?php  echo $this->createMobileUrl('regist',array("sid"=>$share['id']),true)?>&tel="+mobile+"&openid=<?php  echo $userOpenid;?>";
		
		//$("#form_regist").submit();
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