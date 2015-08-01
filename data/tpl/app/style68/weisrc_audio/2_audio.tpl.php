<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>音乐盒子</title>
<meta name="Author" CONTENT="ZETD">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
<link rel="stylesheet" href="<?php echo RES;?>css/common.css?v=1">
<script src="<?php echo RES;?>js/jquery-2.0.0.min.js"></script>
<script src="<?php echo RES;?>js/move.min.js"></script>
<script src="<?php echo RES;?>js/common.js"></script>
</head>
<body style="background-image: url(<?php  echo $bgname;?>);">
	<div class="cover_bg">
		<div class="cover_pic" id="cover_pic">
			<a href="javascript:void(0)" id="heartbtn" class="heartbtn"></a>
			<a href="javascript:void(0)" id="fmlist" class="homebtn"></a>
			<div class="playbg">
				<div class="songtitle" id="songtitle"></div>
				<div class="auther" id="auther"></div>
				<div class="progdiv">
					<div class="pgbg">
						<div id="pgbuf" class="pgbuf" style="width: 0%;"></div>
						<div id="pgtime" class="pgtime" style="width: 0%;"></div>
					</div>
				</div>
				<div class="playbtns">
					<a href="javascript:void(0)" id="prevbtn" class="prevbtn"></a>
					<a href="javascript:void(0)" id="playbtn" class="playbtn"></a>
					<a href="javascript:void(0)" id="nextbtn" class="nextbtn"></a>
				</div>
			</div>
		</div>
	</div>
	<div class="songintro" id="songintro"></div>
    <audio id="song_player" src="" preload="auto" autoplay="autoplay"></audio>
	<div class="copyright"><?php  echo $setting['title'];?></div>
    <div id="fmlistbox" class="fmlistbox">
    	<div class="header">
            <header>
                <a href="javascript:void(0)" id="all_list" class="list_style">全部歌曲</a>
                <a href="javascript:void(0)" id="like_list" class="list_style no_select">我喜欢的</a>
                <a href="javascript:void(0)" id="fmlista" class="fmlista"></a>
            </header>
        </div>
        <div id="fmlistdiv" class="fmlistdiv">
			<dl>
				<a href="javascript:void(0)">
				<dt><img src="images/cover.jpg?v=1" width=50></dt>
				<dd><h3>孤独的人是可耻的</h3></dd>
				<dd>张楚</dd>
				<dd><span>我们必须恋爱……</span></dd>
				</a>
			</dl>
        </div>
        <nav class="s_page" id="s_page">
			<div class="s_page_div" id="s_page_div">
			<a href="javascript:void(0)" class="first_pg">首页</a>
			<a href="javascript:void(0)" class="prev_pg">上一页</a>
			<a href="javascript:void(0)" class="next_pg">下一页</a>
			<a href="javascript:void(0)" class="end_pg">尾页</a>
			</div>
        </nav>
    </div>
<script>
    //新建一个播放器类，页面宽度高度；
var player = new Player(), dwidth, dheight;
    //定义前后歌曲ID，当前歌曲ID，微信用户ID
var next_id=0,prev_id=0,current_id=0,from_user="";
$(function() {
    //初始化页面
	initsite();
    //绑定列表页打开事件
	$('#fmlist').click(function(){
		move('#fmlistbox').set('left', 0).end();
		return false;
	});
    //绑定列表页关闭事件
	$('#fmlista').click(function(){
		move('#fmlistbox').sub('left', dwidth).end();
		return false;
	});
    //绑定点击喜欢事件
	$('#heartbtn').click(function(){
		like();
		return false;
	});
    //绑定播放上一首事件
	$('#prevbtn').click(function(){
		prev_song();
		return false;
	});
    //绑定播放下一首事件
	$('#nextbtn').click(function(){
		next_song();
		return false;
	});
    //显示全部歌曲列表
	$('#all_list').click(function(){
        $("#all_list").removeClass("no_select");
        $("#like_list").addClass("no_select");
		get_list(1,0);
		return false;
	});
    //显示喜欢歌曲列表
	$('#like_list').click(function(){
        $("#all_list").addClass("no_select");
        $("#like_list").removeClass("no_select");
		get_list(1,1);
		return false;
	});
    //播放器绑定音乐组件
	player.init('#song_player');
    //当前默认歌曲ID
    current_id="<?php  echo $_GPC['song_id'];?>";
    //微信用户ID
    from_user="<?php  echo $from_user;?>";
    //从服务器上获取歌曲详细资料
    //alert(current_id);
	get_song(current_id,from_user);
    //默认获取全部歌曲列表的第一页
    get_list(1,0);
});
//获取url传递的参数
function parseQuery ( query ) {
   var Params = "0&&";
   if (!query ) return Params; // return empty object
   var query = query.substr(1);
   return query;
}
    //获取歌曲详细
