<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
<link type="text/css" rel="stylesheet" href="../addons/jufeng_wcy/images/common.css">
<link type="text/css" rel="stylesheet" href="http://cdn.staticfile.org/fancybox/2.1.5/jquery.fancybox.min.css">
<script type="text/javascript" src="http://cdn.staticfile.org/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.fancybox').fancybox();
		$('.fancybox-skin').css("padding","0");
	});
</script>

<div class="navbar3">
            <div class="nav2">
            <a class="btn btn2 btn-default" href="<?php  echo $this->createMobileUrl('dianjia')?>"><i class="glyphicon glyphicon-chevron-left"></i>店铺</a>
            <a class="btn btn-success" href="<?php  if($pricetotal >= $category1[0]['sendprice']) { ?><?php  echo $this->createMobileUrl('mycart',array('pcate'=>$_GPC['pcate'],'ccate'=>$_GPC['ccate']))?><?php  } else { ?>#<?php  } ?>">
            <b class="between"><?php  if($pricetotal >= $category1[0]['sendprice']) { ?>去结算
            <?php  } else { ?>差￥<?php  echo $between;?>起送<?php  } ?></b>
            
            </a>
             <span class=""><i class="icon-shopping-cart"></i><b class="img-circle pcateimg"></b>份￥<b class="priceimg"></b></span>
            </div>
</div>

         <div class="menu-button menu-button3">
		<ul class="list-unstyled">
			
			<li><a style="background-color:#F93;color:white;text-align:left; padding:0; padding-left:5px; font-weight:bold; font-size:14px;" class="active" href="#">店家介绍</a></li>
<div class="menu-pic2">
					<div class="dianjiadiv"><?php  if($category1[0]['thumb']) { ?><img src="<?php  echo $_W['attachurl'];?><?php  echo $category1[0]['thumb'];?>" class="img-rounded dianjialist">
                    <?php  } else { ?><img src="<?php  echo $_W['attachurl'];?>/headimg_<?php  echo $_W['weid'];?>.jpg" class="img-rounded dianjialist">
                    <?php  } ?></div>
                    <div class="namelist dianjiadiv"><?php  echo $category1[0]['name'];?></div>
				</div>
<li class="dianjiali">起送价：<?php  echo $category1[0]['sendprice'];?></li>
<li class="dianjiali">店家热度：<?php  echo $category1[0]['total'];?></li>
<li class="dianjiali">店家手机：<br /><?php  echo $category1[0]['shouji'];?></li>
<li class="dianjiali">店家简介：<br /><?php  echo $category1[0]['description'];?></li>
<li class="dianjiali">中午送餐时间：<br /><?php  echo $ptime1;?>至<?php  echo $ptime2;?></li>
<li class="dianjiali">下午送餐时间：<br /><?php  echo $ptime3;?>至<?php  echo $ptime4;?></li>

		</ul>
	</div>

	<div class="menu-list menu-list2">
    <div class="panel panel-default" style="margin-top:10px;margin-bottom:0;padding-bottom:10px;">
						<div class="panel-heading">
							<h4 class="panel-title">选择菜系</h4>
						</div>
    <a class="btn <?php  if($_GPC['ccate'] == 0) { ?>btn-success<?php  } else { ?>btn-default<?php  } ?>" style="margin: 5px 0 3px 5px;" href="<?php  echo $this->createMobileUrl('list', array('pcate' => $category1[0]['id'],'order' =>$_GPC['order']))?>" role="button">全部菜系</a>
    <?php  if(is_array($category1)) { foreach($category1 as $item) { ?>
    <?php  if(is_array($children[$item['id']])) { foreach($children[$item['id']] as $citem) { ?>
    <a class="btn <?php  if($citem['id'] == $_GPC['ccate']) { ?>btn-success<?php  } else { ?>btn-default<?php  } ?>" style="margin: 5px 0 3px 5px;" href="<?php  echo $this->createMobileUrl('list', array('ccate' => $citem['id'],'order' =>$_GPC['order']))?>" role="button"><?php  echo $citem['name'];?></a>
    <?php  } } ?><?php  } } ?>
	</div>
		<ul class="list-unstyled">
			<?php  if(is_array($list)) { foreach($list as $item) { ?>
			<li class="shopli">
				<div class="pull-right">
                <?php  if($category1[0]['enabled'] == "0") { ?>
                <div>&nbsp;&nbsp;</div>
                    <div><span class="label label-info">休息中</span></div>
                    <?php  } else if($item['status'] == "1") { ?>
					<div class="menu-list-button add" onclick="order.add(<?php  echo $item['id'];?>)"><i class="glyphicon glyphicon-plus-sign"></i></div>
					<div class="menu-list-num" id="foodsnum_<?php  echo $item['id'];?>"><?php  echo $item['foodsid'][$item['id']]['total'];?></div>
					<div class="menu-list-button reduce" onclick="order.reduce(<?php  echo $item['id'];?>);"><i class="glyphicon glyphicon-minus-sign"></i></div>
                    <?php  } else { ?>
                    <div>&nbsp;&nbsp;</div>
                    <div><span class="label label-info">卖完了</span></div>
                    <?php  } ?>
				</div>
				<div class="pull-left menu-pic">
                    <?php  if($item['thumb']) { ?><img src="<?php  echo $_W['attachurl'];?><?php  echo $item['thumb'];?>" class="img-rounded">
                    <?php  } else { ?><img src="<?php  echo $_W['attachurl'];?>/headimg_<?php  echo $_W['weid'];?>.jpg" class="img-rounded">
                    <?php  } ?>
                    <?php  if($item['ishot'] == 1) { ?><img class="hot" src="../addons/jufeng_wcy/images/hot.png"><?php  } ?>
				</div>
				<div class="pull-left menu-detail">
					<span class="title"><?php  echo $item['title'];?></span>
					<span class="price">
                   
                    <?php  if($item['preprice']) { ?><i class="label label-success">优惠</i> <?php  echo $item['preprice'];?>元
                    <?php  if($item['unit']) { ?>/<?php  echo $item['unit'];?><?php  } ?>
                    <?php  } else { ?><?php  echo $item['oriprice'];?>元
                    <?php  if($item['unit']) { ?>/<?php  echo $item['unit'];?>
                    <?php  } ?>
                    <?php  } ?></span>
					<?php  if($item['preprice']) { ?><span class="oriprice"><?php  echo $item['oriprice'];?>元
                    <?php  if($item['unit']) { ?>/<?php  echo $item['unit'];?>
                    <?php  } ?></span>
                    <?php  } ?>
					<span class="click"><?php  echo $item['hits'];?>人点过</span>
				</div>
			</li>
            <div class="shopfoot"></div>
			<?php  } } ?>
		</ul>
		<?php  echo $pager;?>
	</div>
   
