<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<style type="text/css">
    table li{padding:5px 0;}
    small a{color:#999;}
</style>
<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('display')?>">预约活动列表</a></li>
	<li><a href="<?php  echo $this->createWebUrl('post')?>">新建预约活动</a></li>
	<li><a href="<?php  echo $this->createWebUrl('manage', array('id' => $row['reid']))?>">预约活动详情</a></li>
	<li class="active"><a href="<?php  echo $this->createWebUrl('detail', array('id' => $row['reid']))?>">预约记录详情</a></li>
</ul>
<div class="main">
       <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="form1">
        <div class="panel panel-default">
            <div class="panel-heading">
                调研活动信息
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">预约标题</label>
                    <div class="col-xs-12 col-sm-9">
                    	<p class="form-control-static"><?php  echo $activity['title'];?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">预约活动说明</label>
                    <div class="col-xs-12 col-sm-9">
						<p class="form-control-static"><?php  echo $activity['description'];?></p>
                    </div>
                </div>
                     <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">提交提示信息</label>
                    <div class="col-xs-12 col-sm-9">
						<p class="form-control-static"><?php  echo $activity['information'];?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">图片介绍</label>
                    <div class="col-xs-12 col-sm-9">
						<p class="form-control-static"><img src="<?php  echo tomedia($activity['thumb']);?>" style="height:150px;" /></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">创建时间</label>
                    <div class="col-xs-12 col-sm-9">
						<p class="form-control-static"><?php  echo date('Y-m-d H:i:s', $activity['createtime']);?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">开始时间~结束时间</label>
                    <div class="col-xs-12 col-sm-9">
						<p class="form-control-static"><?php  echo date('Y-m-d H:i:s', $activity['starttime']);?> ~ <?php  echo date('Y-m-d H:i:s', $activity['endtime']);?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">状态</label>
                    <div class="col-xs-12 col-sm-9">
                    	<label>
							<p class="form-control-static">
							<?php  if($activity['status'] == '1') { ?>
								<i class="fa fa-check"> &nbsp; 当前预约活动生效中</i>
							<?php  } else { ?>
								<i class="fa fa-check-empty"> &nbsp; 当前预约活动已失效</i>
							<?php  } ?>
							</p>
						</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">微站首页展示</label>
                    <div class="col-xs-12 col-sm-9">
                  		<label>
							<p class="form-control-static">
							<?php  if($activity['inhome'] == '1') { ?>
								<i class="fa fa-check"> &nbsp; 当前调研活动将展示在微站首页上</i>
							<?php  } else { ?>
								<i class="fa fa-check-empty"> &nbsp; 当前调研活动不显示在微站首页</i>
							<?php  } ?>
							</p>
						</label>
                    </div>
                   </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                用户提交的信息
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">用户</label>
                    <div class="col-xs-12 col-sm-9">
						<p class="form-control-static"><?php  echo $row['openid'];?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">用户提交时间</label>
                    <div class="col-xs-12 col-sm-9">
						<p class="form-control-static"><?php  echo date('Y-m-d H:i:s', $row['createtime']);?></p>
                    </div>
                </div>
              	<?php  if(is_array($ds)) { foreach($ds as $fid => $ftitle) { ?>
                   <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><?php  echo $ftitle['fid'];?></label>
                    <div class="col-xs-12 col-sm-9">
						<p class="form-control-static">
                            <?php  if($ftitle['type'] == 'image') { ?>
                            <a target="_blank" href="<?php  echo tomedia($row['fields'][$fid]);?>">点击查看<?php  echo $ftitle['fid'];?></a>
                            <?php  } else { ?>
                            <?php  echo $row['fields'][$fid];?>
                            <?php  } ?>
                        </p>
                    </div>
                </div>
                <?php  } } ?>
            </div>
        </div>
       </form>
</div>
<input type="submit" class="btn btn-primary span3" name="submit" onclick="history.go(-1)" value="返回" />

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>