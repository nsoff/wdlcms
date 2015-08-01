<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title></title>
    <meta name="format-detection" content="telephone=no"/>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="<?php  echo $resroot;?>style2.css" rel="stylesheet" type="text/css">
</head>

<body>

<div style="display: none;"><img id="shareImg" src=""  ></div>
<div id="mcover01" onclick="document.getElementById('mcover01').style.display='';" style="display:none;">
    <img src="<?php  echo $resroot;?>wap-weixin.png"/>
</div>


<div class="page">
    <div class="text">
        <div class="logo">
            <img src="<?php  echo $resroot;?>001.png" alt="">
        </div>
        <div class="colee" style="width: 200px;">
            <div id="colee" style="overflow:hidden;height:20px;position:absolute;">
                <ul id="colee1">
                    <?php  if(is_array($users)) { foreach($users as $k => $v) { ?>
                    <?php  if($k<=10) { ?> <li><?php  echo $v['nickname'];?>:成功提款 ￥<?php  echo $v['points'];?>元</li> <?php  } ?>
                    <?php  } } ?>
                </ul>
                <ul id="colee2">
                    <?php  if(is_array($users)) { foreach($users as $k => $v) { ?>
                    <?php  if($k>=11) { ?> <li><?php  echo $v['nickname'];?>:成功提款 ￥<?php  echo $v['points'];?>元</li> <?php  } ?>
                    <?php  } } ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="redbag">
        <p class="t-1">
      <?php  if($reply['endtime']< time()) { ?>
           
                对不起,活动已经结束了
       <?php  } else { ?>
                <恭喜您获得红包>
       <?php  } ?>
            
        </p>
        <a href="javascript:;" class="rule"
           onclick="document.getElementById('mcover').style.display='block'">规则</a>
        <div class="prizes01"></div>
		<p class="no a-bouncein"><strong><?php  echo $points;?></strong></p>
		<p class="t-2">邀请好友参与，红包马上变大</p>
        <div class="list">
            <ul>
                <li>
                    <button class="button_01" onclick="document.getElementById('mcover01').style.display='block';">
                        邀请好友
                    </button>
                </li>
                <li>
                    <button  class="button_02" onclick='location.href="<?php  echo $this->createMobileUrl('tixian',array('openid'=>$openid,"id"=>$id))?>"'>
                        <a href="#">申请提现</a>
                    </button>
                </li>
            </ul>
            <div class="clr"></div>
        </div>
        <p class="t-3">
            <?php  if($fans['helps']>0) { ?>
                合体 <?php  echo number_format($fans['helps'],0)?> 次,红包增加<?php  echo number_format($fans['points_help'],2)?>元
                <?php  } else { ?>
                等待好友合体,变大红包!  
            <?php  } ?>
        </p>

        <div class="update01">
            <button class="button" id="refresh">
                <img src="<?php  echo $resroot;?>b-2.png" alt="">
            </button>
        </div>
    </div>

    <div class="moneylist">
        <p class="number">有<label class="white"><?php  echo $joincount;?></label>人抢红包</p>

        <p class="manito"><span>合体大神</span></p>
        <ul id="moneylist">
        </ul>
        <p class="manito1" style=' border-top: 1px #e86a6a dashed;padding:5px;'>
            <span> @<?php  if(empty($reply['copyright'])) { ?><?php  echo $_W['account']['name'];?><?php  } else { ?><?php  echo $reply['copyright'];?><?php  } ?> </span>
       </p>
       
       <p class="manito1" style=' padding:5px;text-align:right;'>
             <a href='<?php  echo $this->createMobileUrl('jubao')?>' style="color:white">举报</span>
       </p>
    </div>

    
</div>

<!--<div class="foot foot-black"><a href="<php>echo C("guanzhu_url");</php>">关注微信</a></div>-->

 

<div id="mcover" onclick="document.getElementById(&#39;mcover&#39;).style.display=&#39;&#39;;">
    <div class="promptbox">
        <div class="bao_info">
            <a href="javascript:;" class="cancle">×</a>

            <div class="top">
                <img src="<?php  echo $resroot;?>img_8_v2.jpg" width="100%">
            </div>
            <div class="content"  id="intro"><p style="font-size:16px;">
                 <?php  echo $reply['detail'];?>
            </div>
        </div>
    </div>
</div>



<div class="popup" style="display: none;">
    <div class="popup-wrap">
        <a href="javascript:;" class="cancle del">×</a>
        <p id="popupText"></p>
        <div class="btns">
            <a href="javascript:;" id="subscribeUrl" class="button_01">点此关注</a>
        </div>
    </div>
    <div id="mcover03"></div>
</div>

