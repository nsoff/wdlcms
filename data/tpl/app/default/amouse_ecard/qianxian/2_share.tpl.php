<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1">
<meta name="keywords" content="$_W['account']['name']微名片  二维码   <?php  echo $member['realname'];?>的名片">
<meta name="description" content="Ta关注:<?php  echo $member['myattention'];?>,Ta在找:<?php  echo $member['myfource'];?>" />
<title><?php  echo $member['realname'];?>的名片</title>
<link rel="stylesheet" type="text/css" href="../addons/amouse_ecard/style/css/flytip.css">
<link rel="stylesheet" type="text/css" href="../addons/amouse_ecard/style/css/common.css?v=2014122">
<link rel="stylesheet" type="text/css" href="../addons/amouse_ecard/style/css/default.css?v=2014122">
</head>

<body class="icx-mobi-home">
	<div style="display:none;">
			Ta关注:<?php  echo $member['myattention'];?> \n
			Ta在找:<?php  echo $member['myfource'];?></div>
	<div class="icx-mobi-page toggle-transition-1s namecard-page-relative">
		<main class="container">
<section class="carousel js-carousel">
	<ul class="carousel-inner">
		<li class="carousel-item">
		   <?php  if($card['bgimg']) { ?><img src="<?php  echo $_W['attachurl'];?><?php  echo $card['bgimg'];?>" class="carousel-item-pic">
		   <?php  } else { ?><img src="../addons/amouse_ecard/style/images/bg1.jpg" class="carousel-item-pic"><?php  } ?>
    	</li>
	</ul>
</section>				
<div class="topbar"><?php  echo $member['company'];?></div>

