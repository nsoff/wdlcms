<?php defined('IN_IA') or exit('Access Denied');?><input type="hidden" name="reply_id" value="<?php  echo $reply['id'];?>" />
<?php  load()->func('tpl')?>
<div class="panel panel-default">
    <div class="panel-heading">
        贺卡回复设置
    </div>
    <div class="panel-body">
    <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">标题</label>
            <div class="col-sm-9 col-xs-12">
                <input type="text" value="<?php  echo $reply['title'];?>" class="form-control" name="title">
            </div>
        </div>
 <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">图片</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_image('picture',$reply['picture']);?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">图文简介</label>
            <div class="col-sm-9 col-xs-12">
               	<textarea style="height:60px;" id='description' name="description" class="form-control" cols="60"><?php  echo $reply['description'];?></textarea>
            </div>
        </div>
    </div>
</div>
