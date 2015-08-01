<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class='container'
	style='padding: 0 5px 10px; margin: 0; width: 100%'>
	<ul class="nav nav-tabs">
		<li class="active"><a href="#">参数设置</a></li>
	</ul>
	<div class="panel panel-success">
		<div class="panel-heading">参数设置</div>
		<div class="panel-body">
			<form class="form-horizontal" action="" method="post">
				<div class="form-group" >
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">引导关注</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="guanzhuUrl" class="form-control" value="<?php  echo $set['guanzhuUrl'];?>" />
                        <div class="help-block">未关注的粉丝，关注引导链接,如果出现错误请使用 <a target="_blank" href="http://www.dwz.cn/">短网址转换</a></div>
					</div>
				</div>

                <div class="form-group" >
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">版权信息</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="copyright" class="form-control" value="<?php  echo $set['copyright'];?>" />
                        <span class="help-block">
						如果没空的话，默认是本公众号
					</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">第三方统计代码</label>
                    <div class="col-sm-9 col-xs-12">
                        <textarea  name="cnzz" class="form-control"  value="" ><?php  echo $set['cnzz'];?></textarea>
                        <span class="help-block"> 借助第三方统计代码,如百度,量子,51la,chinaz</span>
                    </div>
                </div>

                <div class="form-group" id="appid_div">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享AppId</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="appid_share" class="form-control"  value="<?php  echo $set['appid_share'];?>" />
                    </div>
                </div>
                <div class="form-group" id="appsecret_div">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享AppSecret</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="appsecret_share" class="form-control" value="<?php  echo $set['appsecret_share'];?>" />
                    </div>
                </div>

                <div class="form-group" id="image_div">>
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                        借用说明：必需设置借用认证号的JS接口安全域名。在公众号设置-功能设置中，可以找到。
                        <img src="../addons/amouse_weicard/ui/images/jssdk.png">
                    </div>
                </div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
						<button type="submit" class="btn btn-success col-sm-2" name="submit" value="提交">
							<i class="fa fa-check-circle"></i> 提交
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('tmpl/footer', TEMPLATE_INCLUDEPATH)) : (include template('tmpl/footer', TEMPLATE_INCLUDEPATH));?>
