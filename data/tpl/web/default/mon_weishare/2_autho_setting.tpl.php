<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
	<form action="" method="post" class="form-horizontal form">
		<h4>分享有礼借用高级认证设置<small>如果你的公众号没有oauth2接口权限，可以借用别人的接口权限使用。</small></h4>


		<div class="panel panel-default">
			<div class="panel-heading">
				活动设置
			</div>
			<div class="panel-body">

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>AppId：</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="appid" class="form-control" value="<?php  echo $setting['appid'];?>" />
					</div>
				</div>


				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>AppSecret：</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="secret" class="form-control" value="<?php  echo $setting['secret'];?>" />
					</div>

				</div>


				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						借用说明：必需设置借用高级认证号的OAuth2.0网页授权的回调域名为你公众号第三方平台的全域名。如：你的微赞域名为：www.weixin.com ，你必需让借用高级认证号设置OAuth2.0网页授权的回调域名为:www.weixin.com
					</div>

				</div>




				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<input name="submit" type="submit" value="提交" class="btn btn-primary span3" />
						<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
					</div>

				</div>


		</div>
		</div>




		<table class="tb">

			<tr>
				<th colspan="2"><img src="../addons/mon_weishare/images/appidappsecret.jpg"></th>
			</tr>			
		</table>
	</form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>