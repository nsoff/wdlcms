<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
	<form class="form-horizontal form" action="" method="post">
		<div class="panel panel-default">

            <div class="panel-heading">
                大屏幕借用高级认证设置<small>如果你的公众号没有oauth2接口权限，可以借用别人的接口权限使用。</small>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">appid</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" class="form-control" value="<?php  echo $settings['appid'];?>" name="appid" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">appsecret</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" class="form-control" value="<?php  echo $settings['secret'];?>" name="secret" >
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                       <div class="help-block">借用说明：必需设置借用高级认证号的OAuth2.0网页授权的回调域名为你公众号第三方平台的全域名。
					如：你的域名为：wx.weixin.com ，你必需让借用高级认证号设置OAuth2.0网页授权的回调域名为:wx.weixin.com<br>
					只是为了完善一下头像和呢称,性别,要不很多功能没法完成</div>
                        <div class="help-block">使用的AppId和AppSecret在 [开发者中心]，可以找到。</div>
                    </div>
                </div>
                
            </div>
		</div>
		<div class="form-group col-sm-12">
			<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
			<input type="submit" class="btn btn-primary col-lg-1" name="submit" value="提交" />
		</div>
	</form>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>