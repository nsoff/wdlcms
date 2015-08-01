<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="../addons/stonefish_chailihe/template/images/reset.css?2014-08-28" media="all" />
<link rel="stylesheet" type="text/css" href="../addons/stonefish_chailihe/template/images/index.css?2014-08-28" media="all" />
<link rel="stylesheet" type="text/css" href="../addons/stonefish_chailihe/template/images/common.css?2014-08-28" media="all" />
<script type="text/javascript" src="../addons/stonefish_chailihe/template/images/common.js?2014-08-28"></script>
<script type="text/javascript" src="../addons/stonefish_chailihe/template/images/iscroll.js?2014-08-28"></script>
<script type="text/javascript" src="../addons/stonefish_chailihe/template/images/index.js?2014-08-28"></script>
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
	.container{background-image: url(<?php  echo $picbg01;?>);}
	.container{background-color: <?php  echo $bgcolor;?>;}
	.game-zj,.game-ps,.text-num-get,.btn-a{color: <?php  echo $text01color;?>;}
	.copyright{color: <?php  echo $text02color;?>;}
	.panel-box .panel-content table td{color: <?php  echo $text03color;?>;}
	.panel-box .panel-content dl{color: <?php  echo $text03color;?>;}
</style>
</head>
<body onselectstart="return true;" ondragstart="return false;">
<script>
    (function(){
        window.config_custom = {
                        NEEDADD:<?php  if($music) echo "true" ; else echo "false";?>,
                        MUSICBG:"<?php  echo $musicbg;?>"
                    }
    })()
</script>
<script src="../addons/stonefish_chailihe/template/images/sound.js?v=2014-08-28"></script>
<script src="../addons/stonefish_chailihe/template/images/soundmanager.js?v=2014-08-28"></script>
<body onselectstart="return true;" ondragstart="return false;">
    <div data-role="container" class="container">
        <header data-role="header"><!----></header>
        <section data-role="body" class="body">
            <div class="btn-layout">
                <?php  if($subscribe==1) { ?>
				<?php  if($giftnum==0 && empty($statpraisetitle)) { ?>
				    <a href="<?php  echo $regurl;?>" class="btn-get"></a>				
				<?php  } else { ?>
				    <a href="<?php  echo $mylihe;?>" class="btn-see"></a>
                    <?php  if($giftlihe>=1 && empty($statpraisetitle)) { ?><a href="<?php  echo $regurl;?>" class="btn-again"></a><?php  } ?>				
				<?php  } ?>
				<?php  } else if(empty($statpraisetitle)) { ?>
				    <a href="<?php  echo $guanzhu;?>" class="btn-guanzhu"></a>
				<?php  } ?>
            </div>
            <div class="img-list">
                <ul>
                    <?php  if($imgpic01!='') { ?><li><a href="javascript:void(0);"><img src="<?php  echo $imgpic01;?>" /></a></li><?php  } ?>
					<?php  if($imgpic02!='') { ?><li><a href="javascript:void(0);"><img src="<?php  echo $imgpic02;?>" /></a></li><?php  } ?>
					<?php  if($imgpic03!='') { ?><li><a href="javascript:void(0);"><img src="<?php  echo $imgpic03;?>" /></a></li><?php  } ?>
					<?php  if($imgpic04!='') { ?><li><a href="javascript:void(0);"><img src="<?php  echo $imgpic04;?>" /></a></li><?php  } ?>
					<?php  if($imgpic05!='') { ?><li><a href="javascript:void(0);"><img src="<?php  echo $imgpic05;?>" /></a></li><?php  } ?>
                </ul>
            </div>
            <span class="roof"></span>
			<div class="game-zj">
			<marquee behavior="scroll" scrolldelay="200" height="30">
			    <?php  if(is_array($listshare)) { foreach($listshare as $row) { ?>
				<?php  echo $row['realname'];?>拆开了礼盒：[<?php  echo $row['lihetitle'];?>]&nbsp;&nbsp;获得：<?php  echo $row['jp'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<?php  } } ?>
			</marquee>
			</div>
            <?php  if(empty($statpraisetitle)) { ?><div class="game-ps">有<?php  echo $gifttotal;?>个不同礼包可选，<?php  echo $number_num_day;?>，左右划动奖品不同哟~</div><?php  } ?>
            <div class="btn-as">
                <a href="javascript:void(0);" class="btn-a list">获奖名单</a>
                <a href="javascript:void(0);" class="btn-a rule right">活动规则</a>
                <hr class="common-hr" />
                <p class="text-num-get">已有<b><?php  echo $listtotal;?></b>人参与领取了幸运礼盒</p>
            </div>
        </section>
        <footer data-role="footer">
            <?php  if($reply['iscopyright']==1) { ?><a href="<?php  echo $reply['copyrighturl'];?>" class="copyright">&copy;<?php  echo $reply['copyright'];?></a><?php  } else { ?><a href="javascript:;" class="copyright"><?php  if(empty($footer_off)) { ?>&copy;<?php  if(empty($_W['account']['name'])) { ?>微赞团队<?php  } else { ?><?php  echo $_W['account']['name'];?><?php  } ?>&nbsp;&nbsp;<?php  echo $_W['setting']['copyright']['statcode'];?><?php  } ?></a><?php  } ?>
        </footer>
    </div>
        <div class="panel-box-layer"></div>
        <div class="panel-box">
            <ul class="panel-title">
                <li><a href="javascript:void(0);" class="btn-list"></a></li>
                <li><a href="javascript:void(0);" class="btn-rule"></a></li>
            </ul>
            <div class="panel-content">
                <div class="panel-content-child">  
                    <table>
                        <col width="45%" />
                        <col width="55%" />
                        <tr>
                            <th><div class="text-nick"></div></th>
                            <th><div class="text-name"></div></th>
                        </tr>
						<?php  if(is_array($listshare)) { foreach($listshare as $row) { ?>
						<tr>
                            <td><?php  echo $row['realname'];?></td>
                            <td><?php  echo $row['lihetitle'];?></td>
                        </tr>
						<?php  } } ?>
                    </table>                   
                </div>
                
                <div class="panel-content-child"> 
                    <dl>
                        <dt><div class="text-time"></dt><dd><?php  echo date('Y-m-d H:i', $reply['start_time']);?> - <?php  echo date('Y-m-d H:i', $reply['end_time']);?></dd>
                        <dt><div class="text-rule"></dt><dd><?php  echo htmlspecialchars_decode($reply['content']);?></dd>
                        <dt><div class="text-desc"></dt><dd><?php  echo htmlspecialchars_decode($reply['activityinfo']);?></dd>
                    </dl>
                </div>
                <div class="btn-layout">
                    <?php  if($subscribe==1) { ?>
					<?php  if($giftnum==0 && empty($statpraisetitle)) { ?>
				        <a href="<?php  echo $regurl;?>" class="btn-get"></a>				
				    <?php  } else { ?>
				        <a href="<?php  echo $mylihe;?>" class="btn-see"></a>
                        <?php  if(($giftlihe>=1 && empty($statpraisetitle))) { ?><a href="<?php  echo $regurl;?>" class="btn-again"></a><?php  } ?>				
				    <?php  } ?>
					<?php  } else if(empty($statpraisetitle)) { ?>
					    <a href="<?php  echo $guanzhu;?>" class="btn-guanzhu"></a>
					<?php  } ?>
					<form action="" method="post" data-role="form"></form>
                </div>

            </div>
        </div>
        <div class="share-layer"></div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('jssdk', TEMPLATE_INCLUDEPATH)) : (include template('jssdk', TEMPLATE_INCLUDEPATH));?>
</body>
</body>
</html>