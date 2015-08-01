<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1">
<meta name="keywords" content="$_W['account']['name']微名片 二维码 <?php  echo $member['realname'];?>的名片">
<meta name="description" content="Ta关注:<?php  echo $member['myattention'];?>,Ta在找:<?php  echo $member['myfource'];?>"/>
<title><?php  echo $member['realname'];?>的名片</title>
<link rel="stylesheet" type="text/css" href="../addons/amouse_ecard/style/css/flytip.css?v=2015040501">
<link rel="stylesheet" type="text/css" href="../addons/amouse_ecard/style/css/common.css?v=2014122">
<link rel="stylesheet" type="text/css" href="../addons/amouse_ecard/style/css/default.css?v=2014122">
    <?php  if($setting['cnzz']) { ?>
    <?php  echo htmlspecialchars_decode($setting['cnzz']);?>
    <?php  } ?>
</head>
<body class="icx-mobi-home">
<div style="display:none;">
    Ta关注:<?php  echo $member['myattention'];?> Ta在找:<?php  echo $member['myfource'];?>
</div>
<div class="icx-mobi-page toggle-transition-1s namecard-page-relative">
    <main class="container">
        <section class="carousel js-carousel">
            <ul class="carousel-inner">
                <li class="carousel-item">
                    <?php  if($card['bgimg']) { ?>
                    <img src="<?php  echo $_W['attachurl'];?><?php  echo $card['bgimg'];?>" class="carousel-item-pic">
                    <?php  } else { ?>
                    <img src="../addons/amouse_ecard/style/images/bg1.jpg" class="carousel-item-pic">
                    <?php  } ?>
                </li>
            </ul>
        </section>
        <div class="topbar"><?php  echo $member['company'];?></div>

        <div class="infobar">
            <ul class="infobar-inner">
                <li class="content-item">
                    <a href="<?php  echo $this->createMobileUrl('renmai',array('id'=>$member['id'], 'op'=>'list','wid'=>$member['openid']),true)?>"
                       class="content-item-anchor">
                        <div class="content-item-hgroup">
                            <h2 class="content-item-title">人脉</h2>
                            <h3 class="content-item-summary"><?php  echo $renmai;?></h3>
                        </div>
                    </a>
                </li>
                <li class="content-item">
                <a href="<?php  echo $this->createMobileUrl('info',array('id'=>$member['id'],'cid'=>$card['id'],'wid'=>$member['openid'],'op'=>'list'),true)?>"
                       class="content-item-anchor">
                        <div class="content-item-thumb">
                        <?php  if($member['headimg']) { ?>
                        <?php  if(substr($member['headimg'],0,9) == 'http://wx') { ?>
                        <img src="<?php  echo $member['headimg'];?>" class="content-item-thumbnail avatarPic">
                        <?php  } else { ?>
                        <img src="<?php  echo $_W['attachurl'];?><?php  echo $member['headimg'];?>" class="content-item-thumbnail avatarPic">
                        <?php  } ?>
                        <?php  } else { ?>
                        <img src="../addons/amouse_ecard/style/images/header.png" class="content-item-thumbnail avatarPic">
                        <?php  } ?>
                        </div>
                    </a>
                </li>
                <!--<li class="content-item ">
                    <?php  if($member['qq']) { ?>
                    <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php  echo $member['qq'];?>&site=qq&menu=yes" class="content-item-anchor">
                        <?php  } else { ?>
                        <a href="javascript:noqq()" class="content-item-anchor">
                        <?php  } ?>
                        <div class="content-item-thumb">
                            <img src="../addons/amouse_ecard/style/images/qq.png"  class="content-item-thumbnail">
                        </div>
                        </a>
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
                            <h2 class="content-item-title"><?php  echo $member['realname'];?></h2>
                            <h3 class="content-item-summary"><?php  echo $member['job'];?></h3>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="like-item" id="">
            <a href="<?php  echo $this->createMobileUrl('likes',array('id'=>$member['id'],'cid'=>$card['id'],'wid'=>$member['openid'],'op'=>'list'),true)?>">
                <span class="item-round"><i class="ico-hand"></i></span><span class="home-number info-number">
                <?php  echo $card['zan'];?>
            </span>
            </a>
        </div>

        <section class="cateContent">
            <ul class="content-inner">
                <li class="content-item js-content-item" data-id="<?php  echo $member['id'];?>">
                    <?php  if((!empty($card['shopUrl']))) { ?>
                    <a href="<?php  echo $this->createMobileUrl('shop',array('id'=>$member['id'],'wid'=>$member['openid'],'cid'=>$card['id'],'op'=>'list'),true)?>"
                       class="content-item-anchor">
                    <?php  } else { ?>
            <a href="<?php  echo $this->createMobileUrl('shop',array('id'=>$member['id'],'wid'=>$member['openid'],'cid'=>$card['id'],'op'=>'edit'),true)?>" class="content-item-anchor">
                    <?php  } ?>
                    <div class="content-item-thumb">
                    <img src="../addons/amouse_ecard/style/images/1.png?t=0" class="content-item-thumbnail" >
                    </div>
                    <div class="content-item-hgroup">
                        <h2 class="content-item-title">小店商城</h2>
                    </div>
                    </a>
                        <div class="content-item-bg"></div>
                </li>

                <li class="content-item js-content-item" data-id="1413616750509">
                    <?php  if((!empty($ispresence))) { ?>
                    <a href="<?php  echo $this->createMobileUrl('presence',array('id'=>$member['id'],'wid'=>$member['openid'],'cid'=>$card['id'],'op'=>'list'),true)?>" class="content-item-anchor">
                    <?php  } else { ?>
                    <a href="<?php  echo $this->createMobileUrl('presence',array('id'=>$member['id'],'wid'=>$member['openid'],'cid'=>$card['id'],'op'=>'edit'),true)?>" class="content-item-anchor">
                    <?php  } ?>
                    <div class="content-item-thumb">
                        <img src="../addons/amouse_ecard/style/images/card_index/2.png?t=1"  class="content-item-thumbnail" data-width="" data-height="">
                    </div>
                    <div class="content-item-hgroup">
                        <h2 class="content-item-title">个人风采</h2>
                    </div>
                    </a>
                    <div class="content-item-bg"></div>
                </li>

                <li class="content-item js-content-item" data-id="1413616750510">
                    <?php  if((!empty($isPhoto))) { ?>
                    <a href="<?php  echo $this->createMobileUrl('Photo',array('id'=>$member['id'],'wid'=>$member['openid'],'cid'=>$card['id'],'op'=>'list'),true)?>" class="content-item-anchor">
                    <?php  } else { ?>
                    <a href="<?php  echo $this->createMobileUrl('Photo',array('id'=>$member['id'],'wid'=>$member['openid'],'cid'=>$card['id'],'op'=>'edit'),true)?>" class="content-item-anchor">
                    <?php  } ?>
                    <div class="content-item-thumb">
                        <img src="../addons/amouse_ecard/style/images/card_index/3.png?t=2"
                             class="content-item-thumbnail" data-width="" data-height="">
                    </div>
                    <div class="content-item-hgroup">
                        <h2 class="content-item-title">精彩相册</h2>
                    </div>
                    </a>
                      <div class="content-item-bg"></div>
                </li>
                <li class="content-item js-content-item" data-id="1413616750511">
                    <?php  if((!empty($member['companyAddress']))) { ?>
                    <a href="<?php  echo $this->createMobileUrl('gps',array('id'=>$member['id'],'wid'=>$member['openid'],'cid'=>$card['id'],'op'=>'list'),true)?>"
                       class="content-item-anchor">
                        <?php  } else { ?>
                        <a href="<?php  echo $this->createMobileUrl('index',array('id'=>$member['id'],'wid'=>$member['openid'], 'op'=>'edit'),true)?>"
                           class="content-item-anchor">
                            <?php  } ?>
                            <div class="content-item-thumb">
                                <img src="../addons/amouse_ecard/style/images/card_index/4.png?t=3"
                                     class="content-item-thumbnail" data-width="" data-height="">
                            </div>
                            <div class="content-item-hgroup">
                                <h2 class="content-item-title">公司地址</h2>
                            </div>
                        </a>

                        <div class="content-item-bg"></div>
                </li>
                <li class="content-item js-content-item" data-id="1413616750512">
                    <a href="<?php  echo $this->createMobileUrl('info',array('id'=>$member['id'],'wid'=>$member['openid'],'cid'=>$card['id'],'op'=>'list'),true)?>"
                       class="content-item-anchor">
                        <div class="content-item-thumb">
                            <img src="../addons/amouse_ecard/style/images/card_index/5.png?t=4"
                                 class="content-item-thumbnail" data-width="" data-height="">
                        </div>
                        <div class="content-item-hgroup">
                            <h2 class="content-item-title">个人信息</h2>
                        </div>
                    </a>

                    <div class="content-item-bg"></div>
                </li>
                <li class="content-item js-content-item" data-id="1413616750513">
                    <?php  if((!empty($isCompany))) { ?>
                    <a href="<?php  echo $this->createMobileUrl('company',array('id'=>$member['id'],'wid'=>$member['openid'],'cid'=>$card['id'],'op'=>'list'),true)?>"
                       class="content-item-anchor">
                        <?php  } else { ?>
                        <a href="<?php  echo $this->createMobileUrl('company',array('id'=>$member['id'],'wid'=>$member['openid'],'cid'=>$card['id'],'op'=>'edit'),true)?>"
                           class="content-item-anchor">
                            <?php  } ?>
                            <div class="content-item-thumb">
                                <img src="../addons/amouse_ecard/style/images/card_index/6.png?t=5"
                                     class="content-item-thumbnail" data-width="" data-height="">
                            </div>
                            <div class="content-item-hgroup">
                                <h2 class="content-item-title">公司简介</h2>
                            </div>
                        </a>

                        <div class="content-item-bg"></div>
                </li>
                <li class="content-item">
                    <a href="javascript:;" class="content-item-anchor">
                        <div class="content-item-thumb">
                            <img src="../addons/amouse_ecard/style/images/xbg.png" class="content-item-thumbnail"></div>
                    </a>
                </li>
                <li class="content-item">
                    <a href="tel:<?php  echo $member['mobile'];?>" class="content-item-anchor">
                        <div class="content-item-thumb">
                            <img src="../addons/amouse_ecard/style/images/tell.png" class="content-item-thumbnail"></div>
                        <div class="content-item-hgroup">
                            <h2 class="content-item-title">一键拨号</h2>
                        </div>
                    </a>
                </li>
            </ul>
        </section>
    </main>
