<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <div class="panel panel-default">
    <div class="panel-heading">
   		投票记录<span class="pull-right" style="color:red; padding:10px 10px 0 0;">总数：<?php  echo count($list);?></span>
    </div>
    <div class="panel-body table-responsive">
    	<form action="" method="post" onsubmit="">
			<table class="table table-hover">
				<thead>
				<tr>
					<th>用户</th>
					<th>投票项</th>
					<th>投票时间</th>
				</tr>
				</thead>
				<tbody>
				<?php  if(is_array($list)) { foreach($list as $v) { ?>
				<tr>
					<td>
						<?php  echo $v['from_user'];?>
					</td>
					<td>
						<?php  echo $v['votes'];?>
					</td>
					<td>
						<?php  echo date('Y-m-d H:i:s',$v['votetime']);?>
					</td>
				</tr>
				<?php  } } ?>
				</tbody>
			</table>
       </form>
		<?php  echo $pager;?>
    </div>
</div>
  <a href="" class="btn btn-default">刷 新</a>
  <a href="javascript:history.back()" class="btn btn-default">返 回</a>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>