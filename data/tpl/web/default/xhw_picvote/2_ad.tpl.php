<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <ul class="nav nav-tabs">
        <li><a href="<?php  echo $this->createWebUrl('project');?>">项目管理</a></li>
        <li class="active"><a href="<?php  echo $this->createWebUrl('ad', array('id' =>$_GPC['id']))?>">广告管理</a></li>
        <li><a href="<?php  echo $this->createWebUrl('adimg', array('id' =>$_GPC['id']))?>">幻灯片管理</a></li>
    </ul>
<div class="clearfix">
<form class="form-horizontal form" action="" method="post" enctype="multipart/form-data">
<div class="panel panel-default"> <input type="hidden" name="id" value="<?php  echo $_GPC['id'];?>">
<div class="panel-heading">广告设置（显示在内页和排行榜页面）</div>
 <div class="panel-body">
              <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">图片广告设置</label>
                    <div class="col-sm-8 col-xs-12">
                     <?php  echo tpl_form_field_image('adpic',$subject['adpic']);?>
                    </div>
              </div>
              <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                        <div class="help-block">图片广告横幅，建议图片压缩后上传，以免影响打开速度</div>
                    </div>
                </div>  
            <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">图片广告链接</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" placeholder="" name="adlink" value="<?php  echo $subject['adlink'];?>">
                         <div class="help-block">点击广告后进入的链接，可以是对活动、商家、奖品的介绍</div>
                    </div>
                </div>

				
            <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">广告代码设置</label>
                    <div class="col-sm-8 col-xs-12">
                        <textarea id="ad" name="ad" class="form-control" rows="5" cols="60"><?php  echo $subject['ad'];?></textarea>
                         <div class="help-block">如果你想投放联盟广告，或者想使用广告特效代码，请将代码填写此处，图片广告和代码广告二选一。</div>
                    </div>
                </div>   

  <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">使用哪种广告</label>
            <div class="col-sm-9 col-xs-12">
              <label class="radio-inline">
                  <input type="radio" name="adpass" value="1" <?php  if($subject['adpass'] == 1) { ?> checked="checked"<?php  } ?>/>代码广告</label>
        <label class="radio-inline">
         <input type="radio" name="adpass" value="0" <?php  if($subject['adpass'] == 0) { ?> checked="checked"<?php  } ?>/>图片广告</label>
              <span class="help-block">以上两种广告形式选择其一显示在手机端</span>
            </div>
        </div>

	
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <input name="submit" type="submit" value="提交" class="btn btn-primary col-lg-1">
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
    </div>
</form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>