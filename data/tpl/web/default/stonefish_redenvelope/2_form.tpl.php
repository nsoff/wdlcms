<?php defined('IN_IA') or exit('Access Denied');?><input type="hidden" name="reply_id" value="<?php  echo $reply['id'];?>" />
<?php  if($reply['id']) { ?>
<div class="panel panel-default">
    <div class="panel-heading">
        活动数据
    </div>
	<div class="panel-body">
	<div class="row-fluid">
    	<div class="span8 control-group">
			<a class="btn btn-default" href="<?php  echo $this->createWebUrl('fanslist',array('name'=>'bigwheel', 'rid' => $rid));?>">参与粉丝</a>
			<?php  if($reply['envelope']==0) { ?><a class="btn btn-default" href="<?php  echo $this->createWebUrl('awardlist',array('rid' => $rid));?>">中奖名单</a><?php  } ?>
			<?php  if($reply['envelope']==1) { ?><a class="btn btn-default" href="<?php  echo $this->createWebUrl('tixianlist',array('rid' => $rid));?>">提现记录</a><?php  } ?>
			<?php  if($stonefish_branch) { ?><a class="btn btn-default" href="<?php  echo $this->createWebUrl('branch',array('rid' => $rid));?>">商家赠送项</a><?php  } ?>
        </div>
    </div>
    </div>
</div>
<?php  } ?>
<div class="panel panel-default">
    <div class="panel-heading">
        活动设置
    </div>
    <div class="panel-body">        
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动名称</label>
            <div class="col-sm-9 col-xs-12">
               	<input type="text" id="title" class="form-control" placeholder="" name="title" value="<?php  echo $reply['title'];?>">
            </div>
        </div>
 		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动图片</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_image('start_picurl',$reply['start_picurl']);?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动说明</label>
            <div class="col-sm-9 col-xs-12">
               	<textarea style="height:60px;" id='description' name="description" class="form-control" cols="60"><?php  echo $reply['description'];?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动时间</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_daterange('datelimit', array('start'=>date('Y-m-d H:i',$reply['starttime']),'end'=>date('Y-m-d H:i',$reply['endtime'])), true)?>
            </div>
        </div>        
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">版权信息</label>
            <div class="col-sm-9 col-xs-12">
                    <input type="text" id="copyright" class="form-control" placeholder="" name="copyright" value="<?php  echo $reply['copyright'];?>">
		<div class="help-block">版权信息，如果不填写，默认为公众号名称！</div>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        活动结束设置
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 结束标题</label>
            <div class="col-sm-9 col-xs-12">
               	<input type="text" id="end_theme" class="form-control" placeholder="" name="end_theme" value="<?php  echo $reply['end_theme'];?>">
            </div>
        </div>
 		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 结束图片</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_image('end_picurl',$reply['end_picurl']);?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 结束说明</label>
            <div class="col-sm-9 col-xs-12">
               	<textarea style="height:60px;" id='end_instruction' name="end_instruction" class="form-control" cols="60"><?php  echo $reply['end_instruction'];?></textarea>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        活动详细设置
    </div>
    <div class="panel-body">        
		<div class="form-group">
 			<label class="col-xs-12 col-sm-3 col-md-2 control-label"> 抢红包类型</label>
            <div class="col-sm-9 col-xs-6">
               	<div class="input-group">
					<label for="envelope1" class="radio-inline">
					    <input type="radio" name="envelope" value="0" id="envelope1" <?php  if(empty($reply) || $reply['envelope'] == 0) { ?>checked="true"<?php  } ?> onclick="$('#award').show();$('#award_times').show();$('#award_tixian').hide();"/> 实物奖品
					</label>
					<label for="envelope2" class="radio-inline">
					    <input type="radio" name="envelope" value="1" id="envelope2" <?php  if(empty($reply) || $reply['envelope'] == 1) { ?>checked="true"<?php  } ?> onclick="$('#award').hide();$('#award_times').hide();$('#award_tixian').show();"/> 现金红包
					</label>
				</div>				
            </div>
        </div>				
		<div class="form-group" id="award_times"<?php  if($reply['envelope'] == 1) { ?> style="display:none"<?php  } ?>>
 			<label class="col-xs-12 col-sm-3 col-md-2 control-label">每人最多获奖个数</label>
            <div class="col-sm-9 col-xs-6">
               	<div class="input-group">
					<span class="input-group-addon">参与者最多获奖</span>
					<input type="text" class="form-control" name="award_times" value="<?php  echo $reply['award_times'];?>" />
					<span class="input-group-addon">个,  0为不限制，推荐设置为1次!</span>
				</div>
            </div>
        </div>
		<div class="form-group" id="award_tixian"<?php  if($reply['envelope'] == 0) { ?> style="display:none"<?php  } ?>>
 			<label class="col-xs-12 col-sm-3 col-md-2 control-label">现金红包提现限制</label>
            <div class="col-sm-9 col-xs-6">
               	<div class="input-group">
					<span class="input-group-addon">参与者红包最少</span>
					<input type="text" class="form-control" name="tixianlimit" value="<?php  echo $reply['tixianlimit'];?>" />
					<span class="input-group-addon">最才可以提现</span>
				</div>
            </div>
        </div>
		<div class="form-group">
 			<label class="col-xs-12 col-sm-3 col-md-2 control-label">领取红包选项</label>
            <div class="col-sm-9 col-xs-6">
               	<div class="input-group">
					<label for="opportunity1" class="radio-inline"><input type="radio" name="opportunity" value="0" id="opportunity1" <?php  if(empty($reply) || $reply['opportunity'] == 0) { ?>checked="true"<?php  } ?> onclick="<?php  if($stonefish_branch) { ?>$('#opportunity_text').hide();<?php  } ?>$('#number_times').show();$('#credit').hide();"/> 活动设置</label>&nbsp;&nbsp;&nbsp;
					<?php  if($stonefish_branch) { ?><label for="opportunity2" class="radio-inline"><input type="radio" name="opportunity" value="1" id="opportunity2" <?php  if(!empty($reply) && $reply['opportunity'] == 1) { ?>checked="true"<?php  } ?> onclick="$('#opportunity_text').show();$('#number_times').hide();$('#credit').hide();"/> 商户赠送</label>&nbsp;&nbsp;&nbsp;<?php  } ?>
					<label for="opportunity3" class="radio-inline"><input type="radio" name="opportunity" value="2" id="opportunity3" <?php  if(!empty($reply) && $reply['opportunity'] == 2) { ?>checked="true"<?php  } ?> onclick="<?php  if($stonefish_branch) { ?>$('#opportunity_text').hide();<?php  } ?>$('#number_times').hide();$('#credit').show();"/> 积分购买</label>
				</div>				
            </div>
        </div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">最高金额限制</label>
			<div class="col-sm-9 col-xs-12">
				<div class="input-group">
					<span class="input-group-addon">粉丝领取红包最多达到</span>
					<input type="text" class="form-control" placeholder="最高金额" name="incomelimit" value="<?php  echo $reply['incomelimit'];?>" />
					<span class="input-group-addon">金额, 系统自动停止为其增加金额</span>
				</div>				
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">初始金额</label>
			<div class="col-sm-9 col-xs-12">
				<div class="input-group">
					<span class="input-group-addon">系统随机增送初始</span>
					<input type="text" class="form-control" name="inpointstart" id="inpointstart" value="<?php  echo $reply['inpointstart'];?>" />
					<span class="input-group-addon" style="border-left:0px;border-right:0px;">至</span>
					<input type="text" class="form-control" name="inpointend" id="inpointend" value="<?php  echo $reply['inpointend'];?>" />
					<span class="input-group-addon">金额分配领取红包</span>
				</div>
			</div>
		</div>
		<?php  if($stonefish_branch) { ?>
		<div class="form-group" id="opportunity_text"<?php  if(!empty($reply) && $reply['opportunity'] == 1) { ?> style="display:block"<?php  } else { ?> style="display:none"<?php  } ?>>
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">商家赠送</label>
            <div class="col-sm-9 col-xs-12">
               	<textarea style="height:60px;" id='opportunity_txt' name="opportunity_txt" class="form-control richtext2" cols="60"><?php  echo $reply['opportunity_txt'];?></textarea>
            </div>
        </div>
        <?php  } ?>		
		<div class="form-group" id="credit"<?php  if(!empty($reply) && $reply['opportunity'] == 2) { ?> style="display:block"<?php  } else { ?> style="display:none"<?php  } ?>>
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">积分购买</label>
            <div class="col-sm-9 col-xs-6">
               	<div class="input-group">
					<span class="input-group-addon">每</span>
					<input type="text" class="form-control" name="credit_times" id="credit_times" value="<?php  echo $reply['credit_times'];?>" />
					<span class="input-group-addon" style="border-left:0px;border-right:0px;">个</span>
					<select name="credit_type" class="form-control">
						<?php  if(is_array($creditnames)) { foreach($creditnames as $key => $credit) { ?>
						<option value="<?php  echo $key;?>" <?php  if($key == $reply['credit_type']) { ?>selected<?php  } ?>><?php  echo $credit;?></option>
						<?php  } } ?>
					</select>
					<span class="input-group-addon">购买红包</span>
				</div>
            </div>
        </div>		
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">好友翻牌小提示</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="fanpaitip" class="form-control" value="<?php  echo $reply['fanpaitip'];?>" />
				<span class="help-block">手机好友翻牌下面小提示 </span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">中奖小提示说明</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="awardtip" class="form-control" value="<?php  echo $reply['awardtip'];?>" />
				<span class="help-block">中奖页下发提示 </span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">活动人数限制</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="countlimit" class="form-control" value="<?php  echo $reply['countlimit'];?>" />
				<span class="help-block">活动人数限制 </span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">抽奖卡片吧背景图片</label>
			<div class="col-sm-9 col-xs-12">
				<?php  echo tpl_form_field_image('cardbg',$reply['cardbg']);?>
				<span class="help-block"><font>建议(宽高150*210)</font></span>
			</div>
		</div>		
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">邀请好友攒钱文字:</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="sharebtn" class="form-control" value="<?php  echo $reply['sharebtn'];?>" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">好友帮助邀请攒钱文字:</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="fsharebtn" class="form-control" value="<?php  echo $reply['fsharebtn'];?>" />
			</div>
		</div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        助力规则设置
    </div>
    <div class="panel-body">
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">助力限制类型</label>
			<div class="col-sm-9 col-xs-12">
				<label for="limitType0" class="radio-inline"><input type="radio" id="limitType0" name="limittype" value="0" <?php  if($reply['limittype'] == 0) { ?>checked="checked"<?php  } ?> onclick="$('#totallimit').hide();">限制一次</label>
				<label for="limitType1" class="radio-inline"><input type="radio" id="limitType1" name="limittype" value="1" <?php  if($reply['limittype'] == 1) { ?>checked="checked"<?php  } ?> onclick="$('#totallimit').show();">每天一次</label>
			</div>
		</div>
		<div class="form-group" id="totallimit"<?php  if($reply['limittype'] == 0) { ?> style="display:none"<?php  } ?>>
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">每个好友总助力次数限制</label>
			<div class="col-sm-9 col-xs-12">
				<div class="input-group">
					<span class="input-group-addon">每个好友最多助力</span>
					<input type="text" name="totallimit" class="form-control" value="<?php  echo $reply['totallimit'];?>" />
					<span class="input-group-addon">次</span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">助力金额</label>
			<div class="col-sm-9 col-xs-12">
               	<div class="input-group">
					<span class="input-group-addon">系统随机增送用户</span>
					<input type="text" class="form-control" name="randompointstart" id="randompointstart" value="<?php  echo $reply['randompointstart'];?>" />
					<span class="input-group-addon" style="border-left:0px;border-right:0px;">至</span>
					<input type="text" class="form-control" name="randompointend" id="randompointend" value="<?php  echo $reply['randompointend'];?>" />
					<span class="input-group-addon">金额</span>
				</div>
            </div>
		</div>		
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">增加金额概率</label>
			<div class="col-sm-9 col-xs-12">
				<div class="input-group">
					<span class="input-group-addon">好友助力成功概率</span>					
					<input type="text" class="form-control" name="addp" id="addp" value="<?php  echo $reply['addp'];?>" />
					<span class="input-group-addon">%(0-100)</span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="panel panel-default" id="award"<?php  if($reply['envelope'] == 1) { ?> style="display:none"<?php  } ?>>
	<div class="panel-heading">
		奖品信息
	</div>
	<div class="panel-body">
		<?php  if($prize) { ?>
			<?php  if(is_array($prize)) { foreach($prize as $item) { ?>
			<div>
			<input type="hidden" name="prize_id[<?php  echo $item['id'];?>]" value="<?php  echo $item['id'];?>" />
            <div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">奖品类别</label>
                <div class="col-sm-3">
                    <input class="form-control" type="text" value="<?php  echo $item['prizetype'];?>" name="prizetype[<?php  echo $item['id'];?>]">
                </div>
				<label class="col-xs-12 col-sm-2 col-md-2 control-label">奖品名称</label>
                <div class="col-sm-4">
                    <input class="form-control" type="text" value="<?php  echo $item['prizename'];?>" name="prizename[<?php  echo $item['id'];?>]">
                </div>
            </div>			
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">奖品数量</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input class="form-control" type="text" value="<?php  echo $item['prizetotal'];?>" name="prizetotal[<?php  echo $item['id'];?>]">
                        <span class="input-group-addon">份</span>
                    </div>
                </div>
				<label class="col-xs-12 col-sm-2 col-md-2 control-label">奖品价值</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <input class="form-control" type="text" value="<?php  echo $item['point'];?>" name="point[<?php  echo $item['id'];?>]">
                        <span class="input-group-addon">金额</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">奖品图片</label>
                <div class="col-sm-9">
				    <?php  echo tpl_form_field_image('prizepic['.$item['id'].']',$item['prizepic']);?>
					<div class="help-block">奖品显示图片 图片大小418px X 418px</div>
				</div>
            </div>
			<hr/>
			</div>
			<?php  } } ?>		
		<?php  } ?>
		<div id="jiangpin" style="display: none">
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">奖品类别</label>
                <div class="col-sm-3">
                    <input class="form-control" type="text" value="" name="prizetype_new[]">
                </div>
				<label class="col-xs-12 col-sm-2 col-md-2 control-label">奖品名称</label>
                <div class="col-sm-4">
                    <input class="form-control" type="text" value="" name="prizename_new[]">
                </div>
            </div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 control-label">奖品数量</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input class="form-control" type="text" value="" name="prizetotal_new[]">
                        <span class="input-group-addon">份</span>
                    </div>
                </div>
				<label class="col-xs-12 col-sm-2 col-md-2 control-label">奖品价值</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <input class="form-control" type="text" value="" name="point_new[]">
                        <span class="input-group-addon">金额</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">奖品图片</label>
                <div class="col-sm-9">
					<?php  echo tpl_form_field_image('prizepic_new[]','');?>
					<div class="help-block">奖品显示图片 图片大小418px X 418px</div>
				</div>
            </div>
		</div>
		<?php  if(empty($prize)) { ?>
		<div>
            <div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">奖品类别</label>
                <div class="col-sm-3">
                    <input class="form-control" type="text" value="" name="prizetype_new[]">
                </div>
				<label class="col-xs-12 col-sm-2 col-md-2 control-label">奖品名称</label>
                <div class="col-sm-4">
                    <input class="form-control" type="text" value="" name="prizename_new[]">
                </div>
            </div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 control-label">奖品数量</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input class="form-control" type="text" value="" name="prizetotal_new[]">
                        <span class="input-group-addon">份</span>
                    </div>
                </div>
				<label class="col-xs-12 col-sm-2 col-md-2 control-label">奖品价值</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <input class="form-control" type="text" value="" name="point_new[]">
                        <span class="input-group-addon">金额</span>
                    </div>
                </div>							
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">奖品图片</label>
                <div class="col-sm-9">
					<?php  echo tpl_form_field_image('prizepic_new[]','');?>
					<div class="help-block">奖品显示图片 图片大小418px X 418px</div>
				</div>
            </div>
			<hr/>
		</div>
		<?php  } ?>
		<span id="award_insert_flag" style="display: none"></span>
		<div class="form-group">
		    <div class="col-sm-5"></div>
			<div class="col-sm-7">
				<button id="btn_add_award" type="button" class="btn btn-warning">
					<span class="glyphicon glyphicon-plus"></span> 添加奖品
				</button>
			</div>
		</div>
	</div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        活动样式设置
    </div>
    <div class="panel-body">
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动页顶部广告图</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_image('adpic',$reply['adpic']);?>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"> 广告图链接</label>
            <div class="col-sm-9 col-xs-12">
				<?php  echo tpl_form_field_link('adpicurl',$reply['adpicurl']);?>
				<div class="help-block">广告图链接必需填写完整的URL地址如：http://www.baidu.com</div>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">背景颜色</label>
            <div class="col-sm-9 col-xs-12">
               	<?php echo tpl_form_field_color('bgcolor',empty($reply['bgcolor'])?'#ca1a48':$reply['bgcolor']);?>
				<span class="help-block">页面背景颜色</span>
            </div>
        </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">文字颜色</label>
            <div class="col-sm-9 col-xs-12">
               	<?php echo tpl_form_field_color('fontcolor',empty($reply['fontcolor'])?'#fff':$reply['fontcolor']);?>
                <span class="help-block">页面文字颜色</span>
            </div>
        </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">按钮颜色</label>
            <div class="col-sm-9 col-xs-12">
               	<?php echo tpl_form_field_color('btncolor',empty($reply['btncolor'])?'#f2cb0e':$reply['btncolor']);?>
            </div>
        </div>        
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">按钮文字颜色</label>
            <div class="col-sm-9 col-xs-12">
               	<?php echo tpl_form_field_color('btnfontcolor',empty($reply['btnfontcolor'])?'#333':$reply['btnfontcolor']);?>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">提现按钮颜色</label>
            <div class="col-sm-9 col-xs-12">
               	<?php echo tpl_form_field_color('txcolor',empty($reply['txcolor'])?'#333':$reply['txcolor']);?>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">提现文字颜色</label>
            <div class="col-sm-9 col-xs-12">
               	<?php echo tpl_form_field_color('txfontcolor',empty($reply['txfontcolor'])?'#333':$reply['txfontcolor']);?>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">规则框背景颜色</label>
            <div class="col-sm-9 col-xs-12">
               	<?php echo tpl_form_field_color('rulebgcolor',empty($reply['rulebgcolor'])?'#333':$reply['rulebgcolor']);?>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        活动显示设置
    </div>
    <div class="panel-body">
        <div class="form-group">
 			<label class="col-xs-12 col-sm-3 col-md-2 control-label">首页滚动中奖人数</label>
            <div class="col-sm-9 col-xs-6">
				<div class="input-group">
					<span class="input-group-addon">首页显示</span>
					<input type="text" class="form-control" name="awardnum" value="<?php  echo $reply['awardnum'];?>" />
					<span class="input-group-addon">位中奖粉丝 滚动显示  0为不显示中奖信息</span>
				</div>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>显示奖品数量</label>
            <div class="col-sm-9 col-xs-12">
               	<label class="radio-inline">
                	<input type="radio" name="show_num" value="0" <?php  if($reply['show_num'] == 0) { ?> checked="checked"<?php  } ?>/>不显示
                </label>
                <label class="radio-inline">
                	<input type="radio" name="show_num" value="1" <?php  if($reply['show_num'] == 1) { ?> checked="checked"<?php  } ?>/>仅显示奖品
                </label>
				<label class="radio-inline">
                	<input type="radio" name="show_num" value="2" <?php  if($reply['show_num'] == 2) { ?> checked="checked"<?php  } ?>/>显示奖品以及数量
                </label>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">奖品详细介绍</label>
            <div class="col-sm-9 col-xs-12">
               	<textarea style=" height:200px;" id='award_info' name="award_info" class="form-control richtextinfo"><?php  echo $reply['award_info'];?></textarea>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"> 秒显广告时间</label>
            <div class="col-sm-9 col-xs-12">
               	<div class="input-group">
					<span class="input-group-addon">首页显示</span>
					<input type="text" class="form-control" name="homepictime" value="<?php  echo $reply['homepictime'];?>" />
					<span class="input-group-addon">秒广告图    0秒为不显示</span>
				</div>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">秒显广告图</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_image('homepic',$reply['homepic']);?>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"> 虚拟人数显示</label>
            <div class="col-sm-9 col-xs-12">
               	<div class="input-group">
					<span class="input-group-addon">首页显示</span>
					<input type="text" class="form-control" name="xuninum" value="<?php  echo $reply['xuninum'];?>" />
					<span class="input-group-addon">位虚拟人数+真实参与人数　此数值随下面设置自动变化</span>
				</div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"> 虚拟人数设置</label>
            <div class="col-sm-9 col-xs-12">
               	<div class="input-group">
					<span class="input-group-addon">每次间隔</span>
                    <input type="text" class="form-control" name="xuninumtime" id="xuninumtime" value="<?php  echo $reply['xuninumtime'];?>" />
                    <span class="input-group-addon" style="border-left:0px;border-right:0px;">秒　系统自动增加</span>
					<input type="text" class="form-control" name="xuninuminitial" id="xuninuminitial" value="<?php  echo $reply['xuninuminitial'];?>" />
					<span class="input-group-addon" style="border-left:0px;border-right:0px;">至</span>
					<input type="text" class="form-control" name="xuninumending" id="xuninumending" value="<?php  echo $reply['xuninumending'];?>" />
					<span class="input-group-addon">名虚拟人参与本活动</span>
				</div>
            </div>
        </div>
		<div class="form-group">
 			<label class="col-xs-12 col-sm-3 col-md-2 control-label">兑奖输入项提示词</label>
            <div class="col-sm-9 col-xs-6">
				<input type="text" class="form-control" name="ticketinfo" value="<?php  echo $reply['ticketinfo'];?>" />
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"> 兑奖输入参数项</label>
            <div class="col-sm-9 col-xs-12">
				<div style="border:1px #eee dashed; padding:10px;background:#F5F5F5;">					
               	    <label for="isrealname" class="checkbox-inline"><input id="isrealname" type="checkbox" name="isrealname" value="1" <?php  if($reply['isrealname'] == 1) { ?>checked="checked"<?php  } ?>> 姓名</label>
				    <label for="ismobile" class="checkbox-inline"><input id="ismobile" type="checkbox" name="ismobile" value="1" <?php  if($reply['ismobile'] == 1) { ?>checked="checked"<?php  } ?>> 手机</label>
				    <label for="isqq" class="checkbox-inline"><input id="isqq" type="checkbox" name="isqq" value="1" <?php  if($reply['isqq'] == 1) { ?>checked="checked"<?php  } ?>> QQ号</label>
				    <label for="isemail" class="checkbox-inline"><input id="isemail" type="checkbox" name="isemail" value="1" <?php  if($reply['isemail'] == 1) { ?>checked="checked"<?php  } ?>> 邮箱</label>
				    <label for="isaddress" class="checkbox-inline"><input id="isaddress" type="checkbox" name="isaddress" value="1" <?php  if($reply['isaddress'] == 1) { ?>checked="checked"<?php  } ?>> 地址</label>
					<label for="isgender" class="checkbox-inline"><input id="isgender" type="checkbox" name="isgender" value="1" <?php  if($reply['isgender'] == 1) { ?>checked="checked"<?php  } ?>> 性别</label>
					<label for="istelephone" class="checkbox-inline"><input id="istelephone" type="checkbox" name="istelephone" value="1" <?php  if($reply['istelephone'] == 1) { ?>checked="checked"<?php  } ?>> 固话</label>
					<label for="isidcard" class="checkbox-inline"><input id="isidcard" type="checkbox" name="isidcard" value="1" <?php  if($reply['isidcard'] == 1) { ?>checked="checked"<?php  } ?>> 证件</label>
					<label for="iscompany" class="checkbox-inline"><input id="iscompany" type="checkbox" name="iscompany" value="1" <?php  if($reply['iscompany'] == 1) { ?>checked="checked"<?php  } ?>> 公司</label>
					<label for="isoccupation" class="checkbox-inline"><input id="isoccupation" type="checkbox" name="isoccupation" value="1" <?php  if($reply['isoccupation'] == 1) { ?>checked="checked"<?php  } ?>> 职业</label>
					<label for="isposition" class="checkbox-inline"><input id="isposition" type="checkbox" name="isposition" value="1" <?php  if($reply['isposition'] == 1) { ?>checked="checked"<?php  } ?>> 职位</label>
					</div>
					<div class="help-block">必需选择一个参数兑奖 活动开启后最好不要修改 请谨慎选择 重命显示请修改下面的参数</div>
            </div>
        </div>
		<div class="form-group">
 			<label class="col-xs-12 col-sm-3 col-md-2 control-label">兑奖输入参数重命名</label>
            <div class="col-sm-9 col-xs-6">
				<input type="text" class="form-control" name="isfansname" value="<?php  echo $reply['isfansname'];?>" />
				<div class="help-block">与上面的参数一一对应，请直接修改不要改变','这个字符</div>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"> 兑奖输入参数同步</label>
            <div class="col-sm-9 col-xs-12">
				<label for="isfans_0" class="radio-inline"><input id="isfans_0" type="radio" name="isfans" value="0" <?php  if($reply['isfans'] == 0) { ?>checked="checked"<?php  } ?>> 参数项只保留本模块下</label>
				<label for="isfans_1" class="radio-inline"><input id="isfans_1" type="radio" name="isfans" value="1"  <?php  if($reply['isfans'] == 1) { ?>checked="checked"<?php  } ?>> 参数项同步更新至官方会员信息表中</label>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <?php  if($ids_num>1) { ?>多子公众号分享设置<?php  } else { ?>分享设置<?php  } ?>
    </div>
    <div class="panel-body table-responsive">
		<?php  if($ids_num>1) { ?>
		<!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <?php  if(is_array($ids)) { foreach($ids as $idsname) { ?>
			<li role="presentation"<?php  if($idsname==$one) { ?> class="active"<?php  } ?>>
                <a href="#acid<?php  echo $idsname;?>" role="tab" data-toggle="tab"><?php  echo $acid_arr[$idsname]['name'];?></a>
            </li>
			<?php  } } ?>
        </ul>
		<!-- Tab panes -->
		<?php  } ?>
        <div class="tab-content">
			<?php  if(is_array($share)) { foreach($share as $shares) { ?>
			<input type="hidden" name="acid_<?php  echo $shares['acid'];?>" value="<?php  echo $shares['id'];?>"/>
            <div role="tabpanel" class="tab-pane<?php  if($shares['acid']==$one) { ?> active<?php  } ?>" id="acid<?php  echo $shares['acid'];?>">
			<?php  if($ids_num>1) { ?>
			<div class="form-group">
 			    <label class="col-xs-12 col-sm-3 col-md-2 control-label">默认显示分享信息</label>
                <div class="col-sm-9 col-xs-6">
               	    <div class="input-group">
					    <label for="share_acid<?php  echo $shares['acid'];?>" class="radio-inline"><input type="radio" name="share_acid" value="<?php  echo $shares['acid'];?>" id="share_acid<?php  echo $shares['acid'];?>" <?php  if($reply['share_acid'] == $shares['acid']) { ?>checked="true"<?php  } ?> /> 设置 <strong><?php  echo $acid_arr[$shares['acid']]['name'];?></strong> 为默认分享显示 <?php  if($acid_arr[$shares['acid']]['level']==2) { ?> <strong><font color=red>推荐</font></strong><?php  } ?></label>
				    </div>				
                </div>
		    </div>
			<?php  } else { ?>
			<input type="hidden" name="share_acid" value="<?php  echo $reply['share_acid'];?>"/>
			<?php  } ?>
		    <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">引导关注页</label>
                <div class="col-sm-9 col-xs-12">
               	    <input type="text" id="share_url_<?php  echo $shares['acid'];?>" class="form-control" name="share_url_<?php  echo $shares['acid'];?>" value="<?php  echo $shares['share_url'];?>">
                    <div class="help-block">引导关注页的链接! 推荐用微信平台的素材库，转成短地址。<a target="_blank" href="http://www.dwz.cn/">短网址转换</a></div>
                </div>
            </div>			
		    <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享标题</label>
                <div class="col-sm-9 col-xs-12">
               	    <input type="text" id="share_title_<?php  echo $shares['acid'];?>" class="form-control" name="share_title_<?php  echo $shares['acid'];?>" value="<?php  echo $shares['share_title'];?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享描述</label>
                <div class="col-sm-9 col-xs-12">
     	            <textarea style="height:60px;" id="share_desc_<?php  echo $shares['acid'];?>" name="share_desc_<?php  echo $shares['acid'];?>" class="form-control" cols="60"><?php  echo $shares['share_desc'];?></textarea>
				    <span class="help-block">分享标题以及分享描述可用变量<br/><span style='color:red'>#参与人数# </span>所有参与活动的总数 + 虚拟人数<br/><span style='color:red'>#参与人# </span>分享人填写兑奖的真实姓名<br/><span style='color:red'>#奖品# </span>分享人所中的最大奖品名称，没有中奖则不显示</span>
                </div>
            </div>
			<div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">参与规则</label>
                <div class="col-sm-9 col-xs-12">
     	            <textarea style="height:60px;" id="share_txt_<?php  echo $shares['acid'];?>" name="share_txt_<?php  echo $shares['acid'];?>" class="form-control richtext_<?php  echo $shares['acid'];?>" cols="60"><?php  echo $shares['share_txt'];?></textarea>
                </div>
            </div>
		    <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享弹出提示图</label>
                <div class="col-sm-9 col-xs-12">
                   	<?php  echo tpl_form_field_image('share_pic_'.$shares['acid'],$shares['share_pic']);?>
                </div>
            </div>
			<div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享成功提示语</label>
                <div class="col-sm-9 col-xs-6">
					<input type="text" class="form-control" name="share_confirm_<?php  echo $shares['acid'];?>" value="<?php  echo $shares['share_confirm'];?>" />
                </div>
            </div>
			<div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享失败提示语</label>
                <div class="col-sm-9 col-xs-6">
					<input type="text" class="form-control" name="share_fail_<?php  echo $shares['acid'];?>" value="<?php  echo $shares['share_fail'];?>" />		    
                </div>
            </div>
			<div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享中途取消提示语</label>
                <div class="col-sm-9 col-xs-6">
					<input type="text" class="form-control" name="share_cancel_<?php  echo $shares['acid'];?>" value="<?php  echo $shares['share_cancel'];?>" />		    
                </div>
            </div>
			</div>
			<?php  } } ?>
		</div>
	</div>	
