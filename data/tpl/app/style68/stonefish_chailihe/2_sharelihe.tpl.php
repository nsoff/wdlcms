<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="../addons/stonefish_chailihe/template/images/reset.css?2014-08-28" media="all" />
<link rel="stylesheet" type="text/css" href="../addons/stonefish_chailihe/template/images/openPrize.css?2014-08-28" media="all" />
<script type="text/javascript" src="../addons/stonefish_chailihe/template/images/common.js?2014-08-28"></script>
<script type="text/javascript" src="../addons/stonefish_chailihe/template/images/openPrize.js?2014-08-28"></script>
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
</style>
</head>
<body onselectstart="return true;" ondragstart="return false;">
    <div data-role="container" class="container">
        <header data-role="header"><!----></header>
        <section data-role="body" class="body">
            <div class="text-num <?php  echo $openedstyle;?>"> <!--first第一个/last最后一个/done成功拆开/opened拆开中-->
                <span class="have"><?php  echo $chainum;?></span>
                <span class="rest"><?php  echo $rest;?></span>
            </div>
            <div class="choose-content-bg"></div>
            <div class="choose-content <?php  echo $openedstyle;?>">
                <ul>
                    <li class="prize<?php  echo $listgift['gift'];?>" data-id="<?php  echo $listgift['id'];?>"><?php  if($reply['shangjialogo']!='') { ?><img src="<?php  echo $shangjialogo;?>" /><?php  } ?></li>
                </ul>
            </div>
            <div class="btn-layout">
                                <?php  if($reply['opentype']==1 and $opentype!=1) { ?>
								    <?php  if($rest!=0 and $openlihe_is==0) { ?>
								        <a href="<?php  echo $openlihe;?>" class="btn-open-other" ></a>
								    <?php  } else { ?>
                                        <a href="javascript:void(0);" class="btn-alert-other" ></a>
								    <?php  } ?>
								<?php  } else { ?>
								    <?php  if($rest!=0) { ?>
								        <a href="javascript:void(0);" class="btn-help-other" ></a>
								    <?php  } else { ?>
                                        <a href="javascript:void(0);" class="btn-alert-other" ></a>
								    <?php  } ?>
								<?php  } ?>
                                <a href="<?php  echo $reglihe;?>" class="btn-get-too"></a>								
                                <!--<a href="" class="btn-get-too big"></a> 只有一个按钮的时候可增加一个big -->
                             
            </div>
        </section>
        <footer data-role="footer">
            <?php  if($reply['iscopyright']==1) { ?><a href="<?php  echo $reply['copyrighturl'];?>" class="copyright">&copy;<?php  echo $reply['copyright'];?></a><?php  } else { ?><a href="javascript:;" class="copyright"><?php  if(empty($footer_off)) { ?>&copy;<?php  if(empty($_W['account']['name'])) { ?>微赞团队<?php  } else { ?><?php  echo $_W['account']['name'];?><?php  } ?>&nbsp;&nbsp;<?php  echo $_W['setting']['copyright']['statcode'];?><?php  } ?></a><?php  } ?>
        </footer>
    </div>
    <div class="share-layer"></div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('jssdk', TEMPLATE_INCLUDEPATH)) : (include template('jssdk', TEMPLATE_INCLUDEPATH));?>
</body>
</html>