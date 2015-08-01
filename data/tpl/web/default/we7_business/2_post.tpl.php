<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php  load()->func('tpl');?>
<div class="main">
    <ul class="nav nav-tabs">
        <li<?php  if($_GPC['do'] == 'display') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('display');?>">商户管理</a></li>
        <li<?php  if($_GPC['do'] == 'post') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('post');?>">添加商户</a></li>
    </ul>
    <form action="" class="form-horizontal form" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php  echo $item['id'];?>">
        <div class="panel panel-default">
            <div class="panel-heading">
                商户基本信息
            </div>
            <div class="panel-body">
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">名称</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="title" class="form-control" value="<?php  echo $item['title'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">宣传图</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php  echo tpl_form_field_image('thumb', $item['thumb'])?>
                    </div>
                </div>
               	<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">行业</label>
                    <div class="">
                        <?php  echo tpl_form_field_industry('industry', $item['industry1'],$item['industry2'])?>
                    </div>
                </div>
          		<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">简介</label>
                    <div class="col-sm-9 col-xs-12">
                          <textarea style="height:100px;" class="span7 richtext-clone" name="content" cols="70"><?php  echo $item['content'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">电话</label>
                    <div class="col-sm-9 col-xs-12">
                         <input type="text"  name="phone" value="<?php  echo $item['phone'];?>"  class="form-control" />
                    </div>
                </div>
                   <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">QQ</label>
                    <div class="col-sm-9 col-xs-12">
                         <input type="text"  name="qq" value="<?php  echo $item['qq'];?>"  class="form-control" />
                    </div>
                </div>
                   <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">地区</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php  echo tpl_form_field_district('district', array('province'=>$item['province'],'city'=>$item['city'],'district'=>$item['dist']))?>
                    </div>
                </div>
                    <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">详细地址</label>
                    <div class="col-sm-9 col-xs-12">
                       <div class="input-append"><input type="text" name="address" value="<?php  echo $item['address'];?>"  class="form-control" /></div>
                    </div>
                </div>
                
                   <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">坐标</label>
                    <div class="col-sm-9 col-xs-12" style="margin-left:-15px;">
                        <?php  echo tpl_form_field_coordinate('baidumap', $item)?>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
                    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                </div>
            </div>
        </div>
</form>
</div>
 <script type="text/javascript">
     require(['util'],function(util){
         util.editor($(".richtext-clone")[0]);
     })
 </script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
