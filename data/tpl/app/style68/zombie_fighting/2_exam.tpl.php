<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,minimum-scale=1,user-scalable=no,maximum-scale=1,initial-scale=1"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
<meta name="format-detection" content="telephone=no"/>
<link href="../addons/zombie_fighting/template/style/css/common.css" rel="stylesheet" type="text/css">
<link href="../addons/zombie_fighting/template/style/css/exam.css" rel="stylesheet" type="text/css">
<style>
body{background-color: #A19A8C;}
.top,.question{z-index: 2;position: relative;}
.top{position: relative;height: 130px;}
.time{font-size: 40px;color: #b40000;text-align: center;width: 100%;position: absolute;top: 20px;}
.index{position: absolute;color: #b40000;top: 75px;left: 80px;font-size: 10px;}
.index strong{font-size: 12px;}
.score{position: absolute;top: 70px;left: 126px;font-size: 20px;}
.question .title{
	font-size: 20px;
	text-align: left;
	overflow: hidden;
	text-overflow: ellipsis;
	padding: 0 10px;
	line-height: 26px;
}
.question .options{margin-top: 10px;}
.question .option{position: relative;height: 40px;}
.question .option .text{position: relative;line-height: 40px;overflow: hidden;}
.question .option .i{float: left;margin-left: 20px;}
.question .option .otext{
	margin-left: 40px;
	overflow: hidden;
	max-width: 560px;
	height: 40px;
}
.question .option .oimg,.question .option .oimg-sel{position: absolute;top: 4px;left: 10px;width: 370px;}
.question .option .oimg-sel{display: none;}
.question .option-sel .oimg{display: none;}
.question .option-sel .oimg-sel{display: block;}
.result-timeout .timg{
	margin-left: -40px;
}

.question .option .i {
float: left;
margin-left: 28px;
padding-top: 4px;
}          .question .option .otext {
margin-left: 55px;
overflow: hidden;
max-width: 560px;
height: 40px;
padding-top: 4px;
}
#submit{
	width: 100px;
	margin: 10px auto 0px;
	display: none;
}
.container {
    border-color: #ebebeb;
    border-style: solid;
    border-width: 1px;
    float: none;
    height: 30%;
    margin-top: 0;
    overflow: hidden;
    padding: 1px 20px 1px 38px;
    position: relative;
}
</style>
</head>
<body>
	<div class="wrapper"> 

		<img class="bg" src="../addons/zombie_fighting/template/style/images/bg_exam.jpg" />
		<div class="top">
			<div class="time"></div>
			<div class="score"><?php  echo $question['figure'];?> 积分</div>
		</div>
		
		<div class="question">
			<div class="title"><?php  echo $question['question'];?></div>
			<input type="hidden" name="fid" id="fid" value="<?php  echo $flight_setting['id'];?>" />
			<input type="hidden" name="qestionid"  id="qestionid" value="<?php  echo $question['id'];?>" />
			<input type="hidden" name="answerNum"  id="answerNum" value="<?php  echo $answerNum;?>" />
            <input type="hidden" name="openid"  id="openid" value="<?php  echo $fromuser;?>" />
			
			<div class="options">
				<div class="option" data-value="A">
					<img class="oimg" src="../addons/zombie_fighting/template/style/images/option_bg_green.png" />
					<img class="oimg-sel" src="../addons/zombie_fighting/template/style/images/option_sel_bg_green.png" />
					<div class="text">
					<div class="i">A</div>
					<div class="otext"> <?php  echo $question['optionA'];?></div>
					</div>
				</div>
				
				<div class="option" data-value="B">
					<img class="oimg" src="../addons/zombie_fighting/template/style/images/option_bg_blue.png" />
					<img class="oimg-sel" src="../addons/zombie_fighting/template/style/images/option_sel_bg_blue.png" />
					<div class="text">
					<div class="i">B</div>
					<div class="otext"> <?php  echo $question['optionB'];?></div>
					</div>
				</div>
				
				 <?php  if(!empty($question['optionC'])) { ?>
					 <div class="option" data-value="C">
						<img class="oimg" src="../addons/zombie_fighting/template/style/images/option_bg_pink.png" />
						<img class="oimg-sel" src="../addons/zombie_fighting/template/style/images/option_sel_bg_pink.png" />
						<div class="text">
						<div class="i">C</div>
						<div class="otext"> <?php  echo $question['optionC'];?></div>
						</div>
					</div>
				 <?php  } ?>
				 <?php  if(!empty($question['optionD'])) { ?>
					 <div class="option" data-value="D">
						<img class="oimg" src="../addons/zombie_fighting/template/style/images/option_bg_yellow.png" />
						<img class="oimg-sel" src="../addons/zombie_fighting/template/style/images/option_sel_bg_yellow.png" />
						<div class="text">
						<div class="i">D</div>
						<div class="otext"> <?php  echo $question['optionD'];?></div>
						</div>
					</div>
				 <?php  } ?>
				 <?php  if(!empty($question['optionE'])) { ?>
					 <div class="option" data-value="E">
						<img class="oimg" src="../addons/zombie_fighting/template/style/images/option_bg_blue.png" />
						<img class="oimg-sel" src="../addons/zombie_fighting/template/style/images/option_sel_bg_blue.png" />
						<div class="text">
						<div class="i">E</div>
						<div class="otext"> <?php  echo $question['optionE'];?></div>
						</div>
					</div>
				 <?php  } ?>
				 <?php  if(!empty($question['optionF'])) { ?>
					 <div class="option" data-value="F">
						<img class="oimg" src="../addons/zombie_fighting/template/style/images/option_bg_green.png" />
						<img class="oimg-sel" src="../addons/zombie_fighting/template/style/images/option_sel_bg_green.png" />
						<div class="text">
						<div class="i">F</div>
						<div class="otext"> <?php  echo $question['optionF'];?></div>
						</div>
					</div>
				 <?php  } ?>
			</div>
			<img id="submit" src="../addons/zombie_fighting/template/style/images/exam_submit.png" />
		</div>

	</div>
	 
	<div class="result-right loading-mask">
		<div class="content">
			<img class="timg" src="../addons/zombie_fighting/template/style/images/tick.png">
			<div class="text">恭喜你，答对了</div>
			<button class="next-btn">进入下一题</button>
		</div>
	</div>
	<div class="result-wrong loading-mask">
		<div class="content">
			<img class="timg" src="../addons/zombie_fighting/template/style/images/wrong.png">
			<div class="text">对不起，你答错了。</div>
			<div class="answer">正确的答案是：<strong></strong></div>
			<button class="next-btn">进入下一题</button>
		</div>
	</div>
	<div class="result-timeout loading-mask">
		<div class="content">
			<img class="timg" src="../addons/zombie_fighting/template/style/images/timeout.png">
			<div class="text">啊哦，答题超时了</div>
			<button class="next-btn">进入下一题</button>
		</div>
	</div>
	
	<div id="loading" class="loading-mask">
		<img class="gimg" src="../addons/zombie_fighting/template/style/images/ajax-loader.gif">
	</div>
	<audio id="musicBg" src="../addons/zombie_fighting/template/style/mp3/timer.mp3" preload="auto" autoplay loop></audio>
	<audio id="musicRight" src="../addons/zombie_fighting/template/style/mp3/right.mp3" preload="auto"></audio>
	<audio id="musicWrong" src="../addons/zombie_fighting/template/style/mp3/wrong.wav" preload="auto"></audio>
	<audio id="musicNear" src="../addons/zombie_fighting/template/style/mp3/timerNear.mp3" preload="auto"></audio>
</body>

<script src="../addons/zombie_fighting/template/style/js/jquery-1.9.1.js" type="text/javascript"></script>
<script type="text/javascript" src="../addons/zombie_fighting/template/style/js/zepto.min.js?v=2014082901"></script>
<!--<script src="../addons/zombie_fighting/template/style/js/alert.js" type="text/javascript"></script>-->
<script type="text/javascript">
	var answertime = '<?php  echo $fighting['answertime'];?>';
	$(function(){
		$(".option").on("click",function(){
			var $option = $(this);
			if(!$option.hasClass("option-sel")){
				$(".options .option-sel").removeClass("option-sel");
				$option.addClass("option-sel");
				$("#submit").click();
			}
		});
		
		$(".next-btn").on("click",function(e){
			window.location.reload();
			return false;
		}).on("touchstart",function(e){
			$(this).addClass("hover");
		}).on("touchend",function(e){
			$(this).removeClass("hover");
		});
		
		var answerNum =Number($("input[name='answerNum']").val());
		$("#submit").on("click",function(){
			var $btn = $(this);
			var endTime = new Date();
			if((endTime - startTime)/1000 > 10){
				maxtime = -1;
				$(".time").text("00:00");
				alert("对不起，您的回答已超时！");
				return false;
			}
			if($btn.hasClass("disabled")) return;
			var $answer = $(".options .option-sel");
			if($answer.size() == 0){
				alert("请选择一个答案!");
				return;
			}
			var qestionid = $("input[name='qestionid']").val() ;
			var fid = $("input[name='fid']").val() ;
            var openid =$("input[name='openid']").val();
			var submitData = {
				"qestionid":qestionid,
				"fid":fid,
				"answerNum": answerNum,
                "openid":openid,
				"answer":$answer.attr("data-value")
			};
			$btn.addClass("disabled");
			clearInterval(timer);
			$("#musicBg")[0].pause();
            var ajaxurl = "<?php  echo murl('entry//getAnswer',array('m'=>'zombie_fighting'),true)?>";
			$.ajax({
		        type: "post",
		        url: ajaxurl,
		        data: submitData,
		        dataType: "json",
		        success: function (data) {
		        	$btn.removeClass("disabled");
					var $mask;
					if (data.resultCode==1){
						$("#musicRight")[0].play();
						$mask = $(".result-right");
					}else if(data.resultCode == 3){
						window.location.reload();
					} else{
						$("#musicWrong")[0].play();
						$mask = $(".result-wrong");
						$mask.find(".answer strong").text(data.resultMsg);
					}
					$mask.show();
		        },
		        error: function(data) {
		            alert("error:" + data.responseText);
					window.location.reload();
		        }
		    });
		    return false;
		});
		
		//一个小时，按秒计算，可以自己调整时间
		var maxtime = 10 * 100;
		function CountDown() {   
			if(maxtime>=0) {   
				seconds = Math.floor(maxtime/100);   
				milliseconds = Math.floor(maxtime%100); 
				seconds = seconds<10?("0" + seconds) : seconds;
				milliseconds = milliseconds<10?("0" + milliseconds) : milliseconds;
				$(".time").text(seconds + ":" + milliseconds);
				if(maxtime == 270){
					$("#musicNear")[0].play();
				}
				maxtime -= 10;   
			}  else{   
				clearInterval(timer);   
				var qestionid = $("input[name='qestionid']").val() ;
				var $answer = $(".options .option-sel");
				var fid = $("input[name='fid']").val() ;
                var openid =$("input[name='openid']").val() ;
				var submitData = {
					"qestionid":qestionid,
					"fid":fid,
                    "openid":openid,
					"answerNum":answerNum,
					"answer":$answer.attr("data-value")
				};
				
                var ajaxurl = "<?php  echo murl('entry//getAnswer',array('m'=>'zombie_fighting'),true)?>";
				var $btn = $("#submit");
				if($btn.hasClass("disabled")) return;
				$("#musicBg")[0].pause();
				$btn.addClass("disabled");
				
				$.ajax({
			        type: "post",
			        url: ajaxurl,
			        data: submitData,
			        dataType: "json",
			        success: function (data) {
			        	$btn.removeClass("disabled");
			        	var $mask = $(".result-timeout");
						$("#musicWrong")[0].play();
						if (data.resultCode==1){
							$("#musicRight")[0].play();
							$mask = $(".result-right");
						}else if(data.resultCode == 3){
							window.location.reload();
						} else{
							$("#musicWrong")[0].play();
							$mask = $(".result-wrong");
							$mask.find(".answer strong").text(data.resultMsg);
						}
						$mask.show();
			        },
			        error: function(data) {
			            alert("error:" + data.responseText);
						window.location.reload();
			        }
			    });
				
			}   
		} 
		timer = setInterval(CountDown, 100);
		var startTime = new Date();
		$(document).on('ajaxBeforeSend', function(e, xhr, options){
			$("#loading").show();
		}).on("ajaxComplete ",function(e, xhr, options){
			$("#loading").hide();
		});
	});
</script>
</html>