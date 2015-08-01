<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
     .item_box img{
         width: 100%;
         height: 100%;
     }
</style>
<script type="text/javascript">
    $(function(){
        $(':radio[name="print_status"]').click(function(){
            if(this.checked) {
                if($(this).val() == '1') {
                    $('.sms').show();
                } else {
                    $('.sms').hide();
                }
            }
        });
    });
</script>
<?php  echo $this -> set_tabbar($action, $storeid);?>
<?php  if($operation == 'display') { ?>
<div class="main">
    <input type="hidden" name="storeid" value="<?php  echo $storeid;?>" />
    <div style="margin-top: 15px;margin-bottom: 15px;">
        <a class="btn btn-primary" href="<?php  echo $this->createWebUrl('PrintSetting', array('op' => 'post', 'storeid' => $storeid))?>"><i class="icon-plus"></i>添加打印机</a>
        <a class="btn btn-primary" href="javascript:location.reload()"><i class="icon-refresh"></i> 刷新</a>
    </div>
    <form action="" method="post" class="form-horizontal form" onsubmit="return formcheck(this)">
        <div class="panel panel-default">
            <div class="table-responsive panel-body">
                <table class="table table-hover">
                    <thead class="navbar-inner">
                    <tr>
                        <th style="width:10%;">ID</th>
                        <th style="width:20%;">打印机名称</th>
                        <th style="width:20%;">打印机终端编号</th>
                        <th style="width:15%;">打印方式</th>
                        <th style="width:15%;">打印订单</th>
                        <th style="width:10%;">状态</th>
                        <th style="width:10%; text-align:right;">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  if(is_array($list)) { foreach($list as $item) { ?>
                    <tr>
                        <td><?php  echo $item['id'];?></td>
                        <td><?php  echo $item['title'];?></td>
                        <td><?php  echo $item['print_usr'];?></td>
                        <td>
                            <?php  if($item['print_type']==0) { ?>
                            打印确认订单
                            <?php  } else if($item['print_type']==1) { ?>
                            打印付款订单
                            <?php  } ?>
                        </td>
                        <td>
                            <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('printorder', array('op' => 'display', 'usr' => $item['print_usr'], 'storeid' => $storeid))?>" title="查看订单"><i class="fa fa-cog"> (<?php  if(!empty($print_order_count[$item['print_usr']]['count'])) { ?><font color="green"><?php  echo $print_order_count[$item['print_usr']]['count'];?></font><?php  } else { ?>0<?php  } ?>)</i></a>
                        </td>
                        <td>
                            <?php  if($item['print_status'] == 1) { ?>
                            <span class="label label-success">开启</span>
                            <?php  } else { ?>
                            <span class="label label-danger">关闭</span>
                            <?php  } ?>
                            <!--0为打印成功, 1为过热,3为缺纸卡纸等-->
                        </td>
                        <td style="text-align:right;">
                            <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('printsetting', array('op' => 'post', 'id' => $item['id'], 'storeid' => $storeid))?>" title="查看订单"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('printsetting', array('op' => 'delete', 'id' => $item['id'], 'storeid' => $storeid))?>" title="删除" onclick="return confirm('此操作不可恢复，确认删除？');return false;"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <?php  } } ?>
                    </tbody>
                </table>
                <?php  echo $pager;?>
            </div>
        </div>
    </form>
    <div class="panel panel-default">
        <div class="panel-heading">打印机配置</div>
        <div class="panel-body">
            <p>@@@12345 e 127.0.0.1 <font color=red>(网站ip)</font></p>
            <p>@@@12345 z www.wdlcms.com <font color=red>(网址)</font></p>
            <p>@@@12345 @ web/print.php? <font color=red>(入口文件)</font></p>
            <p>@@@12345 % 10 <font color=red>(访问的时间间隔,建议8秒+)</font></p>
            <p>@@@12345 s 1 <font color=red>(开启gprs上网功能)</font></p>
            <p>以上是发送打印机的代码,单条发送</p>
            <p>打印测试网址: web/print.php?usr=xxx  <font color=red>(xxx为打印机终端编号)</font></p>
            <p>打印机长按左键1分钟恢复出厂设置</p>
            <p>@@@12345 y 1 <font color=red>打印机配置信息</font></p>
        </div>
    </div>
</div>
<?php  } else if($operation == 'post') { ?>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php  echo $setting['id'];?>" />
        <div class="panel panel-default">
            <div class="panel-heading">
                打印机设置
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否启用无线打印</label>
                    <div class="col-sm-9">
                        <label for="print_status" class="radio-inline"><input type="radio" name="print_status" value="1" id="print_status" <?php  if($setting['print_status']==1) { ?>checked<?php  } ?> /> 是</label>
                        &nbsp;&nbsp;&nbsp;
                        <label for="print_status2" class="radio-inline"><input type="radio" name="print_status" value="0" id="print_status2"  <?php  if($setting['print_status']==0 || empty($setting)) { ?>checked<?php  } ?> /> 否</label>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">打印机名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" class="form-control" value="<?php  echo $setting['title'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">打印方式</label>
                    <div class="col-sm-9">
                        <label for="print_type1" class="radio-inline"><input type="radio" name="print_type" value="0" id="print_type1" <?php  if($setting['print_type']==0) { ?>checked="true"<?php  } ?>/>打印确认订单</label>
                        &nbsp;&nbsp;&nbsp;
                        <label for="print_type2" class="radio-inline"><input type="radio" name="print_type" value="1" id="print_type2"  <?php  if($setting['print_type']==1) { ?>checked="true"<?php  } ?>/>打印付款订单</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">打印机终端编号</label>
                    <div class="col-sm-9">
                        <input type="text" name="print_usr" class="form-control" value="<?php  echo $setting['print_usr'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">打印联数</label>
                    <div class="col-sm-9">
                        <input type="text" name="print_nums" class="form-control" value="<?php  echo $setting['print_nums'];?>" />
                        <p class="help-block">默认1</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">头部自定义信息</label>
                    <div class="col-sm-9">
                        <input type="text" name="print_top" class="form-control" value="<?php  echo $setting['print_top'];?>" />
                        <p class="help-block">建议少于20字</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">底部自定义信息</label>
                    <div class="col-sm-9">
                        <input type="text" name="print_bottom" class="form-control" value="<?php  echo $setting['print_bottom'];?>" />
                        <p class="help-block">建议少于20字</p>
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
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>