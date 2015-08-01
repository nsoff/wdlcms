<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li <?php  if($foo == 'create') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('list', array('foo' => 'create'));?>">创建相册</a></li>
	<li <?php  if($foo == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('list', array('foo' => 'display'));?>">相册管理</a></li>
	<?php  if($foo == 'photo') { ?><li class="active"><a href="<?php  echo $this->createWebUrl('list', array('foo' => 'photo', 'albumid' => $id));?>">添加照片</a></li><?php  } ?>
</ul>
<style>
.album_list{overflow:hidden; list-style: none; padding:0; margin:0;}
.album_list li{border:1px #DDD solid; width:232px; float:left; margin-right:15px; margin-bottom:10px;padding:4px;}
.album_list li .album_pic{display:block; width:224px; height:130px; overflow:hidden;}
.album_list li .album_pic img{display:block; height:129px; margin:0 auto;}
.album_list li .album_main{padding:10px; overflow:hidden;}
.album_list li .album_main .album_title{font-size:16px; height:20px; width:217px; overflow:hidden;}
.album_list li .album_main .pull-left{color:#999;}
.album_manage .table th{width:120px;}
.album_manage #albums_head img{margin-right:10px; max-height:70px;}
</style>
<?php  if($foo == 'create') { ?>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" onsubmit='return formcheck()'>
    	<input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
        <div class="panel panel-default">
            <div class="panel-heading">
            	创建相册
            </div>
            <div class="panel-body">
                <?php  if(!empty($item)) { ?>
                <div class="form-group">
                	<label class="col-xs-12 col-sm-3 col-md-2 control-label">访问地址</label>
                    <div class="col-xs-12 col-sm-9">
                        <a href="../app/index.php?c=entry&m=we7_album&do=detail&id=<?php  echo $item['id'];?>&i=<?php  echo $_W['uniacid'];?>" target="_blank">./app/index.php?c=entry&m=we7_album&do=detail&id=<?php  echo $item['id'];?>&i=<?php  echo $_W['uniacid'];?></a>
                        
                         <span class="help-block">您可以根据此地址，添加回复规则，设置访问。</span>
                    </div>
                </div>
                <?php  } ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
                    <div class="col-xs-12 col-sm-9">
                        <input type="text" name="displayorder" class="form-control" value="<?php  echo $item['displayorder'];?>" />
						<span class="help-block">相册优先级，越大则越靠前</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">名称</label>
                    <div class="col-xs-12 col-sm-9">
                    	<input type="text" class="form-control" placeholder="" name="title" value="<?php  echo $item['title'];?>">
                    </div>
                </div>
                <div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">分类</label>
					<div class="col-sm-4 col-xs-6">
						<select class="form-control" style="margin-right:15px;" id="pcate" name="pcate" onchange="fetchChildCategory(this.options[this.selectedIndex].value)"  autocomplete="off">
        					<option value="0">请选择一级分类</option>
            				<?php  if(is_array($category)) { foreach($category as $row) { ?>
            				<?php  if($row['parentid'] == 0) { ?>
            				<option value="<?php  echo $row['id'];?>" <?php  if($row['id'] == $item['pcate']) { ?> selected="selected"<?php  } ?>><?php  echo $row['name'];?></option>
            				<?php  } ?>
            				<?php  } } ?>
						</select>
					</div>
					<div class="col-sm-4 col-xs-6">
    					<select class="form-control" id="cate_2" name="ccate" autocomplete="off">
        					<option value="0">请选择二级分类</option>
            				<?php  if(!empty($item['ccate']) && !empty($children[$item['pcate']])) { ?>
            				<?php  if(is_array($children[$item['pcate']])) { foreach($children[$item['pcate']] as $row) { ?>
           					<option value="<?php  echo $row['0'];?>" <?php  if($row['0'] == $item['ccate']) { ?> selected="selected"<?php  } ?>><?php  echo $row['1'];?></option>
            				<?php  } } ?>
            				<?php  } ?>
        				</select>
    				</div>
				</div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">封面</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php  echo tpl_form_field_image('thumb', $item['thumb'])?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">简介</label>
                    <div class="col-sm-9 col-xs-12">
                     	<textarea style="height:200px;" class="form-control" name="content" cols="70" id="reply-add-text"><?php  echo $item['content'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                	<label class="col-xs-12 col-sm-3 col-md-2 control-label">相册类型</label>
                    <div class="col-sm-9 col-xs-12">
                     	<label for="radio_1" class="radio-inline"><input type="radio" name="type" id="radio_1" value="0" <?php  if(empty($item) || $item['type'] == 0) { ?> checked<?php  } ?> /> 普通</label>
	    				<label for="radio_0" class="radio-inline"><input type="radio" name="type" id="radio_0" value="1" <?php  if(!empty($item) && $item['type'] == 1) { ?> checked<?php  } ?> /> 360全景</label>
                    </div>
                </div>
				<div class="form-group">
                 	<label class="col-xs-12 col-sm-3 col-md-2 control-label">前台是否显示</label>
                    <div class="col-sm-9 col-xs-12">
                     	<label for="radio_2" class="radio-inline"><input type="radio" name="isview" id="radio_2" value="1" <?php  if(empty($item) || $item['isview'] == 1) { ?> checked<?php  } ?> /> 显示</label>
						<label for="radio_3" class="radio-inline"><input type="radio" name="isview" id="radio_3" value="0" <?php  if(!empty($item) && $item['isview'] == 0) { ?> checked<?php  } ?> /> 隐藏</label>
						<span class="help-block">设置隐藏后，此相册只可以通过关键字触发</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-sm-12 col-xs-12">
			<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" onclick='return formcheck()' />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
  </form>
</div>
<?php  } else if($foo == 'display') { ?>
<div class='main'>
   	<div class="panel panel-info">
		<div class="panel-heading">筛选</div>
		<div class="panel-body">
			<form action="./index.php" method="get" class="form-horizontal" role="form">
				<input type="hidden" name="c" value="site" />
				<input type="hidden" name="a" value="entry" />
				<input type="hidden" name="m" value="we7_album" />
				<input type="hidden" name="do" value="list" />
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">关键字</label>
					<div class="col-sm-8 col-lg-9 col-xs-12">
						<input class="form-control" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">状态</label>
					<div class="col-sm-8 col-lg-9 col-xs-12">
						<select name="isview" class='form-control'>
							<option value="" <?php  if($_GPC['isview']=='') { ?> selected<?php  } ?>>全部</option>
							<option value="1" <?php  if($_GPC['isview']=='1') { ?> selected<?php  } ?>>显示</option>
							<option value="0" <?php  if($_GPC['isview']=='0') { ?> selected<?php  } ?>>隐藏</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">分类</label>
					<div class="col-sm-4 col-xs-6">
						<select class="form-control" style="margin-right:15px;" name="cate_1" onchange="fetchChildCategory(this.options[this.selectedIndex].value)">
							<option value="0">请选择一级分类</option>
							<?php  if(is_array($category)) { foreach($category as $row1) { ?>
							<?php  if($row1['parentid'] == 0) { ?>
							<option value="<?php  echo $row1['id'];?>" <?php  if($row1['id'] == $_GPC['cate_1']) { ?> selected="selected"<?php  } ?>><?php  echo $row1['name'];?></option>
							<?php  } ?>
							<?php  } } ?>
						</select>
					</div>
					<div class="col-sm-4 col-xs-6">
						<select class="form-control input-medium" id="cate_2" name="cate_2">
							<option value="0">请选择二级分类</option>
							<?php  if(!empty($_GPC['cate_1']) && !empty($children[$_GPC['cate_1']])) { ?>
							<?php  if(is_array($children[$_GPC['cate_1']])) { foreach($children[$_GPC['cate_1']] as $row2) { ?>
							<option value="<?php  echo $row2['0'];?>" <?php  if($row2['0'] == $_GPC['cate_2']) { ?> selected="selected"<?php  } ?>><?php  echo $row2['1'];?></option>
							<?php  } } ?>
							<?php  } ?>
						</select>
					</div>
					<div class=" col-xs-12 col-sm-2 col-lg-2">
						<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<ul class="album_list">
	<?php  if(is_array($list)) { foreach($list as $item) { ?>
	<li>
		<a href="<?php  echo $this->createWebUrl('list', array('foo' => 'photo', 'albumid' => $item['id']))?>" class="album_pic">
        	<img src="<?php  echo tomedia($item['thumb']);?>" onerror="this.src='./resource/images/nopic.jpg'; this.title='缩略图片未上传.'" />
		</a>
		<div class="album_main">
			<p class="album_title">
            	<?php  if(!empty($category[$item['pcate']])) { ?>
				<span class="text-error">[<?php  echo $category[$item['pcate']]['name'];?>] </span>
				<?php  } ?>
				<?php  if(!empty($children[$item['pcate']])) { ?>
				<span class="text-info">[<?php  echo $children[$item['pcate']][$item['ccate']]['1'];?>] </span>
				<?php  } ?>
            	<?php  echo $item['title'];?>
			</p>
			<p>
				<span class="pull-right">
					<a href="<?php  echo $this->createWebUrl('list', array('foo' => 'photo', 'albumid' => $item['id']))?>">上传照片</a>
					<a href="<?php  echo $this->createWebUrl('list', array('foo' => 'create', 'id' => $item['id']))?>">编辑</a>
					<a href="<?php  echo $this->createWebUrl('list', array('foo' => 'delete', 'id' => $item['id'], 'type' => 'album'))?>" onclick="return confirm('此操作不可恢复，确定删除码？'); return false;">删除</a></span>
				<span class="pull-left">有<?php  echo $item['total'];?>张照片</span>
			</p>
		</div>
	</li>
	<?php  } } ?>
</ul>
<?php  echo $pager;?>
<?php  } else if($foo == 'photo') { ?>
<script type="text/javascript">
<?php  if($album['type'] == 1) { ?>
require(['jquery', 'util'], function($, util){
	$(function(){
		// 对象绑定点击事件
		$('#selectimage').click(function(){
			util.uploadMultiPictures(function(list){
				// your code here
				for(var i=0; i<list.length; i++){
					var html = '<div class="alert alert-info">' +
								'<input type="hidden" name="attachment-new[]" value="'+list[i]['filename']+'" />'+
								'<span class="pull-right"><a href="javascript:;" onclick="var $this = this;if (confirm(\'删除操作不可恢复，确定码？\')){ajaxopen(\'index.php?c=site&a=entry&m=we7_album&do=delete&type=photo&attachment='+list[i]['filename']+'\', function(s) {$($this).parent().parent().remove();})}; return false;">删除</a></span>' +
								'<div class="photo_preview pull-left"><label class="radio inline"><img src="'+list[i]['url']+'"><div><a href="javascript:;" onclick="ajaxopen(\'index.php?c=site&a=entry&m=we7_album&do=cover&albumid=<?php  echo $album['id'];?>&thumb='+list[i]['filename']+'\', function(msg){ message(msg)})">设为封面</a></div></label></div>' +
								'<table class="pull-left">' +
								'<tr><th>排序</th><td><select class="form-control" name="displayorder-new[]"><option value="0">前</option><option value="1">右</option><option value="2">后</option><option value="3">左</option><option value="4">上</option><option value="5">下</option></select></td></tr>' +
								'<tr><th>标题</th><td><input type="text" name="title-new[]" value="" class="form-control"></td></tr>' +
								'<tr class="hide"><th>简介</th><td><textarea name="description-new[]" class="form-control"></textarea></td></tr>' +
								'</table></div>';
					$('#listimage').append(html);
				}
			});
		});
	});
    });
<?php  } else { ?>
	require(['jquery', 'util'], function($, util){
	$(function(){
		// 对象绑定点击事件
		$('#selectimage').click(function(){
			util.uploadMultiPictures(function(list){
				// your code here
				for(var i=0; i<list.length; i++){
					html = '<div class="alert alert-info">' +
							'<input type="hidden" name="attachment-new[]" value="'+list[i]['filename']+'" />'+
							'<span class="pull-right"><a href="javascript:;" onclick="var $this = this;if (confirm(\'删除操作不可恢复，确定码？\')){ajaxopen(\'index.php?c=site&a=entry&m=we7_album&do=delete&type=photo&attachment='+list[i]['filename']+'\', function(s) {$($this).parent().parent().remove();})}; return false;">删除</a></span>' +
							'<div class="photo_preview pull-left"><label class="radio inline"><img src="'+list[i]['url']+'"><div><a href="javascript:;" onclick="ajaxopen(\'index.php?c=site&a=entry&m=we7_album&do=cover&albumid=<?php  echo $album['id'];?>&thumb='+list[i]['filename']+'\', function(msg){ message(msg)})">设为封面</a></div></label></div>' +
							'<table class="pull-left">' +
							'<tr><th>排序</th><td><input type="text" name="displayorder-new[]" value="" class="form-control"></td></tr>' +
							'<tr><th>标题</th><td><input type="text" name="title-new[]" value="" class="form-control"></td></tr>' +
							'<tr  class="hide"><th>简介</th><td><textarea name="description-new[]" class="form-control"></textarea></td></tr>' +
							'</table></div>';
					$('#listimage').append(html);
				}
			});
		});
	});
});

<?php  } ?>
 </script>
<style>
.photo_list{padding:15px 0;}
.photo_list .alert{width:auto; margin-top:10px; overflow:hidden;}
.photo_list .photo_preview{width:130px;}
.photo_list .photo_preview img{width:130px; margin-bottom:5px;}
.photo_list .photo_preview label{padding:0;}
.photo_list .photo_preview input[type="radio"]{margin-left:0; margin-right:10px;}
.photo_list table{margin-left:40px;}
.photo_list table th,.photo_list table td{padding-bottom:5px;}
.photo_list table th{width:60px; font-size:14px;}
.photo_list table input,.photo_list table select{margin-bottom:0;}
</style>
<div class="main">
	<div class="photo_list">
	<form method="post" class="form">
		<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
		<input name="albumid" type="hidden" value="<?php  echo $album['id'];?>" />
		<span id="selectimage" class="btn btn-primary"><i class="icon-plus"></i> 上传照片</span>
		<input type="submit" name="submit" id="selectimage" class="btn btn-default" value="保存" />
		<span style="color:red;">上传照片后，请保存照片数据！</span>
        <div style="padding:10px 0;">
			相册访问地址：<a target="_blank" href="../app/index.php?c=entry&m=we7_album&do=detail&id=<?php  echo $album['id'];?>&i=<?php  echo $_W['uniacid'];?>">./app/index.php?c=entry&m=we7_album&do=detail&id=<?php  echo $album['id'];?>&i=<?php  echo $_W['uniacid'];?></a>
		</div>
		<?php  if($album['type'] == 1) { ?>
		<div class="alert alert-info" style="margin-top:0;">
			<i class="icon-warning-sign"></i> 请把照片按照前->右->后->左->上->下的顺序排列！
		</div>
		<?php  } ?>
		<?php  if($album['type'] == 0) { ?><div id="listimage"></div><?php  } ?>
		<?php  if(is_array($photos)) { foreach($photos as $item) { ?>
		<div class="alert alert-info">
			<input type="hidden" value="<?php  echo $item['attachment'];?>" name="attachment[<?php  echo $item['id'];?>]">
			<span class="pull-right"><a class="delete" onclick="return confirm('删除操作不可恢复，确定码？'); return false;" href="<?php  echo $this->createWebUrl('list', array('foo' => 'delete', 'type' => 'photo', 'id' => $item['id']))?>">删除</a></span>
			<div class="photo_preview pull-left">
				<label class="radio-inline">
					<img src="<?php  echo $_W['attachurl'];?><?php  echo $item['attachment'];?>">
					<div><a href="javascript:;" onclick="ajaxopen('<?php  echo $this->createWebUrl('list', array('foo' => 'cover', 'albumid' => $album['id'], 'thumb' => $item['attachment']))?>')">设为封面</a></div>
				</label>
			</div>
			<table class="pull-left">
				<tr>
					<th>排序</th>
					<td>
						<?php  if($album['type'] == 1) { ?>
						<select class="form-control" name="displayorder[<?php  echo $item['id'];?>]">
							<option value='0' <?php  if($item['displayorder']==0) { ?>selected<?php  } ?>>前</option>
							<option value='1' <?php  if($item['displayorder']==1) { ?>selected<?php  } ?>>右</option>
							<option value='2' <?php  if($item['displayorder']==2) { ?>selected<?php  } ?>>后</option>
							<option value='3' <?php  if($item['displayorder']==3) { ?>selected<?php  } ?>>左</option>
							<option value='4' <?php  if($item['displayorder']==4) { ?>selected<?php  } ?>>上</option>
							<option value='5' <?php  if($item['displayorder']==5) { ?>selected<?php  } ?>>下</option>
						</select>
						<?php  } else { ?>
						<input type="text" class="form-control" value="<?php  echo $item['displayorder'];?>" name="displayorder[<?php  echo $item['id'];?>]">
						<?php  } ?>
					</td>
				</tr>
				<tr>
					<th>标题</th>
					<td><input type="text" class="form-control" value="<?php  echo $item['title'];?>" name="title[<?php  echo $item['id'];?>]"></td>
				</tr>
				<tr class="hide">
					<th>简介</th>
					<td><textarea class="form-control" name="description[<?php  echo $item['id'];?>]"><?php  echo $item['description'];?></textarea></td>
				</tr>
			</table>
		</div>
		<?php  } } ?>
		<?php  if($album['type'] == 1) { ?><div id="listimage"></div><?php  } ?>
	</form>
	</div>
</div>
<?php  } ?>
<div id='msg' class="hide"></div>
<script language="javascript">
function ajaxopen(url) {
	$.get(url+'&time='+new Date().getTime(), function(data){ 
		$("#msg").html(data);
	});	
	return false;
}
var category = <?php  echo json_encode($children)?>;
function fetchChildCategory(cid) {
	var html = '<option value="0">请选择二级分类</option>';
	if (!category || !category[cid]) {
		$('#cate_2').html(html);
		return false;
	}
	for (i in category[cid]) {
		html += '<option value="'+category[cid][i][0]+'">'+category[cid][i][1]+'</option>';
	}
	$('#cate_2').html(html);
}
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
