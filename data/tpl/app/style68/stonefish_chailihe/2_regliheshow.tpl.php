<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="../addons/stonefish_chailihe/template/images/reset.css?2014-08-28" media="all" />
<link rel="stylesheet" type="text/css" href="../addons/stonefish_chailihe/template/images/common.css?2014-08-28" media="all" />
<link rel="stylesheet" type="text/css" href="../addons/stonefish_chailihe/template/images/choosePrizeSuccess.css?2014-08-28" media="all" />
<script type="text/javascript" src="../addons/stonefish_chailihe/template/images/common.js?2014-08-28"></script>
<script type="text/javascript" src="../addons/stonefish_chailihe/template/images/choosePrizeSuccess.js?2014-08-28"></script>
<script type="text/javascript" src="../addons/stonefish_chailihe/template/images/zepto_min.js?2014-08-28"></script>
<title><?php  echo $reply['title'];?></title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<meta name="Description" content="<?php  echo $reply['description'];?>" />
<!-- Mobile Devices Support @begin -->
<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
<meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
<meta content="no-cache" http-equiv="pragma">
<meta content="0" http-equiv="expires">
<meta content="telephone=no, address=no" name="format-detection">
<meta name="apple-mobile-web-app-capable" content="yes" /> <!-- apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<!-- Mobile Devices Support @end -->
<style>
    img{max-width:100%!important;}
	.container{background-image: url(<?php  echo $picbg02;?>);}
	.container{background-color: <?php  echo $bgcolor;?>;}
	.copyright{color: <?php  echo $text02color;?>;}
	.choose-num{color: <?php  echo $text01color;?>;}
	.choose-content li span{color: <?php  echo $text01color;?>;}
</style>
</head>
<body onselectstart="return true;" ondragstart="return false;">
    <div data-role="container" class="container">
        <header data-role="header"><!----></header>
        <section data-role="body" class="body">
            <?php  if($listgift['break']==0) { ?><div class="text-swing-my"></div><?php  } else { ?><div class="text-swing"><?php  echo $listgift['break'];?></div><?php  } ?>
            <div class="choose-content-bg"></div>
            <div class="choose-content">
                <ul>
                    <li class="prize<?php  echo $listgift['gift'];?>"><?php  if($reply['shangjialogo']!='') { ?><img src="<?php  echo $shangjialogo;?>" /><?php  } ?><?php  if($reply['showlihe']) { ?><span><?php  echo $listgift['lihetitle'];?>(<?php  echo $listgift['title'];?>)</span><?php  } ?></li>
                </ul>
            </div>
            <a href="<?php  echo $mylihe;?>" class="btn-see"></a>
            <?php  if($listgift['break']==0) { ?><a href="<?php  echo $openlihe;?>" class="btn-openlihe"></a><?php  } else { ?><a href="javascript:void(0);" class="btn-share"></a><?php  } ?>
            <p class="choose-num"><?php  if($listgift['break']==0) { ?>好运气哟！自己拆开礼盒吧！<?php  } else { ?><b><?php  echo $listgift['break'];?></b>位小伙伴帮您拆开礼盒后，记得回到这里来领奖哦<?php  } ?></p>
        </section>
        <footer data-role="footer">
            <?php  if($reply['iscopyright']==1) { ?><a href="<?php  echo $reply['copyrighturl'];?>" class="copyright">&copy;<?php  echo $reply['copyright'];?></a><?php  } else { ?><a href="javascript:;" class="copyright"><?php  if(empty($footer_off)) { ?>&copy;<?php  if(empty($_W['account']['name'])) { ?>微赞团队<?php  } else { ?><?php  echo $_W['account']['name'];?><?php  } ?>&nbsp;&nbsp;<?php  echo $_W['setting']['copyright']['statcode'];?><?php  } ?></a><?php  } ?>
        </footer>
    </div>
    <div class="share-layer"></div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('jssdk', TEMPLATE_INCLUDEPATH)) : (include template('jssdk', TEMPLATE_INCLUDEPATH));?>
</body>		
</html>