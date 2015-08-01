<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>

<ul class="nav nav-tabs">
	<li <?php  if($operation == 'post' && empty($id)) { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('print', array('op' => 'post'))?>">
    添加打印机
    </a></li>
	<li <?php  if($operation == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('print', array('op' => 'display'))?>">管理打印机</a></li>
    <?php  if($operation == 'post' && !empty($id)) { ?><li class="active"><a href="#">设置打印机</a></li><?php  } ?>
    <?php  if($operation == 'status' && !empty($id)) { ?><li class="active"><a href="#">打印状态</a></li><?php  } ?>
</ul>
<?php  if($operation == 'post') { ?>
<div class="main">

    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="form1">
        <div class="panel panel-default">

            <div class="panel-heading">
                打印机设置
            </div>

            <div class="panel-body">

                <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">所属店铺</label>
                    <div class="col-sm-4">
                   <select name="cateid" class='form-control'>
							<option value="0">请选择店铺</option>
						<?php  if(is_array($category)) { foreach($category as $row) { ?>
						<option value="<?php  echo $row['id'];?>" <?php  if($row['id'] == $print['cateid']) { ?> selected="selected"<?php  } ?>><?php  echo $row['name'];?></option>
						<?php  } } ?>
					</select>
                    </div></div>
                     <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">机器号</label>
                    <div class="col-sm-9">
                        <input type="text" name="deviceno" class="form-control" value="<?php  echo $print['deviceno'];?>" />
                    </div></div>
                     <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">打印机key</label>
                    <div class="col-sm-9">
                        <input type="text" name="key" class="form-control" value="<?php  echo $print['key'];?>" />
                        <span class="help-block">在飞鹅官网绑定打印机后生成的key。</span>
                    </div></div>
                     <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">打印联数</label>
                    <div class="col-sm-9">
                        <input type="text" name="printtime" class="form-control" value="<?php  echo $print['printtime'];?>" />
                    </div></div>
                     <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">二维码链接</label>
                    <div class="col-sm-9">
                        <input type="text" name="qr" class="form-control" value="<?php  echo $print['qr'];?>" />
                        <span class="help-block">留空则不打印二维码。</span>
                    </div></div>
                     <div class="form-group">
                     <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否启用</label>
                    <div class="col-sm-9">
                    <label class='radio-inline'>
                             <input type='radio' name='enabled' value='1' <?php  if($print['enabled'] == 1 || empty($print['id'])) { ?>checked<?php  } ?> /> 是
                         </label>
                         <label class='radio-inline'>
                             <input type='radio' name='enabled' value='0' <?php  if($print['enabled'] == 0 && !empty($print['id'])) { ?>checked<?php  } ?> /> 否
                         </label>
                    </div></div>

                
		<div class="form-group col-sm-12">

			<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />

			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />

		</div>

    </form>

</div>
<script type="text/javascript" src="../web/resource/components/colorpicker/spectrum.js"></script>
<link type="text/css" rel="stylesheet" href="../web/resource/components/colorpicker/spectrum.css" />
<script type="text/javascript">
<!--
	$(function(){
		colorpicker();
	});
//-->
</script>
<?php  } else if($operation == "status") { ?>
<div class="main">
	<div class="category">
		<form action="" method="post">
		<table class="table table-hover">
			<thead>
				<tr>
					<th><?php  echo $print['name']['name'];?>——打印机状态</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			
				<tr>
					<td>状态码：</td>
					<td>
						<?php  echo $print['status'];?>
					</td>
				</tr>
                <tr>
					<td><input type="text" class="datepicker" id="datepicker_starttime" name="time" value="<?php  echo $_GPC['time'];?>" readonly="readonly" />&nbsp;&nbsp;一日打印统计：</td>
					<td>
						<?php  echo $print['number'];?>
					</td>
				</tr>
                <tr>
				<td>
					<input name="submit" type="submit" value="打印查询" class="btn btn-primary span3">
					<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
				</td>
                <td></td>
			</tr>
            <tr><td>
             状态码的返回有如下几种：
					</td>
					<td>1、{"status":"clientCode错误"}，表示查询错误。<br />2、{"status":"离线"}，表示打印机没有开机，或手机卡不能联网。<br />3、{"status":"在线,工作状态正常"}，表示打印机已联网且有纸。<br />4、{"status":"在线,工作状态不正常"}，表示打印机已开机，但没纸或不能正常打印。</td>
					
				</tr>
                 <tr><td>
                 一日统计的返回解释：
					</td>
					<td>1、resultCode为0说明查询正确。<br />2、print表示查询日已打印的单数。<br />3、waiting表示查询日正在等待打印的单数。</td>
					
				</tr>
			</tbody>
		</table>
		</form>
	</div>
</div>
<link rel="stylesheet" type="text/css" href="../addons/jufeng_wcy/images/jquery.datetimepicker.css" />
<script type="text/javascript" src="../addons/jufeng_wcy/images/jquery.datetimepicker.js"></script>

<script type="text/javascript">

		$("#datepicker_starttime").datetimepicker({
yearOffset:0,
	lang:'ch',
	timepicker:false,
	format:'Y-m-d',
	formatDate:'Y-m-d',
		});

	</script>	
<?php  } else if($operation == "display") { ?>
<div class="main">

    <div class="category">

        <form action="" method="post" onsubmit="return formcheck(this)">

			<div class="panel panel-default">

				<div class="panel-body table-responsive">

					<table class="table table-hover">

						<thead>

							<tr>

								<th style="width:10px;"></th>

								<th style="width:80px;">机器号</th>
								<th style="width:150px;">所属店铺</th>
                                <th style="width:150px;">打印联数</th>
								<th style="width:150px;">是否启用</th>
                                <th style="width:150px;">操作</th>

							</tr>

						</thead>

						<tbody>
			<?php  if(is_array($print)) { foreach($print as $row) { ?>
				<tr>
					<td></td>
					<td><?php  echo $row['deviceno'];?></td>
					<td><div class="type-parent"><?php  echo $row[0]['name'];?></b></div></td>
                    <td><div class="type-parent"><?php  echo $row['printtime'];?></b></div></td>
                    <td><?php  if($row['enabled'] == 1) { ?><span class="label label-success">是</span><?php  } else { ?><span class="label label-danger">否</span><?php  } ?></td>
					<td>
                    <a href="<?php  echo $this->createWebUrl('print', array('op' => 'status', 'id' => $row['id']))?>">打印状态</a>&nbsp;&nbsp;
                    <a href="<?php  echo $this->createWebUrl('print', array('op' => 'post', 'id' => $row['id']))?>">编辑</a>&nbsp;&nbsp;
                    <a href="<?php  echo $this->createWebUrl('print', array('op' => 'delete', 'id' => $row['id']))?>" onclick="return confirm('确认删除此打印机吗？');return false;">删除</a></td>
				</tr>
				
			<?php  } } ?>
				<tr>
					<td></td>
					<td colspan="5">
						<a href="<?php  echo $this->createWebUrl('print', array('op' => 'post'))?>"><i class="fa fa-plus-circle"></i> 添加新打印机</a>
					</td>
				</tr>
			</tbody>

					</table>

				</div>

           </div>

        </form>

    </div>

</div>

<?php  } ?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>

