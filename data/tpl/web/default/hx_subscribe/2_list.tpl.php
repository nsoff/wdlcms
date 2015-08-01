<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('article');?>">文章管理</a></li>
	<li class="active"><a href="<?php  echo $this->createWebUrl('list');?>">积分排行</a></li>
	<li><a href="<?php  echo $this->createWebUrl('credit');?>">红包管理</a></li>
</ul>	
	<div style="padding:15px;">
		<form action="" method="post">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th align="center" style="width:30px;text-align:center;">排名</th>	
					<th align="center" style="width:40px;text-align:center;">卡号</th>						
                    <th align="center" style="width:100px;text-align:center;">昵称</th>
					<th align="center" style="width:40px;text-align:center;">收益</th>
					<th align="center" style="width:80px;text-align:center;">直接要求</th>
					<th align="center" style="width:60px;text-align:center;">间接邀请</th>
					<th align="center" style="width:60px;text-align:center;">邀请人</th>
				</tr>
			</thead>
			<tbody>
				<?php  $i = ($pindex - 1) * $psize + 1 ;?>
				<?php  if(is_array($list)) { foreach($list as $row) { ?>
				<?php  $info = mc_fetch($row['uid']);?>
					<tr>		
						<td align="center" style="text-align:center;">第<?php  echo $i;?>名</td>
                        <td align="center" style="text-align:center;"><?php  echo $row['sn'];?></td>
                        <td align="center" style="text-align:center;"><?php  echo $info['nickname'];?></td>
						<td align="center" style="font-size:12px; color:#666; text-align:center;"><?php  echo $row['shouyi'];?></td>
						<td align="center" style="font-size:12px; color:#666; text-align:center;"><?php  echo $row['zjrs'];?></td>
						<td align="center" style="font-size:12px; color:#666; text-align:center;"><?php  echo $row['jjrs'];?></td>
						<?php  $from_user_info = mc_fetch($row['from_uid']);?>
						<td align="center" style="font-size:12px; color:#666; text-align:center;"><?php  echo $from_user_info['nickname'];?></td>
					</tr>
				<?php  $i++;unset($from_user_info);unset($info);?>
				<?php  } } ?>
			</tbody>
		</table>
	</form>
		<?php  echo $pager;?>
	</div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>