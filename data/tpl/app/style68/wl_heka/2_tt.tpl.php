<?php defined('IN_IA') or exit('Access Denied');?><html>

<head>

    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">

    <meta content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;"

          name="viewport">

    <meta content="yes" name="apple-mobile-web-app-capable">

    <meta content="black" name="apple-mobile-web-app-status-bar-style">

    <meta content="telephone=no" name="format-detection">

    <title>新年快乐</title>

    <?php  echo register_jssdk();?>

    <link type="text/css" href="../addons/wl_heka/style/css/heka.css" rel="stylesheet"/>

    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>

    <style type="text/css">

        .btn_music {

            display: inline-block;

            width: 35px;

            height: 35px;

            background: url('../addons/wl_heka/style/images/play.png') no-repeat center center;

            background-size: 100% auto;

            position: absolute;

            z-index: 100;

            left: 15px;

            top: 30px;

        }



        .btn_music.on {

            background-image: url("../addons/wl_heka/style/images/stop.png");

        }



        #leafContainer {

            position: fixed;

            z-index: 2;

            width: 100%;

            height: 690px;

            top: 0;

            overflow: hidden;

        }



        #leafContainer > div {

            position: absolute;

            max-width: 100px;

            max-height: 100px;

            -webkit-animation-iteration-count: infinite, infinite;

            -webkit-animation-direction: normal, normal;

            -webkit-animation-timing-function: linear, ease-in;

        }



        #leafContainer > div > img {

            position: absolute;

            width: 100%;

            -webkit-animation-iteration-count: infinite;

            -webkit-animation-direction: alternate;

            -webkit-animation-timing-function: ease-in-out;

            -webkit-transform-origin: 50% -100%;

        }



        @-webkit-keyframes fade {

            0% {

                opacity: 1;

            }

            95% {

                opacity: 1;

            }

            100% {

                opacity: 0;

            }

        }



        @

        -webkit-keyframes drop {



        0

        %

        {

            -webkit-transform: translate(0px, -50px)

        ;

        }

        100

        %

        {

            -webkit-transform: translate(0px,

            650px

            )

        ;



        }

        }

        @

        -webkit-keyframes clockwiseSpin {



        0

        %

        {

            -webkit-transform: rotate(-50deg)

        ;

        }

        100

        %

        {

            -webkit-transform: rotate(50deg

            )

        ;



        }

        }

        @

        -webkit-keyframes counterclockwiseSpinAndFlip {



        0

        %

        {

            -webkit-transform: scale(-1, 1) rotate(50deg)

        ;

        }

        100

        %

        {

            -webkit-transform: scale(-1,

            1

            )

            rotate

            (

            -

            50

            deg

        )

        ;



        }

        }

    </style>

</head>

<body>

<div style=" display:none;" onclick="document.getElementById('sharemcover').style.display='';" id="sharemcover">

    <img src="../addons/wl_heka/style/images/MgnnofmleM.png">

</div>

<div class="hot"><p>点击文字可直接编辑，按底部按钮发送</p></div>

<div class="arr"></div>

<script>

    setInterval(function () {

        $(".arr").css({

            webkitTransform: "translateY(-10px)"

        });

        $(".gift").css({

            webkitTransform: "rotate(-30deg)"

        });

        setTimeout(function () {

            $(".arr").css({

                webkitTransform: "translateY(10px)"

            });

            $(".gift").css({

                webkitTransform: "rotate(30deg)"

            })

        }, 200)

    }, 400)

</script>

<style>

    .sendBtn {

        display: block;

        height: 39px;

        line-height: 39px;

        font-size: 18px;

        border-radius: 3px;

        background-color: #3dba70;

        box-shadow: 0 1px 1px rgba(7, 56, 28, .61), inset 0 1px 1px rgba(255, 255, 255, .51);

        border: solid 1px #00812c;

        color: #fff;

        text-align: center;

    }

</style>