</div>

<!--<div class="feature js-sharebox toggle-transition-1s">
    <div class="feature-favor js-ewm feature-w66">
        <i class="ico-share"></i> <span class="vertical-m" id="collectBtnTx">我的二维码</span>
    </div>/addons/amouse_ecard/template/mobile/qianx_index.html
    <div class="feature-more js-featureMore feature-w33"><i class="ico-more"></i> <span class="vertical-m">更多</span>
    </div>
</div>-->

<div class="feature js-sharebox toggle-transition-1s">
    <div class="feature-favor js-cfriend feature-w66">
        <i class="ico-share"></i> <span class="vertical-m" id="collectBtnTx">收藏名片</span>
    </div>
    <div class="feature-more js-featureMore feature-w33"><i class="ico-more"></i>
        <span class="vertical-m more-relative">更多<code class="dialog-num dialogNum"></code></span>
    </div>
</div>

<div class="more-list-wrap js-moreList">
    <div class="more-list">
        <ul class="more-list-ul">
            <li class="more-list-item more-avatar"><a
                    href="<?php  echo $this->createMobileUrl('info',array('id'=>$member['id'],'wid'=>$member['openid'],'cid'=>$card['id'],'op'=>'list'))?>"
                    class="more-item-anchor">
                <div class="more-avatar-thumb">
                    <?php  if($member['headimg']) { ?>
                    <?php  if(substr($member['headimg'],0,9) == 'http://wx') { ?>
                    <img src="<?php  echo $member['headimg'];?>" class="more-avatar-thumbnail">
                    <?php  } else { ?>
                    <img src="<?php  echo $_W['attachurl'];?><?php  echo $member['headimg'];?>" class="more-avatar-thumbnail">
                    <?php  } ?>
                    <?php  } else { ?>
                    <img src="../addons/amouse_ecard/style/images/header.png" class="more-avatar-thumbnail"><?php  } ?>
                </div>
                <span class="vertical-m"><?php  echo $member['realname'];?></span></a>
            </li>
            <li class="more-list-item">
                <a href="<?php  echo $this->createMobileUrl('index',array('id'=>$member['id'], 'op'=>'edit'),true)?>"
                   class="more-item-anchor">
                    <span class="vertical-m">个人信息</span><i class="icon-right"></i>
                </a>
            </li>
            <li class="more-list-item btop mb10">
                <a href="<?php  echo $this->createMobileUrl('privateSet',array('id'=>$member['id'],'wid'=>$member['openid'], 'op'=>'list'),true)?>"
                   class="more-item-anchor">
                    <span class="vertical-m">隐私设置</span><i class="icon-right"></i>
                </a>
            </li>
            <li class="more-list-item btop">
                <a href="<?php  echo $this->createMobileUrl('Renmai',array('id'=>$member['id'],'wid'=>$member['openid'],'cid'=>$card['id'],'op'=>'list'),true)?>"
                   class="more-item-anchor">
                    <span class="vertical-m">我的人脉</span><i class="icon-right"></i>
                </a>
            </li>
            <li class="more-list-item btop mb10">
                <a href="<?php  echo $this->createMobileUrl('recommed',array('id'=>$member['id'],'wid'=>$member['openid'],'cid'=>$card['id'],'op'=>'list'),true)?>"
                   class="more-item-anchor">
                    <span class="vertical-m">推荐人脉</span><i class="icon-right"></i>
                </a>
            </li>
            <li class="more-list-item btop">
                <a href="<?php  echo $this->createMobileUrl('indexEdit',array('id'=>$member['id'],'wid'=>$member['openid'], 'op'=>'list', 'cid'=>$card['id']),true)?>"
                   class="more-item-anchor">
                    <span class="vertical-m">编辑名片</span><i class="icon-right"></i>
                </a>
            </li>
            <li class="more-list-item btop mb10">
                <a href="<?php  echo $this->createMobileUrl('background',array('op'=>'list','wid'=>$member['openid'],'cid'=>$card['id'], 'id'=>$member['id']),true)?>"
                   class="more-item-anchor">
                    <span class="vertical-m">更换背景</span><i class="icon-right"></i>
                </a>
            </li>
            <li class="more-list-item btop mb10">
                <a href="<?php  echo $this->createMobileUrl('music',array('id'=>$member['id'],'wid'=>$member['openid'],'cid'=>$card['id']),true)?>" class="more-item-anchor">
                    <span class="vertical-m">更换音乐</span><i class="icon-right"></i>
                </a>
            </li>

            <!--<li class="more-list-item btop">
                <a href="<?php  echo $this->createMobileUrl('Index',array('id'=>$member['id'], 'op'=>'edit'))?>" class="more-item-anchor">
                    <span class="vertical-m">我专注</span><i class="icon-right"></i>
                </a>
            </li>
            <li class="more-list-item btop mb10">
                <a href="<?php  echo $this->createMobileUrl('Index',array('id'=>$member['id'], 'op'=>'edit'))?>" class="more-item-anchor">
                    <span class="vertical-m">我在找</span><i class="icon-right"></i>
                </a>
            </li>-->
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
     <img class="ewm-thumbnail" id="ewmThumbnail" data-src="<?php  echo $this->getQRImage2($member['id'],$member['openid']);?>"  style="padding: 5px 0px 0 0;width:96%">
            <!--src="../addons/amouse_ecard/data/<?php  echo $member['id'];?>amouseerweima_<?php  echo $_W['uniacid'];?>.png"-->
        </div>
        <div class="ewmform-des">长按二维码可保存到手机里<br>可印在纸质名片和宣传单上</div>
    </div>
