<?php defined('IN_IA') or exit('Access Denied');?>﻿<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>  
    <title><?php  echo $reply['title'];?></title>
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">    
	<meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
	<meta http-equiv="description" content="This is my page">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1,maximum-scale=1.0,user-scalable=no">
	<meta content="black" name="apple-mobile-web-app-status-bar-style" />
	<meta content="telephone=no" name="format-detection" />
	<meta http-equiv="X-UA-Compatible" content="IE=10; IE=9; IE=8; IE=7; IE=EDGE">
	<meta name="robots" content="index,follow" />
	<link rel="stylesheet" type="text/css" href="../addons/stonefish_redenvelope/template/css/al_base.css">
	<link href="../addons/stonefish_redenvelope/template/css/emoji.css" rel="stylesheet" type="text/css" />
	<style>
body {
	background: <?php  echo $reply['bgcolor'];?>;
	color: <?php  echo $reply['fontcolor'];?>;
}
.btnLink {
	background: <?php  echo $reply['btncolor'];?>;
	color: <?php  echo $reply['btnfontcolor'];?>;
}
a:link,a:visited,a:hover,a:active {color:<?php  echo $reply['btnfontcolor'];?>;}
.money .btnLink,.money1 .btnLink {
	background: <?php  echo $reply['txcolor'];?>;
	color: <?php  echo $reply['txfontcolor'];?>;
}
.wrap .helpLink {
	background: <?php  echo $reply['txcolor'];?>;
	color: <?php  echo $reply['txfontcolor'];?>;
}
</style>
  </head>
  <body>  
    <div style="max-width:100%">
		<?php  if(!empty($reply['adpic'])) { ?><?php  if(!empty($reply['adpicurl'])) { ?><a href="<?php  echo $reply['adpicurl'];?>"><?php  } ?><img id="top_img" style="max-width: 100%;height: auto;width: auto\9;"  src="<?php  echo toimage($reply['adpic'])?>" width="100%" border="0"><?php  if(!empty($reply['adpicurl'])) { ?></a><?php  } ?><?php  } ?>
    </div>    
    <div class="wrap">
        <div class="rankList">           
            <?php  if(is_array($list)) { foreach($list as $item) { ?>
            <div class="rank rank_01">
                <div class="serialNum"><?php  echo $item['rowno'];?></div>
                <div class="avatar"><?php  if($item['xuni']==1) { ?><img src="<?php  echo $item['avatar'];?>"><?php  } ?> <?php  if($item['xuni']==0 ) { ?><img src="<?php  echo $item['avatar'];?>"><?php  } ?></div>
                <div class="name nickname" style="vertical-align: middle;"><?php  echo $item['nickname'];?></div>
                <div class="price"><?php  echo $item['inpoint'];?>元</div>
            </div>
            <?php  } } ?>           
            <div class="rank">
                <div class="serialNum"><?php  echo $usersort;?></div>
                <div class="avatar"><?php  if($fans['xuni']==1) { ?><img src="<?php  echo $fans['avatar'];?>"><?php  } ?><?php  if($fans['xuni']==0 ) { ?><img src="<?php  echo $fans['avatar'];?>"><?php  } ?></div>
                <div class="name nickname" style="vertical-align: middle;"><?php  echo $fans['nickname'];?></div>
                <div class="price"><?php  echo $fans['inpoint'];?>元</div>
            </div>
        </div>        
        <a href="javascript:;" class="btnLink" id="shareGuid">再分享一次</a>
        <a class="btnLink" href="javascript:window.history.go(-1)">返回</a>
    </div>    
    <div class="maskTip">
        <div class="mask"></div>
        <div class="con_2">
            <div class="tipText"></div>
            <p><img src="<?php  echo toimage($share['share_pic'])?>" width="100%"></p>
            <a href="javascript:;" class="btnLink" id="Close">确定</a>
        </div>
    </div>    
    <script type="text/javascript" src="../addons/stonefish_redenvelope/template/js/zepto.min.js"></script>   
    <script src="../addons/stonefish_redenvelope/template/js/emoji.js"></script>
    <script>
        $(function(){       	
      	  $("#shareGuid").click(function() {
      	        $(".maskTip").show()
      	    });
      	    $("#Close").click(function() {
      	        $(".maskTip").hide()
      	    });
            // 微信昵称特殊字符处理
            $(".nickname").each(function() {
                var html = $(this).html().trim().replace(/\n/g, '<br/>');
                html = jEmoji.softbankToUnified(html);
                html = jEmoji.googleToUnified(html);
                html = jEmoji.docomoToUnified(html);
                html = jEmoji.kddiToUnified(html);
                $(this).html(jEmoji.unifiedToHTML(html));
            }).css({width:$(window).width()-200,height:50,overflow:'hidden'});
        });
    </script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('jssdk', TEMPLATE_INCLUDEPATH)) : (include template('jssdk', TEMPLATE_INCLUDEPATH));?>
</body>
</html>