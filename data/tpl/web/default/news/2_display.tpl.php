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
<?php  echo tpl_form_field_image('thumb[]', '', '', array('width' => 400, 'class_extra' => 'hide'));?>
<div class="panel panel-default">
	<div class="panel-heading">
		回复内容
	</div>
	<div class="panel-body" id="new-reply">
		<div class="row">
		<?php  if(!empty($replies)) { ?>
			<?php  $i = 0;?>
			<?php  if(is_array($replies)) { foreach($replies as $li) { ?>
				<div class="reply-item">
					<div class="col-sm-12 item-show <?php  if($i < 1) { ?>item-list-first<?php  } ?>" id="item-show-<?php  echo $li['id'];?>">
						<div class="alert">
							<div style="position:relative">
								<div class="reply-news-list-cover">
									<img src="<?php  echo $li['src'];?>"/>
								</div>
								<div class="reply-news-list-detail">
									<span class="help-block title"><strong><?php  echo $li['title'];?></strong></span>
									<span class="help-block content"><?php  echo cutstr($li['description'], 30, '...')?></span>
									<span class="help-block pull-right">
										<a href="javascript:;" onclick='newsHandler.doEditItem("item-show-<?php  echo $li['id'];?>", "item-form-<?php  echo $li['id'];?>");'>编辑</a> 
										<a href="javascript:;" onclick='newsHandler.doDeleteItem("item-show-<?php  echo $li['id'];?>")'>删除</a> 
									</span>
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>
					<div id="item-form-<?php  echo $li['id'];?>" class="item-form col-sm-12" style="display:none">
						<div class="alert">
							<div class="form-group">
								<label class="col-xs-12 col-sm-3 col-md-2 control-label">标题</label>
								<div class="col-sm-9 col-xs-12">
									<input type="text" class="form-control" placeholder="添加图文消息的标题" name="titles[]" value="<?php  echo $li['title'];?>"/>
									<input type="hidden" name="id[]" value="<?php  echo $li['id'];?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-12 col-sm-3 col-md-2 control-label">作者</label>
								<div class="col-sm-9 col-xs-12">
									<input type="text" class="form-control" placeholder="添加图文消息的作者" name="authors[]" value="<?php  echo $li['author'];?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
								<div class="col-sm-9 col-xs-12">
									<input type="text" class="form-control" placeholder="添加排序" name="displayorder[]" value="<?php  echo $li['displayorder'];?>"/>
									<span class="help-block">排序只能在提交后显示。按照从大到小的顺序对图文排序</span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-12 col-sm-3 col-md-2 control-label">封面</label>
								<div class="col-sm-9 col-xs-12">
									<?php  echo tpl_form_field_image('thumbs[]', $li['thumb'], '', array('width' => 400));?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
								<div class="col-sm-9 col-xs-12">
									<label>
									封面（大图片建议尺寸：360像素 * 200像素）
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
								<div class="col-sm-9 col-xs-12">
									<label class="checkbox-inline">
										<input type="hidden" name="incontent-flag[]" class="incontent-flag" <?php  if($li['incontent'] == 1) { ?>value="1"<?php  } else { ?>value="0"<?php  } ?>/>
										<input type="checkbox" name="incontent[]" value="1" <?php  if($li['incontent'] == 1) { ?>checked<?php  } ?>/> 封面图片显示在正文中
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-12 col-sm-3 col-md-2 control-label">描述</label>
								<div class="col-sm-9 col-xs-12">
									<textarea class="form-control" placeholder="添加图文消息的简短描述" name="descriptions[]"><?php  echo $li['description'];?></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-4 col-md-offset-3 col-lg-offset-2 col-xs-12 col-sm-8 col-md-9 col-lg-10">
									<label class="checkbox-inline">
										<input type="checkbox" value="data" class="detail-switch" onclick="$(this).parent().parent().parent().next().toggle();" <?php  if(!empty($li['content'])) { ?>checked<?php  } ?>/> 是否编辑图文详情
									</label>
									<span class="help-block">编辑详情可以展示这条图文的详细内容, 可以选择不编辑详情, 那么这条图文将直接链接至下方的原文地址中.</span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-12 col-sm-3 col-md-2 control-label">详情</label>
								<div class="col-sm-9 col-xs-12">
									<textarea class="richtext" name="contents[]"><?php  echo $li['content'];?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-12 col-sm-3 col-md-2 control-label">来源</label>
								<div class="col-sm-9 col-xs-12">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="图文消息的来源地址" name="urls[]" value="<?php  echo $li['url'];?>"/>
										<span class="input-group-btn">
											<button class="btn btn-default link_select" type="button"><i class="fa fa-external-link"></i> 系统链接</button>
										</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
								<div class="col-sm-9 col-xs-12">
									<button class="btn btn-danger" type="button" onclick="$(this).parent().parent().parent().parent().parent().remove()"><i class="fa fa-times"></i> 取消</button>
								</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
				<?php  $i++;?>
			<?php  } } ?>
		<?php  } ?>
		<?php  unset($li);?>
		</div>
		<div class="col-sm-12">
			<div class="alert" style="text-align:center;">
				<a href="javascript:;" class="btn btn-default" onclick="newsHandler.buildForm();"><i class="fa fa-plus"></i> 添加回复条目</a>
			</div>
		</div>
	</div>
	<?php  echo tpl_ueditor('')?>
	<script id="news-form-html" type="text/html">
		<div class="reply-item">
			<div class="col-sm-12 item-show" style="display:none" id="(item-add-show)">
				<div class="alert">
					<div style="position:relative">
						<div class="reply-news-list-cover">
							<img src=""/>
						</div>
						<div class="reply-news-list-detail">
							<span class="help-block title"><strong><?php  echo $li['title'];?></strong></span>
							<span class="help-block content"><?php  echo cutstr($li['description'], 30, '...')?></span>
							<span class="help-block pull-right">
								<a href="javascript:;" onclick='newsHandler.doEditItem("(item-add-show)", "(item-add-form)");'>编辑</a> 
								<a href="javascript:;" onclick='newsHandler.doDeleteItem("(item-add-show)");'>删除</a> 
							</span>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<div id="(item-add-form)" class="item-form col-sm-12">
				<div class="alert">
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">标题</label>
						<div class="col-sm-9 col-xs-12">
							<input type="text" class="form-control" placeholder="添加图文消息的标题" name="titles[]"/>
							<input type="hidden" name="id[]" value="" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">作者</label>
						<div class="col-sm-9 col-xs-12">
							<input type="text" class="form-control" placeholder="添加图文消息的作者" name="authors[]"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
						<div class="col-sm-9 col-xs-12">
							<input type="text" class="form-control" placeholder="添加排序" name="displayorder[]"/>
							<span class="help-block">排序只能在提交后显示。按照从大到小的顺序对图文排序</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">封面</label>
						<div class="col-sm-9 col-xs-12">
							<?php  echo tpl_form_field_image('thumbs[]', $li['thumb'], '', array('width' => 400));?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
						<div class="col-sm-9 col-xs-12">
							<label>
							封面（大图片建议尺寸：360像素 * 200像素）
							</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
						<div class="col-sm-9 col-xs-12">
							<label class="checkbox-inline">
								<input type="hidden" name="incontent-flag[]" class="incontent-flag" value="0"/>
								<input type="checkbox" name="incontent[]" value="1"/> 封面图片显示在正文中
							</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">描述</label>
						<div class="col-sm-9 col-xs-12">
							<textarea class="form-control" placeholder="添加图文消息的简短描述" name="descriptions[]"></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-md-offset-3 col-lg-offset-2 col-xs-12 col-sm-8 col-md-9 col-lg-10">
							<label class="checkbox-inline">
								<input type="checkbox" value="data" onclick="$(this).parent().parent().parent().next().toggle();" class="detail-switch"/> 是否编辑图文详情
							</label>
							<span class="help-block">编辑详情可以展示这条图文的详细内容, 可以选择不编辑详情, 那么这条图文将直接链接至下方的原文地址中.</span>
						</div>
					</div>
					<div class="form-group" style="display:none">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">详情</label>
						<div class="col-sm-9 col-xs-12">
							<textarea class="richtext" name="contents[]"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">来源</label>
						<div class="col-sm-9 col-xs-12">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="图文消息的来源地址" name="urls[]"/>
								<span class="input-group-btn">
									<button class="btn btn-default link_select" type="button"><i class="fa fa-external-link"></i> 系统链接</button>
								</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
						<div class="col-sm-9 col-xs-12">
							<button class="btn btn-danger" type="button" onclick="$(this).parent().parent().parent().parent().parent().remove()"><i class="fa fa-times"></i> 取消</button>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
		<script>
			$('.richtext').each(function(){
				var ueditor = new UE.ui.Editor(ueditoroption);
				ueditor.render(this);
				$(this).removeClass('richtext');
			});
			$('.link_select').unbind('click').click(function(){
				var ipt = $(this).parent().prev();
				util.linkBrowser(function(href){
					ipt.val(href);
				});
			});
		</script>
	</script>
	<script type="text/javascript">
	$('#reply-form').submit(function (){
		var flag = true;
		$('.item-form').each(function(index) {
			if ($('input[name="titles[]"]').eq(index).val() == '') {
				util.message('图文回复标题不能为空');
				flag = false;
				return false;
			}
			if ($('input[name="thumbs[]"]').eq(index).val() == '') {
				util.message('图文回复封面不能为空');
				flag = false;
				return false;
			}
		});
		if (!flag) {
			return false;
		}
	});
	$(document).on('click', ':checkbox[name="incontent[]"]', function(){
		var checked = $(this).prop('checked');
		checked = checked ? 1 : 0;
		$(this).prev().val(checked);
	});

	var attachurl = "<?php  echo $_W['attachurl'];?>";
	var newsHandler = {
			'buildForm' : function(){
				if($('#new-reply .item-show').size() >= 8) {
					util.message('单条图文信息最多添加八条内容！', '', 'error');
					return false;
				}
				this.updateList();
				var size = $('.reply-item').size();
				var html_temp = $('#news-form-html').html().replace(/\(item-add-show\)/gm, 'item-show-' + (++size));
				var html = html_temp.replace(/\(item-add-form\)/gm, 'item-form-' + (size));
				$('#new-reply .row').append(html);
			},
			'updateList' : function(){
				$('#new-reply .reply-item').each(function(){
					$(this).find('.item-show').css('display', 'block').siblings().css('display', 'none');
					var thumb = $(this).find('input[name^="thumb"]').val();
					if (typeof thumb != 'undefined') {
						if(thumb.indexOf("http://") == -1 && thumb.indexOf("https://") == -1) {
							thumb = attachurl + thumb;
						}
						$(this).find('.item-show img').attr('src', thumb);
					}
					$(this).find('.item-show .title').html($(this).find("input[name^='title']").val());
					$(this).find('.item-show .content').html($(this).find("textarea[name^='description']").val());
				});
				$('#new-reply .reply-item:first').find('.item-show').addClass('item-list-first')
			},
			'doEditItem' : function(showid, formid){
				this.updateList();
				$('#' + showid).hide();
				$('#' + formid).show();
			},
			'doDeleteItem' : function(itemid){
				$('#' + itemid).parent().remove();
			}
	};
	<?php  if(empty($replies)) { ?>
		newsHandler.buildForm();
	<?php  } else { ?>
		$('.richtext').each(function(){
			var ueditor = new UE.ui.Editor(ueditoroption);
			ueditor.render(this);
			$(this).removeClass('richtext');
		});
		$('.link_select').unbind('click').click(function(){
			var ipt = $(this).parent().prev();
			util.linkBrowser(function(href){
				ipt.val(href);
			});
		});
	<?php  } ?>
</script>
