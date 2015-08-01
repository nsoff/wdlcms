<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/header-gw', TEMPLATE_INCLUDEPATH));?>
<div id="row" style="margin-top: 20px;">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
<ol class="breadcrumb">
	<li><a href="./?refresh"><i class="fa fa-home"></i></a></li>
	<li><a href="<?php  echo url('system/welcome');?>">系统</a></li>
	<li><a href="<?php  echo url('system/attachment');?>">附件设置</a></li>
	<li class="active">全局设置</li>
</ol>
	<div class="clearfix">
		<form action="" method="post" class="form-horizontal form" id="form">
		<?php  if(!empty($upload_max_filesize) && !empty($post_max_size)) { ?>
			<h5 class="page-header">PHP 环境</h5>
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">PHP 环境说明</label>
				<div class="col-sm-10 col-xs-12">
					<div class="form-control-static">1. 当前 PHP 环境允许最大单个上传文件大小为: <?php  echo $upload_max_filesize;?></div>
					<div class="form-control-static">2. 当前 PHP 环境允许最大 POST 表单大小为: <?php  echo $post_max_size;?></div>
				</div>
			</div>
		<?php  } ?>
			<h5 class="page-header">附件缩略设置</h5>
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">缩略设置</label>
				<div class="col-sm-10 col-xs-12">
					<label for="radio_image_thumb_0" class="radio-inline">
						<input type="radio" name="upload[image][thumb]" id="radio_image_thumb_0" value="0" <?php  if(empty($upload['image']['thumb'])) { ?> checked<?php  } ?> /> 不启用缩略
					</label>
					<label for="radio_image_thumb_1" class="radio-inline">
						<input type="radio" name="upload[image][thumb]" id="radio_image_thumb_1" value="1" <?php  if(!empty($upload['image']['thumb'])) { ?> checked<?php  } ?> /> 启用缩略
					</label>
					<div class="help-block"></div>
				</div>
			</div>
			<div class="form-group upload-image-thumb-width-height" <?php  if(empty($upload['image']['thumb'])) { ?> style="display:none;"<?php  } ?>>
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label"></label>
				<div class="col-sm-2 col-xs-12">
					<div class="input-group">
						<span class="input-group-addon">宽</span>
						<input name="upload[image][width]" value="<?php  echo $upload['image']['width'];?>" type="text" class="form-control">
						<span class="input-group-addon">px</span>
					</div>
					<span class="help-block">缩略后图片 <b>最大宽度</b></span>
				</div>
			</div>
			<h5 class="page-header">图片附件设置</h5>
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">支持文件后缀</label>
				<div class="col-sm-4 col-xs-12">
					<textarea name="upload[image][extentions]" class="form-control" rows="4"><?php  echo $upload['image']['extentions'];?></textarea>
					<div class="help-block">填写图片后缀名称, 如: jpg, 换行输入, 一行一个后缀.</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">支持文件大小</label>
				<div class="col-sm-4 col-xs-12">
					<div class="input-group">
						<input name="upload[image][limit]" value="<?php  echo $upload['image']['limit'];?>" type="text" class="form-control">
						<span class="input-group-addon">KB</span>
					</div>
				</div>
			</div>
			<h5 class="page-header">音频视频附件设置</h5>
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">支持文件后缀</label>
				<div class="col-sm-4 col-xs-12">
					<textarea name="upload[audio][extentions]" class="form-control" rows="4"><?php  echo $upload['audio']['extentions'];?></textarea>
					<div class="help-block">填写音频视频后缀名称, 如: mp3, 换行输入, 一行一个后缀.</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">支持文件大小</label>
				<div class="col-sm-4 col-xs-12">
					<div class="input-group">
						<input name="upload[audio][limit]" value="<?php  echo $upload['audio']['limit'];?>" type="text" class="form-control">
						<span class="input-group-addon">KB</span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-xs-12 col-sm-10 col-md-10 col-lg-10">
					<input name="submit" type="submit" value="提交" class="btn btn-primary span3" />
					<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
				</div>
			</div>
			<script type="text/javascript">
				require(['jquery', 'util'], function($, util){
					$(function(){
						$('input[name="upload[image][thumb]"]').click(function(){
							if($('input[name="upload[image][thumb]"]').val()){
								$('.upload-image-thumb-width-height').show();
							} else {
								$('.upload-image-thumb-width-height').hide();
							}
						});
					});
				});
			</script>
		</form>
	</div></div></div></div></div>

<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/footer-gw', TEMPLATE_INCLUDEPATH));?>
