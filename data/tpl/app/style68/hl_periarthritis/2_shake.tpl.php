<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php  echo $reply['title'];?></title>
  <meta name="viewport" content="width=device-width,initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">

  <meta name="full-screen" content="true">
  <meta name="screen-orientation" content="portrait">
  <meta name="x5-fullscreen" content="true">
  <meta name="360-fullscreen" content="true">
  <style type="text/css" media="screen">
    body {
      text-align: center;
      background: #fff;
      overflow: hidden;
      padding: 0;
	  margin:0;
    }
    p {
      margin: 10px 0;
    }
    * {
      -webkit-touch-callout: none;
      -webkit-user-select: none;
      -khtml-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    }
    html {
      -ms-touch-action: none;
      /* Direct all pointer events to JavaScript code. */
    }
    #score {
      -webkit-transition: .3s;
      box-shadow: 1px 1px 1px #999;
      outline: none;
      padding: 0;
      background: #eee;
      font-size: 1.5em;
      margin: 0 auto;
      margin-top: 30px;
      border-radius: 100%;
      border: 1px solid #eee;
      vertical-align: baseline;
      zoom: 1;
      width: 100px;
      height: 100px;
      line-height: 100px;
    }
    .time {
      font-size: 2em;
    }
    .share {
      color: #eee;
      width: 100%;
      height: 100%;
      position: absolute;
      top: 0;
      left: 0;
      background: rgba(0, 0, 0, .5);
      padding-top: 240px;
    }
    .btn {
      margin-right: 10px;
      font-size: 1.5em;
      display: inline-block;
      background: #999;
      padding: 15px;
      border-radius: 15px;
    }
    .fx {
      width: 100%;
      height: 100%;
      position: absolute;
      top: 0;
      left: 0;
      display: none;
    }
    .wobble {
      -webkit-animation: wobble 1.2s .5s infinite ease both;
    }
    @-webkit-keyframes wobble {
      0% {
        -webkit-transform: translateX(0%)
      }
      15% {
        -webkit-transform: translateX(-25%) rotate(-5deg)
      }
      30% {
        -webkit-transform: translateX(20%) rotate(3deg)
      }
      45% {
        -webkit-transform: translateX(-15%) rotate(-3deg)
      }
      60% {
        -webkit-transform: translateX(10%) rotate(2deg)
      }
      75% {
        -webkit-transform: translateX(-5%) rotate(-1deg)
      }
      100% {
        -webkit-transform: translateX(0%)
      }
    }
.vlink{width:49%;float:left;}
  </style>
</head>

