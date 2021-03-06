<?php defined('IN_IA') or exit('Access Denied');?><style>
.clear{width:100%;height:0;clear:both;}
.alert{margin:1px 0;padding:10px 15px;background:#F5F5F5;}
.item-show .reply-news-list-cover{width:30%;height:100px;float:right;overflow:hidden;}
.item-show .reply-news-list-cover img{width:100%;height:auto;}
.item-show .reply-news-list-detail{width:65%;float:left;overflow:hidden;height:auto}
.item-show .reply-news-list-detail .help-block{margin:5px 0}

.item-list-first .reply-news-list-cover{width:100%;height:200px;;overflow:hidden;}
.item-list-first .reply-news-list-cover img{width:100%;height:auto;}
.item-list-first .reply-news-list-detail{width:100%;position:absolute;bottom:0;left:0;overflow:hidden;height:50px;color:#FFF;filter:Alpha(opacity=70);background:#000;background:rgba(0, 0, 0, 0.7);text-shadow:none;font-family:arial,宋体b8b\4f53,sans-serif;}
.item-list-first .help-block{padding:0 10px}
.item-list-first .pull-right{position:absolute;bottom:10px;right:0}
</style>

<div class="col-sm-12">
	<div class="panel panel-default">
	<div class="panel-heading">
		选择要展示的画报
	</div>
	<div class="panel-body">
		<div class="row">
			<td>
				<div class="reply-news-edit-button">
					<button class="btn" style="width:100%;" type="button" onclick="popwin = $('#modal-module-menus').modal();">选择要展示的画报</button>
				</div>
			</td>
		</div>
		<div class="row">
			<div class="reply-item" id="entry">
			<?php  if(is_array($reply)) { foreach($reply as $index => $row) { ?>
				<div class="col-sm-12 item-show <?php  if($index == 0) { ?>item-list-first<?php  } ?>" id="preview_0">

					<div class="alert">
							<div style="position:relative">
								<div class="reply-news-list-cover">
									<img alt="" src="<?php  echo $_W['attachurl'];?><?php  echo $huabao[$row['huabaoid']]['thumb'];?>">
								</div>
								<div class="reply-news-list-detail">
									<span class="help-block title"><strong><?php  echo $huabao[$row['huabaoid']]['title'];?></strong></span>
									<span class="help-block content"><?php  echo $huabao[$row['huabaoid']]['content'];?></span>
									<span class="help-block pull-right"> 
										<a onclick="return confirm('此操作不可恢复，确定删除吗？');return false;" href="<?php  echo $this->createWebUrl('rdelete', array('id' => $row['id']))?>">删除</a>
									</span>
								</div>
								<div class="clear"></div>
							</div>
						</div>
				</div>
			<?php  } } ?>
			</div>
		</div>
	</div>
</div>
</div>
<div class="modal fade" id="modal-module-menus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">选择要展示的项目</h4>
      </div>
      <div class="modal-body">
      	<div style="overflow: hidden;">
        	<div class="form-group">
				<label class="col-xs-13 col-sm-2 col-md-2 col-lg-2 control-label">搜索关键字</label>
				<div class="col-sm-8">
					<div class="input-group">
						<input type="text" class="form-control" name="keyword" value="" id="search-kwd" />
						<span class="input-group-btn">
							<button type="button" class="btn" onclick="search_entries();">搜索</button>
						</span>
					</div>
				</div>	
			</div>
			<div id="module-menus"></div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	var popwin;
	function search_entries() {
		var kwd = $.trim($('#search-kwd').val());
		$.post('<?php  echo $this->createWebUrl('query');?>', {keyword: kwd}, function(dat){
			$('#module-menus').html(dat);
		});
	}
	function select_entry(o) {
		var html = '<div id="preview_'+$('#entry div.alert').size()+'" class="col-sm-12 item-show">' +
					'<div class="alert"><div style="position:relative"><div class="reply-news-list-cover"><img src="<?php  echo $_W['attachurl'];?>'+o.thumb+'" alt=""></div><div class="reply-news-list-detail"><span class="help-block title"><strong>'+o.title+'</strong></span><span class="help-block content">'+o.description+'</span></div><div class="clear"></div></div></div></div>' +
					'<input type="hidden" name="huabaoid[]" value="'+o.id+'"/>';
		var obj = $(html);
		if ($('#entry div.alert').size() >= 8) {
			popwin.modal('hide');
			message('超过图文规则最大显示条数！');
			return false;
		}
		if ($('#entry div').size() == 0) {
			obj.addClass('reply-news-list-first');
		}
		$('#entry').append(html);
	}
</script>
