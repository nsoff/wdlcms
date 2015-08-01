<?php defined('IN_IA') or exit('Access Denied');?><input type="hidden" name="reply_id" value="<?php  echo $reply['id'];?>" />
<?php  if($reply['id']) { ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			快捷操作
		</div>
		<div class="panel-body">
		<div class="row-fluid">
			<div class="span8 control-group">
				<a class="btn btn-default" href="<?php  echo $this->createWebUrl('members', array('rid' => $rid))?>">投票管理</a>
				<a  class="btn btn-default" href="<?php  echo $this->createWebUrl('provevote', array('rid' => $rid, 'foo' => 'display'))?>">审核管理</a>				
				<a  class="btn btn-default" href="<?php  echo $this->createWebUrl('votelog', array('rid' => $rid))?>">投票记录</a>
				<a class="btn btn-default"  href="<?php  echo $this->createWebUrl('message', array('rid' => $rid))?>">留言管理</a>
				<a  class="btn btn-default" href="<?php  echo $this->createWebUrl('addmessage', array('rid' => $rid))?>">弹幕管理</a>
				<a  class="btn btn-default" href="<?php  echo $this->createWebUrl('rankinglist', array('rid' => $rid))?>">排行榜</a>
				<a  class="btn btn-default" href="<?php  echo $this->createWebUrl('banner', array('rid' => $rid))?>">幻灯片</a>
				<a  class="btn btn-default" href="<?php  echo $this->createWebUrl('adv', array('rid' => $rid))?>">赞助商管理</a>
				<a  class="btn btn-default" href="<?php  echo $this->createWebUrl('iplist', array('rid' => $rid))?>">禁止ip设置</a>
				<a  class="btn btn-default" href="<?php  echo $this->createWebUrl('announce', array('rid' => $rid))?>">公告</a>
				<a  class="btn btn-default" href="<?php  echo $this->createWebUrl('index', array('rid' => $rid))?>">活动首页</a>	
			</div>
		</div>
		</div>
	</div>
<?php  } ?>
<div class="panel panel-default">
	<div class="panel-heading">
		女神来了设置
	</div>	
	<div class="panel-body">
		<ul class="nav nav-tabs" id="myTab">
			<li class="active" ><a href="#tab_basic">基本设置</a></li>
			<li><a href="#tab_share">分享设置</a></li>
			<li><a href="#tab_sub">关注设置</a></li>
			<li><a href="#tab_huihua">会话设置</a></li>
			<li><a href="#tab_display">显示设置</a></li>
			<li><a href="#tab_vote">投票设置</a></li>
			<li><a href="#tab_body">页面设置</a></li>
			<?php  if($_W['role']=='founder') { ?>	<li><a href="#tab_savemedia">存储设置</a></li><?php  } ?>
		</ul>
	<div class='alert alert-warning' style='font-size:14px'>
        女神投票配置说明： <a href='http://bbs.wdlcms.com/forum.php?mod=viewthread&tid=1395&page=1&extra=#pid9820' target='_blank'>http://bbs.wdlcms.com/forum.php?mod=viewthread&tid=1395&page=1&extra=#pid9820</a>
    </div>
		<div class="tab-content">
			<div class="tab-pane  active" id="tab_basic"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('form_basic', TEMPLATE_INCLUDEPATH)) : (include template('form_basic', TEMPLATE_INCLUDEPATH));?></div>
			<div class="tab-pane" id="tab_share"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('form_share', TEMPLATE_INCLUDEPATH)) : (include template('form_share', TEMPLATE_INCLUDEPATH));?></div>
			<div class="tab-pane" id="tab_sub"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('form_sub', TEMPLATE_INCLUDEPATH)) : (include template('form_sub', TEMPLATE_INCLUDEPATH));?></div>
			<div class="tab-pane" id="tab_huihua"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('form_huihua', TEMPLATE_INCLUDEPATH)) : (include template('form_huihua', TEMPLATE_INCLUDEPATH));?></div>
			<div class="tab-pane" id="tab_display"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('form_display', TEMPLATE_INCLUDEPATH)) : (include template('form_display', TEMPLATE_INCLUDEPATH));?></div>
			<div class="tab-pane" id="tab_vote"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('form_vote', TEMPLATE_INCLUDEPATH)) : (include template('form_vote', TEMPLATE_INCLUDEPATH));?></div>
			<div class="tab-pane" id="tab_body"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('form_body', TEMPLATE_INCLUDEPATH)) : (include template('form_body', TEMPLATE_INCLUDEPATH));?></div>
			<?php  if($_W['role']=='founder') { ?>	<div class="tab-pane" id="tab_savemedia"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('form_savemedia', TEMPLATE_INCLUDEPATH)) : (include template('form_savemedia', TEMPLATE_INCLUDEPATH));?></div><?php  } ?>
		</div>
	</div>
	
	
	</div>



<!-- 此函数为扩展验证表单JS，您有需要验证可以实现此函数提示错误信息，当然也可以不实现。-->
<script type="text/javascript">
<!--	
	$(function () {
		window.optionchanged = false;
		$('#myTab a').click(function (e) {
			e.preventDefault();//阻止a链接的跳转行为
			$(this).tab('show');//显示当前选中的链接及关联的content
		})
	});


	require(['jquery', 'util'], function($, u){
		$(function(){
			u.editor($('.richtext')[0]);
			u.editor($('.richtexti')[0]);
		});
	});
//-->	
</script>
