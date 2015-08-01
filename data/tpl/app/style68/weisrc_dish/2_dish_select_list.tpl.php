<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="format-detection" content="telephone=no" />
<title>智能点菜</title>
<link rel="stylesheet" type="text/css" href="../addons/weisrc_dish/template/css/1/wei_canyin_v1.8.4.css?v=1.0" media="all">
<link rel="stylesheet" type="text/css" href="../addons/weisrc_dish/template/css/1/wei_dialog_v1.2.1.css?v=1.0" media="all">
<script type="text/javascript" src="../addons/weisrc_dish/template/js/1/wei_webapp_v2_common_v1.9.4.js"></script>
<script type="text/javascript" src="../addons/weisrc_dish/template/js/1/wei_dialog_v1.9.9.js"></script>

</head>
<body id="page_intelOrder" class="intelPage">
<div class="center">
	<header>
		<span class="pCount">共<?php  echo $num;?>人用餐<a href="<?php  echo $this->createMobileUrl('wapselect', array('storeid' => $storeid, 'from_user' => $from_user), true)?>">重选人数</a></span>
        <label><i>共计：</i><b class="duiqi"><?php  echo $total_money;?>元</b></label>
	</header>
	<section>
        <?php  if(is_array($categorys)) { foreach($categorys as $category) { ?>
        <article>
            <h2><?php  echo $category['name'];?></h2>
            <?php  if(is_array($goods_arr)) { foreach($goods_arr as $goods) { ?>
            <?php  if($category['id'] == $goods['pcate']) { ?>
            <dl dUnitName="<?php  echo $goods['unitname'];?>" dSubCount="<?php  echo $goods['subcount'];?>" dishid="<?php  echo $goods['id'];?>" dName="<?php  echo $goods['title'];?>" dTaste="<?php  echo $goods['taste'];?>" dDescribe="<?php  echo $goods['description'];?>" dPrice="<?php  echo $goods['productprice'];?>" dIsHot="<?php  if($goods['subcount']>20) { ?>2<?php  } else { ?>1<?php  } ?>" dPicture="<?php  echo $_W['attachurl'];?><?php  echo $goods['thumb'];?>" dSpecialPrice="<?php  echo $goods['marketprice'];?>" dIsSpecial="<?php  echo $goods['isspecial'];?>">
                <dt><h3><?php  echo $goods['title'];?></h3></dt>
                <dd><a href="javascript:void(0)" class="dataIn"><img src="<?php  echo $_W['attachurl'];?><?php  echo $goods['thumb'];?>"  alt="12"  title="" /></a></dd>
                <dd>
                    <?php  if($goods['isspecial']==1) { ?>
                    <em><?php  echo $goods['productprice'];?>元/<?php  echo $goods['unitname'];?></em>
                    <?php  } else if($goods['isspecial']==3) { ?>
                    <em><?php  echo $goods['marketprice'];?>元/<?php  echo $goods['unitname'];?><del><?php  echo $goods['productprice'];?>元/<?php  echo $goods['unitname'];?></del></em>
                    <?php  } else if($goods['isspecial']==2) { ?>
                    <em><?php  echo $goods['marketprice'];?>元/<?php  echo $goods['unitname'];?><del><?php  echo $goods['productprice'];?>元/<?php  echo $goods['unitname'];?></del></em>
                    <?php  } ?>
                </dd>
                <dd class="dpNum"><?php  echo $goods['subcount'];?>人点过</dd>
                <dd class="dpFen">&times;1</dd>
            </dl>
            <?php  } ?>
            <?php  } } ?>
        </article>
        <?php  } } ?>
        </section>
	<footer class="footFix">
        <a class="btn_add" href="<?php  echo $this->createMobileUrl('waplist', array('storeid' => $storeid, 'from_user' => $from_user), true)?>" >返回列表</a>
		<a id="addToMenu" class="btn_add" href="<?php  echo $this->createMobileUrl('addtomenu', array('storeid' => $storeid, 'from_user' => $from_user, 'num' => $num, 'intelligentid' => $intelligentid), true)?>">加入菜单</a>
		<a class="btn_change" href="<?php  echo $this->createMobileUrl('wapselectlist', array('storeid' => $storeid, 'from_user' => $from_user, 'num' => $num, 'intelligentid' => $intelligentid), true)?>" onclick="showDish()">换一桌</a>
	</footer>
