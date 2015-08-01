<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta content="Croaker" name="author">
<meta name="Description" content="<?php  echo $reply['description'];?>" />
<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
<meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
<meta content="no-cache" http-equiv="pragma">
<meta content="0" http-equiv="expires">
<meta content="telephone=no, address=no" name="format-detection">
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<link rel="stylesheet" type="text/css" href="../addons/stonefish_chailihe/template/images/reset.css?2014-08-28" media="all" />
<link rel="stylesheet" type="text/css" href="../addons/stonefish_chailihe/template/images/myPrize.css?2014-08-28" media="all" />
<script type="text/javascript" src="../addons/stonefish_chailihe/template/images/zepto_min.js?2014-08-28"></script>
<title><?php  echo $reply['title'];?></title>
<style>
	.container{background-color: <?php  echo $bgcolor;?>;}
	.container{background-image: url(<?php  echo $picbg03;?>);}
	.copyright{color: <?php  echo $text02color;?>;}
	.choose-content li span{color: <?php  echo $text01color;?>;}
	<?php  if($reply['showline']) { ?>.layer-row{width: 2px;}<?php  } ?>
</style>
<script>
    (function(){
        window.config_custom = {
            ABOVEMAX:<?php  echo $abovemax;?>, //是否在领一个
			friends:<?php  echo $friends;?>, //是否显示帮助
            prize:[<?php  echo $prize;?>]
            // i:true=>打开过 false=>未打开过
            // rc:true=>被领完了 false=>未被领完
            
        }
    })();
</script>
<script src="../addons/stonefish_chailihe/template/images/common.js?v=2014-08-28"></script>
<script src="../addons/stonefish_chailihe/template/images/myPrize.js?v=2014-08-28"></script>
</head>
<body onselectstart="return true;" ondragstart="return false;">
    <div data-role="container" class="container">
        <header data-role="header"><!----></header>
        <section data-role="body" class="body">
            <div class="layer-row"></div>
            <div class="choose-content">
                <ul>
                    <?php  if(is_array($listlihe)) { foreach($listlihe as $row) { ?>
					<li class="prize<?php  echo $row['gift'];?>" data-id="<?php  echo $row['id'];?>"><?php  if($reply['shangjialogo']!='') { ?><img src="<?php  echo $shangjialogo;?>" /><?php  } ?><?php  if($reply['showlihe']) { ?><span><?php  echo $row['lihetitle'];?>(<?php  echo $row['title'];?>)</span><?php  } ?></li>
					<?php  } } ?>					
                </ul>
            </div>
            <ul class="choose-content-identifier">
            </ul>
            <div class="text-num"> <!-- rechoose/full -->
                <span class="text-num-have">0</span>
                <span class="text-num-rest">0</span>
            </div>
            <div class="progress-num">
                <div class="progress-num-current"></div>
            </div>
            <div class="btn-layout">
                <a href="javascript:void(0);" class="btn-help" ></a>
				<a href="<?php  echo $againreglihe;?>" class="btn-again2"></a>
				<a href="<?php  echo $againreglihe;?>" class="btn-again big"></a>
				<a href="<?php  echo $gotohome;?>" class="btn-home"></a>
                <form action="<?php  echo $openliheurl;?>" method="post">                        
                        <input type="hidden" value="0" name="info-prize" />
                        <input type="submit" class="btn-open" value=""/>
                </form>				                
                <form action="<?php  echo $viewliheurl;?>" method="post">                    
                    <input type="hidden" value="0" name="info-prize2" />
                    <input type="submit" class="btn-see" value=""/>
                </form>
				<form action="<?php  echo $helpuser;?>" method="post">                        
                        <input type="hidden" value="0" name="info-prize1" />
                        <input type="submit" class="btn-helpuser" value=""/>
                </form>		
            </div>
        </section>
        <footer data-role="footer">
            <?php  if($reply['iscopyright']==1) { ?><a href="<?php  echo $reply['copyrighturl'];?>" class="copyright">&copy;<?php  echo $reply['copyright'];?></a><?php  } else { ?><a href="javascript:;" class="copyright"><?php  if(empty($footer_off)) { ?>&copy;<?php  if(empty($_W['account']['name'])) { ?>微赞团队<?php  } else { ?><?php  echo $_W['account']['name'];?><?php  } ?>&nbsp;&nbsp;<?php  echo $_W['setting']['copyright']['statcode'];?><?php  } ?></a><?php  } ?>
        </footer>
    </div>
    <div class="share-layer"></div>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
	// jssdk config 对象
	jssdkconfig = <?php  echo json_encode($_W['account']['jssdkconfig']);?> || { jsApiList:[] };
	
	// 是否启用调试
	// jssdkconfig.debug = true;
	
	// 已经注册了 jssdk 文档中所有的接口
	jssdkconfig.jsApiList = [
		'checkJsApi',
		'onMenuShareTimeline',
		'onMenuShareAppMessage',
		'onMenuShareQQ',
		'onMenuShareWeibo',
		'showOptionMenu',		
	];
	
	wx.config(jssdkconfig);
	
	window.shareData = {  
            "imgUrl": "<?php  echo $picture;?>",
            "timeLineLink": "<?php  echo $shareurl;?>",
            "sendFriendLink": "<?php  echo $shareurl;?>",
            "weiboLink": "<?php  echo $shareurl;?>",
            "tTitle": "<?php  echo $reply['sharetitle'];?>",
            "fTitle": "<?php  echo $reply['sharetitle'];?>",
            "tContent": "<?php  echo $reply['sharecontent'];?>",
            "fContent": "<?php  echo $reply['sharecontent'];?>",
            "wContent": "<?php  echo $reply['sharecontent'];?>"
    };
  wx.ready(function () {
  //分享朋友
  wx.onMenuShareAppMessage({
      title: window.shareData.title,
      desc: window.shareData.tContent,
      link: window.shareData.sendFriendLink,
      imgUrl:window.shareData.imgUrl,
    });
 //朋友圈
  wx.onMenuShareTimeline({
      title: window.shareData.title,
      link: window.shareData.timeLineLink,
      imgUrl:window.shareData.imgUrl,
    });   
 //QQ
  wx.onMenuShareQQ({
      title: window.shareData.title,
	  desc: window.shareData.tContent,
      link: window.shareData.timeLineLink,
      imgUrl:window.shareData.imgUrl,
    }); 
  //weibo
  wx.onMenuShareWeibo({
      title: window.shareData.title,
	  desc: window.shareData.tContent,
      link: window.shareData.timeLineLink,
      imgUrl:window.shareData.imgUrl,
    }); 
  });
</script>
</body>
</html>