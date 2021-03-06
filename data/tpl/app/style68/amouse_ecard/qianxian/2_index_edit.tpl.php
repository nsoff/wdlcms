<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1">
<meta name="keywords" content="$_W['account']['name']微名片  二维码 <?php  echo $member['realname'];?>的名片">
<meta name="description" content="Ta关注:<?php  echo $member['myattention'];?>,Ta在找:<?php  echo $member['myfource'];?>"/>
<title><?php  echo $member['realname'];?>的名片</title>
<link rel="stylesheet" type="text/css" href="../addons/amouse_ecard/style/css/flytip.css">
<link rel="stylesheet" type="text/css" href="../addons/amouse_ecard/style/css/common.css?v=2014122">
<link rel="stylesheet" type="text/css" href="../addons/amouse_ecard/style/css/default.css?v=2014122">
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
                    <?php  if($card['bgimg']) { ?><img src="<?php  echo $_W['attachurl'];?><?php  echo $card['bgimg'];?>" class="carousel-item-pic">
                    <?php  } else { ?><img src="../addons/amouse_ecard/style/images/bg1.jpg" class="carousel-item-pic"><?php  } ?>
                </li>
            </ul>
        </section>
        <div class="topbar">编辑我的名片</div>

        <div class="edit-tip">
            <div class="edit-tip-inner"><p class="edit-tip-tit">操作说明：</p>点击栏目区域选择栏目进行编辑</div>
        </div>
        <section class="cateContent">
            <ul class="content-inner">

                <li class="content-item js-content-item" data-id="1413616750508">
                    <a href="<?php  echo $this->createMobileUrl('shop',array('id'=>$id,'wid'=>$member['openid'],'cid'=>$cid,'op'=>'edit'),true)?>"
                       class="content-item-anchor">
                        <div class="content-item-thumb">
                            <img src="../addons/amouse_ecard/style/images/card_index/1.png?t=0"
                                 class="content-item-thumbnail" data-width="" data-height="">
                        </div>
                        <div class="content-item-hgroup">
                            <h2 class="content-item-title">小店商城</h2>
                            <i class="edit-icon edit-icon-pen"></i>
                        </div>
                    </a>

                    <div class="content-item-bg"></div>
                </li>
                <li class="content-item js-content-item" data-id="1413616750509">
                    <a href="<?php  echo $this->createMobileUrl('presence',array('id'=>$member['id'],'wid'=>$member['openid'],'cid'=>$card['id'],'op'=>'edit'),true)?>"
                       class="content-item-anchor">
                        <div class="content-item-thumb">
                            <img src="../addons/amouse_ecard/style/images/card_index/2.png?t=1"
                                 class="content-item-thumbnail" data-width="" data-height="">
                        </div>
                        <div class="content-item-hgroup">
                            <h2 class="content-item-title">个人风采</h2>
                            <i class="edit-icon edit-icon-pen"></i>
                        </div>
                    </a>

                    <div class="content-item-bg"></div>
                </li>
                <li class="content-item js-content-item" data-id="1413616750510">
                    <a href="<?php  echo $this->createMobileUrl('Photo',array('id'=>$member['id'],'wid'=>$member['openid'],'cid'=>$card['id'],'op'=>'edit'),true)?>"
                       class="content-item-anchor">
                        <div class="content-item-thumb">
                            <img src="../addons/amouse_ecard/style/images/card_index/3.png?t=2"
                                 class="content-item-thumbnail" data-width="" data-height="">
                        </div>
                        <div class="content-item-hgroup">
                            <h2 class="content-item-title">精彩相册</h2>
                            <i class="edit-icon edit-icon-pen"></i>
                        </div>
                    </a>

                    <div class="content-item-bg"></div>
                </li>
                <li class="content-item js-content-item" data-id="1413616750511">
                    <a href="<?php  echo $this->createMobileUrl('Index',array('id'=>$member['id'],'wid'=>$member['openid'], 'op'=>'edit'),true)?>"
                       class="content-item-anchor">
                        <div class="content-item-thumb">
                            <img src="../addons/amouse_ecard/style/images/card_index/4.png?t=3"
                                 class="content-item-thumbnail" data-width="" data-height="">
                        </div>
                        <div class="content-item-hgroup">
                            <h2 class="content-item-title">公司地址</h2>
                            <i class="edit-icon edit-icon-pen"></i>
                        </div>
                    </a>

                    <div class="content-item-bg"></div>
                </li>
                <li class="content-item js-content-item" data-id="1413616750512">
                    <a href="<?php  echo $this->createMobileUrl('info',array('id'=>$member['id'],'wid'=>$member['openid'],'cid'=>$card['id'],'op'=>'edit'),true)?>"
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
                <li class="content-item js-content-item" data-id="<?php  echo $member['id'];?>">
                    <a href="<?php  echo $this->createMobileUrl('company',array('id'=>$member['id'],'wid'=>$member['openid'],'cid'=>$card['id'],'op'=>'edit'),true)?>"
                       class="content-item-anchor">
                        <div class="content-item-thumb">
                            <img src="../addons/amouse_ecard/style/images/card_index/6.png?t=5"
                                 class="content-item-thumbnail" data-width="" data-height="">
                        </div>
                        <div class="content-item-hgroup">
                            <h2 class="content-item-title">公司简介</h2>
                            <i class="edit-icon edit-icon-pen"></i>
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
                            <img src="../addons/amouse_ecard/style/images/tell.png" class="content-item-thumbnail">
                        </div>
                        <div class="content-item-hgroup">
                            <h2 class="content-item-title">一键拨号</h2>
                        </div>
                    </a>
                </li>
            </ul>
        </section>
    </main>
