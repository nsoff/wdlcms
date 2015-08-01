<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1">
<meta name="format-detection" content="telephone=no" />
<title><?php  echo $member['realname'];?></title>
<meta name="keywords" content="$_W['account']['name']微名片  二维码   <?php  echo $member['realname'];?>的名片">
<meta name="description" content="Ta关注:<?php  echo $member['myattention'];?>,Ta在找:<?php  echo $member['myfource'];?>" />
<link rel="stylesheet" type="text/css" href="../addons/amouse_ecard/style/css/reset.css">
<link rel="stylesheet" type="text/css" href="../addons/amouse_ecard/style/css/flytip.css">
<link rel="stylesheet" type="text/css" href="../addons/amouse_ecard/style/css/nameCard.css?v=201410282">
</head>

<body class="namecard-info">
<input type="hidden" value="<?php  echo $card['id'];?>" id="cid" />
<input type="hidden" value="<?php  echo $from_user;?>" id="openId" />
<input type="hidden" value="<?php  echo $member['id'];?>" id="mid" />
<!--#=start page-->
<div class="namecard-page toggle-transition-1s namecard-page-relative">
  <!--#=start info-box-->
  <section class="info-box">
    <div class="info-box-inner">
      <?php  if($mobile==0) { ?><a class="info-call" href="tel:<?php  echo $member['mobile'];?>"><i class="icon-call"></i>一键拨号</a><?php  } ?>
      <?php  if($mobile==2) { ?><a class="info-call" onclick="noMobile()"><i class="icon-call"></i>一键拨号</a><?php  } ?>
      <div class="info-avatar">
       <?php  if($member['headimg']) { ?><img src="<?php  echo $_W['attachurl'];?><?php  echo $member['headimg'];?>" class="info-avatar-thumbnail"><?php  } else { ?>
       <img src="../addons/amouse_ecard/style/images/header.png" class="info-avatar-thumbnail"><?php  } ?>
       		</div>
      <?php  if($member['mobile'] && $qq==0) { ?>
	  <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php  echo $member['qq'];?>&site=qq&menu=yes" >
	  <?php  } else { ?>
	  <a onclick="noqq()" >
	  <?php  } ?>
	  <i class="icon-ewm" style="background-image: url();top:19px;right:30px"><img src="../addons/amouse_ecard/style/images/qq.png" class="content-item-thumbnail" style="width:150%"></i>
	  </a>
      <h3 class="info-box-name"><?php  echo $member['realname'];?></h3>
      <span class="info-box-post"><?php  echo $member['job'];?></span>
      <span class="info-box-post"><?php  echo $member['company'];?></span>
      <div class="info-text-box">
        <p class="line"></p>
        <?php  if($member['mobile'] && $mobile==0) { ?>
		<div class="info-box-row"><p class="row-absolute"><i class="icon-phone"></i> <span class="vertical-m">手机：</span></p><span class="vertical-m"><?php  echo $member['mobile'];?></span></div>
		<?php  } ?>
		
        <?php  if($member['email'] && $email==0) { ?>
		<div class="info-box-row"><p class="row-absolute"><i class="icon-email"></i><span class="vertical-m">邮箱：</span></p><span class="vertical-m"><?php  echo $member['email'];?></span></div>
		<?php  } ?>

        <?php  if($member['weixin'] && $weixin==0) { ?>
		<div class="info-box-row"><p class="row-absolute"><i class="icon-weixin"></i> <span class="vertical-m">微信：</span></p><span class="vertical-m"><?php  echo $member['weixin'];?></span></div>
		<?php  } ?>
		
		<?php  if($member['address'] && $address==0) { ?>
		<div class="info-box-row"><p class="row-absolute"><i class="icon-address"></i><span class="vertical-m">地址：</span></p><span class="vertical-m"><?php  echo $member['address'];?></span></div>
		<?php  } ?>
        <!--<div class="info-box-row" style="padding-left: 0px;"><p class="row-absolute"></p><span class="vertical-m">我专注：<?php  echo $member['myattention'];?></span></div>
        <div class="info-box-row" style="padding-left: 0px;"><p class="row-absolute"></p><span class="vertical-m">我在找：<?php  echo $member['myfocus'];?></span></div>-->
		&nbsp <div class="info-box-row" style="padding-left: 0px; "><p class="row-absolute" ></p><span class="vertical-m" style="overflow:auto"><?php  echo $member['qianming'];?></span></div>
        </div>
    </div>
    <ul class="info-box-stat">
    	<li class="info-box-item" >
        <a onclick="likeAjax()" href="javascript:">
        <span><i class="ico-hand"></i>赞</span>
        <span class="info-number" id="zan"><?php  echo $card['zan'];?></span>
        </a>
        <i class="stat-line"></i>
      </li>
      <li class="info-box-item">
        <a href="javascript:">
        <span>人脉</span>
        <span class="info-number"><?php  echo $renmaiNum;?></span>
        </a>
        <i class="stat-line"></i>
      </li>
      <li class="info-box-item">
        <a href="javascript:">
        <span>被查看</span>
        <span class="info-number"><?php  echo $card['view'];?></span>
        </a>
      </li>
    </ul>
  </section>
  <!--#=end info-box--> 
  
  <!--#=start info-column-->
  <section class="info-column">
     <!--     -->
      <ul class="fovorite-text-inner">
      			<li class="info--text-item">
		          <span class="info-name-tit">TA专注：</span><?php  echo $member['myattention'];?></li> 
		       	<li class="info--text-item">
		          <span class="info-name-tit">TA在找：</span><?php  echo $member['myfocus'];?></li> 
		        </ul>
		   </section>
  
  <!--#=end info-column-->
