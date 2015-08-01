<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style type="text/css">
	.require{color:red;}
</style>
<ul class="nav nav-tabs">
	<li <?php  if($op == 'system') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('system');?>">系统说明</a></li>
	<li <?php  if($op == 'list') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('store', array('op' => 'list'));?>">门店列表</a></li>
	<li <?php  if($op == 'post' && !$id) { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('store', array('op' => 'post'));?>">添加门店</a></li>
	<?php  if($op == 'post' && $id) { ?><li class="active"><a href="<?php  echo $this->createWebUrl('store', array('op' => 'post', 'id' => $id));?>">编辑门店</a></li><?php  } ?>
</ul>
<?php  if($op == 'post') { ?>
	<form class="form-horizontal form" id="form1" action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php  echo $id;?>">
		<div class="main">
			<div class="panel panel-default">
				<div class="panel-heading">门店基本信息</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="require">* </span>门店名称</label>
						<div class="col-sm-9 col-xs-12">
							<input type="text" class="form-control" name="title" value="<?php  echo $item['title'];?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="require">* </span>门店LOGO</label>
						<div class="col-sm-9 col-xs-12">
							<?php  echo tpl_form_field_image('logo', $item['logo']);?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="require">* </span>门店电话</label>
						<div class="col-sm-9 col-xs-12">
							<input type="text" class="form-control" name="telephone" value="<?php  echo $item['telephone'];?>">
						</div>
					</div>
					<div id="hour">
						<div id="hour-tpl">
							<?php  if(!empty($item['business_hours'])) { ?>
								<?php  if(is_array($item['business_hours'])) { foreach($item['business_hours'] as $hour) { ?>
									<div class="form-group hour-item">
										<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="require">* </span>营业时间</label>
										<div class="col-sm-9 col-xs-4 col-md-3">
											<div class="input-group">
												<input type="text" name="business_start_hours[]" class="form-control" placeholder="8:00" value="<?php  echo $hour['s'];?>"> 
												<span class="input-group-addon">至</span>
												<input type="text" name="business_end_hours[]" class="form-control" placeholder="12:00" value="<?php  echo $hour['e'];?>"> 
											</div>
										</div>	
										<div class="col-sm-9 col-xs-4 col-md-3" style="padding-top:6px">
											<a href="javascript:;" onclick="delhouritem(this);"><i class="fa fa-times-circle" title="删除时间段"> </i></a>
										</div>	
									</div>
								<?php  } } ?>
							<?php  } else { ?>
								<div class="form-group hour-item">
									<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="require">* </span>营业时间</label>
									<div class="col-sm-9 col-xs-4 col-md-3">
										<div class="input-group">
											<input type="text" name="business_start_hours[]" class="form-control" placeholder="8:00"> 
											<span class="input-group-addon">至</span>
											<input type="text" name="business_end_hours[]" class="form-control" placeholder="12:00"> 
										</div>
									</div>	
									<div class="col-sm-9 col-xs-4 col-md-3" style="padding-top:6px">
										<a href="javascript:;" onclick="delhouritem(this);"><i class="fa fa-times-circle" title="删除时间段"> </i></a>
									</div>	
								</div>
							<?php  } ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
						<div class="col-sm-9 col-xs-9 col-md-9">
							<a href="javascript:;" id="hour-add"><i class="fa fa-plus-circle"></i> 添加营业时间</a>
							<div class="help-block">请完善营业时间信息。最多可添加3个时间段</div>
						</div>	
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="require">* </span>门店特色</label>
						<div class="col-sm-9 col-xs-9 col-md-9">
							<textarea class="form-control richtext" name="description"><?php  echo $item['description'];?></textarea>
						</div>	
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="require">* </span>起送价</label>
						<div class="col-sm-9 col-xs-9 col-md-9">
							<div class="input-group">
								<input type="text" class="form-control" name="send_price" value="<?php  echo $item['send_price'];?>">
								<span class="input-group-addon">元</span>
							</div>
						</div>	
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="require">* </span>配送费</label>
						<div class="col-sm-9 col-xs-9 col-md-9">
							<div class="input-group">
								<input type="text" class="form-control" name="delivery_price" value="<?php  echo $item['delivery_price'];?>">
								<span class="input-group-addon">元</span>
							</div>
						</div>	
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="require">* </span>预计送达时间</label>
						<div class="col-sm-9 col-xs-9 col-md-9">
							<div class="input-group">
								<input type="text" class="form-control" name="delivery_time" value="<?php  echo $item['delivery_time'];?>">
								<span class="input-group-addon">分钟</span>
							</div>
						</div>	
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="require">* </span>服务半径</label>
						<div class="col-sm-9 col-xs-9 col-md-9">
							<div class="input-group">
								<input type="text" class="form-control" name="serve_radius" value="<?php  echo $item['serve_radius'];?>">
								<span class="input-group-addon">KM</span>
							</div>
						</div>	
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="require">* </span>配送区域</label>
						<div class="col-sm-9 col-xs-9 col-md-9">
							<input type="text" class="form-control" name="delivery_area" value="<?php  echo $item['delivery_area'];?>">
						</div>	
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="require">* </span>门店实景</label>
						<div class="col-sm-9 col-xs-9 col-md-9">
							<?php  echo tpl_form_field_multi_image('thumbs', $item['thumbs']);?>
							<div class="help-block">门店实景将已幻灯片的形式展示。建议图片大小：720*400</div>
						</div>	
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="require">* </span>门店所在地区</label>
						<div class="col-sm-9 col-xs-9 col-md-9">
							<?php  echo tpl_form_field_district('reside', $item['reside']);?>
						</div>	
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="require">* </span>详细地址</label>
						<div class="col-sm-9 col-xs-9 col-md-9">
							<input type="text" name="address" class="form-control" value="<?php  echo $item['address'];?>">
							<div class="help-block">请勿重复填写省市区信息</div>
						</div>	
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">地图标识</label>
						<div class="col-sm-9 col-xs-9 col-md-9">
							<?php  echo tpl_form_field_coordinate('map', $item['map']);?>
						</div>	
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">商家通知设置</label>
						<div class="col-sm-9 col-xs-9 col-md-9">
							<div class="input-group">
								<span class="input-group-addon">商家通知邮箱</span>
								<input type="text" class="form-control" name="email" value="<?php  echo $item['email'];?>">
								<span class="input-group-addon"><label><input type="checkbox" name="email_notice" value="1" <?php  if($item['email_notice'] == 1) { ?>checked<?php  } ?>> 开启</label></span>
							</div>
							<div class="help-block">当有新订单时，发送邮件到此邮箱</div>
						</div>	
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
						<div class="col-sm-9 col-xs-9 col-md-9">
							<input type="text" class="form-control" name="displayorder" value="<?php  echo $item['displayorder'];?>">
							<div class="help-block">数字越大，越靠前</div>
						</div>	
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">状态</label>
						<div class="col-sm-9 col-xs-9 col-md-9">
							<label class="radio-inline"><input type="radio" name="status" value="1" <?php  if($item['status'] == 1 || !$item['status']) { ?>checked<?php  } ?>> 显示</label>
							<label class="radio-inline"><input type="radio" name="status" value="2" <?php  if($item['status'] === 2) { ?>checked<?php  } ?>> 隐藏</label>
						</div>	
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-9 col-xs-9 col-md-9">
					<input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
					<input name="submit" id="submit" type="submit" value="提交" class="btn btn-primary col-lg-1">
				</div>	
			</div>
		</div>
	</form>
	<script type="text/javascript">
		function delhouritem(obj) {
			if($(':text[name="business_start_hours[]"]').length == 1) return false;
			$(obj).parent().parent().remove();
			return false;
		}
		$(function(){
			$(':text[name="map[lng]"]').css('margin-left', '-15px');
			$('#hour-add').click(function(){
				var hour_length = $('#hour .hour-item').length;
				if(hour_length < 3) {
					var html = '<div class="form-group hour-item">' +												
									'<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="require">* </span>营业时间</label>'+
									'<div class="col-sm-9 col-xs-4 col-md-3">'+
										'<div class="input-group">'+
											'<input type="text" name="business_start_hours[]" class="form-control" placeholder="8:00"> '+
											'<span class="input-group-addon">至</span>'+
											'<input type="text" name="business_end_hours[]" class="form-control" placeholder="12:00"> '+
										'</div>'+
									'</div>'+	
									'<div class="col-sm-9 col-xs-4 col-md-3" style="padding-top:6px">'+
										'<a href="javascript:;" onclick="delhouritem(this);"><i class="fa fa-times-circle" title="删除时间段"> </i></a>'+
									'</div>'+
								'</div>';
					$('#hour').append(html);
				}		
			});
		});
		require(['util'], function(u){
			u.editor($('.richtext')[0]);
			$('#form1').submit(function(){
				if($.trim($(':text[name="title"]').val()) == '') {
					u.message('请填写门店名称');
					return false;
				}
				if($.trim($(':text[name="logo"]').val()) == '') {
					u.message('请上传门店LOGO');
					return false;
				}
				if($.trim($(':text[name="telephone"]').val()) == '') {
					u.message('请填写门店电话');
					return false;
				}
				if($.trim($(':text[name="telephone"]').val()) == '') {
					u.message('请填写门店电话');
					return false;
				}
				var hour_flag = false;
				$(':text[name="business_start_hours[]"]').each(function(i){
					if($.trim($(this).val()) != '' && $.trim($(this).next().next().val()) != '') {
						hour_flag = true;
					} 
				});
				if(!hour_flag) {
					u.message('请填写有效的营业时间段');
					return false;
				}
				if($.trim(u.editor($('.richtext')[0]).getContent()) == "") {
					u.message('请填写门店特色说明');
					return false;				
				}
				var send_price = parseInt($.trim($(':text[name="send_price"]').val()));
				if(isNaN(send_price)) {
					u.message("起送价必须为数字");
					return false;
				}
				var delivery_price = parseInt($.trim($(':text[name="delivery_price"]').val()));
				if(isNaN(delivery_price)) {
					u.message("配送费必须为数字");
					return false;
				}
				var delivery_time = parseInt($.trim($(':text[name="delivery_time"]').val()));
				if(isNaN(delivery_time)) {
					u.message("预计送达时间必须为数字");
					return false;
				}
				var serve_radius = parseInt($.trim($(':text[name="serve_radius"]').val()));
				if(isNaN(serve_radius)) {
					u.message("服务半径必须为数字");
					return false;
				}
				if($(':text[name="delivery_area"]').val() == '') {
					u.message("请填写配送区域");
					return false;
				}
				/*if($(':text[name="thumb[]"]').val() == '') {
					u.message("请上传门店实景图");
					return false;
				}*/
				if(!$('select[name="reside[province]"]').val() || !$('select[name="reside[city]"]').val()) {
					u.message("请选择省市区信息");
					return false;
				}
				if(!$.trim($(':text[name="address"]').val())) {
					u.message("请填写详细地址");
					return false;
				}
				if($(':checkbox[name="email_notice"]:checked').val() && $.trim($(':text[name="email"]').val()) == '') {
					u.message("您开启了邮件通知，请填写邮箱地址");
					return false;
				}
				return true;
			});
		});
	</script>
<?php  } else if($op == 'list') { ?>
<style type="text/css">
	.status-toggle{cursor:pointer;}
</style>
<div class="main">
	<div class="panel panel-info">
		<div class="panel-heading">筛选</div>
		<div class="panel-body">
			<form action="./index.php" method="get" class="form-horizontal" role="form">
				<input type="hidden" name="c" value="site">
				<input type="hidden" name="a" value="entry">
				<input type="hidden" name="m" value="str_takeout">
				<input type="hidden" name="do" value="store"/>
				<input type="hidden" name="op" value="list"/>
				<div class="form-group clearfix">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">门店名称</label>
					<div class="col-sm-7 col-lg-8 col-md-8 col-xs-12">
						<input class="form-control" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>">
					</div>
					<div class="col-xs-12 col-sm-3 col-md-2 col-lg-1">
						<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<form class="form-horizontal" action="" method="post">
		<div class="panel panel-default">
			<div class="panel-body table-responsive">
				<table class="table table-hover">
					<thead class="navbar-inner">
						<tr>
							<th style="width:25px"></th>
							<th>门店名称</th>
							<th>门店电话</th>
							<th>门店地址</th>
							<th>是否显示</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php  if(is_array($lists)) { foreach($lists as $item) { ?>
						<tr>
							<td><input type="checkbox" name="ids[]" value="<?php  echo $item['id'];?>"></td>
							<td><?php  echo $item['title'];?></td>
							<td><?php  echo $item['telephone'];?></td>
							<td><?php  echo $item['address'];?></td>
							<td>
								<?php  if($item['status'] == 1) { ?>
									<span class="label label-success status-toggle" id="<?php  echo $item['id'];?>" data-toggle="2" title="点击修改">显示</span>
								<?php  } else { ?>
									<span class="label label-warning status-toggle" id="<?php  echo $item['id'];?>" data-toggle="1" title="点击修改">隐藏</span>
								<?php  } ?>
							</td>
							<td style="text-align:right;">
								<a href="<?php  echo $this->createWebUrl('store', array('op' => 'post', 'id' => $item['id']))?>" class="btn btn-default btn-sm" title="编辑" data-toggle="tooltip" data-placement="top"><i class="fa fa-edit"> </i></a>
								<a href="<?php  echo $this->createWebUrl('store', array('op' => 'del', 'id' => $item['id']))?>" class="btn btn-default btn-sm" title="删除" data-toggle="tooltip" data-placement="top" onclick="if(!confirm('删除后将不可恢复，确定删除吗?')) return false;"><i class="fa fa-times"> </i></a>
								<a href="<?php  echo $this->createWebUrl('switch', array('sid' => $item['id']))?>" class="btn btn-default btn-sm" title="管理门店" data-toggle="tooltip" data-placement="top" style="color:#D9534F;"><i class="fa fa-cog fa-spin"> </i></a>
							</td>
						</tr>
						<?php  } } ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
				<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
				<input type="submit" class="btn btn-primary col-lg-1" name="submit" value="提交" />
			</div>
		</div>
		<?php  echo $pager;?>
	</form>
</div>
<script type="text/javascript">
	require(['util'], function(u){
		$('.btn').hover(function(){
			$(this).tooltip('show');
		},function(){
			$(this).tooltip('hide');
		});

		$('.status-toggle').click(function(){
			var id = $(this).attr('id');
			var dvalue = $(this).attr('data-toggle');
			$.post('<?php  echo $this->createWebUrl('ajax', array('op' => 'status_store'))?>', {'id':id, 'value':dvalue}, function(data){
				if(data == 'success') {
					location.reload();
				} else {
					u.message('编辑门店显示状态失败');
				}
			});
		});
	});
</script>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>