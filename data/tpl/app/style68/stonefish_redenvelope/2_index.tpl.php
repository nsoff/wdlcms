<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta content="Croaker" name="author">
<meta name="Description" content="<?php  echo $reply['description'];?>" />
<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
<meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
<meta content="no-cache" http-equiv="pragma">
<meta content="0" http-equiv="expires">
<meta content="telephone=no, address=no" name="format-detection">
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<link href="../addons/stonefish_scratch/template/css/square.css" rel="stylesheet" type="text/css" />
<title><?php  echo $reply['title'];?></title>
<link rel="stylesheet" type="text/css"	href="../addons/stonefish_redenvelope/template/css/al_base.css">
<link href="../addons/stonefish_redenvelope/template/css/emoji.css" rel="stylesheet"	type="text/css" />
</head>
<style>
body {
	background: <?php  echo $reply['bgcolor'];?>;
	color: <?php  echo $reply['fontcolor'];?>;
}
.btnLink {
	background: <?php  echo $reply['btncolor'];?>;
	color: <?php  echo $reply['btnfontcolor'];?>;
}
a:link,a:visited,a:hover,a:active {color:<?php  echo $reply['btnfontcolor'];?>;}
.money .btnLink,.money1 .btnLink {
	background: <?php  echo $reply['txcolor'];?>;
	color: <?php  echo $reply['txfontcolor'];?>;
}
.wrap .helpLink {
	background: <?php  echo $reply['txcolor'];?>;
	color: <?php  echo $reply['txfontcolor'];?>;
}
</style>
<body>
	<div style="max-width:100%">
		<?php  if(!empty($reply['adpic'])) { ?><?php  if(!empty($reply['adpicurl'])) { ?><a href="<?php  echo $reply['adpicurl'];?>"><?php  } ?><img id="top_img" style="max-width: 100%;height: auto;width: auto\9;"  src="<?php  echo toimage($reply['adpic'])?>" width="100%" border="0"><?php  if(!empty($reply['adpicurl'])) { ?></a><?php  } ?><?php  } ?>
    </div> 
	<?php  if(!empty($fans)) { ?>
	<div class="prizeHis_1">
		<div class="wrap">
			<div class="money1">
				<div class="num">
					<label>￥</label><span><?php  echo $fans['inpoint']-$fans['outpoint']?></span>
				</div>
				<p class="txt">已放入您的账户</p>
				<?php  if($fans['status']) { ?><a href="<?php  echo $this->createMobileUrl('rule',array('rid'=>$rid))?>" class="btnLink" id="getredenvelope">申请兑换</a><?php  } else { ?><a class="btnLink" id="getredenvelope">兑换金额不足</a><?php  } ?>
			</div>
			<a href="<?php  echo $this->createMobileUrl('rule',array('rid'=>$rid))?>" class="helpLink">活动说明</a>
			<p class="moneyTip"><?php  echo $reply['description'];?></p>
			<a href="javascript:;" class="btnLink" id="shareGuid"><?php  echo $reply['sharebtn'];?></a>
			<a href="<?php  echo $this->createMobileUrl('sort',array('rid'=>$rid,'uid'=>$fans['id']))?>" class="btnLink">查看我的排行</a>
			<a href="<?php  echo $this->createMobileUrl('firendsort',array('rid'=>$rid,'uid'=>$fans['id']))?>" class="btnLink">查看好友动态</a>
		</div>
	</div>
	<div class="maskTip">
		<div class="mask"></div>
		<div class="con_2">
			<div class="tipText"></div>
			<p><img src="<?php  echo toimage($share['share_pic'])?>" width="100%"></p>
			<a href="javascript:;" class="btnLink" id="Close">确定</a>
		</div>
	</div>
	<?php  } else { ?>
	<div class="prizeHis_2">
		<div class="wrap">
			<div class="money">
				<a href="javascript:;" class="btnLink" id="getredenvelope">领取红包</a>
			</div>
			<p class="moneyTip"><?php  echo $reply['description'];?></p>
			<a href="<?php  echo $this->createMobileUrl('rule',array('rid'=>$rid))?>" class="helpLink">活动说明</a>
		</div>
	</div>
	<div class="panel-box" id="panel_box">
        <div class="panel-content" id="panel-content">
            <div class="panel-close" id="panel-close"></div>
            <span class="icon-prize-useless" id="panelimg"></span><br/><div id="cccc" style="font-size:12px;"><?php  echo $profile['nickname'];?>--<?php  echo $reply['ticketinfo'];?></div>
			<div id="result_info"<?php  if(!$isfans) { ?> style="display:none"<?php  } ?>>
			<div id="isfans" style="display:none"><?php  echo $isfans;?></div>
			    <hr class="common-hr" />
                <?php  if($reply['isrealname']) { ?><label><?php  echo $isfansname['0'];?></label><input name="text" class="px" id="realname" value="<?php  echo $profile['realname'];?>" type="text" placeholder="请输入<?php  echo $isfansname['0'];?>"><?php  } ?>
				<?php  if($reply['ismobile']) { ?><label><?php  echo $isfansname['1'];?></label><input name="tel" class="px" id="mobile" value="<?php  echo $profile['mobile'];?>" type="text" placeholder="请输入<?php  echo $isfansname['1'];?>"><?php  } ?>
				<?php  if($reply['isqq']) { ?><label><?php  echo $isfansname['2'];?></label><input name="tel" class="px" id="qq" value="<?php  echo $profile['qq'];?>" type="text" placeholder="请输入<?php  echo $isfansname['2'];?>"><?php  } ?>
				<?php  if($reply['isemail']) { ?><label><?php  echo $isfansname['3'];?></label><input name="email" class="px" id="email" value="<?php  echo $profile['email'];?>" type="text" placeholder="请输入<?php  echo $isfansname['3'];?>"><?php  } ?>
				<?php  if($reply['isaddress']) { ?><label><?php  echo $isfansname['4'];?></label><input name="text" class="px" id="address" value="<?php  echo $profile['address'];?>" type="text" placeholder="请输入<?php  echo $isfansname['4'];?>"><?php  } ?>
				<?php  if($reply['isgender']) { ?><label><?php  echo $isfansname['5'];?></label><select name="gender" id="gender" class="form-control">
						<option value="0"<?php  if($profile['gender']==0) { ?> selected <?php  } ?>>选择<?php  echo $isfansname['5'];?></option>
						<option value="1"<?php  if($profile['gender']==1) { ?> selected <?php  } ?>>男</option>
						<option value="2"<?php  if($profile['gender']==2) { ?> selected <?php  } ?>>女</option>
					</select><?php  } ?>
				<?php  if($reply['istelephone']) { ?><label><?php  echo $isfansname['6'];?></label><input name="text" class="px" id="telephone" value="<?php  echo $profile['telephone'];?>" type="text" placeholder="请输入<?php  echo $isfansname['6'];?>"><?php  } ?>
				<?php  if($reply['isidcard']) { ?><label><?php  echo $isfansname['7'];?></label><input name="text" class="px" id="idcard" value="<?php  echo $profile['idcard'];?>" type="text" placeholder="请输入<?php  echo $isfansname['7'];?>"><?php  } ?>
				<?php  if($reply['iscompany']) { ?><label><?php  echo $isfansname['8'];?></label><input name="text" class="px" id="company" value="<?php  echo $profile['company'];?>" type="text" placeholder="请输入<?php  echo $isfansname['8'];?>"><?php  } ?>
				<?php  if($reply['isoccupation']) { ?><label><?php  echo $isfansname['9'];?></label><input name="text" class="px" id="occupation" value="<?php  echo $profile['occupation'];?>" type="text" placeholder="请输入<?php  echo $isfansname['9'];?>"><?php  } ?>
				<?php  if($reply['isposition']) { ?><label><?php  echo $isfansname['10'];?></label><input name="text" class="px" id="position" value="<?php  echo $profile['position'];?>" type="text" placeholder="请输入<?php  echo $isfansname['10'];?>"><?php  } ?>
                <div id="result_info_tip"></div>
				<div class="btn-layout">
					<input class="btn-confirm" name="确定" id="save-btn" type="button" value="领取红包">
                </div>
            </div>			
        </div>
    </div>
	<?php  } ?>	
	<script type="text/javascript" src="../addons/stonefish_redenvelope/template/js/zepto.min.js"></script>
	<script src="../addons/stonefish_redenvelope/template/js/emoji.js"></script>
	<?php  if(!empty($fans)) { ?>
	<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('jssdk', TEMPLATE_INCLUDEPATH)) : (include template('jssdk', TEMPLATE_INCLUDEPATH));?>
	<script>
		$(function() {
			
			 $("#shareGuid").click(function() {
     	        $(".maskTip").show()
     	    });
     	    $("#Close").click(function() {
     	        $(".maskTip").hide()
     	    });
			// 微信昵称特殊字符处理
			$(".nickname").each(function() {
				var html = $(this).html().trim().replace(/\n/g, '<br/>');
				html = jEmoji.softbankToUnified(html);
				html = jEmoji.googleToUnified(html);
				html = jEmoji.docomoToUnified(html);
				html = jEmoji.kddiToUnified(html);
				$(this).html(jEmoji.unifiedToHTML(html));
			});

			$(".title").click(function() {
				$('.prizeHis_1').hide();
				$('.prizeHis_2').show();
			})
			$(".back").click(function() {
				$('.prizeHis_1').show();
				$('.prizeHis_2').hide();
			});			
		});
	</script>
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
           	$.post('<?php  echo $this->createMobileUrl('get_award', array('rid' => $rid))?>', submitData, function(data) {
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
	<?php  } ?>
</body>
</html>