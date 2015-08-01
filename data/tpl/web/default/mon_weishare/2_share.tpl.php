<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<ul class="nav nav-tabs">
	<li <?php  if($operation== 'post') { ?>class="active"<?php  } ?>><a
		href="<?php  echo $this->createWebUrl('share', array( 'op' => 'post'));?>">添加</a></li>
	<li <?php  if($operation== 'display') { ?>class="active"<?php  } ?>><a
		href="<?php  echo $this->createWebUrl('share', array( 'op' => 'display'));?>">管理</a></li>

</ul>
<?php  if($operation == 'post') { ?>
<div class="main">
	<form action="" method="post" class="form-horizontal form"
		enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php  echo $item['id'];?>" />

		<div class="panel panel-default">
			<div class="panel-heading">
				活动设置
			</div>
			<div class="panel-body">

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>卡片名称：</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="cardname" class="form-control"  value="<?php  echo $item['cardname'];?>" />
					</div>
				</div>


				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>卡片提示语：</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="tip" class="form-control" value="<?php  echo $item['tip'];?>" />
					</div>
				</div>


				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>卡片数量：</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="count" class="form-control" value="<?php  echo $item['count'];?>" />
					</div>
				</div>



				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>活动版权：</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="copyright" class="form-control"
							   value="<?php  echo $item['copyright'];?>" />
					</div>
				</div>


				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>活动结束时间：</label>
					<div class="col-sm-9 col-xs-12">
						<?php  echo tpl_form_field_date('endtime', $item['endtime'], true)?>
					</div>
				</div>



				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>好友总助力次数限制：</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="totallimit" class="form-control"
							   value="<?php  echo $item['totallimit'];?>" /><font color='red'>(对应限制类型1)</font>
					</div>
				</div>




				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>好友每天助力限制次数：</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="helplimit" class="form-control"
							   value="<?php  echo $item['helplimit'];?>" />
						<font color='red'>(对应限制类型2)</font>
					</div>
				</div>




				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">限制类型：</label>
					<div class="col-sm-9 col-xs-12">
						<input type="radio" name="limittype" value="0" <?php  if($item['limittype'] == 0) { ?>checked="checked"<?php  } ?>>总助力次数限制  &nbsp;<font color='red'>*</font>(选择此项时请在上面输入总助力次数限制)&nbsp;&nbsp; <input type="radio" name="limittype" value="1" <?php  if($item['limittype'] == 1) { ?>checked="checked"<?php  } ?>>每天助力限制 <font color='red'>*</font>(选择此项时请在上面输入每天限制次数)
					</div>
				</div>



				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>是否显示参加总人数：</label>
					<div class="col-sm-9 col-xs-12">
						<input type="radio" name="showu" value="0" <?php  if($item['"showu"'] == 0) { ?>checked="checked"<?php  } ?>>否  &nbsp; <input type="radio" name="showu" value="1" <?php  if($item['showu'] == 1) { ?>checked="checked"<?php  } ?>/>是
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>显示前：</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="sortcount" class="form-control"
							   value="<?php  echo $item['sortcount'];?>" />人排名
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>背景颜色：</label>
					<div class="col-sm-9 col-xs-12">
						<?php  echo tpl_form_field_color('background', $item['background'])?>
					</div>
				</div>




				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>活动标题：</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="title" class="form-control"
							   value="<?php  echo $item['title'];?>" />
					</div>
				</div>






				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>活动图片：</label>
					<div class="col-sm-9 col-xs-12">
						<?php  echo tpl_form_field_image('thumb', $item['thumb']);?><span><font color="red">建议大小(640*400)</font></span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">最高得分限制：</label>
					<div class="col-sm-9 col-xs-12">
						<input type="number" class="form-control" placeholder="得分极限" name="max" value="<?php  echo $item['max'];?>"/>
					</div>
				</div>



				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">初始分值：</label>
					<div class="col-sm-9 col-xs-12">
						<input type="number" class="form-control" placeholder="初始分支" name="start" value="<?php  echo $item['start'];?>"/>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">积分单位：</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" class="form-control" placeholder="积分单位" name="unit" value="<?php  echo $item['unit'];?>"/>
					</div>
				</div>


				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">固定助力积分：</label>
					<div class="col-sm-9 col-xs-12">
						<input type="number" class="form-control" placeholder="助力积分" name="step" value="<?php  echo $item['step'];?>"/>
					</div>
				</div>


				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">随机助力积分限制：</label>
					<div class="col-sm-9 col-xs-12">
						<input type="number" class="form-control" placeholder="助力积分" name="steprandom" value="<?php  echo $item['steprandom'];?>"/>
					</div>
				</div>



				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">助力积分方式：</label>
					<div class="col-sm-9 col-xs-12">
						<input type="radio" name="steptype" value="0" <?php  if($item['steptype'] == 0) { ?>checked="checked"<?php  } ?>> 固定&nbsp;&nbsp;&nbsp; <input type="radio" name="steptype" value="1" <?php  if($item['steptype'] == 1) { ?>checked="checked"<?php  } ?>>随机
					</div>
				</div>



				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">活动背景：</label>
					<div class="col-sm-9 col-xs-12">
						<?php  echo tpl_form_field_image('image', $item['image']);?><span><font color="red">建议大小(640*1130)</font>
					</div>
				</div>



				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">活动规则：</label>
					<div class="col-sm-9 col-xs-12">
						<textarea style="height: 400px; width: 100%;"
								  class="span7 richtext-clone" name="rule" cols="70"><?php  echo $item['rule'];?></textarea>
					</div>
				</div>



				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">关注引导素材地址：</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" class="form-control"
							   placeholder="关注引导素材" name="url" value="<?php  echo $item['url'];?>" />
					</div>
				</div>


				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">分享图标：</label>
					<div class="col-sm-9 col-xs-12">
						<?php  echo tpl_form_field_image('shareIcon', $item['shareIcon']);?>
					</div>
				</div>


				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">分享标题：</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="shareTitle" class="form-control" value="<?php  echo $item['shareTitle'];?>">
					</div>
				</div>


				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">分享内容：</label>
					<div class="col-sm-9 col-xs-12">
						<textarea rows="3" cols="20" class="form-control" id="shareContent" name="shareContent"><?php  echo $item['shareContent'];?></textarea>
					</div>
				</div>


				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<input name="submit" type="submit" value="提交"
							   class="btn btn-primary span3"> <input type="hidden"
																	 name="token" value="<?php  echo $_W['token'];?>" />
					</div>
				</div>




			</div>

	</div>

	</form>
</div>


<script>


	require(['jquery', 'util'], function($, u){
		$(function(){
			u.editor($('.richtext-clone')[0]);

		});
	});

</script>




<?php  } else if($operation == 'display') { ?>
<div class="main">
<div class="alert alert-error">
  请务必正确配置公众账号的AppId 和AppSecret 的值,并配置OAUTH2.0 授权回调页面域名。订阅号可以借用服务号的appId 和appSecret值，但服务号的授权域名需填写本系统站点域名。
</div>
	<div style="padding: 15px;">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th >活动名称</th>
					<th >活动链接</th>
					<th>活动图片</th>
					

					<th >操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
					<td>
					
					<?php  echo $item['title'];?></td>
				
				
					<td><input type="text" class="form-control" value="<?php  echo $_W['siteroot'];?>app<?php  echo str_replace('./','/',$this->createMobileUrl('Auth',array("id"=>$item['id'],"au"=>0)))?>" /></td>
				
				
					<td><img src="<?php  echo $_W['attachurl'];?><?php  echo $item['thumb'];?>" style="width: 100px;height: 100px"></td>
					

					<td style="text-align: right; width: 400px">
					<a
						href="<?php  echo $this->createWebUrl('shareuser', array( 'sid' => $item['id']))?>"
						title="报名用户" class="btn btn-small">领卡用户<i class="glyphicon glyphicon-user"></i></a>
					
						<a
						href="<?php  echo $this->createWebUrl('share', array('id' => $item['id'], 'op' => 'post'))?>"
						title="编辑" class="btn btn-small">编辑<i class="glyphicon glyphicon-edit"></i></a> <a
						href="<?php  echo $this->createWebUrl('share', array( 'id' => $item['id'], 'op' => 'delete'))?>"
						onclick="return confirm('此操作不可恢复，确认删除？');return false;" title="删除"
						class="btn btn-small">删除<i class="glyphicon glyphicon-remove"></i></a></td>
				</tr>
				<?php  } } ?>
			</tbody>

		</table>
		<?php  echo $pager;?>
	</div>
</div>
<?php  } ?> <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
