<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <ul class="nav nav-tabs">
        <li<?php  if($_GPC['do'] == 'manage' || $_GPC['do'] == '' ) { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('manage');?>">活动管理</a></li>
        <li<?php  if($_GPC['do'] == 'post') { ?> class="active"<?php  } ?>><a href="<?php  echo url('platform/reply/post',array('m'=>'ewei_money'));?>">添加活动规则</a></li>

    </ul>
    
 
    <div class="panel panel-info">
	<div class="panel-heading">筛选</div>
	<div class="panel-body">
		<form action="./index.php" method="get" class="form-horizontal" role="form">
			<input type="hidden" name="c" value="site" />
			<input type="hidden" name="a" value="entry" />
        	<input type="hidden" name="m" value="ewei_money" />
        	<input type="hidden" name="do" value="manage" />
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">关键字</label>
				<div class="col-sm-8 col-lg-9">
					<input class="form-control" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>">
				</div>
                                <div class=" col-xs-12 col-sm-2 col-lg-2">
					<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
				</div>
			</div>
 			<div class="form-group">
			</div>
		</form>
	</div>
 
    </div>
 
    <div style="padding:15px;">
        <table class="table table-hover">
            <thead class="navbar-inner">
                <tr><th class='with-checkbox' style="width:30px;">
                        <input type="checkbox" class="check_all" /></th>
                    <th style="width:200px;">活动名称</th>

                    <th style="width:100px;">有效参与人数</th>
                    <th style="">总浏览数</th>
                    <th>开始时间/结束时间</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $row) { ?>
                <tr>

                    <td class="with-checkbox">
                        <input type="checkbox" name="check" value="<?php  echo $row['id'];?>"></td>	 <td><?php  echo $row['name'];?> </td>
                    <td><?php  echo $row['fansnum'];?></td>
                    <td><?php  echo $row['viewnum'];?></td>
                    <td><?php  echo $row['starttime'];?><br>
                        <?php  echo $row['endtime'];?></td>
                    <td><?php  echo $row['status'];?></td>
                    <td >
                   
                    <a href="<?php  echo $this->createWebUrl('awardlist',array('rid'=>$row['id']))?>" class="btn  btn-default" rel="tooltip" title="参与用户"><i class="fa fa-cog"></i>中奖名单</a>
                                        <a href="<?php  echo $this->createWebUrl('rank',array('rid'=>$row['id']))?>" class="btn  btn-default" rel="tooltip" title="排行榜">排行榜</a>
                        <a class="btn btn-default" rel="tooltip" href="<?php  echo url('platform/reply/post',array('m'=>'ewei_money','rid'=>$row['id']));?>" title="编辑"><i class="fa fa-edit"></i></a>
                        <?php  if($row['isshow']==0) { ?>
                        <a class="btn   btn-default" title="开始活动" href="#" onclick="drop_confirm('您确定要开始吗,设置中途不可以随时修改!', '<?php  echo $this->createWebUrl('setshow',array('rid'=>$row['id'],'isshow'=>1))?>');"><i class="fa fa-play"></i></a>
                        <?php  } else if($row['isshow']==1) { ?>
                        <a class="btn   btn-default" title="结束活动" href="#" onclick="drop_confirm('您确定要暂停吗,设置中途不可以随时修改!', '<?php  echo $this->createWebUrl('setshow',array('rid'=>$row['id'],'isshow'=>0))?>');"><i class="fa fa-stop"></i></a>
                        <?php  } ?>
                        <a class="btn  btn-default" rel="tooltip" href="#" onclick="drop_confirm('您确定要删除吗?', '<?php  echo $this->createWebUrl('delete',array('rid'=>$row['id']))?>');" title="删除"><i class="fa fa-times"></i></a>
                  
                       
                    </td>
                </tr>
                <?php  } } ?>
                <tr>
                    <td colspan="7">

                        <input type="button" class="btn btn-primary" name="deleteall" value="删除选择的" />
                    </td>
                </tr>
            </tbody>
        </table>
        <?php  echo $pager;?>
    </div>

</div>
<script>
            $(function(){

            $(".check_all").click(function(){
            var checked = $(this).get(0).checked;
                    $("input[type=checkbox]").attr("checked", checked);
            });
                    $("input[name=deleteall]").click(function(){

            var check = $("input:checked");
                    if (check.length < 1){
            err('请选择要删除的记录!');
                    return false;
            }
            if (confirm("确认要删除选择的记录?")){
            var id = new Array();
                    check.each(function(i){
                    id[i] = $(this).val();
                    });
                    $.post('<?php  echo $this->createWebUrl('deleteAll')?>', {idArr:id}, function(data){
                    if (data.errno == 0)
                    {
                    location.reload();
                    } else {
                    alert(data.error);
                    }


                    }, 'json');
            }

            });
                    });</script>
<script>
            function drop_confirm(msg, url){
            if (confirm(msg)){
            window.location = url;
            }
            }
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>