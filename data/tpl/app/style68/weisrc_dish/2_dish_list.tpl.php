<?php defined('IN_IA') or exit('Access Denied');?>
<html lang="zh-CN"><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="format-detection" content="telephone=no">
<title>全部菜品</title>
<link rel="stylesheet" type="text/css" href="../addons/weisrc_dish/template/css/1/wei_canyin_v1.8.4.css?v=1.1" media="all">
<link rel="stylesheet" type="text/css" href="../addons/weisrc_dish/template/css/1/wei_dialog_v1.2.1.css?v=1.1" media="all">

<style>
    /*解决右边背景总是为灰色的bug*/
    #page_allMenu section article, #pInfo {
        min-height: 100%;
    }
</style>
<script type="text/javascript" src="../addons/weisrc_dish/template/js/1/wei_webapp_v2_common_v1.9.4.js"></script>
<style>abbr,article,aside,audio,canvas,datalist,details,dialog,eventsource,fieldset,figure,figcaption,footer,header,hgroup,mark,menu,meter,nav,output,progress,section,small,time,video,legend{display:block;}</style>
<script type="text/javascript" src="../addons/weisrc_dish/template/js/1/wei_dialog_v1.9.9.js"></script>
<script type='text/javascript' src='../addons/weisrc_dish/template/js/2/jQuery.js?v=1'></script>
</head>
<body id="page_allMenu">
<div class="center">
    <nav id="navBar">
        <dl>
            <?php  $flag = false;?>
            <?php  if(is_array($category)) { foreach($category as $item) { ?>
                <dd categoryid="<?php  echo $item['id'];?>" <?php  if($flag!=true) { ?>class="active"<?php  } ?>>
                    <?php  echo $item['name'];?>
                    <?php  if(empty($category_arr[$item['id']])) { ?>
                    <span style="display:none;"></span>
                    <?php  } else { ?>
                    <span style="display:inline-block;"><?php  echo $category_arr[$item['id']];?></span>
                    <?php  } ?>
                </dd>
                <?php  $flag = true;?>
            <?php  } } ?>
        </dl>
    </nav>
    <section id="infoSection">
        <article>
            <div id="pInfo">
                <?php  if(is_array($list)) { foreach($list as $row) { ?>
                <dl dunitname="<?php  echo $row['unitname'];?>" dsubcount="<?php  echo $row['subcount'];?>" dishid="<?php  echo $row['id'];?>" dname="<?php  echo $row['title'];?>" dtaste="<?php  echo $row['taste'];?>" ddescribe="<?php  echo $row['description'];?>" dprice="<?php  echo $row['productprice'];?>" dishot="<?php  if($row['subcount']>20) { ?>2<?php  } else { ?>0<?php  } ?>" dspecialprice="<?php  echo $row['marketprice'];?>" disspecial="<?php  echo $row['isspecial'];?>" shopinfo="">
                    <dt><h3><?php  echo $row['title'];?></h3></dt>
                    <dd>
                        <a href="javascript:void(0)" class="dataIn">
                            <img src="<?php  echo $_W['attachurl'];?><?php  echo $row['thumb'];?>" alt="" title="">
                            <?php  if($row['subcount']>20) { ?>
                            <span></span>
                            <?php  } ?>
                        </a>
                    </dd>
                    <dd><?php  if($row['isspecial']==1) { ?>
                        <em><?php  echo $row['productprice'];?>元/<?php  echo $row['unitname'];?></em>
                        <?php  } else if($row['isspecial']==3) { ?>
                        <em><b class="vip">会员</b><?php  echo $row['marketprice'];?>元/<?php  echo $row['unitname'];?><br><del><?php  echo $row['productprice'];?>元/<?php  echo $row['unitname'];?></del></em>
                        <?php  } else if($row['isspecial']==2) { ?>
                        <em class="sale"><b>特价</b><?php  echo $row['marketprice'];?>元/<?php  echo $row['unitname'];?><br><del><?php  echo $row['productprice'];?>元/<?php  echo $row['unitname'];?></del></em>
                        <?php  } ?>
                    </dd>
                    <dd class="dpNum"><?php  echo $row['subcount'];?>人点过</dd>
                    <dd class="btn">
                        <button class="minus" style="display:inline-block;"><strong></strong></button>
                        <i style="display: inline-block;"><?php  if(!empty($dish_arr[$row['id']])) { ?><?php  echo $dish_arr[$row['id']];?><?php  } else { ?>0<?php  } ?></i>
                        <button class="add"><strong></strong></button>
                        <em class="fixBig fake"></em>
                    </dd>
                </dl>
                <?php  } } ?>
                <div style="margin-top: 60px;"></div>
            </div>
        </article>
    </section>
    <?php  include $this->template('_header');?>
    <?php  include $this->template('_footer');?>
