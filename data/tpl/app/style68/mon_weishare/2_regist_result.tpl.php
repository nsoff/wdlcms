<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title></title>
	<meta name="format-detection" content="telephone=no, address=no">
	<meta name="apple-mobile-web-app-capable" content="yes" /> <!-- apple devices fullscreen -->
	<meta name="apple-touch-fullscreen" content="yes"/>
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="../addons/mon_weishare/css/bootstrap.min.css" rel="stylesheet">
	<link href="../addons/mon_weishare/css/font-awesome.min.css" rel="stylesheet">
	<link href="../addons/mon_weishare/css/animate.css" rel="stylesheet">
	<link href="../addons/mon_weishare/css/common.css" rel="stylesheet">

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
	
		<div class="jumbotron clearfix alert alert-success" style="width:80%;margin:0 auto;margin-top:100px;">
			<div class="row">
				<div class="col-xs-12 col-sm-3 col-lg-2">
					
				</div>
				<div class="col-xs-12 col-sm-8 col-md-9 col-lg-10">
										
					<p><?php  echo $res;?></p>
															<p><a href="<?php  echo $this->createMobileUrl('Auth',array("id"=>$sid,"au"=>0))?>">如果你的浏览器没有自动跳转，请点击此链接</a></p>
					<script type="text/javascript">
						setTimeout(function () {
							location.href = "<?php  echo $this->createMobileUrl('Auth',array("id"=>$sid,"au"=>0))?>";
						}, 3000);
					</script>
									</div>
			</div>
		</div>
					<div class="text-center footer" style="margin-top:10px; width:100%; text-align:center; word-break:break-all;">
				&nbsp;&nbsp;			</div>
						<script>require(['bootstrap']);</script>
	</div>
	<style>
		h5{color:#555;}
		a{color:#555;}
	</style>
	
</body>
</html>