</div>
<script type="text/javascript">
var isMenuFilled = '1';
var view_const_dish_SPECIAL_PRICE_YES = '2';
var view_const_dish_SPECIAL_PRICE_VIP = '3';
var view_const_dish_HOT_YES = '2';
isMenuFilled = (isMenuFilled == '1');
    //点击促发弹层事件
    function showPicInfo(){
        var links = _qAll(".dataIn"), i=0;
        for(i;i<links.length;i++){
            links[i].onclick=function(event){
                event.stopPropagation();
                var parentDl = this.parentNode.parentNode;
                popPic(parentDl.getAttribute('dpicture'),
                        parentDl.getAttribute('dname'),
                        parentDl.getAttribute('dprice') + '元/' + parentDl.getAttribute('dunitName'),
                        parentDl.getAttribute('dIsSpecial'),
                        parentDl.getAttribute('dSpecialPrice') + '元/' + parentDl.getAttribute('dunitName'),
                        parentDl.getAttribute('dsubCount'),
                        parentDl.getAttribute('dtaste'),
                        parentDl.getAttribute('ddescribe'),
                        parentDl.getAttribute('dishot')
                );
            }
        }
    }

    //后台可自行扩展参数
    //调用自定义弹层
    function popPic(imgUrl,title,price, isSpecial, specialPrice, people,teast,assess,isHot){
        var _title = title,
            _price = price,
            _people = people,
            _teast = teast,
            _assess = assess;

        var hotHtml = '';
        if (isHot == view_const_dish_HOT_YES) {
            hotHtml = '<b></b>';
        }
        _tmpHtml = "<div class='content'>"+hotHtml+"<img src='"+imgUrl+"' alt='' title=''><h2>"+_title;

        if (isSpecial == view_const_dish_SPECIAL_PRICE_YES || isSpecial == view_const_dish_SPECIAL_PRICE_VIP) {
            _tmpHtml += "<i>"+specialPrice+"</i><del>"+_price+"</del>";
        } else {
            _tmpHtml += "<i>"+_price+"</i>";
        }

        if (_people) {
            _tmpHtml += "<span>"+_people+"人点过</span>";
        }
        _tmpHtml += "</h2>";

        if (_teast) {
            _tmpHtml += "<h3>口味："+_teast+"</h3>";
        }

        if (_assess) {
            _tmpHtml += "<p>"+_assess+"</p>";
        }

        _tmpHtml += '</div>';
        MDialog.popupCustom(_tmpHtml,true, function(){}, true);
    }


window.onload = function(){

    /*
    var imgs = document.getElementsByTagName("img"),
        tmpImg;
    for(tmpImg in imgs){
            imgs[tmpImg].onclick = function(){
            var surl = this.src; 
            MDialog.popupImage(surl);//图片弹层
        }
    }
    */
    showPicInfo();
}
function showDish() {
    MLoading.show('努力配菜中...');
    setTimeout(function(){MLoading.hide();},1500);
}

_q('#addToMenu').onclick = function() {
    var self = this;
    if (isMenuFilled) {
        MDialog.confirm(
            '', '加入菜单前是否需要保留您上一次的菜单？', null,
            '保留', function(){
                window.location.href = self.getAttribute('href') +  '#wechat_webview_type=1';
            }, null,
            '不保留', function() {
                window.location.href = self.getAttribute('href') + '&clearMenu=1#wechat_webview_type=1';
            }, null,
            null, true, true
        );
    } else {
        window.location.href = this.getAttribute('href') + '#wechat_webview_type=1';
    }
    return false;
};
</script>
</body>
</html>