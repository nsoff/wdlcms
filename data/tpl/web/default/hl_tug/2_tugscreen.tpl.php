<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php  echo $reply['title'];?></title>
<meta name="keywords" content="index" />
<meta name="description" content="index" />
<base target="_self" />
<script>
var ajaxurl='<?php  echo $this->createWebUrl('ajax',array('id'=>$reply['rid']))?>';
window.onbeforeunload = function(event) { 
	return "确定退出吗,未完成的比赛数据将丢失!"; 
} 
</script>
<link href="<?php echo RES;?>css/tug_show.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="tug">
<!--配乐-->
    <audio id="audio_player1" src="<?php echo RES;?>images/countdown.mp3"></audio>
    <audio id="audio_player2" src="<?php echo RES;?>images/tug-bg.mp3" loop="loop"></audio>
    <audio id="audio_player3" src="<?php echo RES;?>images/cheers.mp3"></audio>

    <!--标题-->
    <span class="tug-title">
        <p><?php  echo $reply['title'];?></p>
    </span>
    
    <!--广告位-->
    <div class="track-adw">
		<a href="javascript:;"><img id="ad1" src="<?php  echo $_W['attachurl'];?><?php  echo $reply['ad1'];?>"></a>
		<a href="javascript:;"><img id="ad2" src="<?php  echo $_W['attachurl'];?><?php  echo $reply['ad2'];?>"></a>
		<a href="javascript:;"><img id="ad3" src="<?php  echo $_W['attachurl'];?><?php  echo $reply['ad3'];?>"></a>
		<a href="javascript:;"><img id="ad4" src="<?php  echo $_W['attachurl'];?><?php  echo $reply['ad4'];?>"></a>
    </div>
    
    <!--倒计时 //时间改动 -->
    <div class="tug-time">
    	<span class="sec" id='sec'><?php echo !empty($reply['timelimit'])?$reply['timelimit']:90?></span>
        <span class="sec-m" id="sec-m">00</span>
    </div>
    
    <!--队伍名称-->
    <div class="tug-team">
    	<div class="team-red">
        	<span class="team-box">
            	<img src="<?php  echo $_W['attachurl'];?><?php  echo $reply['teamapic'];?>">
                <p><?php  echo $reply['teama'];?><br /><span id='team1_cnt'>0</span>人</p>
            </span>
        </div>
        <div class="team-blue">
        	<span class="team-box">
            	<img src="<?php  echo $_W['attachurl'];?><?php  echo $reply['teambpic'];?>">
                <p><?php  echo $reply['teamb'];?><br /><span id='team2_cnt'>0</span>人</p>
            </span>
        </div>
    </div>
    
    <!--拔河区域-->
    <div class="play-box">
    	<div class="play-box-left">
            <div class="player" id='left_6'><span class="player-icon"></span></div>
			<div class="player" id='left_5'><span class="player-icon"></span></div>
			<div class="player" id='left_4'><span class="player-icon"></span></div>
			<div class="player" id='left_3'><span class="player-icon"></span></div>
			<div class="player" id='left_2'><span class="player-icon"></span></div>
			<div class="player" id='left_1'><span class="player-icon"></span></div>
			<div class="player" id='left_0'><span class="player-icon"></span></div>
        </div>
        
        <div class="play-box-right">
			<div class="player" id='right_6'><span class="player-icon"></span></div>
			<div class="player" id='right_5'><span class="player-icon"></span></div>
			<div class="player" id='right_4'><span class="player-icon"></span></div>
			<div class="player" id='right_3'><span class="player-icon"></span></div>
			<div class="player" id='right_2'><span class="player-icon"></span></div>
			<div class="player" id='right_1'><span class="player-icon"></span></div>
			<div class="player" id='right_0'><span class="player-icon"></span></div>
        </div>        
        <img src="<?php echo RES;?>images/play-line.png" class="paly-line">
    </div>
    
    <div class="mask"></div>
    <div class="col-start" id="Start">Go!</div>
    <div class="col-start" id="LastTime">5</div>
    <div class="masktips tips-left">
    	<p>1.关注"<span><?php  echo $_W['account']['name'];?></span>"公众号</p>
		<p>2.发送"<span><?php  echo $reply['keyword'];?></span>"，获得图文回复后，点击进入图文活动页</p>
        <p>3.进入图文页后，点击允许按钮，获取参赛信息</p>
        <p>4.进入比赛页后，请在大屏幕倒计时结束后，摇动手机参与比赛</p>
    </div>
    <div class="masktips tips-right">
    	<span style="width:110px;height:110px;display:block;background:#fff;position:relative;margin: 0 auto 10px;border-radius: 15px;overflow: hidden;">
        	<img src="<?php  echo $_W['attachurl'];?>/qrcode_<?php  echo $_W['weid'];?>.jpg" width="110" height="110" style="position:absolute;top:0;left:0">
        </span>
        <p>微信扫码 立即关注</p>
    </div>
    
    <!--获胜方-->
    <div class="pop-winner">
    	<span id='win_span' class="team-box">
        	<img id='logo2' src="<?php echo RES;?>images/pingju.jpg">
            <p id='win_team_name'></p>
        </span>
        <div class="winner-prize-list">
        	<ul>
            	<li class="winner-prize winner-prize-first"><span></span></li>
                <li class="winner-prize winner-prize-second"><span></span></li>
                <!--li class="winner-prize winner-prize-third"><span></span></li-->
            </ul>
        </div>
        <a href="javascript:;" class="button-prize"></a>
    </div>

    <!--积分排名-->
    <div class="pop-prize">
    	<a href="javascript:void(0);" onClick="window.location.reload();" class="close-tug-rank">×</a>
        
    	<div class="prize-box prize-box-left">
        	<div class="team-top">
            	<div class="team-info">
                	<span class="team-box"><img src="<?php  echo $_W['attachurl'];?><?php  echo $reply['teamapic'];?>"></span>
					<?php  echo $reply['teama'];?>
                </div>
                <span class="tug-result" id='team1_result'></span>
            </div>
            
            <div class="rank-container">
                <table class="rank-table">
                    <tbody id='team1_rank'>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="prize-box prize-box-right">
        	<div class="team-top">
            	<div class="team-info">
                	<span class="team-box"><img src="<?php  echo $_W['attachurl'];?><?php  echo $reply['teambpic'];?>"></span>
					<?php  echo $reply['teamb'];?>
                </div>
                <span class="tug-result lose" id='team2_result'></span>
            </div>
            
            <div class="rank-container">
                <table class="rank-table">
                    <tbody id='team2_rank'>
                        
                    </tbody>
                </table>
            </div>
        </div>
        
        <!--<div class="rank-container">
            <table class="rank-table">
                <tbody  id='rank_list'>
                </tbody>
            </table>
        </div>-->
    </div>    