</div>

<div class="feature">
    <a href="<?php  echo $this->createMobileUrl('Index')?>">
        <div class="feature-favor feature-w66">
            <span>完成编辑</span>
        </div>
    </a>
</div>
<div class="ewmform js-ewmform">
    <div class="ewmform-box">
        <code class="ewmform-close js-ewmClose"></code>
        <div class="ewmform-title">扫码收藏我的微名片</div>
        <div class="ewmform-summary">
            <img class="ewm-thumbnail" id="ewmThumbnail"  data-src="http://res3.eqianxian.com/qrcode/od8J4s4xnwwJl0vCPurbAowPr9d8.jpg">
        </div>
        <div class="ewmform-des">长按二维码可保存到手机里<br>可印在纸质名片和宣传单上</div>
    </div>
</div>
<div class="superMask" id="superMask"></div>

<input id="isFocus" type="hidden" value="true" data-url="test"/>
<input id="hasCollect" type="hidden" value="true"/>
<input id="cardId" type="hidden" value="<?php  echo $card['id'];?>"/>
<input id="personId" type="hidden" value="<?php  echo $member['id'];?>"/>
<input id="openId" type="hidden" value="<?php  echo $from_user;?>"/>
<input id="focusUrl" type="hidden" value=""/>
<input id="fromUrl" type="hidden" value=""/>
<input id="isFirst" type="hidden" value=""/>
<input id="showTip" type="hidden" value=""/>
<input id="notWeixin" type="hidden" value=""/>
<input id="fromScan" type="hidden" value=""/>
<script src="../addons/amouse_ecard/style/js/jquery.1.11.1.js"></script>
<script src="../addons/amouse_ecard/style/js/wx-share.js?v=2014122"></script>
<script src="../addons/amouse_ecard/style/js/flytip.js"></script>
<script src="../addons/amouse_ecard/style/js/vpopup.js"></script>
<script src="../addons/amouse_ecard/style/js/common.js?v=20141221"></script>
<input id="shareUrl" type="hidden" value="http://app.eqianxian.com/h/od8J4s4xnwwJl0vCPurbAowPr9d8/cd40cf2a355a86b4ce6.action"/>
<input id="shareCss" type="hidden" value="../addons/amouse_ecard/style/css/share.css?v=2014122">
<script>
    var shareContent = {
        bdText: '隐藏姓名的微名片',
        bdDesc: '公司:百度\n　职位:php\n!',
        bdUrl: "http://app.eqianxian.com/h/od8J4s4xnwwJl0vCPurbAowPr9d8/cd40cf2a355a86b4ce6.action",
        bdPic: "http://res3.eqianxian.com/bizcard/201411/0xa_a9lCJ2n8AKtLTmoiCG.jpg".replace("res2", "res2.app"),
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
<script src="../addons/amouse_ecard/style/js/share.js?v=2014122"></script>
<script>
    //share
    var wxShareDate = {
        "title": "隐藏姓名的微名片",
        "content": "公司:百度\n职位:php\n点击查看更多信息",
        "imgUrl": "http://res3.eqianxian.com/bizcard/201411/0xa_a9lCJ2n8AKtLTmoiCG.jpg".replace("res2", "res2.app"),
        "shareFriend": "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxcaebd5318cdb7fa1&redirect_uri=http://app.eqianxian.com/oauth.do&response_type=code&scope=snsapi_base&state=/app/bizcard/showBizCard.do?openId=od8J4s4xnwwJl0vCPurbAowPr9d8#wechat_redirect",
        "shareCircle": "http://app.eqianxian.com/p/od8J4s4xnwwJl0vCPurbAowPr9d8/card.action"
    };
    wxShareFunc(wxShareDate);
</script>
<link rel="stylesheet" type="text/css" href="../addons/amouse_ecard/style/css/vpopup.css">
<script type="text/javascript">
    function noSetYet() {
        $.flytip("主人还没设置此栏目的内容哦⊙o⊙");
    }
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
</script>

</body>
</html>