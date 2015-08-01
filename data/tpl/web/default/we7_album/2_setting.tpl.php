<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" onsubmit='return formcheck()'>
        <div class="panel panel-default">
            <div class="panel-heading">
                相册展现方式
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">相册展现方式</label>
                    <div class="col-sm-9 col-xs-12">
                    <label class="radio-inline"><input type="radio" value="1" name="album[listtype]" <?php  if(empty($settings['album']['listtype']) || $settings['album']['listtype'] == '1') { ?> checked<?php  } ?>> 单行</label>
                    <label class="radio-inline"><input type="radio" value="2" name="album[listtype]" <?php  if($settings['album']['listtype'] == '2') { ?> checked<?php  } ?>> 双行</label>
                    <label class="radio-inline"><input type="radio" value="3" name="album[listtype]" <?php  if($settings['album']['listtype'] == '3') { ?> checked<?php  } ?>> 瀑布流</label> </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">顶部图片</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php  echo tpl_form_field_image('toppic', $settings['album']['toppic'])?>
                    </div>
                </div>
            </div>
        </div>
      	<div class="form-group col-sm-12">
			<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" onclick='return formcheck()' />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
  	</form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>