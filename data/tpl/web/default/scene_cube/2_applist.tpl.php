<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<link href="../addons/scene_cube/style/css/global.css?&versin=12" rel="stylesheet" type="text/css" />
<section class="p-store m-storeLists" style="margin-top:10px">
<div class="store-top m-listSer f-hght70 fixed">
<a id="search"></a>
<p class="tag-txt f-flow444 s-col-fff">
<strong class="f-size24 s-col-999">All Sence<em class="f-size14 f-mag-l-10">简易连接，极致体验！</em></strong>
</p>
<form action="#search" method="post" name="searchForm">
<p class="u-search f-flow222">
<input type="text" placeholder="搜索关键词" name="keyword" value="<?php  echo $_GPC['keyword'];?>">
<span class="css_sprite s-bg-search f-cur" onclick="document.forms['searchForm'].submit();"></span>
</p>
</form>
</div>
<div class="m-storeLists-bd">
<div id="storeLappLists" class="store-left m-listCshow">
<div class="f-clear"></div>
<div id="appListBox">
<?php  if(is_array($list)) { foreach($list as $row) { ?>
	<div class="item">
		<div class="u-listShow f-card">
			<div class="item-top" style="">
				<a href="<?php  echo $this->createWeburl('manager',array('foo'=>'create','step'=>2,'s_id'=>$row['id'],'iden'=>$row['iden']))?>" style="color: #000;">
				<?php  if(empty($row['thumb'])) { ?>
					<img alt="<?php  echo $row['title'];?>" src="../addons/scene_cube/style/img/nopic.jpg">
					<span></span>
					<p class="f-tc">
 					</p>
				<?php  } else { ?>
					<img alt="<?php  echo $row['title'];?>" src="<?php  echo toimage($row['thumb'])?>">
					<span></span>
					<p class="f-tc">
					<img alt="二维码" src="<?php  echo toimage($row['qrcode'])?>" style="width: 200px; height: 200px;">
					</p>
				<?php  } ?>
				</a>
			</div>
			<div class="item-bottom s-bg-fff" style="">
				<div class="tit">
					<h4 title="<?php  echo $row['title'];?>"><a href="<?php  echo $this->createWeburl('manager',array('foo'=>'create','step'=>2,'s_id'=>$row['id'],'iden'=>$row['iden']))?>"><?php  echo cutstr($row['title'],8)?></a></h4>
					<p data-author="<?php  echo $row['author'];?>">by <a href="javascript:void(0)"><?php  echo $row['author'];?></a></p>
					<span class="css_sprite s-bg-qr_icon icon-qr"></span>
				</div>
				<div class="con">
				<strong class="f-tr" data-series="<?php  echo $row['series'];?>"><a href="javascript:void(0);">【<?php  echo $row['series'];?>】</a></strong>
				</div>
			</div>
		</div>
	</div>
<?php  } } ?>
</div>
	<div class="f-clear"></div>
	</div>
		<!-- left-con end-->
		</div>
		<!-- content end-->
	</section>
 <script>

$(".icon-qr").hover(function(){
	var qr_img = $(this).parents('.item-bottom').prev().find('p');
	qr_img.addClass('show');
},function(){
	var qr_img = $(this).parents('.item-bottom').prev().find('p');
	qr_img.removeClass('show');	
});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>