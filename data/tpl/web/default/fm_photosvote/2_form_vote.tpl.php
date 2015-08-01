<?php defined('IN_IA') or exit('Access Denied');?>		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>是否开启极验验证码</label>
            <div class="col-sm-9 col-xs-12">
               	<label class="radio-inline">
                	<input type="radio" name="iscode" value="1" <?php  if($reply['iscode'] == 1) { ?> checked="checked"<?php  } ?> onchange="fmcodekey()"/>是
                </label>
                <label class="radio-inline">
                	<input type="radio" name="iscode" value="0" <?php  if($reply['iscode'] == 0) { ?> checked="checked"<?php  } ?> onchange="unfmcodekey()"/>否
                </label>				
				<div class="help-block">开启极验验证码，包括会话界面、首页、选手展示页投票验证码，及评论验证码（解决苹果不兼容问题，增强防作弊功能，滑动验证）</div>
            </div>
        </div>
		<div id="fmcodekey" <?php  if($reply['iscode'] == 1) { ?><?php  } else { ?>style="display:none"<?php  } ?>>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 极验验证ID：</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="codekey" value="<?php  echo $reply['codekey'];?>" placeholder="如果开启验证码，这里必须设置"/>
					<div class="help-block">如果开启验证码，此处必须设置 极速验证 ID,获取ID请点击 <a href="http://my.geetest.com/accounts/register/?inviter_email=cwzbooth@126.com" target="_blank">此处</a>，获取方法请点击  <a href="http://bbs.wdlcms.com/forum.php?mod=forumdisplay&fid=50"  target="_blank">获取方法</a>
				</div>
				
            </div>
			</div>
		</div>
		<script>
			function fmcodekey() {
				$('#fmcodekey').show();
			}
			function unfmcodekey() {
				$('#fmcodekey').hide();
			}
			
		</script>
		
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>后台是否开启添加报名</label>
            <div class="col-sm-9 col-xs-12">
               	<label class="radio-inline">
                	<input type="radio" name="addpv" value="1" <?php  if($reply['addpv'] == 1) { ?> checked="checked"<?php  } ?>/>是
                </label>
                <label class="radio-inline">
                	<input type="radio" name="addpv" value="0" <?php  if($reply['addpv'] == 0) { ?> checked="checked"<?php  } ?>/>否
                </label>
				<div class="help-block">后台管理员添加报名开关</div>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>前端是否开启报名</label>
            <div class="col-sm-9 col-xs-12">
               	<label class="radio-inline">
                	<input type="radio" name="addpvapp" value="1" <?php  if($reply['addpvapp'] == 1) { ?> checked="checked"<?php  } ?>/>是
                </label>
                <label class="radio-inline">
                	<input type="radio" name="addpvapp" value="0" <?php  if($reply['addpvapp'] == 0) { ?> checked="checked"<?php  } ?>/>否
                </label>
				<div class="help-block">前端是否允许用户报名</div>
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>投票展示模式</label>
            <div class="col-sm-9 col-xs-12">
				<label for="mediatype" class="checkbox-inline"><input id="mediatype" type="checkbox" name="mediatype" value="1" <?php  if($reply['mediatype'] == 1) { ?>checked="checked"<?php  } ?>> 图片模式</label>
				<label for="mediatypem" class="checkbox-inline"><input id="mediatypem" type="checkbox" name="mediatypem" value="1" <?php  if($reply['mediatypem'] == 1) { ?>checked="checked"<?php  } ?>> 好声音模式</label>
				<label for="mediatypev" class="checkbox-inline"><input id="mediatypev" type="checkbox" name="mediatypev" value="1" <?php  if($reply['mediatypev'] == 1) { ?>checked="checked"<?php  } ?>> 视频模式</label>
				<div class="help-block">投票展示的模式，可以单独图片展示，可以多媒体才艺展示，可多选</div>
               
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>录音室模式</label>
            <div class="col-sm-9 col-xs-12">
                <label class="radio-inline">
                	<input type="radio" name="voicemoshi" value="0" <?php  if($reply['voicemoshi'] == 0) { ?> checked="checked"<?php  } ?>/>模式一
                </label>
                <label class="radio-inline">
                	<input type="radio" name="voicemoshi" value="1" <?php  if($reply['voicemoshi'] == 1) { ?> checked="checked"<?php  } ?>/>模式二
                </label>
				<div class="help-block">录音模式选择，如果一种模式大部分无法正常使用，可以更换另外一种（备注：有部分手机系统不兼容录音。）</div>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>个人图片展示模式</label>
            <div class="col-sm-9 col-xs-12">
               	<label class="radio-inline">
                	<input type="radio" name="moshi" value="1" <?php  if($reply['moshi'] == 1) { ?> checked="checked"<?php  } ?>/>相册模式
                </label>
                <label class="radio-inline">
                	<input type="radio" name="moshi" value="2" <?php  if($reply['moshi'] == 2) { ?> checked="checked"<?php  } ?>/>详情模式
                </label>
            </div>
        </div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">上传说明</label>
			<div class="col-sm-8">
				<textarea name="webinfo" style="height:200px; " class="form-control richtexti" cols="70" rows="100"><?php  echo $reply['webinfo'];?></textarea>				
				<div class="help-block">对上传图片、声音、视频、网络视频的详细说明</div>
			</div>
		</div>
		
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>是否可重复投票</label>
            <div class="col-sm-9 col-xs-12">
               	<label class="radio-inline">
                	<input type="radio" name="cqtp" value="1" <?php  if($reply['cqtp'] == 1) { ?> checked="checked"<?php  } ?>/>是
                </label>
                <label class="radio-inline">
                	<input type="radio" name="cqtp" value="0" <?php  if($reply['cqtp'] == 0) { ?> checked="checked"<?php  } ?>/>否
                </label>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>报名是否需审核</label>
            <div class="col-sm-9 col-xs-12">
               	<label class="radio-inline">
                	<input type="radio" name="tpsh" value="1" <?php  if($reply['tpsh'] == 1) { ?> checked="checked"<?php  } ?>/>是
                </label>
                <label class="radio-inline">
                	<input type="radio" name="tpsh" value="0" <?php  if($reply['tpsh'] == 0) { ?> checked="checked"<?php  } ?>/>否
                </label>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>是否开启评论</label>
            <div class="col-sm-9 col-xs-12">
               	<label class="radio-inline">
                	<input type="radio" name="isbbsreply" value="1" <?php  if($reply['isbbsreply'] == 1) { ?> checked="checked"<?php  } ?>/>是
                </label>
                <label class="radio-inline">
                	<input type="radio" name="isbbsreply" value="0" <?php  if($reply['isbbsreply'] == 0) { ?> checked="checked"<?php  } ?>/>否
                </label>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>是否开启弹幕预设</label>
            <div class="col-sm-9 col-xs-12">
               	<label class="radio-inline">
                	<input type="radio" name="tmyushe" value="1" <?php  if($reply['tmyushe'] == 1) { ?> checked="checked"<?php  } ?>/>是
                </label>
                <label class="radio-inline">
                	<input type="radio" name="tmyushe" value="0" <?php  if($reply['tmyushe'] == 0) { ?> checked="checked"<?php  } ?>/>否
                </label>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>弹幕评论是否同步到数据库</label>
            <div class="col-sm-9 col-xs-12">
               	<label class="radio-inline">
                	<input type="radio" name="tmreply" value="1" <?php  if($reply['tmreply'] == 1) { ?> checked="checked"<?php  } ?>/>是
                </label>
                <label class="radio-inline">
                	<input type="radio" name="tmreply" value="0" <?php  if($reply['tmreply'] == 0) { ?> checked="checked"<?php  } ?>/>否
                </label>
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>是否开启IP作弊限制</label>
            <div class="col-sm-9 col-xs-12">
               	<label class="radio-inline">
                	<input type="radio" name="isipv" value="1" <?php  if($reply['isipv'] == 1) { ?> checked="checked"<?php  } ?>/>是
                </label>
                <label class="radio-inline">
                	<input type="radio" name="isipv" value="0" <?php  if($reply['isipv'] == 0) { ?> checked="checked"<?php  } ?>/>否
                </label>				
				<div class="help-block">是否开启IP作弊限制</div>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>存在作弊ip后是否继续允许</label>
            <div class="col-sm-9 col-xs-12">
               	<label class="radio-inline">
                	<input type="radio" name="ipturl" value="0" <?php  if($reply['ipturl'] == 0) { ?> checked="checked"<?php  } ?>/>允许
                </label>
                <label class="radio-inline">
                	<input type="radio" name="ipturl" value="1" <?php  if($reply['ipturl'] == 1) { ?> checked="checked"<?php  } ?>/>不允许
                </label>				
				<div class="help-block">存在作弊ip后是否继续允许访问等</div>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>存在作弊ip是否允许投票、评论</label>
            <div class="col-sm-9 col-xs-12">
               	<label class="radio-inline">
                	<input type="radio" name="ipstopvote" value="0" <?php  if($reply['ipstopvote'] == 0) { ?> checked="checked"<?php  } ?>/>允许
                </label>
                <label class="radio-inline">
                	<input type="radio" name="ipstopvote" value="1" <?php  if($reply['ipstopvote'] == 1) { ?> checked="checked"<?php  } ?>/>不允许
                </label>				
				<div class="help-block">存在作弊ip后是否允许投票、评论等</div>
            </div>
        </div>
		
		 <div class="form-group">
 			<label class="col-xs-12 col-sm-3 col-md-2 control-label">报名照片数限制</label>
            <div class="col-sm-9 col-xs-6">
				<div class="input-group">
					<span class="input-group-addon">每个参赛者报名时最多上传</span>
					<input type="text" class="form-control" name="tpxz" value="<?php  echo $reply['tpxz'];?>" />
					<span class="input-group-addon">张照片(最多为8)</span>
				</div>
            </div>
        </div>
		 <div class="form-group">
 			<label class="col-xs-12 col-sm-3 col-md-2 control-label">报名照片自动缩略宽度</label>
            <div class="col-sm-9 col-xs-6">
				<div class="input-group">
					<span class="input-group-addon">每个参赛者报名上传图片自动缩略宽度</span>
					<input type="text" class="form-control" name="autolitpic" value="<?php  echo $reply['autolitpic'];?>" />
					<span class="input-group-addon">PX(像素)</span>
				</div>
				<div class="help-block">不了解 默认即可,数值越大，图像越清晰，占用空间越大！</div>
            </div>
        </div>
		
		 <div class="form-group">
 			<label class="col-xs-12 col-sm-3 col-md-2 control-label">报名照片自动缩略质量</label>
            <div class="col-sm-9 col-xs-6">
				<div class="input-group">
					<span class="input-group-addon">每个参赛者报名上传图片自动缩略质量</span>
					<input type="text" class="form-control" name="autozl" value="<?php  echo $reply['autozl'];?>" />
					<span class="input-group-addon">%</span>
				</div>
				<div class="help-block">请填写 1 - 100的整数，数值越大，图像越清晰，占用空间越大！</div>
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>是否开启投票倒计时</label>
            <div class="col-sm-9 col-xs-12">
               	<label class="radio-inline">
                	<input type="radio" name="isdaojishi" value="1" <?php  if($reply['isdaojishi'] == 1) { ?> checked="checked"<?php  } ?>/>是
                </label>
                <label class="radio-inline">
                	<input type="radio" name="isdaojishi" value="0" <?php  if($reply['isdaojishi'] == 0) { ?> checked="checked"<?php  } ?>/>否
                </label>
            </div>
        </div>
		 <div class="form-group">
 			<label class="col-xs-12 col-sm-3 col-md-2 control-label">用户投票时间</label>
            <div class="col-sm-9 col-xs-6">
				<div class="input-group">
					<span class="input-group-addon">每个用户拥有</span>
					<input type="text" class="form-control" name="votetime" value="<?php  echo $reply['votetime'];?>" />
					<span class="input-group-addon">天的投票时间</span>
				</div>
				<div class="help-block">请填写正整数，时间单位为 天</div>
            </div>
        </div>
		
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">用户投票时间结束提示语</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="ttipvote" value="<?php  echo $reply['ttipvote'];?>" />
			<div class="help-block">用户投票时间结束提示语</div>
			</div>
		</div>
		 <div class="form-group">
 			<label class="col-xs-12 col-sm-3 col-md-2 control-label">每日投票统一ip次数限制</label>
            <div class="col-sm-9 col-xs-6">
				<div class="input-group">
					<span class="input-group-addon">每天每个IP投票</span>
					<input type="text" class="form-control" name="limitip" value="<?php  echo $reply['limitip'];?>" />
					<span class="input-group-addon">次自动对齐开启作弊模式</span>
				</div>
            </div>
        </div>
		 <div class="form-group">
 			<label class="col-xs-12 col-sm-3 col-md-2 control-label">每日投票数限制</label>
            <div class="col-sm-9 col-xs-6">
				<div class="input-group">
					<span class="input-group-addon">每天每个用户可给</span>
					<input type="text" class="form-control" name="daytpxz" value="<?php  echo $reply['daytpxz'];?>" />
					<span class="input-group-addon">个选手投票</span>
				</div>
            </div>
        </div>
		 <div class="form-group">
 			<label class="col-xs-12 col-sm-3 col-md-2 control-label">同一选手投票数限制</label>
            <div class="col-sm-9 col-xs-6">
				<div class="input-group">
					<span class="input-group-addon">每天每个用户可给同一选手投</span>
					<input type="text" class="form-control" name="dayonetp" value="<?php  echo $reply['dayonetp'];?>" />
					<span class="input-group-addon">次票</span>
				</div>
            </div>
        </div>
		 <div class="form-group">
 			<label class="col-xs-12 col-sm-3 col-md-2 control-label">同一选手最高投票数</label>
            <div class="col-sm-9 col-xs-6">
				<div class="input-group">
					<span class="input-group-addon">每个用户可给同一选手总共投</span>
					<input type="text" class="form-control" name="allonetp" value="<?php  echo $reply['allonetp'];?>" />
					<span class="input-group-addon">次票</span>
				</div>
            </div>
        </div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">报名提示语</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="userinfo" value="<?php  echo $reply['userinfo'];?>" />
			<div class="help-block">用户参赛报名时的提示语</div>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">投票成功提示语</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="votesuccess" value="<?php  echo $reply['votesuccess'];?>" />
			<div class="help-block">此设置用于投票成功提示语<br />参赛者编号、姓名 可用变量：<br/>#编号# （参赛者编号）<br/>#参赛人名#（参与人昵称或者真实姓名）</div>
			</div>
		</div>
		
