<?php defined('IN_IA') or exit('Access Denied');?>﻿<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>留言板</title>
    <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <link href="<?php echo RES;?>css/style.css" rel="stylesheet" type="text/css">
    <script src="<?php echo RES;?>js/jquery.min.js" type="text/javascript"></script>
</head>
<body id="message" >
<div class="qiandaobanner">
    <a href="javascript:history.go(-1);"><img src="<?php  echo $topimgurl;?>" ></a>
</div>
<div class="cardexplain">
<div class="window" id="windowcenter">
    <div id="title" class="wtitle">操作提示<span class="close" id="alertclose"></span></div>
    <div class="content">
        <div id="txt"></div>
    </div>
</div>
<div class="history">
    <div class="history-date">
        <ul>
            <a ><h2 class="first first1" style="position: relative;">请点击留言</h2></a>
            <?php  if($ischeck==1) { ?>
            <li class="nob  mb"><div class="beizhu">留言审核通过后才会显示在留言墙上！</div></li>
            <?php  } ?>
            <li  class="green bounceInDown nob ly1" style="display:none" >
                <dl>
                    <dt><input name="wxname"  type="text" class="px" id="wxname1" value="<?php  echo $nickname;?>" placeholder="请输入您的昵称"></dt>
                    <dt><textarea name="info" class="pxtextarea" style=" height:60px;"  id="info1"  placeholder="请输入留言"></textarea></dt>
                    <dt><a id="showcard1"  class="submit" href="javascript:;">提交留言</a></dt>
                </dl>
            </li>
            <?php  if(is_array($list)) { foreach($list as $item) { ?>
            <li class="green bounceInDown">
                <h3><img src="<?php  if((strpos($item['headimgurl'], 'http') === false)) { ?><?php  echo $_W['attachurl'];?><?php  echo $item['headimgurl'];?><?php  } else { ?><?php  echo $item['headimgurl'];?><?php  } ?>" onerror="this.src='<?php echo RES;?>images/default-headimg.jpg'"><?php  echo $item['username'];?><span><?php  echo date('Y-m-d H:i', $item['dateline'])?></span>
                    <div class="clr"></div>
                </h3>
                <dl>
                    <dt class="hfinfo" date=""><?php  echo $item['content'];?></dt>
                </dl>
                <dl class="huifu">
                    <dt>
                        <span>
                            <a class="hhbt czan" date="<?php  echo $item['id'];?>" href="javascript:;">回复</a>
                            <p style="display:none;" class="hhly<?php  echo $item['id'];?>">
                                <textarea name="info" class="pxtextarea hly<?php  echo $item['id'];?>"></textarea>
                                <a class="hhsubmit submit" date="<?php  echo $item['id'];?>" href="javascript:;">确定</a>
                            </p>
                        </span>
                    </dt>
                </dl>
                <?php  if(is_array($children[$item['id']])) { foreach($children[$item['id']] as $row) { ?>
                <dl class="huifu">
                    <dt><span><?php  echo $row['username'];?>回复：<?php  echo $row['content'];?></span></dt>
                </dl>
                <?php  } } ?>
            </li>
            <?php  } } ?>
            <li class="bounceInDown">
                <!--页码开始-->
                <?php  echo $pager;?>
                <!--页码结束-->
            </li>
            <li  class="green bounceInDown nob ly2" style="display:none" >
                <dl>
                    <dt><input name="wxname"  type="text" class="px" id="wxname2" value="<?php  echo $nickname;?>" placeholder="请输入您的昵称"></dt>
                    <dt><textarea name="info" class="pxtextarea" style=" height:60px;" id="info2"  placeholder="请输入留言"></textarea></dt>
                    <dt><a id="showcard2"  class="submit" href="javascript:;">提交留言</a> </dt>
                </dl>
            </li>
            <a><h2 class="first first2" style="position: relative;">请点击留言</h2></a>
        </ul>
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var ActionUrl = "<?php  echo $this->createMobileUrl('SendReply', array(), true);?>";
        $("#showcard1").bind('click',function () {
            var btn = $(this);
            btn.unbind('click');
            var wxname = $("#wxname1").val();
            if (wxname  == '') {
                alert("请输入昵称");
                return
            }
            var info = $("#info1").val();
            if (info == '') {
                alert("请输入内容");
                return
            }
            var submitData = {
                from_user:"<?php  echo $from_user;?>",
                username:wxname,
                content: info,
                type: "feedback"
            };
            $.post(ActionUrl, submitData,function(data) {
                if (data.status == 1) {
                    alert(data.message);
                    setTimeout('window.location.href=location.href',1000);
                    return;
                } else {
                    alert(data.message);
                }
            },"json")
        });


        $("#showcard2").bind('click',function(){
            var btn = $(this);
            var wxname = $("#wxname2").val();
            if (wxname  == '') {
                alert("请输入昵称");
                return
            }
            var info = $("#info2").val();
            if (info == '') {
                alert("请输入内容");
                return
            }
            var submitData = {
                from_user:"<?php  echo $from_user;?>",
                username: wxname,
                content: info,
                type: "feedback"
            };
            $.post(ActionUrl, submitData,function(data) {
                if (data.status == 1) {
                    alert(data.message);
                    setTimeout('window.location.href=location.href',1000);
                    return;
                } else {
                    alert(data.message);
                }
            },"json")
        });

        $(".hhsubmit").bind('click',function(){
            $(this).unbind('click');
            var objid = $(this).attr("date");
            var info = $(".hly"+objid).val();
            if (info == '') {
                alert("请输入内容");
                return
            }
            var submitData = {
                from_user:"<?php  echo $from_user;?>",
                username:'',
                parentid:objid,
                content: info,
                type: "reply"
            };

            $.post(ActionUrl, submitData,function(data) {
                //alert(data.message);
                if (data.status == 1) {
                    alert(data.message);
                    setTimeout('window.location.href=location.href',1000);
                    return;
                } else {
                    alert(data.message);
                }
            },"json")
        });

        $(".hfinfo").click(function(){
            var objid = $(this).attr("date");
            $(".hhly"+objid).slideToggle();
        });
        $(".hhbt").click(function(){
            var objid = $(this).attr("date");
            $(".hhly"+objid).slideToggle();
        });

        var ipage = parseInt($('.ipage').text());
        var cpage = parseInt($('.cpage').text());
        if(ipage>=cpage && cpage <=1){
            $('.right').attr('class','right disabled');
            $('.left').attr('class','left disabled');
            $('.right a').attr('href','###');
            $('.left a').attr('href','###');
        }else if(ipage<=1 && cpage>1){
            $('.left').attr('class','left disabled');
            $('.left a').attr('href','###');
        }else if(ipage ==cpage && cpage >1){
            $('.right').attr('class','right disabled');
            $('.right a').attr('href','###');
        }
    });
    $("#windowclosebutton").click(function(){
        $("#windowcenter").slideUp(500);
    });
    $("#alertclose").click(function(){
        $("#windowcenter").slideUp(500);
    });

    function alert(title){
        $("#windowcenter").slideToggle("slow");
        $("#txt").html(title);
        setTimeout('$("#windowcenter").slideUp(500)',4000);
    }
    $(document).ready(function(){
        $(".first1").click(function(){
            $(".ly1").slideToggle();
        });
    });
    $(document).ready(function(){
        $(".first2").click(function(){
            $(".ly2").slideToggle();
        });
    });
</script>
</body>
</html>