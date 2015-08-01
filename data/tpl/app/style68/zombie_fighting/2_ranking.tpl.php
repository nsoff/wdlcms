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
body {
	background-color: #A19A8C;
}

.top {
	height: 50px;
	padding: 6px 5px 0px 50px;
	font-size: 14px;
}

.top .score,.prize-cont .prize {
	color: #fe0200;
}

.top2 {
	height: 50px;
	padding: 6px 5px 0px 50px;
	font-size: 14px;
}

.top2 .score,.prize-cont .prize {
	color: #fe0200;
}

.title-cont {
	padding: 10px 0px 0px 110px;
	position: relative;
	background: rgba(255, 255, 255, 0.6);
	width: 168px;
	border: 1px solid #FFFFFF;
	margin: 0px auto 5px;
	height: 51px;
}

.title-cont .limg {
	width: 91px;
	position: absolute;
	left: 0px;
	bottom: 0px;
}

.title-cont .title {
	font-weight: bold;
	overflow: hidden;
	height: 20px;
}

.title-cont .time {
	margin-top: 10px;
	font-size: 14px;
}

.title-cont .toptitle {
	font-size: 18px;
	font-weight: bold;
	color: #cc0100;
	position: absolute;
	top: 3px;
	left: 5px;
}

.title-cont .topnum {
	font-size: 16px;
	font-weight: bold;
	color: #fffdfe;
	position: absolute;
	bottom: 0px;
	left: 14px;
}

.title-cont .topnum .num {
	font-size: 26px;
	padding: 3px 3px 3px 0px;
}

.prize-cont,.lose-cont {
	padding: 10px 0px 0px 80px;
	position: relative;
	background: rgba(255, 255, 255, 0.6);
	width: 198px;
	border: 1px solid #FFFFFF;
	margin: 0px auto 5px;
	height: 51px;
}

.lose-cont {
	width: 208px;
	padding: 10px 0px 0px 70px;
}

.prize-cont .pimg {
	width: 51px;
	position: absolute;
	left: 10px;
	top: 5px;
}

.lose-cont .pimg {
	width: 48px;
	position: absolute;
	left: 10px;
	top: 4px;
}

.prize-cont .sncode {
	font-size: 14px;
	margin-top: 10px;
}

.prize-cont .sncode-used {
	font-size: 12px;
}

.sncode-used .code {
	text-decoration: line-through;
}

.record {
	position: relative;
	height: 50px;
}

.record .record_bg {
	position: absolute;
	top: 0px;
	left: 19px;
	width: 284px;
	z-index: -1
}

.record .i {
	position: absolute;
	top: 6px;
	left: 42px;
	color: #cc0001;
}

.record .i-2 {
	left: 37px;
}

.record .uname,.record .score {
	font-size: 18px;
	position: absolute;
	color: #FFF;
	top: 14px;
}

.record .uname {
	left: 70px;
	font-weight: bold;
	max-width: 140px;
	overflow: hidden;
	text-overflow: ellipsis;
}

.record .score {
	right: 26px;
}

.desc-cont {
	background: rgba(255, 255, 255, 0.6);
	width: 258px;
	border: 1px solid #FFFFFF;
	margin: 0px auto 50px;
	word-break: break-word;
	padding: 10px 10px 20px;
	font-size: 16px;
	line-height: 30px;
	height: auto;
}

.desc-cont2 {
	width: 258px;
	border: 1px solid #FFFFFF;
	margin: 0px auto 50px;
	word-break: break-word;
	padding: 10px 10px 20px;
	font-size: 16px;
	line-height: 10px;
}

.desc-cont h2 {
	text-align: center;
	margin-bottom: 8px;
}

.resultTips {
	margin: 5px 8px;
}

.resultTips li {
	float: left;
	text-align: center;
	display: inline-block;
	width: 50%;
}

.resultTips a {
	display: inline-block;
	margin: 0px; /* -webkit-transform:scale(1.2);*/
}

.resultTips .share {
	background-position: -12px -111px;
}

.resultTips .sale {
	background-position: -12px -150px;
}

