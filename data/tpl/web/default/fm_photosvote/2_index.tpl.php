<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
.table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
  white-space: inherit;
  overflow: hidden;
  text-overflow: clip;
}
</style>
    <div class="main">
		<div class="panel panel-default">
		<div class="panel-heading">	
			<div class="row-fluid">
				<div class="span8 control-group">
					<a class="btn btn-primary" href="<?php  echo url('platform/reply/post',array('m'=>'fm_photosvote'));?>"><i class="fa fa-edit"></i> 添加活动</a>
				</div>
			</div>
		</div>
		
		
		<div class="panel-body table-responsive">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th class='with-checkbox' style="width:30px;">
						<input type="checkbox" class="check_all" />
					</th>
					<th style="width:50px;" class="row-first">ID</th>					
					<th style="width:150px;" class="row-first">活动名称</th>					
					<th style="width:150px;" class="row-first">活动链接</th>					
					<th style="width:60px;" class="row-first row-hover">已审核</th>
					<th style="width:60px;" class="row-first row-hover">未审核</th>
					<th style="width:50px;" class="row-first row-hover">投票</th>
					<th style="width:50px;" class="row-first row-hover">参与</th>
					<th style="width:50px;" class="row-first row-hover">分享</th>
					<th style="width:50px;" class="row-first row-hover">点击</th>
					<th style="width:60px;" class="row-first">状态</th>
					<th style="width:150px;">活动时间<i></i></th>
					<th class="row-first" style="width:80px;">管理</th>
					<th class="row-first"  style="width:160px;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list_praise)) { foreach($list_praise as $row) { ?>
				<tr >
					<td class="with-checkbox">
						<input type="checkbox" name="check" value="<?php  echo $row['id'];?>">
					</td>
					<td class="row-first"><?php  echo $row['rid'];?></td>
					<td class="row-first" style="  word-wrap: break-word;"><a class="btn btn-default" href="<?php  echo $this->createWebUrl('members', array('rid' => $row['rid']))?>"  data-toggle="tooltip" data-placement="top" title="<?php  echo $row['title'];?>"><?php  echo cutstr($row['title'],'8')?></a></td>
					<td class="row-first row-hover" style="  word-wrap: break-word;"><?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $_W['uniacid'];?>&j=<?php  echo $_W['uniacid'];?>&c=entry&rid=<?php  echo $row['rid'];?>&do=photosvoteview&m=fm_photosvote</td>
					<td class="row-first row-hover" style="  word-wrap: break-word;"><?php  echo $row['user_ysh'];?></td>
					<td class="row-first row-hover" style="  word-wrap: break-word;"><?php  echo $row['user_wsh'];?></td>
					<td class="row-first row-hover" style="  word-wrap: break-word;"><?php  echo $row['user_tprc'];?></td>
					<td class="row-first row-hover" style="  word-wrap: break-word;"><?php  echo $row['user_cyrs'];?></td>
					<td class="row-first row-hover" style="  word-wrap: break-word;"><?php  echo $row['user_share'];?></td>
					<td class="row-first row-hover" style="  word-wrap: break-word;"><?php  echo $row['user_hits'];?></td>
					<td class="row-first"><?php  if($row['status'] == 1) { ?><span class="label label-info">开启</span><?php  } else { ?><span class="label label-danger">暂停</span><?php  } ?></td>
					<td><?php  echo date('Y-m-d H:i', $row['start_time']);?></br><?php  echo date('Y-m-d H:i', $row['end_time']);?></td>
					<td class="row-first">
						<a href="<?php  echo $this->createWebUrl('members', array('rid' => $row['rid']))?>" class="btn  btn-default"><i class="fa fa-users"></i>管理</a>
					</td>
					<td> 
						<a class="btn btn-default" data-toggle="tooltip" data-placement="top" href="<?php  echo url('platform/reply/post',array('m'=>'fm_photosvote','rid'=>$row['rid']));?>" title="编辑"><i class="fa fa-edit"></i></a>
						
						
						<?php  if($row['status']==0) { ?>
							<a class="btn btn-default" data-toggle="tooltip" data-placement="top" href="#" onclick="drop_confirm('您确定要开始吗，设置中途可以随时修改', '<?php  echo $this->createWebUrl('status', array('status' => '1', 'rid' => $row['rid']))?>');" title="开始活动" ><i class="fa fa-play"></i></a>
						<?php  } else if($row['status']==1) { ?>
							<a class="btn btn-default" data-toggle="tooltip" data-placement="top" href="#" onclick="drop_confirm('您确定要暂停吗，设置中途可以随时修改', '<?php  echo $this->createWebUrl('status', array('status' => '0', 'rid' => $row['rid']))?>');" title="暂停活动" ><i class="fa fa-stop"></i></a>                                       														
						<?php  } ?>
							<?php  if($_W['role']=='founder') { ?><a class="btn btn-default" data-toggle="tooltip" data-placement="top" href="#" onclick="drop_confirm('您确定要删除吗?', '<?php  echo $this->createWebUrl('delete',array('rid'=>$row['rid'], 'id'=>$row['id']))?>');" title="删除"><i class="fa fa-times"></i></a><?php  } ?>
						
                  	</td>
				</tr>
				<?php  } } ?>
				<?php  if($_W['role']=='founder') { ?>
				<tr>
					<td colspan="13">
						<input type="button" class="btn btn-primary" name="deleteall" value="删除选择的" />
					</td>
				</tr>
				<?php  } ?>
			</tbody>
		</table>
	</div>
	</div>
	<?php  echo $pager;?>

    </div>
 
	
<script>
require(['bootstrap'],function($){
		$('.btn').hover(function(){
			$(this).tooltip('show');
		},function(){
			$(this).tooltip('hide');
		});
	});
$(function(){   
    $(".check_all").click(function(){
       var checked = $(this).get(0).checked;
       $("input[type=checkbox]").attr("checked",checked);
    });
	$("input[name=deleteall]").click(function(){
		var check = $("input:checked");
		if(check.length<1){
			alert('请选择要删除的记录!');
			return false;
		}
        if( confirm("确认要删除选择的记录?")){
		var id = new Array();
		check.each(function(i){
			id[i] = $(this).val();
		});
		$.post('<?php  echo $this->createWebUrl('deleteAll')?>', {idArr:id},function(data){
			if (data.errno ==0)
			{
				location.reload();
			} else {
				alert(data.error);
			}


		},'json');
		}

	});
});
</script>
<script type="text/javascript">
	
		function drop_confirm(msg, url){
			if(confirm(msg)){
				window.location = url;
			}
		}
	</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
