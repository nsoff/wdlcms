<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('post_header', TEMPLATE_INCLUDEPATH)) : (include template('post_header', TEMPLATE_INCLUDEPATH));?>
<div id="main">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="box">
                    <div class="box-title">
                        <div class="span12">
                            <h3><i class="icon-edit"></i><?php  if($item['title']) { ?>修改<?php  } else { ?>新增<?php  } ?>微场景 <small><?php  echo $app['title'];?></small></h3>
                        </div>
                    </div>
                    <form action="" method="post" class="form-horizontal form-validate">
                         <div class="box-content">
                                <div class="control-group">
                                    <label for="title" class="control-label">微场景名称：</label>
                                    <div class="controls">
                                        <input type="text" name="title" id="title" value="<?php  echo $item['title'];?>" class="input-medium" data-rule-required="true" data-rule-maxlength="50"><span class="maroon">*</span>
                                        <span class="help-inline">不能超过50个字</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="weixin" class="control-label">微场景有效期：</label>
                                    <div class="controls">
                                        <div class="input-append">
                                        <input type="text" name="valid_time" id="valid_time" class="daterangepick input-xlarge" value="<?php  echo date('Y/m/d H:i:s',$item['start_time'])?> - <?php  echo date('Y/m/d H:i:s',$item['end_time'])?>" readonly />
                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                    </div>

                                    </div>
                                </div> 
								<div class="control-group">
                                    <label for="reply_title" class="control-label">图文标题：</label>
                                    <div class="controls">
                                        <input type="text" name="reply_title" id="reply_title" class="input-medium" value="<?php  echo $item['reply_title'];?>" data-rule-required="true" data-rule-maxlength="25"><span class="maroon">*</span>
                                        <span class="help-inline">不能超过25个字符</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="reply_thumb" class="control-label">图文封面：</label>
                                    <div class="controls">
                                        <div id="reply_thumb" style="width:330px;">
                                            <?php  echo tpl_form_field_image('reply_thumb', $item['reply_thumb'])?>
                                        </div>
                                        <div class="help-inline">建议尺寸:宽540像素,高300像素或等比图片</div>
                                     </div>
                                </div>
                                <div class="control-group">
                                    <label for="reply_description" class="control-label">图文简介：</label>
                                    <div class="controls">
                                        <textarea class="input-xxlarge" rows="4" name="reply_description"><?php  echo $item['reply_description'];?></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="wxname" class="control-label">分享标题设置：</label>
                                    <div class="controls">
                                        <input type="text" name="share_title" id="share_title" value="<?php  echo $item['share_title'];?>" class="input-medium" data-rule-required="true" data-rule-maxlength="25"><span class="maroon">*</span>
                                        <span class="help-inline">不能超过25个字符</span>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label for="share_thumb" class="control-label">分享图标：</label>
                                    <div class="controls">
                                        <div id="reply_thumb" style="width:330px;">
                                            <?php  echo tpl_form_field_image('share_thumb', $item['share_thumb'])?>
                                        </div>
                                        <div class="help-inline">建议尺寸:宽100像素,高100像素或等比图片</div>
                                     </div>
                                </div>
								
                                <div class="control-group">
                                    <label for="wxname" class="control-label">分享内容设置：</label>
                                    <div class="controls">
                                        <textarea class="input-xxlarge" rows="4" name="share_content" data-rule-required="true" data-rule-maxlength="200"><?php  echo $item['share_content'];?></textarea><span class="maroon">*</span>
                                        <span class="help-block">不能超过200个字符</span>
                                    </div>
                                </div>

                                <!--分享跳转 开始 -->
                                <div class="control-group hide">
                                    <label class="control-label">分享跳转：</label>
                                    <div id="res_block1" class="js_res_block">
                                        <!--分享跳转 类型选择 开始 -->
                                        <div class="control-group">
                                            <div class="controls">
                                                <select  class="input-medium js_type" name="share_cb_select">
                                                    <option value="0">请选择</option>
                                                    <option value="link">链接</option>
                                                    <option value="tel">电话</option>
                                                </select><span class="help-inline">分享后跳转</span>
                                            </div>
                                        </div>
                                        <!--分享跳转 类型选择 结束 -->

                                        <!-- 分享跳转 按钮图关联单链接开始 -->
                                        <div id="r_link" class="control-group r-module hide js_link" >
                                            <div class="control-group">
                                                <label class="control-label" for="source_url">页面URL</label>
                                                <div class="controls">
                                                    <input type="text" id="source_url" class="input-xlarge" name="share_cb_url" data-rule-required="true" data-rule-url="true" kl_vkbd_parsed="true">
                                                    <span class="maroon">*</span><span class="help-inline">(必填,必须是正确的URL格式)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 分享跳转 按钮图关联单链接结束 -->

                                        <!-- 分享跳转 按钮图关联电话开始 -->
                                        <div id="r_tel" class="control-group r-module hide js_tel" >
                                            <div class="control-group">
                                                <label class="control-label" for="tel">电话号码</label>
                                                <div class="controls">
                                                    <input type="text" id="tel" class="input-large" name="share_cb_tel" data-rule-required="true" data-rule-phone="true" kl_vkbd_parsed="true">
                                                    <span class="maroon">*</span><span class="help-inline">(必填,必须是正确的号码)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 分享跳转 按钮图关联电话结束 -->
                                    </div>
                                </div>
                                <!--分享跳转 结束 -->

                                <!-- 开场画面 第一屏 开始 -->
                                <div class="js_scene_picture">
                                    <div class="control-group">
                                        <label for="wxname" class="control-label">微场景开场画面：</label>
                                        <!-- 开场画面 类型 开始 -->
                                        <div class="controls">
                                            <select class="inpit-medium js_scene_style_select valid" name="first_type" data-rule-required="true">
                                                <option value="1" data-type="pure"<?php  if($item['first_type']==1) { ?>selected="selected"<?php  } ?>>纯图片式</option>
                                                <option value="2" data-type="dim" <?php  if($item['first_type']==2) { ?>selected="selected"<?php  } ?>>刮卡图片式</option>
                                             </select>
                                            <span for="first_type" class="help-block error valid"></span>
                                        </div>
                                        <!-- 开场画面 类型 结束 -->
                                    </div>
                                    <div class="control-group js_scene_style js_pure hide">
                                        <label for="" class="control-label">画面内容：</label>
                                        <div class="controls">
                                            <div id="first_pure_image_uploads" style="width:330px;">
                                                <?php  echo tpl_form_field_image('cover', $item['cover'])?>
                                            </div>
                                            <div class="help-inline">（建议尺寸:宽640像素,高960像素或等比图片，可为PNG格式）</div>
                                        </div>
                                    </div>
 									<div class="control-group js_scene_style js_dim hide" >	
 										<label for="cover_title" class="control-label">擦一擦文字：</label>
										<div class="controls">
										<input type="text" id="cover_title" class="input-large" name="cover_title" value="<?php  echo $item['cover_title'];?>">
										</div>
									</div>
                                    <div class="control-group js_scene_style js_dim hide" >	
 										<label for="" class="control-label">刮刮图片：</label>
                                        <div class="controls">
                                            <div id="first_dim_image_uploads" style="width:330px;">
                                                <?php  echo tpl_form_field_image('cover1', $item['cover1'])?>
                                            </div>
                                            <div class="help-inline">（建议尺寸:宽640像素,高960像素或等比图片）</div>
                                        </div>
									</div>
									<div class="control-group js_scene_style js_dim hide" >	
										<label for="" class="control-label">背景图片：</label>
                                        <div class="controls">
                                            <div id="first_dim_image_uploads" style="width:330px;">
                                                <?php  echo tpl_form_field_image('cover2', $item['cover2'])?>
                                            </div>
                                            <div class="help-inline">（建议尺寸:宽640像素,高960像素或等比图片）</div>
                                        </div>
                                    </div>
                                 </div>
                                <!-- 开场画面 第一屏 结束 -->
                              
                                <div class="control-group">
                                    <label for="" class="control-label">背景音乐：</label>
                                    <div class="controls clearfix">
                                        <label class="radio inline"><input type="radio" name="bg_music_switch" value="1" class="js_music_open" <?php  if($item['bg_music_switch']==1) { ?>checked<?php  } ?>/>开启</label>
                                        <label class="radio inline"><input type="radio" name="bg_music_switch" value="2" class="js_music_close" <?php  if($item['bg_music_switch']==2) { ?>checked<?php  } ?>/>关闭</label>
                                    </div>
                                    <div class="controls margin-top10 js_music_div">
                                        <div id="image_upload_" style="width:330px;">
                                            <?php  echo tpl_form_field_audio('bg_music_url', $item['bg_music_url']);?>
                                        </div>
                                        <div class="help-inline">(保证浏览网页的加载速度,上传音乐最大为<span class="red">3MB</span>)</div>
                                    </div>
									 <script>
											/*KindEditor.ready(function(K){
												var editor = KindEditor.editorObj || K.editor({
													themeType: 'simple',
													allowFileManager: true,
													uploadJson : "<?php  echo $this->createWeburl('UploadMusic')?>",
													fileManagerJson : "<?php  echo $this->createWeburl('ManageMusic')?>",
												});
												var image_upload_audio_index = 0;

												K('#image_upload button.addmp3').click(function(e){
													editor.loadPlugin('mp3', function(){
														editor.plugin.imageDialog({
															mp3Url: $(e.target).parent().prev().val(),
															clickFn: function(url, title, width, height, border, align){
																$(e.target).parent().prev().val(url);
																image_upload_audio_index++;
																var mp3_object = $(e.target).parent().prev().prev();
																var audio_object = mp3_object.find('a.audio');
																var  audio_filename = url.match(/[^\/]*$/)[0];
																if(audio_filename.lastIndexOf('.') > -1){
																	audio_filename = audio_filename.substring(0, audio_filename.lastIndexOf('.'));
																}

																if(false && 0 < audio_object.length){
																	audio_object.mb_miniPlayer_changeFile({mp3:url}, audio_filename);
																	audio_object.mb_miniPlayer_play();
																}else{
																	while(0 < $('#mimage_upload_audio_index').length){
																		image_upload_audio_index++;
																	}
																	var linkButton = '<a id="m{1}" class="audio {skin:\'blue\'}" href="{0}">{2}</a> ';
																	mp3_object.html(linkButton.format(url, image_upload_audio_index, audio_filename));
																	mp3_object.find('a.audio').mb_miniPlayer();
																	mp3_object.find('#mp_m1').css({'display':'inline-block', 'vertical-align':'middle'});
																	var index = mp3_object.find('a.audio').attr('id');
																	setTimeout(function(){
																		$('#'+index).mb_miniPlayer_play();
																	}, 1000);
																}

																editor.hideDialog();
															}
														});
													});
												});
											});*/
										</script>
                                </div>
                                <div class="control-group hide">
                                    <label for="wxname" class="control-label">音乐图标及效果：</label>
                                    <div class="controls">
                                       <select name="bg_music_icon" class="input-medium">
                                            <option value="1" <?php  if($item['bg_music_icon']==1) { ?>select="select"<?php  } ?>>音乐旋转效果</option>
                                            <option value="2" <?php  if($item['bg_music_icon']==2) { ?>select="select"<?php  } ?>>音阶效果</option>
                                       </select>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label for="wxname" class="control-label">第三方统计代码：</label>
                                    <div class="controls">
                                        <textarea class="input-xxlarge" rows="4" name="tongji" data-rule-maxlength="900"><?php  echo $item['tongji'];?></textarea>
                                        <span class="help-block">借助第三方统计代码,如百度,量子,51la,chinaz</span>
                                    </div>
                                </div>
                             </div>
                            <div class="form-actions" style="margin-left: 178px;">
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
    $(".js_music_close").on("change",function(){
        $(".js_music_div").toggleClass('hide',$(this).prop("checked"));
    });
    $(".js_music_open").on("change",function(){
        $(".js_music_div").toggleClass('hide',!$(this).prop("checked"));
    });

    $(".js_scene_picture").each(function(){
        var type=$(this).find(".js_scene_style_select option:selected").data("type");
        $(this).find(".js_scene_style").addClass('hide');
        $(this).find(".js_"+type).removeClass('hide');
    });

    $(document).on("change",".js_scene_style_select",function(){
        var $p=$(this).parents(".js_scene_picture"),type=$(this).find("option:selected").data("type");
        $p.find(".js_scene_style").addClass('hide');
        $p.find(".js_"+type).removeClass('hide');
    });


    var resources1 = MulResources.create({//分享跳转
        "id":"res_block1",
        "wuid":262,
        "getbusiness_path":"/plus/ajaxform.php",//业务模块
        "car_path":"/plus/activity.php",//汽车
        "act_path":"/microsite/getactivity",//活动
        "estate_path":"/microsite/getbusiness"//房产
    });
    var inss1 = MulResources.instance['res_block1'];
    inss1.result = inss1.result || {};
    inss1.result.wuid = 262;

 

    var resources3 = MulResources.create({//开场画面
        "id":"res_block3",
        "wuid":262,
        "getbusiness_path":"/plus/ajaxform.php",//业务模块
        "car_path":"/plus/activity.php",//汽车
        "act_path":"/microsite/getactivity",//活动
        "estate_path":"/microsite/getbusiness"//房产
    });
    var inss3 = MulResources.instance['res_block3'];
    inss3.result = inss3.result || {};
    inss3.result.wuid = 262;



    /*单resource 用于显示地图
    var resource = Resource.create({
        "id":"res_block",
        "wuid":262,
        "map":{
            "lng": 116.331398,
            "lat": 39.897445,
            "adr": "北京市丰台区马连道北路"
        },
        "getbusiness_path":"/plus/ajaxform.php",//业务模块
        "car_path":"/plus/activity.php",//汽车
        "act_path":"/microsite/getactivity",//活动
        "estate_path":"/microsite/getbusiness"//房产
    });
    var ins = Resource.instance['res_block'];
    ins.result = ins.result || {};
    ins.result.wuid = 262;
    */
});
     /*KindEditor.ready(function(K){
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
    });*/
 
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
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>