.resultTips .tip {
	font-size: 12px;
	margin-top: 2px;
	padding-bottom: 10px;
	line-height: 1.2em;
}

#mask {
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: rgba(0, 0, 0, 0.7);
	display: none;
	z-index: 20000;
}

#mask img {
	position: fixed;
	right: 18px;
	top: 2px;
	width: 260px !important;
	height: 200px !important;
	z-index: 20001;
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
<title><?php  echo $flight_setting['title'];?>-积分排行榜</title>
</head>
<body>

<div class="wrapper">
    <img class="bg" src="../addons/zombie_fighting/template/style/images/bg_ranking.jpg" /> 
	<div class="top">
		您当前的积分是：<span class="score"> <?php  echo $theone['lastcredit'];?></span>分， 排名第 <?php  echo $theone['PM'];?>，
		击败了 <?php  echo $percent;?> %的对手。明天再战！ <br />
	</div>
	<div class="title-cont">
		<img class="limg" src="../addons/zombie_fighting/template/style/images/top_brand.png" />
		<div class="toptitle">积分排名</div>
		<div class="topnum">TOP<span class="num">10</span></div>
		<div class="title"><?php  echo $flight_setting['title'];?></div>
		<div class="time">
			( <?php  echo date('m-d', $flight_setting['start']);?>  ~   <?php  echo date('m-d', $flight_setting['end'])?> )
		</div>
	</div>
	
	<?php  if(is_array($ds)) { foreach($ds as $row) { ?>
		<div class="record">
			<img class="record_bg" src="../addons/zombie_fighting/template/style/images/record.png" />
			<strong class="i"><?php  echo $row['PM'];?></strong>
			<div class="uname">
				<?php  if(!empty($row['nickname'])) { ?> <?php  echo $row['nickname']?> <?php  } else { ?> <?php  echo $row['from_user']?> <?php  } ?>
			</div>
			<div class="score"><?php  echo $row['lastcredit'];?> 分</div>
		</div>
	<?php  } } ?>
	
	<div class="desc-cont">
		<h2><?php  echo $flight_setting['title'];?></h2>
		<h3>活动说明：</h3>
		<p>
			<?php  echo $flight_setting['description'];?>
		</p>
	</div>
</div>
<audio id="musicBg" src="../addons/zombie_fighting/template/style/mp3/ranking.wav" preload="auto" autoplay></audio>
</body> 
<script src="../addons/zombie_fighting/template/style/js/jquery-1.9.1.js" type="text/javascript"></script>
<script language='javascript'>
<?php 
    $jssdk = new JSSDK();
    $signPackage = $jssdk->GetSignPackage();
?>
wx.config({
    debug:false,
    appId: "<?php  echo $_W['account']['appid_share'];?>",
    timestamp: <?php  echo $signPackage["timestamp"];?>,
    nonceStr: '<?php  echo $signPackage["nonceStr"];?>',
    signature: '<?php  echo $signPackage["signature"];?>',
    jsApiList: [
        'onMenuShareTimeline','onMenuShareAppMessage','onMenuShareWeibo'
    ]
});
var shareMeta = {
    imgUrl:"<?php  echo $_W['siteroot'];?>addons/zombie_fighting/template/style/images/d-01.png",
    link :  "<?php  echo $_W['siteroot'];?><?php  echo $this->createMobileUrl('start', array('id' => $id))?>",
    desc : "您当前的积分是：  <?php  echo $theone['lastcredit'];?> 分， 排名第 <?php  echo $theone['PM'];?>， 击败了 <?php  echo $percent;?> %的对手。明天再战！",
    title : "您当前的积分是：  <?php  echo $theone['lastcredit'];?> 分， 排名第 <?php  echo $theone['PM'];?>， 击败了 <?php  echo $percent;?> %的对手。明天再战！"
};
wx.ready(function(){
    wx.onMenuShareTimeline(shareMeta);
    wx.onMenuShareAppMessage(shareMeta);
    wx.onMenuShareWeibo(shareMeta);
});
</script>
</html>