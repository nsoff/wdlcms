<?php defined('IN_IA') or exit('Access Denied');?>﻿<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="../addons/stonefish_chailihe/template/images/reset.css?2014-08-28" media="all" />
<link rel="stylesheet" type="text/css" href="../addons/stonefish_chailihe/template/images/prize.css?2014-08-28" media="all" />
<script type="text/javascript" src="../addons/stonefish_chailihe/template/images/common.js?2014-08-28"></script>
<script type="text/javascript" src="../addons/stonefish_chailihe/template/images/zepto_min.js?2014-08-28"></script>
<title><?php  echo $reply['title'];?></title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<meta name="Description" content="<?php  echo $reply['description'];?>" />
<!-- Mobile Devices Support @begin -->
<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
<meta content="telephone=no, address=no" name="format-detection">
<meta name="apple-mobile-web-app-capable" content="yes" /> <!-- apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
<meta content="no-cache" http-equiv="pragma">
<meta content="0" http-equiv="expires">
<!-- Mobile Devices Support @end -->
<style>
    img{max-width:100%!important;}
	body{background-color: <?php  echo $bgcolor;?>;}
	.helpuser{
	  margin:10px;padding:10px 10px 0px 10px;
	  background: <?php  echo $text04color;?>;
	  color:<?php  echo $text05color;?>;
	  -moz-border-radius: 10px;      /* Gecko browsers */
      -webkit-border-radius: 10px;   /* Webkit browsers */
      border-radius:10px;            /* W3C syntax */
	}
	.usr_list{ overflow: hidden; border:1px solid #FFF1CB; padding:5px; background:#919191; margin-bottom:10px;}
	.usr_list p{ width: 50px; float: left;}
	.usr_list p img{ width: 100%; float: left;}
	.usr_list dl{ overflow: hidden; padding-left: 8px;}
	.usr_list dt{ font-size: 14px; text-align:left;}
	.usr_list dt span{ float: right; font-size: 12px; }
	.clear{ clear:both;height:10px;} 
	.copyright{color: <?php  echo $text02color;?>;}
	.prize-title{color: <?php  echo $text01color;?>;}
</style>
</head>
<body onselectstart="return true;" ondragstart="return false;">
    <div class="shadow-prize"></div>
    <div data-role="container" class="container">
        <header data-role="header"><!----></header>
        <section data-role="body" class="body">
            
            <div class="prize-title"><?php  echo $lihegift['lihetitle'];?>收到的帮助</div>
			<?php  if($hleplist!='') { ?>
			<div class="helpuser">
			    <?php  if(is_array($hleplist)) { foreach($hleplist as $list) { ?>
			    <div class="usr_list">
				    <p><img src="<?php  echo $list['avatar'];?>"/></p>
					<dl>
					    <dt><?php  echo $list['nickname'];?></dt>
						<dt><span><?php  echo date('Y-m-d H:i', $list['visitorstime'])?></span></dt>
					</dl>
				</div>
				<?php  } } ?>	
            <div class="clear"></div>				
			</div>
			<?php  } ?>

            <div class="btn-layout">
                <a href="<?php  echo $mylihe;?>" class="btn-see"></a>
                <?php  if($giftlihe!=0) { ?><a href="<?php  echo $againreglihe;?>" class="btn-again2"></a><?php  } ?>
            </div>
        </section>
        <footer data-role="footer">
            <?php  if($reply['iscopyright']==1) { ?><a href="<?php  echo $reply['copyrighturl'];?>" class="copyright">&copy;<?php  echo $reply['copyright'];?></a><?php  } else { ?><a href="javascript:;" class="copyright"><?php  if(empty($footer_off)) { ?>&copy;<?php  if(empty($_W['account']['name'])) { ?>微赞团队<?php  } else { ?><?php  echo $_W['account']['name'];?><?php  } ?>&nbsp;&nbsp;<?php  echo $_W['setting']['copyright']['statcode'];?><?php  } ?></a><?php  } ?>
        </footer>
    </div>    
</body>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('jssdk', TEMPLATE_INCLUDEPATH)) : (include template('jssdk', TEMPLATE_INCLUDEPATH));?>
</html>