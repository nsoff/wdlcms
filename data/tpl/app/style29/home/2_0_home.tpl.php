<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/slide', TEMPLATE_INCLUDEPATH)) : (include template('common/slide', TEMPLATE_INCLUDEPATH));?>
<style>
	body{
	font:<?php  echo $_W['styles']['fontsize'];?> <?php  echo $_W['styles']['fontfamily'];?>;
	color:<?php  echo $_W['styles']['fontcolor'];?>;
	padding:0;
	margin:0;
	background-image:url('<?php  if(!empty($_W['styles']['indexbgimg'])) { ?><?php  echo $_W['styles']['indexbgimg'];?><?php  } ?>');
	background-size:cover;
	background-color:<?php  if(empty($_W['styles']['indexbgcolor'])) { ?>#FFF<?php  } else { ?><?php  echo $_W['styles']['indexbgcolor'];?><?php  } ?>;
	<?php  echo $_W['styles']['indexbgextra'];?>
	}
	a{color:<?php  echo $_W['styles']['linkcolor'];?>; text-decoration:none;}
	<?php  echo $_W['styles']['css'];?>
	.box{margin:2.9% 2.8%;}
	.box .box-item{display:block; height:3.6em; overflow:hidden; line-height:3.6em; margin-bottom:0.7%; border-radius:0.25em; text-decoration:none;color:#fff;}
	.box .box-item i{float:left; text-align:center; height:1.36em; min-width:35px; margin:2.8% 7.7% 0 2.5%; font-size:35px; vertical-align:middle; color:#ffffff; overflow:hidden;}
	.box .box-item .next{color:#fff; float:right; display:inline-block; margin:18px 0;}
	.box .box-item span{color:<?php  echo $_W['styles']['fontnavcolor'];?>;display:inline-block; overflow:hidden; width:50%;}
</style>
<div class="box clearfix">
	<?php  $num = 0;?>
	<?php  if(is_array($navs)) { foreach($navs as $nav) { ?>
	<?php  if($num == 0) $bg = '#a3ec8d';?>
	<?php  if($num == 1) $bg = '#58b5e1';?>
	<?php  if($num == 2) $bg = '#fac448';?>
	<?php  if($num == 3) $bg = '#fc6668';?>
	<?php  if($num == 4) $bg = '#68cf8a';?>
	<?php  if($num == 5) $bg = '#667cd0';?>
	<a href="<?php  echo $nav['url'];?>" class="box-item clearfix" style="background:<?php  echo $bg;?>;">
		<?php  if(!empty($nav['icon'])) { ?>
		<i style="background:url(<?php  echo $_W['attachurl'];?><?php  echo $nav['icon'];?>) no-repeat;background-size:cover; width:36px; height:36px;" class="icon"></i>
		<?php  } else { ?>
		<i class="fa <?php  echo $nav['css']['icon']['icon'];?> icon" style="<?php  echo $nav['css']['icon']['style'];?>"></i>
		<?php  } ?>
		<span style="<?php  echo $nav['css']['name'];?>" title="<?php  echo $nav['name'];?>"><?php  echo $nav['name'];?></span>
		<i class="fa fa-chevron-right next" style="font-size:11px;"></i>
	</a>
	<?php  $num++; if($num > 5) $num = 0;?>
	<?php  } } ?>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>