</div>
<div id="mcover" onclick="$(this).hide()"><img src="<?php  echo $_W['attachurl'];?>/qrcode_<?php  echo $_W['weid'];?>.jpg" style="width:500px;hieght:500px"></div>
<script type="text/javascript" src="<?php echo RES;?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo RES;?>js/jquery.nicescroll.min.js"></script>

<script>

window.onbeforeunload = function(event) { 
	return confirm("确定退出吗,未完成的比赛数据将丢失!"); 
} 


function infotips(msg, obj, ty, direction, width) {
	var w = document.body.clientWidth;
	var width = width ? width : 500;
	if(ty == '') ty = 'right';

	if(typeof direction == 'undefined'){ direction = 'insertbefore'; }
	if($("#infotips").length > 0) $("#infotips").remove();

	var infodivobj = $('<div id="infotips" class="pp_point"></div>');
	infodivobj.appendTo($("body")).html(msg);
	var pot = $("#infotips").innerWidth();
	$("#infotips").css("margin-left",-pot/2).animate({top:'-37px'},150,function(){$(this).animate({top:'-48px'},600,function(){$(this).animate({top:'-48px'},3000,function(){$(this).animate({top:'-37px'},150,function(){$(this).animate({top:'-95px'},600,function(){$(this).css("display","none")})})})})});
    switch (ty) {
		case 'success':
		case 'right':
			$(".pp_point").addClass("send_success").removeClass("send_failure");
		break;

		case 'error':
		default :
			$(".pp_point").addClass("send_failure").removeClass("send_success");
		break;
	}
}

