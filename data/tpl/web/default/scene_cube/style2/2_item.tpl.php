<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<link href="../addons/scene_cube/style/css/global.css?&versin=12" rel="stylesheet" type="text/css" />

<section class="p-store m-storeDetail">
<div class="m-storeDetail-top s-bg-fff">
<!--修改 by 场景应用-->
<div class="top-con" style="margin-left:20px;">
<div class="u-pathStore f-size16">
<span class="path-icon icon-home css_sprite s-bg-pathH"></span>
<span class="path-icon icon-arrow css_sprite s-bg-pathA"></span>
<a href="" class="path-item s-col-txt01">App Store</a>
<span class="path-icon icon-arrow css_sprite s-bg-pathA"></span>
<a href="" class="path-item s-col-txt01"><?php  echo $app['title'];?></a>
</div>
</div>
</div>
<!--修改 by 场景应用-->
<div class="m-storeDetail-con f-mag-t-20" style="margin-left:20px;">
<div class="con-left m-cardScan" style="left: 0;">
<div class="u-listShow f-card">
<div class="item-top">
<img alt="<?php  echo $app['title'];?>" src="<?php  echo toimage($app['thumb'])?>" />
<span></span>
<p class='f-tc'><img src="<?php  echo toimage($app['qrcode'])?>" alt="二维码" /></p>
</div>
<div class="item-bottom s-bg-fff">
<div class="tit">
<h4 title="<?php  echo $app['title'];?>"><?php  echo $app['title'];?></h4>
<p title="<?php  echo $app['author'];?>">by <?php  echo $app['author'];?></p>
<span class="css_sprite s-bg-qr_icon icon-qr f-cur"></span>
</div>
<div class="con">
<div class="con">
<p>
</p>
<strong class="f-tr">【<?php  echo $app['series'];?>】</strong>
</div>
</div>
</div>
</div>
<p class="u-btn01 f-flow222 f-tc opacity j-detail-buy" data-free="" data-msg="">
<?php  if($isallow['status']==1) { ?>
	<?php  if($leftnum==0) { ?>
	<a href="<?php  echo $create_url;?>" class="f-size18 s-col-fff dingzhi">
	<span class="f-size18">已使用完</span> 购买 </a>
	<?php  } else { ?>
	<a href="<?php  echo $create_url;?>" class="f-size18 s-col-fff dingzhi">
	<span class="f-size18">制作场景</span>  </a>
	<?php  } ?>
<?php  } else { ?>
<a href="javascript:alert('请联系管理人员购买开通！')" class="f-size18 s-col-fff dingzhi">
<span class="f-size18"><?php  echo $this->doFormatMoney($app['price'])?>/年</span>购买 </a>
<?php  } ?>
</p>
</div>
<div class="con-right m-cardInfo s-bg-fff s-col-333">
<div class="top">
<h3 class="f-size24"><?php  echo $app['title'];?><span class="f-size16 s-col-999">by <?php  echo $app['series'];?></span></h3>
<div class="u-share">
<div class="jiathis_style_24x24 s-col-444 f-size14">
分享到：
<a class="jiathis_button_qzone css_sprite"></a>
<a class="jiathis_button_tsina css_sprite"></a>
<a class="jiathis_button_tqq css_sprite"></a>
<a class="jiathis_button_weixin css_sprite"></a>
</div>
</div>
</div>
<div class="bd">
<div class="bd-ui bd-txt">
<h4 class="f-size18">界面预览<span class="s-col-666 f-size14"> / Preview</span></h4>
<div class="imgBox">
<ul style="width: 1370px;">
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/53fd31b7bbcfd.png" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/53fd31b8d0b99.png" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/53fd31b9e0bfd.png" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/53fd31bac326a.png" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/53fd31bb7bffe.png" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/53fd31bc33145.png" style="width:100%;height:auto;">
</li>
</ul>
</div>
</div>
<div class="bd-intro bd-txt">
<h4 class="f-size18">基本介绍<span class="s-col-666 f-size14"> / Introduction</span></h4>
<p>都市丽人是国内首家快时尚的内衣品牌。2012年，连续三年签下国际名模林志玲作为代言人，并聘其担任都市丽人时尚内衣的首席创意师，开始诠释不一样的品牌内涵。通过云来场景应用生动的表现形式与交互方式，用户深刻的感知到“性感”“极致”“绽放”品牌内涵。此场景应用，单日最高浏览量已达3万次。</p>
</div>
<div class="bd-detail bd-txt">
<h4 class="f-size18">详情介绍<span class="s-col-666 f-size14"> / Details</span></h4>
<div>
<span> </span>
<p>
<b><span style="font-family:Microsoft YaHei;"><span style="font-family:Microsoft YaHei;">首页擦一擦</span></span></b>
</p>
<span> </span>
<p>
<span style="font-family:Microsoft YaHei;"><span style="font-family:Microsoft YaHei;">擦一擦互动体验，你会对模糊镜像之下产生怎样的期待？无限惊喜都在”擦一擦“</span></span>
</p>
<span> </span>
<p>
<b><span style="font-family:Tahoma;"><span><br>
</span></span></b>
</p>
<p>
<b><span style="font-family:Microsoft YaHei;"><span style="font-family:Microsoft YaHei;">背景音乐</span></span></b>
</p>
<span> </span>
<p>
<span style="font-family:Microsoft YaHei;"><span style="font-family:Microsoft YaHei;">声音是触动共鸣最直接的元素，听听志玲的声音，你将很快了解”都市丽人“想要传达给你的理念</span></span>
</p>
<span> </span>
<p>
<b><span style="font-family:Tahoma;"><span><br>
</span></span></b>
</p>
<p>
<b><span style="font-family:Microsoft YaHei;"><span style="font-family:Microsoft YaHei;">多图文展示</span></span></b>
</p>
<span> </span>
<p>
<span style="font-family:Microsoft YaHei;"><span style="font-family:Microsoft YaHei;">“志玲说”主题凸显，通过精致的图文展示，将林志玲的美与都市丽人的性感完美融合，极具视觉冲击</span></span>
</p>
<span> </span>
<p>
<b><span style="font-family:Tahoma;"><span><br>
</span></span></b>
</p>
<p>
<b><span style="font-family:Microsoft YaHei;"><span style="font-family:Microsoft YaHei;">视频展示</span></span></b>
</p>
<span> </span>
<p>
<span style="font-family:Microsoft YaHei;"><span style="font-family:Microsoft YaHei;">久违的志玲新版广告片，以视频的形式，完整展现品牌魅力</span></span>
</p>
<span> </span>
<p>
<b><span style="font-family:Tahoma;"><span><br>
</span></span></b>
</p>
<p>
<b><span style="font-family:Microsoft YaHei;"><span style="font-family:Microsoft YaHei;">分享给更多的朋友</span></span></b>
</p>
<span> </span>
<p>
<span style="font-family:Microsoft YaHei;"><span style="font-family:Microsoft YaHei;">“快来点我”，引导分享，不管你是喜欢视频、画面，还是林志玲，你一定都会分享给其他朋友</span></span>
</p>
<p>
<br>
</p>
<span> </span> 
</div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('contact', TEMPLATE_INCLUDEPATH)) : (include template('contact', TEMPLATE_INCLUDEPATH));?>
</div>
</div>
</div>
 </section>
 <script>

$(".icon-qr").hover(function(){
	var qr_img = $(this).parents('.item-bottom').prev().find('p');
	qr_img.addClass('show');
},function(){
	var qr_img = $(this).parents('.item-bottom').prev().find('p');
	qr_img.removeClass('show');	
});
</script>
 <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>