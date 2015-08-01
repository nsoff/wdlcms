<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<title><?php  echo $reply['title'];?></title>
<meta charset="utf-8">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
<meta name="format-detection" content="telephone=no"/>

<script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
<link href="../addons/hl_tug/style/mobile/tug.css" rel="stylesheet" type="text/css" />
<script>


//剩余时间
var starttime=500000;


</script>
<style>
</style>
</head>
<body>

<div class="index">
    <img src="../addons/hl_tug/style/mobile/tug-background.jpg" class="tug-background">
    <div class="container">
        <p class="tug-title"><span><?php  echo $reply['title'];?></span></p>
        <div class="cont-team">
        	<img src="../addons/hl_tug/style/mobile/chooseteam-bg.png" class="contbg-team">
            <div class="teamline">
            	<span class="team-red">
                	<img src="<?php  echo $_W['attachurl'];?><?php  echo $reply['teamapic'];?>">
                    <p><?php  echo $reply['teama'];?></p>
                </span>
                <img src="../addons/hl_tug/style/mobile/team-vs.png" class="team-vs">
                <span class="team-blue">
                	<img src="<?php  echo $_W['attachurl'];?><?php  echo $reply['teambpic'];?>">
                    <p><?php  echo $reply['teamb'];?></p>
                </span>
            </div>
            <div class="join-line">
            	<a href="<?php  echo $this->createMobileUrl('index', array('id' => $_GPC['id'],'whoteam'=>1))?>" class="join-red"><img src="../addons/hl_tug/style/mobile/redteam-join.png"></a>
                <a href="<?php  echo $this->createMobileUrl('index', array('id' => $_GPC['id'],'whoteam'=>2))?>" class="join-blue"><img src="../addons/hl_tug/style/mobile/blueteam-join.png"></a>
                <a href="<?php  echo $this->createMobileUrl('index', array('id' => $_GPC['id'],'whoteam'=>3))?>" class="join-randrom"><img src="../addons/hl_tug/style/mobile/randrom-join.png"></a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
var sw = $('.teamline span').width();
$('.teamline span').height(sw);
window.onload=function(){
$('.teamline span img,.teamline span p').width(sw-12);
$('.teamline span img').height(sw-12);
}
</script>
</body>
</html>