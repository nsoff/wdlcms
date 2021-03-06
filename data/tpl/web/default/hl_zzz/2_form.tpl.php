<?php defined('IN_IA') or exit('Access Denied');?><input type="hidden" name="reply_id" value="<?php  echo $reply['id'];?>" />
<?php  load()->func('tpl');?>
<div class="panel panel-default">
	<div class="panel-heading">
        添加活动
    </div>
    <div class="panel-body">
        <div class="form-group">
           <label class="col-xs-12 col-sm-3 col-md-2 control-label">查看内容</label>
           <div class="col-sm-9 col-xs-12">
             <p class="form-control-static"><a href="<?php  echo $this->createWebUrl('awardlist', array('id' => $reply['rid']))?>" target="_blank">查看排名</a></p>
           </div>
     	</div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-3 col-md-2 control-label">标题</label>
        <div class="col-sm-9 col-xs-12">
         	<input type="text" value="<?php  echo $reply['title'];?>" class="form-control" name="title" >
			<div class="help-block">显示在网页头中</div>
        </div>
    </div>
 	<div class="form-group">
        <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动图片</label>
        <div class="col-sm-9 col-xs-12">
         	<?php  echo tpl_form_field_image('picture',$reply['picture']);?>
			<div class="help-block">用于单图文回复的显示 700*300</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-3 col-md-2 control-label">背景图片 </label>
        <div class="col-sm-9 col-xs-12">
         	<?php  echo tpl_form_field_image('bgurl',$reply['bgurl']);?>
			<div class="help-block">建议尺寸：640*620</div>
        </div>

    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动时间</label>
        <div class="col-sm-4"><?php  echo tpl_form_field_date('start_time', date('Y-m-d H:m', $reply['start_time']), true)?></div>
		<div class="col-sm-4"><?php  echo tpl_form_field_date('end_time', date('Y-m-d H:m', $reply['end_time']), true)?></div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-3 col-md-2 control-label">我也要玩</label>
        <div class="col-sm-9 col-xs-12">
     		 <input type="text" value="<?php  echo $reply['guzhuurl'];?>" class="form-control" name="guzhuurl" >   <div class="help-block">关注引导页的链接,强列建议为活动做个推送图文<span style="#f90">不能为空</span></div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动简介</label>
        <div class="col-sm-9 col-xs-12">
 			<textarea style="height:150px;" name="description" class="form-control" cols="60"><?php  echo $reply['description'];?></textarea>
			<div class="help-block">用于图文显示的简介</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动规则</label>
        <div class="col-sm-9 col-xs-12">
  			<textarea style="height:150px;" name="rule" id='rule' class="form-control" cols="60"><?php  echo $reply['rule'];?></textarea>
			<div class="help-block">用于图文显示的简介</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-3 col-md-2 control-label">单位</label>
        <div class="col-sm-9 col-xs-12">
            <div class='input-group'>
                <span class='input-group-addon'>大单位</span>
           <input type="text" value="<?php  echo $reply['bigunit'];?>" class="form-control" name="bigunit" >
                <span class='input-group-addon'>小单位</span>
                <input type="text" value="<?php  echo $reply['smallunit'];?>" class="form-control" name="smallunit" >
            </div>
        </div>
    </div>  
    <div class="form-group">
        <label class="col-xs-12 col-sm-3 col-md-2 control-label">周期</label>
        <div class="col-sm-9 col-xs-12">
            <input type="hidden" value="1" class="span1" name="periodlottery" >
            <div class='input-group'>
                <span class='input-group-addon'>每天系统送</span>
                <input type="text" value="<?php  echo $reply['maxlottery'];?>" class="form-control" name="maxlottery" placeholder="填数字" style="min-width:50px;">
                <span class='input-group-addon'>次体力（单位10）,每天可使用外部获取的体力</span>
                <input type="text" value="<?php  echo $reply['prace_times'];?>" class="form-control" name="prace_times" placeholder="填数字" style="min-width:50px;">
                <span class='input-group-addon'>（单位10）</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享赠送体力</label>
        <div class="col-sm-9 col-xs-12">
            <input type="text" value="<?php  echo $reply['sharevalue'];?>" class="form-control" name="sharevalue" >
            <span class="help-block">请填写分享之后被点击时赠送的体力值</span>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    require(['util'],function(util){
        util.editor($("#rule")[0]);
    });
</script>
