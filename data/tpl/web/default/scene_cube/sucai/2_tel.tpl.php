<?php defined('IN_IA') or exit('Access Denied');?><div class="js_scene_style js_tel hide">
 	<div class="control-group">    
		<label for="" class="control-label">按钮图片：</label>
		<div class="margin-top10 controls">
            <div id="btn_img_image_uploads" style="width:330px;">
                <?php  echo tpl_form_field_image('tel[btnimg]', $data['btnimg'])?>
            </div>
		</div>
	</div>
	<div class="control-group">
		<label for="" class="control-label">电话：</label>
		<div class="controls">
			<input type="text" class="input-xlarge" name="tel[tel]" value="<?php  echo $data['tel'];?>" placeholder="请输入电话号码" data-rule-required="true" data-rule-phone="true"/>
			<span class="help-block">请填写真实的电话号码</span>
		</div>
	</div>
</div>