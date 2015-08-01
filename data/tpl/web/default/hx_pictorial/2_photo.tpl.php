<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
.photo{padding-bottom: 10px;}
</style>
<div class="main">
<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('list');?>">画报管理</a></li>
	<li><a href="<?php  echo $this->createWebUrl('add');?>">添加画报</a></li>
	<li class="active"><a href="<?php  echo $this->createWebUrl('photo');?>">添加照片</a></li>
</ul>
<form method="post" class="form-horizontal" role="form">
	<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
	<input name="pictorialid" type="hidden" value="<?php  echo $pictorial['id'];?>" />
	<span id="multiimage" class="btn btn-primary"><i class="fa fa-plus"></i> 上传图片</span>
	<input type="submit" name="submit" id="selectimage" class="btn" value="保存" /> <span style="color:red;">照片尺寸为640*1100，上传照片后，请保存照片数据！</span>
	<?php  if(is_array($photos)) { foreach($photos as $photo) { ?>
	<div class="panel panel-default">
		<div class="panel-body">
		<input type="hidden" value="<?php  echo $photo['attachment'];?>" name="attachment[<?php  echo $photo['id'];?>]">
		<span class="pull-right"><a class="delete" onclick="return confirm('删除操作不可恢复，确定码？'); return false;" href="<?php  echo $this->createWebUrl('delete', array('type' => 'photo', 'id' => $photo['id']))?>">删除</a></span>
		<div class="form-group">
			<div class="col-sm-2">
				<img src="<?php  echo $_W['attachurl'];?><?php  echo $photo['attachment'];?>" style="width:130px; margin-bottom:5px;">
			</div>
			<div class="col-sm-4">
				<div class="input-group photo">
					<span class="input-group-addon">排序</span>
					<input class="form-control" name="displayorder[<?php  echo $photo['id'];?>]" id="" type="text" value="<?php  echo $photo['displayorder'];?>">
				</div>
				<div class="input-group photo">
					<span class="input-group-addon">标题</span>
					<input class="form-control" name="title[<?php  echo $photo['id'];?>]" id="" type="text" value="<?php  echo $photo['title'];?>">
				</div>
				<div class="input-group photo">
					<span class="input-group-addon">链接</span>
					<input class="form-control" name="url[<?php  echo $photo['id'];?>]" id="" type="text" value="<?php  echo $photo['url'];?>">
				</div>
				<div class="input-group photo">
					<?php  if(is_array($photo['items'])) { foreach($photo['items'] as $item) { ?>
						<a  data-toggle="modal" href="<?php  echo $this->createWebUrl('item', array('pictorialid' => $pictorialid, 'photoid' => $photo['id'], 'id' => $item['id']));?>" data-target="#myModal" style="margin-right:10px;float:left;"><img src="/addons/hx_pictorial/template/mobile/img/<?php  if(($item['type']==0)) { ?>image.png<?php  } ?>"></a>
					<?php  } } ?>
					<a data-toggle="modal" href="<?php  echo $this->createWebUrl('item', array('pictorialid' => $pictorialid, 'photoid' => $photo['id']));?>" data-target="#myModal" style="background:url(/addons/hx_pictorial/template/mobile/img/addno.png) no-repeat;background-size:80px 80px;width:80px;height:80px;margin-right:10px;float:left;"><img src="/addons/hx_pictorial/template/mobile/img/add.png"></a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php  } } ?>
<div id="listimage"></div>
</form>
</div>
<script type="text/javascript">
require(['jquery', 'util'], function($, util){
	$(function(){
		// 对象绑定点击事件
		$('#multiimage').click(function(){
			util.uploadMultiPictures(function(list){
				// your code here
				for(var i=0; i<list.length; i++){
					html = '<div class="panel panel-default">' + 
								'<div class="panel-body">' + 
								'<input type="hidden" name="attachment-new[]" value="'+list[i]['filename']+'" />' + 
								'<span class="pull-right"><a href="javascript:;" onclick="var $this = this;if (confirm(\'删除操作不可恢复，确定码？\')){$(this).parent().parent().remove();}; return false;">删除</a></span>' + 
								'<div class="form-group">' + 
								'<div class="col-sm-2">' + 
								'<img src="'+list[i]['url']+'" style="width:130px; margin-bottom:5px;">' + 
								'</div>' + 
								'<div class="col-sm-4">' + 
								'<div class="input-group photo">' + 
								'<span class="input-group-addon">排序</span>' + 
								'<input class="form-control" name="displayorder-new[]" id="" type="text" value="">' + 
								'</div>' + 
								'<div class="input-group photo">' + 
								'<span class="input-group-addon">标题</span>' + 
								'<input class="form-control" name="title-new[]" id="" type="text" value="">' + 
								'</div>' + 
								'<div class="input-group photo">' + 
								'<span class="input-group-addon">链接</span>' + 
								'<input class="form-control" name="url-new[]" id="" type="text" value="">' + 
								'</div>' + 
								'</div></div></div></div>';
					$('#listimage').append(html);
				}
			});
		});
	});
});
</script>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>
<div class="modal fade" id="modal-tel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">填写拨号的电话号码</h4>
      </div>
      <div class="modal-body">
      	<div style="overflow: hidden;">
        	<div class="form-group">
				<label class="col-xs-13 col-sm-2 col-md-2 col-lg-2 control-label">电话</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="tel" value=""/>
				</div>	
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary" id="gettel" data-dismiss="modal">确定</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-vod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">填写视频网址</h4>
      </div>
      <div class="modal-body">
      	<div style="overflow: hidden;">
        	<div class="form-group">
				<label class="col-xs-13 col-sm-2 col-md-2 col-lg-2 control-label">视频网址</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="vod" value=""/>
				</div>	
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary" id="getvod" data-dismiss="modal">确定</button>
      </div>
    </div>
  </div>
</div>
<!-- 一键导航 -->
<div id="modal-nav" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	<div class="modal-dialog" style="width:60%;margin:200px auto;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">一键导航</h4>
			</div>
			<div class="modal-body">
				<form action="" method="post"  class="form-horizontal" role="form" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">标题</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="navtitle" value="" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">备注</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="content" value="" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">地理位置</label>
						<div class="col-sm-9" style="margin-left:-15px;">
							<?php  echo tpl_form_field_coordinate('baidumap', $settings['baidumap'])?>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="getnav">确定</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$('#gettel').click(function() {
	var tel = $(":text[name='tel']").val();
	$(":text[name='url']").val('tel:' + tel);
});
$('#getvod').click(function() {
	var vod = $(":text[name='vod']").val();
	if(vod.indexOf("v.youku.com") > 0 ){
		var v_id = vod.split("/")[4].slice(3,16);
		$(":text[name='url']").val('http://player.youku.com/embed/' + v_id);
	}
	if(vod.indexOf("v.qq.com") > 0 ){
		var v_id = vod.split("vid=")[1].slice(0,11);
		$(":text[name='url']").val('http://v.qq.com/iframe/player.html?vid=' + v_id + '&tiny=0&auto=0');
	}
});
$('#getnav').click(function() {
	var title = $(":text[name='navtitle']").val();
	var content = $(":text[name='content']").val();
	var lng = $(":text[name='baidumap[lng]']").val();
	var lat = $(":text[name='baidumap[lat]']").val();
	if(lng!=''&&lat!=''){
		$(":text[name='url']").val(encodeURI('http://api.map.baidu.com/marker?location='+lat+','+lng+'&title='+title+'&content='+content+'&output=html'));
	}
});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>