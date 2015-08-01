<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li <?php  if($op == 'display') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('industry',array('op' =>'display'))?>">行业管理</a></li>
    <li<?php  if(empty($industry['id']) && $op== 'post') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('industry',array('op' =>'post'))?>">添加行业</a></li>
    <?php  if(!empty($industry['id']) &&  $op== 'post') { ?><li  class="active"><a href="<?php  echo $this->createWebUrl('industry',array('op' =>'post','id'=>$industry['id']))?>">编辑行业</a></li><?php  } ?>
</ul>

<?php  if($op == 'display') { ?>

<div class="main panel panel-default">
    <div class="panel-body table-responsive">
        <table class="table table-hover">
            <thead class="navbar-inner">
            <tr>
                <th>显示顺序</th>
                <th>行业名称</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php  if(is_array($list)) { foreach($list as $industry) { ?>
            <tr>
                <td><?php  echo $industry['displayorder'];?></td>
                <td>
                    <?php  echo $industry['title'];?>
                </td>
                <td style="text-align:left;">
                    <a href="<?php  echo $this->createWebUrl('industry', array('op' => 'post', 'id' => $industry['id']))?>" class="btn btn-mini btn-primary"><i class="fa fa-edit"></i></a>
                    <a onclick="return confirm('此操作不可恢复，确认吗？'); return false;"
                       href="<?php  echo $this->createWebUrl('industry', array('id' => $industry['id'],'op'=>'deleteop'))?>" title="删除" class="btn btn-mini btn-danger">
                        <i class="fa fa-times"></i></a>

                </td>
            </tr>
            <?php  } } ?>
            </tbody>
        </table>
        <div style="margin:0 auto;margin-right: auto;vertical-align: middle;text-align: center;" >
            <?php  echo $pager;?>
        </div>
    </div>
</div>

<?php  } else if($op == 'post') { ?>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" onsubmit='return formcheck()'>
        <input type="hidden" name="id" value="<?php  echo $industry['id'];?>" />
        <div class="panel panel-default">
        <div class="panel-heading">
            行业设置
        </div>
        <div class="panel-body">

            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>排序</label>
                <div class="col-sm-9">
                    <input type="text" id='displayorder' name="displayorder" class="form-control" value="<?php  echo $industry['displayorder'];?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">行业名称</label>
                <div class="col-sm-9">
                    <input type="text" id='displayorder' name="title" class="form-control" value="<?php  echo $industry['title'];?>" />
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
    function formcheck() {
        if ($("#title").isEmpty()) {
            Tip.focus("title", "请填写行业名称!");
            return false;
        }
        return true;
    }
</script>
<?php  } ?>