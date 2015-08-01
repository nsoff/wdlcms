<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

 
    <form action="" method="post" class="form-horizontal form">
   <div class="panel panel-default"> 
         <div class="panel-heading">学校设置</div>
        <div class="panel-body">
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">学校名称</label>
                <div class="col-sm-9">
                    <input type="text" name="school_name" class="form-control" value="<?php  echo $settings['name']?>" />
                </div>
            </div>
            
        </div>
</div>
<div class="panel panel-default">        
        <div class="panel-heading">校花校草设置</div>
       <div class="panel-body">
           <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">基本地址</label>
                <div class="col-sm-9">
                    <input type="text" name="school_url" class="form-control" value="http://www.facejoking.com/api/top/" />
                </div>
            </div>


           <div class="form-group">
               <label class="col-xs-12 col-sm-3 col-md-2 control-label">学校编号</label>
               <div class="col-sm-9">
                    <input type="text" name="school_num" class="form-control" value="<?php  echo  $settings['num']?>" />
                </div>
            </div>
			<div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
               <div class="col-sm-9">
                    <input name="submit" type="submit" value="提交" class="btn btn-primary span3" />
                    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                </div>
            </div>			
           
        </div>

    </form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>