</div>
<script type="text/javascript">
    var view_const_dish_SPECIAL_PRICE_YES = '2';
    var view_const_dish_SPECIAL_PRICE_VIP = '3';
    var view_const_dish_HOT_YES = '2';
    function setHeight(){
        var  cHeight;
        cHeight = document.documentElement.clientHeight;
        cHeight = cHeight +"px"
        document.getElementById("navBar").style.height =  cHeight;
        document.getElementById("infoSection").style.height =  cHeight;
    }
    //ajax处理
    //配合_doAjax方法使用
    function doSelect(){
        var dds = _qAll('#navBar dd');
        var aa=0, bb;
        var article = _q("#infoSection article");
        _forEach(dds, function(ele, idx, dds) {
            dds[idx].onclick = function(){
                _q('.active').className = null;
                this.className = "active";
                var div = document.getElementById("pInfo");

                div.innerHTML = '';
                var params = {
                    'action' : 'getDishList',
                    'categoryid' : this.getAttribute('categoryId')
                };

                var url = "<?php  echo $this->createMobileUrl('GetDishList', array('storeid' => $storeid, 'from_user' => $from_user), true)?>";
                //alert(url);
                _doAjax(url, 'GET', params, function(ret) {
                    //alert(ret['message']['debug']);
                    var dishList = ret['message']['data'];
                    var categoryId = ret['message']['categoryid'];
                    var str = '';
                    var rnd = Math.random();

                    for(key in dishList) {
                        //alert(key);
                        var dish = dishList[key];
                        if (dish.dIsSpecial == view_const_dish_SPECIAL_PRICE_YES) {
                            var priceHtml = "<em class='sale'><b>特价</b>"+dish['dSpecialPrice']+"元/"+dish['unitname']+"<br/><del>"+dish['dPrice']+"元/"+dish['unitname']+"</del></em>";
                        } else if (dish.dIsSpecial == view_const_dish_SPECIAL_PRICE_VIP) {
                            var priceHtml = "<em><b class='vip'>会员</b>"+dish['dSpecialPrice']+"元/"+dish['unitname']+"<br/><del>"+dish['dPrice']+"元/"+dish['unitname']+"</del></em>";
                        } else {
                            var priceHtml = "<em>"+dish['dPrice']+"元/"+dish['unitname']+"</em>";
                        }
                        if (dish.dIsHot == view_const_dish_HOT_YES) {
                            var hotHtml = '<span></span>';
                        } else {
                            var hotHtml = '';
                        }
                        if (dish['dSubCount']) {
                            var dSubCountHtml = dish['dSubCount'] + '人点过';
                        } else {
                            var dSubCountHtml = '';
                        }
                        var attrList = " dUnitName='"+dish['unitname']+"' dSubCount='"+dish['dSubCount']+"' dishid='"+dish['id']+"' dName='"+dish['title']+"' dTaste='"+dish['dTaste']+"' dDescribe='"+dish['dDescribe']+"' dPrice='"+dish['dPrice']+"' dIsHot='"+dish['dIsHot']+"' dSpecialPrice='"+dish['dSpecialPrice']+"' dIsSpecial='"+dish['dIsSpecial']+"' ";
                        str += "<dl shopInfo='' "+attrList+"'><dt><h3>"+dish['title']+"</h3></dt><dd><a href='javascript:void(0)' class='dataIn'><img src='<?php  echo $_W['attachurl'];?>" + dish['thumb'] + "?rnd="+rnd+"' alt='' title='' />"+hotHtml+"</a></dd><dd>"+priceHtml+"</dd><dd class='dpNum'>"+dSubCountHtml+"</dd><dd class='btn'><button class='minus'><strong></strong></button><i>"+dish['total']+"</i><button class='add'><strong></strong></button><em class='fixBig fake'></em></dd></dl>";
                    }
                    str += '<div style="margin-top: 60px;"></div>';

                    if (_q('.active').getAttribute('categoryId') == categoryId) {
                        div.innerHTML = str;
                        _q('#infoSection').scrollTop = 0;
                        doSelectBtn();
                        showPicInfo();
                    }
                });
            }
        });
    }

    //选择菜品按钮样式
    function doSelectBtn(){
        var btn = _qAll("article dl .btn");
        var btnIndex = 0,btnLength = btn.length;

        // countDish();
        for(btnIndex;btnIndex<btnLength;btnIndex++){

            var countNumText=parseInt(btn[btnIndex].children[1].innerHTML),
                btnAdd=btn[btnIndex].children[2],
                btnMin=btn[btnIndex].children[0];

            btnShowHide(countNumText,btn[btnIndex], false);

            var iTimeout,iInterval, originalNum,
                beforeRemoveDish=false,
                beforeAddDish=false,
                needRemoveNotify=false; //是否需要删除提醒

            btnAdd.addEventListener(_movestartEvt,function(){
                beforeRemoveDish = false;
                var _self = this;
                originalNum = parseInt(_self.parentNode.children[1].innerHTML, 10);
                countNumText =  originalNum +1;
                var shopInfo =_self.parentNode.parentNode.getAttribute('shopInfo');
                ///debug
                if (countNumText == 1) {
                    if (shopInfo) {
                        _self.parentNode.children[1].innerHTML = 0;
                        beforeAddDish = true;
                        return;
                    } else {
                        _self.parentNode.children[1].innerHTML = 1;
                        btnShowHide(1, _self.parentNode);
                    }
                } else {
                    _self.parentNode.children[1].innerHTML = countNumText;
                    btnShowHide(countNumText,_self.parentNode);
                    iTimeout = setTimeout(function(){
                        // console.log(_self);
                        iInterval = setInterval(function(){
                            countNumText++;
                            _self.parentNode.children[1].innerHTML = countNumText;
                            // 变化打数字
                            _removeClass(_self.parentNode.children[3],'fake');
                            _self.parentNode.children[3].innerHTML = countNumText
                        },100)
                    },1000)
                }
            })

            btnAdd.addEventListener(_moveendEvt,function(){//add
                clearTimeout(iTimeout);
                clearInterval(iInterval);
                hideBigFont();
                var _self = this;
                var countNumText =  parseInt(_self.parentNode.children[1].innerHTML, 10);
                var dishid = _self.parentNode.parentNode.getAttribute('dishid');
                var shopInfo =_self.parentNode.parentNode.getAttribute('shopInfo');

                var price=_self.parentNode.parentNode.getAttribute('dspecialprice');
                if(price==""){
                    var dprice=_self.parentNode.parentNode.getAttribute('dprice');
                    price= dprice;
                }

                if (beforeAddDish) {
                    //alert('debug');
                    setTimeout(function(){
                        MDialog.confirm(
                            '', shopInfo, null,
                            '确定', function(){
                                _self.parentNode.children[1].innerHTML = 1;
                                btnShowHide(1, _self.parentNode);
                                ajaxDishReset(dishid, 1, function(){}, function() {
                                    _self.parentNode.children[1].innerHTML = originalNum;                                                                 btnShowHide(originalNum, _self.parentNode);
                                });
                        }, null,
                            '取消', function(){}, null,
                            null, true, true
                        ); 
                    }, 500);
                    beforeAddDish = false;
                } else {
                    var totalcount = 0;
                    var totalprice = 0;
           
                    jQuery("#pInfo dl").each(function(){
                        var c =  parseInt( jQuery(this).find('i').html() );
                        totalcount+=c;
                         var price= jQuery(this).attr('dspecialprice');
                      
                        if(price==""){
                            var dprice= jQuery(this).attr('dprice');
                            price= dprice;
                        }
                        totalprice+=  c * parseInt(price);
                    });
   
                    //var totalprice = parseInt(_q("#totalprice").value)+parseInt(price);
                    //var totalcount = parseInt(_q("#totalcount").value)+1;
                    _q("#totalprice").value = totalprice;
                    _q("#totalpriceshow").innerHTML = totalprice;
                    _q("#totalcount").value = totalcount;
                    _q("#totalcountshow").innerHTML = totalcount;

                    ajaxDishReset(dishid, countNumText, function(){}, function() {
                        _self.parentNode.children[1].innerHTML = originalNum;
                        btnShowHide(originalNum, _self.parentNode);
                    });
                }
            })

            btnMin.addEventListener(_movestartEvt,function(){
                var _self = this;
                originalNum = parseInt(_self.parentNode.children[1].innerHTML, 10);
                countNumText =  originalNum -1;
                if(countNumText <= 0 ){
                    _self.parentNode.children[1].innerHTML = 1;
                    beforeRemoveDish = true;
                    return;
                } else {
                    _self.parentNode.children[1].innerHTML = countNumText;
                    iTimeout = setTimeout(function(){
                        iInterval = setInterval(function(){
                            countNumText--;
                            if(countNumText <= 0){
                                clearInterval(iInterval);
                                _self.parentNode.children[1].innerHTML = 1;
                                beforeRemoveDish = true;
                                return;
                            } else {
                                _self.parentNode.children[1].innerHTML = countNumText;
                                btnShowHide(countNumText,_self.parentNode);
                            }
                            // 字体放大显示
                            _removeClass(_self.parentNode.children[3],'fake');
                            _self.parentNode.children[3].innerHTML = countNumText
                        },100)
                    },1000)
                }
            })

            btnMin.addEventListener(_moveendEvt,function(){
                clearTimeout(iTimeout);
                clearInterval(iInterval);
                hideBigFont();
                var _self = this;
                var countNumText =  parseInt(_self.parentNode.children[1].innerHTML, 10);
                var dishid = _self.parentNode.parentNode.getAttribute('dishid');
                var dName = _self.parentNode.parentNode.getAttribute('dName');

                var price = _self.parentNode.parentNode.getAttribute('dspecialprice');
                if(price == ""){
                    var dspecialprice=_self.parentNode.parentNode.getAttribute('dprice');
                    price= dspecialprice;
                }

                     var totalcount = 0;
                    var totalprice = 0;
           
                    jQuery("#pInfo dl").each(function(){
                        var c =  parseInt( jQuery(this).find('i').html() );
                        totalcount+=c;
                         var price= jQuery(this).attr('dspecialprice');
                      
                        if(price==""){
                            var dprice= jQuery(this).attr('dprice');
                            price= dprice;
                        }
                
                        totalprice+=  c * parseInt(price);
                    });
                    
                //var totalprice = parseInt(_q("#totalprice").value)-parseInt(price);
                //var totalcount = parseInt(_q("#totalcount").value)-1;
                _q("#totalprice").value = totalprice;
                _q("#totalpriceshow").innerHTML = totalprice;
                _q("#totalcount").value = totalcount;
                _q("#totalcountshow").innerHTML = totalcount;

                if (beforeRemoveDish) {
                    if (needRemoveNotify) {
                        setTimeout(function(){
                            MDialog.confirm(
                                '', '是否删除'+dName+'？', null,
                                '确定', function(){
                                    _self.parentNode.children[1].innerHTML = 0;
                                    btnShowHide(0, _self.parentNode);
                                    //alert('needRemoveNotify');//debug
                                    ajaxDishRemove(dishid, function(){}, function() {
                                        _self.parentNode.children[1].innerHTML = originalNum;
                                        btnShowHide(originalNum, _self.parentNode);
                                    });
                                }, null,
                                '取消', function(){
                                    _self.parentNode.children[1].innerHTML = originalNum;
                                    btnShowHide(originalNum, _self.parentNode);
                                }, null,
                                null, true, true
                            );
                        }, 500);
                        beforeRemoveDish = false;
                    } else {
                        //alert('not_needRemoveNotify');//debug
                        _self.parentNode.children[1].innerHTML = 0;
                        btnShowHide(0, _self.parentNode);
                        ajaxDishRemove(dishid, function(){}, function() {
                            _self.parentNode.children[1].innerHTML = originalNum;
                            btnShowHide(originalNum, _self.parentNode);
                        });
                        beforeRemoveDish = false;
                    }
                } else {
                    ajaxDishReset(dishid, countNumText, function(){}, function() {
                        _self.parentNode.children[1].innerHTML = originalNum;
                        btnShowHide(originalNum, _self.parentNode);
                    });
                }
            }) // btnMin.addEventListener
        }

        //更新分类菜品数量
        function ajaxDishReset(dishid, o2uNum, successCallback, errorCallback) {
            var params = {
                'dishid' : dishid,
                'o2uNum' : o2uNum
            };
            //alert('dishid:'+dishid+';o2uNum:'+o2uNum);
            //debug
            var url = "<?php  echo $this->createMobileUrl('UpdateDishNumOfCategory', array('storeid' => $storeid, 'from_user' => $from_user), true)?>";

            //successCallback();
            _doAjax(url, 'POST', params, function(ret) {
                //alert(ret['message']['msg']);return;

                if (ret['message']['code'] != 0) {
                    errorCallback();
                    alert(ret['message']['msg']);
                    return;
                } else {
                    successCallback();
                }
                successCallback();
            });
        } // ajaxDishReset

        function ajaxDishRemove(dishid, successCallback, errorCallback) {
            var params = {
                'dishid' : dishid,
                'action' : 'remove'
            };

            var url = "<?php  echo $this->createMobileUrl('RemoveDishNumOfCategory', array('storeid' => $storeid, 'from_user' => $from_user), true)?>";

            _doAjax(url, 'POST', params, function(ret) {
                if (ret['message']['code']!= 0) {
                    errorCallback();
                    alert(ret['message']['msg']);
                    return;
                } else {
                    successCallback();
                }
            });
        } // ajaxDishRemove
    } // doSelectBtn

    function hideBigFont(){
        var _arr = _qAll(".fixBig");
        _forEach(_arr,function(ele,idx,_arr){
            _addClass(ele,'fake');
        })
    }

    function btnShowHide(num,btns, isCountDish){

        if (isCountDish !== false) {
            countDish();
        }

        if (num <= 0) {
            btns.children[0].style.display ="none";
            btns.children[1].style.display ="none";
        } else {
            btns.children[0].style.display ="inline-block";
            btns.children[1].style.display ="inline-block";
        };
        var totalcount = 0;
        var totalprice = 0;
          jQuery("#pInfo dl").each(function(){
                        var c =  parseInt( jQuery(this).find('i').html() );
                        totalcount+=c;
                         var price= jQuery(this).attr('dspecialprice');
                      
                        if(price==""){
                            var dprice= jQuery(this).attr('dprice');
                            price= dprice;
                        }
                        totalprice+=  c * parseInt(price);
                    });
                 _q("#totalprice").value = totalprice;
                _q("#totalpriceshow").innerHTML = totalprice;
                _q("#totalcount").value = totalcount;
                _q("#totalcountshow").innerHTML = totalcount;
    }

    function countDish(){
        var countTotle = 0,countdish;
        var dishNum = _qAll("#page_allMenu section article dl .btn i");
        _forEach(dishNum,function(ele,idx,dishNum){
            countdish = parseInt(ele.innerHTML);
            if(countdish>0){
                countTotle++;
            }
        });

        if(countTotle != 0){
            _q("#page_allMenu nav dl dd.active span").innerHTML = countTotle;
            _q("#page_allMenu nav dl dd.active span").style.display='block';
        }else{
            _q("#page_allMenu nav dl dd.active span").style.display='none';
        }
    }

    //点击促发弹层事件
    function showPicInfo(){
        var links = _qAll(".dataIn"), i=0;
        for(i;i<links.length;i++){
            links[i].onclick=function(event){
                event.stopPropagation();
                // dl
                var parentDl = this.parentNode.parentNode;
                var childImg = this.childNodes[0]
                if(childImg.nodeType == 3){
                    childImg = this.childNodes[1];
                }
                popPic(childImg.src,
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

             if (isSpecial == view_const_dish_SPECIAL_PRICE_YES
                || isSpecial == view_const_dish_SPECIAL_PRICE_VIP) {
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

    // 获取各个分类被选中菜品的数量
    function getDishNumOfCategory() {
        var params = {
        };
        _doAjax("<?php  echo $this->createMobileUrl('GetDishNumOfCategory', array('storeid' => $storeid, 'from_user' => $from_user), true)?>", 'POST', params, function(ret) {
            for(var i in ret.message.data) {
                var val = ret['message']['data'][i];
                if (val > 0) {
                    //debug
                    _q('[categoryId="'+i+'"] span').innerHTML = val;
                    _q('[categoryId="'+i+'"] span').style.display='block';
                } else {
                    _q('[categoryId="'+i+'"] span').style.display='none';
                }
            }
        });
    }

    _onPageLoaded(function(){
        setHeight();
        doSelect();
        doSelectBtn();
        showPicInfo();
        getDishNumOfCategory();
        if(_isIOS){
            _q("#page_allMenu section article").style.overflowY ="scroll";
            _q("#page_allMenu section article").style.minHeight ="85%";
            _q("#page_allMenu section article").style.marginBottom="15px";
        }
    })
    window.addEventListener('orientationchange', function(){
        setHeight();
    })
</script>
</body>
</html>