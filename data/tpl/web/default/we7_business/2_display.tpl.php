<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php  load()->func('tpl');?>
<div class="main">
    <ul class="nav nav-tabs">
        <li<?php  if($_GPC['do'] == 'display') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('display');?>">商户管理</a></li>
        <li<?php  if($_GPC['do'] == 'post') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('post');?>">添加商户</a></li>
    </ul>
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="we7_business" />
                <input type="hidden" name="do" value="display" />
                <input type="hidden" name="status" value="<?php  echo $_GPC['status'];?>" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">关键词</label>
                    <div class="col-xs-12 col-sm-8 col-lg-9">
                        <input class="form-control" name="keyword"  type="text" value="<?php  echo $_GPC['keyword'];?>">
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">行业</label>
                    <?php echo tpl_form_field_industry('industry',is_array($_GPC['industry'])?$_GPC['industry']['parent']:'',is_array($_GPC['industry'])?$_GPC['industry']['child']:'')?>
					<div class="col-sm-2">
                         <button class="btn btn-default pull-right"><i class="fa fa-search"></i> 搜索</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body table-responsive">
            <table class="table table-hover">
                <thead class="navbar-inner">
                    <tr>
                        <th >名称</th>
                        <th>行业</th>
                        <th >电话</th>
                        <th >地址</th>
                        <th >操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  if(is_array($list)) { foreach($list as $item) { ?>
                    <tr>
                        <td><?php  echo $item['title'];?></td>
                        <td><?php  echo $item['industry1'];?>&nbsp;<?php  echo $item['industry2'];?></td>
                        <td><?php  echo $item['phone'];?></td>
                        <td><?php  echo $item['address'];?></td>
                        <td>
                        		<a  href="<?php  echo $this->createWebUrl('post', array('id' => $item['id']))?>" data-toggle="tooltip" data-placement="bottom" title="编辑" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>&nbsp;
                                <a onclick="return confirm('此操作不可恢复，确认吗？');return false;" href="<?php  echo $this->createWebUrl('delete', array('id' => $item['id']))?>" data-toggle="tooltip" data-placement="bottom" title="删除" class="btn btn-default btn-sm"><i class="fa fa-times"></i></a>
						</td>
                    </tr>
                    <?php  } } ?>
                </tbody>
            </table>
            <?php  echo $pager;?>
        </div>
    </div>
</div>
<script>
	require(['bootstrap'],function($){
		$('.btn').hover(function(){
			$(this).tooltip('show');
		},function(){
			$(this).tooltip('hide');
		});
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>