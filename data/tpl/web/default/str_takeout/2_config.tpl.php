<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style type="text/css">
	.require{color:red;}
	.info{padding:6px;width:400px;margin:-20px auto 3px auto;text-align:center;}
</style>
<ul class="nav nav-tabs">
	<li class="active"><a href="<?php  echo $this->createWebUrl('config');?>"> 参数设置</a></li>
	<li><a href="<?php  echo $this->createWebUrl('store');?>"> 返回门店列表</a></li>
</ul>
<form class="form-horizontal form" id="form1" action="" method="post" enctype="multipart/form-data">
	<div class="main">
		<div class="panel panel-default">
			<div class="panel-heading">参数设置</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="require">* </span>支付时间限制</label>
					<div class="col-sm-9 col-xs-12">
						<div class="input-group">
							<input type="text" class="form-control" name="paytime_limit" value="<?php  echo $item['paytime_limit'];?>">
							<span class="input-group-addon">分钟</span>
						</div>
						<div class="help-block">订单提交后,用户需要在只定时间内完成支付。否则,系统会自动取消该订单。默认时间限制为60分钟。</div>
					</div>
				</div>			
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="require">* </span>邮件服务器设置</label>
					<div class="col-sm-9 col-xs-12">
						<div class="form-control-static">有新订单时,系统会发送邮件给指定的邮箱。<a href="<?php  echo url('profile/notify');?>" target="_blank">现在去设置邮件服务器</a>。</div>
					</div>
				</div>			
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-9 col-xs-9 col-md-9">
				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
				<input name="submit" id="submit" type="submit" value="提交" class="btn btn-primary col-lg-1">
			</div>	
		</div>
	</div>
</form>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>