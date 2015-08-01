<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
<ul class="nav nav-tabs">
  <li<?php  if($_GPC['do'] == 'authlist') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('authlist');?>">认证记录</a>
  </li>
</ul>

<div class="panel panel-info">
	<div class="panel-heading">筛选</div>
	<div class="panel-body">
		<form action="" method="get" class="form-horizontal" role="form">
        	<input type="hidden" name="c" value="site">
			<input type="hidden" name="a" value="entry">
			<input type="hidden" name="do" value="authlist">
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
		<p>
                <div class="panel panel-default">
	<div class="panel-body table-responsive">

        <table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th  style="width:10%;" >路由器名称</th>
					<th  style="width:10%;" >微信OPENID</th>
					<th style="width:5%;" >认证结果</th>
					<th style="width:60%;" >接口信息 </th>
					<th  style="width:15%;" >认证时间</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
					<td><?php  echo $item['rname'];?></td>
					<td><?php  echo $item['fromuser'];?></td>
					<td><span class="label"><?php  if($item['result']==1) { ?>成功<?php  } else { ?>失败<?php  } ?></span></td>
					<td><?php  echo $item['resultmemo'];?></td>
					<td><?php  echo date('Y-m-d H:i:s',$item['createtime'])?></td>

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