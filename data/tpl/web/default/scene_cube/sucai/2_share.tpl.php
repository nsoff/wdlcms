<?php defined('IN_IA') or exit('Access Denied');?><div class="control-group js_scene_style js_share hide">

    <div class="control-group">
        <label for="" class="control-label">按钮图片：</label>
        <div class="controls">
            <div id="btn_img_image_uploads" style="width:330px;">
                <?php  echo tpl_form_field_image('share[btnimg]', $data['btnimg'])?>
            </div>
        </div>
    </div>

    <div class="control-group">
        <label for="" class="control-label">分享图片：</label>
        <div class="controls">
            <div id="share_image_uploads" style="width:330px;">
                <?php  echo tpl_form_field_image('share[share_thumb]', $data['share_thumb'])?>
            </div>
        </div>
    </div>
</div>