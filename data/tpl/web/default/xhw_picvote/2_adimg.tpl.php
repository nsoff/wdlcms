<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <ul class="nav nav-tabs">
        <li><a href="<?php  echo $this->createWebUrl('project');?>">项目管理</a></li>
        <li class="active"><a href="<?php  echo $this->createWebUrl('adimg', array('id' =>$_GPC['id']))?>">幻灯片管理</a></li>
        <li><a href="<?php  echo $this->createWebUrl('ad', array('id' =>$_GPC['id']))?>">广告管理</a></li>
    </ul>
<div class="clearfix">
<form class="form-horizontal form" action="" method="post" enctype="multipart/form-data">
<div class="panel panel-default"> <input type="hidden" name="id" value="<?php  echo $_GPC['id'];?>">
<div class="panel-heading">幻灯片设置（显示在首页顶部，支持1-5任意个图片展示，可留空）</div>
 <div class="panel-body">
               <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">幻灯片图片1</label>
                    <div class="col-sm-8 col-xs-12">
                     <?php  echo tpl_form_field_image('adimg1',$adimg['0']);?>
                    </div>
              </div>
              <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                        <div class="help-block">建议图片压缩后上传，以免影响打开速度</div>
                    </div>
                </div>  
            <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">幻灯片链接1</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" id="adimglink1" class="form-control" placeholder="" name="adimglink1" value="<?php  echo $adimglink['0'];?>">
                         <div class="help-block">点击图片后进入的链接，可以是对活动、商家、奖品的介绍</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">幻灯片图片2</label>
                    <div class="col-sm-8 col-xs-12">
                     <?php  echo tpl_form_field_image('adimg2',$adimg['1']);?>
                    </div>
              </div>
              <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                        <div class="help-block">建议图片压缩后上传，以免影响打开速度</div>
                    </div>
                </div>  
            <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">幻灯片链接2</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" id="adimglink2" class="form-control" placeholder="" name="adimglink2" value="<?php  echo $adimglink['1'];?>">
                         <div class="help-block">点击图片后进入的链接，可以是对活动、商家、奖品的介绍</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">幻灯片图片3</label>
                    <div class="col-sm-8 col-xs-12">
                     <?php  echo tpl_form_field_image('adimg3',$adimg['2']);?>
                    </div>
              </div>
              <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                        <div class="help-block">建议图片压缩后上传，以免影响打开速度</div>
                    </div>
                </div>  
            <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">幻灯片链接3</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" id="adimglink3" class="form-control" placeholder="" name="adimglink3" value="<?php  echo $adimglink['2'];?>">
                         <div class="help-block">点击图片后进入的链接，可以是对活动、商家、奖品的介绍</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">幻灯片图片4</label>
                    <div class="col-sm-8 col-xs-12">
                     <?php  echo tpl_form_field_image('adimg4',$adimg['3']);?>
                    </div>
              </div>
              <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                        <div class="help-block">建议图片压缩后上传，以免影响打开速度</div>
                    </div>
                </div>  
            <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">幻灯片链接4</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" id="adimglink4" class="form-control" placeholder="" name="adimglink4" value="<?php  echo $adimglink['3'];?>">
                         <div class="help-block">点击图片后进入的链接，可以是对活动、商家、奖品的介绍</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">幻灯片图片5</label>
                    <div class="col-sm-8 col-xs-12">
                     <?php  echo tpl_form_field_image('adimg5',$adimg['4']);?>
                    </div>
              </div>
              <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                        <div class="help-block">建议图片压缩后上传，以免影响打开速度</div>
                    </div>
                </div>  
            <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">幻灯片链接5</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" id="adimglink5" class="form-control" placeholder="" name="adimglink5" value="<?php  echo $adimglink['4'];?>">
                         <div class="help-block">点击图片后进入的链接，可以是对活动、商家、奖品的介绍</div>
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