<script type="text/javascript" src="<?php  echo $resroot;?>jquery.js"></script>
<script type="application/javascript" src="<?php  echo $resroot;?>fastclick.js"></script>
<script type="text/javascript">
$(function(){
    FastClick.attach(document.body);
});
</script>
<script type="text/javascript" src="<?php  echo $resroot;?>ajax-loading.js?v=1"></script>
<script type="text/javascript">
	
$("#shareImg").attr("src","<?php  echo $resroot;?>red.jpg");
$("title").text("#name#  送你一个新年红包，一起抢，让红包变更大。红包拿到手软".replace("#name#", "<?php  echo $fans['nickname'];?>"));
<?php  if($newfans || !$followed) { ?>
    $("#subscribeUrl").click(function () {
        location.href = "<?php  echo $reply['followurl'];?>";
    });
    $(".cancle").hide();
    $("#popupText").html("恭喜，领到<?php  echo $points;?>元红包一个！<br/>关注后可提现红包，也可接收红包变大通知。");
    $(".popup").show();
<?php  } ?>

function getColee(desc) {
    var html = '<li>' + desc + '</li>';
    return html;
}
sharelist();
function sharelist() {
   
    $.ajax({
        type: "post",
        url: "<?php  echo $this->createMobileUrl('sharelist')?>",
        data: {id: "<?php  echo $id;?>", openid:"<?php  echo $openid;?>"},
        dataType:"json",
        success: function (data) {
            if (!data.success) {
                return;
            } 
            var html = '';
            $.each(data.list, function (i, e) {
                html += moneylist(e.createtime, e.points, e.nickname, e.headurl);
            });
            $("#moneylist").html(html);
        }
    });
}

var descjson = {1: "小手一抖，红包到手！", 2: "现实很骨感，红包须丰满！", 3: "感谢，红包什么的我最喜欢！", 4: "恭喜发财，大吉大利！"};
function moneylist(acquireTime, faceAmount, name, headurl) {
    if(name==''){
       name = '财神';
    }
    if(headurl==''){
       headurl = '<?php  echo $resroot;?>user.jpg';
    }
    var html = '<li> <div class="photo"><img src="' + headurl + '"/> </div> <div class="xtext"> <p> <span> '+ name + '</span> </p> <p><span><b>'+acquireTime+'</b></span></p> <p>' + descjson[getRandomNum(1, 4)] + '</p> </div> <div class="score"> <b>'+ faceAmount + '</b>元 </div> </li>';
 
    return html;
}

function getRandomNum(Min, Max) {
    var Range = Max - Min;
    var Rand = Math.random();
    return(Min + Math.round(Rand * Range));
}

var speed = 100;
var colee2 = document.getElementById("colee2");
var colee1 = document.getElementById("colee1");
var colee = document.getElementById("colee");
colee2.innerHTML = colee1.innerHTML;
var MyMar1 = setInterval(Marquee1, speed);
function Marquee1() {
    if (colee2.offsetTop <= colee.scrollTop) {
        colee.scrollTop -= colee1.offsetHeight;
    } else {
        colee.scrollTop++;
    }
}

</script>
</body>
<script type="text/javascript" src="<?php  echo $resroot;?>WeixinApi.js?v=4.3"></script>
<script type="text/javascript">
	//WeixinApi.enableDebugMode();
    // 给按钮增加click事件：请不要太纠结这个写法，demo而已
    var addEvent = function(elId,listener){
        document.getElementById(elId)
                .addEventListener('click',function(e){
                 
                    listener(this,e);
                },false);
    };

    // 刷新
    addEvent('refresh',function(el,e){
        e.preventDefault();
        sharelist();
        //location.replace('?' + Math.random(),true);
    });
	
</script>
<?php $resroot = !strexists($resroot,'http://')?$_W['siteroot']."addons/ewei_bonus/style/":$resroot?>

<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
  wx.config({
                debug:false,
                appId: "<?php  echo $appIdShare;?>",
                timestamp: <?php  echo $package["timestamp"];?>,
                nonceStr: '<?php  echo $package["nonceStr"];?>',
                signature: '<?php  echo $package["signature"];?>',
                jsApiList: [
                  'onMenuShareTimeline','onMenuShareAppMessage','onMenuShareWeibo'
                ]
  });

  
   var shareMeta  = {
               title: '<?php  echo $nickname;?>  送你一个新年红包，一起抢，让红包变更大。红包拿到手软',
               desc: '有钱,任性!和 <?php  echo $nickname;?> 一起抢红包到手软！',	     
               link: "<?php  echo $sharelink;?>",
               imgUrl: "<?php  echo $resroot;?>red.jpg" 
      };
     
  wx.ready(function(){
                  wx.onMenuShareTimeline(shareMeta);
                  wx.onMenuShareAppMessage(shareMeta);
                  wx.onMenuShareWeibo(shareMeta);
             });
</script>
 
</html>
