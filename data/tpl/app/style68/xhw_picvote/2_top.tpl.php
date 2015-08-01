<?php defined('IN_IA') or exit('Access Denied');?>﻿<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
<meta name="renderer" content="webkit" />
<meta property="qc:admins" content="15317273575564615446375" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui, maximum-scale=1, user-scalable=no" />
<meta name="alexaVerifyID" content="LkzCRJ7rPEUwt6fVey2vhxiw1vQ"/>
<title><?php  echo $title;?>排行榜</title>
<link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="SegmentFault" />
<meta name="userId" value="" id="SFUserId" />


<link type="text/css" rel="stylesheet" href="../addons/xhw_picvote/css/style.css">

<script type="text/javascript" src="../addons/xhw_picvote/js/jquery.js"></script>
<script type="text/javascript" src="../addons/xhw_picvote/js/main.js"></script>
<script type="text/javascript" src="../addons/xhw_picvote/js/Tip.js"></script>


<style type="text/css">
.time-item strong{background:#C71C60;color:#fff;line-height:32px;font-size:27px;font-family:Arial;padding:0 5px;margin-right:5px;border-radius:2px;box-shadow:1px 1px 3px rgba(0,0,0,0.2);}
#day_show{float:left;line-height:32px;color:#c71c60;font-size:27px;margin:0 5px;font-family:Arial, Helvetica, sans-serif;}
.item-title .unit{background:none;line-height:32px;font-size:20px;padding:0 5px;float:left;}
.p4 {left:0px;height: 49px;background-color: #444;width: 100%;text-align: center;position: fixed;bottom: 0px;}
.p4 a{line-height:49px; color:#fff; font-size:14px; text-decoration:none; }
</style>
<script type="text/javascript" src="../addons/xhw_picvote/template/mobile/top/skjs/jquery.min.js"></script>
</head>



<body style="background:#3A0255;">

  <div class="banner">
    <ul>
<?php  for($i=0; $i<count($adimg);$i++)if(!empty($adimg[$i]))echo"<li><a href=\"".$adimglink[$i]."\"><img src=\"../attachment/".$adimg[$i]."\" style=\"width:100%;\" /></a></li>";?>   
    <ul>
	</div>
	
	
<div class="tongji">
    
	<ul>
    	<li>参赛选手<br><span><?php  echo $total;?></span></li>
    	<li>累计投票<br><span><?php  echo $lognum;?></span></li>
    	<li>参与人数<br><span><?php  echo $viewnum;?></span></li>
    </ul>

</div>


<div class="wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ranking-section mini">
                <h4 style="color: rgb(225, 175, 110); padding-top: 20px; font-size: 16px; font-weight: 200;" h4"="">&nbsp;&nbsp;距离活动结束还剩：<small>
   <div style="padding-top: 15px;" class="time-item">

	<strong style="font-size: 20px;background: none repeat scroll 0% 0% #EAE126;" id="day_show">天</strong>
    <strong style="font-size: 20px;background: none repeat scroll 0% 0% #EA3426;" id="hour_show">0时</strong>
    <strong style="font-size: 20px;background: none repeat scroll 0% 0% #EA3426;" id="minute_show">0分</strong>
    <strong style="font-size: 20px;background: none repeat scroll 0% 0% #EA3426;" id="second_show">0秒</strong>
</div><!--倒计时模块--></small></h2>
<hr></hr>



<div class="con">
	<p class="tips"><span style="width: 100px;"><i style="background: url(&quot;../addons/xhw_picvote/icon/5.png&quot;) no-repeat scroll 0px center / 24px auto transparent;">排行榜</i></span></p>
    <div style="background-color: rgba(255, 255, 255, 0.09);" class="paihang">
    	<div class="biaotou">
        	<div style="width:35%;">名次</div>
        	<div style="width:45%;">选手</div>
        	<div style="width:20%;">得票总数</div>
        </div>
        <ul>
    <?php  if(is_array($list)) { foreach($list as $row) { ?>
	
        
        	<li>
                 <a href="<?php  echo $this->createmobileUrl('item',array('do'=>'item', 'id'=>$row['id']))?>">
                    <div style="width:34%;"><i class="two"><span class="pull-left pos"><?php  echo ++$pxid;?></span></i></div>
                    <div style="width:51%;"><?php  echo $row['nickname'];?></div>
                    <div style="width:15%;"><?php  echo $row['num'];?></div>
                </a>
            </li>
   <?php  } } ?>     
        </ul>
    </div>
	</div>

    
    </div>
    </div>
    </div>
	</div>
	
	

<div id="roundAndRound" class="widget-loading">加载中</div>
<div id="fixedTools" class="hidden-xs hidden-sm">
  <a id="backtop" class="hidden border-bottom" href="#">回顶部</a>
</div>
<script>
    (function (w) {
        w.SFToken = (function () {
    var _MK6ZC = //'wP'
'c'+//'7NK'
'4'+//'oGD'
'8'+''///*'kEp'*/'kEp'
+//'dY'
'dY'+'a'//'zN'
+'WmI'//'WmI'
+''///*'y'*/'y'
+'a'//'OG'
+'99c'//'T'
+'24'//'2NQ'
+'X'//'X'
+//'Hst'
'87'+'f'//'e4'
+//'Y6'
'f'+//'r'
'b5'+'5f'//'O'
+'ac'//'w0L'
+''///*'AS'*/'AS'
+'0'//'oE2'
+//'m2'
'a0c'+'d6b'//'lQO'
+//'8ju'
'd'+//'bfp'
'89c'+//'jRo'
'4', _UBbAgqV = [[3,5],[4,7],[10,11]];

    for (var i = 0; i < _UBbAgqV.length; i ++) {
        _MK6ZC = _MK6ZC.substring(0, _UBbAgqV[i][0]) + _MK6ZC.substring(_UBbAgqV[i][1]);
    }

    return _MK6ZC;
})();
    })(window);
</script>
    <script src="../addons/xhw_picvote/template/mobile/top/skjs/assets.ce4fe392.js"></script>
    <script src="../addons/xhw_picvote/template/mobile/top/skjs/top10.b85a59fa.js"></script>
<script src="../addons/xhw_picvote/template/mobile/top/skjs/m.js"></script>
<script>
  BAIDU_CLB_fillSlotAsync('981183','adid-981183');
  BAIDU_CLB_fillSlotAsync('981184','adid-981184');
  BAIDU_CLB_fillSlotAsync('981694','adid-981694');
  BAIDU_CLB_fillSlotAsync('981179','adid-981179');
</script>
<script type="text/javascript">

var intDiff = parseInt(<?php  echo $time;?>);//倒计时总秒数量

function timer(intDiff){
    window.setInterval(function(){
    var day=0,
        hour=0,
        minute=0,
        second=0;//时间默认值        
    if(intDiff > 0){
        day = Math.floor(intDiff / (60 * 60 * 24));
        hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
        minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
        second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
    }
    if (minute <= 9) minute = '0' + minute;
    if (second <= 9) second = '0' + second;
    $('#day_show').html(day+"天");
    $('#hour_show').html('<s id="h"></s>'+hour+'时');
    $('#minute_show').html('<s></s>'+minute+'分');
    $('#second_show').html('<s></s>'+second+'秒');
    intDiff--;
    }, 1000);
} 

$(function(){
    timer(intDiff);
}); 
</script>
<?php  require_once IA_ROOT."/addons/xhw_picvote/jssdk.class.php";$weixin = new jssdk($jie='0',$url='');$wx = $weixin->get_sign();?>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>  
<script type="text/javascript">
  wx.config({
      appId: "<?php  echo $wx['appId'];?>",
      timestamp: <?php  echo $wx['timestamp'];?>,
      nonceStr: "<?php  echo $wx['nonceStr'];?>",
      signature: "<?php  echo $wx['signature'];?>",
      jsApiList: [
        'checkJsApi',
        'onMenuShareTimeline',
        'onMenuShareAppMessage'
      ]
  });
  wx.ready(function () {
  //分享朋友
  wx.onMenuShareAppMessage({
      title: '<?php  echo $share_title;?>',
      desc: '<?php  echo $share_desc;?>',
      link: "<?php  echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>",
      imgUrl: '<?php  echo $_W['siteroot'];?><?php  echo $photo;?>',
      trigger: function (res) {
        //alert('用户点击发送给朋友');
      },
      success: function (res) {
        window.location.href ='<?php  echo $_W['siteroot'].$this->createmobileUrl('share',array('do'=>'share', 'id'=>$id, 'rid'=>$id, 'from'=>'index'));?>';//分享成功回调
      },
      cancel: function (res) {
       //window.location.href =adurl;//取消回调
      },
      fail: function (res) {
        alert(JSON.stringify(res));//失败回调
      }
    });
 //朋友圈
  wx.onMenuShareTimeline({
      title: '<?php  echo $share_title;?>',
      link:"<?php  echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>",
      imgUrl:'<?php  echo $_W['siteroot'];?><?php  echo $photo;?>',
      trigger: function (res) {
        //alert('用户点击分享到朋友圈');
      },
      success: function (res) {
        window.location.href ='<?php  echo $_W['siteroot'].$this->createmobileUrl('share',array('do'=>'share', 'id'=>$id, 'rid'=>$id, 'from'=>'index'));?>';//分享成功回调
      },
      cancel: function (res) {
          //window.location.href =adurl;
      },
      fail: function (res) {
        alert(JSON.stringify(res));
      }
    });   
    
    
  });
</script>



<ul class="nav">
	<li class="cur"><a href="<?php  echo $this->createmobileUrl('index',array('do'=>'index', 'id'=>$id))?>">返回首页</a></li>
	<li id="ssuo" ><a href="<?php  echo $submit_url;?>">活动规则</a></li>
	<li><a href="<?php  echo $this->createmobileUrl('reg',array('do'=>'reg', 'id'=>$id))?>">参赛报名</a></li>
	<li><a href="<?php  echo $this->createmobileUrl('my',array('do'=>'my', 'id'=>$id))?>">我的主页</a></li>


    <div id="mcover" onclick="weChat()" style="display:none;">
    <img src="http://img.pccoo.cn/wx/vote/images//guide.png">
    </div>
</ul>

</body>
</html>