</div>
<script type="text/javascript">
<!--
	function validateReplyForm(formobj, jq, underscore, util, $scope, $http) {
		if (!formobj['title'].value) {
			util.message('请输入活动名称');
			return false;
		}
		if (!formobj['ticket_information'].value) {
			util.message('请输入兑奖信息');
			return false;
		}
	}
	
	require(['jquery', 'util'], function($, u){
		$(function(){
			u.editor($('.richtextinfo')[0]);
			<?php  if($stonefish_branch) { ?>u.editor($('.richtext2')[0]);<?php  } ?>
			<?php  if(is_array($ids)) { foreach($ids as $idsname) { ?>
			u.editor($('.richtext_<?php  echo $idsname;?>')[0]);
			<?php  } } ?>
		});
    });
	
	$('#btn_add_award').bind('click', function(){
		var content = '<div>';
		content += $("#jiangpin").html();
		content += '<div class="form-group">';
		content += '<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>';
		content += '<div class="col-sm-9">';
		content += '<button type="button" class="btn btn-danger btn_del_award">删除</button>';
		content += '</div>';
		content += '</div>';
		content += '<hr/>';
		content += '</div>';
		$('#award_insert_flag').before(content);
		$('.btn_del_award').bind('click', function(){
			var obj = $(this).parent().parent().parent();
			obj.slideUp(300, function() {
				obj.remove();
			});
		});
	});
//-->
</script>