<body>
  <p class="time"><span id="sec"><?php  echo $reply['shaketimes'];?>.00</span>秒</p>
  <p style="color:#ddd;font-size:1em">点击开始，狂撸吧！孩子</p>
  <button id="score" style="margin-top:20px;"></button>
  <div id="hand" class="" style="margin-top:20px;background: url(../addons/hl_periarthritis/images/bg.png) no-repeat center; height: 200px;"></div>
  <div class="share">
    <span class="btn again">再撸一次</span>
    <span class="btn go">炫耀一下</span>
  </div>
  <img class="fx" src="../addons/hl_periarthritis/images/share.png" alt="share" ontouchstart="document.querySelector('.fx').style.display='none';">
  <div class="ads" style="width: 100%; height: 69px; margin: 0px; margin-top: 20px; padding: 0px; border: none; background: none; ">
    <div class="vlink"><a  style="color:black;" href="<?php  echo $reply['gzurl'];?>">更多游戏</a></div>
    
    <div class="vlink"><a style="color:black;text-align:center" href="<?php  echo $reply['gzurl'];?>">关注我们</a></div>
  </div>
  <audio></audio>
  <script type="text/javascript" charset="utf-8">
    // Check if a new cache is available on page load.
    window.applicationCache.addEventListener('updateready', function(e)
    {
      if (window.applicationCache.status == window.applicationCache
        .UPDATEREADY)
      {
        window.applicationCache.swapCache();
      }
    }, false);

    var audio = document.querySelector('audio');
    audio.src = '../addons/hl_periarthritis/images/yao.mp3';
    var mebtnopenurl = "<?php  echo $reply['gzurl'];?>";

   

    function dp_submitScore(score)
    {
      dp_share();
    }

    function onShareComplete(res)
    {
      document.location.href = mebtnopenurl;
    }

    window.shareData = {
      "imgUrl": "<?php  echo $_W['attachurl'];?><?php  echo $reply['thumb'];?>",
      "timeLineLink": "<?php  echo $this->createMobileUrl('detail', array('id' => $reply['id']))?>",
      "tTitle": "<?php  echo $reply['title'];?>",
      "tContent": "<?php  echo $reply['content'];?>"
    };


    document.addEventListener('WeixinJSBridgeReady', function onBridgeReady()
    {
      WeixinJSBridge.on('menu:share:appmessage', function(argv)
      {
        WeixinJSBridge.invoke('sendAppMessage',
        {
          "img_url": window.shareData.imgUrl,
          "link": window.shareData.timeLineLink,
          "desc": window.shareData.tContent,
          "title": window.shareData.tTitle
        }, onShareComplete);
      });

      WeixinJSBridge.on('menu:share:timeline', function(argv)
      {
        WeixinJSBridge.invoke('shareTimeline',
        {
          "img_url": window.shareData.imgUrl,
          "img_width": "640",
          "img_height": "640",
          "link": window.shareData.timeLineLink,
          "desc": window.shareData.tContent,
          "title": window.shareData.tTitle
        }, onShareComplete);
      });
    }, false);

    document.addEventListener('touchmove', function(e)
    {
      e.preventDefault();
    }, false);
	
    if (window.DeviceMotionEvent)
    {
      window.addEventListener('devicemotion', deviceMotionHandler, false);
    }
    var SHAKE_THRESHOLD = 500;
    var last_update = 0;
    var x, y, z, last_x, last_y, last_z;
    var ds = document.querySelector('#score');
    var sec = document.querySelector('#sec');
    var share = document.querySelector('.share');
    var go = document.querySelector('.go');
    var again = document.querySelector('.again');
    var score = 0;
    var begin = false;
    var time = 100 * <?php  echo $reply['shaketimes'];?>;
    var end = false;
    ds.textContent = '开治';
    share.style.display = 'none';

    again.addEventListener('touchstart', function()
    {
      end = false;
      time = 100* <?php  echo $reply['shaketimes'];?>;
      score = 0;
      share.style.display = 'none';
      ds.textContent = '开始';
      sec.textContent = "<?php  echo $reply['shaketimes'];?>.00";
      //run();
    });

    go.addEventListener('touchstart', function()
    {
      var fx = document.querySelector('.fx');
      fx.style.display = 'block';
      dp_share();
    });

   function dp_share(){
      if (score > 0)
      {
        document.title = '狂撸达人 <?php  echo $reply['shaketimes'];?>秒我能撸' + score + '下,屏幕都湿了！肩周炎也好了？'
      }
      else
      {
        document.title = '疯狂撸一撸，玩完之后我的肩周炎就好了.';
      }
      window.shareData.tTitle = document.title;
    }

    function run()
    {
      if (begin || end) return;
      document.querySelector('#hand').className = 'wobble';
      audio.loop = true;
      audio.play();
      begin = true;
      ds.textContent = 0;
      var tid = setInterval(function()
      {
        time--;
        if (time < 0)
        {
          audio.loop = false;
          audio.pause();
          clearInterval(tid);
          begin = false;
          end = true;
          share.style.display = 'block';
          document.querySelector('#hand').className = '';
          return;
        }
        sec.textContent = (time / 100).toPrecision(time.toString().length);
      }, 10);

    }

    ds.addEventListener('touchstart', function()
    {
      run();
    });

    function deviceMotionHandler(eventData)
    {
      if (!begin)
      {
        ds.style.webkitTransform = 'translate3d(0px,0px,0px)';
        return;
      }
      var acceleration = eventData.accelerationIncludingGravity;
      var curTime = new Date().getTime();
      var diffTime = curTime - last_update;

      if (diffTime > 100)
      {

        last_update = curTime;

        x = acceleration.x;
        y = acceleration.y;
        z = acceleration.z;

        var xdiff = (x - last_x);
        var ydiff = (y - last_y);
        var zdiff = (z - last_z);

        //ds.style.webkitTransform = 'translate3d(' + xdiff + 'px,' + ydiff + 'px,' + zdiff + 'px)';

        var value = x + y + z;
        var lastvalue = last_x + last_y + last_z;
		
        var speed = Math.abs(y - last_y) / diffTime * 10000 ;

        if (speed > SHAKE_THRESHOLD)
        {
          ds.textContent = score++;
        }
        last_x = x;
        last_y = y;
        last_z = z;
      }
    }
	
	
  </script>

</body>

</html>
