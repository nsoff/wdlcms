<?php defined('IN_IA') or exit('Access Denied');?><?php  $bootstrap_type = 3;?>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>

<script type="text/javascript" src="../addons/wdl_shopping/images/jquery.gcjs.js"></script>
<script type='text/javascript' src='../addons/wdl_shopping/images/touchslider.min.js'></script>
<script language='javascript' src='../addons/wdl_shopping/images/photoswipe/simple-inheritance.min.js'></script>
<script language='javascript' src='../addons/wdl_shopping/images/photoswipe/photoswipe-1.0.11.min.js'></script>
<link href="../addons/wdl_shopping/images/photoswipe/photoswipe.css" rel="stylesheet"/>
<script language="javascript" src="../addons/wdl_shopping/images/touchslider.min.js"></script>
<script language="javascript" src="../addons/wdl_shopping/images/swipe.js"></script>
<link type="text/css" rel="stylesheet" href="../addons/wdl_shopping/images/style.css?<?php echo TIMESTAMP;?>">

<div class="head">
    <a href="javascript:history.back();" class="bn pull-left"><i class="fa fa-angle-left"></i></a>
    <span class="title">商品详情</span>
    <a href="<?php  echo $this->createMobileUrl('list')?>" class="bn pull-right" style="margin-right:30px;">
        <i class="fa fa-home"></i>
    </a>
    <a href="<?php  echo $this->createMobileUrl('mycart')?>" class="bn pull-right">
        <i class="fa fa-shopping-cart"></i>
        <span class="buy-num img-circle" id="carttotal"><?php  echo $carttotal;?></span>
    </a>
</div>

