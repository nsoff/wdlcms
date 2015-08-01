<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/header-gw', TEMPLATE_INCLUDEPATH));?>
<ol class="breadcrumb">
	<li><a href="./?refresh"><i class="fa fa-home"></i></a></li>
	<li><a href="<?php  echo url('system/welcome');?>">系统</a></li>
	<li class="active">系统信息</li>
</ol>
<div class="main">
	<div class="panel panel-info">
		<div class="panel-heading">用户信息</div>
		<div class="panel-body table-responsive">
		<table class="table table-hover">
			<tr>
				<th style="width:250px;">用户ID</th>
				<td><?php  echo $info['uid'];?></td>
			</tr>
			<tr>
				<th>当前公众号</th>
				<td><?php  echo $info['account'];?></td>
			</tr>
		</table>
		</div>
	</div>
	
	<div class="panel panel-info">
		<div class="panel-heading">系统信息</div>
		<div class="panel-body table-responsive">
		<table class="table table-hover">
			<tr>
				<th style="width:250px;">微动力程序版本</th>
				<td>Weizan <?php  echo IMS_VERSION;?> Release  <?php  echo IMS_RELEASE_DATE;?> &nbsp; &nbsp; <a href="http://www.wdlcms.com" target="_blank">查看最新版本</a></td>
			</tr>
			<tr>
				<th>产品系列</th>
				<td><?php  if(IMS_FAMILY == 'v') { ?>
						您的产品是开源版, 没有购买商业授权, 不能用于商业用途
					<?php  } else { ?>
						您的产品是商业版
					<?php  } ?>
				</td>
			</tr>
			<tr>
				<th>服务器系统</th>
				<td><?php  echo $info['os'];?></td>
			</tr>
			<tr>
				<th>PHP版本 </th>
				<td>PHP Version <?php  echo $info['php'];?></td>
			</tr>
			<tr>
				<th>服务器软件</th>
				<td><?php  echo $info['sapi'];?></td>
			</tr>
			<tr>
				<th>服务器 MySQL 版本</th>
				<td><?php  echo $info['mysql']['version'];?></td>
			</tr>
			<tr>
				<th>上传许可</th>
				<td><?php  echo $info['limit'];?></td>
			</tr>
			<tr>
				<th>当前数据库尺寸</th>
				<td><?php  echo $info['mysql']['size'];?></td>
			</tr>
			<tr>
				<th>当前附件根目录</th>
				<td><?php  echo $info['attach']['url'];?></td>
			</tr>
			<tr>
				<th>当前附件尺寸</th>
				<td><?php  echo $info['attach']['size'];?></td>
			</tr>
		</table>
		</div>
	</div>

	<?php  if($_W['isfounder']) { ?>
		<div class="panel panel-info">
			<div class="panel-heading">微动力开发团队</div>
			<div class="panel-body table-responsive">
			<table class="table table-hover">
				<tr>
					<th style="width:250px;">版权所有</th>
					<td><a href="http://www.wdlcms.com/" target="_blank"><b>012WZ Team</b></a></td>
				</tr>
				<tr>
					<th>Team 成员</th>
					<td>
						<a href="http://bbs.wdlcms.com/?10906" class="lightlink2 smallfont" target="_blank">曾进</a>; &nbsp;
						<a href="http://bbs.wdlcms.com/?83" class="lightlink2 smallfont" target="_blank">李明 (李工)</a>; &nbsp;
						<a href="http://bbs.wdlcms.com/?19511" class="lightlink2 smallfont" target="_blank">吴龙 (Jlone)</a>; &nbsp;
						<a href="http://bbs.wdlcms.com/?38439" class="lightlink2 smallfont" target="_blank">杨慧锋 (灯火阑珊)</a>; &nbsp;
						<a href="http://bbs.wdlcms.com/?64864" class="lightlink2 smallfont" target="_blank">段彪武 </a>; &nbsp;
						<a href="http://bbs.wdlcms.com/?64869" class="lightlink2 smallfont" target="_blank">姚晶晶 </a>; &nbsp;
						<a href="http://bbs.wdlcms.com/?56310" class="lightlink2 smallfont" target="_blank">李珊 (微微)</a>; &nbsp;
						<a href="http://bbs.wdlcms.com/?52995" class="lightlink2 smallfont" target="_blank">杨欣雨 (小雨)</a>; &nbsp;
						<a href="http://bbs.wdlcms.com/?56416" class="lightlink2 smallfont" target="_blank">陈龙 (龙龙)</a>; &nbsp;
						<a href="http://bbs.wdlcms.com/?11877" class="lightlink2 smallfont" target="_blank">赵小雷 (微微)</a>; &nbsp;
					</td>
				</tr>
				<tr>
					<th>相关链接</th>
					<td>
						<a href="http://www.wdlcms.com/" class="lightlink2" target="_blank">公司网站</a>,
						<a href="http://www.wdlcms.com/" class="lightlink2" target="_blank">购买授权</a>,
						<a href="http://bbs.wdlcms.com/" class="lightlink2" target="_blank">更多模块</a>,
						<a href="http://bbs.wdlcms.com/wiki/" class="lightlink2" target="_blank">文档</a>,
						<a href="http://bbs.wdlcms.com/" class="lightlink2" target="_blank">讨论区</a>
					</td>
				</tr>
			</table>
			</div>
		</div>
	<?php  } ?>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/footer-gw', TEMPLATE_INCLUDEPATH));?>