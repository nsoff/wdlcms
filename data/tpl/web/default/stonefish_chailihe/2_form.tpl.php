<?php defined('IN_IA') or exit('Access Denied');?><style type="text/css">
    .table .controls{
        margin:0;
    }
	.lihelist td{width:20%;text-align:center;padding:5px;}
</style>
<input type="hidden" name="reply_id" value="<?php  echo $reply['id'];?>" />
<?php  if($reply['id']) { ?>
<div class="panel panel-default">
    <div class="panel-heading">
        活动数据
    </div>
	<div class="panel-body">
	<div class="row-fluid">
    	<div class="span8 control-group">
			<a class="btn btn-default" href="<?php  echo $this->createWebUrl('userlist',array('id' => $rid));?>">参与粉丝</a>
			<a class="btn btn-default" href="<?php  echo $this->createWebUrl('prizedata',array('id' => $rid));?>">中奖名单</a>
			<?php  if($stonefish_branch) { ?><a class="btn btn-default" href="<?php  echo $this->createWebUrl('branch',array('rid' => $rid));?>">商家赠送项</a><?php  } ?>
        </div>
    </div>
    </div>
</div>
<?php  } ?>
<div class="panel panel-default">
    <div class="panel-heading">
        幸运拆礼盒活动设置
    </div>
    <div class="panel-body">        
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动状态</label>
            <div class="col-sm-9 col-xs-12">
               	<label for="notaward1" class="radio-inline">
					<input id="notaward1" type="radio" name="doings" value="1" <?php  if($reply['status'] == 1) { ?>checked="checked"<?php  } ?>> 开始活动
				</label>
				<label for="notaward2" class="radio-inline">
					<input id="notaward2" type="radio" name="doings" value="0" <?php  if($reply['status'] == 0) { ?>checked="checked"<?php  } ?>> 关闭活动（前台显示为暂停）
				</label>				
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">关闭到期</label>
            <div class="col-sm-9 col-xs-12">
               	<div class="input-group">
                    <span class="input-group-addon">活动关闭或活动到期后</span>
					<input class="form-control" type="text" value="<?php  echo $reply['miao'];?>" name="miao">
                    <span class="input-group-addon">秒后转入礼盒查看页 可查看礼盒或奖品兑奖</span>
                </div>
            </div>
        </div> 
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动标题</label>
            <div class="col-sm-9 col-xs-12">
               	<input type="text" id="title" class="form-control" placeholder="" name="title" value="<?php  echo $reply['title'];?>">
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动时间</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_daterange('datelimit', array('start'=>date('Y-m-d H:i',$reply['start_time']),'end'=>date('Y-m-d H:i',$reply['end_time'])), true)?>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动图片</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_image('picture',$reply['picture']);?>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动说明</label>
            <div class="col-sm-9 col-xs-12">
               	<textarea style="height:60px;" id='description' name="description" class="form-control" cols="60"><?php  echo $reply['description'];?></textarea>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 领奖说明</label>
            <div class="col-sm-9 col-xs-12">
               	<textarea style="height:60px;" id='activityinfo' name="activityinfo" class="form-control" cols="60"><?php  echo $reply['activityinfo'];?></textarea>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动详情</label>
            <div class="col-sm-9 col-xs-12">
     	        <textarea style="height:60px;" id="content" name="content" class="form-control richtextinfo" cols="60"><?php  echo $reply['content'];?></textarea>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享标题</label>
            <div class="col-sm-9 col-xs-12">
               	<input type="text" id="sharetitle" class="form-control" placeholder="" name="sharetitle" value="<?php  echo $reply['sharetitle'];?>">
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享内容</label>
            <div class="col-sm-9 col-xs-12">
               	<input type="text" id="sharecontent" class="form-control" placeholder="" name="sharecontent" value="<?php  echo $reply['sharecontent'];?>">
				<div class="help-block">分享标题、分享内容 可用变量：<br/>#参与人数# （参与活动人数+虚拟人数）<br/>#参与人名#（参与人真实姓名）<br/>#礼盒名称#（参与人选择的礼盒名称）<br/>#奖品名称#（参与人选择的礼盒中奖后可领取的奖品）</div>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        幸运拆礼盒显示设置
    </div>
    <div class="panel-body">        
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">背景色</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_color('bgcolor', $reply['bgcolor'])?>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">首页文字色</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_color('text01color', $reply['text01color'])?>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">版权文字色</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_color('text02color', $reply['text02color'])?>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">弹出层文字色</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_color('text03color', $reply['text03color'])?>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">好友帮助或兑奖地点背景色</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_color('text04color', $reply['text04color'])?>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">好友帮助或兑奖地点文字色</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_color('text05color', $reply['text05color'])?>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 开始领取背景图</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_image('picbg01',$reply['picbg01']);?>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 礼盒选择背景图</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_image('picbg02',$reply['picbg02']);?>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 分享礼盒背景图</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_image('picbg03',$reply['picbg03']);?>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">背景音乐</label>
            <div class="col-sm-9 col-xs-12">
               	<label for="music_show_1" class="radio-inline"><input id="music_show_1" type="radio" name="music" value="1" <?php  if($reply['music'] == 1) { ?>checked="checked"<?php  } ?>> 打开音乐</label>
                <label for="music_show_0" class="radio-inline"><input id="music_show_0" type="radio" name="music" value="0"  <?php  if($reply['music'] == 0) { ?>checked="checked"<?php  } ?>> 隐藏音乐</label>
            </div>
        </div>
		<div class="form-group<?php  if($reply['music'] == '0') { ?> hide<?php  } ?>">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">音乐地址</label>
            <div class="col-sm-9 col-xs-12">
               	<input type="text" id="musicbg" class="form-control" placeholder="" name="musicbg" value="<?php  echo $reply['musicbg'];?>">
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 没有中奖图片</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_image('picnojiang',$reply['picnojiang']);?>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 礼盒上商家小LOGO</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_image('shangjialogo',$reply['shangjialogo']);?>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">礼盒领取显示</label>
            <div class="col-sm-9 col-xs-12">
               	<label for="randlihe_1" class="radio-inline"><input id="randlihe_1" type="radio" name="randlihe" value="1" <?php  if($reply['randlihe'] == 1) { ?>checked="checked"<?php  } ?>> 随机显示一个礼盒</label>
				<label for="randlihe_0" class="radio-inline"><input id="randlihe_0" type="radio" name="randlihe" value="0" <?php  if($reply['randlihe'] == 0) { ?>checked="checked"<?php  } ?>> 显示所有礼盒列表</label>
				<div class="help-block">随机显示一个礼盒时：如果奖品发放完或今日中奖用户中奖完或中奖率为0时将不显示此礼盒</div>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">礼盒显示名称</label>
            <div class="col-sm-9 col-xs-12">
               	<label for="showlihe_1" class="radio-inline"><input id="showlihe_1" type="radio" name="showlihe" value="1" <?php  if($reply['showlihe'] == 1) { ?>checked="checked"<?php  } ?>> 显示礼盒名称和奖品名称</label>
				<label for="showlihe_0" class="radio-inline"><input id="showlihe_0" type="radio" name="showlihe" value="0" <?php  if($reply['showlihe'] == 0) { ?>checked="checked"<?php  } ?>> 不显示礼盒名称和奖品名称</label>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">礼盒线显示</label>
            <div class="col-sm-9 col-xs-12">
               	<label for="showline_1" class="radio-inline"><input id="showline_1" type="radio" name="showline" value="1" <?php  if($reply['showline'] == 1) { ?>checked="checked"<?php  } ?>> 显示我的礼盒的礼盒线</label>
				<label for="showline_0" class="radio-inline"><input id="showline_0" type="radio" name="showline" value="0" <?php  if($reply['showline'] == 0) { ?>checked="checked"<?php  } ?>> 不显示我的礼盒的礼盒线</label>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        幸运拆礼盒辅助设置
    </div>
    <div class="panel-body"> 
	    <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">领取是否关注</label>
            <div class="col-sm-9 col-xs-12">
               	<label for="subscribe_1" class="radio-inline"><input id="subscribe_1" type="radio" name="subscribe" value="1" <?php  if($reply['subscribe'] == 1) { ?>checked="checked"<?php  } ?>> 关注领取</label>
				<label for="subscribe_0" class="radio-inline"><input id="subscribe_0" type="radio" name="subscribe" value="0"  <?php  if($reply['subscribe'] == 0) { ?>checked="checked"<?php  } ?>> 任意领取</label>
				<div class="help-block">是否强制用户关注公众号才能领取礼盒</div>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">引导关注网址</label>
            <div class="col-sm-9 col-xs-12">
               	<input type="text" id="shareurl" class="form-control" placeholder="" name="shareurl" value="<?php  echo $reply['shareurl'];?>">
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">折盒是否关注</label>
            <div class="col-sm-9 col-xs-12">
               	<label for="opensubscribe_1" class="radio-inline"><input id="opensubscribe_1" type="radio" name="opensubscribe" value="1" <?php  if($reply['opensubscribe'] == 1) { ?>checked="checked"<?php  } ?>> 关注才能拆礼盒</label>
				<label for="opensubscribe_0" class="radio-inline"><input id="opensubscribe_0" type="radio" name="opensubscribe" value="0"  <?php  if($reply['opensubscribe'] == 0) { ?>checked="checked"<?php  } ?>> 任意拆礼盒</label>
				<div class="help-block">是否强制用户关注公众号才能帮朋友拆礼盒</div>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">拆盒引导关注</label>
            <div class="col-sm-9 col-xs-12">
               	<input type="text" id="openshare" class="form-control" placeholder="" name="openshare" value="<?php  echo $reply['openshare'];?>">
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">拆开礼盒方式</label>
            <div class="col-sm-9 col-xs-12">
               	<label for="opentype_1" class="radio-inline"><input id="opentype_1" type="radio" name="opentype" value="1" <?php  if($reply['opentype'] == 1) { ?>checked="checked"<?php  } ?>> 点击拆开</label>
				<label for="opentype_0" class="radio-inline"><input id="opentype_0" type="radio" name="opentype" value="0"  <?php  if($reply['opentype'] == 0) { ?>checked="checked"<?php  } ?>> 访问拆开</label>
				<div class="help-block">邀请的朋友拆开礼盒的方式,点击拆开需要被邀请的朋友点击按钮才算帮其拆开礼盒,访问拆开是只要被邀请的朋友访问页面即算拆开</div>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">互拆设置</label>
            <div class="col-sm-9 col-xs-12">
               	<label for="helpchai_1" class="radio-inline"><input id="helpchai_1" type="radio" name="helpchai" value="1" <?php  if($reply['helpchai'] == 1) { ?>checked="checked"<?php  } ?>> 允许互拆</label>
				<label for="helpchai_0" class="radio-inline"><input id="helpchai_0" type="radio" name="helpchai" value="0"  <?php  if($reply['helpchai'] == 0) { ?>checked="checked"<?php  } ?>> 不许互拆</label>
				<div class="help-block">允许互拆：A和B可以相互拆礼盒；不许互拆：A帮B拆礼盒，B不能再帮A拆礼盒</div>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">拆礼盒对象</label>
            <div class="col-sm-9 col-xs-12">
               	<label for="helpren_1" class="radio-inline"><input id="helpren_1" type="radio" name="helpren" value="1" <?php  if($reply['helpren'] == 1) { ?>checked="checked"<?php  } ?>> 全部参与人</label>
				<label for="helpren_0" class="radio-inline"><input id="helpren_0" type="radio" name="helpren" value="0"  <?php  if($reply['helpren'] == 0) { ?>checked="checked"<?php  } ?>> 单独参与人</label>
				<div class="help-block">全部参与人：帮A拆过就不能再帮B拆；单独参与人：帮A拆过还可以帮B拆礼盒</div>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">同人多礼盒</label>
            <div class="col-sm-9 col-xs-12">
               	<label for="chainum_1" class="radio-inline"><input id="chainum_1" type="radio" name="chainum" value="1" <?php  if($reply['chainum'] == 1) { ?>checked="checked"<?php  } ?>> 同一人多次</label>
				<label for="chainum_0" class="radio-inline"><input id="chainum_0" type="radio" name="chainum" value="0"  <?php  if($reply['chainum'] == 0) { ?>checked="checked"<?php  } ?>> 同一人一次</label>
				<div class="help-block">同一人一次：A有多个礼盒，只能帮其拆一个礼盒；同一人多次：A有多个礼盒，可以帮其每个礼盒拆一次</div>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">重复中奖设置</label>
            <div class="col-sm-9 col-xs-12">
               	<label for="repeatzj_1" class="radio-inline"><input id="repeatzj_1" type="radio" name="repeatzj" value="1" <?php  if($reply['repeatzj'] == 1) { ?>checked="checked"<?php  } ?>> 可重复中奖</label>
				<label for="repeatzj_0" class="radio-inline"><input id="repeatzj_0" type="radio" name="repeatzj" value="0" <?php  if($reply['repeatzj'] == 0) { ?>checked="checked"<?php  } ?>> 只能中奖一次</label>
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
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"> 显示帮助人数</label>
            <div class="col-sm-9 col-xs-12">
               	<div class="input-group">
					<span class="input-group-addon">我的礼盒显示</span>
					<input type="text" class="form-control" name="helpnum" value="<?php  echo $reply['helpnum'];?>" />
					<span class="input-group-addon">位帮我拆礼盒的朋友  高级认证号或借用高级认证号专用</span>
				</div>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"> 显示中奖用户</label>
            <div class="col-sm-9 col-xs-12">
               	<div class="input-group">
					<span class="input-group-addon">首页中奖显示</span>
					<input type="text" class="form-control" name="share_shownum" value="<?php  echo $reply['share_shownum'];?>" />
					<span class="input-group-addon">位中奖用户</span>
				</div>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"> 每人领取总数</label>
            <div class="col-sm-9 col-xs-12">
               	<div class="input-group">
					<span class="input-group-addon">每人共计最多领取</span>
					<input type="text" class="form-control" name="number_num" value="<?php  echo $reply['number_num'];?>" />
					<span class="input-group-addon">个礼盒</span>
				</div>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"> 每人每天个数</label>
            <div class="col-sm-9 col-xs-12">
               	<div class="input-group">
					<span class="input-group-addon">每人每天最多领取</span>
					<input type="text" class="form-control" name="number_num_day" value="<?php  echo $reply['number_num_day'];?>" />
					<span class="input-group-addon">个礼盒</span>
				</div>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">版权显示</label>
            <div class="col-sm-9 col-xs-12">
               	<label for="iscopyright_1" class="radio-inline"><input id="iscopyright_1" type="radio" name="iscopyright" value="0" <?php  if($reply['iscopyright'] == 0) { ?>checked="checked"<?php  } ?>> 公众号版权</label>
				<label for="iscopyright_0" class="radio-inline"><input id="iscopyright_0" type="radio" name="iscopyright" value="1"  <?php  if($reply['iscopyright'] == 1) { ?>checked="checked"<?php  } ?>> 自定义版权</label>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">版权设置</label>
            <div class="col-sm-9 col-xs-12">
               	<div class="input-group">
					<span class="input-group-addon">显示版权</span>
					<input type="text" name="copyright" value="<?php  echo $reply['copyright'];?>" class="form-control">
					<span class="input-group-addon" style="border-left:0px;border-right:0px;">链接</span>
					<input type="text" name="copyrighturl" value="<?php  echo $reply['copyrighturl'];?>" class="form-control"> 
				</div>				 
				<div class="help-block">需要输入完整的链接如：http://www.qq.com/</div>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        幸运拆礼盒兑奖设置
    </div>
    <div class="panel-body"> 
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">兑奖参数填写项</label>
            <div class="col-sm-9 col-xs-12">
               	<label for="isinfo_1" class="radio-inline"><input id="isinfo_1" type="radio" name="isinfo" value="0" <?php  if($reply['isinfo'] == 0) { ?>checked="checked"<?php  } ?>> 领取时填写</label>
				<label for="isinfo_0" class="radio-inline"><input id="isinfo_0" type="radio" name="isinfo" value="1"  <?php  if($reply['isinfo'] == 1) { ?>checked="checked"<?php  } ?>> 中奖时填写</label>
            </div>
        </div>
		<div class="form-group">
 			<label class="col-xs-12 col-sm-3 col-md-2 control-label">兑奖输入项提示词</label>
            <div class="col-sm-9 col-xs-6">
				<input type="text" class="form-control" name="userinfo" value="<?php  echo $reply['userinfo'];?>" />
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
					<!--<label for="isgender" class="checkbox-inline"><input id="isgender" type="checkbox" name="isgender" value="1" <?php  if($reply['isgender'] == 1) { ?>checked="checked"<?php  } ?>> 性别</label>
					<label for="istelephone" class="checkbox-inline"><input id="istelephone" type="checkbox" name="istelephone" value="1" <?php  if($reply['istelephone'] == 1) { ?>checked="checked"<?php  } ?>> 固话</label>
					<label for="isidcard" class="checkbox-inline"><input id="isidcard" type="checkbox" name="isidcard" value="1" <?php  if($reply['isidcard'] == 1) { ?>checked="checked"<?php  } ?>> 证件</label>
					<label for="iscompany" class="checkbox-inline"><input id="iscompany" type="checkbox" name="iscompany" value="1" <?php  if($reply['iscompany'] == 1) { ?>checked="checked"<?php  } ?>> 公司</label>
					<label for="isoccupation" class="checkbox-inline"><input id="isoccupation" type="checkbox" name="isoccupation" value="1" <?php  if($reply['isoccupation'] == 1) { ?>checked="checked"<?php  } ?>> 职业</label>
					<label for="isposition" class="checkbox-inline"><input id="isposition" type="checkbox" name="isposition" value="1" <?php  if($reply['isposition'] == 1) { ?>checked="checked"<?php  } ?>> 职位</label>-->
					</div>
					<div class="help-block">必需选择一个参数兑奖 活动开启后最好不要修改 请谨慎选择 重命显示请修改下面的参数</div>
            </div>
        </div>
		<!--
		<div class="form-group">
 			<label class="col-xs-12 col-sm-3 col-md-2 control-label">兑奖输入参数重命名</label>
            <div class="col-sm-9 col-xs-6">
				<input type="text" class="form-control" name="isfansname" value="<?php  echo $reply['isfansname'];?>" />
				<div class="help-block">与上面的参数一一对应，请直接修改不要改变','这个字符</div>
            </div>
        </div>-->
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
        幸运拆礼盒幻灯片设置
    </div>
    <div class="panel-body"> 
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">幻灯片一</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_image('imgpic01',$reply['imgpic01']);?>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">幻灯片二</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_image('imgpic02',$reply['imgpic02']);?>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">幻灯片三</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_image('imgpic03',$reply['imgpic03']);?>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">幻灯片四</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_image('imgpic04',$reply['imgpic04']);?>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">幻灯片五</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_image('imgpic05',$reply['imgpic05']);?>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        礼盒设置
    </div>
    <div class="panel-body"> 
		<div class="form-group">
            <div class="col-sm-12 col-xs-12">
               	<table width="100%" class="lihelist">
				<tr>
					<td><img src="../addons/stonefish_chailihe/template/images/lihepic/icon_prize1.png" width="100" /></td>
					<td><img src="../addons/stonefish_chailihe/template/images/lihepic/icon_prize2.png" width="100" /></td>
					<td><img src="../addons/stonefish_chailihe/template/images/lihepic/icon_prize3.png" width="100" /></td>
					<td><img src="../addons/stonefish_chailihe/template/images/lihepic/icon_prize4.png" width="100" /></td>
					<td><img src="../addons/stonefish_chailihe/template/images/lihepic/icon_prize5.png" width="100" /></td>
				</tr>
				<tr>
					<td>礼盒1</td>
					<td>礼盒2</td>
					<td>礼盒3</td>
					<td>礼盒4</td>
					<td>礼盒5</td>
				</tr>
				</table>
            </div>
        </div>
		<?php  if($award) { ?>
			<?php  if(is_array($award)) { foreach($award as $item) { ?>
			<div>
			<input type="hidden" name="prize_id[<?php  echo $item['id'];?>]" value="<?php  echo $item['id'];?>" />
			<div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 control-label">礼盒名称</label>
                <div class="col-sm-4">
                    <input class="form-control" type="text" value="<?php  echo $item['lihetitle'];?>" name="award_lihetitle[<?php  echo $item['id'];?>]">
                </div>
				<label class="col-xs-12 col-sm-2 col-md-2 control-label">奖品数量</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input class="form-control" type="text" value="<?php  echo $item['total'];?>" name="award_total[<?php  echo $item['id'];?>]">
                        <span class="input-group-addon">份</span>
                    </div>
                </div>							
            </div>						
            <div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 control-label">奖品名称</label>
                <div class="col-sm-4">
                    <input class="form-control" type="text" value="<?php  echo $item['title'];?>" name="award_title[<?php  echo $item['id'];?>]">
                </div>
				<label class="col-xs-12 col-sm-2 col-md-2 control-label">中奖概率</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input class="form-control" type="text" value="<?php  echo $item['probalilty'];?>" name="award_probalilty[<?php  echo $item['id'];?>]">
                        <span class="input-group-addon">%</span>
                    </div>
                </div>
            </div>
			<div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 control-label">帮拆人数</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-addon">邀请</span>
						<input class="form-control" type="text" value="<?php  echo $item['break'];?>" name="award_break[<?php  echo $item['id'];?>]">
                        <span class="input-group-addon">位朋友帮拆礼盒</span>
                    </div>					
                </div>
				<label class="col-xs-12 col-sm-2 col-md-2 control-label">每天中奖</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <span class="input-group-addon">每天</span>
						<input class="form-control" type="text" value="<?php  echo $item['daytotal'];?>" name="award_daytotal[<?php  echo $item['id'];?>]">
                        <span class="input-group-addon">个奖品中奖</span>
                    </div>
                </div>
            </div>
			<div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 control-label">礼盒图片</label>
                <div class="col-sm-4">
                    <select  class="form-control" id="award_gift_new[]" data-rule-required="true" name="award_gift[<?php  echo $item['id'];?>]">
                        <option value="1" <?php  if($item['gift']==1) { ?>selected="selecteed"<?php  } ?>>礼盒1</option>
                        <option value="2" <?php  if($item['gift']==2) { ?>selected="selecteed"<?php  } ?>>礼盒2</option>
                        <option value="3" <?php  if($item['gift']==3) { ?>selected="selecteed"<?php  } ?>>礼盒3</option>
                        <option value="4" <?php  if($item['gift']==3) { ?>selected="selecteed"<?php  } ?>>礼盒4</option>
                        <option value="5" <?php  if($item['gift']==5) { ?>selected="selecteed"<?php  } ?>>礼盒5</option>
	                </select>
                </div>
				<label class="col-xs-12 col-sm-2 col-md-2 control-label">礼盒声音</label>
                <div class="col-sm-3">
                    <select class="form-control" data-rule-required="true" id="award_giftVoice_new[]" name="award_giftVoice[<?php  echo $item['id'];?>]">
					    <option data-link="0" value="0" ><i class="play-btn"></i>无响声</option>
						<option value="1" <?php  if($item['giftVoice']==1) { ?>selected="selecteed"<?php  } ?>><i class="play-btn"></i>响声1</option>
						<option value="2" <?php  if($item['giftVoice']==2) { ?>selected="selecteed"<?php  } ?>><i class="play-btn"></i>响声2</option>
						<option value="3" <?php  if($item['giftVoice']==3) { ?>selected="selecteed"<?php  } ?>><i class="play-btn"></i>响声3</option>
						<option value="4" <?php  if($item['giftVoice']==4) { ?>selected="selecteed"<?php  } ?>><i class="play-btn"></i>响声4</option>
						<option value="5" <?php  if($item['giftVoice']==5) { ?>selected="selecteed"<?php  } ?>><i class="play-btn"></i>响声5</option>
					</select>
                </div>
            </div>			
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">奖品图片</label>
                <div class="col-sm-9">
					<?php  echo tpl_form_field_image('awardpic['.$item['id'].']',$item['awardpic']);?>
					<div class="help-block">奖品显示图片 图片大小418px X 418px</div>
				</div>
            </div>
			<div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">奖品描述</label>
                <div class="col-sm-9">
					<textarea style="height:80px;" name="award_description[<?php  echo $item['id'];?>]" class="form-control" cols="70" id="" placeholder="填写奖品描述，颜色、类型、规格等"><?php  echo $item['description'];?></textarea>
				</div>
            </div>
			<hr/>
			</div>
			<?php  } } ?>		
		<?php  } ?>
		<div id="jiangpin" style="display: none">
			<div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 control-label">礼盒名称</label>
                <div class="col-sm-4">
                    <input class="form-control" type="text" value="" name="award_lihetitle_new[]">
                </div>
				<label class="col-xs-12 col-sm-2 col-md-2 control-label">奖品数量</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input class="form-control" type="text" value="" name="award_total_new[]">
                        <span class="input-group-addon">份</span>
                    </div>
                </div>							
            </div>						
            <div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 control-label">奖品名称</label>
                <div class="col-sm-4">
                    <input class="form-control" type="text" value="" name="award_title_new[]">
                </div>
				<label class="col-xs-12 col-sm-2 col-md-2 control-label">中奖概率</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input class="form-control" type="text" value="" name="award_probalilty_new[]">
                        <span class="input-group-addon">%</span>
                    </div>
                </div>
            </div>
			<div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 control-label">帮拆人数</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-addon">邀请</span>
						<input class="form-control" type="text" value="" name="award_break_new[]">
                        <span class="input-group-addon">位朋友帮拆礼盒</span>
                    </div>					
                </div>
				<label class="col-xs-12 col-sm-2 col-md-2 control-label">每天中奖</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <span class="input-group-addon">每天</span>
						<input class="form-control" type="text" value="" name="award_daytotal_new[]">
                        <span class="input-group-addon">个奖品中奖</span>
                    </div>
                </div>
            </div>
			<div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 control-label">礼盒图片</label>
                <div class="col-sm-4">
                    <select  class="form-control" id="award_gift_new[]" data-rule-required="true" name="award_gift_new[]">
                        <option value="1" selected="selecteed">礼盒1</option>
                        <option value="2">礼盒2</option>
                        <option value="3">礼盒3</option>
                        <option value="4">礼盒4</option>
                        <option value="5">礼盒5</option>
	                </select>
                </div>
				<label class="col-xs-12 col-sm-2 col-md-2 control-label">礼盒声音</label>
                <div class="col-sm-3">
                    <select class="form-control" data-rule-required="true" id="award_giftVoice_new[]" name="award_giftVoice_new[]">
					    <option data-link="0" value="0" ><i class="play-btn"></i>无响声</option>
						<option value="1"><i class="play-btn"></i>响声1</option>
						<option value="2"><i class="play-btn"></i>响声2</option>
						<option value="3"><i class="play-btn"></i>响声3</option>
						<option value="4"><i class="play-btn"></i>响声4</option>
						<option value="5"><i class="play-btn"></i>响声5</option>
					</select>
                </div>
            </div>			
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">奖品图片</label>
                <div class="col-sm-9">
					<?php  echo tpl_form_field_image('awardpic_new[]','');?>
					<div class="help-block">奖品显示图片 图片大小418px X 418px</div>
				</div>
            </div>
			<div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">奖品描述</label>
                <div class="col-sm-9">
					<textarea style="height:80px;" name="award_description_new[]" class="form-control" cols="70" id="" placeholder="填写奖品描述，颜色、类型、规格等"></textarea>
				</div>
            </div>
		</div>
		<?php  if(empty($award)) { ?>
		<div>
			<div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 control-label">礼盒名称</label>
                <div class="col-sm-4">
                    <input class="form-control" type="text" value="" name="award_lihetitle_new[]">
                </div>
				<label class="col-xs-12 col-sm-2 col-md-2 control-label">奖品数量</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input class="form-control" type="text" value="" name="award_total_new[]">
                        <span class="input-group-addon">份</span>
                    </div>
                </div>							
            </div>						
            <div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 control-label">奖品名称</label>
                <div class="col-sm-4">
                    <input class="form-control" type="text" value="" name="award_title_new[]">
                </div>
				<label class="col-xs-12 col-sm-2 col-md-2 control-label">中奖概率</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input class="form-control" type="text" value="" name="award_probalilty_new[]">
                        <span class="input-group-addon">%</span>
                    </div>
                </div>
            </div>
			<div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 control-label">帮拆人数</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-addon">邀请</span>
						<input class="form-control" type="text" value="" name="award_break_new[]">
                        <span class="input-group-addon">位朋友帮拆礼盒</span>
                    </div>					
                </div>
				<label class="col-xs-12 col-sm-2 col-md-2 control-label">每天中奖</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <span class="input-group-addon">每天</span>
						<input class="form-control" type="text" value="" name="award_daytotal_new[]">
                        <span class="input-group-addon">个奖品中奖</span>
                    </div>
                </div>
            </div>
			<div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 control-label">礼盒图片</label>
                <div class="col-sm-4">
                    <select  class="form-control" id="award_gift_new[]" data-rule-required="true" name="award_gift_new[]">
                        <option value="1" selected="selecteed">礼盒1</option>
                        <option value="2">礼盒2</option>
                        <option value="3">礼盒3</option>
                        <option value="4">礼盒4</option>
                        <option value="5">礼盒5</option>
	                </select>
                </div>
				<label class="col-xs-12 col-sm-2 col-md-2 control-label">礼盒声音</label>
                <div class="col-sm-3">
                    <select class="form-control" data-rule-required="true" id="award_giftVoice_new[]" name="award_giftVoice_new[]">
					    <option data-link="0" value="0" ><i class="play-btn"></i>无响声</option>
						<option value="1"><i class="play-btn"></i>响声1</option>
						<option value="2"><i class="play-btn"></i>响声2</option>
						<option value="3"><i class="play-btn"></i>响声3</option>
						<option value="4"><i class="play-btn"></i>响声4</option>
						<option value="5"><i class="play-btn"></i>响声5</option>
					</select>
                </div>
            </div>			
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">奖品图片</label>
                <div class="col-sm-9">
					<?php  echo tpl_form_field_image('awardpic_new[]','');?>
					<div class="help-block">奖品显示图片 图片大小418px X 418px</div>
				</div>
            </div>
			<div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">奖品描述</label>
                <div class="col-sm-9">
					<textarea style="height:80px;" name="award_description_new[]" class="form-control" cols="70" id="" placeholder="填写奖品描述，颜色、类型、规格等"></textarea>
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
<script type="text/javascript">
<!--
	function validateReplyForm(formobj, jq, underscore, util, $scope, $http) {
		if (!formobj['title'].value) {
			util.message('请输入活动名称');
			return false;
		}		
	}
	
	require(['jquery', 'util'], function($, u){
		$(function(){
			u.editor($('.richtextinfo')[0]);			
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