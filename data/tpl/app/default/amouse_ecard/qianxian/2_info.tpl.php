<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1">
    <meta name="format-detection" content="telephone=no"/>
    <title><?php  echo $member['realname'];?></title>
    <meta name="keywords" content="$_W['account']['name']微名片  二维码   <?php  echo $member['realname'];?>的名片">
    <meta name="description" content="Ta关注:<?php  echo $member['myattention'];?>,Ta在找:<?php  echo $member['myfource'];?>"/>
    <link rel="stylesheet" type="text/css" href="../addons/amouse_ecard/style/css/reset.css">
    <link rel="stylesheet" type="text/css" href="../addons/amouse_ecard/style/css/flytip.css">
    <link rel="stylesheet" type="text/css" href="../addons/amouse_ecard/style/css/nameCard.css?v=201410282">
</head>

<body class="namecard-info">
<input type="hidden" value="54757cd40cf2a355a86b4ce8" id="personInfoId"/>
<input type="hidden" value="<?php  echo $from_user;?>" id="openId"/>
<!--#=start page-->
<div class="namecard-page toggle-transition-1s namecard-page-relative">
    <!--#=start info-box-->
    <section class="info-box">
        <div class="info-box-inner">
            <a class="info-call" href="tel:<?php  echo $member['mobile'];?>"><i class="icon-call"></i>一键拨号</a>
            <div class="info-avatar">
                <?php  if($member['headimg']) { ?>
                <?php  if(substr($member['headimg'],0,9) == 'http://wx') { ?>
                <img src="<?php  echo $member['headimg'];?>" class="info-avatar-thumbnail">
                <?php  } else { ?>
                <img src="<?php  echo $_W['attachurl'];?><?php  echo $member['headimg'];?>" class="info-avatar-thumbnail">
                <?php  } ?>
                <?php  } else { ?>
                <img src="../addons/amouse_ecard/style/images/header.png" class="info-avatar-thumbnail"><?php  } ?>
            </div>
            <?php  if($member['qq']) { ?>
            <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php  echo $member['qq'];?>&site=qq&menu=yes">
                <?php  } else { ?>
                <a onclick="noqq()">
                    <?php  } ?>
                    <i class="icon-ewm" style="background-image: url();top:19px;right:30px"><img
                            src="../addons/amouse_ecard/style/images/qq.png" class="content-item-thumbnail"
                            style="width:150%"></i></a>

                <h3 class="info-box-name"><?php  echo $member['realname'];?></h3>
                <span class="info-box-post"><?php  echo $member['job'];?></span>
                <span class="info-box-post"><?php  echo $member['company'];?></span>

                <div class="info-text-box">
                    <p class="line"></p>
                    <?php  if($member['mobile']) { ?>
                    <div class="info-box-row"><p class="row-absolute"><i class="icon-phone"></i> <span
                            class="vertical-m">手机：</span></p><span class="vertical-m"><?php  echo $member['mobile'];?></span></div>
                    <?php  } ?>

                    <?php  if($member['email']) { ?>
                    <div class="info-box-row"><p class="row-absolute"><i class="icon-email"></i><span
                            class="vertical-m">邮箱：</span></p><span class="vertical-m"><?php  echo $member['email'];?></span></div>
                    <?php  } ?>

                    <?php  if($member['weixin']) { ?>
                    <div class="info-box-row"><p class="row-absolute"><i class="icon-weixin"></i> <span
                            class="vertical-m">微信：</span></p><span class="vertical-m"><?php  echo $member['weixin'];?></span></div>
                    <?php  } ?>

                    <?php  if($member['address']) { ?>
                    <div class="info-box-row"><p class="row-absolute"><i class="icon-address"></i><span
                            class="vertical-m">地址：</span></p><span class="vertical-m"><?php  echo $member['address'];?></span></div>
                    <?php  } ?>

                    <div class="info-box-row" style="padding-left: 0px; "><p class="row-absolute"></p><span
                            class="vertical-m" style="overflow:auto"><?php  echo $member['qianming'];?></span></div>
                </div>
        </div>
        <ul class="info-box-stat">
            <li class="info-box-item">
                <a href="<?php  echo $this->createMobileUrl('likes',array('id'=>$member['id'],'cid'=>$card['id'],'op'=>'list'),true)?>">
                    <span><i class="ico-hand"></i>赞</span>
                    <span class="info-number"><?php  echo $card['zan'];?></span>
                </a>
                <i class="stat-line"></i>
            </li>
            <li class="info-box-item">
                <a href="<?php  echo $this->createMobileUrl('Renmai',array('id'=>$member['id'], 'op'=>'list'),true)?>">
                    <span>人脉</span>
                    <span class="info-number"><?php  echo $renmaiNum;?></span>
                </a>
                <i class="stat-line"></i>
            </li>
            <li class="info-box-item">
                <a>
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
        <ul class="fovorite-inner">
            <li class="fovorite-inner-item">
                <div class="fovorite-inner-tit">最近收藏的好友</div>
                <div class="fovorite-inner-box">
                    <?php  if(is_array($renmai)) { foreach($renmai as $list) { ?>
                    <a class="fovorite-people"
                       href="<?php  echo $this->createMobileUrl('share',array('id'=>$list['id'], 'op'=>'renmai'),true)?>">
                        <?php  if($list['headimg']) { ?>
                        <?php  if(substr($list['headimg'],0,9) == 'http://wx') { ?>
                        <img src="<?php  echo $list['headimg'];?>" class="fovorite-people-thumbnail">
                        <?php  } else { ?>
                        <img src="<?php  echo $_W['attachurl'];?><?php  echo $list['headimg'];?>" class="fovorite-people-thumbnail">
                        <?php  } ?>
                    </a>
                    <?php  } else { ?>
                    <img src="../addons/amouse_ecard/style/images/header.png" class="fovorite-people-thumbnail"></a>
                    <?php  } ?>
                    <?php  } } ?>
                </div>
                <a class="fovorite-item-link"
                   href="<?php  echo $this->createMobileUrl('Renmai',array('id'=>$member['id'], 'op'=>'list'),true)?>"><i
                        class="icon-right"></i></a>
            </li>
        </ul>
    </section>

