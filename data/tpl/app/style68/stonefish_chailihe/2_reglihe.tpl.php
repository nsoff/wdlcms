<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="../addons/stonefish_chailihe/template/images/reset.css?2014-08-28" media="all" />
<link rel="stylesheet" type="text/css" href="../addons/stonefish_chailihe/template/images/common.css?2014-08-28" media="all" />
<link rel="stylesheet" type="text/css" href="../addons/stonefish_chailihe/template/images/choosePrize.css?2014-08-28" media="all" />
<script type="text/javascript" src="../addons/stonefish_chailihe/template/images/zepto_min.js?2014-08-28"></script>
<title><?php  echo $reply['title'];?></title>
<meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
<meta content="no-cache" http-equiv="pragma">
<meta content="0" http-equiv="expires">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<meta name="Description" content="<?php  echo $reply['description'];?>" />
<!-- Mobile Devices Support @begin -->
<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
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
	 .panel-register label,.panel-register input[type='email'],.panel-register input[type='text'],.panel-register input[type='tel'],.panel-register .msg-ps{color: <?php  echo $text03color;?>;}
</style>
</head>
<body onselectstart="return true;" ondragstart="return false;">
<script type="text/javascript">
    (function(){
         window.config_custom = {
            NEEDREGISTER:<?php  echo $Needregister;?>,
            PATH:{
                 MUSIC:"<?php  echo $musicpath;?>"
            },
            AJAX:{
                PASS:"<?php  echo $telpass;?>"
            }
        }
    })();
</script>
<script src="../addons/stonefish_chailihe/template/images/zepto_min.js?v=2014-08-28"></script>
<script src="../addons/stonefish_chailihe/template/images/common.js?v=2014-08-28"></script>
<script src="../addons/stonefish_chailihe/template/images/sound.js?v=2014-08-28"></script>
<script src="../addons/stonefish_chailihe/template/images/soundjs_min.js?v=2014-08-28"></script>
<script src="../addons/stonefish_chailihe/template/images/soundmanager.js?v=2014-08-28"></script>
<script src="../addons/stonefish_chailihe/template/images/iscroll.js?v=2014-08-28"></script>
<script src="../addons/stonefish_chailihe/template/images/choosePrize.js?v=2015"></script>
<body onselectstart="return true;" ondragstart="return false;">
        <div data-role="container" class="container">
            <header data-role="header"><!----></header>
            <section data-role="body" class="body">
                <div class="text-swing"></div>
                <div class="choose-content-bg"></div>
                <div class="choose-content">
                    <ul>
                        <?php  if(is_array($listlihe)) { foreach($listlihe as $row) { ?>
						<li class="prize<?php  echo $row['gift'];?>" data-music="<?php  echo $row['giftVoice'];?>" data-id="<?php  echo $row['id'];?>"><?php  if($reply['shangjialogo']!='') { ?><img src="<?php  echo $shangjialogo;?>" /><?php  } ?><?php  if($reply['showlihe']) { ?><span><?php  echo $row['lihetitle'];?>(<?php  echo $row['title'];?>)</span><?php  } ?></li>
						<?php  } } ?>                                             
                    </ul>
                </div>
                <ul class="choose-content-identifier">
                </ul>
				<?php  if($subscribe==1) { ?>
                    <?php  if($giftlihe==0) { ?>
					    <a href="<?php  echo $mylihe;?>" class="btn-see"></a>
					<?php  } else { ?>
						<a href="javascript:void(0);" class="btn-choose"></a>
					<?php  } ?>
				<?php  } else { ?>
				    <a href="<?php  echo $guanzhu;?>" class="btn-guanzhu"></a>
				<?php  } ?>
                <p class="choose-num"><?php  if($giftlihe==0) { ?>您已领取过 <?php  echo $giftnum;?> 个礼盒<?php  } else { ?>今天还可再领 <b><?php  echo $giftlihe;?></b> 个礼盒<?php  } ?></p>
            </section>
            <footer data-role="footer">
                <?php  if($reply['iscopyright']==1) { ?><a href="<?php  echo $reply['copyrighturl'];?>" class="copyright">&copy;<?php  echo $reply['copyright'];?></a><?php  } else { ?><a href="javascript:;" class="copyright"><?php  if(empty($footer_off)) { ?>&copy;<?php  if(empty($_W['account']['name'])) { ?>微动力团队<?php  } else { ?><?php  echo $_W['account']['name'];?><?php  } ?>&nbsp;&nbsp;<?php  echo $_W['setting']['copyright']['statcode'];?><?php  } ?></a><?php  } ?>
            </footer>
        </div>
                <div class="panel-register">
            <div class="panel-register-content"<?php  if($reply['isinfo']) { ?> style="height:160px;"<?php  } ?>>
                <div class="btn-close"></div>
                <p class="msg-ps"><?php  echo $reply['userinfo'];?></p>
                <?php  if($reply['isinfo']==0) { ?><hr class="common-hr" /><?php  } ?>
                <form action="<?php  echo $regurl;?>" method="post" data-role="info-form">
                    <?php  if($reply['isinfo']==0) { ?>
					<div>
                        <?php  if($reply['isrealname']==1) { ?><label for="info-name">姓　名</label><input type="text" name="info-name" value="<?php  echo $profile['realname'];?>" /><?php  } ?>
                        <?php  if($reply['ismobile']==1) { ?> <label for="info-tel">手　机</label><input type="tel" name="info-tel"  value="<?php  echo $profile['mobile'];?>" /><?php  } ?>
						<?php  if($reply['isqq']==1) { ?> <label for="info-qqhao">ＱＱ号</label><input type="tel" name="info-qqhao"  value="<?php  echo $profile['qq'];?>" /><?php  } ?>
						<?php  if($reply['isemail']==1) { ?> <label for="info-email">邮　箱</label><input type="email" name="info-email"  value="<?php  echo $profile['email'];?>" /><?php  } ?>
						<?php  if($reply['isaddress']==1) { ?> <label for="info-address">地　址</label><input type="text" name="info-address"  value="<?php  echo $profile['address'];?>" /><?php  } ?>
                    </div>
                    <?php  } else { ?>
					<input type="hidden" value="<?php  echo $profile['realname'];?>" name="info-name" />
					<input type="hidden" value="<?php  echo $profile['mobile'];?>" name="info-tel" />
					<input type="hidden" value="<?php  echo $profile['qq'];?>" name="info-qqhao" />
					<input type="hidden" value="<?php  echo $profile['email'];?>" name="info-email" />
					<input type="hidden" value="<?php  echo $profile['address'];?>" name="info-address" />
					<?php  } ?>
                    <input type="hidden" value="0" name="info-prize" />
                    <input type="hidden" value="<?php  echo $avatar;?>" name="avatar" />
                    <input type="hidden" value="<?php  echo $nickname;?>" name="nickname" />
                    <input type="submit" class="btn-send" value="确认领取" />                    
                    
                </form>
                <div class="submit-tip"></div>
            </div>
        </div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('jssdk', TEMPLATE_INCLUDEPATH)) : (include template('jssdk', TEMPLATE_INCLUDEPATH));?>
</body>		
</html>