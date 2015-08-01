<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <ul class="nav nav-tabs">
        <li><a href="<?php  echo $this->createWebUrl('manage');?>">活动管理</a></li>
        <li><a href="<?php  echo url('platform/reply/post',array('m'=>'ewei_money','id'=>$_GPC['rid']));?>">编辑活动</a></li>
        
        <li><a href="<?php  echo $this->createWebUrl('awardlist',array('rid' => $_GPC['rid']));?>">中奖名单</a></li>
		<li class="active"><a href="<?php  echo $this->createWebUrl('rank',array('rid' => $_GPC['rid']));?>">排行榜</a></li>

    </ul>

 
        <div style="padding: 0 15px 0  15px;">
          <div class="row-fluid">
                                <div class="span8 control-group">
                                    <a class="btn btn-default" href="<?php  echo $this->createWebUrl('dd', array('rid'=>$_GPC['rid']))?>"><i class="icon-download-alt"></i>导出排行榜信息</a>
                                </div>
                            </div>
        </div>
	<div style="padding: 0 15px 0  15px;" style="position:relative">
		<table class="table table-hover" style="position:relative">
			<thead class="navbar-inner">
                                                <th>排名</th>
                                                <th>姓名</th>
                                                <th>手机</th>
                                                <th>游戏总分</th>
                                                <th>领取者微信码</th>
                                                <th>最高分</th>
                                                <th>最后游戏时间</th>
				</tr>
			</thead>
			<tbody>
            <?php   $conut = ($pindex-1)*$psize?>
				<?php  if(is_array($list)) { foreach($list as $row) { ?>
                <?php   $conut += 1?>
				<tr>
                                                <td><?php  echo $conut;?></td>
                                                <td><?php  echo $row['nickname'];?></td>
                                                <td><?php  echo $row['mobile'];?></td>
                                                <td><?php  echo $row['sum'];?></td>
                                                <td><?php  echo $row['from_user'];?></td>
                                                <td><?php  echo $row['max_score'];?></td>
                                                <td><?php  echo date('Y/m/d H:i',$row['lasttime']);?></td>
				</tr>
				<?php  } } ?>

			</tbody>
		</table>
		<?php  echo $pager;?>
	</div>

</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>