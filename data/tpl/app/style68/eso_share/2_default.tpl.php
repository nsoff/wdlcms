<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
    <title><?php  echo $reply['title'];?></title>
    <meta name="description" content="<?php  echo $reply['description'];?>">
    <meta http-equiv=Content-Type content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <style type="text/css">
        html{-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}
        body{line-height:1.6;font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;font-size:16px}
        body,h1,h2,h3,h4,h5,p,ul,ol,dl,dd,fieldset,textarea{margin:0}
        fieldset,legend,textarea,input,button{padding:0}
        button,input,select,textarea{font-family:inherit;font-size:100%;margin:0;*font-family:"Helvetica Neue",Helvetica,Arial,sans-serif}
        ul,ol{padding-left:0;list-style-type:none;list-style-position:inside}
        a img,fieldset{border:0}
        a{text-decoration:none}
        a{color:#607fa6}
        a:visited{color:#607fa6}
        .rich_media_inner{padding:15px}
        .rich_media_title{line-height:24px;font-weight:700;font-size:20px;word-wrap:break-word;-webkit-hyphens:auto;-ms-hyphens:auto;hyphens:auto}
        .rich_media_title .rich_media_meta{vertical-align:middle;position:relative}
        .rich_media_meta{display:inline-block;vertical-align:middle;font-weight:400;font-style:normal;margin-right:.5em;font-size:12px;width:auto;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;word-wrap:normal;max-width:none}
        .rich_media_meta.text{color:#8c8c8c}
        .rich_media_thumb{font-size:0;margin-top:18px}
        .rich_media_thumb img{width:100%}
        .rich_media_content{margin-top:18px;color:#3e3e3e;word-wrap:break-word;-webkit-hyphens:auto;-ms-hyphens:auto;hyphens:auto}
        .rich_media_content p{*zoom:1;min-height:1em;word-wrap:normal;white-space:pre-wrap;margin-top:1em;margin-bottom:1em}
        .rich_media_content p:after{content:"\200B";display:block;height:0;clear:both}
        .rich_media_content *{max-width:100%!important;word-wrap:break-word!important;-webkit-box-sizing:border-box!important;box-sizing:border-box!important}
        .rich_media_content img{height:auto!important}
        .rich_media_tool{*zoom:1;padding:18px 0;font-size:14px}
        .rich_media_tool:after{content:"\200B";display:block;height:0;clear:both}
        .rich_media_tool .media_tool_meta i,.rich_media_tool .media_tool_meta .icon_meta{vertical-align:0;position:relative;top:1px;margin-right:3px}
        .rich_media_tool .meta_primary{float:left;margin-right:14px}
        .rich_media_tool .meta_extra{float:right;margin-left:14px}
        .rich_media_tool .link_primary{color:#8c8c8c}
        .rich_media_extra{padding-top:0}
        @media screen and (min-width:1023px){.rich_media{width:740px;margin-left:auto;margin-right:auto}
            .rich_media_inner{padding:20px;background-color:#fff;border:1px solid #d9dadc;border-top-width:0}
            .rich_media_meta{max-width:none}
            .rich_media_content{min-height:350px}
            .rich_media_title{padding-bottom:10px;margin-bottom:5px;border-bottom:1px solid #e7e7eb}
        }
        .line_tips_wrp{margin-top:20px;text-align:center;border-top:1px dotted #a8a8a7;line-height:16px}
        .line_tips{display:inline-block;position:relative;top:-10px;padding:0 16px;font-size:14px;color:#cfcfcf;background-color:#f8f7f5;text-decoration:none}
        .profile_bar{height:64px;overflow:hidden;background-color:#44444a}
        .profile_inner{padding:10px}
        .profile_info{position:relative;color:#99999b;padding-left:44px}
        .profile_title{font-size:14px}
        .profile_desc{font-size:12px}
        .profile_avatar{position:absolute;width:34px;height:34px;left:0;top:50%;margin-top:-17px}
        .profile_opr{position:absolute;height:100%;line-height:64px;top:0;right:10px}
        .profile_opr .btn{vertical-align:middle;margin-top:-0.2em}
        .btn{display:block;margin-left:auto;margin-right:auto;padding-left:14px;padding-right:14px;font-size:14px;text-align:center;text-decoration:none;overflow:visible;height:32px;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;color:#fff;line-height:32px;-webkit-tap-highlight-color:rgba(255,255,255,0)}
        .btn.btn_mini{height:23px;line-height:23px;font-size:14px}
        .btn.btn_inline{display:inline-block}
        button.btn,input.btn{width:100%;border:0;outline:0;-webkit-appearance:none}
        button.btn:focus,input.btn:focus{outline:0}
        button.btn_inline,input.btn_inline{width:auto}
        .btn_default{background-color:#d1d1d1}
        .btn_default:not(.btn_disabled):active{color:rgba(255,255,255,0.4);background-color:#a7a7a7}
        .btn_primary{background-color:#04be02}
        .btn_primary:not(.btn_disabled):active{color:rgba(255,255,255,0.4);background-color:#039702}
        .btn_warn{background-color:#ef4f4f}
        .btn_warn:not(.btn_disabled):active{color:rgba(255,255,255,0.4);background-color:#c13e3e}
        .btn_disabled{color:rgba(255,255,255,0.6)}
        .btn+.btn{margin-top:10px}
        .btn.btn_inline+.btn.btn_inline{margin-top:auto;margin-left:10px}
        .btn_area{margin-left:-5px;margin-right:-5px;font-size:0}
        .btn_area.btn_area_inline{margin-left:auto;margin-right:auto;display:-webkit-box;display:-webkit-flex;display:-moz-box;display:-ms-flexbox;display:flex}
        .btn_area.btn_area_inline .btn{margin-top:auto;margin-right:10px;width:100%;-webkit-box-flex:1;-webkit-flex:1;-moz-box-flex:1;-ms-flex:1;box-flex:1;flex:1;display:inline-block \9;width:48% \9;margin-left:1% \9;margin-right:1% \9}
        .btn_area.btn_area_inline .btn:last-child{margin-right:0}
        span.btn button{display:block;width:100%;height:100%;background-color:transparent;border:0;outline:0;color:#fff}
        span.btn button:active{color:rgba(255,255,255,0.4)}
        span.btn.btn_loading button,span.btn.btn_disabled button{color:#fff}
        @media screen and (min-width:1023px){.line_tips{background-color:#fff}
            .rich_media{position:relative}
            .rich_media_inner{padding-bottom:78px}
            .profile_bar{position:absolute;bottom:0;left:0;width:100%}
        }
        body{background-color:#f8f7f5;-webkit-touch-callout:none}
        h1,h2,h3,h4,h5,h6{font-weight:400;font-style:normal;font-size:100%}
        .icon_arrow_gray{width:7px}
        .icon_loading_white{width:16px}
        .icon_loading_white.icon_after{margin-left:1em}
        .icon_praise_gray{width:13px}
        .line_tips_wrp{margin-bottom:10px}
        .rich_media_meta.nickname{max-width:10em}
        .rich_media_extra{position:relative}
        .rich_media_extra .appmsg_banner{max-height:166px;width:100%}
        .rich_media_extra .ad_msg_mask{position:absolute;left:0;top:0;width:100%;height:100%;text-align:center;line-height:200px;background-color:#000;filter:alpha(opacity = 20);-moz-opacity:.2;-khtml-opacity:.2;opacity:.2}
        .rich_media_content{font-size:16px;overflow-y:hidden}
        .rich_media_content p{margin-top:0;margin-bottom:0}
        .rich_media_tool .praise_num{display:inline-block;vertical-align:top;width:auto;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;word-wrap:normal;min-width:3em}
        .rich_media_tool .meta_praise{-webkit-tap-highlight-color:rgba(0,0,0,0);outline:0;margin-right:0}
        .icon_praise_gray{background:transparent url(http://mmbiz.qpic.cn/mmbiz/ByCS3p9sHiam47qqib840uVr9ZH6ORLqhqmFibrmxWeY5icJ7ZE8Un8AibB18U19fCMUg9tibw8vgOdl4/0) no-repeat 0 0;width:13px;height:13px;vertical-align:middle;display:inline-block;-webkit-background-size:100% auto;background-size:100% auto}
        .icon_praise_gray.praised{background-position:0 -18px}
        .praised .icon_praise_gray{background-position:0 -18px}
        .rich_media_extra{padding-bottom:10px;font-size:14px}
        .rich_media_extra .extra_link{display:block}
        .rich_media_extra img{vertical-align:middle;margin-top:-3px}
        .global_error_msg{padding:60px 30px}
        .global_error_msg strong{display:block}
        .global_error_msg.warn{color:#f00}
        .selectTdClass{background-color:#edf5fa!important}
        table.noBorderTable td,table.noBorderTable th,table.noBorderTable caption{border:1px dashed #ddd!important}
        table{margin-bottom:10px;border-collapse:collapse;display:table;width:100%!important}
        td,th{word-wrap:break-word;word-break:break-all;padding:5px 10px;border:1px solid #DDD}
        caption{border:1px dashed #DDD;border-bottom:0;padding:3px;text-align:center}
        th{border-top:2px solid #BBB;background:#f7f7f7}
        .ue-table-interlace-color-single{background-color:#fcfcfc}
        .ue-table-interlace-color-double{background-color:#f7faff}
        td p{margin:0;padding:0}
        .res_iframe{width:100%;background-color:transparent;border:0}
        .vote_area{position:relative;display:block;margin:14px 0;white-space:normal!important}
        .vote_iframe{width:100%;height:100%;background-color:transparent;border:0}
        .qr_code_pc_outer{display:none!important}
        @media screen and (min-width:1023px){body{background-color:#e7e8eb;font-family:"Helvetica Neue",Helvetica,"Hiragino Sans GB","Microsoft YaHei","微软雅黑",Arial,sans-serif}
            .line_tips{background-color:#fff}
            .rich_media_meta.nickname{max-width:none}
            .rich_media_inner{position:relative}
            .qr_code_pc_outer{display:block!important;position:fixed;left:0;right:0;top:20px;color:#717375;text-align:center}
            .qr_code_pc_inner{position:relative;width:740px;margin-left:auto;margin-right:auto}
            .qr_code_pc{position:absolute;right:-145px;top:0;padding:16px;border:1px solid #d9dadc;background-color:#fff}
            .qr_code_pc p{font-size:14px;line-height:20px}
            .qr_code_pc_img{width:auto;height:auto;max-width:100px;}
        }
        .wrp_preview_group{padding-top:100px}
        .preview_group{position:relative;min-height:83px;background-color:#fff;border:1px solid #e7e7eb}
        .preview_group.fixed_pos{position:fixed;bottom:0;left:0;right:0}
        .preview_group .preview_group_inner{padding:13px}
        .preview_group .preview_group_inner .preview_group_info{padding-left:68px;color:#8d8d8d;font-size:14px}
        .preview_group .preview_group_inner .preview_group_info .preview_group_title{overflow:hidden;text-overflow:ellipsis;white-space:nowrap;word-wrap:normal;color:#000;font-weight:400;font-style:normal;padding-right:73px;max-width:142px;display:block}
        .preview_group .preview_group_inner .preview_group_info .preview_group_desc{padding-right:60px;display:inline-block;line-height:20px}
        .preview_group .preview_group_inner .preview_group_info .preview_group_avatar{position:absolute;width:55px;height:55px;left:13px;top:50%;margin-top:-27px;z-index:1}
        .preview_group .preview_group_inner .preview_group_info .preview_group_avatar.br_radius{border-radius:100%;-moz-border-radius:100%;-webkit-border-radius:100%}
        .preview_group .preview_group_inner .preview_group_opr{position:absolute;height:100%;line-height:83px;top:0;right:13px}
        .preview_group .preview_group_inner .preview_group_opr .btn{padding:0;text-align:center;min-width:60px}
        .preview_group.preview_card .card_inner .preview_card_avatar{position:absolute;width:57px;height:57px;left:13px;top:50%;margin-top:-28px}
        .preview_group.preview_card .card_inner .preview_group_info{padding-left:70px}
        .preview_group.preview_card .card_inner .preview_group_info .preview_group_desc,.preview_group.preview_card .card_inner .preview_group_info .preview_group_title2{width:200px;padding-right:0}
        .preview_group.preview_card .card_inner .preview_group_info.append_btn .preview_group_desc,.preview_group.preview_card .card_inner .preview_group_info.append_btn .preview_group_title{padding-right:63px;width:auto}
    </style>
    <script src="../addons/eso_share/template/images/jQuery.js"></script>
</head>

<body id="activity-detail" class="zh_CN ">
<div class="rich_media">
    <div class="rich_media_inner">

        <h2 class="rich_media_title" id="activity-name"><?php  echo $reply['title'];?></h2>

        <div class="rich_media_meta_list">
            <em id="post-date" class="rich_media_meta text"><?php  echo date('Y-m-d', $reply['start_time']);?></em>
            <?php  if($subscribeurl) { ?>
            <a class="rich_media_meta rich_media_meta_link rich_media_meta_nickname" href="<?php  echo $subscribeurl;?>" id="post-user"><?php  echo $acna;?></a>
            <?php  } ?>
        </div>

        <div id="page-content">
            <div id="img-content">
                <div class="rich_media_content" id="js_content">
                    <?php  echo htmlspecialchars_decode($reply['content']);?>
                </div>
                <div class="rich_media_tool" id="js_toobar">
                    <?php  if($reply['u']) { ?>
                    <a class="media_tool_meta meta_primary" id="js_view_source" href="<?php  echo $reply['u'];?>">阅读原文</a>
                    <?php  } ?>
                    <div id="js_read_area" class="media_tool_meta link_primary meta_primary">
                        阅读 <span id="readNum"><?php  if($reply['r']>100000) { ?>100000+<?php  } else { ?><?php  echo $reply['r'];?><?php  } ?></span>
                    </div>
                    <a class="media_tool_meta meta_primary link_primary meta_praise<?php  if($zz=='y') { ?> praised<?php  } ?>" href="javascript:void(0);" id="like" like="1">
                        <i class="icon_praise_gray"></i>
                        <span class="praise_num" id="likeNum"><?php  if($reply['z']>100000) { ?>100000+<?php  } else { ?><?php  echo $reply['z'];?><?php  } ?></span>
                    </a>
                </div>
            </div>
        </div>

        <div id="js_pc_qr_code" class="qr_code_pc_outer">
            <div class="qr_code_pc_inner">
                <div class="qr_code_pc">
                    <img id="js_pc_qr_code_img" class="qr_code_pc_img" src="<?php  echo $qrcode;?>">
                    <p>微信扫一扫<br>获得更多内容</p>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
    $("a.link_primary").click(function(){
        var tthis = $(this);
        tthis.toggleClass("praised");
        $.ajax({
            type: "POST",
            url: "<?php  echo $this->createMobileUrl('eso_sharez', array('rid' => $rid, 'from_user' => $_GPC['from_user']))?>",
            dataType: "html",
            success: function (html) {
                tthis.find("#likeNum").text(html);
            }
        });
    });
    window.eso_shareData = {
        "imgUrl": "<?php  echo $imgurl;?>",
        "timeLineLink": "<?php  echo $loclurl;?>",
        "sendFriendLink": "<?php  echo $loclurl;?>",
        "fTitle": "<?php  echo $reply['title'];?>",
        "fContent": "<?php  echo $reply['description'];?>"
    };
    var shareData = {
        "imgUrl" : '<?php  echo toimage($reply['share_txt'])?>',
        "link" : window.eso_shareData.sendFriendLink,
        "title" : '<?php  echo $reply['share_title']?>',
        "desc" : '<?php  echo $reply['share_desc']?>'
    };
    if (!shareData.imgUrl) {
        shareData.imgUrl = window.eso_shareData.imgUrl;
    }
    if (!shareData.desc) {
        shareData.desc = window.eso_shareData.fContent;
    }
    if (!shareData.title) {
        shareData.title = window.eso_shareData.fTitle;
    }
    var jssdkconfig = <?php  echo json_encode($_W['account']['jssdkconfig']);?> || {};
    // 是否启用调试
    jssdkconfig.debug = false;
    //
    jssdkconfig.jsApiList = [
        'checkJsApi',
        'onMenuShareTimeline',
        'onMenuShareAppMessage',
        'onMenuShareQQ',
        'onMenuShareWeibo'
    ];
    wx.config(jssdkconfig);
    wx.ready(function () {
        wx.onMenuShareAppMessage(shareData);
        wx.onMenuShareTimeline(shareData);
        wx.onMenuShareQQ(shareData);
        wx.onMenuShareWeibo(shareData);
    });
</script>
</body>
</html>