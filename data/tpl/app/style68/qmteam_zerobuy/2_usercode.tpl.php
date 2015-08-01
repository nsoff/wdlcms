<?php defined('IN_IA') or exit('Access Denied');?>﻿<head>
	<title>抽奖码 - <?php  echo $_W['account']['name'];?></title>
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
<body >
<style>
a:visited,a:active,a:hover{
color:#0088cc;
text-decoration:none;
}
</style>
<div class="detail-info group-detail">
    <div class="con" >
            <div class="info Fix" >
                <div class="detail-box" style="margin-left:0px;">
                  	<h3 style="margin-top:0px;color:#1288f4;padding-left:25px;" class="tit">抽奖码<span class="pull-right" style="padding-right:50px"><a href="<?php  echo $this->createMobileUrl('list')?>">返回</a></span></h3>
                  	
                <?php  if(empty($code_info)) { ?>你还未参加任何活动，赶快参与吧<?php  } ?>
                <?php  if(is_array($code_info)) { foreach($code_info as $r) { ?>
				    <div class="codelist" style="margin-top:0px;border-bottom:1px solid #ccc;">
                          <div class="detail-tit"><?php  echo $r['title'];?></div>
                          <div>开奖时间：<?php  echo date('Y-m-d H:i:s',$r['endtime'])?></div>
						  <div><p style="color: #868686;">抽奖码：<?php  echo $r['code'];?>&nbsp;&nbsp;&nbsp;
						             <span>
						                <?php  if($r['status'] == 4 && $r['win_code'] == $r['code']) { ?>
					                		<font color="red">中奖</font>
				                		<?php  } else if($r['status'] != 4 ) { ?>
				                		    <font color="#1C86EE">未开奖</font>
				                		<?php  } else { ?>
				                			未中奖
				                		<?php  } ?>
	
					            
						             </span>
						       </p>
						  </div>
						  <?php  if($r['endtime']>$now) { ?><div class="detail-act">进行中</div><?php  } else { ?><div class="detail-act end">已结束</div><?php  } ?>
					</div>
				<?php  } } ?>
                </div>
            </div>

    </div>
</div>

</body>