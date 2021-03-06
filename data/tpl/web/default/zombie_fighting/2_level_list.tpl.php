<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class='container' style='padding:0 5px 10px;margin:0;width:100%'>
    <ul class="nav nav-tabs">
      <li <?php  if($op == 'post' && empty($id)) { ?>class="active"<?php  } ?>>
        <a href="<?php  echo $this->createWebUrl('level', array('op' => 'post'));?>">添加称谓</a>
      </li>
      <li <?php  if($op == 'display') { ?>class="active"<?php  } ?>>
        <a href="<?php  echo $this->createWebUrl('level',array('op'=>'display'));?>">管理称谓</a>
      </li>
      <?php  if(!empty($id) && $op == 'post') { ?>
      <li class="active">
        <a href="<?php  echo $this->createWebUrl('level',array('op'=>'post','name' => 'zombie_fighting','id'=>$id));?>">
         编辑称谓
        </a>
      </li>
      <?php  } ?>
    </ul>

    <?php  if($op =='display') { ?>
        <div class="panel panel-success">
            <div class="panel-heading"> 营销及活动 >> 一站到底 >> 管理称谓</div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">筛选</div>
            <div class="panel-body">
                <form role="form" class="form-horizontal" method="get" action="./index.php">
                    <input type="hidden" name="m" value="zombie_fighting" >
                    <input type="hidden" name="do" value="level" >
                    <input type="hidden" name="c" value="site" />
                    <input type="hidden" name="a" value="entry" />
                    <input type="hidden" value="display" name="op">
                    <div class="form-group">
                        <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">关键字</label>
                        <div class="col-sm-8">
                            <input type="text" placeholder="搜索称谓" value="<?php  echo $_GPC['keyword'];?>" id="" name="keyword" class="form-control">
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
        <div style="padding:15px;">
            <form id="form2" class="form-horizontal" method="post">
                <table class="table table-hover">
                    <thead class="navbar-inner">
                    <tr>
                        <th style="width:60px;" class="row-first">选择</th>
                        <th style="width:350px;">称谓<i></i></th>
                        <th style="width:350px;">称谓积分<i></i></th>
                        <th style="width:110px;">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  if(is_array($list)) { foreach($list as $v) { ?>
                    <tr>
                        <td>
                            <input type="checkbox" value="<?php  echo $v['id'];?>" name="delete[]">
                        </td>
                        <th>
                            <?php  echo substr($v['levelname'],0,569);?>
                        </th>
                        <th>
                           <?php  echo $v['min'];?> - <?php  echo $v['max'];?>
                        </th>
                        <td>
                            <a href="<?php  echo $this->createWebUrl('level', array('op' => 'post', 'id' => $v['id']))?>" title="编辑" class="btn btn-mini btn-primary"><i class="fa fa-edit"></i></a>
                            <a onclick="return confirm('此操作不可恢复，确认吗？'); return false;" href="<?php  echo $this->createWebUrl('level', array('id' => $v['id'],'op'=>'del'))?>" title="删除" class="btn btn-mini btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <?php  } } ?>
                    </tbody>
                    <tr>
                        <td>
                   <input type="checkbox" onclick="var ck = this.checked;$(':checkbox').each(function(){this.checked = ck});">
                        </td>
                        <td colspan="5">
                            <input class="btn btn-primary" type="submit" value="删除" name="submit" >
                        </td>
                    </tr>
                </table>
                <div style="margin:0 auto;margin-right: auto;vertical-align: middle;text-align: center;" >
                <?php  echo $pager;?>
                </div>
                <input type="hidden" value="level" name="do">
                <input type="hidden" value="del" name="op">
                <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
            </form>
        </div>

    <script type="text/javascript">
        require(['bootstrap'],function($){
            $('.btn').hover(function(){
                $(this).tooltip('show');
            },function(){
                $(this).tooltip('hide');
            });
        });

        $('#form2').submit(function(){
            if($(":checkbox[name='delete[]']:checked").size() > 0){
                return confirm('删除后不可恢复，您确定删除吗？');
            }
            return false;
        });
    </script>
    <?php  } else if($op == 'post') { ?>
    <div class="panel panel-success">
        <div class="panel-heading">营销及活动 >> 一站到底 >> >> <?php  if(!empty($id) && $op == 'post') { ?>编辑<?php  } else { ?>添加<?php  } ?>称谓</div>
    </div>

    <div class="tb-list" style="display: block;padding: 10px 15px 0px 15px;">
        <div class="alert  alert-info" style="margin-bottom: 0px;">
            <p>
            <span class="bold">
                1.等级名称请不要重复。
                <br/>
                2.积分范围请填写正确。
            </span>
            </p>
        </div>
    </div>

    <div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" onsubmit="return validate(this);">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php  if(!empty($id)&&$op == 'post') { ?>编辑<?php  } else { ?>添加<?php  } ?>称谓
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                <span style='color:red'>*</span>称谓名称</label>
                            <div class="col-sm-9">
                             <input type="text" name="levelname" id="levelname" class="form-control" value="<?php  echo $item['levelname'];?>" />
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                            <span style='color:red'>*</span>称谓积分设置</label>
                            <div class="col-sm-9 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">大于</span>
                                    <input type="text" name="min" class="form-control" value="<?php  echo $item['min'];?>">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon">小于</span>
                                    <input type="text" name="max" class="form-control" value="<?php  echo $item['max'];?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                            <div class="col-sm-4">
                                <input type="hidden" name="id" value="<?php  echo $item['id'];?>">
                                <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                                <input name="submit" type="submit" value="提交" class="btn btn-primary span3" />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <script text="text/javascript">
            function validate() {
               if($.trim($(':text[name="levelname"]').val()) == '') {
                 message('必须填写称谓名称.', '', 'error');
                 return false;
                }
                return true;
            }
        </script>

<?php  } ?>
</div>