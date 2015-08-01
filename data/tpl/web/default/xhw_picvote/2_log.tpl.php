<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <ul class="nav nav-tabs">
        <li class="active"><a href="<?php  echo $this->createWebUrl('log', array('id' => $_GET['id']))?>">投票记录</a></li>
        <li><a href="<?php  echo $this->createWebUrl('vote', array('id' => $_GET['id']));?>">投票管理</a></li>
    </ul>
     <div class="search">
<td>
 <a class="btn btn-danger" href="<?php  echo $this->createWebUrl('log', array('id' => $_GET['id'],'op' => 'delete'))?>"><i class="icon-remove-sign"></i>清空投票数据</a>
 <button class="btn" disabled>注：数据清理后无法恢复，建议活动结束后或已做好反作弊排查后再清理，清理无用记录可提高程序运行效率。</button>
  </td>
    </div>
<div class="panel panel-default">
        <div class="panel-body table-responsive">
            <table class="table table-hover">
                <thead class="navbar-inner">
                <tr>
                    <th style="width:80px;">序号</th>
                    <th class="row-hover">投票者openid</th>
                    <th class="row-hover">投票时间</th>
                    <th class="row-hover">投票IP</th>
                    <th class="row-hover">被投票ID</th>
                    <th class="row-hover">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $row) { ?>
                <tr> 
                    <td><?php  echo $row['id'];?></td>
                    <td><a class="btn btn-primary" href="<?php  echo $this->createWebUrl('log', array('id' => $_GPC['id'],'openid' => $row['openid']))?>"><?php  echo $row['openid'];?></a></td>
                    <td><?php  echo date("Y-m-d H:i:s", $row['time']);?></td>
                    <td><?php  echo $row['ip'];?></td>
                    <td> <a class="btn btn-info" href="<?php  echo $this->createWebUrl('log', array('id' => $_GPC['id'],'numid' => $row['numid']))?>"><?php  echo $row['numid'];?></a></td>
                    <td ><a class="btn btn-inverse" href="<?php  echo $this->createWebUrl('post', array('id' => $row['numid'],'rid' => $_GPC['id']))?>">编辑被投票用户</a>
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