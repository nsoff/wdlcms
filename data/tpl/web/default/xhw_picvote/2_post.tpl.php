<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <ul class="nav nav-tabs">
        <li><a href="<?php  echo $this->createWebUrl('vote', array('id' => $_GET['rid']));?>">管理投票</a></li>
        <li><a href="<?php  echo $this->createWebUrl('voice', array('id' => $_GET['rid']));?>">管理投稿</a></li>
        <li class="active"><a href="<?php  echo $this->createWebUrl('post', array('rid' => $_GET['rid']));?>">添加投票</a></li>
    </ul>
<form action="" class="form-horizontal form" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php  echo $_GPC['id'];?>">
<input type="hidden" name="rid" value="<?php  echo $_GPC['rid'];?>">
<input type="hidden" name="c" value="site" />
<input type="hidden" name="a" value="entry" />
<input type="hidden" name="m" value="xhw_picvote" />
<input type="hidden" name="do" value="post" />
<div class="clearfix">
    <div class="panel panel-default">
        <div class="panel-heading">基本信息</div>
        <div class="panel-body">
      <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">简介</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" placeholder="" name="title" value="<?php  echo $subject['title'];?>">
                         <div class="help-block">参赛照片简介</div>
                    </div>
                </div>
      <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">名字</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" placeholder="" name="nickname" value="<?php  echo $subject['nickname'];?>">
                         <div class="help-block">参赛照片名字</div>
                    </div>
                </div>
       <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">照片</label>
                    <div class="col-sm-8 col-xs-12">
                       <?php  echo tpl_form_field_multi_image('photo',$img);?>
                    </div>
                </div> 
        <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">票数</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" placeholder="" name="num" value="<?php  echo $subject['num'];?>">
                         <div class="help-block">自定义票数</div>
                    </div>
                </div>
        <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">人气</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" placeholder="" name="sharenum" value="<?php  echo $subject['sharenum'];?>">
                         <div class="help-block">自定义人气</div>
                    </div>
                </div>
        <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">手机号</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" placeholder="" name="phone" value="<?php  echo $subject['phone'];?>">
                         <div class="help-block">手机号备用，可留空</div>
                    </div>
                </div>                              
           
            <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">审核状态</label>
            <div class="col-sm-9 col-xs-12">
              <label class="radio-inline">
           <input type="radio" name="pass" value="1" <?php  if($subject['pass'] == 1) { ?> checked="checked"<?php  } ?>/>通过</label>
         <label class="radio-inline">
             <input type="radio" name="pass" value="0" <?php  if($subject['pass'] == 0) { ?> checked="checked"<?php  } ?>/>未通过</label>
               <div class="help-block">通过审核后将显示在活动页面，如需重新上传照片，请先设置成未通过。</div>
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