</div>
<!--#=end page--> 

<!--#=start ewm-->
<div class="ewmform js-ewmform">
	<div class="ewmform-box">
  	<code class="ewmform-close js-ewmClose"></code>
  	<div class="ewmform-title">扫码收藏我的微名片</div>
    <div class="ewmform-summary">
    	<img class="ewm-thumbnail">
     		</div>
  </div>
</div>
<!--#=end ewm-->

<!--#=start feature-->
	
	<div class="feature js-sharebox toggle-transition-1s">
	  <a onclick="collectAjax();">
          <div class="feature-favor  feature-w66" style="width:30%">
		<i class="ico-favor"></i> <span class="vertical-m" >收藏TA</span>
	  </div>
     </a>
	<?php  if($ismember) { ?>
	<div class="feature-favor  feature-w66" style="width:40%">
		<a href="<?php  echo $this->createMobileUrl('Index',array('op'=>'list'))?>">
		<i class="ico-home"></i> <span class="vertical-m" >我的微名片</span></a>
	</div>
	<?php  } else { ?>
	<a href="<?php  echo $guanzhuUrl;?>"><div class="feature-favor  feature-w66" style="width:40%">
		<i class="ico-card"></i> <span class="vertical-m" >我也要一个</span></a>
	</div>
    <?php  } ?>
	
	<div class="feature-more js-featureMore feature-w33"><i class="ico-more"></i>
        <span class="vertical-m">更多</span>
    </div>
    </div>
	
	<div class="more-list-wrap js-moreList">
	  <div class="more-list">
		  <ul class="more-list-ul">
			<li class="more-list-item btop">
				<a href="<?php  echo $guanzhuUrl;?>" class="more-item-anchor"><span class="vertical-m">操作教程</span><i class="icon-right"></i></a>
			</li>
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
		<div class="ewmform-summary"><img class="ewm-thumbnail" id="ewmThumbnail" data-src="<?php  echo $this->getQRImage2($member['id'],$member['openid']);?>" style="padding: 5px 0px 0 0;width:96%"></div>
	  	<div class="ewmform-des">长按二维码可保存到手机里<br>可印在纸质名片和宣传单上</div>
  </div>
</div>
<div class="superMask" id="superMask"></div>

<div class="sideNav-tip" id="sideNavTip"></div>

<script src="../addons/amouse_ecard/style/js/jquery.1.11.1.js"></script>
<script src="../addons/amouse_ecard/style/js/cookie.js"></script>
<script src="../addons/amouse_ecard/style/js/wx-share.js?v=201410282"></script>
<script src="../addons/amouse_ecard/style/js/flytip.js"></script>
<script src="../addons/amouse_ecard/style/js/vpopup.js"></script>
<script src="../addons/amouse_ecard/style/js/common.js?v=2014102821"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
    <?php 
            $jssdk = new JSSDK();
    $signPackage = $jssdk->GetSignPackage();
    ?>
    wx.config({
        debug: false,
        appId: '<?php  echo $signPackage["appId"];?>',
        timestamp:<?php  echo $signPackage["timestamp"];?>,
        nonceStr:'<?php  echo $signPackage["nonceStr"];?>',
            signature : '<?php  echo $signPackage["signature"];?>',
            jsApiList: [
        'onMenuShareAppMessage',
        'onMenuShareTimeline',
        'onMenuShareQQ']
    }) ;
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
    function noMobile(){
        $.flytip("对方设置了隐私保护，不能拨打电话");
    }

    function noqq(){
        $.flytip("对方设置了隐私保护，不能联系qq");
    }

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
                        //setTimeout(tiaozhuan(data.guanzhuUrl),30000);
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
<link rel="stylesheet" type="text/css" href="../addons/amouse_ecard/style/css/vpopup.css"><!--#=end feature-->
</body>
</html>