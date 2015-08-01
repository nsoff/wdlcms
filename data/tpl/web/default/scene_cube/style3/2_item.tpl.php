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
<img src="http://www.liveapp.cn/userfiles/orm/tmp/53b41eaa40a7b.png" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/53b41eae53289.png" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/53b41eb41cdc3.png" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/53b41ecbcca73.png" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/53b41ed1cbec0.png" style="width:100%;height:auto;">
</li>
<li>
<img src="http://www.liveapp.cn/userfiles/orm/tmp/53b41eea12ecd.png" style="width:100%;height:auto;">
</li>
</ul>
</div>
</div>
<div class="bd-intro bd-txt">
<h4 class="f-size18">基本介绍<span class='s-col-666 f-size14'> / Introduction</span></h4>
<p>《变形金刚4：绝迹重生》是由派拉蒙影业、中国电影频道以及家赋公司联合制作的一部机器人科幻电影，该片由迈克尔·贝导演，伊伦克鲁格编剧，采用3D技术拍摄，还未上映就成为大家关注的焦点。在前期影片的宣传上，深圳影城采用LiveApp进行社交网络的传播，进行影片的宣传推广，上线以来，在朋友圈广泛传播，成为人们观影和获取信息的主要途径，仅仅两天访问量突破5万人次。</p>
</div>
<div class="bd-detail bd-txt">
<h4 class="f-size18">详情介绍<span class='s-col-666 f-size14'> / Details</span></h4>
<div>
<p class="MsoNormal">
<b>擦一擦拉开序幕<span><br />
</span></b>LiveApp采用了更加细腻而创意性的交互，擦一擦漫天硝烟的战场，浮现出四年之后的一场新的战役！延续变形金刚<span>3</span>的风格，再进入变形金刚<span>4</span>的情境中；<span></span>
</p>
<p class="MsoNormal">
<b><br />
</b><b>酷炫音乐背景<span><br />
</span></b>试想在欣赏精美画面的同时，音乐烘托着环境和氛围，是不是更有味道，仿佛已经置身于电影院观影中，变形金刚的一幕一幕浮现在眼前，这就是<span>LiveApp</span>的效果；<span></span>
</p>
<p class="MsoNormal">
<b><br />
</b><b>全新人物登场<span><br />
</span></b>在未上映之前，影迷关心的一定是变形金刚<span>4</span>又出了哪些新的角色，新的造型，男女主角是谁，不要着急，等<span>LiveApp</span>给你慢慢讲述；<span></span>
</p>
<p class="MsoNormal">
<br />
<b>中国元素全方位呈现<span><br />
</span></b>对于中国影迷来说，不外乎是变形金刚<span>4</span>中加入了大量的中国元素，从人物角色：李冰冰、韩庚、吕良伟等加入，还是香港、武隆等地的取景，都大量吸引中国观众的注意力，<span>LiveApp</span>通过图文画面的变现让这些元素提前全方位呈现在中国影迷面前；<span></span>
</p>
<p class="MsoNormal">
<b><br />
</b><b>影院导航<span><br />
</span></b>看过前面的<span>LiveApp</span>故事，是不是已经忍不住想要去购票观影，不知道到哪里去看，没关系，现在由<span>LiveApp</span>告诉你去哪里看，并且导航你直接过去；<span></span>
</p>
<p class="MsoNormal">
<b><br />
</b><b>一键分享<span><br />
</span></b>想要把信息分享给朋友，一键点击就可将完整的信息分享给所有的朋友，呼朋唤友来欣赏如此大片；<b><span><br />
<br />
</span>更多<span><br />
</span></b>如果你想让影迷通过预约报名来预订电影票，你可以在<span>LiveApp</span>里面加入报名预约版块，让售票更加简单轻松！<span><br />
</span>你还可以加入咨询电话，让影迷通过拨打电话来预定电影票。
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