<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html class="no-js " lang="zh-CN" >
    <script type="text/javascript">
    window.l_createElement = document.createElement;
    window.l_Function = window.Function;
    window.l_open = window.open;
    window.l_adoptNode = document.adoptNode;
    window.l_defineProperty = Object.defineProperty;
</script>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="cleartype" content="on">
    <title><?php  echo $reply['title'];?></title>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script src="<?php  echo $_W['siteroot'];?>app/resource/js/require.js"></script>
    <script src="<?php  echo $_W['siteroot'];?>app/resource/js/app/config.js"></script>
    <script type="text/javascript" src="<?php  echo $_W['siteroot'];?>app/resource/js/lib/jquery-1.11.1.min.js"></script>
    <script>
    // jssdk config 对象
    jssdkconfig = <?php  echo json_encode($_W['account']['jssdkconfig']);?> || {};
    
    // 是否启用调试
    jssdkconfig.debug = false;
    
    jssdkconfig.jsApiList = [
        'checkJsApi',
        'onMenuShareTimeline',
        'onMenuShareAppMessage',
        'onMenuShareQQ',
        'onMenuShareWeibo',
        'hideMenuItems',
        'showMenuItems',
        'hideAllNonBaseMenuItem',
        'showAllNonBaseMenuItem',
        'translateVoice',
        'startRecord',
        'stopRecord',
        'onRecordEnd',
        'playVoice',
        'pauseVoice',
        'stopVoice',
        'uploadVoice',
        'downloadVoice',
        'chooseImage',
        'previewImage',
        'uploadImage',
        'downloadImage',
        'getNetworkType',
        'openLocation',
        'getLocation',
        'hideOptionMenu',
        'showOptionMenu',
        'closeWindow',
        'scanQRCode',
        'chooseWXPay',
        'openProductSpecificView',
        'addCard',
        'chooseCard',
        'openCard'
    ];
    
    </script>

    <!-- meta viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- CSS -->
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/hx_lottery/template/style/css/base.css" onerror="_cdnFallback(this)">
    <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/hx_lottery/template/style/css/wheel.css" onerror="_cdnFallback(this)"></head>

