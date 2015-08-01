<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php  load()->func('tpl')?>
<style>
    .field label{float:left;margin:0 !important; width:140px;}
</style>
<ul class="nav nav-tabs">
    <li><a href="<?php  echo $this->createWebUrl('display')?>">预约活动列表</a></li>
    <li><a href="<?php  echo $this->createWebUrl('post')?>">新建预约活动</a></li>
    <li class="active"><a href="<?php  echo $this->createWebUrl('manage', array('id' => $reid))?>">预约活动详情</a></li>
</ul>
<div class="main">
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="we7_research" />
                <input type="hidden" name="do" value="manage" />
                <input type="hidden" name="id" value="<?php  echo $reid;?>" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">预约内容情况</label>
                    <div class="col-xs-12 col-sm-8 col-lg-9">
                        <div style="font-weight:normal;">
                            <label class="checkbox-inline" id="field-all"><input type="checkbox" onchange="selectall(this, 'select');"> 全选</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label"></label>
                    <div class="col-xs-12 col-sm-8 col-lg-9">
                        <?php  if(is_array($ds)) { foreach($ds as $field => $comment) { ?>
                        <label class="checkbox-inline"><input type="checkbox" name="select[]" value="<?php  echo $field;?>" <?php  if(in_array($field, $select)) { ?> checked="checked"<?php  } ?> /> <?php  echo $comment;?></label>
                        <?php  } } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">预约提交时间</label>
                    <div class="col-xs-12 col-sm-8 col-lg-4">
                        <?php  echo tpl_form_field_daterange('daterange',array('starttime'=>date('Y-m-d H:i', $starttime),'endtime'=>date('Y-m-d H:i', $endtime)))?>
                    </div>
                    <div class=" col-xs-12 col-sm-2 col-lg-2">
                        <div class='btn-group'>
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
                        <input type="submit" name="export" value="导出全部数据" class="btn btn-primary">
                        </div>
                    </div>
                    
                </div>
                <div class="form-group">
                </div>
            </form>
        </div>
    </div>
    <div class="panel panel-info">
        <div class="panel-heading">详细数据</div>
        <div class="panel-body">
            <form action="" method="post" onsubmit="">
                <table class="table table-hover">
                    <thead class="navbar-inner">
                        <tr>
                            <th width="15%">用户</th>
                            <?php  if(is_array($select)) { foreach($select as $fid) { ?>
                            <th max-width="50%"><?php  echo $ds[$fid];?><i></i></th>
                            <?php  } } ?>
                            <th max-width="20%">提交时间<i></i></th>
                            <th max-width="15%">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  if(is_array($list)) { foreach($list as $row) { ?>
                        <tr>
                            <td class="row-hover"><a href="javascript:;" title="<?php  echo $row['from_user'];?>"><?php  echo $row['openid'];?></a></td>
                            <?php  if(is_array($select)) { foreach($select as $fid) { ?>
                            <td><?php  echo $row['fields'][$fid];?><i></i></td>
                            <?php  } } ?>
                            <td style="font-size:12px; color:#666;">
                                <?php  echo date('Y-m-d H:i:s', $row['createtime']);?>
                            </td>
                            <td>
								<a href="<?php  echo $this->createWebUrl('detail', array('id' => $row['rerid']))?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="查看详情"><i class="fa fa-eye"></i></a>
								<a href="<?php  echo $this->createWebUrl('researchdelete', array('id' => $row['rerid']))?>"  class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="删除"><i class="fa fa-times"></i></a>
							</td>
                        </tr>
                        <?php  } } ?>
                    </tbody>
                </table>
            </form>
            <?php  echo $pager;?>
        </div>
    </div>
</div>
<script language='javascript'>
	function selectall(obj, name){
		$('input[name="'+name+'[]"]:checkbox').each(function() {
			$(this).get(0).checked =  $(obj).get(0).checked;
		});
	}
	require(['bootstrap'],function($){
		$('.btn').hover(function(){
			$(this).tooltip('show');
		},function(){
			$(this).tooltip('hide');
		});
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
