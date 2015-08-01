<?php defined('IN_IA') or exit('Access Denied');?>﻿<!doctype html>
<html>
<head>
<meta charset="utf-8"/>
<title>我是<?php  echo $nickname;?>，我在参加投票大赛，快来给我投一票吧！</title>
<meta name="format-detection" content="telephone=no">
<meta content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
<meta name="apple-mobile-web-app-title" content="">
<meta name="apple-mobile-web-app-capable" content="yes">
<script type="text/javascript" src="../addons/xhw_picvote/template/mobile/skjs/jquery.js"></script>
<script type="text/javascript" src="../addons/xhw_picvote/template/mobile/skjs/common.js"></script>
<link href="../addons/xhw_picvote/template/mobile/skcss/style.css" type="text/css" rel="stylesheet"/>
<link href="../addons/xhw_picvote/template/mobile/skcss/bootstrap.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../addons/xhw_picvote/js/bootstrap.min.js"></script>
<link href="../addons/xhw_picvote/template/mobile/skcss/992779.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../addons/xhw_picvote/template/mobile/skcss/16701464.js"></script>
<script type="text/javascript" src="../addons/xhw_picvote/template/mobile/skcss/1548170.masonry.min.js"></script>
<script type="text/javascript" src="../addons/xhw_picvote/template/mobile/skcss/3714123.js"></script>
<style type="text/css">
#mbutton{padding:15px 10px 15px 10px; overflow:hidden; border-bottom:1px #DDD solid;}
#mbutton > span{float:right; display:inline-block; background:#58a3ff; border:1px #63a0eb solid; color:#FFF; height:30px; line-height:30px; padding:0 10px; margin-left:10px;}
#mcover{position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0, 0, 0, 0.7);display:none;z-index:20000;}
#mcover img{position:fixed;right: 18px;top:5px;width:260px;height:180px;z-index:20001;}
.divcss{margin:0 auto;width:90%} 
.p4 {left:0px;z-index:999;height: 49px;background-color: #444;width: 100%;text-align: center;position: fixed;bottom: 0px;}
.p4 a{line-height:49px; color:#fff; font-size:14px; text-decoration:none; }
</style>


<link type="text/css" rel="stylesheet" href="../addons/xhw_picvote/css/style.css">
<link type="text/css" rel="stylesheet" href="../addons/xhw_picvote/css/xzw.css">
<link rel="stylesheet" href="../addons/xhw_picvote/js/landi.css" type="text/css" />
<script type="text/javascript" src="../addons/xhw_picvote/js/TouchSlide.1.0.js"></script>
<script src="../addons/xhw_picvote/js/banner.js"></script>
<script src="../addons/xhw_picvote/js/flash.js"></script>


</head>
<body style="background-color: #3A0255;">
<div id="wrapper">
  


        <div class="adb_3">
        <!--广告 -->
        <div align="center"> 
      <?php  if($arr['0']['adpass']) { ?><?php  echo htmlspecialchars_decode($arr['0']['ad']);?> <?php  } else if($arr['0']['adpic']!="") { ?>
       <a href="<?php  echo $arr['0']['adlink'];?>"><img src="../attachment/<?php  echo $arr['0']['adpic'];?>" width="100%"/></a><?php  } ?>
        </div>
         <!--广告 -->
        </div>

  
 <!--轮播广告商代码 
<div class="jdt">
<div id="slideBox" class="slideBox">
<div class="bd"> 
<div class="tempWrap" style="overflow:hidden; position:relative; width:100%;">

<ul>
 
   <?php  if($arr['0']['adpass']) { ?><?php  echo htmlspecialchars_decode($arr['0']['ad']);?> <?php  } else if($arr['0']['adpic']!="") { ?>
   <li style="float: left; width:100%;"><a class="pic" href="<?php  echo $arr['0']['adlink'];?>"><img src="../attachment/<?php  echo $arr['0']['adpic'];?>" alt=""></a><?php  } ?></li>

   </ul>

</div> 
</div>

  <div class="hd">
    <ul>
	<li class="on">1</li><li class="">2</li>
	</ul>

  </div>
  </div>
  </div>	
  
  轮播广告商代码 -->	

 
 <div style="font-size: 15px;" class="tongji">
	<ul>
    	<li>参赛编号<br><span><?php  echo $id;?></span></li>
    	<li>累计投票<br><span><?php  echo $num;?></span></li>
    	<li>人气指数<br><span><?php  echo $sharenum;?></span></li>
    </ul>
</div> 
</br>  
<div style="padding-left: 20px;" class="liuyan">

       <span style="border-radius: 4px;" class="pinglun"><?php  echo $nickname;?>的参赛宣言:</span>
       <ul class="lypl" id="lypl">
       	<li>
         <dl>
         <dd style="width: 100%; float: left; color: #D3DAAF; font-size: 15px;"><?php  echo $title;?></dd>
         </dl>
        </li>
      </ul>
  </div>		
	
	<div style="padding: 0px 0px 5px;" id="main">
	
		
<div style="margin-top: -40px; background: none repeat scroll 0% 0% rgba(254, 254, 254, 0);" class="con">
	
    <div class="detail">
    			<p style="padding-left: 28%; color: rgb(226, 33, 111); font-weight: 800;" class="tips"><i><?php  echo $id;?>号：<?php  echo $nickname;?></i></p>
        <ul style="margin-top: -20px; margin-bottom: 0px;" class="wenzi">
        	<li>
			
			<span style="color: rgb(51, 51, 51); font-family: 宋体; font-size: 16.363636016845703px; line-height: 24.545454025268555px;"><?php  echo $row['title'];?></span>
			
			<br style="color: rgb(51, 51, 51); font-family: 宋体; font-size: 16.363636016845703px; line-height: 24.545454025268555px;" />
			
			<?php  if(!empty($img['0']))echo"<div class=\"item active\"><img src=\"../attachment/".$img['0']."\"></div>";?>
			
			<img border="0" width="635" style="border: 0px; margin: 10px 0px;" alt="" />
			
            <?php  for($i=1; $i<count($img);$i++)if(!empty($img[$i]))echo"<div class=\"item\"><img <img src=\"../attachment/".$img[$i]."\"></div>";?>  
			
	
			
			</li>
        </ul>




		</div>	


		</div>	
		

        <div align="center">
        <div class="row clearfix">

		
		        <!--个人照片相册切换效果代码 -->
				
	
		<div style="padding-bottom: 20px; text-align: center; padding-left: 15%; padding-top: 0px; margin-top: -40px;" class="btns clearfix">
		 <a style="width: 40%; height: 35px;" href="<?php  echo $votelink;?>"><b>投  一 票</b></a>
         <a style="width: 40%; height: 35px;" href="<?php  echo $this->createmobileUrl('reg',array('do'=>'reg', 'id'=>$rid))?>">我要报名</a>
     </div>			
<style>
#mcover {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    display: none;
    z-index: 20000;
}
#mcover img {
    position: fixed;
    right: 18px;
    top: 5px;
    width: 260px!important;
    height: 180px!important;
    z-index: 20001;
}
</style>
 <div id="mcover" onclick="document.getElementById('mcover').style.display='';" style="display:none;">
    <img src="../addons/xhw_picvote/template/mobile/skimages/guide.png" />
 </div>	
        <div id="mcover" onClick="$(this).hide()"><img src=""></div>
        <div class="c_box box">
            <h3 style="background: url(&quot;http://img.ccoo.cn/wx/vote/images/bg_x.png&quot;) repeat-x scroll -7px 0px / auto 100% transparent;">想出现在人气榜吗？快转发到朋友圈吧</a></h3>
            <div>
        <div style="padding-bottom: 10px;" class="container">
        <div id="images" style="position: relative; height: 1020px; background-color:#fff;" class="masonry">
    				<?php  if(is_array($toplist)) { foreach($toplist as $row) { ?>
    				 <div class="items"><a href="<?php  echo $this->createmobileUrl('item',array('do'=>'item', 'id'=>$row['id']))?>"><img src="../attachment/<?php  echo $row['avatar'];?>">
					 <p style="text-align: center;"><?php  echo $row['nickname'];?><font style="font-size: 18px;" color="red"><?php  echo $row['num'];?></font>&nbsp;票</p>
					 </div>
				<?php  } } ?>
    </div>
    </div>
            </div>
        </div>
        <div class="adb_4">
        <!--广告 -->
        </div>
		
		
	  </div>		

