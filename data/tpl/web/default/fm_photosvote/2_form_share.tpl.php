<?php defined('IN_IA') or exit('Access Denied');?><div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">分享标题</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="sharetitle" value="<?php  echo $reply['sharetitle'];?>" />
			<div class="help-block">此设置用于首页分享的分享语</div>
			</div>
		</div>
		<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2  control-label">分享图片</label>
					<div class="col-sm-8">
						<?php  echo tpl_form_field_image('sharephoto', $reply['sharephoto']);?>
					<div class="help-block">图片建议尺寸：500像素 * 500像素</div>
					</div>
				</div>
		
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">分享内容</label>
			<div class="col-sm-8">
				<textarea name="sharecontent" style="height:100px; " class="form-control" cols="70" rows="100"><?php  echo $reply['sharecontent'];?></textarea>				
				<div class="help-block">此设置用于首页分享的的分享语<br />分享标题、分享内容， 可用变量：<br/>#编号# （参赛者编号）<br />#参赛人数# （实际参赛的人数）<br/>#参与人数# （参与活动人数+虚拟人数+人气）<br/>#累计票数# （实际总票数+虚拟总票数）<br/>#参与人名#（参与人真实姓名）</div>
			</div>
		</div>
	
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">分享跳转提示语</label>
			<div class="col-sm-8">
				
				<textarea name="subscribedes" style="height:100px; " class="form-control" cols="70" rows="100"><?php  echo $reply['subscribedes'];?></textarea>				
				<div class="help-block">分享跳转提示语</div>
			</div>
		</div>