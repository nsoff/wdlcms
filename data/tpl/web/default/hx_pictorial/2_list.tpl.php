<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
.huabao_list{overflow:hidden; padding-top:15px;}
.huabao_list li{border:1px #DDD solid; width:320px; float:left; margin-left:15px; margin-bottom:10px;}
.huabao_list li .huabao_pic{display:block; width:320px; height:160px; overflow:hidden;}
.huabao_list li .huabao_pic img{width:320px;}
.huabao_list li .huabao_main{padding:10px; overflow:hidden;}
.huabao_list li .huabao_main .huabao_title{font-size:16px; height:20px; width:217px; overflow:hidden;}
.huabao_list li .huabao_main .pull-left{color:#999;}
.huabao_manage .table th{width:120px;}
.huabao_manage #huabaos_head img{margin-right:10px; max-height:70px;}
</style>
<div class="main">
<ul class="nav nav-tabs">
	<li class="active"><a href="<?php  echo $this->createWebUrl('list');?>">画报管理</a></li>
	<li><a href="<?php  echo $this->createWebUrl('add');?>">添加画报</a></li>
</ul>
	<div class="panel panel-info">
		<div class="panel-heading">筛选</div>
		<div class="panel-body">
			<form action="" method="post" class="form-horizontal" role="form">
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">画报名称</label>
				<div class="col-sm-4">
					<input class="form-control" name="keyword" id="" type="keyword" value="<?php  echo $_GPC['keyword'];?>">
				</div>
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">生成时间</label>
				<div class="col-sm-4">
					<?php  echo tpl_form_field_daterange('createtime', array('start'=>date('Y-m-d',$c_s),'end'=>date('Y-m-d',$c_e)), false)?>
				</div>
			</div>
			<div class="form_group">
				<input type="submit" class="btn btn-primary" name="submit" value="提交" />
				<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
			</div>
			</form>
		</div>
	</div>

	<div style="padding:15px;">
		<ul class="unstyled huabao_list">
	<?php  if(is_array($list)) { foreach($list as $item) { ?>
	<li>
		<a href="<?php  echo $this->createWebUrl('photo', array('pictorialid' => $item['id']))?>" class="huabao_pic"><img src="<?php  echo $_W['attachurl'];?><?php  echo $item['thumb'];?>" /></a>
		<div class="huabao_main">
			<p class="huabao_title"><?php  echo $item['title'];?></p>
			<p>
				<span class="pull-right"><a href="<?php  echo $this->createWebUrl('photo', array('pictorialid' => $item['id']))?>">上传照片</a> <a href="<?php  echo $this->createWebUrl('add', array('id' => $item['id']))?>">编辑</a> <a href="<?php  echo $this->createWebUrl('delete', array('id' => $item['id'], 'type' => 'pictorial'))?>" onclick="return confirm('此操作不可恢复，确定删除码？'); return false;">删除</a></span>
				<span class="pull-left">有<?php  echo $item['total'];?>张照片</span>
			</p>
		</div>
	</li>
	<?php  } } ?>
</ul>
		<?php  echo $pager;?>
	</div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>