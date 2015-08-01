<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<div class="panel panel-info">
    <div class="panel-heading">筛选</div>
    <div class="panel-body">
        <style>
            @media screen and (max-width: 767px) {
                form .form-group > div {
                    margin: 5px 0;
                }
            }
        </style>
        <form action="./index.php" method="get" class="form-horizontal" role="form">
            <input type="hidden" name="c" value="site"/>
            <input type="hidden" name="a" value="entry"/>
            <input type="hidden" name="m" value="hl_zzz"/>
            <input type="hidden" name="do" value="awardlist"/>
            <input type="hidden" name="id" value="<?php  echo $_GPC['id'];?>"/>

            <div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">个人信息</label>
                <div class=" col-sm-4 col-xs-12">
                    <select name="profile" class="form-control">
                        <option value="" selected="selected">请选择搜索用户资料</option>
                        <option <?php  if($_GPC['profile'] == 'realname') { ?> selected <?php  } ?> value="realname">姓名</option>
                        <option <?php  if($_GPC['profile'] == 'nickname') { ?> selected <?php  } ?> value="nickname">昵称</option>
                        <option <?php  if($_GPC['profile'] == 'mobile') { ?> selected <?php  } ?> value="mobile">手机</option>
                    </select>
                </div>
                <div class=" col-sm-4 col-xs-12">
                    <input type="text" name="profilevalue" value="<?php  echo $_GPC['profilevalue'];?>" class="form-control"/>
                </div>
                <div class="col-sm-2 col-xs-12">
                    <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">详细数据</div>
        <div class="panel-body table-responsive">
			<form action="" method="post" onsubmit="">
				<table class="table table-hover">
					<thead class="navbar-inner">
					<tr>
						<th style="width:40px;" class="row-first">选择</th>
						<th style="width:100px;" class="row-hover">姓名</th>
						<th style="width:100px;">手机</th>
						<th style="width:100px;">朋友送</th>
						<th style="width:100px;">分数</th>
						<th style="width:150px;">时间</th>
					</tr>
					</thead>
					<tbody>
					<?php  if(is_array($list)) { foreach($list as $row) { ?>
					<tr>
						<td class="row-first"><input type="checkbox" name="select[]" value="<?php  echo $row['id'];?>" /></td>
						<td class="row-hover"><?php  echo $row['nickname'];?></td>
						<td><?php  echo $row['mobile'];?></td>
						<td><?php  echo $row['friendcount'];?></td>
						<td><?php  echo $row['points'];?></td>
						<td style="font-size:12px; color:#666;">
							<?php  echo date('Y-m-d h:i:s', $row['createtime']);?>
						</td>
					</tr>
					<?php  } } ?>
					</tbody>
				</table>
				<table class="table">
					<tr>
						<td style="width:40px;" class="row-first"><input type="checkbox" onclick="var ck = this.checked;$(':checkbox').each(function(){this.checked = ck})"  /></td>
						<td>
							<input type="submit" name="delete" value="删除" class="btn btn-primary" />
							<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
						</td>
					</tr>
				</table>
			</form>
		</div>
</div>

<?php  echo $pager;?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
