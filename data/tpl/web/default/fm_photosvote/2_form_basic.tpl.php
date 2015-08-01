<?php defined('IN_IA') or exit('Access Denied');?>		
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">活动状态</label>
			<div class="col-sm-8">					
				<label class="radio-inline">
                	<input type="radio" name="status" value="1" <?php  if($reply['status'] == 1) { ?> checked="checked"<?php  } ?>/>开始活动
                </label>
                <label class="radio-inline">
                	<input type="radio" name="status" value="0" <?php  if($reply['status'] == 0) { ?> checked="checked"<?php  } ?>/>关闭活动（前台显示为暂停）
                </label>
				
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">活动标题</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="title" value="<?php  echo $reply['title'];?>" />
			</div>
		</div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动时间</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_daterange('datelimit', array('start'=>date('Y-m-d H:i',$reply['start_time']),'end'=>date('Y-m-d H:i',$reply['end_time'])), true)?>
			<div class="help-block">活动时间要包含投票时间和报名时间</div>
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 投票时间</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_daterange('tdatelimit', array('start'=>date('Y-m-d H:i',$reply['tstart_time']),'end'=>date('Y-m-d H:i',$reply['tend_time'])), true)?>
				<div class="help-block">投票时间必须在活动时间内</div>
            </div>
        </div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">投票未开始提示语</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="ttipstart" value="<?php  echo $reply['ttipstart'];?>" />
			<div class="help-block">此设置用于投票未开始提示语</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">投票已结束提示语</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="ttipend" value="<?php  echo $reply['ttipend'];?>" />
			<div class="help-block">此设置用于投票已结束提示语</div>
			</div>
		</div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 报名时间</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_daterange('bdatelimit', array('start'=>date('Y-m-d H:i',$reply['bstart_time']),'end'=>date('Y-m-d H:i',$reply['bend_time'])), true)?>
				<div class="help-block">报名时间必须在活动时间内</div>
            </div>
        </div>
		
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">报名未开始提示语</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="btipstart" value="<?php  echo $reply['btipstart'];?>" />
			<div class="help-block">此设置用于报名未开始提示语</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">报名已结束提示语</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="btipend" value="<?php  echo $reply['btipend'];?>" />
			<div class="help-block">此设置用于报名已结束提示语</div>
			</div>
		</div>
		<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2  control-label">缩略图</label>
					<div class="col-sm-8">
						<?php  echo tpl_form_field_image('picture', $reply['picture'])?>
					<div class="help-block">大图片建议尺寸：900像素 * 500像素</div>
					</div>
					
				</div>
				
				
				
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">活动简介</label>
			<div class="col-sm-8">
				
				<textarea style="height:60px;" id='description' name="description" class="form-control" cols="60"><?php  echo $reply['description'];?></textarea>
				<div class="help-block">用于图文显示的简介和活动首页的简单说明</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">活动详情</label>
			<div class="col-sm-8">
				<textarea name="content" style="height:200px; " class="form-control richtext" cols="70" rows="100"><?php  echo $reply['content'];?></textarea>				
				<div class="help-block">活动详细说明</div>
			</div>
		</div>
		<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2  control-label">活动暂停图片</label>
					<div class="col-sm-8">
						<?php  echo tpl_form_field_image('nostart', $reply['nostart']);?>
						
						<div class="help-block">活动暂停图片背景图片</div>
					</div>
				</div>
		<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2  control-label">活动未开始图片</label>
					<div class="col-sm-8">
						<?php  echo tpl_form_field_image('stopping', $reply['stopping']);?>
					<div class="help-block">活动未开始图片背景图片</div>
					</div>
				</div>
		<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2  control-label">活动已结束图片</label>
					<div class="col-sm-8">
						<?php  echo tpl_form_field_image('end', $reply['end']);?>
					<div class="help-block">活动已结束图片背景图片</div>
					</div>
				</div>