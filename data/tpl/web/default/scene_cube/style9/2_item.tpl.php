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
<ul style="width:1600px;">
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/541643afb52a6.png" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/541643b1d2fe1.png" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/541643b3125b7.png" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/541643b3c2b8e.png" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/541643b51016b.png" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/541643b60ffe5.png" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/541643b6cb232.png" style="width:100%;height:auto;">
</li>
</ul>
</div>
</div>
<div class="bd-intro bd-txt">
<h4 class="f-size18">基本介绍<span class='s-col-666 f-size14'> / Introduction</span></h4>
<p>本应用原价12000元，现参加“新品9999”优惠活动！您只须在线支付购买即可享受优惠，活动有效期：2014年9月15日-2014年9月22日。优的联盟是首个中国办公家具行业电子商务品牌，致力于定制中高端办公家居用品、解决办公空间方案与线上线下全面的服务。现与互联网场景应用（LiveApp）结合，颠覆传统办公家具行业的创新模式，充分满足了其知名度传递的时效需求，并提高了销售业绩。</p>
</div>
<div class="bd-detail bd-txt">
<h4 class="f-size18">详情介绍<span class='s-col-666 f-size14'> / Details</span></h4>
<div>
<p class="MsoNormal" align="left">
<b>渐近式封面</b><b></b>
</p>
<p class="MsoNormal" align="left">
封面渐近的形式让人眼前一亮，充满了现代时尚感并说明了产品特色
</p>
<p class="MsoNormal" align="left">
<b>&nbsp;</b>
</p>
<p class="MsoNormal" align="left">
<b>整体理念</b><b></b>
</p>
<p class="MsoNormal" align="left">
通过与LiveApp的结合，对传统办公家具行业进行有效补充，符合移动互联网时代用户需求，在线上就能够详细的了解产品的信息
</p>
<p class="MsoNormal" align="left">
<b>&nbsp;</b>
</p>
<p class="MsoNormal" align="left">
<b>悬浮按钮</b><b></b>
</p>
<p class="MsoNormal" align="left">
三个页面悬浮按钮，方便了用户浏览自己想了解的模块，亦有五大免费体验，从而塑造小而美的细节精致
</p>
<p class="MsoNormal" align="left">
<b>&nbsp;</b>
</p>
<p class="MsoNormal" align="left">
<b>图文结合的表现形式</b><b></b>
</p>
<p class="MsoNormal">
将要表述的内容与图片相结合，展示出几何快装的优势、效率，增强内容的阅读感和现场体验感
</p>
<p class="MsoNormal" align="left">
<b>&nbsp;</b>
</p>
<p class="MsoNormal" align="left">
<b>背景音乐效果</b><b></b>
</p>
<p class="MsoNormal" align="left">
在轻松的背景音乐下，用户可以利用碎片时间来阅读内容，在轻松的氛围下实现信息的传递，达到信息传递的目的
</p>
<p class="MsoNormal" align="left">
<b>&nbsp;</b>
</p>
<p class="MsoNormal" align="left">
<b>我要预约服务</b><b></b>
</p>
<p class="MsoNormal" align="left">
心动的你不妨体验一次免费的超豪华服务，只要填写一张小表格就能完成预约哦
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