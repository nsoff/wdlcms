<?php defined('IN_IA') or exit('Access Denied');?><div class='voteitem'>
    <input name="option_title[]" type="text" class="form-control item_title" value="<?php  echo $o['title'];?>" placeholder="选项标题"/>
    <input name="option_id[]" type="hidden" value="<?php  echo $o['id'];?>"/>
    <div class="<?php  if($o['type']!='image') { ?>hide<?php  } ?> item-image" style='margin-top:5px;width:225px;'>
        <?php  load()->func('tpl')?><?php  echo tpl_form_field_image("option_thumb_".$o['id'],$o['thumb'])?>
    </div>
    <div style='margin-top:5px;width:225px;float:left;'>
        <a href="javascript:;" onclick="deleteItem(this)" style="margin-top:10px;"  title="删除">删除投票项 <i class='icon-remove'></i></a>
    </div>
</div>