<?php defined('IN_IA') or exit('Access Denied');?><div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">投票是否关注</label>
			<div class="col-sm-8">
				<label class="radio-inline">
                	<input type="radio" name="subscribe" value="1" <?php  if($reply['subscribe'] == 1) { ?> checked="checked"<?php  } ?>/>关注参与
                </label>
                <label class="radio-inline">
                	<input type="radio" name="subscribe" value="0" <?php  if($reply['subscribe'] == 0) { ?> checked="checked"<?php  } ?>/>任意参与
                </label>
			<div class="help-block">必须关注：关注才能投票、报名。<br />任意参与：只通过高级接口获取openid来判断用户是否已经投票，关注与否无关。<br />注：若设置关注参与，根据微信规定，认证服务号可以直接点击链接进入，其他的任何借用号需通过关健词触发点击进去。</div>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">引导关注网址</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="shareurl" value="<?php  echo $reply['shareurl'];?>" />
								
				<div class="help-block">	你可以在公众号平台素材库里新建图文，把网址填在上面。未关注用户即可通过此网址引导一键关注，也只有官方的公众号平台素材库才能做这个一键关注功能！
				</div>
			</div>
		</div>