<div class="infobar">
		<ul class="infobar-inner">
			<li class="content-item">
				<a href="javascript:" class="content-item-anchor">
				 <div class="content-item-hgroup">
				   	<h2 class="content-item-title" >人脉</h2>
				   	<h3 class="content-item-summary" ><?php  echo $renmai;?></h3>
				 </div>
				</a>
	      	</li>
	       <li class="content-item">
				<a class="content-item-anchor">
				 <div class="content-item-thumb">
				 <?php  if($member['headimg']) { ?>
					<?php  if(substr($member['headimg'],0,9) == 'http://wx') { ?>
					<img src="<?php  echo $member['headimg'];?>" class="content-item-thumbnail avatarPic">
					<?php  } else { ?>
					<img src="<?php  echo $_W['attachurl'];?><?php  echo $member['headimg'];?>" class="content-item-thumbnail avatarPic">
					<?php  } ?>
				<?php  } else { ?>
				 <img src="../addons/amouse_ecard/style/images/header.png" class="content-item-thumbnail avatarPic"><?php  } ?>
				 	</div>
				</a>
	      	</li>
	      	<!--<li class="content-item ">
				<?php  if($member['qq']) { ?>
					<?php  if($qq==0) { ?><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php  echo $member['qq'];?>&site=qq&menu=yes" class="content-item-anchor"><?php  } ?>
					<?php  if($qq==2) { ?><a href="javascript:noqq()" class="content-item-anchor"><?php  } ?>
				<?php  } else { ?>
								<a href="javascript:noqq1()" class="content-item-anchor">
				<?php  } ?>
				<div class="content-item-thumb"><img src="../addons/amouse_ecard/style/images/qq.png" class="content-item-thumbnail"></div>
				</a>
	      	</li>-->
            <li class="content-item js-ewm">
                <a href="javascript:;" class="content-item-anchor">
                    <div class="content-item-thumb">
                        <img src="../addons/amouse_ecard/style/images/card_index/icon-qrcode.png"  class="content-item-thumbnail">
                    </div>
                </a>
            </li>
	      	<li class="content-item">
				<a href="javascript:;" class="content-item-anchor">
				 <div class="content-item-hgroup">
				   <h2 class="content-item-title" ><?php  echo $member['realname'];?></h2>
				   <h3 class="content-item-summary" ><?php  echo $member['job'];?></h3>
				 </div>
				</a>
	      	</li>	 
		</ul>
	</div>
	<div class="like-item" onclick="likeAjax()">
	  <a href="javascript:">
			<span class="item-round"><i class="ico-hand"></i></span><span class="home-number info-number" id="zan"><?php  echo $card['zan'];?></span>
	  </a>
	</div>
			<section class="cateContent">
	<ul class="content-inner">  
     
	<li class="content-item js-content-item" data-id="1413616750508">  
		<?php  if((!empty($card['shopUrl']))) { ?>
		<a href="<?php  echo $this->createMobileUrl('shop',array('id'=>$member['id'],'cid'=>$card['id'],'op'=>'list'),true)?>" class="content-item-anchor">
		<?php  } else { ?>
		<a href="javascript:noSetYet();" class="content-item-anchor">
		<?php  } ?>
			<div class="content-item-thumb">
			<img src="../addons/amouse_ecard/style/images/card_index/1.png?t=0" class="content-item-thumbnail" data-width="" data-height="">
			</div>
			<div class="content-item-hgroup">
				<h2 class="content-item-title"  >小店商城</h2>
				</div>
		</a>
		<div class="content-item-bg"></div>
		</li>
	<li class="content-item js-content-item" data-id="1413616750509">  
		<?php  if((!empty($isFengcai))) { ?>
		<a href="<?php  echo $this->createMobileUrl('presence',array('id'=>$member['id'],'cid'=>$card['id'],'op'=>'list'))?>" class="content-item-anchor">
		<?php  } else { ?>
		<a href="javascript:noSetYet();" class="content-item-anchor">
		<?php  } ?>			<div class="content-item-thumb">
			<img src="../addons/amouse_ecard/style/images/card_index/2.png?t=1" class="content-item-thumbnail" data-width="" data-height="">
			</div>
			<div class="content-item-hgroup">
				<h2 class="content-item-title">个人风采</h2>
				</div>
		</a>
		<div class="content-item-bg"></div>
		</li>
	<li class="content-item js-content-item" data-id="<?php  echo $isPhoto;?>">
		<?php  if((!empty($isPhoto))) { ?>
		<a href="<?php  echo $this->createMobileUrl('photo',array('id'=>$member['id'],'cid'=>$card['id'],'op'=>'list'))?>" class="content-item-anchor">
		<?php  } else { ?>
		<a href="javascript:noSetYet();" class="content-item-anchor">
		<?php  } ?>			<div class="content-item-thumb">
			<img src="../addons/amouse_ecard/style/images/card_index/3.png?t=2" class="content-item-thumbnail" data-width="" data-height="">
			</div>
			<div class="content-item-hgroup">
				<h2 class="content-item-title"  >精彩相册</h2>
				</div>
		</a>
		<div class="content-item-bg"></div>
		</li>
	<li class="content-item js-content-item" data-id="<?php  echo $member['id'];?>">
		<?php  if((!empty($member['companyAddress']))) { ?>
		<a href="<?php  echo $this->createMobileUrl('gps',array('id'=>$member['id'],'cid'=>$card['id'],'op'=>'list'))?>" class="content-item-anchor">
		<?php  } else { ?>
		<a href="javascript:noSetYet();" class="content-item-anchor">
		<?php  } ?>
            <div class="content-item-thumb">
			<img src="../addons/amouse_ecard/style/images/card_index/4.png?t=3" class="content-item-thumbnail" data-width="" data-height="">
			</div>
			<div class="content-item-hgroup">
				<h2 class="content-item-title">公司地址</h2>
				</div>
		</a>
		<div class="content-item-bg"></div>
	</li>
	<li class="content-item js-content-item" data-id="1413616750512">  
		<a href="<?php  echo $this->createMobileUrl('info',array('id'=>$member['id'],'cid'=>$card['id'],'op'=>'list'),true)?>" class="content-item-anchor">
			<div class="content-item-thumb">
			<img src="../addons/amouse_ecard/style/images/card_index/5.png?t=4" class="content-item-thumbnail" data-width="" data-height="">
			</div>
			<div class="content-item-hgroup">
				<h2 class="content-item-title">个人信息</h2>
				</div>
		</a>
		<div class="content-item-bg"></div>
	</li>
	<li class="content-item js-content-item" data-id="<?php  echo $isCompany;?>">
		<?php  if((!empty($isCompany))) { ?>
		<a href="<?php  echo $this->createMobileUrl('company',array('id'=>$member['id'],'cid'=>$card['id'],'op'=>'list'))?>" class="content-item-anchor">
		<?php  } else { ?>
		<a href="javascript:noSetYet();" class="content-item-anchor">
		<?php  } ?>
            <div class="content-item-thumb">
			<img src="../addons/amouse_ecard/style/images/card_index/6.png?t=5" class="content-item-thumbnail" data-width="" data-height="">
			</div>
			<div class="content-item-hgroup">
				<h2 class="content-item-title">公司简介</h2>
			</div>
		</a>
		<div class="content-item-bg"></div>
		</li>
	<li class="content-item">
			<a href="javascript:;" class="content-item-anchor">
	          <div class="content-item-thumb"><img src="../addons/amouse_ecard/style/images/xbg.png" class="content-item-thumbnail"> </div>
	        </a>
        </li>
		<li class="content-item">
			<?php  if($mobile==0) { ?><a href="tel:<?php  echo $member['mobile'];?>" class="content-item-anchor"><?php  } ?>
			<?php  if($mobile==2) { ?><a  onclick="noMobile()" class="content-item-anchor"><?php  } ?>
	          <div class="content-item-thumb"><img src="../addons/amouse_ecard/style/images/tell.png" class="content-item-thumbnail"> </div>
	          <div class="content-item-hgroup">
	            <h2 class="content-item-title">一键拨号</h2>
	          </div>
          	</a>
        </li>
	</ul>
</section>
</main>
	</div>
	
	<div class="feature js-sharebox toggle-transition-1s">
	  <a onclick="collectAjax();"><div class="feature-favor  feature-w66" style="width:30%">
		<i class="ico-favor"></i> <span class="vertical-m" >收藏TA</span>
	  </div></a>
	<?php  if($ismember) { ?>
	<div class="feature-favor  feature-w66" style="width:40%">
		<a href="<?php  echo $this->createMobileUrl('index',array('op'=>'list'))?>">
		<i class="ico-home"></i> <span class="vertical-m" >我的微名片</span></a>
	</div>
	<?php  } else { ?>
	<div class="feature-favor  feature-w66" style="width:40%">
		<a href="<?php  echo $tiaozhuanUrl;?>"><i class="ico-card"></i> <span class="vertical-m" >我也要一个</span></a>
	</div>
     <?php  } ?>
	
	<div class="feature-more js-featureMore feature-w33"><i class="ico-more"></i> <span class="vertical-m">更多</span></div></div>
	
	<div class="more-list-wrap js-moreList">
	  <div class="more-list">
		  <ul class="more-list-ul">
		  <li class="more-list-item btop"><a onclick="collectAjax()" class="more-item-anchor"><span class="vertical-m">收藏TA</span><i class="icon-right"></i></a></li>
		  <li class="more-list-item btop"><a href="<?php  echo $guanzhuUrl;?>" class="more-item-anchor"><span class="vertical-m">操作教程</span><i class="icon-right"></i></a></li>
		    </ul>
	  </div>
	  <div class="more-list-item item-back"><a href="javascript:;" class="more-item-anchor"><i class="ico-back"></i> <span class="vertical-m">返 回</span></a></div>
	  </div>
	
	<div class="sharetip sharetip-collect js-sharetip-collect"></div>
	<div class="sharetip sharetip-cfriend js-sharetip-cfriend">
		<div class="shareBox">
			<span class="shareBox-title">分享到：</span>
			<div class="bdsharebuttonbox clearfix" data-tag="share_1">
			    <a class="bds_sqq" data-cmd="sqq">QQ好友</a>
			    <a class="bds_qzone" data-cmd="qzone">QQ空间</a>
				<a class="bds_tsina" data-cmd="tsina">新浪微博</a>
			    <a class="bds_renren" data-cmd="renren">人人网</a>
			    <a class="bds_copy" data-link="">复制链接</a>
			    <a class="popup_more" data-cmd="more">更多</a>
			</div>
		</div>
	</div>
	
	<div class="ewmform js-ewmform">
	<div class="ewmform-box">
	  	<code class="ewmform-close js-ewmClose"></code>
	  	<div class="ewmform-title">扫码收藏我的微名片</div>
		<div class="ewmform-summary"><img class="ewm-thumbnail" id="ewmThumbnail" data-src="<?php  echo $this->getQRImage2($member['id'],$member['openid']);?>"  style="padding: 5px 0px 0 0;width:96%"></div>
	  	<div class="ewmform-des">长按二维码可保存到手机里<br>可印在纸质名片和宣传单上</div>
  </div>
</div>
<div class="superMask" id="superMask"></div>

<input type="hidden" name="mid" id="mid" value="<?php  echo $member['id'];?>">
<input type="hidden" name="cid"  id="cid" value="<?php  echo $card['id'];?>">
<script src="../addons/amouse_ecard/style/js/jquery.1.11.1.js?v=2015040501"></script>
<script src="../addons/amouse_ecard/style/js/flytip.js"></script>
<script src="../addons/amouse_ecard/style/js/vpopup.js"></script>
<script src="../addons/amouse_ecard/style/js/common.js?v=20141221"></script>
<script>
function noMobile(){
	$.flytip("对方设置了隐私保护，不能拨打电话");
}
function noqq(){
	$.flytip("对方设置了隐私保护，不能查看qq");
}
function noqq1(){
	$.flytip("对方还没有设置qq号");
}
</script>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script language='javascript'>
    <?php 
            $jssdk = new JSSDK();
    $signPackage = $jssdk->GetSignPackage();
    ?>
    wx.config({
        debug: false,
        appId: '<?php  echo $signPackage["appId"];?>',
        timestamp: <?php  echo $signPackage["timestamp"];?>,
    nonceStr: '<?php  echo $signPackage["nonceStr"];?>',
            signature: '<?php  echo $signPackage["signature"];?>',
            jsApiList: [
        'onMenuShareAppMessage',
        'onMenuShareTimeline',
        'onMenuShareQQ'
    ]
    });

    var shareMeta = {
        title: "<?php  echo $member['realname'];?>的微名片",
        desc: "公司:<?php  echo $member['company'];?>\n职位:<?php  echo $member['job'];?>\n点击查看更多信息",
        link: "<?php  echo $linkUrl;?>",
        imgUrl: "<?php  echo $shareimg;?>"
    };
    wx.ready(function(){
        wx.onMenuShareTimeline(shareMeta);
        wx.onMenuShareAppMessage(shareMeta);
        wx.onMenuShareWeibo(shareMeta);
    });
</script>

<script>
//收藏功能，ajax方法
 function collectAjax(){
	var mid = $('#mid').val();
	var cid = $('#cid').val();
     var pushUrl = "<?php  echo murl('entry//collect',array('m'=>'amouse_ecard'),true)?>";
    $.ajax({
        "type": "post",
        "url": pushUrl,
        "data": {"mid":mid, "cid": cid},
        "dataType": "json",
        "success": function(data){
            if(data.success){
                if(data.status == 1){
                    $.flytip("收藏成功！");
                    //setTimeout(tiaozhuan(data.guanzhuUrl),30000);
                }if(data.status == 0){
                    $.flytip("您还没有建立微名片，马上为您跳转到帮助链接");
                    setTimeout("tiaozhuan('"+data.guanzhuUrl+"')",3000)
                }if(data.status == 2){
                    $.flytip("收藏失败，可能是网络有问题？");
                }if(data.status == 3){
                    $.flytip("您已经收藏过<?php  echo $member['realname'];?>的名片了^_^");
                }
            }else{
                $.flytip("收藏失败，可能是网络有问题？");
            }
        }
    });
 }
 function tiaozhuan(url){
	window.location.href=url;
 }

//点赞功能，ajax方法
 function likeAjax(){
	var mid = $('#mid').val();
	var cid = $('#cid').val();
    $.ajax({
        "type": "post",
        "url": "<?php  echo murl('entry//like',array('m'=>'amouse_ecard'),true)?>",
        "data": {"mid": mid, "cid": cid},
        "dataType": "json",
        "success": function(data){
            if(data.success){
                if(data.status == 1){
                    $.flytip("点赞成功！");
                    document.getElementById('zan').innerHTML=data.zan;
                }if(data.status == 0){
                    $.flytip("您还没有建立微名片，马上为您跳转到帮助链接");
                    setTimeout("tiaozhuan('"+data.guanzhuUrl+"')",3000)
                }if(data.status == 2){
                    $.flytip("点赞失败，可能是网络有问题？");
                }if(data.status == 3){
                    $.flytip("您已经为<?php  echo $member['realname'];?>点过赞了");
                }
            }else{
                $.flytip("点赞失败，可能是网络有问题？");
            }
        }
    });
 }

</script>
<link rel="stylesheet" type="text/css" href="../addons/amouse_ecard/style/css/vpopup.css">
<script type="text/javascript">
	function noSetYet(){
		$.flytip("主人还没设置此栏目的内容哦⊙o⊙");
	}
	$(function(){
		var $contentItem = $(".cateContent .content-item");
		$contentItem.click(function(){
			var $this = $(this);
			$this.addClass("cur").siblings().removeClass("cur");
			setTimeout(function(){$this.removeClass("cur");},500);
		});
	});
	</script>
 </body>
<?php  if($setting['cnzz']) { ?>
<?php  echo htmlspecialchars_decode($setting['cnzz']);?>
<?php  } ?>

<?php  if((!empty($isbjyy))) { ?>
<div class="musicBox play" id="musicBox"></div>
<audio id="musicPlayer" loop src="<?php  echo $musicUrl;?>" autoplay="autoplay" style="display:none;position:absolute;z-index:-11"></audio>
<?php  } ?>
</html>