<div class="cardWrap">

    <script src="../addons/wl_heka/style/js/audio.js" type="text/javascript"></script>

    <script>

        function playAudio() {

            if (window.HTMLAudioElement) {

                try {

                    var oAudio = document.getElementById('audio');

                    var btn = document.getElementById('playbox');

                    if (oAudio.paused) {

                        oAudio.play();

                        $("#playbox").addClass('on');

                    }

                    else {

                        oAudio.pause();

                        $("#playbox").removeClass('on');

                    }

                }

                catch (e) {

                }

            }

        }

    </script>

    <span id="playbox" class="btn_music on" onclick="playAudio()">

    <audio src="http://bcs.duapp.com/baemp3mp3/mp3/1383054273429661947.mp3" loop="" id="audio" autoplay="autoplay"></audio></span>

    <img src="../addons/wl_heka/style/images/srkl009.jpg" class="cardbg">

    <div class="messageBox">

        <div class="user">

            <div class="message"> <?php  if(empty($show['content'])) { ?>祝福您马上有钱，马上有对象，全家健康，开开心心。 <?php  } else { ?><?php  echo $show['content'];?><?php  } ?>

            </div>

            <div class="name"><?php  echo $show['author'];?></div>

            <div class="time"><?php  echo date('Y年m月d日');?></div>

        </div>

        <div style="display:none" id="dh" class="dh">

        </div>

        <div class="sendBtn-box">

            <a class="sendBtn">转发贺卡<span></span></a>

        </div>

    </div>

</div>



<script type="text/javascript">

    shareLink = "<?php  echo $_W['siteroot']?>app<?php  echo $this->createMobileUrl('show', array('card' => $card,'id'=>$_GET['id'],'cid'=>$show['id']));?>";

    shareLink = shareLink.replace('./', '/');

    shareNumsUrl = "<?php  echo $_W['siteroot']?>app<?php  echo $this->createMobileUrl('share', array('card' => $card,'id'=>$_GET['id']));?>";

    shareNumsUrl = shareNumsUrl.replace('./', '/');

    cid = <?php  echo $show['id'];?>;

    var contenta = "<?php  if(empty($show['content'])) { ?>祝福您马上有钱，马上有对象，全家健康，开开心心。 <?php  } else { ?>给您送祝福啰!<?php  } ?>";

    var usernameaa = "<?php  echo $show['author'];?>";

    var ischange = false;



    // 默认分享

    wx.ready(function () {

        sharedata = {

            title: '微赞祝福',

            desc: '使用微赞助手可以在朋友圈或聊天对话框发送更丰富的祝福类型',

            link: shareLink,

            imgUrl: "<?php  echo $_W['siteroot'];?>addons/wl_heka/style/images/tt.jpg",

            success: function(){

                _$("<?php  echo $this->createMobileUrl('share', array('card' => $card,'id'=>$_GET['id'],'cid'=>$show['id']));?>", "wid=" + _wid + "&type=card", "");

            }

        };

        wx.onMenuShareAppMessage(sharedata);

        wx.onMenuShareTimeline(sharedata);

    });



    $(document).ready(function () {

        $(".sendBtn").click(function () {

            var content = $(".message").val();

            newyearhk();

        });

        window.newyearhk = function () {

            var message = $.trim($(".message").html());

            var username = $.trim($(".name").html());

            var zhuti = $.trim($("#bjdh").val());

            if (ischange == false) {

                alert('请留下您的大名吧。');

                return false;

            }

            $.ajax({

                type: "post",

                dataType: 'json',

                url: "<?php  echo $this->createMobileUrl('set', array('card' => $card,'id'=>$_GET['id']));?>",

                data: "action=ajax&content=" + message + "&author=" + username,

                success: function (msg) {

                    if (msg.state == 1) {

                        shareLink = shareLink.replace('do=show', 'do=show&cid=' + msg.id);

                        usernameaa = msg.username;

                        cid = msg.id;

                        $('#sharemcover').css('display', 'block');

                        // 发送贺卡后分享

                        wx.ready(function () {

                            sharedata = {

                                title: "新春祝福",

                                desc: message,

                                link: shareLink,

                                imgUrl: "<?php  echo $_W['siteroot'];?>addons/wl_heka/style/images/tt.jpg",

                                success: function(){

                                    _$("<?php  echo $this->createMobileUrl('share', array('card' => $card,'id'=>$_GET['id']));?>", "wid=" + _wid + "&type=card&cid=" + msg.id, "");

                                }

                            };

                            wx.onMenuShareAppMessage(sharedata);

                            wx.onMenuShareTimeline(sharedata);

                        });

                    } else {

                        alert(msg.msg);

                    }

                },

                error: function (XMLHttpRequest, textStatus, errorThrown) {

                    alert(errorThrown);

                }

            });

        }

    })



    window.doit = function () {

        window.location = "";

    }

    function changeText(cont1, cont2, speed) {

        var Otext = cont1.text();

        var Ocontent = Otext.split("");

        var i = 0;



        function show() {

            if (i < Ocontent.length) {

                cont2.append(Ocontent[i]);

                i = i + 1;

            }

        };

        var Otimer = setInterval(show, speed);

    }

    ;

    $(document).ready(function () {

        $(".name").click(function () {

            ischange = true;

            $(".dh").show();

            if ($(this).find(".sort_input").attr("type") == "text") {

                return false;

            }

            var name = $.trim($(this).html());

            var m = $.trim($(this).text());

            $(this).html("<input type=text value=\"" + name + "\" class=\"sort_input\">");

            $(this).find(".sort_input").focus();

            $(this).find(".sort_input").bind("blur", function () {

                var n = $.trim($(this).val());

                if (n != m && n != "") {

                    $(this).parent().html(n);

                } else {

                    $(this).parent().html(name);

                }

            });

        });



        $(".message").click(function () {

            ischange = true;

            $(".dh").show();

            if ($(this).find(".sort_textarea").attr("name") == "textarea") {

                return false;

            }

            var message = $.trim($(this).html());

            var mm = $.trim($(this).text());

            $(this).html("<textarea name=\"textarea\" class=\"sort_textarea\">" + message + "</textarea>");

            $(this).find(".sort_textarea").focus();

            $(this).find(".sort_textarea").bind("blur", function () {

                var nn = $.trim($(this).val());

                if (nn != mm && nn != "") {

                    $(this).parent().html(nn);

                } else {

                    $(this).parent().html(message);

                }

            });

        });

    });

    _callback = function () {

        shareNumsUrl = shareNumsUrl.replace('do=share', 'do=share&cid=' + cid);

        alert(shareNumsUrl);

        $.ajax({

            type: "post",

            dataType: 'json',

            url: shareNumsUrl,

            data: "",

            success: function (msg) {

                $(".message").html('aaa');

            }

        });

    };

