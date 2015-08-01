<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<div class="main">
	<ul class="nav nav-tabs">
		<li<?php  if($_GPC['do'] == 'manage') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('manage');?>">活动管理</a></li>
		<li<?php  if($_GPC['do'] == 'post') { ?> class="active"<?php  } ?>><a href="<?php  echo create_url('rule/post',array('module'=>'ewei_couplet'));?>">添加活动规则</a></li>
		<li<?php  if($_GPC['do'] == 'fanslist') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('fanslist',array('rid' => $rid));?>">参与用户</a></li>
	</ul>
	
	   <div class="panel panel-info">
	<div class="panel-heading">筛选</div>
	<div class="panel-body">
		<form action="./index.php" method="get" class="form-horizontal" role="form">
			<input type="hidden" name="c" value="site" />
			<input type="hidden" name="a" value="entry" />
        	<input type="hidden" name="m" value="ewei_couplet" />
        	<input type="hidden" name="do" value="fanslist" />
        	<input type="hidden" name="rid" value="<?php  echo $_GPC['rid'];?>" />
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">关键字</label>
				<div class="col-sm-8 col-lg-9">
					<input class="form-control" name="keywords" id="" type="text" value="<?php  echo $_GPC['keywords'];?>" placeholder="可查询手机号"> 
				</div>
                          
			</div>
				<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">状态</label>
				<div class="col-sm-8 col-lg-9">
					<select name="status" class="form-control" style="float:left">
                                        <option value="" <?php  if($_GPC['status']=='') { ?>selected<?php  } ?>>全部</option>
                                        <option value="0" <?php  if($_GPC['status']=='0') { ?>selected<?php  } ?>>未中奖</option>
                                        <option value="1" <?php  if($_GPC['status']=='1') { ?>selected<?php  } ?>>已中奖</option>
                                        <option value="1" <?php  if($_GPC['status']=='2') { ?>selected<?php  } ?>>已兑奖</option>
                                    </select>
				</div>
                                <div class=" col-xs-12 col-sm-2 col-lg-2">
					<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
				</div>
			</div>
			
 			<div class="form-group">
			</div>
		</form>
	</div>
	
	 
		<div style="padding: 0 15px 0  15px;">
		  <div class="row-fluid">
                                <div class="span8 control-group">
                                    <a class="btn btn-default" href="<?php  echo $this->createWebUrl('download',array('rid'=>$rid))?>"><i class="icon-download-alt"></i>导出中奖用户</a>
                                    <a class="btn btn-default" href="<?php  echo $this->createWebUrl('fanslist',array('rid'=>$rid))?>">全部</a>
                                    <a class="btn btn-default" href="<?php  echo $this->createWebUrl('fanslist',array('rid'=>$rid,'status'=>0))?>">未中奖</a>
                                    <a class="btn btn-default" href="<?php  echo $this->createWebUrl('fanslist',array('rid'=>$rid,'status'=>1))?>">已中奖</a>
                                    <a class="btn btn-default" href="<?php  echo $this->createWebUrl('fanslist',array('rid'=>$rid,'status'=>2))?>">已兑奖</a>
                                </div>
                            </div>

		</div>
	<div style="padding: 0 15px 0  15px;" style="position:relative">
		<table class="table table-hover" style="position:relative">
			<thead class="navbar-inner">
			 <tr>
                                                <th style='width:80px;'>序号</th>
			<th style='width:80px;'>头像</th>
                                                <th>用户</th>
                                                <th style='width:80px;'>地区</th>
                                                <th>登记信息</th>
                                                <th>对联</th>
                                                <th>参与时间</th>
                                                <th>状态</th>
                                                <th>操作</th>
		</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $row) { ?>
				<tr>
				<td><?php  echo $row['id'];?></td>
				 <td><img width="25px" class="img-rounded" alt="" src="<?php  echo $row['headurl'];?>"></td>
                                 <td><?php  echo $row['nickname'];?></td>
                                 <td><?php  echo $row['area'];?></td>
                                 <td><?php  if(empty($row['realname'])) { ?>
                                    -----
                                    <?php  } else { ?>
                                    <?php  echo $row['realname'];?> / <?php  echo $row['mobile'];?>
                                    <?php  } ?>
                                 </td>
                                                               <td>
                                                                   <?php  $uptext = unserialize($row['uptext'])?>
                                                                   <?php  if(is_array($uptext)) { foreach($uptext as $ut) { ?>
                                                                      <?php  echo $ut['char'];?>
                                                                   <?php  } } ?>
                                                              <br/>
                                                                 <?php  $downtext = unserialize($row['downtext'])?>
                                                                   <?php  if(is_array($downtext)) { foreach($downtext as $dt) { ?>
                                                                      <?php  if(!empty($dt['bingo'])) { ?>
                                                                      <span class="label label-success"><?php  echo $dt['char'];?></span>
                                                                      <?php  } else { ?>
                                                                      <span class="label label-default"><?php  echo $dt['char'];?></span>
                                                                      <?php  } ?>
                                                                   <?php  } } ?>
                                                               
                                                               </td>
                                                  <td><?php  echo date('Y/m/d H:i',$row['createtime']);?></td>
                                                     <td><?php  if($row['status']==2) { ?>
                                                    <span class="label label-success">已兑奖</span>
                                                    <?php  } else if($row['status']==1) { ?>
                                                    <span class="label label-warning">已中奖</span>
                                                    <?php  } else { ?>
                                                    <span class="label label-default">未中奖</span>
                                                    <?php  } ?>
                                                </td>
                                                <td>
                                                 <?php  if($row['status']=='1') { ?>
                                                  <a class="btn btn-default" href="#" onclick="drop_confirm('确认已经领奖？','<?php  echo $this->createWebUrl('getaward',array('id'=>$row['id'],'rid'=>$row['rid']))?>');">确认兑奖</a>
                                                  <?php  } else if($row['status']=='2') { ?>
                                                  已兑奖
                                                  <?php  } ?>
                                                </td>
				</tr>
				<?php  } } ?>
				  <tr>
                    <td colspan="9">
                        <form action="./index.php" method="post" class="form-horizontal" role="form">
			<input type="hidden" name="c" value="site" />
			<input type="hidden" name="a" value="entry" />
        	<input type="hidden" name="m" value="ewei_couplet" />
        	<input type="hidden" name="do" value="fanslist" />
                <input type="hidden" name="rid" value="<?php  echo $_GPC['rid'];?>" />
                <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                <div class='col-sm-3'>
                        <div class='input-group'>
                            <span class='input-group-addon'>模拟</span>
                            
                            <input type="text" name="simulatenum" class='form-control' />
                             <span class='input-group-addon'>条领奖记录</span>
                            <div class='input-group-btn'>
                                  <input type="submit" class="btn btn-primary" name="simulate" value="模拟领奖记录" />
                            </div>
                        </div></div>
                        </form>
                        
                    </td>
                </tr>
			</tbody>
		</table>
		<?php  echo $pager;?>
	</div>
	
</div>
<script>

function drop_confirm(msg, url){
    if(confirm(msg)){
        window.location = url;
    }
}
 
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>