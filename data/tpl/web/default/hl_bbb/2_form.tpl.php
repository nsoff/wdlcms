<?php defined('IN_IA') or exit('Access Denied');?><input type="hidden" name="reply_id" value="<?php  echo $reply['id'];?>" />
<?php  load()->func('tpl');?>
<div class="panel panel-default">
	<div class="panel-heading">
        添加博饼活动
    </div>
    <div class="panel-body">
        <div class="form-group">
           <label class="col-xs-12 col-sm-3 col-md-2 control-label">查看内容</label>
           <div class="col-sm-9 col-xs-12" style="margin-top:7px;">
               <a href="<?php  echo $this->createWebUrl('awardlist', array('id' => $reply['rid']))?>" target="_blank">查看中奖名单</a>
           </div>
     	</div>
        <div class="form-group">
        	<label class="col-xs-12 col-sm-3 col-md-2 control-label">标题</label>
        	<div class="col-sm-9 col-xs-12">
         		<input type="text" value="<?php  echo $reply['title'];?>" class="form-control" name="title" >
				<span class="help-block">显示在网页头中</span>
        	</div>
    </div>
 	<div class="form-group">
        <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动图片</label>
        <div class="col-sm-9 col-xs-12">
         	<?php  echo tpl_form_field_image('picture',$reply['picture']);?>
			<span class="help-block">用于单图文回复的显示 700*300</span>
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动时间</label>
        <div class="col-sm-9 col-xs-12">
         	<?php  echo tpl_form_field_date('start_time', date('Y-m-d H:m', $reply['start_time']), true)?><br>
			<?php  echo tpl_form_field_date('end_time', date('Y-m-d H:m', $reply['end_time']), true)?>
        </div>
    </div>
	<div class="form-group">
        <label class="col-xs-12 col-sm-3 col-md-2 control-label">手机头图</label>
        <div class="col-sm-9 col-xs-12">
        	<?php  echo tpl_form_field_image('headpic',$reply['headpic']);?>
			<div class="help-block">手机头部广告图 320*80</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-3 col-md-2 control-label">赞助商链接</label>
        <div class="col-sm-9 col-xs-12">
       		<input type="text" value="<?php  echo $reply['headurl'];?>" class="form-control" name="headurl" >
			<div class="help-block">手机头部赞助商链接</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-3 col-md-2 control-label">关注引导</label>
        <div class="col-sm-9 col-xs-12">
      		<input type="text" value="<?php  echo $reply['guzhuurl'];?>" class="form-control" name="guzhuurl" >
			<div class="help-block">关注引导页的链接,强列建议为活动做个推送图文<span style="#f90">不能为空</span></div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-3 col-md-2 control-label">盘子</label>
        <div class="col-sm-9 col-xs-12">
     		<?php  echo tpl_form_field_image('panzi', $reply['panzi']);?> <div class="help-block">盘子图 320*320 ,请使用png24格式</div>
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
        <label class="col-xs-12 col-sm-3 col-md-2 control-label">重复博饼周期</label>
        <div class="col-sm-6 col-xs-12">
            <input type="hidden" value="1" class="span1" name="periodlottery" >
            <div class='input-group'>
                <span class='input-group-addon'>每天系统送</span>
                <input type="text" value="<?php  echo $reply['maxlottery'];?>" class="form-control" name="maxlottery" placeholder="填次数">
                <span class='input-group-addon'>次，每天最大奖励次数</span>
                <input type="text" value="<?php  echo $reply['prace_times'];?>" class="form-control" name="prace_times" placeholder="填次数">
            </div>
        </div>
    </div>  
    <div class="form-group">
        <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
        <div class="col-sm-9 col-xs-12">
            <div class="help-block">天数为0，永远只能博N次（这里N为设置的次数）。<br/>
				也就是用户最终　每天可以摇：系统送+每天最大奖励次数
			</div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    require(['util'],function(util){
        util.editor($("#rule")[0]);
    });
</script>
