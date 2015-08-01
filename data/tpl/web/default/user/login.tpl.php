<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-cn" class="body-full-height">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="./resource/wdlcms/favicon.ico">
	<title><?php  if(!empty($_W['page']['title'])) { ?><?php  echo $_W['page']['title'];?> - <?php  } ?><?php  if(empty($_W['page']['copyright']['sitename'])) { ?>微动力 - 公众平台自助引擎<?php  } else { ?><?php  echo $_W['page']['copyright']['sitename'];?><?php  } ?></title>
	<script src="./resource/wdlcms/jsold/require.js"></script>
	<script src="./resource/wdlcms/jsold/app/config.js"></script>
	<link rel="stylesheet" type="text/css" id="theme" href="./resource/wdlcms/css/theme-default.css"/>

</head>
<body>

<div class="login-container">

	<div class="login-box animated fadeInDown">
		<div class="login-logo"></div>
		<div class="login-body">
			<div class="login-title"></div>

				<form action="" method="post" role="form" class="form-horizontal" onsubmit="return formcheck();">
				<div class="form-group">
					<div class="col-md-12">
						<input name="username" type="text" class="form-control" placeholder="请输入用户名登录"/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<input name="password" type="password" class="form-control" placeholder="请输入您的密码"/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
						<label class="checkbox-inline" >
							<input type="checkbox" value="true" name="rememberme"> <span style="color:#fff;">记住用户名 </span>
						</label>

					</div>
					<div class="col-md-6">
						<input type="submit" name="submit" value="登录" class="btn btn-info btn-block" />
						<input name="token" value="<?php  echo $_W['token'];?>" type="hidden" />

					</div>
				</div>

				<div class="login-subtitle">
					还没有WDLCMS营销帐号?立刻 <a href="<?php  echo url('user/register');?>">创建一个帐号</a>
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

</div>
<script>
function formcheck() {
	if($('#remember:checked').length == 1) {
		cookie.set('remember-username', $(':text[name="username"]').val());
	} else {
		cookie.del('remember-username');
	}
	return true;
}

</script>
</body>
</html>
