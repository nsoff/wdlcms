<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php  echo $reply['title'];?></title>
	<meta http-equiv="Expires" Content="-1">
    <meta name="description" content="<?php  echo $reply['description'];?>">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta http-equiv="cleartype" content="on">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="">
    <!-- <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" /> -->
	<script type="text/javascript">
		var phoneWidth = parseInt(window.screen.width);
		var phoneScale = phoneWidth/640;
		var ua = navigator.userAgent;
		if (/Android (\d+\.\d+)/.test(ua)){
			var version = parseFloat(RegExp.$1);
			// andriod 2.3
			if(version>2.3){
				document.write('<meta name="viewport" content="width=640, minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+', target-densitydpi=device-dpi">');
			// andriod 2.3以上
			}else{
				document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
			}
			// 其他系统
		} else {
			document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
		}
	</script>	
    <!-- <meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi"> -->
	<link rel="stylesheet" type="text/css" href="../addons/stonefish_planting/template/css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="../addons/stonefish_planting/template/css/mobile.css?20150303"/>
	<script type="text/javascript" src="../addons/stonefish_planting/template/js/zepto.js"></script>
</head>
<?php  if(!empty($fans) && $choujiang) { ?>
<script type="text/javascript">
<!--
	var SHAKE_THRESHOLD = 3000;
	var INTERVAL = 100;
	var MAXSHAKECOUNT = 100;
	var last_update = 0;
	var x;
	var y;
	var z;
	var last_x;
	var last_y;
	var last_z;
	var lastupdate = 0;
	var shakecount = 0;
	var stop = true;

	function deviceMotionHandler(eventData) {
		var acceleration = eventData.accelerationIncludingGravity;
		var curTime = new Date().getTime();
		var diffTime = curTime -last_update;
		if (diffTime > INTERVAL) {
			last_update = curTime;
			x = acceleration.x;
			y = acceleration.y;
			z = acceleration.z;
			var speed = Math.abs(x + y + z - last_x - last_y - last_z) / diffTime * 10000;
			if (speed > SHAKE_THRESHOLD && shakecount < MAXSHAKECOUNT) {
				if(stop){
				    stop =  false;
				    $.post('<?php  echo $this->createMobileUrl('get_choujiang', array('rid' => $rid,'choujiang' => $seed_num,'fid' => $fans['id'],'from_user' => $page_from_user))?>', function(data) {
				        $("#result_tip").html("<br/><br/>" + data.msg + "<br/><div id='share_miao'>3秒后自动关闭</div>");
				        djstime(3);
				        setTimeout(function () {
				            $("#choujiang").hide();
					        location.reload();
				        },4000);
				        return;			    
			        },"json")
				}
				$("audio")[0].play();
			}
			last_x = x;
			last_y = y;
			last_z = z;
		}
	}	
//-->
</script>
<?php  } ?>
<body><!--  -->
<div class="wrap" ontouchmove="event.preventDefault()">
	<div class="none"><img src="../addons/stonefish_planting/template/images/share.jpg" alt=""></div>
	<img src="../addons/stonefish_planting/template/images/bg.png" alt="" class="img">
	<img src="../addons/stonefish_planting/template/images/land.png" alt="" class="spirit land">
	<img src="../addons/stonefish_planting/template/images/cloud_front.png" alt="" class="spirit cloud">
	<img src="../addons/stonefish_planting/template/images/mountain_1.png" alt="" class="spirit mountain_1">
	<img src="../addons/stonefish_planting/template/images/mountain_2.png" alt="" class="spirit mountain_2">
	<img src="../addons/stonefish_planting/template/images/mountain_3.png" alt="" class="spirit mountain_3">
	<img src="../addons/stonefish_planting/template/images/cloud_far_1.png" alt="" class="spirit cloud_far_1">
	<img src="../addons/stonefish_planting/template/images/cloud_far_2.png" alt="" class="spirit cloud_far_2">
	<img src="../addons/stonefish_planting/template/images/cloud_far_3.png" alt="" class="spirit cloud_far_3">
	<img src="../addons/stonefish_planting/template/images/cloud_near_1.png" alt="" class="spirit cloud_near_1">
	<img src="../addons/stonefish_planting/template/images/cloud_near_2.png" alt="" class="spirit cloud_near_2">
	<img src="../addons/stonefish_planting/template/images/cloud_near_3.png" alt="" class="spirit cloud_near_3">
	<img src="../addons/stonefish_planting/template/images/cloud_mountain_1.png" alt="" class="spirit cloud_mountain">
	<img src="../addons/stonefish_planting/template/images/mountain.png" alt="" class="spirit mountain mountain_d4">
	<img src="../addons/stonefish_planting/template/images/temple.png" alt="" class="spirit temple temple_d4">
	<div class="mask_day mask_d4"></div>
	<img src="../addons/stonefish_planting/template/images/cloud_1.png" alt="" class="spirit cloud_touch">
	<?php  if(!empty($fans) && $choujiang) { ?>
	<div class="panel-box" id="choujiang" style="display: block;background-color: rgba(0,0,0,0.72);">
        <div class="panel-content" id="panel-content" style="height:400px;">
		    <span><img src="../addons/stonefish_planting/template/images/tishi_shake.png" height="90"><img src="../addons/stonefish_planting/template/images/choujiang.png" height="90"></span>
		    <hr class="common-hr" />
		    <div id="result_tip"><?php  echo htmlspecialchars_decode($reply['ticket_information'])?></div>
		</div>
	</div>
	<?php  } ?>
	<?php  if(!empty($fans)) { ?>
	<img src="<?php  echo $seedimg;?>" alt="" class="spirit tree tree_<?php  echo $seednum;?>" style="opacity:1;">
	<div class="tree_shine shine_<?php  echo $seednum;?>">
		<img src="../addons/stonefish_planting/template/images/shine.png" alt="" class="shine1">
		<img src="../addons/stonefish_planting/template/images/shine.png" alt="" class="shine2">
		<img src="../addons/stonefish_planting/template/images/shine.png" alt="" class="shine3">
		<img src="../addons/stonefish_planting/template/images/shine.png" alt="" class="shine4">
		<img src="../addons/stonefish_planting/template/images/shine.png" alt="" class="shine5">
		<img src="../addons/stonefish_planting/template/images/shine.png" alt="" class="shine6">
		<img src="../addons/stonefish_planting/template/images/shine.png" alt="" class="shine7">
	</div>
	<div class="yaoqing" id="shareimg">
		<img src="<?php  echo toimage($share['share_picurl'])?>">
	</div>
	<div class="jifen">
		<img src="../addons/stonefish_planting/template/images/text_jifen.png" alt="" class="fl">
		<span class="num"><span>
	</div>
	<audio preload="auto" id="audio" controls="controls">
	    <source src="../addons/stonefish_planting/template/audio/tree.mp3" type="audio/mpeg">
    </audio>
	<?php  } else { ?>	
	<div class="jifen">
		<a href="javascript:;" id="getredenvelope"><img src="../addons/stonefish_planting/template/images/tree_seed.png" alt="" class="fl"></a>
	</div>
	<div class="panel-box" id="panel_box">
        <div class="panel-content" id="panel-content">
            <div class="panel-close" id="panel-close"></div>
            <span class="icon-prize-useless" id="panelimg"></span><br/>
			<div id="result_info"<?php  if(!$isfans) { ?> style="display:none"<?php  } ?>>
			<div id="isfans" style="display:none"><?php  echo $isfans;?></div>
			    <hr class="common-hr" />
                <?php  if($reply['isrealname']) { ?><div style="float: left;width:100%;"><label><?php  echo $isfansname['0'];?></label><input name="text" class="px" id="realname" value="<?php  echo $profile['realname'];?>" type="text" placeholder="请输入<?php  echo $isfansname['0'];?>"></div><?php  } ?>
				<?php  if($reply['ismobile']) { ?><div style="float: left;width:100%;"><label><?php  echo $isfansname['1'];?></label><input name="tel" class="px" id="mobile" value="<?php  echo $profile['mobile'];?>" type="text" placeholder="请输入<?php  echo $isfansname['1'];?>"></div><?php  } ?>
				<?php  if($reply['isqq']) { ?><div style="float: left;width:100%;"><label><?php  echo $isfansname['2'];?></label><input name="tel" class="px" id="qq" value="<?php  echo $profile['qq'];?>" type="text" placeholder="请输入<?php  echo $isfansname['2'];?>"></div><?php  } ?>
				<?php  if($reply['isemail']) { ?><div style="float: left;width:100%;"><label><?php  echo $isfansname['3'];?></label><input name="email" class="px" id="email" value="<?php  echo $profile['email'];?>" type="text" placeholder="请输入<?php  echo $isfansname['3'];?>"></div><?php  } ?>
				<?php  if($reply['isaddress']) { ?><div style="float: left;width:100%;"><label><?php  echo $isfansname['4'];?></label><input name="text" class="px" id="address" value="<?php  echo $profile['address'];?>" type="text" placeholder="请输入<?php  echo $isfansname['4'];?>"></div><?php  } ?>
				<?php  if($reply['isgender']) { ?><div style="float: left;width:100%;"><label><?php  echo $isfansname['5'];?></label><select name="gender" id="gender" class="form-control">
						<option value="0"<?php  if($profile['gender']==0) { ?> selected <?php  } ?>>选择<?php  echo $isfansname['5'];?></option>
						<option value="1"<?php  if($profile['gender']==1) { ?> selected <?php  } ?>>男</option>
						<option value="2"<?php  if($profile['gender']==2) { ?> selected <?php  } ?>>女</option>
					</select></div><?php  } ?>
				<?php  if($reply['istelephone']) { ?><div style="float: left;width:100%;"><label><?php  echo $isfansname['6'];?></label><input name="text" class="px" id="telephone" value="<?php  echo $profile['telephone'];?>" type="text" placeholder="请输入<?php  echo $isfansname['6'];?>"></div><?php  } ?>
				<?php  if($reply['isidcard']) { ?><div style="float: left;width:100%;"><label><?php  echo $isfansname['7'];?></label><input name="text" class="px" id="idcard" value="<?php  echo $profile['idcard'];?>" type="text" placeholder="请输入<?php  echo $isfansname['7'];?>"></div><?php  } ?>
				<?php  if($reply['iscompany']) { ?><div style="float: left;width:100%;"><label><?php  echo $isfansname['8'];?></label><input name="text" class="px" id="company" value="<?php  echo $profile['company'];?>" type="text" placeholder="请输入<?php  echo $isfansname['8'];?>"></div><?php  } ?>
				<?php  if($reply['isoccupation']) { ?><div style="float: left;width:100%;"><label><?php  echo $isfansname['9'];?></label><input name="text" class="px" id="occupation" value="<?php  echo $profile['occupation'];?>" type="text" placeholder="请输入<?php  echo $isfansname['9'];?>"></div><?php  } ?>
				<?php  if($reply['isposition']) { ?><div style="float: left;width:100%;"><label><?php  echo $isfansname['10'];?></label><input name="text" class="px" id="position" value="<?php  echo $profile['position'];?>" type="text" placeholder="请输入<?php  echo $isfansname['10'];?>"></div><?php  } ?>
                <div id="result_info_tip"></div>
				<div class="btn-layout">
					<input class="btn-confirm" name="确定" id="save-btn" type="button" value="<?php  echo $reply['ticketinfo'];?>">
                </div>
            </div>
        </div>
    </div>
	<?php  } ?>
	<div class="zjmd">
	    <marquee behavior="scroll" scrolldelay="200" height="60">
			<?php  if(is_array($zjmd)) { foreach($zjmd as $zjmdrow) { ?>
				<?php  echo $zjmdrow['realname'];?>领取了[<?php  echo $zjmdrow['zhongzi'];?>]种子&nbsp;&nbsp;摇中了<?php  echo $zjmdrow['prizetype'];?>(<?php  echo $zjmdrow['prizename'];?>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php  } } ?>
        </marquee>
	</div>
	<a href="<?php  echo $this->createMobileUrl('rule',array('rid'=>$rid,'from_user'=>$page_from_user))?>"><img src="../addons/stonefish_planting/template/images/icon_rule.png" alt="" class="btn_rule"></a>
	<?php  if($myaward) { ?><a href="<?php  echo $this->createMobileUrl('exchangelist',array('rid'=>$rid,'uid'=>$fans['id'],'from_user'=>$page_from_user))?>"><img src="../addons/stonefish_planting/template/images/icon_exchange.png" class="exchange"></a><?php  } ?>
</div>
<div id="pop_share"><img src="<?php  echo $share['share_pic'];?>" width="100%" alt="分享到朋友圈"/></div>
	<script type="text/javascript">
	$(function() {	    
		if(<?php  echo $sharenum;?> >= 0){
            setJifen(<?php  echo $sharenum;?>,true);
        }
		$("#shareimg").click(function(){
		   	$("#pop_share").show(500);
	   	});

	   	$("#pop_share").click(function(){
		  	$("#pop_share").hide(500);
	    });
		<?php  if(!empty($fans) && $choujiang) { ?>
		if (window.DeviceMotionEvent) {
			window.addEventListener('devicemotion', deviceMotionHandler, false);
	　　} else{
	　　　　alert('您使用的设备或是浏览器不支持摇一摇功能，如果您是Android手机，您可以用UCWeb、chrome等第三方浏览器。')
	　　}
		<?php  } ?>
	});
	function setJifen(num,isfirst){//设置积分
        var _strNum = String(num);
        var _jifen = '';
		var htmlpath = '../addons/stonefish_planting/template/';
        for(var i=0; i<_strNum.length; i++){
            _jifen += '<span><img src="'+htmlpath+'images/num_'+_strNum[i]+'.png" alt=""></span>';
        }
        $('.jifen .num').html(_jifen);
    }
	</script>
	<?php  if(!empty($fans)) { ?>
	<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('jssdk', TEMPLATE_INCLUDEPATH)) : (include template('jssdk', TEMPLATE_INCLUDEPATH));?>
	<?php  } else { ?>
	<script type="text/javascript">
	$("#getredenvelope").click(function () {
		$("#panel_box").show();
		$("#panel-content").css({"height": "<?php  echo $isfansh;?>px"});
		$("#panelimg").css({"background-image": "url(<?php  echo $profile['avatar'];?>)","border-radius":"45px"});
	})
	$("#panel-close").click(function(){
		$("#panel_box").hide();
	});
	$("#savebtn").click(function(){
		$("#panel_box").hide();
	});
	$("#save-btn").bind("click",function () {
            var btn = $(this);
            <?php  if($reply['isrealname']) { ?>
			var realname = $("#realname").val();
            if (realname == '') {
				$("#result_info_tip").text("请输入<?php  echo $isfansname['0'];?>");
                return
            }
			var partten = /[\u4e00-\u9fa5]/g;
            if(!partten.test(realname)){
               $("#result_info_tip").text("请输入正确的<?php  echo $isfansname['0'];?>");
			   return;
            }
			<?php  } ?>
			<?php  if($reply['ismobile']) { ?>
			var mobile = $("#mobile").val();
            if (mobile == '') {
                $("#result_info_tip").text("请输入<?php  echo $isfansname['1'];?>");
                return
            }
			var partten = /^1\d{10}$/;
            if(!partten.test(mobile)){
               $("#result_info_tip").text("请输入正确的<?php  echo $isfansname['1'];?>");
			   return;
            }
			<?php  } ?>
			<?php  if($reply['isqq']) { ?>
			var qq = $("#qq").val();
            if (qq == '') {
                $("#result_info_tip").text("请输入<?php  echo $isfansname['2'];?>");
                return
            }			
            var partten = /^[1-9]{1}\d{4,11}$/;
            if(!partten.test(qq)){
               $("#result_info_tip").text("请输入正确的<?php  echo $isfansname['2'];?>");
			   return;
            }
			<?php  } ?>
			<?php  if($reply['isemail']) { ?>
			var email = $("#email").val();
            if (email == '') {
                $("#result_info_tip").text("请输入<?php  echo $isfansname['3'];?>");
                return
            }
			var partten = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
            if(!partten.test(email)){
               $("#result_info_tip").text("请输入正确的<?php  echo $isfansname['3'];?>");
			   return;
            }
			<?php  } ?>
			<?php  if($reply['isaddress']) { ?>
			var address = $("#address").val();
            if (address == '') {
                $("#result_info_tip").text("请输入<?php  echo $isfansname['4'];?>");
                return
            }
			<?php  } ?>
			<?php  if($reply['isgender']) { ?>
			var gender = $("#gender").val();
            if (gender == '0') {
                $("#result_info_tip").text("请选择<?php  echo $isfansname['5'];?>");
                return
            }
			<?php  } ?>
			<?php  if($reply['istelephone']) { ?>
			var telephone = $("#telephone").val();
            if (telephone == '') {
                $("#result_info_tip").text("请输入<?php  echo $isfansname['6'];?>");
                return
            }
			<?php  } ?>
			<?php  if($reply['isidcard']) { ?>
			var idcard = $("#idcard").val();
            if (idcard == '') {
                $("#result_info_tip").text("请输入<?php  echo $isfansname['7'];?>");
                return
            }
			<?php  } ?>
			<?php  if($reply['iscompany']) { ?>
			var company = $("#company").val();
            if (company == '') {
                $("#result_info_tip").text("请输入<?php  echo $isfansname['8'];?>");
                return
            }
			<?php  } ?>
			<?php  if($reply['isoccupation']) { ?>
			var occupation = $("#occupation").val();
            if (occupation == '') {
                $("#result_info_tip").text("请输入<?php  echo $isfansname['9'];?>");
                return
            }
			<?php  } ?>
			<?php  if($reply['isposition']) { ?>
			var position = $("#position").val();
            if (position == '') {
                $("#result_info_tip").text("请输入<?php  echo $isfansname['10'];?>");
                return
            }
			<?php  } ?>
            var submitData = {
                    code: $("#sncode").text(),
                    <?php  if($reply['isrealname']) { ?>realname: realname,<?php  } ?>
					<?php  if($reply['ismobile']) { ?>mobile: mobile,<?php  } ?>
					<?php  if($reply['isqq']) { ?>qq: qq,<?php  } ?>
					<?php  if($reply['isemail']) { ?>email: email,<?php  } ?>
					<?php  if($reply['isaddress']) { ?>address: address,<?php  } ?>
					<?php  if($reply['isgender']) { ?>gender: gender,<?php  } ?>
					<?php  if($reply['istelephone']) { ?>telephone: telephone,<?php  } ?>
					<?php  if($reply['isidcard']) { ?>idcard: idcard,<?php  } ?>
					<?php  if($reply['iscompany']) { ?>company: company,<?php  } ?>
					<?php  if($reply['isoccupation']) { ?>occupation: occupation,<?php  } ?>
					<?php  if($reply['isposition']) { ?>position: position,<?php  } ?>
            };
           	$.post('<?php  echo $this->createMobileUrl('get_award', array('rid' => $rid,'from_user' => $page_from_user,'seedid' => $seedid))?>', submitData, function(data) {
			if (data.success == 1) {
				$("#result_info").html("<br/><br/>" + data.msg + "<br/><div id='share_miao'>3秒后自动关闭</div>");
				djstime(3);
				setTimeout(function () {
				    $("#panel_box").hide();
					location.reload();
				},4000)
				return
			} else {
			    $("#result_info_tip").text(data.msg);
				return
			}
			},"json")
    });	
	</script>
	<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('jssdkhide', TEMPLATE_INCLUDEPATH)) : (include template('jssdkhide', TEMPLATE_INCLUDEPATH));?>
	<?php  } ?>
	<script type="text/javascript">
	/*倒计时*/
    function djstime(miao){
	var e1=$("#share_miao").first();
	var i=miao;
	var interval=setInterval(function(){
		e1.html(i+"秒自动关闭");
		$("#share_miao").css("line-height","35px");
		i--;
		if(i<0){
			$("#share_miao").css({cursor:"pointer"});
			$("#share_miao").css("line-height","18px");						
			clearInterval(interval);	
		}
	},1000);
    }
	</script>
</body>
</html>