</div>

<div class="superMask" id="superMask"></div>
<input id="hasCollect" type="hidden" value="true"/>
<input id="cardId" type="hidden" value="<?php  echo $card['id'];?>"/>
<input id="personId" type="hidden" value="<?php  echo $member['id'];?>"/>
<input id="openId" type="hidden" value="<?php  echo $from_user;?>"/>

<script src="../addons/amouse_ecard/style/js/jquery.1.11.1.js?v=201504101043"></script>
<script src="../addons/amouse_ecard/style/js/flytip.js?v=201504101043"></script>
<script src="../addons/amouse_ecard/style/js/vpopup.js?v=201504101043"></script>
<script src="../addons/amouse_ecard/style/js/cookie.js?v=201504101043"></script>
<script src="../addons/amouse_ecard/style/js/common.js?v=201504101043"></script>
<input id="shareUrl" type="hidden" value="<?php  echo $linkUrl;?>"/>
<input id="shareCss" type="hidden" value="../addons/amouse_ecard/style/css/share.css?v=201504101043">
<input id="shareUrl" type="hidden" value="<?php  echo $linkUrl;?>"/>
<script>
    var shareContent = {
        bdText: '<?php  echo $member['realname'];?>的微名片',
        bdDesc: '公司:<?php  echo $member['company'];?>\n　职位:<?php  echo $member['job'];?>\n　详情请关注公众号“<?php  echo $_W['account']['name'];?>”!',
        bdUrl: "<?php  echo $linkUrl;?>",
        bdPic: "<?php  echo $shareimg;?>",
        onBeforeClick: function (cmd, config) {
            if (cmd == 'sqq') {
                config.bdDesc = config.bdText + '\n' + config.bdDesc;
                config.bdDesc = null;
                return config;
            } else if (cmd == 'tsina') {
                config.bdText = config.bdText + '\n' + config.bdDesc;
                return config;
            }

        }
    };
    var PC = false;
</script>
<script src="../addons/amouse_ecard/style/js/share.js?v=201504101043"></script>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script language='javascript'>
    <?php 
      $jssdk = new JSSDK();
      $signPackage=$jssdk->GetSignPackage();
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
        'onMenuShareWeibo',
        'onMenuShareQQ',
        'onMenuShareQZone'
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
        wx.onMenuShareQQ(shareMeta);
        wx.onMenuShareQZone(shareMeta);
    });
</script>
<link rel="stylesheet" type="text/css" href="../addons/amouse_ecard/style/css/vpopup.css">
<script type="text/javascript">
    $(function () {
        var $contentItem = $(".cateContent .content-item");
        $contentItem.click(function () {
            var $this = $(this);
            $this.addClass("cur").siblings().removeClass("cur");
            setTimeout(function () {
                $this.removeClass("cur");
            }, 500);
        });
    });

    function noqq() {
        $.flytip("您还没有设置qq号");
    }
</script>

<?php  if((!empty($isbjyy))) { ?>
<div class="musicBox play" id="musicBox"></div>
<audio id="musicPlayer" loop src="<?php  echo $musicUrl;?>" autoplay="autoplay" style="display:none;position:absolute;z-index:-11"></audio>
<?php  } ?>
</body>
</html>