<div class="detail-main" style='margin-bottom:65px;'>
    <div class="detail-img">
        <div id="banner_box" class="box_swipe">
            <ul style="background:#FFF;">
                <?php  if(is_array($piclist)) { foreach($piclist as $row) { ?>
                <li style="text-align:center;list-style: none;">
                    <a href="<?php  echo tomedia($row);?>" rel='<?php  echo tomedia($row);?>'>
                        <img src="<?php  echo tomedia($row);?>" height="200px"/>
                    </a>
                </li>
                <?php  } } ?>
            </ul>
            <ol>
                <?php  if(is_array($piclist)) { foreach($piclist as $row) { ?>
                <li class="on"></li>
                <?php  } } ?>
            </ol>
        </div>

        <script>
            var proimg_count = <?php  echo count($piclist)?>;
            $(function () {
                new Swipe($('#banner_box')[0], {
                    speed: 500,
                    auto: 3000,
                    callback: function () {
                        var lis = $(this.element).next("ol").children();
                        lis.removeClass("on").eq(this.index).addClass("on");
                    }
                });
                if (proimg_count > 0) {
                    (function (window, $, PhotoSwipe) {
                        $('#banner_box ul li a[rel]').photoSwipe({});
                    }(window, window.jQuery, window.Code.PhotoSwipe));
                }
            });
        </script>

    </div>
    <div class="detail-div img-rounded">
        <div class="detail-group text-center" style="line-height:20px;font-weight:bold;"><?php  echo $goods['title'];?></div>
        <div class="detail-group" style='margin-top:10px;'>
			<span class="col-xs-8" style="width:100%;">
				<?php  if($marketprice==$productprice) { ?>
				现价 : ¥ <span id='marketprice' class="text-danger" style="font-size:18px; font-weight:bold;"><?php  echo $marketprice;?></span> <?php  if(!empty($goods['unit'])) { ?>/ <?php  echo $goods['unit'];?><?php  } ?>
				<?php  } else { ?>
		   	 	现价 : ¥ <span class="text-danger" id='marketprice' style="font-size:18px; font-weight:bold;"><?php  echo $marketprice;?></span> <span
                    id='productpricecontainer' style='<?php  if($productprice<=0) { ?>display:none<?php  } ?>'>  &nbsp;原价 : <del
                    style="font-size:14px; ">¥ <span id='productprice'><?php  echo $originalprice;?></span></del></span>
				<?php  } ?>
			</span>
        </div>

        <div class='detail-group' style="margin-top:10px;">
            <span style="float:left;margin-left:15px; margin-top:5px;">数量 :</span>
            <div class="input-group" style="width:100px;float:left;margin-left:8px;">
				<span class="input-group-btn">
					<button class="btn btn-default btn-sm" type="button" onclick="reduceNum()"><i class="fa fa-minus"></i></button>
				</span>
                <input type="tel" class="form-control input-sm pricetotal goodsnum" style="width:50px;text-align:center" value="1" id="total"/>
				<span class="input-group-btn">
					<button class="btn btn-default btn-sm" type="button" onclick="addNum()"><i class="fa fa-plus"></i></button>
				</span>
            </div>
            <?php  if($stock!=-1) { ?>
            <span id='stockcontainer' style="float:left;margin-left:5px;">( 剩余 <span id='stock'><?php  if($goods['totalcnf'] == 2) { ?> 无限 <?php  } else { ?> <?php  echo $stock;?> <?php  } ?></span> ) </span>
            <?php  } else { ?>
            <span id='stockcontainer' style="float:left;margin-left:5px;"><span id='stock'></span></span>
            <?php  } ?>
        </div>

        <?php  if(is_array($specs)) { foreach($specs as $spec) { ?>
        <input type='hidden' name="optionid[]" class='optionid optionid_<?php  echo $spec['id'];?>' value="" title="<?php  echo $spec['title'];?>">
        <div id='option_group' class='detail-group' style="margin-top:10px;">
            <div class="detail-group">
                <span style='float:left;display:block;height:30px;line-height:30px;overflow:hidden;text-overflow:ellipsis;margin-left:15px;padding:0'><?php  echo $spec['title'];?></span>
                <span style="float:left;display:block;height:30px;line-height:30px;padding:0 3px;">:</span>
                <span style="float:left;margin-left:8px;" class='options options_<?php  echo $spec['id'];?>' specid='<?php  echo $spec['id'];?>'>
                <?php  if(is_array($spec['items'])) { foreach($spec['items'] as $o) { ?>
                <?php  if(empty($o['thumb'])) { ?>
                <span class="property option option_<?php  echo $spec['id'];?>" specid='<?php  echo $spec['id'];?>' oid="<?php  echo $o['id'];?>" sel='false'><?php  echo $o['title'];?></span>
                <?php  } else { ?>
                <span class="propertyimg optionimg option_img_<?php  echo $spec['id'];?> " oid="<?php  echo $o['id'];?>" specid='<?php  echo $spec['id'];?>' sel='false'>
                <img src="<?php  echo tomedia($o['thumb']);?>" width='50' height='70'/>
                </span>
                <?php  } ?>
                <?php  } } ?>
                </span>
            </div>
        </div>
        <?php  } } ?>

    </div>
    <?php  if(count($params)>0) { ?>
    <div class="detail-div img-rounded other-detail">
        <?php  if(is_array($params)) { foreach($params as $p) { ?>
        <div class="detail-group">
            <span class="col-xs-4"><?php  echo $p['title'];?></span>
            <span class="col-xs-8"><?php  echo $p['value'];?></span>
        </div>
        <?php  } } ?>
    </div>
    <?php  } ?>

    <div class="detail-div img-rounded detail-content" style="word-break:break-all">
        <?php  echo $goods['content'];?>
    </div>
    <div style="position:fixed; bottom:0; left:0; width:100%; z-index:88; text-align:center; background:#E9E9E9; padding:10px 2%;">
        <?php  if($goods['status']!=1 || $goods['deleted']==1) { ?>
        <a href="javascript:void(0)" class="btn btn-default col-xs-12" style="width:100%;">此商品已下架</a>
        <?php  } else { ?>
        <input type="hidden" id="optionid" name="optionid" value=""/>
        <a href="javascript:void(0)" onclick='addtocart()' class="btn btn-danger col-xs-12" style="width:45%;">
            <i class="fa fa-plus"></i> 添加到购物车</a>
        <a href="javascript:void(0)" onclick='buy()' class="btn btn-success col-xs-12" style="float:right; width:45%;">立即购买</a>
        <?php  } ?>
    </div>

</div>

