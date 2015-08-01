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
<img src="http://www.liveapp.cn/userfiles/orm/tmp/54097c6546f0b.jpg" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/54097c65c787f.jpg" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/54097c6648a82.jpg" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/54097c66b603b.jpg" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/54097c675a745.jpg" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/54097c67c2833.jpg" style="width:100%;height:auto;">
</li>
</ul>
</div>
</div>
<div class="bd-intro bd-txt">
<h4 class="f-size18">基本介绍<span class='s-col-666 f-size14'> / Introduction</span></h4>
<p> 子木广告有限公司是一家拥有丰富房地产广告操作经验的地产推广机构，致力于房地产企业提供优异的整合推广服务。现打破传统信息传播模式与场景应用（LiveApp）合作，以内心告白的方式诉说着人们的心声，将品牌与产品同时传播，相得益彰，取得了极优的传播效果。充分展示其敏锐的市场洞察力和快速反应能力，同时带来了接近200万的游览量，其日最高达30万人次。</p>
</div>
<div class="bd-detail bd-txt">
<h4 class="f-size18">详情介绍<span class='s-col-666 f-size14'> / Details</span></h4>
<div>
<p>
<span><span style="line-height:19.5px;">
<p class="MsoNormal" align="left">
<b>首页云动效果</b><b></b>
</p>
<p class="MsoNormal">
首页的白云随着节奏律动，与三个“重逢”的自己将用户带进了“我”的情感世界，使人感受一种静默的力量
</p>
<p class="MsoNormal">
<span>&nbsp;</span>
</p>
<p class="MsoNormal" align="left">
<b>背景音乐</b><b></b>
</p>
<p class="MsoNormal">
深邃感人背景音乐与背景故事内涵非常吻合， 故事因为音乐而进一步升华，产生情景交融的互动效果
</p>
<p class="MsoNormal">
<span>&nbsp;</span>
</p>
<p class="MsoNormal" align="left">
<b>你欣赏的是故事，而不是品牌推广</b><b></b>
</p>
<p class="MsoNormal">
每一张画面都在叙述着“自己”，简洁的画面，漫长的历程，让我们明白更深的蕴意、感同身受
</p>
<p class="MsoNormal">
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
</p>
<p class="MsoNormal" align="left">
<b>公众号、联系方式引导</b><b></b>
</p>
<p class="MsoNormal">
通过直接点击子木微互动，即刻一键连接企业与用户，情景交融中，自然促进用户主动联系企业预约看房<br />
<!--[if !supportLineBreakNewLine]--><br />
<!--[endif]-->
	</p>
	<p class="MsoNormal" align="left">
		<b>立即分享</b><b></b>
	</p>
	<p class="MsoNormal">
		动人的故事，新颖的传播模式，感同身受的你如果也被感动了，那就动动手指分享起来吧
	</p>
</span></span> 
</p>						</div>
					</div>
					<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('contact', TEMPLATE_INCLUDEPATH)) : (include template('contact', TEMPLATE_INCLUDEPATH));?>
				</div>
			</div>
		</div>
		<!-- 详细页面内容 end-->
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