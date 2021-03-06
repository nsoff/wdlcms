<?php defined('IN_IA') or exit('Access Denied');?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta name="viewport"
		  content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title><?php  echo $share['title'];?></title>
	<meta name="format-detection" content="telephone=no, address=no">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- apple devices fullscreen -->
	<meta name="apple-touch-fullscreen" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style"
		  content="black-translucent" />
	<meta name="keywords" content="" />
	<meta name="description" content="<?php  echo $share['title'];?>" />
	<link href="../addons/mon_weishare/css/bootstrap.min.css"
		  rel="stylesheet">
	<link href="../addons/mon_weishare/css/font-awesome.min.css"
		  rel="stylesheet">
	<link href="../addons/mon_weishare/css/animate.css" rel="stylesheet">
	<link href="../addons/mon_weishare/css/common.css" rel="stylesheet">
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

	<link href="../addons/mon_weishare/css/base.css" rel="stylesheet">

	<script src="../addons/mon_weishare/js/require.js"></script>
	<script src="../addons/mon_weishare/js/app/config.js"></script>
	<script type="text/javascript"src="../addons/mon_weishare/js/lib/jquery-1.11.1.min.js"></script>
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

	<style>
		body {
			background: url(<?php  echo $_W['attachurl'];?><?php  echo $share['image'];?>);
			background-repeat :no-repeat;
			background-size:cover;
		}
		.panel {
			margin: .5em;
			padding-top: 90%;
			border: none;
			background: rgba(0, 0, 0, 0);
			text-align: center;
		}

		.panel a {
			color: #fff;
			line-height: 30px;
		}

		.btn {
			border: 0;
			height: 40px;
			line-height: 40px;
			font-size: 18px;
		}

		.btn span {
			color: #FF0000;
			font-size: 26px;
		}

		.btn.btn-info {
			background: #FFF;
			color: #333;
		}

		.btn.btn-primary {
			background: #F2CB0F;
			color: #333;
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

		.wrap_fillet {
			position: fixed; /*or前面的是absolute就可以用*/
			bottom: 0px;
			margin: auto;
			width: 100%;
		}
	</style>
</head>

<body>

<div class="container container-fill">
	<style>
		body{background: <?php  echo $share['background'];?>;}
		.head img{width:100%;}
		.content{padding:10px;color:#fff;}
		.content img{max-width:100%;}
	</style>
	<div class="head">
		<img src="<?php  echo $_W['attachurl'];?><?php  echo $share['thumb'];?>">
	</div
	<div class="wrap_fillet table_box">
		<span style="color:#fff">排名前<?php  echo $sortcount;?>名</span> &nbsp;&nbsp; <span><?php  if($share['showu']==1) { ?>总参与人数:<?php  echo $total;?>人<?php  } ?></span>
		<table class="table_list">
			<tr>
				<th>名次</th>
				<th>手机号</th>
				<th>助力次数</th>
				<th>积分</th>
			</tr>

			<?php  if(is_array($list)) { foreach($list as $item) { ?>

			<tr>
				<td><?php  echo $item['rowno'];?></td>
				<td><?php  echo substr($item['tel'],0,3)?>****<?php  echo substr($item['tel'],7)?></td>
				<td><?php  echo $item['helpcount'];?></td>
				<td><?php  echo $item['income'];?></td>
			<tr>





				<?php  } } ?>


		</table>
	</div>



</div>
<div id="mcover" onclick="$(this).hide()">
	<img src="../addons/mon_weishare/images/guide.png">
</div>
<script>require(['bootstrap']);</script>




<script type="text/javascript">


	$(document).ready(function(){

		$("#btn_help").click(function(){


			$("#form_help").submit();
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