</div>

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
    <div class="feature-favor js-ewm feature-w66">
        <i class="ico-share"></i> <span class="vertical-m" id="collectBtnTx">收藏名片</span>
    </div>
    <a href="<?php  echo $this->createMobileUrl('index',array('id'=>$member['id'], 'op'=>'edit'))?>">
        <div class="feature-more feature-w33"><i class="icon-edit"></i> <span class="vertical-m">编辑</span></div></div>
</a>

<div class="more-list-wrap js-moreList">
    <div class="more-list">
        <ul class="more-list-ul">
            <li class="more-list-item more-avatar"><a href=" " class="more-item-anchor">
                <div class="more-avatar-thumb">
                    <img src=""
                         class="more-avatar-thumbnail">
                </div>
                <span class="vertical-m">隐藏姓名</span></a>
            </li>
            <li class="more-list-item"><a href="" class="more-item-anchor"><span
                    class="vertical-m">个人信息</span><i class="icon-right"></i></a></li>
            <li class="more-list-item btop mb10"><a href=" " class="more-item-anchor"><span
                    class="vertical-m">隐私设置</span><i class="icon-right"></i></a></li>
            <li class="more-list-item btop"><a href="/app/bizcard/collectList.do?star=true"
                                               class="more-item-anchor"><span class="vertical-m">我的人脉</span><i
                    class="icon-right"></i></a></li>
            <li class="more-list-item btop mb10"><a href="/app/bizcard/listRecommendFan.do?type=top"
                                                    class="more-item-anchor"><span class="vertical-m">推荐人脉</span><i
                    class="icon-right"></i></a></li>
            <li class="more-list-item btop"><a href="/app/bizcard/selectTemplate.do" class="more-item-anchor"><span
                    class="vertical-m">更换模板</span><i class="icon-right"></i></a></li>
            <li class="more-list-item btop mb10"><a href="/app/bizcard/toChangeBizCardBg.do"
                                                    class="more-item-anchor"><span class="vertical-m">更换背景</span><i
                    class="icon-right"></i></a></li>
            <li class="more-list-item btop"><a href="/app/bizcard/setPesonInfo.do?selectTemp=false#m1"
                                               class="more-item-anchor"><span class="vertical-m">我专注</span><i
                    class="icon-right"></i></a></li>
            <li class="more-list-item btop mb10"><a href="/app/bizcard/setPesonInfo.do?selectTemp=false#m2"
                                                    class="more-item-anchor"><span class="vertical-m">我在找</span><i
                    class="icon-right"></i></a></li>
        </ul>
    </div>
    <div class="more-list-item item-back"><a href="javascript:;" class="more-item-anchor"><i class="ico-back"></i> <span
            class="vertical-m">返 回</span></a></div>
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
        <div class="ewmform-summary">
            <img class="ewm-thumbnail" id="ewmThumbnail"   data-src="<?php  echo $this->getQRImage2($member['id'],$member['openid']);?>"
                                          style="padding: 5px 0px 0 0;width:96%"></div>
        <div class="ewmform-des">长按二维码可保存到手机里<br>可印在纸质名片和宣传单上</div>
    </div>
</div>
<div class="superMask" id="superMask"></div>

<div class="sideNav-tip" id="sideNavTip"></div>

<script src="../addons/amouse_ecard/style/js/jquery.1.11.1.js"></script>
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
        timestamp: <?php  echo $signPackage["timestamp"];?>,
        nonceStr: '<?php  echo $signPackage["nonceStr"];?>',
        signature : '<?php  echo $signPackage["signature"];?>',
        jsApiList: [
        'onMenuShareAppMessage',
        'onMenuShareTimeline',
        'onMenuShareQQ' ]
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
    function noqq() {
        $.flytip("您还没有设置qq号");
    }
</script>

<link rel="stylesheet" type="text/css" href="../addons/amouse_ecard/style/css/vpopup.css">
<!--#=end feature-->
</body>
</html>