<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li class="active"><a href="#">基本设置</a></li>
    <li <?php  if($operation == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('nave', array('op' => 'display'))?>">管理首页导航</a></li>
</ul>
<style>
     .item_box img{
         width: 100%;
         height: 100%;
     }
</style>
<script type="text/html" id="time-form-html">
    <?php  include $this->template('_time_item');?>
</script>
<script>
    $(function(){
        $('#add-time').click(function(){
            $('#time-list').append($('#time-form-html').html());
            $('.clockpicker').clockpicker();
        });
    })
</script>
<script type="text/javascript">
    $(function(){
        $(':radio[name="ismail"]').click(function(){
            if(this.checked) {
                if($(this).val() == '1') {
                    $('.mail').show();
                } else {
                    $('.mail').hide();
                }
            }
        });
        $(':radio[name="sms_enable"]').click(function(){
            if(this.checked) {
                if($(this).val() == '1') {
                    $('.sms').show();
                } else {
                    $('.sms').hide();
                }
            }
        })
        $(':radio[name="isprint"]').click(function(){
            if(this.checked) {
                if($(this).val() == '1') {
                    $('.print').show();
                } else {
                    $('.print').hide();
                }
            }
        });
    });
</script>
<link rel="stylesheet" type="text/css" href="../addons/weisrc_dish/plugin/clockpicker/clockpicker.css" media="all">
<script type="text/javascript" src="../addons/weisrc_dish/plugin/clockpicker/clockpicker.js"></script>
<link rel="stylesheet" type="text/css" href="../addons/weisrc_dish/plugin/clockpicker/standalone.css" media="all">
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading">
                基本设置
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">网站名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" value="<?php  echo $setting['title'];?>" class="form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">默认门店</label>
                    <div class="col-sm-9">
                        <select id="storeid" name="storeid" class="form-control">
                            <?php  if(is_array($stores)) { foreach($stores as $item) { ?>
                            <option value="<?php  echo $item['id'];?>" <?php  if($item['id']==$setting['storeid']) { ?>selected<?php  } ?>><?php  echo $item['title'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">首页背景图</label>
                    <div class="col-sm-9">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <?php  if(empty($setting['thumb'])) { ?>
                            <?php  echo tpl_form_field_image('thumb', '../addons/weisrc_dish/template/images/bg.jpg')?>
                            <?php  } else { ?>
                            <?php  echo tpl_form_field_image('thumb', $setting['thumb'])?>
                            <?php  } ?>
                            <span style="color:red;">*建议尺寸：宽708像素，高1064像素</span>
                        </div>
                    </div>
                </div>
                <div id="time-list">
                <?php  $flag = true;?>
                <?php  if(!empty($timelist)) { ?>
                <?php  if(is_array($timelist)) { foreach($timelist as $row) { ?>
                    <div class="form-group">
                        <label class="col-xs-12 col-sm-3 col-md-2 control-label"><?php  if($flag==true) { ?>送达时间<?php  } ?></label>
                        <div class="col-sm-3">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" value="<?php  echo $row['begintime'];?>" name="begintime[<?php  echo $row['id'];?>]">
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" value="<?php  echo $row['endtime'];?>" name="endtime[<?php  echo $row['id'];?>]">
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <?php  if($flag==true) { ?><a href="javascript:;" id="add-time"><i class="icon-plus-sign-alt"></i> 添加时间</a><?php  } else { ?><a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('Deletemealtime', array('id' => $row['id']))?>" onclick="return confirm('确认删除吗？');return false;"><i class="fa fa-times"></i></a><?php  } ?>
                        </div>
                    </div>
                    <?php  $flag = false;?>
                <?php  } } ?>
                <?php  } else { ?>
                    <div class="form-group">
                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">送达时间</label>
                        <div class="col-sm-3">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" value="09:30" name="newbegintime[]">
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" value="18:30" name="newendtime[]">
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <a href="javascript:;" id="add-time"><i class="icon-plus-sign-alt"></i> 添加时间</a>
                        </div>
                    </div>
                <?php  } ?>
                </div>
                <script type="text/javascript">
                    $('.clockpicker').clockpicker();
                </script>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9">
                        <input name="submit" type="submit" value="提交" class="btn btn-primary span3">
                        <input type="hidden" name="id" value="<?php  echo $setting['id'];?>" />
                        <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                    </div>
                </div>
            </div>
        </div>
	    <input type="hidden" name="id" value="<?php  echo $setting['id'];?>" />
	</form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>