<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
<ul class="nav nav-tabs">
  <li<?php  if($_GPC['do'] == 'routerlist') { ?> class="active"<?php  } ?>><a href="<?php  echo  $this->createWebUrl('routerlist');?>">路由器管理</a>
  </li>
  <li<?php  if($_GPC['do'] == 'routeradd') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('routeradd');?>">添加路由器</a>
  </li>
</ul>


<div class="panel panel-info">
	<div class="panel-heading">筛选</div>
	<div class="panel-body">
		<form action="" method="get" class="form-horizontal" role="form">
        	<input type="hidden" name="c" value="site">
			<input type="hidden" name="a" value="entry">
			<input type="hidden" name="do" value="routerlist">
		<input type="hidden" name="m" value="lxy_rtrouter" />
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">路由器名称</label>
				<div class="col-sm-8 col-lg-4">
					<input class="form-control" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>">
				</div>
               <div class=" col-xs-12 col-sm-2 col-lg-2">
				  <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
			  </div>
			</div>

		</form>
	</div>
</div>

	
	<div style="padding:15px;">
        <a href="<?php  echo $this->createWeburl('routeradd', array())?>"  class="btn"><i class="icon-plus-sign-alt" ></i>新增路由器</a>
        <div class="panel panel-default">
	<div class="panel-body table-responsive">

		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th style="width:20%;"  >路由器名称</th>
					<th style="width:20%;" >nodeId </th>
					<th style="width:20%;" >状态</th>
					<th style="width:40%;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
					<td><?php  echo $item['rname'];?></td>
					<td><?php  echo $item['nodeid'];?></td>
					<td><span class='label label-default label-info'><?php  if($item['status']) { ?>运行<?php  } else { ?>停止<?php  } ?></span></td>
					<td>
                    <a href="<?php  echo $this->createWebUrl('routeradd', array('id' => $item['id']))?>" class="btn btn-small" title="编辑"><i class="fa fa-pencil"></i></a>
						<a onclick="return confirm('确认删除该路由器？');return false;" href="<?php  echo $this->createWebUrl('delrouter', array('id' => $item['id']))?>" class="btn btn-small" title="删除"><i class="fa fa-times"></i></a>
                        
                     </td>
				</tr>
				<?php  } } ?>

				<td colspan="9">
					<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" /></td>
			</tr>
		</table>
		<?php  echo $pager;?>
        	</div>
	</div>
	</div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>