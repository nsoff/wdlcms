<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>



<?php  if($operation == 'display') { ?>
<div class="main">



	<div class="span8 control-group">
		<h4>&nbsp;&nbsp;&nbsp;&nbsp;<?php  echo $share['title'];?>统计&nbsp;&nbsp;&nbsp;&nbsp;领卡人数:<?php  echo $total;?>&nbsp;&nbsp;参加助力好友数:<?php  echo $ftotal;?></h4>
		<a class="btn" href="<?php  echo $this->createWebUrl('download', array('sid'=>$share['id']))?>"><i class="glyphicon glyphicon-download"></i>导出用户信息</a>
	</div>
	
	<div class="search">
			
			<form action="<?php  echo $this->createWebUrl('shareuser', array('op'=>'display'));?>" method="post" >
				<input type="hidden" name="sid" value="<?php  echo $share['id'];?>" />
			
				
				 
				 	<table class="table table-bordered tb">
				<tbody>
					<tr>
						<th>手机号</th>
						<td><input type="text" name="tel" value="<?php  echo $tel;?>" class="form-control"/></td>
						
							<td><button type="submit" class="btn btn-primary">查询</button></td>
					</tr>
					

				</tbody>
			</table>
				 
				  
			
			</form>



		</div>

	<div style="padding: 15px;">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th style="min-width: 100px;">用户openId</th>
					<th style="width: 180px;">手机</th>
					<th style="width: 180px;">积分</th>
					<th style="width: 180px;">被助力次数</th>
					<th style="width: 180px;">注册时间</th>
					

					<th style="text-align: right; min-width: 100px;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
					<td>
						<?php  echo $item['from_user'];?>
					</td>
				
				
					<td><?php  echo $item['tel'];?></td>
				
				
					<td><?php  echo $item['income'];?></td>
					
					<td><?php  echo $item['helpcount'];?></td>
					
					<td><?php  echo date('Y-m-d  H:i', $item['createtime'])?></td>
					

					<td style="text-align: right; width: 400px">
					
					<a
						href="<?php  echo $this->createWebUrl('shareuser', array( 'id' => $item['id'], 'op' => 'post'))?>"
						title="编辑" class="btn btn-small">编辑<i class="glyphicon glyphicon-edit"></i></a>
					
					 <a
						href="<?php  echo $this->createWebUrl('shareuser', array( 'id' => $item['id'], 'op' => 'delete'))?>"
						onclick="return confirm('此操作不可恢复，确认删除？');return false;" title="删除"
						class="btn btn-small">删除<i class="glyphicon glyphicon-remove"></i></a></td>
				</tr>
				<?php  } } ?>
			</tbody>

		</table>
		<?php  echo $pager;?>
	</div>
</div>
<?php  } ?>

 <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