<div class="navbar1 navbar2 btn-group btn-group-justified">
     <div class="btn-group btn-group-lg dropup">
        <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php  if($_GPC['order'] == 0) { ?>默认排序<?php  } else if($_GPC['order'] == 1) { ?>按热度<?php  } else if($_GPC['order'] == 2) { ?>按优惠<?php  } ?><span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
          <li <?php  if($_GPC['order'] == 0) { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createMobileUrl('list', array('pcate'=>$_GPC['pcate'],'ccate'=>$_GPC['ccate'],'order' =>0))?>">默认排序</a></li>
           <li class="divider"></li>
          <li <?php  if($_GPC['order'] == 1) { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createMobileUrl('list', array('pcate'=>$_GPC['pcate'],'ccate'=>$_GPC['ccate'],'order' =>1))?>">按热度</a></li>
           <li class="divider"></li>
          <li <?php  if($_GPC['order'] == 2) { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createMobileUrl('list', array('pcate'=>$_GPC['pcate'],'ccate'=>$_GPC['ccate'],'order' =>2))?>">按优惠</a></li>
        </ul>
      </div>
      <div class="btn-group btn-group-lg">
      <a href="<?php  echo $this->createMobileUrl('myorder',array('pcate'=>$_GPC['pcate'],'ccate'=>$_GPC['ccate']))?>" class="btn btn-default" role="button"><i class="glyphicon glyphicon-th-list"></i>&nbsp;我的订单</a>
      </div>
      <div class="btn-group btn-group-lg">
      <a href="#" class="btn btn-default shopping-type3" role="button"><i class="icon-star"></i>店家介绍</a>
      </div>
    </div>
<script>
function menuData(a) {
	var a = $(a);
	var e = 0;
	var b = $('.menu-button li a').parent();
	a.parent().parent().find('.menu-list-num').each(function(i) {
		e = parseInt($(this).html()) + e;
	});
	if(b.find('.img-circle').html() == '') b.find('.img-circle').html(0);
	e = 0;
}
		$('.pcateimg').html('<?php  echo $pcatetotal;?>');
		$('.priceimg').html('<?php  echo $pricetotal;?>');
$('.menu-button3').css({"display": "none"});
$('.shopping-type3').click(function() {
	var a = $(this).attr("switch");
	if(a == 1) {
		$('.menu-button3').css({"display": "none"});
		$('.menu-list').css({"margin-left": "10px"});
		$(this).attr("switch", 0);
	} else {
		$('.menu-button3').css({"display": "block"});
		$('.menu-button1').css({"display": "none"});
		$('.shopping-type').attr("switch", 0);
		$('.shopping-type').find("span").html("菜系");
		$('.menu-button2').css({"display": "none"});
		$('.shopping-type2').attr("switch", 0);
		$('.menu-list').css({"margin-left": "10px"});
		$(this).attr("switch", 1);
	}
	return false;
});


var order = {
	'add' : function(foodsid) {
		var $this = this;
		$this.cart(foodsid, 'add');
	},
	'reduce' : function(foodsid) {
		var $this = this;
		$this.cart(foodsid, 'reduce');
	},
	'cart' : function(foodsid, operation) {
		if (!foodsid) {
			alert('请选择菜品!');
			return;
		}
		operation = operation ? operation : 'add';
		href ="<?php  echo $this->createMobileUrl('mycart',array('pcate'=>$_GPC['pcate'],'ccate'=>$_GPC['ccate']))?>";
		$.getJSON('<?php  echo $this->createMobileUrl('updatecart',array('pcate'=>$_GPC['pcate'],'ccate'=>$_GPC['ccate']))?>', {'op' : operation, 'foodsid' : foodsid}, function(s){
			if (s.message.status) {
				$('#foodsnum_'+foodsid).html(s.message.total);
						$('.pcateimg').html(s.message.pcatetotal);
				menuData('#foodsnum_'+foodsid);
				$('.priceimg').html(s.message.pricetotal);
				$('.between').html(s.message.between);
				if(s.message.target == "#")
				$('.btn-success').attr("href","#");
				else if(s.message.target == "1") $('.btn-success').attr("href",href);
			} else {
				alert(s.message.message);
			}
		});
	}
};
</script>
<?php  $footer_off = 0;?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>