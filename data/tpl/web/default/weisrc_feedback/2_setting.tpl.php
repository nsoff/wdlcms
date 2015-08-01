<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading">
                基本设置
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">顶部背景图</label>
                    <div class="col-sm-9">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <?php  if(empty($item['topimgurl'])) { ?>
                            <?php  echo tpl_form_field_image('topimgurl', '../addons/weisrc_feedback/template/images/logo.png')?>
                            <?php  } else { ?>
                            <?php  echo tpl_form_field_image('topimgurl', $item['topimgurl'])?>
                            <?php  } ?>
                            <span style="color:red;">*建议尺寸：宽640像素，高109像素</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">留言每页显示数量</label>
                    <div class="col-sm-9">
                        <input type="text" name="pagesize" value="<?php  echo $item['pagesize'];?>" id="pagesize" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否需要审核</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="ischeck" value="1" <?php  if($item['ischeck']==1 || empty($item)) { ?>checked<?php  } ?>>是
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="ischeck" value="0" <?php  if(isset($item['ischeck']) && empty($item['ischeck'])) { ?>checked<?php  } ?>>否
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9">
                        <input name="submit" type="submit" value="提交" class="btn btn-primary span3">
                        <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                    </div>
                </div>
            </div>
        </div>
	</form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>