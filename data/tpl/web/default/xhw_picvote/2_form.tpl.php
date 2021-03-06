<?php defined('IN_IA') or exit('Access Denied');?><div class="panel panel-default">
    <div class="panel-heading">选择要关联的项目</div>
	<div class="panel-body">
		<div class="form-group">
	<label class="col-xs-10 col-sm-3 col-md-3 control-label">活动项目</label>
							<div class="col-xs-12 col-sm-9 col-md-8 col-lg-8">
								<select class="form-control" name="activity" id="activity">
									<?php  if(is_array($activity)) { foreach($activity as $row) { ?>
									<option value="<?php  echo $row['id'];?>" data-name="<?php  echo $row['title'];?>"><?php  echo $row['title'];?></option>
									<?php  } } ?>
								</select>
							</div>
						</div>
	
	<div class="form-group">
            <label class="col-xs-10 col-sm-3 col-md-3 control-label">活动时间</label>
            <div class="col-sm-9 col-xs-12">
    <?php echo tpl_form_field_daterange('datelimit', array('starttime'=>date('Y-m-d H:i:s',$activity['0']['starttime']?$activity['0']['starttime']:time()),'endtime'=>date('Y-m-d H:i:s',$activity['0']['endtime']?$activity['0']['endtime']:time())),true)?>
    <div class="help-block">投票只能在活动开始后、活动结束前进行，投稿可以在任意时间内进行。</div>
            </div>
        </div>

        </div>
</div>
