<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <form action="" class="form-horizontal form" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php  echo $item['id'];?>">
        <div class="panel panel-default">
            <div class="panel-heading">
                商户管理
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">LBS查询范围</label>
                    <div class="col-sm-2 col-xs-12">
                        <div class="input-group">
                       <input type="text" name="range" class="form-control" value="<?php  echo $settings['range'];?>" /> 
                       <span class="input-group-addon">千米（KM）</span>
                       </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12 help-block">设置用户在发送位置信息时，回复此设置项方圆范围内的商家。默认为<span style="color:red">&nbsp;5&nbsp;</span>公里以内的商家。</div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12 help-block"><input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" /></div>
                    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                </div>
            </div>
        </div>
	</form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
