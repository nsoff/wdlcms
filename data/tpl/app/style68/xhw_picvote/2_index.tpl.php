<?php defined('IN_IA') or exit('Access Denied');?>﻿<!doctype html>
<html>
<head>
<meta charset="utf-8"/>
<title><?php  echo $title;?></title>
<meta name="format-detection" content="telephone=no">
<meta content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
<meta name="apple-mobile-web-app-title" content="">
<meta name="apple-mobile-web-app-capable" content="yes">
<script type="text/javascript" src="../addons/xhw_picvote/template/mobile/skjs/jquery.js"></script>
<script type="text/javascript" src="../addons/xhw_picvote/template/mobile/skjs/common.js"></script>
<link href="../addons/xhw_picvote/template/mobile/skcss/style.css" type="text/css" rel="stylesheet"/>
<link type="text/css" rel="stylesheet" href="../addons/xhw_picvote/template/mobile/skcss/common.mobile.css">
<script type="text/javascript" src="../addons/xhw_picvote/template/mobile/skjs/cascade.js"></script>
<script type="text/javascript" src="../addons/xhw_picvote/template/mobile/skjs/swipe.js"></script>
<link href="../addons/xhw_picvote/template/mobile/skcss/992779.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../addons/xhw_picvote/template/mobile/skcss/16701464.js"></script>
<script type="text/javascript" src="../addons/xhw_picvote/template/mobile/skcss/1548170.masonry.min.js"></script>
<script type="text/javascript" src="../addons/xhw_picvote/template/mobile/skcss/3714123.js"></script>



<link type="text/css" rel="stylesheet" href="../addons/xhw_picvote/css/xzw.css">
<link type="text/css" rel="stylesheet" href="../addons/xhw_picvote/css/style.css">