var size = 0;
//时间改动 
var time = <?php echo !empty($reply['timelimit'])?$reply['timelimit']:90?>00;

$(document).ready(function() {

	changead();
	/* 整体高度上下居中 */
	if ($(window).height()>768){
		var rt = ($(window).height()-768)/2;
		$('.tug').css('margin-top',rt);
	}else{
		$('.tug').css('margin-top',0);
	}

	/* 广告排排列 */
	$('.track-adw a:eq(1)').css('margin-right',70);
	$('.track-adw a:eq(2)').css('margin-right',72);

	/* 选手分布排列 */
	var  pw = $('.play-box-left .player').width();
	$('.play-box-left .player').each(function(){
		var i = $(this).index();
		$(this).css({'left':pw*i,'margin-left':-37*i});
	});
	$('.play-box-right .player').each(function(){
		var i = $(this).index();
		$(this).css({'right':pw*i,'margin-right':-37*i});
	});

	$('.play-box-left .player:odd').addClass('z-top');
	$('.play-box-right .player:odd').addClass('z-top');

	/* 最后一个人物背景图片带绳子 */
	$('.play-box-left .player-icon:first').css('background-image','url(<?php echo RES;?>images/player-go-last-red.gif)');
	$('.play-box-right .player-icon:first').css('background-image','url(<?php echo RES;?>images/player-go-last-blue.gif)');

	/* 拔河移动 */
	Tug = function(size){		
		$('.play-box-left').css('left',-3);
		$('.play-box-right').css('right',0);		
		$('.play-box').animate({'left':size,'easing':'linear'},2000,function(){
			if(size<105 && size>-105)
			{
				if(time>0)
				{
					get_top();
				}
			}
			else
			{
				clearInterval(ints);
			}
		});
	};		

	ReagyGo = function(){
	
		$.post(ajaxurl+'&op=tug_start_game',{vuid:13334}, function(response){
			if (response.record_id) {
				
				
				clearInterval(user_cnt);
			} else {
				infotips('服务器繁忙，请稍后再试', $('.submit_tips'));
				window.location.reload(true);
			} 
		}, 'json');
		
		
		$('#Start,.masktips').hide();		  
		audio_player1.play();
		$('#LastTime').show().addClass('start-animate');		  
		var  b = $('#LastTime').html();
		Col_start = window.setInterval(function() {
			b--;
			if (b == 0) {
				$('#LastTime').html("GO!")
				//开始
				get_top();
				ints = window.setInterval("show_djs()",10);
			}else if (b<0){
				audio_player2.play();
				$('.mask,#LastTime').hide();
				$('.play-box').show();
				clearTimeout(Col_start);
			}else{
				$('#LastTime').html(b);
			}
	  }, 1000);
	  };

	$('#Start').click(function(){
		$(this).addClass('start-animate')
		setTimeout(function(){
			ReagyGo();
		},1000);
	});	


	get_top = function()
	{	
		//changead();
		if(time<=0)
		{
		return;
		}

		$.post(ajaxurl+'&op=tug_get_top',{vuid:13334}, function(response){

			for(var top_cnt=0;top_cnt<7;top_cnt++)
			{
				if(typeof(response.topinfo['team1'][top_cnt]) != "undefined")
				{
					var name = response.topinfo['team1'][top_cnt]['uname'];
					var pic = response.topinfo['team1'][top_cnt]['pic'];

					if(pic.length<=0){pic="<?php echo RES;?>images/tx-nopic.png"};
					if(name.length>0){$('#left_'+top_cnt).append('<span class="avtr"><img src="'+pic+'"><i></i></span><span class="player-name">'+name+'</span>');}
				}
			}

			for(var top_cnt=0;top_cnt<7;top_cnt++)
			{
				if(typeof(response.topinfo['team2'][top_cnt]) != "undefined")
				{
					var name = response.topinfo['team2'][top_cnt]['uname'];
					var pic = response.topinfo['team2'][top_cnt]['pic'];

					if(pic.length<=0){pic="<?php echo RES;?>images/tx-nopic.png"};
					if(name.length>0){$('#right_'+top_cnt).append('<span class="avtr"><img src="'+pic+'"><i></i></span><span class="player-name">'+name+'</span>');}
				}
			}

			if(response.topinfo['result']==1)
			{	//时间改动 每次位移，30秒是7比较合理，时间越长，值越小
				size = size-2;
			}
			else if (response.topinfo['result']==2)
			{	//时间改动 每次位移，30秒是7比较合理，时间越长，值越小
				size = size+2;
			}

			if(size>=105 || size<=-105)
			{
				//over_game(5000);
			}
				Tug(size);
		},'json')
	}

});