<body class=" ">
    <!-- container -->
    <div class="container ">
        <div class="apps-game">
            <div class="apps-wheel">
                <div class="logo"></div>
                <div class="wheel-wrap">
                    <ul class="wheel">
                        <li class="wheel-row-wrap">
                            <ul class="wheel-row">
                                <li class="wheel-block prize4" data-index="0">
                                    <div class="wheel-icon"></div>
                                </li>
                                <li class="wheel-block even prize-again" data-index="1">
                                    <div class="wheel-icon"></div>
                                </li>
                                <li class="wheel-block prize2" data-index="2">
                                    <div class="wheel-icon"></div>
                                </li>
                                <li class="wheel-block even prize3" data-index="3">
                                    <div class="wheel-icon"></div>
                                </li>
                            </ul>
                        </li>
                        <li class="wheel-row-wrap">
                            <ul class="wheel-row wheel-sep-row">
                                <li class="wheel-block even prize-again" data-index="11">
                                    <div class="wheel-icon"></div>
                                </li>
                                <li class="wheel-block prize-no" data-index="4">
                                    <div class="wheel-icon"></div>
                                </li>
                            </ul>
                        </li>
                        <li class="wheel-row-wrap">
                            <ul class="wheel-row wheel-sep-row">
                                <li class="wheel-block prize3" data-index="10">
                                    <div class="wheel-icon"></div>
                                </li>
                                <li class="wheel-block even prize1" data-index="5">
                                    <div class="wheel-icon"></div>
                                </li>
                            </ul>
                        </li>
                        <li class="wheel-row-wrap">
                            <ul class="wheel-row">
                                <li class="wheel-block even prize-no" data-index="9">
                                    <div class="wheel-icon"></div>
                                </li>
                                <li class="wheel-block prize2" data-index="8">
                                    <div class="wheel-icon"></div>
                                </li>
                                <li class="wheel-block even prize-again" data-index="7">
                                    <div class="wheel-icon"></div>
                                </li>
                                <li class="wheel-block prize4" data-index="6">
                                    <div class="wheel-icon"></div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="middle-button-area">
                        <div class="middle-button js-start-btn"></div>
                    </div>
                </div>

                <div class="info-area">
                    <div class="view-prize">
                        <a href="<?php  echo $this->createMobileUrl('myaward',array('reply_id'=>$id))?>" class="js-view-prize">我的奖品</a>
                    </div>
                    <ul class="activity-info">
                        <li>
                            1.活动有效时间：
                            <div class="activity-info-content"><?php  echo date('Y-m-d H:i:s',$reply['starttime'])?> 至 <?php  echo date('Y-m-d H:i:s',$reply['endtime'])?></div>
                        </li>
                        <li>
                            2.活动说明：
                            <div class="activity-info-content"><?php  echo $reply['tips'];?></div>
                        </li>
                        <?php  if(!empty($reply['prizeinfo'])) { ?>
                        <li>
                            3.奖项设置：
                            <div class="activity-info-content"><?php  echo $reply['prizeinfo'];?></div>
                        </li>
                        <?php  } ?>
                        <p class="activity-note js-activity-note">
                            备注：<?php  echo $reply['remark'];?>
                        </p>
                    </ul>
                </div>
            </div>

            <div id="wxcover"></div>
        </div>

        <script id="apps-modal-tpl" type="text/template">
        <div class="apps-mask">
            <div class="apps-modal">
                <div class="apps-modal-content-wrap">
                    <p class="js-apps-modal-content apps-modal-content"></p>
                    <div class="apps-modal-action">
                        <button class="js-apps-modal-confirm apps-btn apps-primary-btn">确定</button>
                        <button class="js-apps-modal-cancel apps-btn">取消</button>
                    </div>
                </div>
            </div>
        </div>
    </script>

        <script id="apps-notice-tpl" type="text/template">
        <div class="apps-mask">
            <div class="apps-notice-wap">
                <div class="apps-notice-close"></div>
                <div class="apps-notice-content"></div>
            </div>
        </div>
    </script>
        <div class="js-footer" style="min-height: 1px;">
            <div class="footer">
                <div class="footer">
                    <div class="copyright">
                        <div class="ft-links">
                            <a href="<?php  echo $this->createMobileUrl('myaward',array('reply_id'=>$id))?>" target="_blank">我的奖品</a>
                            <a href="./index.php?c=mc&a=home&i=<?php  echo $_W['uniacid'];?>" target="_blank">个人中心</a>
                        </div>
                        <div class="ft-copyright">
                            <a href="./index.php?c=home&i=<?php  echo $_W['uniacid'];?>&t=1" target="_blank">
                                <span class="company">©<?php  $acount = $_W['account'];?><?php  echo $acount['name'];?></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="http://libs.baidu.com/jquery/2.1.1/jquery.min.js" onerror="_cdnFallback(this)"></script>
    <script type="text/javascript">
    var _apps_global = <?php  echo $json;?>;
    var _userCenterUrl = "./index.php?c=mc&a=home&i=<?php  echo $_W['uniacid'];?>";
</script>

    <script src="<?php  echo $_W['siteroot'];?>addons/hx_lottery/template/style/js/wheel.js" onerror="_cdnFallback(this)"></script>
    <script>
    window.addEventListener("load", function() {
        var trigger = $('.js-start-btn');

        if(appUtils.process.check()){
            gameIns.init();
        } else {
            trigger.on('click', function(e){
                appUtils.process.check();
            });
        }

        appUtils.process.onconfirm = function(){
            trigger.unbind('click');
            gameIns.init();
        }

        if(!_apps_global.hasPoint){
            $('.js-activity-note').remove();
        }

    }, false);
</script>
<script type="text/javascript">
<?php $share_url = $_W['siteroot'].'app/index.php?i='.$_W['uniacid'].'&c=entry&id='.$id.'&do=detail&m=hx_lottery&share_from='.urlencode(base64_encode($_W['openid']));?>
<?php $tzurl = isset($_W['openid']) ? $share_url : $reply['share_url'];?>
sharedata = {
    'title' : "<?php  echo $reply['share_title'];?>", // 
    'desc' : "<?php  echo $reply['share_content'];?>",  //
    'link' :  "<?php  echo $share_url;?>",
    'imgUrl' : "<?php  echo tomedia($reply['share_img'])?>",
}
 
sharedata.success = function(){
    $.ajax({
            type:"POST",
            url:"<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&id=<?php  echo $id;?>&do=sharedata&m=hx_lottery",
            data:{
                from: "<?php  echo $share_from;?>"
            },
            dataType: "json",
            success:function(msg){
                location.href = "<?php  echo $tzurl;?>";
            }
        });
}
</script>
<script type="text/javascript">
    
    wx.config(jssdkconfig);
    
    require(['jquery', 'util'], function($, util){
        
        wx.ready(function () {
            wx.onMenuShareAppMessage(sharedata);
            wx.onMenuShareTimeline(sharedata);
            wx.onMenuShareQQ(sharedata);
            wx.onMenuShareWeibo(sharedata);
        });
    });
    </script>
</body>
</html>