<style type="text/css">
.time-item strong{background:#C71C60;color:#fff;line-height:28px;font-size:13px;font-family:Arial;padding:0 5px;margin-right:5px;border-radius:5px;box-shadow:0px 0px 0px rgba(0,0,0,0.2);}
#day_show{float:left;line-height:28px;color:#c71c60;font-size:13px;margin:0 5px;font-family:Arial, Helvetica, sans-serif;}
.item-title .unit{background:none;line-height:28px;font-size:20px;padding:0 5px;float:left;}
.search_box{padding-left: 5px;padding-right:5px;position: relative;height: 32px;overflow: hidden;}
.search_box .logo_img{position: absolute;width: 45px;height: 19px;left: 10px;top: 15px;}
.search_box .search{border:0px solid #009a74;height: 32px;line-height:32px;border-radius: 4px;padding: 0 40px 0 8px;position: relative;background: #fff;display:block;}
.search_box .search .text{width: 100%;border:none;height: 20px;line-height: 20px;outline: none;font-size: 12px;font-family: "Microsoft Yahei";padding:5px 0;color:#b6b7b9;display:block;}
.search_box .search .submit{width: 94px;line-height:94px;height: 32px;position: absolute;right: 0px;top: 0px;background:#fff url(../addons/xhw_picvote/template/mobile/skimages/bbbs.jpg) no-repeat;background-size: 94px 32px;border:none;border-radius: 1px;}
.search_box_focus{padding-left: 65px;}

.search_list{width: 100%;position: absolute;left: 0;top: 46px;border-top: 1px solid #dcdcdc;z-index: 2000;background-color: #fff;box-shadow: 0 1px 3px #ccc;padding-bottom: 10px;display:none;}
.search_list ul{margin-bottom: 10px;}
.search_list ul li{padding: 0 10px;}
.search_list ul li a{display: block;height: 44px;line-height: 44px;border-bottom: 1px solid #e5e5e5;color:#323232;}
.search_list ul li a .num{float: right;color: #646464;}
.search_list ul li:last-child{border-bottom: 1px solid #e5e5e5;}
.search_list ul li:last-child a{border-bottom: 0;}
.search_list .clear_search{display: block;width: 86%;margin: 0 auto;height: 32px;text-align: center;line-height: 32px;border:1px solid #dcdcdc;}
.p4 {left:0px;height: 49px;background-color: #444;width: 100%;text-align: center;position: fixed;bottom: 0px;}
.p4 a{line-height:49px; color:#fff; font-size:14px; text-decoration:none; }

div.RoundedCorner{background: #CD0B0B;width:96%;font-size:12px;margin:0 auto;} 
b.rtop, b.rbottom{display:block;background: #FFF} 
b.rtop b, b.rbottom b{display:block;height: 1px;overflow: hidden; background: #CD0B0B} 
b.r1{margin: 0 5px} 
b.r2{margin: 0 3px} 
b.r3{margin: 0 2px} 
b.rtop b.r4, b.rbottom b.r4{margin: 0 1px;height: 2px} 
body { margin-bottom:60px !important; }
a, button, input { -webkit-tap-highlight-color:rgba(255, 0, 0, 0); }
ul, li { list-style:none; margin:0; padding:0 }
.top_bar { position: fixed; z-index: 900; bottom: 0; left: 0; right: 0; margin: auto; font-family: Helvetica, Tahoma, Arial, Microsoft YaHei, sans-serif; }
.top_menu { display:-webkit-box; border-top: 1px solid #3D3D46; display: block; width: 100%; background: rgba(255, 255, 255, 0.7); height: 48px; display: -webkit-box; display: box; margin:0; padding:0; -webkit-box-orient: horizontal; background: -webkit-gradient(linear, 0 0, 0 100%, from(#697077), to(#3F434E), color-stop(60%, #464A53)); box-shadow: 0 1px 0 0 rgba(255, 255, 255, 0.3) inset; }
.top_bar .top_menu>li { -webkit-box-flex:1; background: -webkit-gradient(linear, 0 0, 0 100%, from(rgba(0, 0, 0, 0.1)), color-stop(50%, rgba(0, 0, 0, 0.3)), to(rgba(0, 0, 0, 0.4))), -webkit-gradient(linear, 0 0, 0 100%, from(rgba(255, 255, 255, 0.1)), color-stop(50%, rgba(255, 255, 255, 0.1)), to(rgba(255, 255, 255, 0.15))); ; -webkit-background-size:1px 100%, 1px 100%; background-size:1px 100%, 1px 100%; background-position: 1px center, 2px center; background-repeat: no-repeat; position:relative; text-align:center; }
.top_menu li:first-child { background:none; }
.top_bar .top_menu>li>a { height:48px; display:block; text-align:center; color:#FFF; text-decoration:none; text-shadow: 0 1px rgba(0, 0, 0, 0.3); -webkit-box-flex:1; }
.top_bar .top_menu>li>a label { overflow:hidden; margin: 0 0 0 0; font-size: 12px; display: block !important; line-height: 18px; text-align: center; }
.top_bar .top_menu>li>a img { padding: 3px 0 0 0; height: 24px; width: 24px; color: #fff; line-height: 48px; vertical-align:middle; }
.top_bar li:first-child a { display: block; }
.menu_font { text-align:left; position:absolute; right:10px; z-index:500; background: -webkit-gradient(linear, 0 0, 0 100%, from(#697077), to(#3F434E), color-stop(60%, #464A53)); border-radius: 5px; width: 120px; margin-top: 10px; padding: 0; box-shadow: 0 1px 5px rgba(0, 0, 0, 0.3); }
.menu_font.hidden { display:none; }
.menu_font { top:inherit !important; bottom:60px; }
.menu_font li a { height:40px; margin-right: 1px; display:block; text-align:center; color:#FFF; text-decoration:none; text-shadow: 0 1px rgba(0, 0, 0, 0.3); -webkit-box-flex:1; }
.menu_font li a { text-align: left !important; }
.top_menu li:last-of-type a { background: none; }
.menu_font:after { top: inherit!important; bottom: -6px; border-color: #3F434E rgba(0, 0, 0, 0) rgba(0, 0, 0, 0); border-width: 6px 6px 0; position: absolute; content: \"\"; display: inline-block; width: 0; height: 0; border-style: solid; left: 80%; }
.menu_font li { border-top: 1px solid rgba(255, 255, 255, 0.1); border-bottom: 1px solid rgba(0, 0, 0, 0.2); }
.menu_font li:first-of-type { border-top: 0; }
.menu_font li:last-of-type { border-bottom: 0; }
.menu_font li a { height: 40px; line-height: 40px !important; position: relative; color: #fff; display: block; width: 100%; text-indent: 10px; white-space: nowrap; text-overflow: ellipsis; overflow: hidden; }
.menu_font li a img { width: 20px; height:20px; display: inline-block; margin-top:-2px; color: #fff; line-height: 40px; vertical-align:middle; }
.menu_font>li>a label { padding:3px 0 0 3px; font-size:14px; overflow:hidden; margin: 0; }
#menu_list0 { right:0; left:10px; }
#menu_list0:after { left: 20%; }
#sharemcover { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.7); display: none; z-index: 20000; }
#sharemcover img { position: fixed; right: 18px; top: 5px; width: 260px; height: 180px; z-index: 20001; border:0; }
.top_bar .top_menu>li>a:hover, .top_bar .top_menu>li>a:active { background-color:#333; }
.menu_font li a:hover, .menu_font li a:active { background-color:#333; }
.menu_font li:first-of-type a { border-radius:5px 5px 0 0; }
.menu_font li:last-of-type a { border-radius:0 0 5px 5px; }
#plug-wrap { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0); z-index:800; }
#cate18 .device {bottom: 49px;}
#cate18 #indicator {bottom: 240px;}
#cate19 .device {bottom: 49px;}
#cate19 #indicator {bottom: 330px;}
#cate19 .pagination {bottom: 60px;}


.w-index-search .search-input-wrap {
    background: none repeat scroll 0% 0% #FFF;
    position: relative;
    width: 100%;
    height: 35px;
    overflow: hidden;
}

.w-index-search .search-input-wrap input {
    display: block;
    height: 100%;
    width: 100%;
    box-shadow: none;
    color: #303030;
    padding: 0px 0px 0px 10px;
    border: 1px solid #FF5A84;
    box-sizing: border-box;
}
input, textarea {
    border-radius: 0px;
}
button, input, select, textarea {
    font-family: inherit;
    font-size: 100%;
    vertical-align: middle;
}
.w-index-search .search-input-wrap button {
    cursor: pointer;
    display: block;
    width: 49px;
    height: 100%;
    position: absolute;
    right: 0px;
    top: 0px;
    text-indent: -9999px;
    overflow: hidden;
    border-width: 0px 0px 0px 1px;
    border-style: none none none solid;
    -moz-border-top-colors: none;
    -moz-border-right-colors: none;
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    border-image: none;
    background-image: url("http://newebapp2.nuomi.bdimg.com/static/list/widget/index_search/img/icon-search_6d482fd.png");
    background-position: center center;
    background-repeat: no-repeat;
    background-size: 17px 17px;
    border-color: -moz-use-text-color -moz-use-text-color -moz-use-text-color rgb(65, 212, 87);
    background-color: #FF5A84;
}
button, input, select, textarea {
    font-family: inherit;
    font-size: 100%;
    vertical-align: middle;
}



</style>
</head>
<body style='background-color:#3A0255'>


  <div class="banner">
    <ul>
	
    <?php  for($i=0; $i<count($adimg);$i++)if(!empty($adimg[$i]))echo"<li><a href=\"".$adimglink[$i]."\"><img src=\"../attachment/".$adimg[$i]."\" style=\"width:100%;\" /></a></li>";?>   
	
    </ul>
  </div>
	
	
<div class="tongji">
	<ul>
    	<li>参赛选手<br><span><?php  echo $total;?></span></li>
    	<li>累计投票<br><span><?php  echo $lognum;?></span></li>
    	<li>参与人数<br><span><?php  echo $viewnum;?></span></li>
    </ul>
</div>	
	

<div class="con">
	<p class="tips"><i>投票活动说明</i></p>
    <div class="neirong"><?php  echo htmlspecialchars_decode($rule)?><!-- <a href="" class="more">[更多]</a> --></div>
    	

      <div style="padding-top: 20px;" class="btn_box">
			<a class="button form-sub" href="<?php  echo $this->createmobileUrl('reg',array('do'=>'reg', 'id'=>$id))?>">立即报名</a>
		</div>

</div>



	<script>(function(){var A=$('#menu');$('#header dd span').click(function(){if(A.css('display')=='none') A.show();else A.hide()})})();</script>
	
	
	
		<div style="border-radius: 0px; margin-top: -40px; border-bottom: 10px solid rgb(226, 33, 111); background: none repeat scroll 0% 0% rgba(254, 254, 254, 1);" class="c_box box">
			<div class="tongji">
	<ul>
    	<h3 style="background: none repeat scroll 0% 0% rgb(183, 16, 104); border-top: 1px dotted rgb(247, 249, 252);">
    		<strong style="font-size: 18px;" class="fc1">朋友圈人气王</strong></h3> </br>
    </ul>
</div>
			
			<!-- <strong style="color: rgb(135, 129, 130); font-size: 15px; font-weight: 200;" class="fc1">人气王是安装选手投票多少进行排序</strong> -->
			<div style="height: 180px;" class="reclist">
				<ul style="width: 570px; margin-left: 0px;" class="pic">
				<?php  if(is_array($toplist)) { foreach($toplist as $row) { ?>
				<li><a id="rp_1" href="<?php  echo $this->createmobileUrl('item',array('do'=>'item', 'id'=>$row['id']))?>">
                <img src="../attachment/<?php  echo $row['avatar'];?>"/>
                <p><span>编号:【<?php  echo $row['id'];?>】</span></p>
				
		          <span> 姓名:【<?php  echo $row['nickname'];?>】</span>
				</a>
				</li>
				<?php  } } ?>
				</ul>
			</div>
		</div>
		<script>$(function(){
	$(".reclist ul").css({"width":$(".reclist").find("li").length*190});
	var _scrolling=setInterval("AutoScroll()",syTime);
	$(".appslide").hover(function(){
		clearInterval(_scrolling);
	},function(){
		_scrolling=setInterval("AutoScroll()",syTime);
	});
});
		</script>
		<div style="background-color: rgba(138, 27, 125, 0.58);" class="adb_c_1">
		
	            <div style="padding-left: 4%; border-bottom: 2px dotted #3A0255; padding-bottom: 10px;padding-top: 10px;" class="btns clearfix">
            	<a href="<?php  echo $this->createmobileUrl('top',array('do'=>'top', 'id'=>$id))?>">排行榜</a>
				      <a href="<?php  echo $submit_url;?>">活动说明</a>
                <a href="<?php  echo $this->createmobileUrl('my',array('do'=>'my', 'id'=>$id))?>">我的投稿</a>
                 </div>	
         
   

</div>



<section  class="content">
	


<section class="w-index-search">
<form style="margin: 6px;margin-bottom: 15px;" id="index_search_form" method="get" action="" target="_parent">
<div class="search-input-wrap">
<input style="color: rgb(64, 64, 64);line-height:30px; " id="id" name="id" type="text" value="" placeholder="找不到投票照片?试试搜索ID或名字" class="keyword text" onkeydown="this.style.color='#404040'" autocomplete="off">
<input type="submit" value="" class="submit">
<input type="hidden" name="c" value="entry" />
<input type="hidden" value="item" name="do">
<input type="hidden" value="xhw_picvote" name="m">
<input type="hidden" value="<?php  echo $id;?>" name="rid">
<input type="hidden" value="<?php  echo $_W['uniacid'];?>" name="i">

<i id="j-clear-input"></i>
<button type="submit" class="j-search-submit">搜索</button>
</div>
<div class="j-search-suggestion search-suggestion"></div>
</form>
</section>


	
	<div class="blank10"></div>
	<div id="pageCon" class="match_page masonry">

		    <ul class="list_box masonry clearfix">
			<?php  if(is_array($list)) { foreach($list as $row) { ?>				
			<li class="picCon">

				<div class="">
				
					<a href="<?php  echo $this->createmobileUrl('item',array('do'=>'item', 'id'=>$row['id']))?>"><img src="../attachment/<?php  echo $row['avatar'];?>" alt=""></a>
					<p class="clearfix"><span class="fl"><em style="color: #187E4F;" class="cb"><?php  echo $row['id'];?>号:<?php  echo $row['nickname'];?></em></span><span class="fr"><em class="pink"><?php  echo $row['num'];?></em>票</span></p>
					<a href="<?php  echo $this->createmobileUrl('item',array('do'=>'item', 'id'=>$row['id']))?>">马上投票</a>

				</div>
				 	
			 </li>
             <?php  } } ?> 
			 </ul>

    </div>

		
	<div class="blank20"></div>	 
			<!--分页代码-->		

			<div class="c_inner">
				<script>setpli();$(window).resize(function(){setpli()});</script>
				<div class="showpage">
					<?php  if($pindex== '1') { ?>
					<?php  if($pindex+1<=$pageend) { ?>
					<em>第 <?php  echo $pindex;?> 页</em>
					<a href='<?php  echo $this->createmobileUrl('index',array('do'=>'index', 'id'=>$_GPC['id'], 'page'=>$pindex+1))?>'>下 一 页</a>
					<?php  } else { ?>
					<em>第 <?php  echo $pindex;?> 页</em>
					<?php  } ?>
					<?php  } else { ?>
					<?php  if($pindex+1>=$pageend) { ?>
					<a href='<?php  echo $this->createmobileUrl('index',array('do'=>'index', 'id'=>$_GPC['id'], 'page'=>$pindex-1))?>'>上 一 页</a>
					<em>第 <?php  echo $pindex;?> 页</em>
					<?php  } else { ?>
					<a href='<?php  echo $this->createmobileUrl('index',array('do'=>'index', 'id'=>$_GPC['id'], 'page'=>$pindex-1))?>'>上 一 页</a>
					<em>第 <?php  echo $pindex;?> 页</em>
					<a href='<?php  echo $this->createmobileUrl('index',array('do'=>'index', 'id'=>$_GPC['id'], 'page'=>$pindex+1))?>'>下 一 页</a>
					<?php  } ?>
					<?php  } ?>
				</div>

	
</section>	 


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
        window.location.href ='<?php  echo $this->createmobileUrl('share',array('do'=>'share', 'id'=>$id, 'rid'=>$id, 'from'=>'index'));?>';//分享成功回调
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
        window.location.href ='<?php  echo $this->createmobileUrl('share',array('do'=>'share', 'id'=>$id, 'rid'=>$id, 'from'=>'index'));?>';//分享成功回调
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
        <div style="text-align:center;margin-top:10px;">
        ©<?php  echo $_W['account']['name'];?>技术支持
        </div>

<div style="display:none">
<?php  echo htmlspecialchars_decode($cnzz);?>
		</div>
		
		

<ul class="nav">


	<li class="cur"><a href="<?php  echo $this->createmobileUrl('reg',array('do'=>'reg', 'id'=>$id))?>">我要参赛</a></li>
	<li id="ssuo" ><a href="<?php  echo $submit_url;?>">活动规则</a></li>
	<li><a href="<?php  echo $this->createmobileUrl('top',array('do'=>'top', 'id'=>$id))?>">排行榜</a></li>
  <li><a href="<?php  echo $this->createmobileUrl('my',array('do'=>'my', 'id'=>$id))?>">我的主页</a></li>

     <div id="mcover" onclick="weChat()" style="display:none;">
              <img src="http://img.pccoo.cn/wx/vote/images//guide.png">
     </div>
</ul>



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


<script type="text/javascript">
	$(function(){
		$('.do_vote').live('click', function(e){
			e.preventDefault();
			var self = $(this);
			$.ajax({
				type: "GET",
				url: "mobile.php?act=module&name=popvote&do=ajax&weid=6",
				data: {baby_id:self.data('baby_id'),rule_id:self.data('rule_id')},
				beforeSend: function() {
					$('#voting_content').empty();
					$('#voting_content').html("亲，正在提交中～");
					$('#voting').show();
				},
				success: function(data) {
					var res = JSON.parse(data);
					var msg = res.msg;
					if (res.status == 101) {
						$('#voting').hide();
						$('#guanzhu').show();
					} else if (res.status == 102) {
						$('#subcontent').empty();
						$('#subcontent').append(msg);
						$('#voting').hide();
						$('#voted').show();
					} else if (res.status == 100) {
						$('#voting_content').empty();
						$('#voting_content').html(res.msg);
						$('#voting').show();
					}

				}
			});
		});
		var $container = $('#pageCon ul');

		$container.imagesLoaded(function(){
			$container.masonry({
				itemSelector: '.picCon'
			});
		});
	});
</script>




		</body>
		</html>