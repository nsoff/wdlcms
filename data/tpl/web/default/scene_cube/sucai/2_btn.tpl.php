<?php defined('IN_IA') or exit('Access Denied');?><div class="js_scene_style js_btn hide">
 	<div class="control-group">    
		<label for="" class="control-label">按钮图片：</label>
		<div class="margin-top10 controls">
            <div id="btn_img_image_uploads" style="width:330px;">
                <?php  echo tpl_form_field_image('btn[btnimg]', $data['btnimg'])?>
            </div>
		</div>
	</div>
	<div class="control-group">
		<label for="" class="control-label">链接：</label>
		<div class="controls">
			<input type="text" class="input-xlarge" name="btn[url]" value="<?php  echo $data['url'];?>" placeholder="请输入链接地址" data-rule-required="true" data-rule-url="true"/>
			<span class="help-block">链接地址：http://</span>
		</div>
	</div>
</div>