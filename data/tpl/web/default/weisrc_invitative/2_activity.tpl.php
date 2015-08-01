<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li <?php  if($operation == 'post') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('activity', array('op' => 'post'))?>">添加邀请帖</a></li>
    <li <?php  if($operation == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('activity', array('op' => 'display'))?>">管理邀请帖</a></li>
</ul>
<?php  if($operation == 'display') { ?>
<style>
    .form th {
        text-align: left;
        width: 10px;
        margin-right: 20px;
        overflow: hidden;
        float: none;
    }
</style>
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
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="weisrc_invitative" />
                <input type="hidden" name="do" value="activity" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width: 100px;">关键字</label>
                    <div class="col-sm-2 col-lg-2">
                        <input class="form-control" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>"  placeholder="请输入活动名称">
                    </div>
                    <div class="col-sm-2 col-lg-2">
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="table-responsive panel-body">
        <form action="" method="post" class="form-horizontal form">
        <table class="table table-hover">
            <thead class="navbar-inner">
            <tr>
                <th style="width:10%">顺序</th>
                <th style="width:5%;">编号</th>
                <th style="width:28%;">活动名称</th>
                <th style="width:27%;">报名时间</th>
                <th style="width:10%;">报名用户</th>
                <th style="width:8%;">状态</th>
                <th style="width:12%;text-align: right;">编辑/删除</th>
            </tr>
            </thead>
            <tbody id="level-list">
            <?php  if(is_array($list)) { foreach($list as $item) { ?>
            <tr>
                <td><input type="text" class="form-control" name="displayorder[<?php  echo $item['id'];?>]" value="<?php  echo $item['displayorder'];?>" style="width: 60px;"></td>
                <td><?php  echo $item['id'];?></td>
                <td><?php  echo $item['title'];?></td>
                <td><?php  echo date('Y-m-d H:i', $item['starttime'])?>~<?php  echo date('Y-m-d H:i', $item['endtime'])?></td>
                <td>
                    <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('user', array('op' => 'display', 'activityid' => $item['id']))?>" title="管理"><i class="fa fa-user"></i>(<?php  if(!empty($users[$item['id']]['count'])) { ?><font color="green"><?php  echo $users[$item['id']]['count'];?></font><?php  } else { ?>0<?php  } ?>)</a>
                </td>
                <td>
                    <?php  if($item['status']==1) { ?>
                    <span class="label" style="background:#56af45;">显示</span>
                    <?php  } else { ?>
                    <span class="label" style="background:#f00;">隐藏</span>
                    <?php  } ?>
                </td>
                <td style="text-align: right;">
                    <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('activity', array('op' => 'post', 'id' => $item['id']))?>" title="编辑"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-default btn-sm" onclick="return confirm('确认删除吗？');return false;" href="<?php  echo $this->createWebUrl('activity', array('op' => 'delete', 'id' => $item['id']))?>" title="删除"><i class="fa fa-times"></i></a>
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
<style>
    .item_box img{
        width: 100%;
        height: 100%;
    }
</style>
<style type="text/css">
    .changeTheme {
        position: relative;
    }
    .changeTheme:after {
        content: ' ';
        position: absolute;
        display: inline-block;
        display: none;
        width: 28px;
        height: 28px;
        left: 50%;
        top: 50%;
        margin-left: -14px;
        margin-top: -14px;
        background: url(http://ctrl.u.qiniudn.com/loading.gif) center no-repeat;
        background-size: 50%;
        opacity: .78;
    }
    .changeTheme.loading:after {
        display: inline-block;
    }

    .theme_list {
        list-style-type:none;
        overflow:hidden;
    }
    .theme_list li{
        padding-bottom:2em;
        float:left;
        width:20%;
        text-align:center;
        line-height:120%;
        overflow:hidden;
    }
    .theme_list li img{
        width:128px;
        height:174px;
    }
    .theme_list li input{
        vertical-align:top;
    }
</style>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="invitative">
        <div class="panel panel-default">
            <div class="panel-heading">
                基本信息
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">图文回复标题</label>
                    <div class="col-sm-9">
                        <input type="text" name="reply_title" value="<?php  echo $item['reply_title'];?>" id="reply_title" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">封面</label>
                    <div class="col-sm-9">
                        <?php  if(empty($item['thumb'])) { ?>
                        <?php  echo tpl_form_field_image('thumb', '../addons/weisrc_invitative/template/images/card_images/card_01.png')?>
                        <?php  } else { ?>
                        <?php  echo tpl_form_field_image('thumb', $item['thumb'])?>
                        <?php  } ?>
                        <div class="help-block">大图片建议尺寸：640像素 * 320像素</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">简介</label>
                    <div class="col-sm-9">
                        <textarea name="description" id="description" class="form-control" cols="60" rows="4"><?php  echo $item['description'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">报名开始时间</label>
                    <div class="col-xs-12 col-sm-9">
                        <?php  echo tpl_form_field_date('starttime', $starttime, true)?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">报名结束时间</label>
                    <div class="col-xs-12 col-sm-9">
                        <?php  echo tpl_form_field_date('endtime', $endtime, true)?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:#f00;">状态</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="status" value="1" <?php  if($item['status']==1 || empty($item)) { ?>checked<?php  } ?>>显示
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" value="0" <?php  if(isset($item['status']) && empty($item['status'])) { ?>checked<?php  } ?>>隐藏</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
                    <div class="col-sm-9">
                        <input type="text" name="displayorder" value="<?php  if(empty($item)) { ?>0<?php  } else { ?><?php  echo $item['displayorder'];?><?php  } ?>" id="displayorder" class="form-control" />
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                邀请帖编辑
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" value="<?php  echo $item['title'];?>" id="title" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">自定义背景</label>
                    <div class="col-sm-9">
                        <?php  if(empty($item['bg'])) { ?>
                        <?php  echo tpl_form_field_image('bg', '../addons/weisrc_invitative/template/images/bg.jpg')?>
                        <?php  } else { ?>
                        <?php  echo tpl_form_field_image('bg', $item['bg'])?>
                        <?php  } ?>
                        <div class="help-block">大图片建议尺寸：1000像素 * 737像素</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">邀请卡样式</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="cardtype" value="1" <?php  if($item['cardtype']==1 || empty($item)) { ?>checked<?php  } ?>>默认
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="cardtype" value="0" <?php  if(isset($item['cardtype']) && empty($item['cardtype'])) { ?>checked<?php  } ?>>自定义</label>
                    </div>
                </div>
                <div class="form-group" id="cardtype2" style="<?php  if($item['cardtype']==1 || !isset($item['cardtype'])) { ?>display:none;<?php  } ?>">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('cardbg', $item['cardbg'])?>
                        <div class="help-block">大图片建议尺寸：490像素 * 490像素</div>
                    </div>
                </div>
                <div class="form-group" id="cardtype1" style="<?php  if(isset($item['cardtype']) && empty($item['cardtype'])) { ?>display:none;<?php  } ?>">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9">
                        <a href="javascript:;" class="btn btn-default" onclick="$('#modal-module-menus').modal();"><i class="fa fa-plus"></i> 选择要邀请帖样式</a>
                        <div class="input-group " style="margin-top:.5em;">
                            <img src="<?php  echo $page_cardbg;?>" onerror="this.src='../addons/weisrc_invitative/template/images/card_images/card_01.png'; this.title='图片未找到.'" class="img-responsive img-thumbnail" width="150" id="showcardbg">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动幻灯片</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_multi_image('thumbs',$thumbs)?>
                        <div class="help-block">图片建议尺寸：220像素 * 149像素</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">音频链接</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_audio('musicurl', $item['musicurl'])?>
                        <span class="help-block">选择上传的音频文件或直接输入URL地址，常用格式：mp3,wav,ogg<br/>
                            默认音乐链接:     <?php echo RES;?>music/aideluomanshi.mp3
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">联系电话</label>
                    <div class="col-sm-9">
                        <input type="text" name="tel" id="tel" value="<?php  echo $item['tel'];?>" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">地址</label>
                    <div class="col-sm-9">
                        <input type="text" name="address" id="address" value="<?php  echo $item['address'];?>" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">坐标</label>
                    <div class="col-sm-9" style="margin-left:-15px;">
                        <?php  echo tpl_form_field_coordinate('baidumap', $item)?>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                活动详情
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">主办方</label>
                    <div class="col-sm-9">
                        <input type="text" name="organizers" value="<?php  echo $item['organizers'];?>" id="organizers" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动内容</label>
                    <div class="col-sm-9">
                        <textarea name="content" id="content" class="form-control richtext" cols="60" rows="6"><?php  echo $item['content'];?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1"/>
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
        <div id="modal-module-menus"  class="modal fade" tabindex="-1">
            <div class="modal-dialog" style='width: 920px;'>
                <div class="modal-content">
                    <div class="modal-header"><button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3>选择要展示的样式</h3></div>
                    <div class="modal-body">
                        <div class="row">
                            <div>
                                <ul class="theme_list" style="margin-left: 0px;">
                                    <?php  if(is_array($theme_array)) { foreach($theme_array as $theme) { ?>
                                    <li>
                                        <label class="changeTheme">
                                            <img src="../addons/weisrc_invitative/template/images/card_images/<?php  echo $theme;?>" width="100"/>
                                            <div style="padding-top: 4px;"><input type="radio" name="bgname" value="<?php  echo $theme;?>" <?php  if($item['cardbg']==$theme) { ?>checked<?php  } ?> /><?php  echo $theme;?>
                                            </div>
                                        </label>
                                    </li>
                                    <?php  } } ?>
                                </ul>
                            </div>
                        </div>
                        <input type="hidden" name="select_theme" id="select_theme" value="<?php  if($item['cardtype']==1) { ?><?php  if(!empty($item['cardbg'])) { ?><?php  echo $item['cardbg'];?><?php  } else { ?>card_01.png<?php  } ?><?php  } ?>"/>
                        <div id="module-menus" style="padding-top:5px;"></div>
                    </div>
                    <div class="modal-footer"><a href="#" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</a></div>
                </div>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $("input[name=cardtype]").click(function(){
        var type = $("input[type=radio][name=cardtype]:checked").val();
        if (type == 1) {
            $("#cardtype1").show();
            $("#cardtype2").hide();
        } else {
            $("#cardtype1").hide();
            $("#cardtype2").show();
        }
    });
</script>
<script>
    (function() {
        $(document).ready(function() {
            var themeid = "card_01.jpg";
            $('.changeTheme').click(function(e) {
                //e.preventDefault();
                var thisInput = $(this).find('input');
                var selectedTheme = thisInput.val();//选择id
                var _this = $(this);
                var _preview = $('#preview');
                if(selectedTheme != themeid) {
                    thisInput.attr("checked", "y");
                    $('#select_theme').val(selectedTheme);
                    var imgurl = '../addons/weisrc_invitative/template/images/card_images/' + selectedTheme;
                    $("#showcardbg").attr("src", imgurl);
                }
            });
        });
    }).call(this);

    require(['jquery.ui', 'bootstrap.switch','util'], function($, $, u){
        $(function(){
            //表单验证
            $(function () {
                $('#invitative').submit(function () {
                    if ($.trim($(':text[name="reply_title"]').val()) == '') {
                        u.message('请填写图文回复标题.', '', 'error');
                        return false;
                    }

                    if ($.trim($(':text[name="title"]').val()) == '') {
                        u.message('必须填写活动标题.', '', 'error');
                        return false;
                    }

//                    if ($.trim($(':text[name="content"]').val()) == '') {
//                        u.message('必须填写活动内容.', '', 'error');
//                        return false;
//                    }

//                    if ($.trim($('textarea[name="description"]').val()) == '') {
//                        u.message('必须填写活动说明.', '', 'error');
//                        return false;
//                    }

//                    if ($.trim($(':text[name="thumb"]').val()) == '') {
//                        u.message('必须上传活动封面.', '', 'error');
//                        return false;
//                    }
                    return true;
                });
            });
        });
    });

    require(['jquery', 'util'], function ($, u) {
        $(function () {
            u.editor($('.richtext')[0]);
        });
    });
</script>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
