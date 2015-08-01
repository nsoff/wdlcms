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
<ul style="width:940px;">
<li>
<img src="http://www.liveapp.cn/userfiles/case2/PrtSc/1/1.png" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/case2/PrtSc/1/2.png" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/case2/PrtSc/1/3.png" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/case2/PrtSc/1/4.png" style="width:100%;height:auto;">
</li>
</ul>
</div>
</div>
<div class="bd-intro bd-txt">
<h4 class="f-size18">基本介绍<span class='s-col-666 f-size14'> / Introduction</span></h4>
<p>九章别墅位于朝阳区东苇路3号，项目周围环绕400亩原生林，2013年8月开盘，建筑类型全部为独栋别墅，，所有产品风格不同于目前市场上已有的任何一种建筑风格。通过轻APP，更进一步的向购房者传达九章别墅得天独厚的原生态木林资源及优越的地理位置。这样的广告传达能够更精准的向大众说明项目的细节以及九章别墅所拥有的独一无二的特点，提升购房者的购买欲望。</p>
</div>
<div class="bd-detail bd-txt">
<h4 class="f-size18">详情介绍<span class='s-col-666 f-size14'> / Details</span></h4>
<div>
<p class="MsoNormal">
<b>实景图片</b><br />
九章别墅美奂美轮的景色配以绝妙的文案通过<span>APP</span>直接与消费者分享<span></span>
</p>
<p class="MsoNormal">
<br />
<b>地图</b><br />
方便购房者精准定位<span></span>
</p>
<p class="MsoNormal">
<br />
<b>预约：</b><br />
效率应用，让购房者了解房屋<span></span>
</p>
<br />
<b>分享：</b><br />
轻<span>APP</span>抓住了购房者心理，在做购房这种重大决定时倾向于向朋友询问意见，这样的设置不仅满足了购房者的心理需求，又在分享的同时达到了广告传播的作用
<p class="MsoNormal">
<br />
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