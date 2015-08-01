<?php defined('IN_IA') or exit('Access Denied');?>﻿<head>
	<title>零元购 - <?php  echo $_W['account']['name'];?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- Mobile Devices Support @begin -->
	<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
	<meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
	<meta content="no-cache" http-equiv="pragma">
	<meta content="0" http-equiv="expires">
	<meta content="telephone=no, address=no" name="format-detection">
	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes"> <!-- apple devices fullscreen -->
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<!-- Mobile Devices Support @end -->
    <link href="<?php echo MODULE_URL;?>images/style.css" type="text/css" rel="stylesheet" >
	<link href="<?php echo MODULE_URL;?>js/bootstrap3.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="resource/css/font-awesome.min.css" rel="stylesheet">
	<script type='text/javascript' src="resource/js/lib/jquery-1.11.1.min.js"></script>
	<script type='text/javascript' src='<?php echo MODULE_URL;?>js/bootstrap3.3/js/bootstrap.min.js'></script>
	<script type='text/javascript' src='<?php echo MODULE_URL;?>js/common.js'></script>
</head>
<body style="padding:0px;">
<style>
a:visited,a:active,a:hover{
color:#0088cc;
text-decoration:none;
}
</style>
<div class="indexlist">
<!--今日上线-->
<div class="navlist Fix">
  <ul style="padding-left:5%;">
     <li>
	    <a <?php  if($act=='now') { ?>class="active"<?php  } ?> href="<?php  echo $this->createMobileUrl('list', array('act' =>'now'))?>">正在进行</a>
	 </li>
	 <li>
		<a <?php  if($act=='future') { ?>class="active"<?php  } ?> href="<?php  echo $this->createMobileUrl('list', array('act' =>'future'))?>">即将上线</a>
	 </li>
	 <li>
		<a <?php  if($act=='pass') { ?>class="active"<?php  } ?> href="<?php  echo $this->createMobileUrl('list', array('act' =>'pass'))?>">往期活动</a>
	</li>
  </ul>
</div>

<script>
$(function(){
setInterval(function(){plus_time_char()},1000);
});
</script>
<?php  if(is_array($list)) { foreach($list as $r) { ?>
<div id="channel_img" data-offset="20" data-total="609" data-limit="20" data-img-class="pro">
    <div class="shop_list">
	      <div class="pic" style="position:relative;">
	         <a href="<?php  echo $this->createMobileUrl('detail', array('id' => $r['id']))?>" class="itemList">
	       		<img src="<?php  echo $_W['attachurl'];?><?php  echo $r['thumb'];?>" data-onerror="" data-brandid="7607" class="pro">
	         </a>
	         <div class="goods_msg"></div>
			 <div class="list_name"><?php  echo $r['title'];?></div>
		  </div>
	      <div class="shop_info clearfix">
	         <p class="fl s_brand_name"><span style="font-size:12px;">¥</span><?php  echo $r['zerobuy_price'];?><span class="o-price" style="padding-left:5px;">原价¥<?php  echo $r['price'];?></span></p>
	         <?php  if($act=='future') { ?>
			 <div class="fr s_brand_time brandtime" data-l="<?php  echo $r['starttime'];?>"></div>
			   <?php  } else { ?>
			   <div class="fr s_brand_time brandtime" data-l="<?php  echo $r['endtime'];?>"></div>
			 <?php  } ?>
			
			 <div class="fr" style="color:#868686;">累计<?php  echo $r['join_num'];?>个抽奖码</div>
			 
	      </div>
    </div>
</div>
<?php  } } ?>
<div class="foot_bg">
</div>
<div class="footerbar">
	<a href="<?php  echo $this->createMobileUrl('usercode')?>" style="width:100%;"><i class="fa fa-gift"></i> 抽奖码</a>
</div>
</body>