function over_game(timeout)
{	
	
	
	$.post(ajaxurl+'&op=over_tug',{vuid:345}, function(response){
		if(response.game_over)
		{
			if(response.result==1)
			{
				$('#logo2').attr('src','<?php  echo $_W['attachurl'];?><?php  echo $reply['teambpic'];?>');
				$('#win_team_name').html('');
				$('#win_span').attr('class','team-box red');
				$('#team1_result').attr('class','tug-result win');
				$('#team2_result').attr('class','tug-result lose');
			}
			else if(response.result==2)
			{
				$('#logo2').attr('src','<?php  echo $_W['attachurl'];?><?php  echo $reply['teamapic'];?>');
				$('#win_team_name').html('');
				$('#win_span').attr('class','team-box blue');
				$('#team1_result').attr('class','tug-result lose');
				$('#team2_result').attr('class','tug-result win');
			}
			else
			{
				$('#logo2').attr('src','<?php echo RES;?>images/pingju.jpg');
				$('#win_team_name').hide();
				$('#win_span').attr('class','team-box pingju');
				$('#team1_result').attr('class','tug-result draw');
				$('#team2_result').attr('class','tug-result draw');
			}

			if(typeof(response.top_info[0]) != "undefined"){
				$('.winner-prize-first').append(response.top_info[0]['uname']);
				if(response.top_info[0]['pic'].length<=0){response.top_info[0]['pic']="<?php echo RES;?>images/tx-nopic.png"}
				//alert(response.top_info[0]['pic']);
			}
			
			if(typeof(response.top_info[1]) != "undefined"){
				$('.winner-prize-second').append(response.top_info[1]['uname']);
			}

			if(typeof(response.top_info[2]) != "undefined"){
				$('.winner-prize-third').append(response.top_info[2]['uname']);
			}

			var rank_list;
			$.each(response.prize_setting, function(key, rows) {
				rank_list += '<tr>';
				if(rows.rank_start==rows.rank_end)
				{
					rank_list += '<td class="rank-table-left">第'+rows.rank_start+'名</td>';
				}
				else
				{
					rank_list += '<td class="rank-table-left">'+rows.rank_start+'-'+rows.rank_end+'名</td>';
				}
				rank_list += '<td><div class="rank-box"><ul>';
				//根据名次循环列表
				
				var start = rows.rank_start-1;
				var end = rows.rank_end-1;
				for(var i =start;i<=end;i++)
				{
					if(typeof(response.team2_info[i]) != "undefined"){
						if(response.team2_info[i]['pic'].length<=0){response.team2_info[i]['pic']="<?php echo RES;?>images/tx-nopic.png"}
						rank_list += '<li><span><img src="'+response.team2_info[i]['pic']+'"><u>'+response.team2_info[i]['uname']+'</u></span></li>';
					}
				}
				rank_list += '</ul></div></td></tr>';
			})
			$('#team2_rank').html(rank_list);


			var rank_list_1;
			$.each(response.prize_setting, function(key, rows) {
				rank_list_1 += '<tr>';
				if(rows.rank_start==rows.rank_end)
				{
					rank_list_1 += '<td class="rank-table-left">第'+rows.rank_start+'名</td>';
				}
				else
				{
					rank_list_1 += '<td class="rank-table-left">'+rows.rank_start+'-'+rows.rank_end+'名</td>';
				}
				rank_list_1 += '<td><div class="rank-box"><ul>';
				//根据名次循环列表
				var start = rows.rank_start-1;
				var end = rows.rank_end-1;
				for(var i =start;i<=end;i++)
				{
					if(typeof(response.team1_info[i]) != "undefined"){
						if(response.team1_info[i]['pic'].length<=0){response.team1_info[i]['pic']="<?php echo RES;?>images/tx-nopic.png"}
						rank_list_1 += '<li><span><img src="'+response.team1_info[i]['pic']+'"><u>'+response.team1_info[i]['uname']+'</u></span></li>';
					}
				}
				rank_list_1 += '</ul></div></td></tr>';
			});
			
			
			$('#team1_rank').html(rank_list_1);

			setTimeout(function(){
				$('.mask,.pop-winner').show();
				$('.play-box').hide();
			},7000);

			
			$('.paly-line').hide();  //结束后绳子隐藏
			audio_player2.pause();
			audio_player3.play();
			/* 输赢各方换表情 */
			if(response.result==1)
			{
				$('.play-box-left .player-icon').css('background-image','url(<?php echo RES;?>images/player-win-red.gif)');
				$('.play-box-right .player-icon').css('background-image','url(<?php echo RES;?>images/player-lose-blue.png)');
			}else if(response.result==2)
			{
				$('.play-box-left .player-icon').css('background-image','url(<?php echo RES;?>images/player-lose-red.png)');
				$('.play-box-right .player-icon').css('background-image','url(<?php echo RES;?>images/player-win-blue.gif)');
			}else{
				$('.play-box-left .player-icon').css('background-image','url(<?php echo RES;?>images/player-win-red.gif)');
				$('.play-box-right .player-icon').css('background-image','url(<?php echo RES;?>images/player-win-blue.gif)');
			};
			
			
		}
	},'json')
}



