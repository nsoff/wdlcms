<?php defined('IN_IA') or exit('Access Denied');?><div class="panel panel-default">
	<div class="panel-heading">
		回复内容
	</div>

<input type="hidden" name="id" value="<?php  echo $item['id'];?>">
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">名称</label>
		<div class="col-sm-8">
			<input type="text" name="title" value="<?php  echo $item['title'];?>" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">宣传图</label>
		<div class="col-sm-8">
			<?php  echo tpl_form_field_image('thumb', $item['thumb'])?>
			<span class="help-block"></span>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">简介</label>
		<div class="col-sm-8">
			<textarea style="height:100px;" class="form-control" name="content" id="reply-add-text"><?php  echo $item['content'];?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">摇几秒</label>
		<div class="col-sm-8">
			<input type="text" name="shaketimes" value="<?php  echo $item['shaketimes'];?>" class="form-control">
			
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">关注引导链接</label>
		<div class="col-sm-8">
			<input type="text" name="gzurl" value="<?php  echo $item['gzurl'];?>" class="form-control">
			
		</div>
	</div>
</div>	<script>
	window.initReplyController = function($scope) {
		
	};
	window.validateReplyForm = function(form, $, _, util, $scope) {
		
		return true;
	};
</script>