function get_song(song_id,from_user)
{
    //alert(song_id);
    var url ="<?php  echo $this->createMobileurl('getdata', array(), true)?>&backtype=jsonp&song_id="+song_id+"&from_user="+from_user;
	$.ajax({
        url: url,
        dataType: 'jsonp',
		jsonp: 'callback', 
		timeout: 3000,
		success: function(json) {
			if(json.error == 0)
			{
                //替换歌曲信息
                $("#songtitle").html(json.songtitle);
                $("#auther").html(json.auther);
                $("#songintro").html(json.songintro);
                $("#cover_pic").css({'background':'url('+json.cover+')'});

                //替换歌曲
                document.getElementById("song_player").src=json.url;
                //歌曲ID赋值
                next_id=json.next_id;
                prev_id=json.prev_id;
                current_id=json.current_id;
                //判断是否喜欢歌曲
                if(json.like_song>0)
                {
                    $("#heartbtn").addClass("heartselect");
                }
                else
                {
                    $("#heartbtn").removeClass("heartselect");
                }
			}
			else
			{
				alert(json.errmsg);
			}
		},
        error:function(){
            alert('error');
        }
	});
	return true;
}

//歌曲表态
function like(){
    if(from_user=="")
    {
    	alert("请先用微信关注公众号再使用此功能！");
        return false;
    }
    var url ="<?php  echo $this->createMobileurl('getdata', array(), true)?>&backtype=jsonp&type=like&song_id="+current_id+"&from_user="+from_user;
	$.ajax({
        url:url,
		dataType: 'jsonp', 
		jsonp: 'callback', 
		timeout: 3000,
		success: function(json) { 
			if(json.error == 0)
			{
                //根据返回参数切换样式
                if(json.like_flag==1)
                {
                	$("#heartbtn").addClass("heartselect");
                }
                else
                {
                	$("#heartbtn").removeClass("heartselect");
                }
			}
			else
			{
				alert(json.errmsg);
			}
		},
        error: function() {
            alert('功能调试中...');
        }
	});
	return true;
}
    //上一首
function prev_song()
{
    //判断上一首歌曲ID是否为0，为0表示这是第一首了
	if(prev_id==0)
	{
		alert("亲，没有上一首歌曲了！");
		return false;
	}
    //播放
	get_song(prev_id,from_user);
}
    //下一首
function next_song()
{
    //判断下一首歌曲ID是否为0，为0表示已经到末尾，跳转到第一首
	if(next_id==0)
	{
		get_song(-1,from_user);
		return false;
	}
    //播放
	get_song(next_id,from_user);
}

    //获取歌曲列表,page:页码,like_flag:喜欢列表标识    
function get_list(page,like_flag)    {
    var list_type="list";
    
    if(like_flag==1)
    {
    	list_type="like_list";
    }

    var url ="<?php  echo $this->createMobileurl('getdata', array(), true)?>&backtype=jsonp&type="+list_type+"&from_user="+from_user+"&page="+page;

    //alert(url);
	$.ajax({
        url:url,
		dataType: 'jsonp', 
		jsonp: 'callback', 
		timeout: 3000,
		success: function(json) {
			if(json.error == 0)
			{
				var list_html="";
				var j=0;
				$.each(json.music_list,function(i,v){
							list_html+='<dl>';
							list_html+='<a href="javascript:void(0)" onclick="get_song_from_list('+v.mid+')">';
							list_html+='<dt><img src="'+v.cover+'" width=50></dt>';
							list_html+='<dd><h3>'+v.title+'</h3></dd>';
							list_html+='<dd>'+v.singer+'</dd>';
							list_html+='<dd><span>'+v.intro+'</span></dd>';
							list_html+='</a>';
							list_html+='</dl>';
				});
				$("#fmlistdiv").html(list_html);
				var page_html="";
				if(json.page!=1)
				{
					page_html+='<a href="javascript:void(0)" class="first_pg" onclick="get_list(1,'+like_flag+');">首页</a>';
					page_html+='<a href="javascript:void(0)" class="prev_pg" onclick="get_list('+json.music_prev+','+like_flag+');">上一页</a>';
				}
				page_html+='<span class="num_pg">'+json.page+'/'+json.real_page+'</span>';
				if(json.page!=json.real_page)
				{
					page_html+='<a href="javascript:void(0)" class="next_pg" onclick="get_list('+json.music_next+','+like_flag+');">下一页</a>';
					page_html+='<a href="javascript:void(0)" class="end_pg" onclick="get_list('+json.real_page+','+like_flag+');">尾页</a>';
				}
				$("#s_page_div").html(page_html);
			}
            else
            {
            	$("#fmlistdiv").html("<p>"+json.errmsg+"</p>");
            }
		},
        error: function(){
            alert('debug');
        }
	});
	return true;
}
//列表点击歌曲播放
function get_song_from_list(song_id)
{
	move('#fmlistbox').sub('left', dwidth).end();
	get_song(song_id,from_user);
}
</script>
</body>
</html>