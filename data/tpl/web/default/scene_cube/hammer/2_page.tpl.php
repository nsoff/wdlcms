<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('page_header', TEMPLATE_INCLUDEPATH)) : (include template('page_header', TEMPLATE_INCLUDEPATH));?>
<script type="text/javascript" src="../addons/scene_cube/style/src/spuotlet_map.js?v=2014-05-21"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=359042E5AC9ced07c553ebe2042aad73"></script>
	<div id="main">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">

                    <div class="box">
                        <div class="box-title">
                            <div class="span12">
                                <h3><i class="icon-edit"></i><?php  if($id) { ?>修改<?php  } else { ?>新增<?php  } ?>画面 <small><?php  echo $app['title'];?></small></h3>
                            </div>
                        </div>
                        <form id="page_form" action="" method="post" class="form-horizontal form-validate">
                              <div class="box-content">
                                <div class="control-group">
                                    <label for="listorder" class="control-label">排序：</label>
                                    <div class="controls">
                                        <input type="text" name="listorder" id="listorder" class="input-medium" data-rule-required="true" data-rule-maxlength="50" value="<?php  echo $item['listorder'];?>">
                                        <span class="maroon">*</span>
                                        <span class="help-inline">越大越靠前</span>
                                    </div>
                                </div>
                                <div class="js_scene_picture">
									<?php  $mtypelist=$this->_mtype(array(1,7,2,3,4,31))?>
                                    <div class="control-group">
                                        <label for="m_type" class="control-label">画面样式：</label>
                                        <div class="controls">
                                            <select class="inpit-medium js_scene_style_select" name="m_type" data-rule-required="true">
												<?php  if(is_array($mtypelist)) { foreach($mtypelist as $key => $row) { ?>
                                                <option value="<?php  echo $key;?>" data-type="<?php  echo $row['type'];?>" <?php  if($item['m_type']==$key) { ?>selected<?php  } ?>><?php  echo $row['name'];?></option>
												<?php  } } ?>
											</select>
                                        </div>
                                    </div>
									<?php  $i=1?>
									<?php  if(is_array($mtypelist)) { foreach($mtypelist as $row) { ?>
 									<div class="control-group alert <?php  echo $this->class_type[$i%4]?> js_scene_style js_<?php  echo $row['type'];?> hide">
									<?php  echo $row['desc'];?>
									</div>
									<?php  $i++?>
									<?php  } } ?>
                                    <div class="control-group">
                                        <label for="" class="control-label">画面内容：</label>
										<!--纯图开始-->
										<div class="controls">
                                            <div id="pureimg_image_uploads" style="width:330px;">
                                                <?php  echo tpl_form_field_image('thumb', $item['thumb'])?>
                                            </div>
                                            <div class="help-inline">建议尺寸:宽100像素,高100像素或等比图片</div>
										</div>
									</div>
									<?php  if(is_array($mtypelist)) { foreach($mtypelist as $row) { ?>
										<?php  include $this->template('sucai/'.$row['type'])?>
									<?php  } } ?>
									<span class="help-block margin-top10"></span>
                                    </div>
								</div>
                                <div class="form-actions" style="margin-left: 185px;">
                                    <button type="submit" class="btn btn-primary">保存</button>
                                    <button type="button" class="btn" onclick="window.history.go(-1)">取消</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript">      
        $(function () {
            $(".js_scene_picture").each(function(){
                var type=$(this).find(".js_scene_style_select option:selected").data("type");
                $(this).find(".js_scene_style").addClass('hide');
                $(this).find(".js_"+type).removeClass('hide');
				if(type=='maplink'||type=='amap'){
					<?php  if(!empty($data['lat'])&&!empty($data['lng'])) { ?>
					   var op = { 
							lat: <?php  echo $data['lat'];?>,
							lng: <?php  echo $data['lng'];?>,
							adr: "<?php  echo $data['place'];?>"
						}
						baidu_map(op);
					<?php  } else { ?>
						baidu_map();
					<?php  } ?>
				}
            });
            $(document).on("change",".js_scene_style_select",function(){
                var $p=$(this).parents(".js_scene_picture"),type=$(this).find("option:selected").data("type");
                $p.find(".js_scene_style").addClass('hide');
                $p.find(".js_"+type).removeClass('hide');
				if(type=='maplink'||type=='amap'){
				   <?php  if(!empty($data['lat'])&&!empty($data['lng'])) { ?>
					   var op = { 
							lat: <?php  echo $data['lat'];?>,
							lng: <?php  echo $data['lng'];?>,
							adr: "<?php  echo $data['place'];?>"
						}
						baidu_map(op);
					<?php  } else { ?>
						baidu_map();
					<?php  } ?>
				}
            });
         });

		 KindEditor.ready(function(K){
			var editor = KindEditor.editorObj || K.editor({
				themeType: 'simple',
				allowFileManager: true,
				uploadJson : "./index.php?act=attachment&do=upload",
				fileManagerJson : "./index.php?act=attachment&do=manager",
			});

			$('.select_img').click(function(e){
				editor.loadPlugin('image', function(){
					editor.plugin.imageDialog({
						imageUrl: $(e.target).parent().prev().val(),
						clickFn: function(url, title, width, height, border, align){
							var val = url;
							if(url.toLowerCase().indexOf("http://") == -1 && url.toLowerCase().indexOf("https://") == -1) {
								var filename = /images(.*)/.exec(url);
								if(filename && filename[0]) {
									val = filename[0];
								}
							}
							$(e.target).parent().prev().val(val);
							
							if('image-single' == $(e.target).parent().prev().prev().attr('upload')){
								$(e.target).parent().prev().prev().attr('src', url);
								$(e.target).parent().prev().prev().attr('alt', url)
							}

							editor.hideDialog();
						}
					});
				});
			});		
		});
    </script>
	<div style="width:100%;text-align:center;font-size:14px;color:#ff0000;display:none;">伊索科技 - izhice 2.0</div>
	</body>
	<script>
		window.document.onkeydown = function(e) {
			if ('BODY' == event.target.tagName.toUpperCase()) {
				var e=e || event;
　 				var currKey=e.keyCode || e.which || e.charCode;
				if (8 == currKey) {
					return false;
				}
			}
		};
	</script> 
</html>