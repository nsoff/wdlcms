<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style type="text/css">
    .changeTheme {
        position: relative;
    }
    .changeTheme:after {
        content: ' ';
        position: absolute;
        display: inline-block;
        display: none;
        width: 28px;
        height: 28px;
        left: 50%;
        top: 50%;
        margin-left: -14px;
        margin-top: -14px;
        background: url(http://ctrl.u.qiniudn.com/loading.gif) center no-repeat;
        background-size: 50%;
        opacity: .78;
    }
    .changeTheme.loading:after {
        display: inline-block;
    }

    .theme_list {
        list-style-type:none;
        overflow:hidden;
    }
    .theme_list li{
        padding-bottom:2em;
        float:left;
        width:20%;
        text-align:center;
        line-height:120%;
        overflow:hidden;
    }
    .theme_list li img{
        width:128px;
        height:174px;
    }
    .theme_list li input{
        vertical-align:top;
    }
</style>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading">
                基本设置
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">版权设置</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" class="form-control" value="<?php  echo $setting['title'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">背景设置</label>
                    <div class="col-sm-9">
                        <label class="radio-inline"><input type="radio" name="bg_setting" id="bg_setting1" value="0" <?php  if($setting['bg_setting']==0 || empty($setting)) { ?>checked<?php  } ?> /> 默认</label>
                        <label class="radio-inline"><input type="radio" name="bg_setting" id="bg_setting2" value="1" <?php  if($setting['bg_setting']==1) { ?>checked<?php  } ?> /> 自定义</label>
                        <div class="help-block"></div>
                    </div>
                </div>
                <div class="form-group setting" style="<?php  if($setting['bg_setting']==0 || empty($setting)) { ?>display: none;<?php  } ?>">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">自定义背景</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('bg_url', $setting['bg_url'])?>
                        <div class="help-block">大图片建议尺寸：640像素 * 1280像素</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">随机背景</label>
                    <div class="col-sm-9">
                        <label class="radio-inline"><input type="radio" name="bg_rand" id="bg_rand1" value="0" <?php  if($setting['bg_rand']==0 || empty($setting)) { ?>checked<?php  } ?> /> 关闭</label>
                        <label class="radio-inline"><input type="radio" name="bg_rand" id="bg_rand2" value="1" <?php  if($setting['bg_rand']==1) { ?>checked<?php  } ?> /> 开启</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9">
                        <input name="submit" type="submit" value="提交" class="btn btn-primary span3">
                        <input type="hidden" name="id" value="<?php  echo $setting['id'];?>" />
                        <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                    </div>
                </div>
                <div>
                    <ul class="theme_list" style="margin-left: 0px;">
                        <?php  if(is_array($theme_array)) { foreach($theme_array as $theme) { ?>
                        <li>
                            <label class="changeTheme">
                                <img src="../addons/weisrc_audio/template/images/bg/<?php  echo $theme;?>" width="100"/>
                                <div style="padding-top: 4px;"><input type="radio" name="bgname" value="<?php  echo $theme;?>" <?php  if($setting['bg']==$theme) { ?>checked<?php  } ?> />
                                    <?php  echo $theme;?>
                                </div>
                            </label>
                        </li>
                        <?php  } } ?>
                    </ul>
                </div>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="./resource/script/kindeditor/kindeditor-min.js"></script>
<script type="text/javascript" src="./resource/script/kindeditor/lang/zh_CN.js"></script>
<link type="text/css" rel="stylesheet" href="./resource/script/kindeditor/themes/default/default.css" />
<script type="text/javascript">
    kindeditor($('.richtext-clone'));
</script>
<script type="text/javascript">
    $(function(){
        $(':radio[name="bg_setting"]').click(function(){
            if(this.checked) {
                if($(this).val() == '1') {
                    $('.setting').show();
                } else {
                    $('.setting').hide();
                }
            }
        });
    });
</script>
<script>
    var editor = KindEditor.editor({
        allowFileManager : true,
        uploadJson : "./index.php?act=attachment&do=upload",
        fileManagerJson : "./index.php?act=attachment&do=manager",
        afterUpload : function(url, data) {
        }
    });
    $("#upload-image-bg_url").click(function() {
        editor.loadPlugin("image", function() {
            editor.plugin.imageDialog({
                tabIndex : 1,
                imageUrl : $("#upload-image-url-bg_url").val(),
                clickFn : function(url) {
                    editor.hideDialog();
                    var val = url;
                    if(url.toLowerCase().indexOf("http://") == -1 && url.toLowerCase().indexOf("https://") == -1) {
                        var filename = /images(.*)/.exec(url);
                        if(filename && filename[0]) {
                            val = filename[0];
                        }
                    }
                    $("#upload-image-url-bg_url-old").val($("#upload-image-url-bg_url").val());
                    $("#upload-image-url-bg_url").val(val);
                    $("#upload-image-preview-bg_url").html('<img src="'+url+'" width="200px;" />');
                }
            });
        });
    });
</script>
<script>
(function() {
    $(document).ready(function() {
        var themeid = "bg1.jpg";
        $('.changeTheme').click(function(e) {
            e.preventDefault();
            var thisInput = $(this).find('input');
            var selectedTheme = thisInput.val();
            var _this = $(this);
            var _preview = $('#preview');
            if(selectedTheme != themeid) {
                $.ajax({
                    type: 'post',
                    url: "<?php  echo $this->createWebUrl('setting')?>",
                    data: {"bgname": selectedTheme},
                    beforeSend: function() {
                        _this.toggleClass('loading');
                    },
                    success: function(res) {
                        thisInput.attr("checked", "y");
                        themeid = selectedTheme;
                        _this.toggleClass('loading');
                    }
                });
            }
        });
    });
}).call(this);
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
