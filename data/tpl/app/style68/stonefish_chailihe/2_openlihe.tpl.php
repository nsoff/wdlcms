<?php defined('IN_IA') or exit('Access Denied');?>﻿<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="../addons/stonefish_chailihe/template/images/reset.css?2014-08-28" media="all" />
<link rel="stylesheet" type="text/css" href="../addons/stonefish_chailihe/template/images/prize.css?2014-08-28" media="all" />
<script type="text/javascript" src="../addons/stonefish_chailihe/template/images/common.js?2014-08-28"></script>
<script type="text/javascript" src="../addons/stonefish_chailihe/template/images/zepto_min.js?2014-08-28"></script>
<title><?php  echo $reply['title'];?></title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<meta name="Description" content="<?php  echo $reply['description'];?>" />
<!-- Mobile Devices Support @begin -->
<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
<meta content="telephone=no, address=no" name="format-detection">
<meta name="apple-mobile-web-app-capable" content="yes" /> <!-- apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
<meta content="no-cache" http-equiv="pragma">
<meta content="0" http-equiv="expires">
<!-- Mobile Devices Support @end -->
<style>
    img{max-width:100%!important;}
	body{background-color: <?php  echo $bgcolor;?>;}
	.copyright{color: <?php  echo $text02color;?>;}
	.prize-title,.prize-title-duijiang{color: <?php  echo $text01color;?>;}
	.prize-ps{color: <?php  echo $text01color;?>;}