<script>
    var options = <?php  echo json_encode($options)?>;
    var specs = <?php  echo json_encode($specs)?>;
    var hasoption = <?php echo $goods['hasoption'] == '1' ? 'true' : 'false'?>;

    $(function () {
        $('.other-detail .detail-group:last').css("border-bottom", "0");

        if (proimg_count > 0) {
            (function (window, $, PhotoSwipe) {
                $('.touchslider-viewport .list a[rel]').photoSwipe({});
            }(window, window.jQuery, window.Code.PhotoSwipe));

            $('.touchslider').touchSlider({
                mouseTouch: true,
                autoplay: true,
                delay: 2000
            });
        }
        $(".option,.optionimg").click(function () {
            var specid = $(this).attr("specid");
            var oid = $(this).attr("oid");
            $(".optionid_" + specid).val(oid);
            $(".options_" + specid + "  span").removeClass("current").attr("sel", "false");
            $(this).addClass("current").attr("sel", "true");

            var optionid = "";
            var stock = 0;
            var marketprice = 0;
            var productprice = 0;
            var ret = option_selected();

            if (ret.no == '') {
                var len = options.length;
                for (var i = 0; i < len; i++) {
                    var o = options[i];
                    var ids = ret.all.join("_");
                    if (o.specs == ids) {
                        optionid = o.id;
                        stock = o.stock;
                        marketprice = o.marketprice;
                        productprice = o.productprice;
                        break;
                    }
                }
                $("#optionid").val(optionid);
                if (stock != "-1") {
                    $("#stockcontainer").html("( 剩余 <span id='stock'>" + stock + "</span> )");
                } else {
                    $("#stockcontainer").html("<span id='stock'></span>");
                }
                $("#marketprice").html(marketprice);
                $("#productprice").html(productprice);
                if (productprice <= 0) {
                    $("#productpricecontainer").hide();
                } else {
                    $("#productpricecontainer").show();
                }
            }
        });

        $("#total").blur(function () {
            var total = $("#total");
            if (!total.isInt()) {
                total.val("1");
            }
            var stock = $("#stock").html() == '' ? -1 : parseInt($("#stock").html());
            var mb = maxbuy;
            if (mb > stock && stock != -1) {
                mb = stock;
            }
            var num = parseInt(total.val());
            if (num > mb && mb > 0) {
                tip("您最多可购买 " + mb + " 件!", true);
                total.val(mb);
            }
        })

    });
    var maxbuy = <?php echo empty($goods['maxbuy']) ? "0" : $goods['maxbuy']?>;

    function addNum() {
        var total = $("#total");
        if (!total.isInt()) {
            total.val("1");
        }
        var stock = $("#stock").html() == '' ? -1 : parseInt($("#stock").html());
        var mb = maxbuy;
        if (mb > stock && stock != -1) {
            mb = stock;
        }
        var num = parseInt(total.val()) + 1;
        if (num > stock) {
            tip("您最多可购买 " + stock + " 件!", true);
            num--;
        }
        if (num > mb && mb > 0) {
            tip("您最多可购买 " + mb + " 件!", true);
            num = mb;
        }
        total.val(num);
    }

    function reduceNum() {
        var total = $("#total");
        if (!total.isInt()) {
            total.val("1");
        }
        var num = parseInt(total.val());
        if (num - 1 <= 0) {
            return;
        }
        num--;
        total.val(num);
    }

    function addtocart() {
        var ret = option_selected();
        if (ret.no != '') {
            tip("请选择" + ret.no + "!", true);
            return;
        }
        tip("正在处理数据...");
        var total = $("#total").val();
        var stock = parseInt($('#stock').text());
        if (stock == 0) {
            tip('库存不足，无法购买。');
            return;
        }
        var url = "<?php  echo murl('entry//mycart',array('id'=>$goods['id'],'op'=>'add','m'=>'wdl_shopping'),true)?>" + "&optionid=" + $("#optionid").val() + "&total=" + total;
        $.getJSON(url, function (s) {
            if (s.result == 0) {
                tip("只能购买 " + s.maxbuy + " 件!");
            } else {
                tip_close();
                tip("已加入购物车!");
                $('#carttotal').css({
                    'width': '50px',
                    'height': '50px',
                    'line-height': '50px'
                }).html(s.total).animate({'width': '20px', 'height': '20px', 'line-height': '20px'}, 'slow');
            }
        });
    }

    function buy() {
        var ret = option_selected();
        if (ret.no != '') {
            tip("请选择" + ret.no + "!", true);
            return;
        }
        var stock = parseInt($('#stock').text());
        if (stock == 0) {
            tip('库存不足，无法购买。');
            return;
        }
        var total = $("#total").val();
        location.href = "<?php  echo murl('entry//confirm',array('id'=>$goods['id'],'op'=>'confirm','m'=>'wdl_shopping'),true)?>" + "&optionid=" + $("#optionid").val() + "&total=" + total;
    }

    var selected = [];
    function option_selected() {
        var ret = {
            no: "",
            all: []
        };
        if (!hasoption) {
            return ret;
        }
        $(".optionid").each(function () {
            ret.all.push($(this).val());
            if ($(this).val() == '') {
                ret.no = $(this).attr("title");
                return false;
            }
        })
        return ret;
    }

    // 微商城分享
    wx.ready(function () {
        sharedata = {
            title: "<?php  echo $goods['title'];?>",
            desc: '<?php  echo str_replace("\r\n", "", strip_tags($goods["content"]));?>',
            link: "<?php  echo $_W['siteurl'];?>",
            imgUrl: "<?php  echo tomedia($goods['thumb']);?>"
        };
        wx.onMenuShareAppMessage(sharedata);
        wx.onMenuShareTimeline(sharedata);
    });

</script>


<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>

