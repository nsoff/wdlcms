<?php defined('IN_IA') or exit('Access Denied');?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>数钱数到手抽筋</title>
    <script type="text/javascript">
        var GID = "shuqian";
        var SCORE_LIMIT = 6000;
        var APP_LIST_URL = '';
    </script>
    <script type="text/javascript" src="<?php echo PATH;?>js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo PATH;?>js/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?php echo PATH;?>js/createjs-2013.12.12.min.js"></script>
    <script type="text/javascript" src="<?php echo PATH;?>js/qipa_app.js"></script>
    <script type="text/javascript" src="<?php echo PATH;?>js/qipa_stage.js?v=1"></script>
    <script type="text/javascript" src="<?php echo PATH;?>js/main.js?v=2"></script>
    <script type="text/javascript" src="<?php echo PATH;?>js/xfireShare.js"></script>
    <script type="text/javascript" src="<?php echo PATH;?>js/artDialog.js?skin=default"></script>
    <style type="text/css">
        html,body,canvas {
            margin: 0px;
            padding: 0px;
            border:none;
            text-align: center;
            background-color: black;
        }
        canvas {
            background-color: white;
        }
    </style>
</head>
<body>
<canvas id="stage">
    您的浏览器不支持html5, 请换用支持html5的浏览器。
</canvas>
<script language=javascript>
    var mebtnopenurl = "<?php  echo $share_url;?>";

    function goHome(){
        window.location=mebtnopenurl;
    }
    function clickMore(){
        if((window.location+"").indexOf("zf",1)>0){
            window.location = mebtnopenurl;
        }
        else{
            goHome();
        }
    }
    function dp_share(){
        friendData.title = qipaShare.title;
        friendData.desc = wxData.desc =qipaShare.desc;
        document.getElementById("share").style.display="";
//        window.shareData.tTitle = document.title;
    }
    function dp_Ranking(){
        window.location=mebtnopenurl;
    }

    function showAd(){
    }
    function hideAd(){
    }
</script>
<div id=share style="display: none">
    <img width=100% src="<?php echo PATH;?>img/share.png" style="position: fixed; z-index: 9999; top: 0; left: 0; display: " ontouchstart="document.getElementById('share').style.display='none';" />
</div>
<div style="display: none;">
</div>
<script type="text/javascript">
    var myData = { gameid: "sqsdscj" };
    function dp_submitScore(score){
        myData.score = score;
        myData.scoreName = "数了"+score+"元";
        if(score>0){
            if (confirm("我勒个去了，30秒你数了"+score+"元！快通知一下小伙伴吧！")){
                dp_share();
            }
        }
    }
</script>
<script type="text/javascript">
    var guide = '';
    var guid_url = '';
    $(function(){
        if(guide != ''){
            if(guide == '0'){
                if (window.localStorage.getItem("subscribeFlag_sqsdscj") != 'ok') {
                    art.dialog({
                        drag: false,
                        resize: false,
                        lock: true,
                        cancel: false,
                        content: '关注我们才能玩！',
                        button: [
                            {name: '关注我们',
                                callback: function () {
                                    window.localStorage.setItem("subscribeFlag_sqsdscj", "ok");
                                    if(guid_url != ''){
                                        window.location.href=guid_url;
                                    }
                                }}
                        ]
                    });
                    return false;
                }
            }else if(guide == '1'){

            }
        }
    });
</script>
<div style="display: none;">

</div>

    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script>
        /*
         * 注意：
         * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
         * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
         * 3. 完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
         *
         * 如有问题请通过以下渠道反馈：
         * 邮箱地址：weixin-open@qq.com
         * 邮件主题：【微信JS-SDK反馈】具体问题
         * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
         */
        var appid = '<?php  echo $_W['account']['jssdkconfig']['appId'];?>';
        var timestamp = '<?php  echo $_W['account']['jssdkconfig']['timestamp'];?>';
        var nonceStr = '<?php  echo $_W['account']['jssdkconfig']['nonceStr'];?>';
        var signature = '<?php  echo $_W['account']['jssdkconfig']['signature'];?>';

        wx.config({
            debug: false,
            appId: appid,
            timestamp: timestamp,
            nonceStr: nonceStr,
            signature: signature,
            jsApiList: [
                // 所有要调用的 API 都要加到这个列表中
                'checkJsApi',
                'onMenuShareTimeline',
                'onMenuShareAppMessage',
                'onMenuShareQQ',
                'onMenuShareWeibo',
                'hideMenuItems',
                'showMenuItems'
            ]
        });

        var shareData = {
            title: '<?php  echo $share_title;?>',
            desc: '<?php  echo $share_desc;?>',
            link: '<?php  echo $share_url;?>',
            imgUrl: '<?php  echo $share_image;?>'
        };

        wx.ready(function () {
            wx.onMenuShareAppMessage({
                title: shareData.title,
                desc: shareData.desc,
                link: shareData.link,
                imgUrl: shareData.imgUrl,
                trigger: function (res) {
                },
                success: function (res) {
                    alert('感谢分享...');
                },
                cancel: function (res) {
                },
                fail: function (res) {
                    alert(JSON.stringify(res));
                }
            });

            wx.onMenuShareTimeline({
                title: shareData.title,
                link: shareData.link,
                imgUrl: shareData.imgUrl,
                success: function () {
                    // 用户确认分享后执行的回调函数
                },
                cancel: function () {
                    // 用户取消分享后执行的回调函数
                }
            });

            wx.onMenuShareQQ({
                title: shareData.title,
                desc: shareData.desc,
                link: shareData.link,
                imgUrl: shareData.imgUrl,
                success: function () {
                    // 用户确认分享后执行的回调函数
                },
                cancel: function () {
                    // 用户取消分享后执行的回调函数
                }
            });

            wx.onMenuShareWeibo({
                title: shareData.title,
                desc: shareData.desc,
                link: shareData.link,
                imgUrl: shareData.imgUrl,
                success: function () {
                    // 用户确认分享后执行的回调函数
                },
                cancel: function () {
                    // 用户取消分享后执行的回调函数
                }
            });
        });

        wx.error(function (res) {
            //alert(res.errMsg);
        });
    </script>
</body>
</html>