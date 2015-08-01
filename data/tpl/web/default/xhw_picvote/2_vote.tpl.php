<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <ul class="nav nav-tabs">
        <li class="active"><a href="<?php  echo $this->createWebUrl('vote', array('id' => $_GET['id']));?>">投票管理</a></li>
        <li><a href="<?php  echo $this->createWebUrl('post', array('rid' => $_GET['id']));?>">添加投票</a></li>
        <li><a href="<?php  echo $this->createWebUrl('log', array('id' => $_GET['id']))?>">投票记录查询</a></li>
    </ul>
 <div class="panel panel-info">
    <div class="panel-heading">筛选</div>
    <div class="panel-body">
        <form action="./index.php" method="get" class="form-horizontal" role="form">
            <input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" name="m" value="xhw_picvote" />
            <input type="hidden" name="do" value="vote" />
            <?php  if($_GET['id'] != '') { ?>
            <input type="hidden" name="id" value="<?php  echo $_GET['id'];?>" />
            <?php  } else { ?>
            <input type="hidden" name="id" value="<?php  echo $_GET['rid'];?>" />
            <?php  } ?>
            <div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">编号</label>
                <div class="col-sm-8 col-lg-9">
                    <input class="form-control" name="keywords" id="" type="text" value="<?php  echo $_GPC['keywords'];?>">
                </div>
                                <div class=" col-xs-12 col-sm-2 col-lg-2">
                    <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
                    <td colspan="2">
                 <a class="btn btn-primary" href="<?php echo "../addons/xhw_picvote/down.php?weid=".$_W['uniacid']."&host=".$host."&username=".$username."&password=".$password."&database=".$database;?>"><i class="icon-download-alt"></i>导出数据excel</a>
                        </td>
                </div>
            </div>
            <div class="form-group">
            </div>
        </form>
    </div>
 
    </div>
  <div class="panel panel-default">
        <div class="panel-body table-responsive">
            <table class="table table-hover">
                <thead class="navbar-inner">
                <tr>
                    <th style="width:80px;">编号</th>
                    <th class="row-hover">标题</th>
                    <th class="row-hover">昵称</th>
                    <th class="row-hover">照片</th>
                    <th class="row-hover">票数</th>
                    <th class="row-hover">人气</th>
                    <th class="row-hover">手机</th>
                    <th style="width:120px; text-align:right;">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $row) { ?>
                <tr> 
                    <td><?php  echo $row['id'];?></td>
                    <td><?php  echo $row['title'];?></td>
                    <td><?php  echo $row['nickname'];?></td>
                    <td><img src="../attachment/<?php  echo $row['avatar'];?>" width="40"/></td>
                    <td><?php  echo $row['num'];?></td>
                    <td><?php  echo $row['sharenum'];?></td>
                    <td><?php  echo $row['phone'];?></td>
                    <td >
                <td>
                <a class="btn btn-primary btn-sm" href="<?php  echo $this->createWebUrl('log', array('id' => $_GPC['id'],'numid' => $row['id']))?>">查看投票</a>
                  <a class="btn btn-success btn-sm" href="<?php  echo $this->createWebUrl('post', array('id' => $row['id'],'rid' => $_GET['id']))?>" title="编辑"><i class="icon-edit"></i>编辑</a>
                  <a class="btn btn-default btn-sm" href="#" onclick="drop_confirm('您确定要删除吗?', '<?php  echo $this->createWebUrl('post',array('op'=>'delete', 'id'=>$row['id']))?>');" title="删除"><i class="icon-remove"></i>删除</a>
                    </td>
                </tr>
                <?php  } } ?>
            </tbody>
        </table>
        <?php  echo $pager;?>
    </div>
</div>
<script type="text/javascript">
    function drop_confirm(msg, url){
        if(confirm(msg)){
            window.location = url;
        }
    }
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>