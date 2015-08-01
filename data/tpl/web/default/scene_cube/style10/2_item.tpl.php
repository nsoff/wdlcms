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
<h4 class="f-size18">界面预览<span class='s-col-666 f-size14'> / Preview</span></h4>
<div class="imgBox">
<ul style="width:1380px;">
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/542264ef302c1.png" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/542264f067308.png" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/542264f1297dc.png" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/542264f2188f0.png" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/542264f31b898.png" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/542264f392296.png" style="width:100%;height:auto;">
</li>
</ul>
</div>
</div>
<div class="bd-intro bd-txt">
<h4 class="f-size18">基本介绍<span class='s-col-666 f-size14'> / Introduction</span></h4>
<p>松禾成长关爱基金会举办的民族分享音乐会以“山海和声，飞越彩虹”为主题，通过场景应用（LiveApp）传播活动信息。在慈展会期间，通过丰富的图片展现，为松禾成长关爱基金会赢得了更多的关注，众多人前来咨询。</p>
</div>
<div class="bd-detail bd-txt">
<h4 class="f-size18">详情介绍<span class='s-col-666 f-size14'> / Details</span></h4>
<div>
<p class="MsoNormal">
<b>重力感应启动页</b><b></b>
</p>
<p class="MsoNormal">
摇晃你的手机，画面随着你动作展示更多的内容，透明质感的参照物增强了视觉体验，立体页面表现形式，给人眼前一亮的感觉，充满了现代时尚感
</p>
<p class="MsoNormal">
<br />
</p>
<p class="MsoNormal">
<b>音乐配合阅读</b><b></b>
</p>
<p class="MsoNormal">
在感受创意盛宴的同时，灵动音乐始终伴随左右，不是只在阅读那么枯燥，感受公益给人的真实感觉
</p>
<p class="MsoNormal">
<br />
</p>
<p class="MsoNormal">
<b>Gif</b><b>式的动感页面</b>
</p>
<p class="MsoNormal">
通过精致图文，介绍壹基金以及慈展会的行动理念，并且生动形象的展现慈善进入互联网时期的一系列奇迹
</p>
<p class="MsoNormal">
<br />
</p>
<p class="MsoNormal">
<b>即时分享朋友圈</b><b></b>
</p>
<p class="MsoNormal">
如果你觉得这是个有趣的活动，肯定会立马分享。即时分享既满足了用户的利他心理，同时也使得品牌传播范围更为广泛
</p>
<p class="MsoNormal">
<br />
</p>
<p class="MsoNormal">
<b>在线捐款</b>
</p>
<p class="MsoNormal">
点击按钮立即进入公益捐款在线支付页面，随时抓取用户需求，便捷，优化用户交互体验
</p> </div>
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