</script>



<div id="leafContainer"></div>

<script type="text/javascript">

    const NUMBER_OF_LEAVES = 30;

    function init() {

        var container = document.getElementById('leafContainer');

        for (var i = 0; i < NUMBER_OF_LEAVES; i++) {

            container.appendChild(createALeaf());

        }

    }



    function randomInteger(low, high) {

        return low + Math.floor(Math.random() * (high - low));

    }



    function randomFloat(low, high) {

        return low + Math.random() * (high - low);

    }



    function pixelValue(value) {

        return value + 'px';

    }



    function durationValue(value) {

        return value + 's';

    }



    function createALeaf() {

        var leafDiv = document.createElement('div');

        var image = document.createElement('img');

        image.src = '<?php  echo $_W['siteroot'];?>addons/wl_heka/style/images/yuanbao' + randomInteger(1, 5) + '.png';

        leafDiv.style.top = "-100px";

        leafDiv.style.left = pixelValue(randomInteger(0, 500));

        var spinAnimationName = (Math.random() < 0.5) ? 'clockwiseSpin' : 'counterclockwiseSpinAndFlip';

        leafDiv.style.webkitAnimationName = 'fade, drop';

        image.style.webkitAnimationName = spinAnimationName;

        var fadeAndDropDuration = durationValue(randomFloat(5, 11));

        var spinDuration = durationValue(randomFloat(4, 8));

        leafDiv.style.webkitAnimationDuration = fadeAndDropDuration + ', ' + fadeAndDropDuration;

        var leafDelay = durationValue(randomFloat(0, 5));

        leafDiv.style.webkitAnimationDelay = leafDelay + ', ' + leafDelay;

        image.style.webkitAnimationDuration = spinDuration;

        leafDiv.appendChild(image);

        return leafDiv;

    }



    window.addEventListener('load', init, false);

    document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {

        WeixinJSBridge.call('hideToolbar');

    });

</script>



</body>

</html>