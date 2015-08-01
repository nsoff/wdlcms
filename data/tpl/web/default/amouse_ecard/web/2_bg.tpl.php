<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li <?php  if($op == 'display') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('bg',array('op' =>'display'))?>">背景图片管理</a></li>
    <li<?php  if(empty($bg['id']) && $op== 'post') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('bg',array('op' =>'post'))?>">添加背景图片</a></li>
    <?php  if(!empty($bg['id']) &&  $op== 'post') { ?><li  class="active"><a href="<?php  echo $this->createWebUrl('bg',array('op' =>'post','id'=>$bg['id']))?>">编辑背景图片</a></li><?php  } ?>
</ul>

<?php  if($op == 'display') { ?>
<link rel="stylesheet" href="../addons/amouse_ecard/style/css/jquery-ui-tooltip.min.css?v=20140603" />
<script type="text/javascript" src="../addons/amouse_ecard/style/js/jquery-ui-tooltip.min.js?v=20140601" ></script>
<div class="main panel panel-default">
    <div class="panel-body table-responsive">
        <table class="table table-hover">
            <thead class="navbar-inner">
            <tr>
                <th style="width:30px;">ID</th>
                <th>显示顺序</th>
                <th>背景图片</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php  if(is_array($list)) { foreach($list as $bg) { ?>
            <tr>
                <td><?php  echo $bg['id'];?></td>
                <td><?php  echo $bg['displayorder'];?></td>
                <td  class="qrcode">
                    <img src="<?php  echo $_W['attachurl'];?><?php  echo $bg['img'];?>" height="45px" width="45px" />
                </td>
                <td style="text-align:left;">
                    <a href="<?php  echo $this->createWebUrl('bg', array('op' => 'post', 'id' => $bg['id']))?>" class="btn btn-mini btn-primary"><i class="fa fa-edit"></i></a>
                    <a onclick="return confirm('此操作不可恢复，确认吗？'); return false;"
                       href="<?php  echo $this->createWebUrl('bg', array('id' => $bg['id'],'op'=>'deleteop'))?>" title="删除" class="btn btn-mini btn-danger">
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
<script>
    $("td.qrcode").tooltip({
        items:'img',
        content: function() {
            return "<img width='180px' height='320px' src='"  + $(this).attr("src") + "'></img>";
        },
        position: {
            my : "right bottom-300",
            collision: "fit"
        }
    });
</script>
<?php  } else if($op == 'post') { ?>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" onsubmit='return formcheck()'>
        <input type="hidden" name="id" value="<?php  echo $bg['id'];?>" />
        <div class="panel panel-default">
        <div class="panel-heading">
            背景图片设置
        </div>
        <div class="panel-body">

            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>排序</label>
                <div class="col-sm-9">
                    <input type="text" id='displayorder' name="displayorder" class="form-control" value="<?php  echo $bg['displayorder'];?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">背景图片图片</label>
                <div class="col-sm-9">
                    <?php  echo tpl_form_field_image('img', $bg['img'])?>
                    <span>建议尺寸：180像素 * 320像素</span>
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