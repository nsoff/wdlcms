<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1">
<title>填写个人信息</title>
<link href="<?php  echo $_W['siteroot'];?>app/resource/css/bootstrap.min.css?v=20150403" rel="stylesheet">
<link rel="stylesheet" href="../addons/amouse_ecard/style/css/reset.css?v=2015040501">
<link rel="stylesheet" href="../addons/amouse_ecard/style/css/flytip.css?v=2015040501">
<link rel="stylesheet" href="../addons/amouse_ecard/style/css/nameCard.css?v=201410256">
   <!-- <link rel="stylesheet" href="../addons/amouse_ecard/style/css/nameCard1.css?v=201410256">-->
<script src="<?php  echo $_W['siteroot'];?>app/resource/js/require.js"></script>
<script src="<?php  echo $_W['siteroot'];?>app/resource/js/app/config.js"></script>
<script type="text/javascript" src="../addons/amouse_ecard/style/js/jquery.1.11.1.js?v=20150403"></script>
<script type="text/javascript">
    <?php  define('HEADER', true);?>
    window.sysinfo = {
    <?php  if(!empty($_W['uniacid'])) { ?>
        'uniacid': '<?php  echo $_W['uniacid'];?>',
    <?php  } ?>
    <?php  if(!empty($_W['acid'])) { ?>
        'acid': '<?php  echo $_W['acid'];?>',
    <?php  } ?>
    <?php  if(!empty($_W['openid'])) { ?>
        'openid': '<?php  echo $_W['openid'];?>',
    <?php  } ?>
    <?php  if(!empty($_W['uid'])) { ?>
        'uid': '<?php  echo $_W['uid'];?>',
    <?php  } ?>
        'siteroot': '<?php  echo $_W['siteroot'];?>',
            'siteurl': '<?php  echo $_W['siteurl'];?>',
            'attachurl': '<?php  echo $_W['attachurl'];?>',
    <?php  if(defined('MODULE_URL')) { ?>
        'MODULE_URL': '<?php echo MODULE_URL;?>',
    <?php  } ?>
        'cookie' : {'pre': '<?php  echo $_W['config']['cookie']['pre'];?>'}
    };
</script>
</head>
<body class="namecard-fillIn">

