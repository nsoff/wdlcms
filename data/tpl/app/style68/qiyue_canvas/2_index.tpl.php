<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title><?php  echo $config['title'];?></title>
<style type="text/css">
    *{-webkit-text-size-adjust:none;}
    html{height:100%;}
    body{margin:0;padding:0;max-width:640px;height:100%;font-size:16px;}
    #showPage, #editorPage{max-width:640px;background:url(<?php  echo $config['bg'];?>) no-repeat 0 0;background-size:100%;margin:0 auto;height:100%;display:none;}
    .imgBox, .canvasBox{position:relative;padding:3.5625em 0 0 1.5em;width:36.875em;height:36.875em;}
    #canvas{background:url(<?php  echo $config['paper'];?>) no-repeat 0 0 #efecea;background-size:100%;}
    #completeImg, #showImg{width:36.875em;height:36.875em;}
    #paperLogo{position:absolute;top:4.5625em;left:2.6875em;width:6.3125em;height:2.4375em;}
    .paperCorner{position:absolute;right:0;bottom:0;width:6.4375em;height:3.75em;}

    .btn_01{background:#ff7800;color:#fff723;font-size:1.875em;height:2.3em;line-height:2.3em;padding:0 1.3em;box-shadow:0 0.2em 0 #ae5200;border-radius:3em;text-shadow:0.03em 0.03em 0.03em #333;display:inline-block;text-decoration:none;}
    .btn_02{background:#f1f0eb;color:#82593e;font-size:1.625em;height:2.69em;line-height:2.69em;padding:0 1em;border-radius:0.38em;border:1px solid #82593e;display:inline-block;text-decoration:none;margin-right:0.2em;}
    #penColor{display:inline-block;width:1em;height:1em;background:#000;vertical-align:middle;margin-right:0.3em;margin-top:-0.3em;}
    .btnBox{position:relative;padding:2.0625em 0 0 0;text-align: center;}
    .palette{border:1px solid #82593e;position:absolute;bottom:3em;left:1.5em;width:11.9em;list-style:none;padding:0;display:none;}
    .palette li{line-height:3.125em;font-size:1.5em;padding:0;color:#fff;text-align:center;}
    .center{text-align:center;}

    #shareAlert,#uploadPage{background:rgba(0, 0, 0, .8);width:100%;height:100%;position:absolute;left:0;top:0;z-index:2000;display:none;}
    .shareArr{width:5.25em;height:10.375em;background:url(<?php echo MODULE_URL;?>template/mobile/images/arr.png) no-repeat 0 0;position:absolute;right:3em;top:3em;background-size:100%;}
    .shareText{text-align:center;font-size:3.5em;line-height:1.85em;color:#fff;position:absolute;top:5.0em;width:100%;}
    .shareTextWB{text-align:center;font-size:2.8125em;line-height:1.85em;color:#fff;position:absolute;top:11em;width:100%;}

    #uploadPage p{margin:0;padding:0;text-align:center;font-size:2.8125em;line-height:1.85em;color:#fff;position:absolute;top:8em;width:100%;}
    #uploadPage p span{font-size:0.6em;}
    .memo{padding:1em 0 0 0.75em;font-size:2em;color:#333;}


    .dowloadBtn{text-align: center;}
    .dowloadBtn img{max-width:100%;}
    .overBanner{
        position:fixed;bottom:0;width:100%;text-align:center;display:block;max-width:960px;
        -webkit-transform: translate3d(0, 100%, 0);
        transform: translate3d(0, 100%, 0);
        -webkit-transition: -webkit-transform 0.2 ease-in-out;
        transition: transform 0.2 ease-in-out;
    }
    .overBanner.active{
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }
    .bottombanner-contain .cross{
        display:block;position:absolute;top:0px;right:0px;
        width:20px;height:20px;
        padding: 5px 5px 15px 15px;
        z-index:1001;
        
    }
</style>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
    window.sysinfo = {
<?php  if(!empty($_W['uniacid'])) { ?>
        'uniacid': '<?php  echo $_W['uniacid'];?>',
<?php  } ?>
<?php  if(!empty($_W['acid'])) { ?>
        'acid': '<?php  echo $_W['acid'];?>',
<?php  } ?>
<?php  if(!empty($_W['openid'])) { ?>
        'openid': '<?php  echo $_W['openid'];?>',
<?php  } ?>
<?php  if(!empty($_W['uid'])) { ?>
        'uid': '<?php  echo $_W['uid'];?>',
<?php  } ?>
        'siteroot': '<?php  echo $_W['siteroot'];?>',
        'siteurl': '<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=index&m=qiyue_canvas',
        'attachurl': '<?php  echo $_W['attachurl'];?>',
<?php  if(defined('MODULE_URL')) { ?>
        'MODULE_URL': '<?php echo MODULE_URL;?>',
<?php  } ?>
        'cookie' : {'pre': '<?php  echo $_W['config']['cookie']['pre'];?>'}
    };
    var j = "<?php  echo $config['logo'];?>";
    var paper = "<?php  echo $config['paper'];?>";
    // jssdk config 对象
    jssdkconfig = <?php  echo json_encode($_W['account']['jssdkconfig']);?> || {jsApiList:[]};
    // 是否启用调试
    jssdkconfig.debug = false;
    // 已经注册了 jssdk 文档中所有的接口
    jssdkconfig.jsApiList = [
        'checkJsApi',
        'onMenuShareTimeline',
        'onMenuShareAppMessage',
        'onMenuShareQQ',
        'onMenuShareWeibo'
    ];
    jsApiList = [];
    wx.config(jssdkconfig);
</script>
</head>
<body>
<div id="editorPage">
    <div class="canvasBox"><canvas id="canvas"></canvas><img src="<?php  echo $config['logo'];?>" id="paperLogo" alt=""><!--img src="<?php echo MODULE_URL;?>images/paper_corner.png" class="paperCorner" alt=""--></div>
    
    <div class="btnBox">
        <a class="btn_02" id="btnPenColor" href="javascript:void(0)"><span id="penColor"></span>换个颜色</a>
        <a class="btn_02" id="clearCanvas" href="javascript:void(0)">清空重写</a>
        <a class="btn_01" id="shareBtn" href="javascript:void(0)">上传并分享</a>
        <ol class="palette" id="palette">
            <li value="rgba(111,138,37,.6)" style="background:rgb(111,138,37)">绿色</li>
            <li value="rgba(255,198,2,.6)" style="background:rgb(255,198,2)">黄色</li>
            <li value="rgba(51,111,172,.6)" style="background:rgb(51,111,172)">蓝色</li>
            <li value="rgba(0,0,0,.6)" style="background:rgb(0,0,0)">黑色</li>
            <li value="rgba(203,0,0,.6)" style="background:rgb(203,0,0)">红色</li>
        </ol>
    </div>
    <div class="memo">在空白处手写，然后点击上传并分享。</div>
</div>

<div id="showPage">
    <div class="imgBox"><img id="showImg" alt=""><!--img src="<?php echo MODULE_URL;?>images/paper_corner.png" class="paperCorner" alt=""--></div>
    <div class="btnBox center"><a class="btn_02" href="<?php  echo $config['follow_link'];?>"><?php  echo $config['follow_txt'];?></a> <a class="btn_01" id="toEditorBtn" href="javascript:void(0)" style="margin-left:1em">我要试试</a></div>
    <div class="memo" id="saveMemo" style="display:none">PS:长按图片，可以保存图片到手机。</div>
</div>
<div id="uploadPage"></div>
<div id="shareAlert"><div class="shareArr"></div><div class="shareText">请点击右上角<br>点击【分享到朋友圈】</div><div class="shareTextWB"></div></div>

<?php  if($config['banner_img'] && $config['banner_link']) { ?>
<div class="bottombanner-contain" id="bottombanner" style="display: none;">
        <div class="bannerBottom" style="text-align:center;">
        <a class="overBanner dowloadBtn bannerBottom active" id="openApp3" href="<?php  echo $config['banner_link'];?>" style="background: rgba(38, 38, 38, 0.8);">
            <img class="bannerimg" src="<?php  echo $config['banner_img'];?>">
            <span class="cross" id="cross">
                <img src="http://img2.cache.netease.com/m/newsapp/banner/bannerCross2.png" alt="" style="display:block;margin:auto;">
            </span>
        </a>
    </div>
<?php  } ?>
<script>
<?php
    $_share['link'] = '';
    $query_string = $_SERVER['QUERY_STRING'];
    if(!empty($query_string)) {
        //加上分享人的uid
        parse_str($query_string, $query_arr);
        $query_arr['u'] = $_W['member']['uid'];
        $query_string = http_build_query($query_arr);
        $_share['link'] = $_W['siteroot'].'app/index.php?'. $query_string;
    }
?>
    // _czc.push(['_trackEvent', '<?php  echo $this->module['title']?>', "页面访问", '<?php  echo $_W['account']['name'];?>']);
    window.shareData = {
        title: "<?php  echo $config['share_title'];?>",
        desc: "<?php  echo $config['share_content'];?>",
        link: "<?php  echo $_share['link'];?>",
        imgUrl: "<?php  echo $config['share_icon'];?>"
    };
    function setShareData(title, link, img){
        window.shareData.imgUrl = img;
        window.shareData.link = link;
        window.shareData.title = title;
        wx.ready(function () {
            wx.onMenuShareAppMessage(shareData);
            wx.onMenuShareTimeline(shareData);
            wx.onMenuShareQQ(shareData);
            wx.onMenuShareWeibo(shareData);
        });
    }
    setShareData(shareData.title, shareData.link, shareData.imgUrl);
<?php  if($config['banner_img'] && $config['banner_link']) { ?>
    if(!localStorage.getItem("bannerisClose")){
        document.getElementById("bottombanner").style.display="block";
    }
    document.getElementById("cross").onclick = function() {
        document.getElementById("bottombanner").style.display="none";
        localStorage.setItem("bannerisClose","1");
    };
<?php  } ?>
</script>
<script type="text/javascript" src="<?php echo MODULE_URL;?>template/mobile/images/paper.js?a89"></script>
<span style="display:none;"><?php  echo $_W['setting']['copyright']['statcode'];?></span>
</body>
</html>