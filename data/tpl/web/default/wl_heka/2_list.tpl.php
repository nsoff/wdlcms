<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <div class="panel panel-default">
    	<div class="panel-heading">
        	详细数据
    	</div>
        <div class="panel-body table-responsive">
        	<form action="" method="post" onsubmit="">
				<table class="table table-hover">
					<thead>
					<tr>
						<th style="width:60px;" class="row-first">选择</th>
						<th style="width:80px;">编号</th>
						<th style="width:120px;">标题</th>
						<th style="width:100px;">署名</th>
						<th style="width:100px;">点击数</th>
						<th style="width:120px;">分享数</th>
						<th style="width:200px;">描述</th>
						<th style="width:150px;">创建时间</th>
						<th style="width:100px;">操作</th>
					</tr>
					</thead>
					<tbody>
					<?php  if(is_array($list)) { foreach($list as $row) { ?>
					<tr>
						<td class="row-first"><input type="checkbox" name="select[]" value="<?php  echo $row['id'];?>" /></td>
						<td><?php  echo $row['id'];?></td>
						<td><?php  echo $row['title'];?></td>
						<td><?php  echo $row['author'];?></td>
						<td><?php  echo intval($row['hits'])?></td>
						<td><?php  echo intval($row['share'])?></td>
						<td style='word-break:break-all'><?php  echo substr($row['content'],0,200);?></td>
						<td style="font-size:12px; color:#666;">
							<?php  echo date('Y-m-d', $row['create_time']);?>
						</td>
						<td>
							<a href="<?php  echo $_W['siteroot'];?>app/<?php  echo $this->createMobileUrl('show', array('card' => $row['card'],'id'=>$row['rid'],'cid'=>$row['id']));?>" target="_blank" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="预览"><i class="fa fa-eye"></i></a>
						</td>
					</tr>
					<?php  } } ?>
					<tr>
						<td class="row-first"><input type="checkbox" onclick="var ck = this.checked;$(':checkbox').each(function(){this.checked = ck})"/></td>
						<td colspan="8">
							<input type="submit" name="delete" value="删除" class="btn btn-primary" />
							<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
						</td>
					</tr>
                </tbody>
                </table>
            </form>
        <?php  echo $pager;?>
        </div>
    </div>
  <a href="" class="btn btn-default">刷 新</a>
  <a href="javascript:history.back()" class="btn btn-default">返 回</a>
</div>
<script>
	require(['bootstrap'],function($){
		$('.btn').tooltip();
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
 