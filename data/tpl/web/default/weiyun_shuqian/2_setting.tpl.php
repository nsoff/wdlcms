<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading">
                分享设置
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享时的标题</label>
                    <div class="col-sm-9">
                        <input type="text" id="share_title" name="share_title" value="<?php  if(empty($item['share_title'])) { ?>数钱数到手抽筋<?php  } else { ?><?php  echo $item['share_title'];?><?php  } ?>" class="form-control" /><div class="help-block"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享图片</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('share_image', $share_image, '../addons/weiyun_shuqian/icon.jpg', array('width' => 640, 'height' => 640))?>
                        <span class="help-block" style="color:#f00">建议尺寸640*640</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享时的摘要</label>
                    <div class="col-sm-9">
                        <input type="text" id="share_desc" name="share_desc" value="<?php  echo $item['share_desc'];?>" class="form-control" />
                        <div class="help-block"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">用户分享的链接</label>
                    <div class="col-sm-9">
                        <input type="text" id="share_url" name="share_url" value="<?php  echo $item['share_url'];?>" class="form-control" />
                        <div class="help-block">建议留空，让用户把测试链接分享出去。</div>
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