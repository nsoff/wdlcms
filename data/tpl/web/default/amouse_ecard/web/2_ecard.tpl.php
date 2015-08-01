<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li <?php  if($op == 'display') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('ecard',array('op' =>'display'))?>">名片管理</a></li>
</ul>

<?php  if($op == 'display') { ?>
<style>
    .code-overview{
        height: 40px;
        background-color: #ffefaf;
        line-height: 40px;
        padding: 0 15px;
        font-size: 14px;
        margin-bottom: 20px;
    }

    #a-export{
        margin-right: 5px;
        background-color: #93DB70 !important;
        border-color: #93DB70
    }

    #a-export:hover {
        background-color: #32CD32 !important
    }
</style>
<div class="row code-overview">
    <div class="span3">名片总数：<?php  echo $total;?>个</div>
</div>
<div class="panel panel-info">
    <div class="panel-heading">筛选</div>
    <div class="panel-body">
        <form role="form" class="form-horizontal" method="get" action="./index.php">
            <input type="hidden" name="m" value="amouse_ecard" >
            <input type="hidden" name="do" value="ecard" >
            <input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" value="display" name="op">
            <div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">关键字</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="搜索名片名称" value="<?php  echo $_GPC['keyword'];?>" id="" name="keyword" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="pull-right col-xs-12 col-sm-2 col-lg-1">
                    <button class="btn btn-block"><i class="fa fa-search"></i> 搜索</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="main panel panel-default">
    <div class="panel-body table-responsive">
        <table class="table table-hover">
            <thead class="navbar-inner">
            <tr>
                <th>名字</th>
                <th>公司</th>
                <th>部门</th>
                <th>职务</th>
                <th>电话</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php  if(is_array($list)) { foreach($list as $ecard) { ?>
            <tr>
                <td><?php  echo $ecard['realname'];?></td>
                <td><?php  echo $ecard['company'];?></td>
                <td><?php  echo $ecard['department'];?></td>
                <td><?php  echo $ecard['job'];?></td>
                <td><?php  echo $ecard['mobile'];?></td>
                <td><?php  echo date('Y-m-d H:i',$ecard['createtime'])?></td>

                <td style="text-align:left;">
                    <a target="_blank" href="<?php  echo $_W['siteroot'].'app/'.substr($this->createMobileUrl('index',array('op'=>'list','wid' =>$ecard['openid'],'rid'=>$ecard['rid']),true),2);?>" class="btn btn-mini btn-primary">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a onclick="return confirm('此操作不可恢复，确认吗？'); return false;"
                       href="<?php  echo $this->createWebUrl('ecard', array('id' => $ecard['id'],'op'=>'deleteop'))?>" title="删除" class="btn btn-mini btn-danger">
                        <i class="fa fa-times"></i>
                    </a>
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
<a href="<?php  echo $this->createWebUrl('export')?>" title="导出数据" class="btn btn-mini btn-primary">
    <i class="fa fa-print"></i>
</a>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('tmpl/footer', TEMPLATE_INCLUDEPATH)) : (include template('tmpl/footer', TEMPLATE_INCLUDEPATH));?>