</style>
<script type="text/javascript">  
window.onload = function() {
	var FormManager = {
		dom: {
			panel: ".panel-box",
			btnClose: ".panel-close"
		},
		init: function() {
			window.CMER.DomQuery(this.dom);

			this.dom.btnClose.addEventListener("click", this.hidePanel.bind(this), false);
		},
		showPanel: function() {
			this.dom.panel.classList.add("show");
		},
		hidePanel: function() {
			this.dom.panel.classList.remove("show");
		}
	}

	var MainManager = {
		dom: {
			<?php  $i=1;?>
			<?php  if(is_array($awarding)) { foreach($awarding as $awardingrow) { ?>
			<?php  if($awardingrow['pass']!='') { ?>btnExchange<?php  echo $i;?>: ".btn-exchange<?php  echo $i;?>",<?php  } ?>
			<?php  $i++;?>
            <?php  } } ?>
		},
		init: function() {
			window.CMER.DomQuery(this.dom);

			<?php  $i=1;?>
			<?php  if(is_array($awarding)) { foreach($awarding as $awardingrow) { ?>
			<?php  if($awardingrow['pass']!='') { ?>this.dom.btnExchange<?php  echo $i;?>.addEventListener("click", FormManager.showPanel.bind(FormManager), false);<?php  } ?>
			<?php  $i++;?>
            <?php  } } ?>
		}
	}

	MainManager.init();
	FormManager.init();
}
</script>
<style type="text/css"> 
.selectedtypeid{
	margin:10px;
	background:<?php  echo $text04color;?>;height:50px;
	color:<?php  echo $text05color;?>;
	-moz-border-radius: 10px;      /* Gecko browsers */
    -webkit-border-radius: 10px;   /* Webkit browsers */
    border-radius:10px;            /* W3C syntax */
}
.selectedtypeid select {
   background: transparent;
   width: 100%;color:<?php  echo $text05color;?>;
   padding: 5px;
   font-size: 16px;
   border: 0px;
   height: 50px;
   -webkit-appearance: none; /*for chrome*/
}
.con{
	background:<?php  echo $text04color;?>;
	color:<?php  echo $text05color;?>;
}
<?php  if($isinfo) { ?>.con .title{text-align:center;padding:5px 10px;}<?php  } ?>
.con .title a:link,.con .title a:focus,.con .title a:hover,.con .title a:active{
    color:<?php  echo $text05color;?>;
}
.textdj a:link,.textdj  a:focus,.textdj  a:hover,.textdj  a:active{
    color:<?php  echo $text05color;?>;
}
.con .end  a:link,.con .end  a:focus,.con .end  a:hover,.con .end  a:active{
    color:<?php  echo $text05color;?>;
}
.btn-send{
	border: none;
	border-radius: 5px;
	background: <?php  echo $text05color;?>;
	color:<?php  echo $text04color;?>;
	height: 45px;
	text-align: center;
	line-height: 45px;
	font-size: 16px;
	margin: 10px auto;
	width: 85%;
	display: block;
	left: 25px;
}
.text label{
	float: left;
	width: 20%;
	font-size: 17px;
	color: <?php  echo $text05color;?>;
	text-align: right;
	height: 45px;
	line-height: 70px;
	position: relative;
	white-space: nowrap;
}
.text input[type='email'],
.text input[type='text'],
.text input[type='tel']{
	margin-top: 25px;
	height: 20px;
	line-height: 20px;
	background-color: transparent;
	color: <?php  echo $text05color;?>;
	font-size: 17px;
	width: 70%;
	border: none;
	border-bottom: 1px solid <?php  echo $text05color;?>;
}
.text { margin:20px;}
</style> 
</head>
<body onselectstart="return true;" ondragstart="return false;">
    <div class="shadow-prize"></div>
    <div data-role="container" class="container">
        <header data-role="header"><!----></header>
        <section data-role="body" class="body">
            <?php  if($isinfo&&$zhongjiang) { ?>
			 <dl class="prize-ps-duijiang">
				<div class="con">
				    <div class="title"><?php  echo $reply['userinfo'];?></div>
					<div class="content">
						<div class="text">
						<form action="<?php  echo $userinfosave;?>" method="post">
                        <?php  if($reply['isrealname']==1) { ?><label for="info-name">姓　名</label><input type="text" name="info-name" value="<?php  echo $profile['realname'];?>" /><?php  } ?>
                        <?php  if($reply['ismobile']==1) { ?> <label for="info-tel">手　机</label><input type="tel" name="info-tel"  value="<?php  echo $profile['mobile'];?>" /><?php  } ?>
						<?php  if($reply['isqq']==1) { ?> <label for="info-qqhao">ＱＱ号</label><input type="tel" name="info-qqhao"  value="<?php  echo $profile['qq'];?>" /><?php  } ?>
						<?php  if($reply['isemail']==1) { ?> <label for="info-email">邮　箱</label><input type="email" name="info-email"  value="<?php  echo $profile['email'];?>" /><?php  } ?>
						<?php  if($reply['isaddress']==1) { ?> <label for="info-address">地　址</label><input type="text" name="info-address"  value="<?php  echo $profile['address'];?>" /><?php  } ?>
                        <input type="submit" class="btn-send" value="保存资料" />
						</form>
						</div>					
					</div>
					<div class="end"></div>
				</div>
			</dl>
			<?php  } else { ?>
            <div class="prize-title"><?php  echo $lihegift['lihetitle'];?></div>
            
			<?php  if($zhongjiang==0) { ?>
			<div class="shadow-nojiang"><img src="<?php  echo $picnojiang;?>" /></div>
			<?php  } else { ?>
			<img src="<?php  echo $awardpic;?>" class="prize-img" />
            <div class="shadow-cloud"></div>
            <dl class="prize-ps">
                <?php  if($lihegift['inkind']) { ?>
				<dt>奖品名称：</dt><dd><?php  echo $lihegift['title'];?></dd>
				<dt>使用规则：</dt><dd><?php  echo $lihegift['description'];?></dd>
                <dt>兑奖状态：</dt><dd><?php  if($zhongjiang==2) { ?>已兑奖<?php  } else { ?><?php  if($zhongjiang==1) { ?>未兑奖<?php  } ?><?php  } ?></dd>
				<dt>兑奖说明：</dt><dd><?php  echo $reply['activityinfo'];?></dd>
				<?php  } else { ?>
				<dt>奖品名称：</dt><dd><?php  echo $lihegift['title'];?></dd>
				<dt>使用规则：</dt><dd><?php  echo $lihegift['description'];?></dd>
				<dt>奖品类型：</dt><dd><?php  echo $mikaid['typename'];?></dd>
				<dt>价值：</dt><dd><?php  echo $mikaid['description'];?></dd>
				<dt>兑换码：</dt><dd><?php  echo $mikaid['mika'];?></dd>
				<?php  if($mikaid['activationurl']!='') { ?><dt>兑换地址：</dt><dd><a href="<?php  echo $mikaid['activationurl'];?>"><?php  echo $mikaid['activationurl'];?></a></dd><?php  } ?>
				<dt>兑奖说明：</dt><dd><?php  echo $reply['activityinfo'];?></dd>
				<?php  } ?>
            </dl>
			<?php  if($reply['awarding'] and $lihegift['inkind']) { ?>			
			<div class="prize-title-duijiang"><a name="djd" id="djd" ></a>选择下面的兑奖区</div>
			    <div class="selectedtypeid">
				    <select name="typeid" onchange="self.location.href=options[selectedIndex].value">
				    <option value="<?php  echo $gotoduijiang;?>" selected="selected">根据您的地点选择兑奖点</option>
					<?php  if(is_array($typelist)) { foreach($typelist as $types) { ?>
						<option value="<?php  echo $gotoduijiang.'&typeid='.$types['id'].'#djd'?>"<?php  if($types['id']==$_GPC['typeid']) { ?> selected="selected"<?php  } ?>><?php  echo $types['quyutitle'];?></option>
					<?php  } } ?>							
				    </select>
				</div>
			<?php  } ?>			
			<?php  if($awarding!='' and $lihegift['inkind']) { ?>
			<div class="prize-title-duijiang">兑奖地点</div>
			  <dl class="prize-ps-duijiang">
				<?php  $i=1;?>
				<?php  if(is_array($awarding)) { foreach($awarding as $awardingrow) { ?>
				<div class="con">
				    <div class="title"><?php  echo $i;?>、<?php  echo $awardingrow['shoptitle'];?></div>
					<div class="content">
					    <?php  if($zhongjiang==1) { ?>
	    				<?php  if($awardingrow['pass']!='') { ?><div class="textdj"><a href="javascript:void(0);" class="btn-exchange<?php  echo $i;?>" >由此商家输入密码当面兑奖</a></div><?php  } else { ?><div class="textdj">向此商家展示兑奖</div><?php  } ?>
						<?php  } ?>
						<?php  if($awardingrow['images']!='') { ?><div class="text"><img src="<?php  echo $_W['attachurl'];?><?php  echo $awardingrow['images'];?>" /></div><?php  } ?>
						<?php  if($awardingrow['address']!='') { ?><div class="text">地址：<?php  echo $awardingrow['address'];?></div><?php  } ?>						
					</div>
					<div class="end">
	    				<div class="canyu"><a href="tel:<?php  echo $awardingrow['tel'];?>">TEL：<?php  echo $awardingrow['tel'];?></a></div>
						<?php  if($awardingrow['carmap']!='') { ?><div class="mycanyu"><a href="http://api.map.baidu.com/marker?location=<?php  echo $awardingrow['carmap'];?>&title=<?php  echo urlencode($awardingrow['shoptitle'])?>&content=<?php  echo $awardingrow['address'];?>&output=html&src=weiba|weiweb">导航</a></div><?php  } ?>
					</div>
				</div>
				<?php  $i++;?>
                <?php  } } ?>				
            </dl>
			<?php  } ?>
			<?php  } ?>			
            <div class="btn-layout">
                <a href="<?php  echo $mylihe;?>" class="btn-see"></a>
                <?php  if($giftlihe!=0) { ?><a href="<?php  echo $againreglihe;?>" class="btn-again2"></a><?php  } ?>
            </div>
			<?php  } ?>
        </section>
        <footer data-role="footer">
            <?php  if($reply['iscopyright']==1) { ?><a href="<?php  echo $reply['copyrighturl'];?>" class="copyright">&copy;<?php  echo $reply['copyright'];?></a><?php  } else { ?><a href="javascript:;" class="copyright"><?php  if(empty($footer_off)) { ?>&copy;<?php  if(empty($_W['account']['name'])) { ?>微赞团队<?php  } else { ?><?php  echo $_W['account']['name'];?><?php  } ?>&nbsp;&nbsp;<?php  echo $_W['setting']['copyright']['statcode'];?><?php  } ?></a><?php  } ?>
        </footer>
    </div>
    <div class="panel-box">
        <div class="panel-content">
            <div class="panel-close"></div>
            <span class="icon-prize-useless"></span><br/>有兑奖地点输入兑奖密码进行兑奖
            <hr class="common-hr" />
            <form action="<?php  echo $liheduijiang;?>" method="post">
                <label for="info-pass">兑换密码</label>
                <input type="hidden" value="<?php  echo $uid;?>" name="info-prize">                
                <input type="text" name="info-pass" />
                <div class="btn-layout">
                    <input type="reset" class="btn-reset" value="重填"/>
                    <input type="submit" class="btn-confirm" value="确定"/>
                </div>
            </form>
        </div>
    </div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('jssdk', TEMPLATE_INCLUDEPATH)) : (include template('jssdk', TEMPLATE_INCLUDEPATH));?>
</body>
</html>