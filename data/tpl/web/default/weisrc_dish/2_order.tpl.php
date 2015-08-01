<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php  echo $this -> set_tabbar($action, $storeid);?>
<?php  if($operation == 'display') { ?>
<div class="main">
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="weisrc_dish" />
                <input type="hidden" name="do" value="order" />
                <input type="hidden" name="op" value="display" />
                <input type="hidden" name="storeid" value="<?php  echo $storeid;?>" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">订单号</label>
                    <div class="col-sm-2 col-lg-2">
                        <input class="form-control" name="ordersn" id="" type="text" value="<?php  echo $_GPC['ordersn'];?>">
                    </div>
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">客户手机</label>
                    <div class="col-sm-2 col-lg-2">
                        <input class="form-control" name="tel" id="" type="text" value="<?php  echo $_GPC['tel'];?>">
                    </div>
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">客户姓名</label>
                    <div class="col-sm-2 col-lg-2">
                        <input class="form-control" name="username" id="" type="text" value="<?php  echo $_GPC['username'];?>">
                    </div>
                    <div class="col-sm-3 col-lg-2"><button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button></div>
                </div>
            </form>
        </div>
    </div>
    <style>
        .page-nav {
            margin: 0;
            width: 100%;
            min-width: 800px;
        }

        .page-nav > li > a {
            display: block;
        }

        .page-nav-tabs {
            background: #EEE;
        }

        .page-nav-tabs > li {
            line-height: 40px;
            float: left;
            list-style: none;
            display: block;
            text-align: -webkit-match-parent;
        }

        .page-nav-tabs > li > a {
            font-size: 14px;
            color: #666;
            height: 40px;
            line-height: 40px;
            padding: 0 10px;
            margin: 0;
            border: 1px solid transparent;
            border-bottom-width: 0px;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
        }

        .page-nav-tabs > li > a, .page-nav-tabs > li > a:focus {
            border-radius: 0 !important;
            background-color: #f9f9f9;
            color: #999;
            margin-right: -1px;
            position: relative;
            z-index: 11;
            border-color: #c5d0dc;
            text-decoration: none;
        }

        .page-nav-tabs >li >a:hover {
            background-color: #FFF;
        }

        .page-nav-tabs > li.active > a, .page-nav-tabs > li.active > a:hover, .page-nav-tabs > li.active > a:focus {
            color: #576373;
            border-color: #c5d0dc;
            border-top: 2px solid #4c8fbd;
            border-bottom-color: transparent;
            background-color: #FFF;
            z-index: 12;
            margin-top: -1px;
            box-shadow: 0 -2px 3px 0 rgba(0, 0, 0, 0.15);
        }
    </style>
    <input type="hidden" name="storeid" value="<?php  echo $storeid;?>" />
    <ul class="page-nav page-nav-tabs" style="background:none;float: left;margin-left: 0px;padding-left: 0px;border-bottom:1px #c5d0dc solid;">
        <li<?php  if(empty($_GPC['status'])) { ?> class="active"<?php  } ?>>
        <a href="<?php  echo $this->createWebUrl('order', array('op' => 'display', 'status' => 0, 'storeid' => $storeid))?>">全部订单(<?php  echo $order_count_all;?>)</a>
        </li>
        <li<?php  if($_GPC['status']==2) { ?> class="active"<?php  } ?>>
        <a href="<?php  echo $this->createWebUrl('order', array('op' => 'display', 'status' => 2, 'storeid' => $storeid))?>">已付款订单(<?php  echo $order_count_pay;?>)</a>
        </li>
        <li<?php  if($_GPC['status']==1) { ?> class="active"<?php  } ?>>
        <a href="<?php  echo $this->createWebUrl('order', array('op' => 'display', 'status' => 1, 'storeid' => $storeid))?>">已确认订单(<?php  echo $order_count_confirm;?>)</a>
        </li>
        <li<?php  if($_GPC['status']==3) { ?> class="active"<?php  } ?>>
        <a href="<?php  echo $this->createWebUrl('order', array('op' => 'display', 'status' => 3, 'storeid' => $storeid))?>">已完成订单(<?php  echo $order_count_finish;?>)</a>
        </li>
        <li<?php  if($_GPC['status']==-1) { ?> class="active"<?php  } ?>>
        <a href="<?php  echo $this->createWebUrl('order', array('op' => 'display', 'status' => -1, 'storeid' => $storeid))?>">已取消订单(<?php  echo $order_count_cancel;?>)</a>
        </li>
    </ul>
    &nbsp;
    <div class="panel panel-default">
        <form action="" method="post" class="form-horizontal form" >
        <input type="hidden" name="storeid" value="<?php  echo $storeid;?>" />
        <div class="table-responsive panel-body">
            <table class="table table-hover">
                <thead class="navbar-inner">
                <tr>
                    <th style="width:4%;">ID</th>
                    <th style="width:12%;">订单号</th>
                    <th style="width:9%;">姓名</th>
                    <th style="width:12%;">电话</th>
                    <th style="width:6%;">类型</th>
                    <th style="width:8%;">总价</th>
                    <th style="width:8%;">订单状态</th>
                    <th style="width:8%;">处理状态</th>
                    <th style="width:15%;">下单时间</th>
                    <th style="width:6%; text-align:right;">打印</th>
                    <th style="width:12%; text-align:right;">查看/删除/拉黑</th>
                </tr>
                </thead>
                <tbody>
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
                <tr>
                    <td><?php  echo $item['id'];?></td>
                    <td><?php  echo $item['ordersn'];?></td>
                    <td><?php  echo $item['username'];?></td>
                    <td><?php  echo $item['tel'];?></td>
                    <td title="地址:<?php  echo $item['address'];?>">
                        <?php  if($item['dining_mode']==1) { ?><span class="label label-success">到店</span><?php  } ?>
                        <?php  if($item['dining_mode']==2) { ?><span class="label label-danger">外卖</span><?php  } ?>
                        <?php  if($item['dining_mode']==3) { ?><span class="label label-default">预订</span><?php  } ?>
                    </td>
                    <td><?php  echo $item['totalprice'];?> 元</td>
                    <td>
                        <?php  if($item['status'] == 0) { ?><span class="label label-danger">未确认</span><?php  } ?>
                        <?php  if($item['status'] == 1) { ?><span class="label label-info">已确认</span><?php  } ?>
                        <?php  if($item['status'] == 2) { ?><span class="label label-success">已付款</span><?php  } ?>
                        <?php  if($item['status'] == 3) { ?><span class="label label-success">已完成</span><?php  } ?>
                        <?php  if($item['status'] == -1) { ?><span class="label label-success">已关闭</span><?php  } ?>
                    </td>
                    <td>
                        <?php  if($item['sign'] == -1) { ?><span class="label label-danger">已拒绝</span><?php  } ?>
                        <?php  if($item['sign'] == 0) { ?><span class="label label-info">未处理</span><?php  } ?>
                        <?php  if($item['sign'] == 1) { ?><span class="label label-success">已处理</span><?php  } ?>
                    </td>
                    <td><?php  echo date('Y-m-d H:i:s', $item['dateline'])?></td>
                    <td>
                        <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('order', array('op' => 'print', 'id' => $item['id'], 'storeid' => $storeid))?>" title="打印订单" onclick="return confirm('确认打印吗？');return false;"><i class="fa fa-print"> (<?php  if(!empty($print_order_count[$item['id']]['count'])) { ?><font color="green"><?php  echo $print_order_count[$item['id']]['count'];?></font><?php  } else { ?>0<?php  } ?>)</i></a>
                    </td>
                    <td style="text-align:right;">
                        <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('order', array('op' => 'detail', 'id' => $item['id'], 'storeid' => $storeid))?>" title="查看订单"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('order', array('op' => 'delete', 'id' => $item['id'], 'storeid' => $storeid))?>" title="删除订单" onclick="return confirm('此操作不可恢复，确认删除？');return false;"><i class="fa fa-times"></i></a>
                        <?php  if(!empty($blacklist[$item['from_user']])) { ?>
                        <a class="btn btn-default btn-sm" style="color:red;" href="<?php  echo $this->createWebUrl('order', array('op' => 'black', 'id' => $item['id'], 'storeid' => $storeid))?>" title="拉黑名单"><i class="fa fa-trash"></i></a>
                        <?php  } else { ?>
                        <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('order', array('op' => 'black', 'id' => $item['id'], 'storeid' => $storeid))?>" title="拉黑名单"><i class="fa fa-trash"></i></a>
                        <?php  } ?>
                    </td>
                </tr>
                <?php  } } ?>
                </tbody>
            </table>
            <?php  echo $pager;?>
        </div>
    </div>
    </form>
