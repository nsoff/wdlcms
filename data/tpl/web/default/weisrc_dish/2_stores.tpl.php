<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li <?php  if($operation == 'post') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('stores', array('op' => 'post'))?>">添加门店</a></li>
    <li <?php  if($operation == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('stores', array('op' => 'display'))?>">门店管理</a></li>
</ul>
<?php  if($operation == 'display') { ?>
<style>
    .form-control-excel {
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    }
</style>
<div class="main">
    <form action="./index.php" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <input type="hidden" name="leadExcel" value="true">
        <input type="hidden" name="c" value="site" />
        <input type="hidden" name="a" value="entry" />
        <input type="hidden" name="m" value="weisrc_dish" />
        <input type="hidden" name="do" value="UploadExcel" />
        <input type="hidden" name="ac" value="store" />
        &nbsp;<a class="btn btn-primary" href="javascript:location.reload()"><i class="icon-refresh"></i> 刷新</a>
        <input name="viewfile" id="viewfile" type="text" value="" style="margin-left: 40px;" class="form-control-excel" readonly>
        <a class="btn btn-primary"><label for="unload" style="margin: 0px;padding: 0px;">上传...</label></a>
        <input type="file" class="pull-left btn-primary span3" name="inputExcel" id="unload" style="display: none;"
               onchange="document.getElementById('viewfile').value=this.value;this.style.display='none';">
        <input type="submit" class="btn btn-primary " value="导入数据">
        <a class="btn btn-primary" href="../addons/weisrc_dish/example/example_store.xls">下载导入模板</a>
    </form>
    <div style="padding-top:15px;"></div>
    <div class="panel panel-default">
        <div class="table-responsive panel-body">
            <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
                <table class="table table-hover">
                    <thead class="navbar-inner">
                    <tr>
                        <th style="width:10%;">顺序</th>
                        <th style="width:18%;">名称</th>
                        <th style="width:14%;">电话</th>
                        <th style="width:18%;">地址</th>
                        <th style="width:15%;">订餐类型</th>
                        <th style="width:10%;">状态</th>
                        <th style="width:15%;text-align: right;">管理/编辑/删除</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  if(is_array($storeslist)) { foreach($storeslist as $item) { ?>
                    <tr>
                        <td><input type="text" class="form-control" name="displayorder[<?php  echo $item['id'];?>]" value="<?php  echo $item['displayorder'];?>"></td>
                        <td><a href="<?php  echo $this->createWebUrl('order', array('id' => $item['id'], 'storeid' =>  $item['id']))?>" title="管理">
                            <img src="<?php  if(strstr($item['logo'], 'http') || strstr($item['logo'], './source/modules/')) { ?><?php  echo $item['logo'];?><?php  } else { ?><?php  echo $_W['attachurl'];?><?php  echo $item['logo'];?><?php  } ?>" onerror="this.src='./resource/images/nopic.jpg';" width="60px;">
                            <br/><?php  echo $item['title'];?></a>
                        </td>
                        <td><?php  echo $item['tel'];?></td>
                        <td><?php  echo $item['address'];?></td>
                        <td>
                            <?php  if(!empty($item['is_meal'])) { ?><span class="label" style="background:#ff6a00;">店内</span><?php  } ?>
                            <?php  if(!empty($item['is_delivery'])) { ?><span class="label" style="background:#ff6a00;">外卖</span><?php  } ?>
                        </td>
                        <td style="width:60px;">
                            <?php  if($item['is_show']==1) { ?>
                            <span class="label" style="background:#56af45;">显示</span>
                            <?php  } else { ?>
                            <span class="label" style="background:#f00;">隐藏</span>
                            <?php  } ?>
                        </td>
                        <td style="max-width:60px;text-align: right;">
                            <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('order', array('id' => $item['id'], 'storeid' =>  $item['id']))?>" title="管理"><i class="fa fa-cog"></i></a>
                            <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('stores', array('id' => $item['id'], 'storeid' =>  $item['id'], 'op' => 'post'))?>" title="编辑"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-default btn-sm" onclick="return confirm('确认删除吗？');return false;" href="<?php  echo $this->createWebUrl('stores', array('id' => $item['id'], 'storeid' =>  $item['id'], 'op' => 'delete'))?>" title="删除"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <?php  } } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="7">
                            <input name="submit" type="submit" class="btn btn-primary" value="批量修改排序">
                            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </form>
        </div>
    </div>
    <?php  echo $pager;?>
</div>
<script>
    function drop_confirm(msg, url){
        if(confirm(msg)){
            window.location = url;
        }
    }
</script>
<?php  } else if($operation == 'post') { ?>
<link rel="stylesheet" type="text/css" href="../addons/weisrc_dish/plugin/clockpicker/clockpicker.css" media="all">
<script type="text/javascript" src="../addons/weisrc_dish/plugin/clockpicker/clockpicker.js"></script>
<link rel="stylesheet" type="text/css" href="../addons/weisrc_dish/plugin/clockpicker/standalone.css" media="all">

<link rel="stylesheet" type="text/css" href="../addons/weisrc_dish/template/css/uploadify_t.css?v=2" media="all" />
<style>
    .item_box img{
        width: 100%;
        height: 100%;
    }
</style>
<div class="main">
    <form action="" method="post" onsubmit="return check();" class="form-horizontal form" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading">
                点餐设置
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">店内消费</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="is_meal" value="1" <?php  if($reply['is_meal']==1 || empty($reply)) { ?>checked<?php  } ?>>启用
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_meal" value="0" <?php  if(isset($reply['is_meal']) && empty($reply['is_meal'])) { ?>checked<?php  } ?>>关闭
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">外卖订餐</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="is_delivery" value="1" <?php  if($reply['is_delivery']==1 || empty($reply)) { ?>checked<?php  } ?>>启用
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_delivery" value="0" <?php  if(isset($reply['is_delivery']) && empty($reply['is_delivery'])) { ?>checked<?php  } ?>>关闭
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">外卖起送价格</label>
                    <div class="col-sm-9">
                        <input type="text" name="sendingprice" class="form-control" value="<?php  echo $reply['sendingprice'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">首次下单短信验证</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="is_sms" value="1" <?php  if($reply['is_sms']==1) { ?>checked<?php  } ?>>启用
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_sms" value="0" <?php  if(empty($reply['is_sms'])) { ?>checked<?php  } ?>>关闭
                        </label>
                        <?php  if(!empty($reply)) { ?>
                        <div class="help-block"><a href="<?php  echo $this->createWebUrl('smssetting', array('storeid' => $reply['id']))?>">短信配置</a></div>
                        <?php  } ?>
                    </div>
                </div>
            </div>
            <div class="panel-heading">
                基本信息
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商家名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" value="<?php  echo $reply['title'];?>" id="title" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商家Logo</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('logo', $reply['logo'])?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">所属区域</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="area" id="area">
                            <option value="0">请选择</option>
                            <?php  if(is_array($area)) { foreach($area as $item) { ?>
                            <option value="<?php  echo $item['id'];?>" <?php  if($reply['areaid']==$item['id']) { ?>selected<?php  } ?>><?php  echo $item['name'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
                </div>
                <!--<div class="form-group">-->
                    <!--<label class="col-xs-12 col-sm-3 col-md-2 control-label">商家类别</label>-->
                    <!--<div class="col-sm-4">-->
                        <!--<select name="category_f" id="category_f" class="form-control"></select>-->
                    <!--</div>-->
                    <!--<div class="col-sm-4">-->
                        <!--<select name="category_s" id="category_s" class="form-control"></select>-->
                        <!--<script type="text/javascript" src="../addons/weisrc_dish/template/js/category.js"></script>-->
                        <!--<script type="text/javascript">-->
                            <!--var category_f = "<?php  echo $reply['category_f'];?>";-->
                            <!--var category_s = "<?php  echo $reply['category_s'];?>";-->
                        <!--</script>-->
                        <!--<script type="text/javascript">-->
                            <!--new CS("category_f", "category_s", category_f, category_s, '美食-1$本帮江浙菜-11,川菜-12,粤菜-13,湘菜-14,贵州菜-15,东北菜-16,台湾菜-17,新疆/清真菜-18,西北菜-19,素菜-20,火锅-21,自助餐-22,小吃快餐-23,日本-24,韩国料理-25,东南亚菜-26,西餐-27,面包甜点-28,其他-29#休闲娱乐-2$密室-30,咖啡厅-31,酒吧-32,茶馆-33,KTV-34,电影院-35,文化艺术-36,景点/郊游-37,公园-38,足疗按摩-39,洗浴-40,游乐游艺-41,桌球-42,桌面游戏-43,DIY手工坊-44,其他-45#购物-3$综合商场-46,食品茶酒-47,服饰鞋包-48,珠宝饰品-49,化妆品-50,运动户外-51,亲子购物-52,品牌折扣店-53,数码家电-54,家居建材-55,特色集市-56,书店-57,花店-58,眼镜店-59,超市/便利店-60,药店-61,其他-62#丽人-4$美发-63,美容/SPA-64,化妆品-65,瘦身纤体-66,美甲-67,瑜伽-68,舞蹈-69,个性写真-70,整形-71,齿科-72,其他-73#结婚-5$婚纱摄影-74,婚宴-75,婚戒首饰-76,婚纱礼服-77,婚庆公司-78,彩妆造型-79,司仪主持-80,婚礼跟拍-81,婚车租赁-82,婚礼小商品-83,婚房装修-84,其他-85#亲子-6$幼儿教育-86,亲子摄影-87,亲子游乐-88,亲子购物-89,孕产护理-90,其他-91#运动健身-7$游泳馆-92,羽毛球馆-93,健身中心-94,瑜伽-95,舞蹈-96,篮球场-97,网球场-98,足球场-99,高尔夫场-100,保龄球馆-101,桌球馆-102,乒乓球馆-103,武术场馆-104,体育场馆-105,其他-106#酒店-8$五星级酒店-107,四星级酒店-108,三星级酒店-109,经济型酒店-110,公寓式酒店-111,精品酒店-112,青年旅舍-113,度假村-114,其他-115#爱车-9$4S店/汽车销售-116,汽车保险-117,维修保养-118,配件/车饰-119,驾校-120,汽车租赁-121,停车场-122,加油站-123,其他-124#生活服务-10$旅行社-125,培训-126,室内装潢-127,宠物-128,齿科-129,快照/冲印-130,家政-131,银行-132,学校-133,团购网站-134,其他-135#其他-11$其他-136');-->
                        <!--</script>-->
                    <!--</div>-->
                <!--</div>-->
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商家简介</label>
                    <div class="col-sm-9">
                        <textarea style="height:100px;" name="info" id="info" class="form-control" cols="60" rows="2"><?php  echo $reply['info'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">营业时间</label>
                    <div class="col-sm-9">
                        <input type="text" name="hours" value="<?php  if(empty($reply)) { ?>9:00 ~ 22:00<?php  } else { ?><?php  echo $reply['hours'];?><?php  } ?>" id="hours" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">门店实景</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_multi_image('thumbs',$piclist)?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">提供服务</label>
                    <div class="col-sm-9">
                        <label class="checkbox-inline">
                            <input type="checkbox" id="enable_wifi" name="enable_wifi" value=1 <?php  if($reply['enable_wifi']==1) { ?>checked<?php  } ?>/>wifi
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" id="enable_card" name="enable_card" value=1 <?php  if($reply['enable_card']==1) { ?>checked<?php  } ?>/>刷卡
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" id="enable_room" name="enable_room" value=1 <?php  if($reply['enable_room']==1) { ?>checked<?php  } ?>/>包厢
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" id="enable_park" name="enable_park" value=1 <?php  if($reply['enable_park']==1) { ?>checked<?php  } ?>/>停车
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商家描述</label>
                    <div class="col-sm-9">
                        <textarea style="height:200px; width:535px;" class="form-control richtext" name="content" cols="70" id="reply-add-text"><?php  echo $reply['content'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">电话</label>
                    <div class="col-sm-9">
                        <input type="text" name="tel" id="tel" value="<?php  echo $reply['tel'];?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商家所在地区</label>
                    <div class="col-sm-3">
                        <select name="location_p" id="location_p" class="location form-control"></select>
                    </div>
                    <div class="col-sm-3">
                        <select name="location_c" id="location_c" class="location form-control"></select>
                    </div>
                    <div class="col-sm-3">
                        <select name="location_a" id="location_a" class="location form-control"></select>
                        <script type="text/javascript" src="../addons/weisrc_dish/template/js/region_select.js"></script>
                        <script type="text/javascript">
                            var location_p = "<?php  if(!empty($reply['location_p'])) { ?><?php  echo $reply['location_p'];?><?php  } else { ?>广东省<?php  } ?>";
                            var location_c = "<?php  if(!empty($reply['location_c'])) { ?><?php  echo $reply['location_c'];?><?php  } else { ?>汕头市<?php  } ?>";
                            var location_a = "<?php  if(!empty($reply['location_a'])) { ?><?php  echo $reply['location_a'];?><?php  } else { ?>龙湖区<?php  } ?>";
                            new PCAS("location_p", "location_c", "location_a", location_p, location_c, location_a);
                        </script>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">地址</label>
                    <div class="col-sm-9">
                        <input type="text" name="address" id="address" value="<?php  echo $reply['address'];?>" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
                    <div class="col-sm-9">
                        <input type="text" name="displayorder" value="<?php  echo $reply['displayorder'];?>" id="displayorder" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否显示</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="is_show" value="1" <?php  if($reply['is_show']==1 || empty($reply)) { ?>checked<?php  } ?>>显示
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_show" value="0" <?php  if(isset($reply['is_show']) && empty($reply['is_show'])) { ?>checked<?php  } ?>>隐藏
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">经纬度</label>
                    <div class="col-sm-9">
                        <?php  load()->func('tpl')?>
                        <?php  echo tpl_form_field_coordinate('baidumap',array('lng'=>$reply['lng'],'lat'=>$reply['lat']))?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
    </form>
</div>
<script language='javascript'>
    require(['jquery', 'util'], function ($, u) {
        $(function () {
            u.editor($('.richtext')[0]);
        });
    });
</script>
<script type="text/javascript">
    function check() {
        if($.trim($('#title').val()) == '') {
            message('没有输入商家名称.', '', 'error');
            return false;
        }
        return true;
    }
</script>
  
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
