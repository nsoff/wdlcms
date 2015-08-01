<?php defined('IN_IA') or exit('Access Denied');?>	<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>是否显示最上方导航</label>
            <div class="col-sm-9 col-xs-12">
               	<label class="radio-inline">
                	<input type="radio" name="istopheader" value="1" <?php  if($reply['istopheader'] == 1) { ?> checked="checked"<?php  } ?>/>是
                </label>
                <label class="radio-inline">
                	<input type="radio" name="istopheader" value="0" <?php  if($reply['istopheader'] == 0) { ?> checked="checked"<?php  } ?>/>否
                </label>
				<div class="help-block">前端是否显示最上方导航</div>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>前端是否开启公告</label>
            <div class="col-sm-9 col-xs-12">
               	<label class="radio-inline">
                	<input type="radio" name="ipannounce" value="1" <?php  if($reply['ipannounce'] == 1) { ?> checked="checked"<?php  } ?>/>是
                </label>
                <label class="radio-inline">
                	<input type="radio" name="ipannounce" value="0" <?php  if($reply['ipannounce'] == 0) { ?> checked="checked"<?php  } ?>/>否
                </label>
				<div class="help-block">前端是否开启公告</div>
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>首页是否显示说明</label>
            <div class="col-sm-9 col-xs-12">
               	<label class="radio-inline">
                	<input type="radio" name="isedes" value="1" <?php  if($reply['isedes'] == 1) { ?> checked="checked"<?php  } ?>/>是
                </label>
                <label class="radio-inline">
                	<input type="radio" name="isedes" value="0" <?php  if($reply['isedes'] == 0) { ?> checked="checked"<?php  } ?>/>否
                </label>				
				<div class="help-block"></div>
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>首页显示模式</label>
            <div class="col-sm-9 col-xs-12">
              	<label class="radio-inline">
                	<input type="radio" name="tmoshi" value="0" <?php  if($reply['tmoshi'] == 0) { ?> checked="checked"<?php  } ?>/>默认，瀑布双列
                </label>
                <label class="radio-inline">
                	<input type="radio" name="tmoshi" value="1" <?php  if($reply['tmoshi'] == 1) { ?> checked="checked"<?php  } ?>/>单列显示
                </label>
                <label class="radio-inline">
                	<input type="radio" name="tmoshi" value="2" <?php  if($reply['tmoshi'] == 2) { ?> checked="checked"<?php  } ?>/>双列显示
                </label>
                <label class="radio-inline">
                	<input type="radio" name="tmoshi" value="3" <?php  if($reply['tmoshi'] == 3) { ?> checked="checked"<?php  } ?>/>三列显示
                </label>
            </div>
        </div>
		 <div class="form-group">
 			<label class="col-xs-12 col-sm-3 col-md-2 control-label">首页列表显示数</label>
            <div class="col-sm-9 col-xs-6">
				<div class="input-group">
					<span class="input-group-addon">每页显示</span>
					<input type="text" class="form-control" name="indextpxz" value="<?php  echo $reply['indextpxz'];?>" />
					<span class="input-group-addon">位参与用户到投票活动区</span>
				</div>
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>首页显示顺序</label>
            <div class="col-sm-9 col-xs-12">
               	<label class="radio-inline">
					<input type="radio" name="indexorder" value="1" <?php  if($reply['indexorder'] == 1) { ?> checked="checked"<?php  } ?>/>
					按最新倒叙			
                </label>
				<label class="radio-inline">
					<input type="radio" name="indexorder" value="11" <?php  if($reply['indexorder'] == 11) { ?> checked="checked"<?php  } ?>/>
                	按最新顺序
                </label>
				<label class="radio-inline">
					<input type="radio" name="indexorder" value="2" <?php  if($reply['indexorder'] == 2) { ?> checked="checked"<?php  } ?>/>	
                	按ID倒叙
                </label>
				<label class="radio-inline">
					<input type="radio" name="indexorder" value="22" <?php  if($reply['indexorder'] == 22) { ?> checked="checked"<?php  } ?>/>
					按ID顺序					
                </label>
				<label class="radio-inline">
					<input type="radio" name="indexorder" value="3" <?php  if($reply['indexorder'] == 3) { ?> checked="checked"<?php  } ?>/>
                	按投票倒叙
                </label>
				<label class="radio-inline">
					<input type="radio" name="indexorder" value="3" <?php  if($reply['indexorder'] == 33) { ?> checked="checked"<?php  } ?>/>
					按投票顺序	
                </label>
				<label class="radio-inline">	
					<input type="radio" name="indexorder" value="4" <?php  if($reply['indexorder'] == 4) { ?> checked="checked"<?php  } ?>/>
                	按人气倒叙
                </label>
				<label class="radio-inline">
					<input type="radio" name="indexorder" value="44" <?php  if($reply['indexorder'] == 44) { ?> checked="checked"<?php  } ?>/>
                	按人气顺序
                </label>
				<label class="radio-inline">	
					<input type="radio" name="indexorder" value="5" <?php  if($reply['indexorder'] == 5) { ?> checked="checked"<?php  } ?>/>
                	按多媒体倒叙
                </label>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>排行榜显示</label>
            <div class="col-sm-9 col-xs-12">
               	<label class="radio-inline">
                	<input type="radio" name="indexpx" value="1" <?php  if($reply['indexpx'] == 1) { ?> checked="checked"<?php  } ?>/>按最新排序
                </label>
                <label class="radio-inline">
                	<input type="radio" name="indexpx" value="0" <?php  if($reply['indexpx'] == 0) { ?> checked="checked"<?php  } ?>/>按投票数排序
                </label>
                <label class="radio-inline">
                	<input type="radio" name="indexpx" value="2" <?php  if($reply['indexpx'] == 2) { ?> checked="checked"<?php  } ?>/>按人气排序
                </label>
            </div>
        </div>
		 <div class="form-group">
 			<label class="col-xs-12 col-sm-3 col-md-2 control-label">排行榜显示个数</label>
            <div class="col-sm-9 col-xs-6">
				<div class="input-group">
					<span class="input-group-addon">每加载一次显示</span>
					<input type="text" class="form-control" name="phbtpxz" value="<?php  echo $reply['phbtpxz'];?>" />
					<span class="input-group-addon">位参与用户显示到列表页</span>
				</div>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>赞助商显示模式</label>
            <div class="col-sm-9 col-xs-12">
               	<label class="radio-inline">
                	<input type="radio" name="zanzhums" value="1" <?php  if($reply['zanzhums'] == 1) { ?> checked="checked"<?php  } ?>/>默认，双列
                </label>
                <label class="radio-inline">
                	<input type="radio" name="zanzhums" value="2" <?php  if($reply['zanzhums'] == 2) { ?> checked="checked"<?php  } ?>/>单列显示
                </label>
            </div>
        </div>
	<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">虚拟人气显示</label>
			<div class="col-sm-8">
				<div class="input-group">
					<span class="input-group-addon">首页显示</span>
					<input type="text" name="xuninum" id="xuninum" class="form-control" value="<?php  echo $reply['xuninum'];?>" />
					<span class="input-group-addon">位虚拟人气　此数值随下面设置自动变化</span>
					<input type="text" name="hits" id="hits" class="form-control"  value="<?php  echo $reply['hits'];?>" />
					<span class="input-group-addon">位真实点击</span>
				</div>
				
			</div>
			<div class="help-block"></div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">虚拟人气设置</label>
			<div class="col-sm-8">
				<div class="input-group">
					<span class="input-group-addon">每次间隔</span>
					<input type="text" name="xuninumtime" id="xuninumtime" class="form-control" value="<?php  echo $reply['xuninumtime'];?>" />
					<span class="input-group-addon">秒　系统自动增加</span>
					<input type="text" name="xuninuminitial" id="xuninuminitial" class="form-control" value="<?php  echo $reply['xuninuminitial'];?>" />
					<span class="input-group-addon">至</span>
					<input type="text" name="xuninumending" id="xuninumending" class="form-control" value="<?php  echo $reply['xuninumending'];?>" />
					<span class="input-group-addon">虚拟人气参与本活动</span>
				</div>
			</div>
			<div class="help-block"></div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">报名参数项</label>
			 <div class="col-sm-9 col-xs-12">
				<div style="border:1px #eee dashed; padding:10px;background:#F5F5F5;">
					<label for="isrealname" class="checkbox-inline"><input id="isrealname" type="checkbox" name="isrealname" value="1" <?php  if($reply['isrealname'] == 1) { ?>checked="checked"<?php  } ?>> 姓名</label>
				    <label for="ismobile" class="checkbox-inline"><input id="ismobile" type="checkbox" name="ismobile" value="1" <?php  if($reply['ismobile'] == 1) { ?>checked="checked"<?php  } ?>> 手机</label>
					<label for="isweixin" class="checkbox-inline"><input id="isweixin" type="checkbox" name="isweixin" value="1" <?php  if($reply['isweixin'] == 1) { ?>checked="checked"<?php  } ?>> 微信号</label>
					<label for="isqqhao" class="checkbox-inline"><input id="isqqhao" type="checkbox" name="isqqhao" value="1" <?php  if($reply['isqqhao'] == 1) { ?>checked="checked"<?php  } ?>> QQ号</label>
					<label for="isemail" class="checkbox-inline"><input id="isemail" type="checkbox" name="isemail" value="1" <?php  if($reply['isemail'] == 1) { ?>checked="checked"<?php  } ?>> 邮箱</label>
					<label for="isjob" class="checkbox-inline"><input id="isjob" type="checkbox" name="isjob" value="1" <?php  if($reply['isjob'] == 1) { ?>checked="checked"<?php  } ?>> 职业</label>
					<label for="isxingqu" class="checkbox-inline"><input id="isxingqu" type="checkbox" name="isxingqu" value="1" <?php  if($reply['isxingqu'] == 1) { ?>checked="checked"<?php  } ?>> 兴趣</label>
					<label for="isaddress" class="checkbox-inline"><input id="isaddress" type="checkbox" name="isaddress" value="1" <?php  if($reply['isaddress'] == 1) { ?>checked="checked"<?php  } ?>> 地址</label>
				</div>
			<div class="help-block">必需选择一个参数报名 活动开启后最好不</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">赞助商显示位置</label>
			 <div class="col-sm-9 col-xs-12">
				<div style="border:1px #eee dashed; padding:10px;background:#F5F5F5;">
					<label for="isindex" class="checkbox-inline"><input id="isindex" type="checkbox" name="isindex" value="1" <?php  if($reply['isindex'] == 1) { ?>checked="checked"<?php  } ?>> 首页</label>
				    <label for="isvotexq" class="checkbox-inline"><input id="isvotexq" type="checkbox" name="isvotexq" value="1" <?php  if($reply['isvotexq'] == 1) { ?>checked="checked"<?php  } ?>> 投票详情页</label>
					<label for="ispaihang" class="checkbox-inline"><input id="ispaihang" type="checkbox" name="ispaihang" value="1" <?php  if($reply['ispaihang'] == 1) { ?>checked="checked"<?php  } ?>> 排行页</label>
					<label for="isreg" class="checkbox-inline"><input id="isreg" type="checkbox" name="isreg" value="1" <?php  if($reply['isreg'] == 1) { ?>checked="checked"<?php  } ?>> 报名页</label>
					<label for="isdes" class="checkbox-inline"><input id="isdes" type="checkbox" name="isdes" value="1" <?php  if($reply['isdes'] == 1) { ?>checked="checked"<?php  } ?>> 介绍页</label>
				</div>
			<div class="help-block">必需选择一个参数报名 活动开启后最好不要更改</div>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">自定义拉票文字</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="lapiao" value="<?php  echo $reply['lapiao'];?>" />								
				<div class="help-block">为预防微信封号，自定义拉票文字，不超过5个字</div>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">自定义分享文字</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="sharename" value="<?php  echo $reply['sharename'];?>" />								
				<div class="help-block">为预防微信封号，自定义分享文字，不超过2个字</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">自定义投票文字</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="tpname" value="<?php  echo $reply['tpname'];?>" />								
				<div class="help-block">自定义投票文字，不超过4个字</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">自定义投票数文字</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="tpsname" value="<?php  echo $reply['tpsname'];?>" />								
				<div class="help-block">自定义投票数文字，不超过3个字</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">自定义人气文字</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="rqname" value="<?php  echo $reply['rqname'];?>" />								
				<div class="help-block">自定义人气文字，不超过3个字</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">统计参赛人数名称</label>			
			<div class="col-sm-5">				
				<input type="text" class="form-control" name="csrs" value="<?php  echo $reply['csrs'];?>" />
				<div class="help-block">统计区参赛人数的显示名称，设置为空则不显示</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">统计累计投票名称</label>			
			<div class="col-sm-5">				
				<input type="text" class="form-control" name="ljtp" value="<?php  echo $reply['ljtp'];?>" />
				<div class="help-block">统计区累计投票的显示名称，设置为空则不显示</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">统计参与人数名称</label>			
			<div class="col-sm-5">				
				<input type="text" class="form-control" name="cyrs" value="<?php  echo $reply['cyrs'];?>" />
				<div class="help-block">统计区参与人数的显示名称，设置为空则不显示</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">版权显示</label>
			<div class="col-sm-8">
				<label class="radio-inline">
                	<input type="radio" name="iscopyright" value="0" <?php  if($reply['iscopyright'] == 0) { ?> checked="checked"<?php  } ?>/>公众号版权
                </label>
                <label class="radio-inline">
                	<input type="radio" name="iscopyright" value="1" <?php  if($reply['iscopyright'] == 1) { ?> checked="checked"<?php  } ?>/>自定义版权
                </label>				
			</div>
			
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-2 col-md-2  control-label">版权设置</label>
			<div class="col-sm-2">
				<input type="text" class="form-control span2" name="copyright" value="<?php  echo $reply['copyright'];?>" />
			</div>
			<div class="col-sm-5">				
				<input type="text" class="form-control span5" name="copyrighturl" value="<?php  echo $reply['copyrighturl'];?>" />
				<div class="help-block">需要输入完整的链接如：http://www.qq.com/</div>
			</div>
		</div>
		<!--
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">站长统计代码</label>
            <div class="col-sm-9 col-xs-12">
               	<textarea style=" height:200px;" id='tj' name="tj" class="form-control richtextinfo"><?php  echo $reply['tj'];?></textarea>
				<div class="help-block">填写站长统计代码，不需要就留空</div>
            </div>
        </div>-->