function show_djs()
{
	time = time-1;

	var timestr = time;
	if(time<1000 && time>100)
	{
		timestr = '0'+time;
	}

	if(time<100 && time>0)
	{
		timestr = '00'+time;
	}

	if(time<0)
	{
		clearInterval(ints);
		over_game(3000);
		timestr = '0000';
	}

	var sss= timestr.toString();
	var sec = sss.substr(0,2);
	var sec_m =  sss.substr(2,2);

	$('#sec').html(sec);
	$('#sec-m').html(sec_m);
}

$('.button-prize').click(function(){
	$('.pop-winner').hide();
	$('.pop-prize').show();
	/* 获奖名单滚动条 */
	$('.rank-container').niceScroll({
		cursoropacitymax:1,  
		touchbehavior:false, 
		cursorcolor:"#999", 
		cursorwidth:"10px",  
		cursorborder:"0",  
		cursorborderradius:"5px"  
	});
});

window.onload = function(){	
	/* 倒计时文字位置 */
	$('#Start').show();
	var cw = $('.col-start').width();
	var ch = $('.col-start').height();	
	$('.col-start').css({
		"margin-left": -cw / 2 + "px",
		"margin-top": -ch / 2 + "px",
		"font-size": ch * 0.7 + "px",
		"line-height": ch + "px"
	});
}

//获取参与人数
user_cnt = window.setInterval(function() {
	$.post(ajaxurl+'&op=get_user_cnt',{vuid:13334}, function(response){
		$('#team1_cnt').html(response.team1_cnt);
		$('#team2_cnt').html(response.team2_cnt);
	},'json')
}, 2000);

var iii=1;

var myad=new Array()
myad[0]="<?php  echo $_W['attachurl'];?><?php  echo $reply['ad1'];?>";
myad[1]="<?php  echo $_W['attachurl'];?><?php  echo $reply['ad2'];?>";
myad[2]="<?php  echo $_W['attachurl'];?><?php  echo $reply['ad3'];?>";
myad[3]="<?php  echo $_W['attachurl'];?><?php  echo $reply['ad4'];?>";
function changead(){
	var c=iii % 4;
	
	for(i=1;i<5;i++)
	{	c++;
		if(c>3){
			c=c-4;
		}
		$('#ad'+i).attr('src',myad[c]);
		
	}
	
	iii++;
	setTimeout('changead()',3000);

}

//分享
        $(".tips-right").click(function(){
            $("#mcover").show();
        })
</script>
</body>
</html>