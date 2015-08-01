<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <ul class="nav nav-tabs">
        <li><a href="<?php  echo $this->createWebUrl('project');?>">项目管理</a></li>
        <li class="active"><a href="<?php  echo $this->createWebUrl('voice', array('id' => $_GET['id']))?>">投稿审核</a></li>
    </ul>
    <div class="panel panel-info">
     <div class="panel-body">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>以下投稿审核通过后将加入到<font size="6" color="red"><b>项目<?php  echo $_GET['id'];?></b></font>中</th>
                    </tr>

                </tbody>
            </table>
    </div></div>
  <div class="panel panel-default">
        <div class="panel-body table-responsive">
            <table class="table table-hover">
                <thead class="navbar-inner">
                <tr>
                    <th style="width:80px;">编号</th>
                    <th class="row-hover">标题</th>
                    <th class="row-hover">名字</th>
                    <th class="row-hover">照片</th>
                    <th class="row-hover">票数</th>
                    <th class="row-hover">手机</th>
                    <th class="row-hover">投稿时间</th>
                    <th style="width:200px; text-align:right;">操作</th>
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
                    <td><?php  echo $row['phone'];?></td>
                    <td><?php  echo date('Y-m-d H:i:s',$row['time']);?></td>
                  <td style="text-align:right;">
                  <a class="btn btn-success btn-sm" href="<?php  echo $this->createWebUrl('post', array('id' => $row['id'],'rid' => $_GET['id']))?>" title="编辑"><i class="icon-edit"></i>编辑</a>
                <a class="btn btn-primary btn-sm" href="#" onclick="drop_confirm('您确定审核通过吗?', '<?php  echo $this->createWebUrl('post',array('op'=>'pass', 'id'=>$row['id'], 'rid'=>$_GET['id']))?>');" title="通过"><i class="icon-ok"></i>通过</a> 
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