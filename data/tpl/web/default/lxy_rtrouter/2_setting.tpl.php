<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">


<div class="panel panel-info">
		<div class="panel-heading">接口参数设置</div>
		<div class="panel-body">
        
   		  <form action="" method="post" class="form-horizontal" role="form">
<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">节点ID(APP ID)</label>
			<div class="col-sm-4">
<input name="appid" type="text" class="form-control" id="appid"  value="<?php  echo $settings['appid'];?>" />
       	  </div>
		</div>
        
        <div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">节点KEY(APP KEY)</label>
			<div class="col-sm-4">
<input name="appkey" type="text" class="form-control" id="appkey"  value="<?php  echo $settings['appkey'];?>"/>
       	  </div>
		</div>
 
         <div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">认证ID</label>
			<div class="col-sm-4">
<input name="authid" type="text" class="form-control" id="authid"  value="<?php  echo $settings['authid'];?>"  />
       	  </div>
		</div>
                <div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">认证KEY</label>
			<div class="col-sm-4">
<input name="authkey" type="text" class="form-control" id="authkey"  value="<?php  echo $settings['authkey'];?>"  />
       	  </div>
		</div>       
        
        <div class="form-group">
			<div class="col-sm-8">
                    <button type="submit" class="btn btn-primary" name="submit" value="提交">提交</button>
			  <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		  </div>		
			</div>
        
   		  </form>
</div>
</div>


</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>