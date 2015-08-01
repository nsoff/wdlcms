<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-cn" class="body-full-height">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="./resource/favicon.png">
	<title><?php  if(!empty($_W['page']['title'])) { ?><?php  echo $_W['page']['title'];?> - <?php  } ?><?php  if(empty($_W['page']['copyright']['sitename'])) { ?>微动力 - 公众平台自助引擎<?php  } else { ?><?php  echo $_W['page']['copyright']['sitename'];?><?php  } ?></title>
	<script src="./resource/athens/js/require.js"></script>
	<script src="./resource/athens/js/app/config.js"></script>
	<link rel="stylesheet" type="text/css" id="theme" href="./resource/wdlcms/css/theme-default.css"/>
<style>
	.reco{color: #fff;font-weight: bold;}

</style>
</head>
<body>
<script>
require(['jquery', 'util'], function($, u){
	$('#form1').submit(function(){
		if($.trim($(':text[name="username"]').val()) == '') {
			u.message('没有输入用户名.', '', 'error');
			return false;
		}
		if($('#password').val() == '') {
			u.message('没有输入密码.', '', 'error');
			return false;
		}
		if($('#password').val() != $('#repassword').val()) {
			u.message('两次输入的密码不一致.', '', 'error');
			return false;
		}
/* 		<?php  if(is_array($extendfields)) { foreach($extendfields as $item) { ?>
		<?php  if($item['required']) { ?>
			if (!$.trim($('[name="<?php  echo $item['field'];?>"]').val())) {
				u.message('<?php  echo $item['title'];?>为必填项，请返回修改！', '', 'error');
				return false;
			}
		<?php  } ?>
		<?php  } } ?>
 */		<?php  if($setting['register']['code']) { ?>
		if($.trim($(':text[name="code"]').val()) == '') {
			u.message('没有输入验证码.', '', 'error');
			return false;
		}
		<?php  } ?>
	});
});
require(['jquery'],function($){
	var h = document.documentElement.clientHeight;
	$(".login").css('min-height',h);
});
</script>




<div class="login-container">

	<div class="login-box animated fadeInDown">
		<div class="login-logo"></div>
		<div class="login-body">
			<div class="login-title"></div>

			<form action="" method="post" role="form" class="form-horizontal" onsubmit="return formcheck();">
				<div class="form-group">
					<div class="col-md-12">
						<label class="reco">用户名:<span style="color:red">*</span></label>
						<input name="username" type="text" class="form-control" placeholder="请输入用户名">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<label class="reco">密码:<span style="color:red">*</span></label>
						<input name="password" type="password" id="password" class="form-control" placeholder="请输入密码">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<label class="reco">确认密码:<span style="color:red">*</span></label>
						<input name="password" type="password" id="repassword" class="form-control" placeholder="请再次输入密码">
					</div>
				</div>
				<?php  if($extendfields) { ?>
				<?php  if(is_array($extendfields)) { foreach($extendfields as $item) { ?>
				<div class="form-group">
					<div class="col-md-12">
					<label class="reco"><?php  echo $item['title'];?>：<?php  if($item['required']) { ?><span style="color:red">*</span><?php  } ?></label>
					<?php  echo tpl_fans_form($item['field'])?>
					</div>
				</div>
				<?php  } } ?>
				<?php  } ?>



				<div class="form-group">
					<div class="col-md-12">
						<label style="display:block;" class="reco">验证码:<span style="color:red;">*</span></label>
						<input name="code" type="text" class="form-control" placeholder="请输入验证码" style="width:45%;display:inline;margin-right:17px">
						<img src="<?php  echo url('utility/code');?>" class="img-rounded" style="cursor:pointer;" onclick="this.src='<?php  echo url('utility/code');?>' + Math.random();" />
					</div>
				</div>
				<div class="form-group">

					<div class="col-md-6" style="float: right;">
						<input type="submit" name="submit" value="注册" class="btn btn-info btn-block" />
						<input name="token" value="<?php  echo $_W['token'];?>" type="hidden" />

					</div>
				</div>

				<div class="login-subtitle">
					我有WDLCMS营销帐号！立刻 <a href="<?php  echo url('user/login');?>">登录</a>
				</div>
			</form>
		</div>
		<div class="login-footer">
			<div class="pull-left">
				&copy; 2014 WDLCMS.COM
			</div>
			<div class="pull-right">
				<a href="#">关于我们</a> |
				<a href="#">提供服务</a> |
				<a href="#">联系我们</a>
			</div>
		</div>
	</div>
</body>
</html>