</br>	  


		
		
		

<script type="text/javascript">

		TouchSlide({ 

			slideCell:"#slideBox",

			titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层

			mainCell:".bd ul", 

			effect:"leftLoop", 

			autoPage:true,//自动分页

			autoPlay:true //自动播放

		});

</script>		
		
		
		
<script>
$(function() {
    if(!navigator.userAgent.match(/Android/i)) {
        $(".contacts").click(function() {
            $('#mcover').show();
            return false;
        });
    }
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
      title: '<?php  echo $nickname;?>正在参加<?php  echo $title_a;?>,投票ID:<?php  echo $id;?>',
      desc: '<?php  echo $nickname;?>正在参加<?php  echo $title_a;?>,投票ID:<?php  echo $id;?>,赶快为TA投上一票吧！',
      link: "<?php  echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>",
      imgUrl: '<?php  echo $_W['siteroot'];?>attachment/<?php  echo $avatar;?>',
      trigger: function (res) {
        //alert('用户点击发送给朋友');
      },
      success: function (res) {
        window.location.href ='<?php  echo $this->createmobileUrl('share',array('do'=>'share', 'id'=>$id, 'rid'=>$rid, 'from'=>'item'));?>';//分享成功回调
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
      title: '<?php  echo $nickname;?>正在参加<?php  echo $title_a;?>,投票ID:<?php  echo $id;?>,赶快为TA投上一票吧！',
      link:"<?php  echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>",
      imgUrl:'<?php  echo $_W['siteroot'];?>attachment/<?php  echo $avatar;?>',
      trigger: function (res) {
        //alert('用户点击分享到朋友圈');
      },
      success: function (res) {
        window.location.href ='<?php  echo $this->createmobileUrl('share',array('do'=>'share', 'id'=>$id, 'rid'=>$rid, 'from'=>'item'));?>';//分享成功回调
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

</div>				
</div>
</div>
</div>						

        <div style="text-align: center; font-size: 15px; margin-top: 0px;">
        <?php  echo $title;?> @<?php  echo $_W['account']['name'];?>
        </div>
        <div style="display:none">
<?php  echo htmlspecialchars_decode($cnzz);?>
        </div>

        </br>
        </br>
        </br>	
        </br>	
        </br>	





<!--底栏导航开始  -->

<div class="lapiao">


	<a href="<?php  echo $this->createmobileUrl('index',array('do'=>'index', 'id'=>$rid))?>" class="l">返回主页</a>
	<a href="#" onclick="document.getElementById('mcover').style.display='block';" class="r">给TA拉票</a>
     <div id="mcover" onclick="weChat()" style="display:none;">
              <img src="http://img.pccoo.cn/wx/vote/images/guide.png" />
     </div>

    <div class="add" id="id"><div class="i"><i><a style="width: 40%; height: 35px;"  href="<?php  echo $votelink;?>"><img src="http://img.pccoo.cn/wx/vote/images/xin.png"></i>投票</div></a></div>
</div>	

<script type="text/javascript">
function btn_get_click() {
    var xmlHttp = window.XMLHttpRequest ? 
    new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
    xmlHttp.open("get", "<?php  echo $votelink;?>" );
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            if(xmlHttp.responseText == '1'){
            alert("请仔细阅读活动说明");
            location.href='<?php  echo $follow_url;?>';
            }else if(xmlHttp.responseText == '2'){
            alert("活动还未开始");
            location.href='<?php  echo $follow_url;?>';
            }else if(xmlHttp.responseText == '3'){
            alert("活动已经结束");
            }else if(xmlHttp.responseText == '4'){
            alert("您已经投过了，同一用户只能投票一次!");
            }else if(xmlHttp.responseText == '5'){
            alert("您已经投过啦，每天可投一次,明天再来吧!");
            }else if(xmlHttp.responseText == '6'){
            alert("您今天已达投票上限,明天再来吧!");
            }else if(xmlHttp.responseText == '7'){
            alert("还未审核通过，禁止投票！");
            }else if(xmlHttp.responseText == '8'){
            alert("投票成功，感谢您的支持！");
            }
        }
    }
    xmlHttp.send(null);
}
</script>
<!--底栏导航介绍  -->


<div id="plug-wrap" onClick="closeall()" style="display: none;"></div>	
	
<script>
function displayit(n){
	var count = document.getElementById("top_menu").getElementsByTagName("ul").length;	
	for(i=0;i<count;i++){
		if(i==n){
		 if(document.getElementById("top_menu").getElementsByTagName("ul").item(n).style.display=='none'){
			 document.getElementById("top_menu").getElementsByTagName("ul").item(n).style.display='';
			 document.getElementById("plug-wrap").style.display='';
			}else{
				 document.getElementById("top_menu").getElementsByTagName("ul").item(n).style.display='none';
				  document.getElementById("plug-wrap").style.display='none';
			}
		}else{
			document.getElementById("top_menu").getElementsByTagName("ul").item(i).style.display='none';
		}
	}
}
function closeall(){
	var count = document.getElementById("top_menu").getElementsByTagName("ul").length;	
	for(i=0;i<count;i++){
		 document.getElementById("top_menu").getElementsByTagName("ul").item(i).style.display='none';
	}
	 document.getElementById("plug-wrap").style.display='none';
}

document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
WeixinJSBridge.call('hideToolbar');
});
</script> 

</body>
</html>