<div class="namecard-page">
    <div class="fillIn-title">必填项目</div>
    <form action="" class="validate" method="post" id="personForm">
        <input type='hidden' id='pic_url' name='headimg' value="<?php  echo $member['headimg'];?>"/>
        <input type='hidden' name='op' value="post"/>
        <input type="hidden" name="id" value="<?php  echo $member['id'];?>"/>
        <input type="hidden" name="status" value="<?php  echo $member['status'];?>"/>
        <section class="fillIn-column">
            <ul class="fillIn-inner">
                <section class="fillIn-column avatar-column">
                    <ul class="fillIn-inner">
                    <li class="fillIn-inner-item">
                    <span class="fillIn-item-title">头像(小图） </span>
                    <div class="fillIn-avatar">
                    <?php  echo $this->tpl_form_field_icon_image('headimg',$member['headimg']);?>
                    </div>
                    </li>
                    </ul>
                </section>

                <li class="fillIn-inner-item"><span class="fillIn-item-title">姓名</span>
       <input type="text" class="inptext text-right" placeholder="填写姓名" name="realname" validate="required" data-requiredMsg="请输入姓名" value="<?php  echo $member['realname'];?>" maxlength="20">
                </li>
                <li class="fillIn-inner-item"><span class="fillIn-item-title">公司</span>
           <input type="text" class="inptext text-right" placeholder="填写公司" name="company" validate="required" data-requiredMsg="请输入公司" value="<?php  echo $member['company'];?>" maxlength="30">
                </li>

                <li class="fillIn-inner-item"><span class="fillIn-item-title">手机</span>
   <input type="tel" class="inptext text-right" placeholder="填写手机号码" name="telphone" data-requiredMsg="请输入手机号码" value="<?php  echo $member['mobile'];?>">
                </li>

                <li class="fillIn-inner-item"><span class="fillIn-item-title">职位</span>
       <input type="text" class="inptext text-right" placeholder="填写职位" name="job" validate="required" data-requiredMsg="请输入职位" value="<?php  echo $member['job'];?>" maxlength="20">
                </li>
                <li class="fillIn-inner-item"> <span class="fillIn-item-title">部门</span>
                    <input type="text" class="inptext text-right" placeholder="填写部门" name="department" value="<?php  echo $member['department'];?>" maxlength="10">
                </li>
                <li class="fillIn-inner-item"><span class="fillIn-item-title">邮箱地址</span>
                    <input type="email" class="inptext text-right" placeholder="填写邮箱地址" name="email" value="<?php  echo $member['email'];?>" maxlength="30">
                </li>
            </ul>
        </section>

        <div class="fillIn-title"  style="background: url(../addons/amouse_ecard/style/images/fill_ico.png) no-repeat right center;background-size: 20px;box-sizing: border-box;-webkit-box-sizing: border-box;-webkit-appearance: none;"
             id="xuantian">选填项目(点击填写更多资料)
        </div>

        <section class="fillIn-column" style="display:none" id="tianxie">
            <ul class="fillIn-inner">
                <div class="row">
                    <span class="tag">公司地址：</span><br>
      <textarea id="place" placeholder="输入地址快速搜索定位" name="companyAddress" data-rule-required="true" style="height:30px;width:75%;"/><?php  echo $member['companyAddress'];?></textarea>
         <button style="position:relative;height:35px;width:55px;background-color:RGB(62,175,14);top:-14px;" id="positioning" type="button" onclick="bmap.searchMapByAddress($('#place').val())"><font color="white" size="4px">搜索</font></button>
                </div>
                <style>
                    .m-form .row1 {
                        position: relative;
                        min-height: 34px;
                        margin-bottom: 6px;
                        padding-left: 0px;
                    }
                </style>
                <div class="row1">
          <div id="l-map" style="overflow: hidden; position: relative; z-index: 0; background-image: url(http://api.map.baidu.com/images/bg.png);width: 100%; height: 200px;margin-top: 10px; color: rgb(0, 0, 0); text-align: left;margin: 0 12px 0 -6px">
                    </div>
                    <span id="r-result">
                        <input style="width:49%;" type="hidden" id="lat" name="lat">
                        <input style="width:49%;" type="hidden" id="lng" name="lng">
                    </span>
                </div>

                <li class="fillIn-inner-item"><span class="fillIn-item-title">详细地址</span>
              <input type="text" class="inptext text-right" placeholder="填写地址" name="address"  value="<?php  echo $member['address'];?>" maxlength="40">
                </li>

                <li class="fillIn-inner-item"><span class="fillIn-item-title">微信号</span>
                    <input type="text" class="inptext text-right" placeholder="填写微信号" name="weixin" value="<?php  echo $member['weixin'];?>" maxlength="20">
                </li>

                <li class="fillIn-inner-item"><span class="fillIn-item-title">QQ</span>
                    <input type="text" class="inptext text-right" placeholder="填写qq号" name="qq" value="<?php  echo $member['qq'];?>"   maxlength="30">
                </li>

                <li class="fillIn-inner-item">
                    <span class="fillIn-item-title">我专注</span>
                    <input type="text" class="inptext text-right" placeholder="填写专注，如互联网营销" name="myattention" value="<?php  echo $member['myattention'];?>" maxlength="30">
                </li>
                <li class="fillIn-inner-item"><span class="fillIn-item-title">我在找</span>
                    <input type="text" class="inptext text-right" placeholder="填写产品，服务" name="myfocus" value="<?php  echo $member['myfocus'];?>" maxlength="30">
                </li>
                <li class="fillIn-inner-item"><span class="fillIn-item-title">个性签名</span>
                    <input type="text" class="inptext text-right" placeholder="填写您的个性签名" name="qianming" value="<?php  echo $member['qianming'];?>" maxlength="30">
                </li>

                <li class="fillIn-inner-itemsel"> <span class="fillIn-item-title">行业</span>
                    <div class="sel">
                        <select class="fillIn-select fillIn-long-select" name="industry">
                            <option value="">请选择</option>
                            <?php  if(is_array($industrys)) { foreach($industrys as $job) { ?>
                            <option value="<?php  echo $job['title'];?>" <?php  if($job['title']==$member['industry']) { ?>selected <?php  } ?>><?php  echo $job['title'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
                </li>
            </ul>

            <div class="editcontent-tips">
            </div>
        </section>
    </form>
    <!--#=end column-->
</div>
<div style="height:85px"></div>
<div class="create-next create-position" style="position:absolute" id="footerFixed">
    <a class="create-next-btn" href="javascript:savePersonInfo()" id="saveBtn">完 成 </a>
</div>

<!--#=end page-->
<input type="hidden" value="" id="cityId"/>
<input type="hidden" value="" id="provinceId"/>
<!--#start JS-->
<script>
    function savePersonInfo() {
        $("#saveBtn").text("正在保存...");
        $("#personForm").submit();
    }
    document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
        WeixinJSBridge.call('hideOptionMenu');
    });

    $("#xuantian").click(function () {
        $("#tianxie").slideToggle("slow");
    });
</script>
 <script type="text/javascript" src="http://api.map.baidu.com/api?v=1.4"></script>
<script type="text/javascript" src="http://api.map.baidu.com/getscript?v=1.4&ak=&services=&t=20140102035142"></script>
<script type="text/javascript">
    $(function () {
        $(".location").change(function () {
            bmap.searchMapByPCD();
        });
    });
    var bmap = {
        'option': {
            'lock': false,
            'container': 'l-map',
            'infoWindow': {'width': 250, 'height': 100, 'title': ''},
            'point': {'lng': "<?php  if($member['lng']!='0.0000000000' && !empty($member['lng'])) { ?><?php  echo $member['lng'];?><?php  } else { ?>116.402544<?php  } ?>", 'lat': "<?php  if($member['lat']!='0.0000000000' && !empty($member['lat'])) { ?><?php  echo $member['lat'];?><?php  } else { ?>39.916263<?php  } ?>"}
        },
        'init': function (option) {
            var $this = this;
            $this.option = $.extend({}, $this.option, option);

            $this.option.defaultPoint = new BMap.Point($this.option.point.lng, $this.option.point.lat);
            $this.bgeo = new BMap.Geocoder();
            $this.bmap = new BMap.Map($this.option.container);
            $this.bmap.centerAndZoom($this.option.defaultPoint, 15);
            $this.bmap.enableScrollWheelZoom();
            $this.bmap.enableDragging();
            $this.bmap.enableContinuousZoom();
            $this.bmap.addControl(new BMap.NavigationControl());
            $this.bmap.addControl(new BMap.OverviewMapControl());
            //添加标注
            $this.marker = new BMap.Marker($this.option.defaultPoint);
            $this.marker.setLabel(new BMap.Label('请您移动此标记，选择您的坐标！', {'offset': new BMap.Size(10, -20)}));
            $this.marker.enableDragging();
            $this.bmap.addOverlay($this.marker);
            //$this.marker.setAnimation(BMAP_ANIMATION_BOUNCE);
            $this.showPointValue($this.marker.getPosition());
            //拖动地图事件
            $this.bmap.addEventListener("dragging", function () {
                $this.setMarkerCenter();
                $this.option.lock = false;
            });
            //缩入地图事件
            $this.bmap.addEventListener("zoomend", function () {
                $this.setMarkerCenter();
                $this.option.lock = false;
            });
            //拖动标记事件
            $this.marker.addEventListener("dragend", function (e) {
                $this.showPointValue();
                $this.showAddress();
                $this.bmap.panTo(new BMap.Point(e.point.lng, e.point.lat));
                $this.option.lock = false;
                $this.marker.setAnimation(null);
            });
        },
        'searchMapByAddress': function (address) {
            var $this = this;
            $this.bgeo.getPoint(address, function (point) {
                if (point) {
                    $this.showPointValue();
                    $this.showAddress();
                    $this.bmap.panTo(point);
                    $this.setMarkerCenter();
                }
            });
        },
        'searchMapByPCD': function (address) {
            //alert($('#location_p').val()+$('#location_c').val()+$('#location_a').val());
            var $this = this;
            $this.option.lock = true;
            $this.searchMapByAddress($('#location_p').val() + $('#location_c').val() + $('#location_a').val());
        },
        'setMarkerCenter': function () {
            var $this = this;
            var center = $this.bmap.getCenter();
            $this.marker.setPosition(new BMap.Point(center.lng, center.lat));
            $this.showPointValue();
            $this.showAddress();
        },
        'showPointValue': function () {
            var $this = this;
            var point = $this.marker.getPosition();
            $('#lng').val(point.lng);
            $('#lat').val(point.lat);
        },
        'showAddress': function () {
            var $this = this;
            var point = $this.marker.getPosition();
            $this.bgeo.getLocation(point, function (s) {
                if (s) {
                    $('#place').val(s.address);
                    if (!$this.option.lock) {
                    }
                }
            });
        }
    };
    $(function () {
        var option = {};
        bmap.init(option);
    });
</script>
</body>
</html>