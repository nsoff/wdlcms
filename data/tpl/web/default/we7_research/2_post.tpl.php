<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php  load()->func('tpl')?>
<style type="text/css">
.form .alert{width:700px;}
</style>
<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('display')?>">预约活动列表</a></li>
	<li<?php  if(!$reid) { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('post')?>">新建预约活动</a></li>
	<?php  if($reid) { ?><li class="active"><a href="<?php  echo $this->createWebUrl('post', array('id' => $reid))?>">编辑预约活动</a></li><?php  } ?>
</ul>
<div class="main">
	<form class="form-horizontal form" action="" method="post" enctype="multipart/form-data" onsubmit="return validate(this);">
    	<div class="panel panel-default">
            <div class="panel-heading">
                预约活动 <span class="text-muted">通过预约你可以实现服务预约, 在线咨询, 在线调查等功能</span>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">预约名称</label>
                    <div class="col-xs-12 col-sm-9">
                         <input type="text" class="form-control" placeholder="" name="activity" value="<?php  echo $activity['title'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">简介</label>
                    <div class="col-xs-12 col-sm-9">
                         <textarea style="height:200px;" class="form-control" id="description" name="description" cols="70"><?php  echo $activity['description'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">预约内容</label>
                    <div class="col-xs-12 col-sm-9">
                        <textarea  id="content" type="text" class="form-control richtext-clone" placeholder="" name="content"><?php  echo $activity['content'];?></textarea>
	        			<span class="help-block">此预约活动的说明信息. 例如: 请提交你的联系方式, 和要咨询的产品信息. 我们会尽快联系你</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">提交提示信息</label>
                    <div class="col-xs-12 col-sm-9">
                            <textarea type="text" class="form-control"  placeholder="" name="information"><?php  echo $activity['information'];?></textarea>
                            <span class="help-block">预约提交成功以后提示的信息. 例如: 您的信息我们已经收到, 很快会有专人联系你. </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">预约活动封面</label>
                    <div class="col-xs-12 col-sm-9">
                         <?php  echo tpl_form_field_image('thumb',$activity['thumb']);?>
	      				<span class="help-block">用一张图片来更好的表现你的预约主题</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">每人可预约次数</label>
                    <div class="col-xs-12 col-sm-9">
                    	<input type="text" class="form-control" name="pretotal" value="<?php  if(!empty($activity['pretotal'])) { ?><?php  echo $activity['pretotal'];?><?php  } else { ?>1<?php  } ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">状态</label>
                    <div class="col-xs-12 col-sm-9">
                        <label class="radio-inline"><input type="radio" name="status" value="1" <?php  if($activity['status'] == 1 || empty($activity['status'])) { ?> checked="checked"<?php  } ?> /> 开始</label>
	         			<label class="radio-inline"><input type="radio" name="status" value="0" <?php  if(!empty($activity) && $activity['status'] == 0) { ?> checked="checked"<?php  } ?> /> 停止</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">开始时间</label>
                    <div class="col-xs-12 col-sm-9">
                  		<?php  echo tpl_form_field_date('starttime', $activity['starttime'], true)?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">结束时间</label>
                    <div class="col-xs-12 col-sm-9">
                 		<?php  echo tpl_form_field_date('endtime', $activity['endtime'], true)?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">微站首页展示</label>
                    <div class="col-xs-12 col-sm-9">
                		<label class="radio-inline"><input type="radio" name="inhome" value="1" <?php  if($activity['inhome'] == 1) { ?> checked="checked"<?php  } ?> /> 显示</label>
		 				<label class="radio-inline"><input type="radio" name="inhome" value="0" <?php  if(empty($activity) || $activity['inhome'] == 0) { ?> checked="checked"<?php  } ?> /> 不显示</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">接收通知Email</label>
                    <div class="col-xs-12 col-sm-9">
             			<input type="text" class="form-control" name="noticeemail" value="<?php  echo $activity['noticeemail'];?>" />
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                调研内容管理
            </div>
            <div class="panel-body table-responsive">
                <div class="alert-new">
					<table class="table table-hover">
						<thead>
						<tr>
							<th style="width:45%;">调查项目</th>
							<th style="width:15%;text-align:center;">排序</th>
							<th style="width:8%;text-align:center;">是否必填</th>
							<th style="width:12%;">类型</th>
							<th style="width:10%;">关联默认值</th>
							<th style="width:10%;">操作</th>
						</tr>
						</thead>
						<tbody id="re-items">
						<?php  if(is_array($ds)) { foreach($ds as $r) { ?>
						<tr>
							<td><input name="title[]" type="text" class="form-control" value="<?php  echo $r['title'];?>"/></td>
							<td><input type="text" name="displayorder[]" class="form-control" value="<?php  echo $r['displayorder'];?>" /></td>
							<td style="text-align:center;"><input name="essential[]" type="checkbox" title="必填项" <?php  if($r['essential']) { ?> checked="checked"<?php  } ?>/></td>
							<td>
								<select name="type[]" class="form-control">
									<?php  if(is_array($types)) { foreach($types as $k => $v) { ?>
									<option value="<?php  echo $k;?>"<?php  if($k == $r['type']) { ?> selected="selected"<?php  } ?>><?php  echo $v;?></option>
									<?php  } } ?>
								</select>
							</td>
							<td>
								<select name="bind[]" class="form-control">
									<option value="">不关联粉丝数据</option>
									<?php  if(is_array($fields)) { foreach($fields as $k => $v) { ?>
									<option value="<?php  echo $k;?>"<?php  if($k == $r['bind']) { ?> selected="selected"<?php  } ?>><?php  echo $v;?></option>
									<?php  } } ?>
								</select>
								<input type="hidden" name="value[]" value="<?php  echo $r['value'];?>"/>
								<input type="hidden" name="desc[]" value="<?php  echo $r['desc'];?>"/>
								<input type="hidden" name="essentialvalue[]" value="<?php  if($r['essential']) { ?>true<?php  } else { ?>false<?php  } ?>"/>
							</td>
							<td>
								<?php  if(!$hasData) { ?>
								<a href="javascript:;" onclick="deleteItem(this)" data-toggle="tooltip" data-placement="bottom" title="删除此条目" class="btn btn-default btn-sm"><i class="fa fa-times"></i></a> &nbsp;
								<a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="设置详细信息" onclick="setValues(this);" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
								<?php  } ?>
							</td>
						</tr>
						<?php  } } ?>
						</tbody>
					</table>
				</div>
				<div class="alert alert-block alert-new">
					<?php  if($hasData) { ?>
					<a href="<?php  echo $this->createWebUrl('manage', array('id' => $reid));?>" target="_blank">已经存在调查数据, 不能修改调查条目信息</a>
					<?php  } else { ?>
					<a href="javascript:;" onclick="addItem();">添加调查条目 <i class="fa fa-plus" title="添加调查条目"></i></a>
					<?php  } ?>
				</div>
				<span class="help-block">预约成功启动以后(已经有粉丝用户提交给预约信息), 将不能再修改调查项目, 请仔细编辑. </span>
            </div>
        </div>
        <div class="form-group col-sm-12">
			<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
   </form>
</div>
<div id="dialog"  class="modal fade" tabindex="-1">
    <div class="modal-dialog" style='width: 920px;'>
        <div class="modal-content">
            <div class="modal-header"><button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3>设置选项</h3></div>
            <div class="modal-body" >  
               <div class="well">
					<textarea id="re-desc" class="form-control" rows="3"></textarea>
					<span class="help-block"><strong>设置此条目的说明信息</strong></span>
				</div>
				<div class="well re-value hide">
					<textarea id="re-value" class="form-control" rows="6"></textarea>
					<span class="help-block"><strong>设置预约条目的选项(如果有需要的话.) 每行一条记录, 例如: 性别 男, 女</strong></span>
				</div>
                <div id="module-menus" style="padding-top:5px;"></div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-primary btn-ok" data-dismiss="modal" aria-hidden="true">确 定</a>
                <a href="#" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关 闭</a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    require(['util'],function(util){
         util.editor($('.richtext-clone')[0]);
    })
	var currentItem = null;
	$(function(){
		require(['jquery','jquery.ui'],function($,j){
			$('#re-items').sortable({handle: '.fa-move'});
		})
		$('#dialog .btn-ok').on('click', function(){
       
			if(currentItem == null) return;
			var v = $('#dialog #re-value').val();
			$(currentItem).parent().prev().find(':hidden[name="value[]"]').val(encodeURIComponent(v.replace(/\n/g, ',')));
			var v = $('#dialog #re-desc').val();
			$(currentItem).parent().prev().find(':hidden[name="desc[]"]').val(encodeURIComponent(v));
		});
		<?php  if($hasData) { ?>
		$('#re-items').find(':text,:checkbox,select').attr('disabled', 'disabled');
		<?php  } ?>
	});
	function setValues(o) {
		var v = $(o).parent().prev().find(':hidden[name="value[]"]').val();
		v = decodeURIComponent(v);
		$('#dialog #re-value').val(v.replace(/,/g, '\n'));
		var v = $(o).parent().prev().find(':hidden[name="desc[]"]').val();
		v = decodeURIComponent(v);
		$('#dialog #re-desc').val(v);
		var v = $(o).parent().prev().prev().find('select[name="type[]"]').val();
             
		if(v == 'radio' || v == 'checkbox' || v == 'select') {
			$('.well.re-value').removeClass('hide');
		} else {
			$('.well.re-value').addClass('hide');
		}
		$('#dialog').modal({keyboard: false});
		currentItem = o;
	}
	function addItem() {
		var html = '' + 
				'<tr>' +
					'<td><input name="title[]" type="text" class="form-control" /></td>' +
					'<td><input type="text" name="displayorder[]" class="form-control" /></td>' + 
					'<td style="text-align:center;"><input name="essential[]" type="checkbox" title="必填项" /></td>' +
					'<td>' +
						'<select name="type[]" class="form-control">' +
						<?php  if(is_array($types)) { foreach($types as $k => $v) { ?>'<option value="<?php  echo $k;?>"><?php  echo $v;?></option>' + <?php  } } ?>
						'</select>' +
					'</td>' +
					'<td>' +
						'<select name="bind[]" class="form-control">' +
							'<option value="">不关联粉丝数据</option>' +
						<?php  if(is_array($fields)) { foreach($fields as $k => $v) { ?><?php  if(!empty($v)) { ?>'<option value="<?php  echo $k;?>"><?php  echo $v;?></option>' + <?php  } ?><?php  } } ?>
						'</select>' +
						'<input type="hidden" name="value[]" />' +
						'<input type="hidden" name="desc[]" />' +
						'<input type="hidden" name="essentialvalue[]" />' +
					'</td>' +
					'<td>' +
						'<a href="javascript:;" data-toggle="tooltip" data-placement="bottom" onclick="deleteItem(this)"  title="删除此条目"><i class="fa fa-times"></i></a> &nbsp;&nbsp; ' +
						'<a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="设置详细信息" onclick="setValues(this);"><i class="fa fa-edit"></i></a>' +
					'</td>' + 
				'</tr>';
		$('#re-items').append(html);
	}
	function deleteItem(o) {
		$(o).parent().parent().remove();
	}
    function message(msg){
        require(['util'],function(util){
            util.message(msg);
        });
    }
	function validate() {
		if($.trim($(':text[name="activity"]').val()) == '') {
			message('必须填写预约活动标题.', '', 'error');
			return false;
		}
		if($.trim($('textarea[name="information"]').val()) == '') {
			message('必须填写预约活动成功提示信息.', '', 'error');
			return false;
		}
		<?php  if(empty($reid)) { ?>
		if($.trim($(':input[name="thumb"]').val()) == '') {
			message('必须上传预约活动封面.', '', 'error');
			return false;
		}
		<?php  } ?>
		if($(':text[name="title[]"]').length == 0) {
			message('必须设定预约活动的调查条目.', '', 'error');
			return false;
		}
		var isError = false;
		$(':text[name="title[]"]').each(function(){
			if($.trim($(this).val()) == '') {
				isError = true;
			}
		});
		if(isError) {
			message('必须要设定每个调查条目的标题.', '', 'error');
			return false;
		}
		
		var isError = false;
		$('#re-items tr').each(function(){
			var t = $(this).find('select[name="type[]"]').val();
			if(t == 'radio' || t == 'checkbox' || t == 'select') {
				if($.trim($(this).find(':hidden[name="value[]"]').val()) == '') {
					isError = true;
				}
			}
		});
		if(isError) {
			message('单选, 多选或下拉选择项目必须要设定备选项.', '', 'error');
			return false;
		}
		$(':checkbox').each(function(){
			if($(this).get(0).checked) {
				$(this).parent().parent().find(':hidden[name="essentialvalue[]"]').val('true');
			} else {
				$(this).parent().parent().find(':hidden[name="essentialvalue[]"]').val('false');
			}
		});
		return true;
	}
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
