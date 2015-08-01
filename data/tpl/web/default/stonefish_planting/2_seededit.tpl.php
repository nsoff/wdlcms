<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
	<ul class="nav nav-tabs">
		<li><a href="<?php  echo $this->createWebUrl('manage');?>">种植乐园管理</a></li>
		<li><a href="<?php  echo url('platform/reply/post',array('m'=>'stonefish_planting'));?>">添加种植乐园规则</a></li>
		<li><a href="<?php  echo $this->createWebUrl('seed');?>">种子管理</a></li>
		<li class="active"><a href="<?php  echo $this->createWebUrl('seededit',array('id' =>$id));?>"><?php  if($id!='') { ?>编辑<?php  } else { ?>添加<?php  } ?>种子</a></li>
	</ul> 
	<form action="" class="form-horizontal form" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php  echo $item['id'];?>">
	<input type="hidden" name="uniacid" value="<?php  echo $item['uniacid'];?>">
    <div class="panel panel-default">
	    <div class="panel-heading">种子配置</div>
	        <div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:red">种子名称</label>
					<div class="col-sm-8">
						<input type="text" name="seedname" value="<?php  if(!empty($item['seedname'])) { ?><?php  echo $item['seedname'];?><?php  } ?>" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:red">种子广告词</label>
					<div class="col-sm-8">
						<input type="text" name="seedad" value="<?php  if(!empty($item['seedad'])) { ?><?php  echo $item['seedad'];?><?php  } ?>" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">种植效果</label>
					<div class="col-sm-8">
						<?php  echo tpl_form_field_image('seedimg',$item['seedimg']);?>
					</div>
				</div>				
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">胚胎值</label>
					<div class="col-sm-8">
						<div class="input-group">
					        <span class="input-group-addon">邀请</span>
                            <input type="text" id="" name="seed01" value="<?php  if(isset($item['seed01'])) { ?><?php  echo $item['seed01'];?><?php  } else { ?>0<?php  } ?>"  class="form-control" />
                            <span class="input-group-addon">位好友帮其浇水后显示的下面胚胎图　并可参与奖品相同值的抽奖</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">胚胎图</label>
					<div class="col-sm-8">
						<?php  echo tpl_form_field_image('seedimg01',$item['seedimg01']);?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">发芽值</label>
					<div class="col-sm-8">
						<div class="input-group">
					        <span class="input-group-addon">邀请</span>
                            <input type="text" id="" name="seed02" value="<?php  if(isset($item['seed02'])) { ?><?php  echo $item['seed02'];?><?php  } else { ?>5<?php  } ?>"  class="form-control" />
                            <span class="input-group-addon">位好友帮其浇水后显示的下面发芽图　并可参与奖品相同值的抽奖</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">发芽图</label>
					<div class="col-sm-8">
						<?php  echo tpl_form_field_image('seedimg02',$item['seedimg02']);?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">生长值</label>
					<div class="col-sm-8">
						<div class="input-group">
					        <span class="input-group-addon">邀请</span>
                            <input type="text" id="" name="seed03" value="<?php  if(isset($item['seed03'])) { ?><?php  echo $item['seed03'];?><?php  } else { ?>10<?php  } ?>"  class="form-control" />
                            <span class="input-group-addon">位好友帮其浇水后显示的下面生长图　并可参与奖品相同值的抽奖</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">生长图</label>
					<div class="col-sm-8">
						<?php  echo tpl_form_field_image('seedimg03',$item['seedimg03']);?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">发枝值</label>
					<div class="col-sm-8">
						<div class="input-group">
					        <span class="input-group-addon">邀请</span>
                            <input type="text" id="" name="seed04" value="<?php  if(isset($item['seed04'])) { ?><?php  echo $item['seed04'];?><?php  } else { ?>15<?php  } ?>"  class="form-control" />
                            <span class="input-group-addon">位好友帮其浇水后显示的下面发枝图　并可参与奖品相同值的抽奖</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">发枝图</label>
					<div class="col-sm-8">
						<?php  echo tpl_form_field_image('seedimg04',$item['seedimg04']);?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">繁荣值</label>
					<div class="col-sm-8">
						<div class="input-group">
					        <span class="input-group-addon">邀请</span>
                            <input type="text" id="" name="seed05" value="<?php  if(isset($item['seed05'])) { ?><?php  echo $item['seed05'];?><?php  } else { ?>25<?php  } ?>"  class="form-control" />
                            <span class="input-group-addon">位好友帮其浇水后显示的下面繁荣图　并可参与奖品相同值的抽奖</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">繁荣图</label>
					<div class="col-sm-8">
						<?php  echo tpl_form_field_image('seedimg05',$item['seedimg05']);?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">开花值</label>
					<div class="col-sm-8">
						<div class="input-group">
					        <span class="input-group-addon">邀请</span>
                            <input type="text" id="" name="seed06" value="<?php  if(isset($item['seed06'])) { ?><?php  echo $item['seed06'];?><?php  } else { ?>35<?php  } ?>"  class="form-control" />
                            <span class="input-group-addon">位好友帮其浇水后显示的下面开花图　并可参与奖品相同值的抽奖</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">开花图</label>
					<div class="col-sm-8">
						<?php  echo tpl_form_field_image('seedimg06',$item['seedimg06']);?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">结果值</label>
					<div class="col-sm-8">
						<div class="input-group">
					        <span class="input-group-addon">邀请</span>
                            <input type="text" id="" name="seed07" value="<?php  if(isset($item['seed07'])) { ?><?php  echo $item['seed07'];?><?php  } else { ?>45<?php  } ?>"  class="form-control" />
                            <span class="input-group-addon">位好友帮其浇水后显示的下面结果图　并可参与奖品相同值的抽奖</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">结果图</label>
					<div class="col-sm-8">
						<?php  echo tpl_form_field_image('seedimg07',$item['seedimg07']);?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">成熟值</label>
					<div class="col-sm-8">
						<div class="input-group">
					        <span class="input-group-addon">邀请</span>
                            <input type="text" id="" name="seed08" value="<?php  if(isset($item['seed08'])) { ?><?php  echo $item['seed08'];?><?php  } else { ?>60<?php  } ?>"  class="form-control" />
                            <span class="input-group-addon">位好友帮其浇水后显示的下面成熟图　并可参与奖品相同值的抽奖</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">成熟图</label>
					<div class="col-sm-8">
						<?php  echo tpl_form_field_image('seedimg08',$item['seedimg08']);?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">种子简介说明</label>
					<div class="col-sm-8">
						<textarea style="height:60px;" id="seedinfo" name="seedinfo" class="form-control richtext" cols="60"><?php  echo $item['seedinfo'];?></textarea>
					</div>
				</div>				
	        </div>			
        </div>
		<div class="form-group">
		            <div class="col-sm-12">
			            <button type="submit" class="btn btn-primary col-lg-1" name="submit" value="保存种子信息">保存种子信息</button>
			            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		            </div>
	            </div>
    </div>
	</form>
</div>
<script type="text/javascript">

	require(['jquery', 'util'], function($, u){
		$(function(){
			u.editor($('.richtext')[0]);
		});
    });
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>