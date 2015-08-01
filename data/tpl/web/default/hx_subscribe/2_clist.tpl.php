<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('article');?>">文章管理</a></li>
	<li><a href="<?php  echo $this->createWebUrl('list');?>">积分排行</a></li>
	<li class="active"><a href="<?php  echo $this->createWebUrl('credit');?>">红包管理</a></li>
</ul>
<div>
	<a href="<?php  echo $this->createWebUrl('credit',array('s'=>0))?>"><button type="button" class="btn btn-default btn-sm <?php  if($_GPC['s'] == 0) { ?>active<?php  } ?>">所有记录</button></a>
	<a href="<?php  echo $this->createWebUrl('credit',array('s'=>1))?>"><button type="button" class="btn btn-default btn-sm <?php  if($_GPC['s'] == 1) { ?>active<?php  } ?>">提现申请</button></a>
	<a href="<?php  echo $this->createWebUrl('credit',array('s'=>2))?>"><button type="button" class="btn btn-default btn-sm <?php  if($_GPC['s'] == 2) { ?>active<?php  } ?>">已审核</button></a>
	<a href="<?php  echo $this->createWebUrl('credit',array('s'=>-2))?>"><button type="button" class="btn btn-default btn-sm <?php  if($_GPC['s'] == -2) { ?>active<?php  } ?>">审核失败</button></a>
	<a href="<?php  echo $this->createWebUrl('credit',array('s'=>3))?>"><button type="button" class="btn btn-default btn-sm <?php  if($_GPC['s'] == 3) { ?>active<?php  } ?>">审核通过待支付</button></a>
	<a href="<?php  echo $this->createWebUrl('credit',array('s'=>4))?>"><button type="button" class="btn btn-default btn-sm <?php  if($_GPC['s'] == 4) { ?>active<?php  } ?>">已支付</button></a>
</div>
	<div style="padding:15px;">
		<form action="" method="post">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th align="center" style="width:30px;text-align:center;">编号</th>						
                    <th align="center" style="width:30px;text-align:center;">真实姓名</th>
					<th align="center" style="width:40px;text-align:center;">微信号</th>
					<th align="center" style="width:35px;text-align:center;">提现方式</th>
					<th align="center" style="width:70px;text-align:center;">账号</th>
					<th align="center" style="width:50px;text-align:center;">手机号</th>
					<th align="center" style="width:40px;text-align:center;">状态</th>
					<th align="center" style="width:50px;text-align:center;">动态</th>
					<th style="width:40px;text-align:center;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $row) { ?>
				<?php  $result = iunserializer($row['remark']);$r = $result[$row['status']];?>
					<tr>			
						<td align="center" style="text-align:center;"><?php  echo $row['id'];?></td>
						<td align="center" style="text-align:center;"><?php  echo $row['realname'];?></td>
						<td align="center" style="font-size:12px;text-align:center;"><?php  echo $row['qq'];?></td>
						<td align="center" style="font-size:12px;text-align:center;"><?php  if($row['type'] == 1) { ?>支付宝<?php  } else { ?>银行卡<?php  } ?></td>
						<td align="center" style="font-size:12px;text-align:center;"><?php  if($row['type'] == 1) { ?><?php  echo $row['alipay'];?><?php  } else { ?><?php  echo $row['cardid'];?><?php  } ?></td>
						<td align="center" style="font-size:12px;text-align:center;"><?php  echo $row['mobile'];?></td>
						<td align="center" style="font-size:12px;text-align:center;"><?php  if($row['status'] == 1) { ?>申请提现<?php  } else if($row['status'] == 2) { ?>已审核<?php  } else if($row['status'] == 3) { ?>审核通过待支付<?php  } else if($row['status'] == 4) { ?>已支付<?php  } else if($row['status'] == '-2') { ?>审核失败<?php  } else { ?>已关闭<?php  } ?></td>
						<td align="center" style="font-size:12px;text-align:left;">操作人:<?php  echo $r['user'];?><br />时间:<?php  echo date('m-d H:i',$r['time'])?></td>
						<td style="text-align:center;">
                        	<?php  if($row['status'] == 4 || $row['status'] == '-2') { ?><?php  } else { ?><a href="<?php  echo $this->createWebUrl('Manager',array('id'=>$row['id']));?>">处理</a> |<?php  } ?> <a href="<?php  echo $this->createWebUrl('Delete',array('id'=>$row['id']));?>" onclick="return confirm('删除记录后不可恢复,确定要删除吗?')" >删除</a>
                        </td>
					</tr>
				<?php  } } ?>
			</tbody>
		</table>
	</form>
		<?php  echo $pager;?>
	</div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>