<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
.field label{float:left;margin:0 !important; width:140px;}
</style>
<div class="main">
	<ul class="nav nav-tabs">
		<li><a href="<?php  echo $this->createWebUrl('list');?>">画报管理</a></li>
		<li class="active"><a href="<?php  echo $this->createWebUrl('add');?>">添加画报</a></li>
	</ul>
	<div class="panel panel-info">
		<div class="panel-heading">添加画报</div>
		<div class="panel-body">
			<form action="" method="post" class="form-horizontal" role="form" id="form1">
			<input type="hidden" name="id" value="<?php  echo $item['id'];?>">
			<div class="form-group">
				<label class="col-xs-13 col-sm-2 col-md-2 col-lg-1 control-label">排序</label>
				<div class="col-sm-3">
					<input class="form-control" name="displayorder" id="" type="text" value="<?php  echo $item['displayorder'];?>">&nbsp;&nbsp;画报优先级，越大则越靠前 
				</div>	
			</div>
			<div class="form-group">
				<label class="col-xs-13 col-sm-2 col-md-2 col-lg-1 control-label">名称</label>
				<div class="col-sm-8">
					<input class="form-control" name="title" id="" type="text" value="<?php  echo $item['title'];?>">&nbsp;&nbsp;请输入画报名称 
				</div>	
			</div>
			<div class="form-group">
				<label class="col-xs-13 col-sm-2 col-md-2 col-lg-1 control-label">封面</label>
				<div class="col-sm-8">
					<?php  echo tpl_form_field_image('thumb',$item['thumb']);?>&nbsp;&nbsp;关键词回复的封面图片，尺寸为640*320
				</div>	
			</div>
			<div class="form-group">
				<label class="col-xs-13 col-sm-2 col-md-2 col-lg-1 control-label">简介</label>
				<div class="col-sm-8">
					<textarea class="form-control" name="content" ><?php  echo $item['content'];?></textarea>
				</div>		
			</div>
			<div class="form-group">
				<label class="col-xs-13 col-sm-2 col-md-2 col-lg-1 control-label">加载中图片</label>
				<div class="col-sm-8">
					<?php  echo tpl_form_field_image('loading',$item['loading']);?>&nbsp;&nbsp;作为场景加载时的动画，尺寸为60*60 不理解此项 请留空
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-13 col-sm-2 col-md-2 col-lg-1 control-label">开场图片</label>
				<div class="col-sm-8">
					<?php  echo tpl_form_field_image('open',$item['open']);?>&nbsp;&nbsp;作为第一场景的遮罩图片，可以选择开场动画，尺寸为640*1008
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-13 col-sm-2 col-md-2 col-lg-1 control-label">开场动画</label>
				<div class="col-sm-8">
					<input type="radio" name="ostyle" id="radio_5" value="0" <?php  if($item['ostyle'] == 0) { ?> checked<?php  } ?> /> 无动画
					<input type="radio" name="ostyle" id="radio_6" value="1" <?php  if($item['ostyle'] == 1) { ?> checked<?php  } ?> /> 滑动擦除<br />请设置开场动画
				</div>	
			</div>
			<div class="form-group">
				<label class="col-xs-13 col-sm-2 col-md-2 col-lg-1 control-label">分享图标</label>
				<div class="col-sm-8">
					<?php  echo tpl_form_field_image('icon',$item['icon']);?>&nbsp;&nbsp;请上传分享时的图标，大小为100*100
				</div>	
			</div>
			<div class="form-group">
				<label class="col-xs-13 col-sm-2 col-md-2 col-lg-1 control-label">分享回调地址</label>
				<div class="col-sm-8">
					<input class="form-control" name="share" id="" type="text" value="<?php  echo $item['share'];?>">&nbsp;&nbsp;用户分享成功后的回调地址，可以设置为引导关注图文素材
				</div>	
			</div>
			<div class="form-group">
				<label class="col-xs-13 col-sm-2 col-md-2 col-lg-1 control-label">背景音乐</label>
				<div class="col-sm-8">
					<?php  echo tpl_form_field_audio('music', $item['music'], $options = array());?> 
					<input type="checkbox" name="mset[0]" value="mauto" <?php  if(empty($item) || $item['mauto'] == 1) { ?> checked<?php  } ?>>自动播放
					<input type="checkbox" name="mset[1]" value="mloop" <?php  if(empty($item) || $item['mloop'] == 1) { ?> checked<?php  } ?>>自动循环&nbsp;&nbsp;选择上传的音频文件或直接输入URL地址，常用格式：mp3
				</div>	
			</div>
			<div class="form-group">
				<label class="col-xs-13 col-sm-2 col-md-2 col-lg-1 control-label">场景是否循环</label>
				<div class="col-sm-8">
					<input type="radio" name="isloop" id="radio_1" value="1" <?php  if(empty($item) || $item['isloop'] == 1) { ?> checked<?php  } ?> /> 允许
					<input type="radio" name="isloop" id="radio_4" value="0" <?php  if(!empty($item) && $item['isloop'] == 0) { ?> checked<?php  } ?> /> 禁止<br />设置允许循环后，场景可以从最后一页翻到第一页
				</div>	
			</div>
			<div class="form-group">
				<label class="col-xs-13 col-sm-2 col-md-2 col-lg-1 control-label">前台是否显示</label>
				<div class="col-sm-8">
					<input type="radio" name="isview" id="radio_2" value="1" <?php  if(empty($item) || $item['isview'] == 1) { ?> checked<?php  } ?> /> 显示
					<input type="radio" name="isview" id="radio_3" value="0" <?php  if(!empty($item) && $item['isview'] == 0) { ?> checked<?php  } ?> /> 隐藏<br />设置隐藏后，此画报只可以通过关键字触发
				</div>					
			</div>
			<div class="form-group">
				<div class="col-sm-8">
					<input type="submit" name="submit" value="提交" class="btn btn-primary">
					<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
				</div>		
			</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	require(['jquery', 'util'], function($, u){
		$("#form1").submit(function(){
			if($(":text[name='title']").val() == '') {
				u.message('抱歉，名称为必填项！', '', 'error');
				return false;
			}
			return true;
		});
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>