</div>
<?php  } else if($operation == 'detail') { ?>
<div class="main">
	<form class="form-horizontal form" action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php  echo $item['id'];?>">
        <div class="panel panel-default">
            <div class="panel-heading">
                订单信息
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">订单类型</label>
                    <div class="col-sm-9">
                        <p class="form-control">
                        <?php  if($item['dining_mode']==1) { ?><span class="label label-primary">店内</span><?php  } ?>
                        <?php  if($item['dining_mode']==2) { ?><label class="inline"><span class="label label-danger" >外卖</span> 地址:<?php  echo $item['address'];?></label><?php  } ?>
                        <?php  if($item['dining_mode']==3) { ?><span class="label label-primary">预订</span><?php  } ?>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">订单号</label>
                    <div class="col-sm-9">
                        <p class="form-control"><?php  echo $item['ordersn'];?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">总价</label>
                    <div class="col-sm-9">
                        <p class="form-control"><?php  echo $item['totalprice'];?> 元</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">付款方式</label>
                    <div class="col-sm-9">
                        <p class="form-control">
                        <?php  if($item['paytype'] == 0) { ?>线下付款<?php  } ?>
                        <?php  if($item['paytype'] == 1) { ?>余额支付<?php  } ?>
                        <?php  if($item['paytype'] == 2) { ?>在线支付<?php  } ?>
                        <?php  if($item['paytype'] == 3) { ?>货到付款<?php  } ?>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">订单状态</label>
                    <div class="col-sm-9">
                        <p class="form-control">
                        <?php  if($item['status'] == 0) { ?><span class="label label-info">未确认</span><?php  } ?>
                        <?php  if($item['status'] == 1) { ?><span class="label label-info">已确认</span><?php  } ?>
                        <?php  if($item['status'] == 2) { ?><span class="label label-info">已付款</span><?php  } ?>
                        <?php  if($item['status'] == 3) { ?><span class="label label-success">已结算</span><?php  } ?>
                        <?php  if($item['status'] == -1) { ?><span class="label label-error">已关闭</span><?php  } ?>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">下单日期</label>
                    <div class="col-sm-9">
                        <p class="form-control">
                        <?php  echo date('Y-m-d H:i:s', $item['dateline'])?>
                        </p>
                    </div>
                </div>
                <?php  if($item['dining_mode']==1) { ?>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">人数</label>
                                <div class="col-sm-9">
                                    <p class="form-control">
                                    <?php  echo $item['counts'];?>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">位置类型</label>
                                <div class="col-sm-9">
                                    <p class="form-control">
                                    <?php  if($item['seat_type']==1) { ?>大厅<?php  } ?>
                                    <?php  if($item['seat_type']==2) { ?>包厢<?php  } ?>
                                    </p>
                                </div>
                            </div>
                            <?php  if($item['seat_type']==1) { ?>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">桌号</label>
                                <div class="col-sm-9">
                                    <p class="form-control">
                                    <?php  echo $item['tables'];?>
                                    </p>
                                </div>
                            </div>
                            <?php  } ?>
                            <?php  if($item['seat_type']==2) { ?>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">包厢</label>
                                <div class="col-sm-9">
                                    <p class="form-control">
                                    <?php  echo $room[$item['room']]['name'];?>
                                    </p>
                                </div>
                            </div>
                            <?php  } ?>
                <?php  } ?>
                <?php  if($item['dining_mode']==2) { ?>
                    <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">送餐时间</label>
                    <div class="col-sm-9">
                        <p class="form-control">
                        <?php  echo $item['meal_time'];?>
                        </p>
                    </div>
                </div>
                <?php  } ?>
                <?php  if($item['dining_mode']==3) { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">包人数厢</label>
                    <div class="col-sm-9">
                        <p class="form-control">
                        <?php  echo $item['counts'];?>
                        </p>
                    </div>
                </div>
                <?php  if($item['seat_type']==1) { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">桌号</label>
                    <div class="col-sm-9">
                        <p class="form-control">
                        <?php  echo $item['tables'];?>
                        </p>
                    </div>
                </div>
                <?php  } ?>
                <?php  if($item['seat_type']==2) { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">包厢</label>
                    <div class="col-sm-9">
                        <p class="form-control">
                        <?php  echo $room[$item['room']];?>
                        </p>
                    </div>
                </div>
                <?php  } ?>
            
                <?php  if(!empty($item['carports'])) { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">预订车位</label>
                    <div class="col-sm-9">
                        <p class="form-control">
                        <?php  echo $item['carports'];?>
                        </p>
                    </div>
                </div>
                <?php  } ?>
                <?php  } ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">备注</label>
                    <div class="col-sm-9">
                        <textarea style="height:50px;" class="form-control" name="remark" cols="70"><?php  echo $item['remark'];?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                订单处理
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">订单处理</label>
                    <div class="col-sm-3">
                        <select name="sign" class="form-control">
                            <option value="0"<?php  if($item['sign'] == 0) { ?> selected<?php  } ?>>未处理</option>
                            <option value="1"<?php  if($item['sign'] == 1) { ?> selected<?php  } ?>>已处理</option>
                            <option value="-1"<?php  if($item['sign'] == -1) { ?> selected<?php  } ?>>已拒绝</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">店家回复</label>
                    <div class="col-sm-9">
                        <textarea style="height:50px;" class="form-control" name="reply" cols="70"><?php  echo $item['reply'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary span2" onclick="return confirm('确认提交吗'); return false;" name="confrimsign" value="完成">提交</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                用户信息
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">姓名</label>
                    <div class="col-sm-9">
                        <p class="form-control">
                        <?php  echo $item['username'];?>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">手机</label>
                    <div class="col-sm-9">
                        <p class="form-control">
                        <?php  echo $item['tel'];?>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">地址</label>
                    <div class="col-sm-9">
                        <p class="form-control">
                        <?php  echo $item['address'];?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                商品信息
            </div>
            <div class="table-responsive panel-body">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th style="width:10%;">ID</th>
					<th style="width:15%;">商品标题</th>
                    <th style="width:15%;">图片</th>
					<th style="width:10%;">特价</th>
                    <th style="width:10%;">原价</th>
                    <th style="width:10%;">单位</th>
					<th style="width:10%;">数量</th>
					<th style="text-align:right; width:20%;">操作</th>
				</tr>
			</thead>
			<?php  if(is_array($item['goods'])) { foreach($item['goods'] as $row) { ?>
			<tr>
				<td><?php  echo $row['id'];?></td>
                <td><?php  if(!empty($category[$row['pcate']])) { ?><span class="text-error">[<?php  echo $category[$row['pcate']]['name'];?>] </span><?php  } ?><?php  echo $row['title'];?></td>
                <td>
                    <img src="<?php  echo $_W['attachurl'];?><?php  echo $row['thumb'];?>" width="50" />
                </td>
				<td style="background:#f2dede;">
                    <?php  if($row['isspecial'] == 2) { ?>[特价]<?php  echo $row['marketprice'];?>元<?php  } else if($row['isspecial'] == 3) { ?>[会员]<?php  echo $row['marketprice'];?>元<?php  } ?></td>
                <td><?php  echo $row['productprice'];?>元</td>
                <td>
                    <?php  echo $row['unitname'];?>
                </td>
				<td><?php  echo $goodsid[$row['id']]['total'];?></td>
				<td style="text-align:right;">
					<a href="<?php  echo $this->createWebUrl('goods', array('id' => $row['id'], 'op' => 'post', 'storeid' => $storeid))?>">编辑</a>&nbsp;&nbsp;<a href="<?php  echo $this->createWebUrl('goods', array('id' => $row['id'], 'op' => 'delete', 'storeid' => $storeid))?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;">删除</a>
				</td>
			</tr>
			<?php  } } ?>
		</table>
        </div>
        </div>
        <div class="form-group col-sm-12">
            <?php  if($item['status']==0) { ?>
            <button type="submit" class="btn btn-primary span2" onclick="return confirm('确认付款此订单吗？'); return false;" name="confrimpay" onclick="" value="完成">确认付款</button>
            <?php  } ?>
            <?php  if($item['status'] == 1) { ?>
            <button type="submit" class="btn btn-primary span2" onclick="return confirm('确认完成此订单吗？'); return false;" name="finish" onclick="" value="完成">完成订单</button>
            <?php  } ?>
            <?php  if($item['status'] == 2) { ?>
            <button type="submit" class="btn btn-primary span2" name="confirm" value="正常" onclick="return confirm('确认取消完成此订单吗？'); return false;">确认订单</button>
            <button type="submit" class="btn btn-primary span2" name="cancel" value="正常" onclick="return confirm('确认取消完成此订单吗？'); return false;">取消完成</button>
            <button type="submit" class="btn btn-primary span2" name="cancelpay" value="正常" onclick="return confirm('确认取消付款此订单吗？'); return false;">取消付款</button>
            <?php  } ?>
            <?php  if($item['status'] != -1) { ?>
            <button type="submit" class="btn span2" name="close" onclick="return confirm('确认关闭此订单吗？'); return false;" value="关闭">关闭订单</button>
            <?php  } else { ?>
            <button type="submit" class="btn span2 btn-primary" name="cancelpay" onclick="return confirm('确认开启此订单吗？'); return false;" value="关闭">开启订单</button>
            <?php  } ?>
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
	</form>
</div>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>