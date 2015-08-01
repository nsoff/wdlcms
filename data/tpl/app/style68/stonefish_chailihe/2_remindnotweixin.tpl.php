<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="../addons/stonefish_chailihe/template/images/reset.css?2014-08-28" media="all" />
<link rel="stylesheet" type="text/css" href="../addons/stonefish_chailihe/template/images/index.css?2014-08-28" media="all" />
<link rel="stylesheet" type="text/css" href="../addons/stonefish_chailihe/template/images/common.css?2014-08-28" media="all" />
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
	.container{background-image: url(<?php  echo $picbg01;?>);}
	.container{background-color: <?php  echo $bgcolor;?>;}
	.content-black{width:102%;height:100%;position:fixed;z-index:5;background:rgba(0,0,0,0.8);}
	.content-black p{ color:#fff1cb; }
</style>
</head>
<body onselectstart="return true;" ondragstart="return false;">
<body onselectstart="return true;" ondragstart="return false;">
        <div class="bg-content" id="shareBox" style="">
			<div class="content-black word-4" style="padding-top: 100px;background: rgba(0,0,0,0.7);">
				<div style="text-align:center; font-size:16px; color:#fff;">
					<img src="<?php  echo $_W['account']['qrcode'];?> style="width:50%;max-width:320px;" alt="" />
					<p>
						&nbsp;
						<br />
						用手机微信扫描二维码
					</p>
					<p>
						<br />
						或关注@<?php  echo $_W['account']['childname'];?> 
					</p>
					<p>
						<br />
						微信号:<?php  echo $_W['account']['account'];?>
					</p>
				</div>

			</div>
		</div>
		
	<div data-role="container" class="container">
        <header data-role="header"><!----></header>
        <section data-role="body" class="body">
            
            <span class="roof"></span>
            <div class="game-ps">本页面仅支持微信访问!非微信浏览器禁止浏览!</div>
        </section>
        <footer data-role="footer">
            <?php  if($reply['iscopyright']==1) { ?><a href="<?php  echo $reply['copyrighturl'];?>" class="copyright">&copy;<?php  echo $reply['copyright'];?></a><?php  } else { ?><a href="javascript:;" class="copyright"><?php  if(empty($footer_off)) { ?>&copy;<?php  if(empty($_W['account']['name'])) { ?>微赞团队<?php  } else { ?><?php  echo $_W['account']['name'];?><?php  } ?>&nbsp;&nbsp;<?php  echo $_W['setting']['copyright']['statcode'];?><?php  } ?></a><?php  } ?>
        </footer>
    </div>
</body>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('jssdk', TEMPLATE_INCLUDEPATH)) : (include template('jssdk', TEMPLATE_INCLUDEPATH));?>
</body>		
</html>