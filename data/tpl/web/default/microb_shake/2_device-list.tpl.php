<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li><a href="<?php  echo $this->createWebUrl('entry')?>">活动参与方式</a> </li>
    <li><a href="<?php  echo $this->createWebUrl('activity')?>">活动管理</a> </li>
    <li><a href="<?php  echo $this->createWebUrl('gifts')?>">礼品设置</a> </li>
    <li class="active"><a href="<?php  echo $this->createWebUrl('devices')?>">设备管理</a> </li>
    <li><a href="<?php  echo $this->createWebUrl('api')?>">接口参数</a> </li>
</ul>
<script>
    function refresh(id) {
        var pars = {};
        pars.foo = 'refresh';
        pars.device = id;
        require(['jquery', 'util'], function($, u) {
            $.post('<?php  echo $this->createWebUrl("devices")?>', pars).success(function(dat){
                if(dat == 'success'){
                    location.reload();
                } else {
                    u.message(dat);
                }
            });
        })
    }            
</script>
        <script>
            function refresh(id){
            pars = {};
                pars.foo = 'refresh';
                pars.device = id;
                require(['jquery','until'],function($,u){
                    $.post('<?php  echo $this->createWebUrl("device")?>',pars).success(function(dat){
                        if(dat == 'sucess'){
                            location.reload();    
                        } else {
                            u.message(dat);
                        }
                    });
                });
            }
        </script>
<div class="alert alert-info">
    <h4>设备激活指南</h4>
    <p>
        1. 在手机上安装iBeancon管理工具, 打开蓝牙, 并进入设置界面 <br>
        2. 将单个设备靠近手机, 在管理工具中确认设备. (最好贴上标签, 防止搞混) <br>
        3. 按照列表中生成的值(UUID, Major, Minor)设置设备的参数 <br>
        4. 打开微信摇一摇, 激活当前设备 <br>
    </p>
    <p>
        <strong>
            设备提供方提供有设置密码, 请牢记并输入密码才能修改设备参数
        </strong>
    </p>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        设备信息列表
    </div>
    <div class="table-responsive panel-body" style="overflow:visible;">
        <table class="table table-hover" style="width:auto;">
            <tr>
                <th>设备名称</th>
                <th style="width:200px">当前活动</th>
                <th style="width:100px">设备ID</th>
                <th style="width:320px;">UUID</th>
                <th style="width:100px">Major</th>
                <th style="width:100px">Minor</th>
                <th style="width:100px">设备状态</th>
                <th style="width:280px;">操作</th>
            </tr>
            <?php  if(is_array($ds)) { foreach($ds as $row) { ?>
            <tr>
                <td>
                    <p class="form-control-static">
                        <?php  echo $row['title'];?>
                    </p>
                </td>
                <td>
                    <p class="form-control-static">
                        <?php  if(empty($row['activity'])) { ?>
                        <span class="label label-warning">未绑定活动</span>
                        <?php  } else { ?>
                        <a href="<?php  echo $this->createWebUrl('activity', array('foo'=>'modify', 'actid'=>$row['activity']['actid']))?>"><?php  echo $row['activity']['title'];?></a>
                        <?php  } ?>
                    </p>
                </td>
                <td>
                    <p class="form-control-static">
                        <?php  echo $row['device_id'];?>
                    </p>
                </td>
                <td>
                    <p class="form-control-static">
                        <?php  echo $row['uuid'];?>
                    </p>
                </td>
                <td>
                    <p class="form-control-static">
                        <?php  echo $row['major'];?>
                    </p>
                </td>
                <td>
                    <p class="form-control-static">
                        <?php  echo $row['minor'];?>
                    </p>
                </td>
                <td>
                    <?php  if($row['status'] == 0) { ?>
                    <span class="label label-danger">未激活</span>
                    <?php  } ?>
                    <?php  if($row['status'] == 1) { ?>
                    <span class="label label-info">激活不活跃</span>
                    <?php  } ?>
                    <?php  if($row['status'] == 2) { ?>
                    <span class="label label-success">活跃</span>
                    <?php  } ?>
                </td>
                <td class="text-left" style="overflow:visible;">
                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-default" href="javascript:;" onclick="refresh('<?php  echo $row['id'];?>');">刷新状态</a>
                        <a class="btn btn-default" href="<?php  echo $this->createWebUrl('devices', array('foo'=>'modify', 'id'=>$row['id']))?>"><i class="fa fa-edit"></i> 编辑</a>
                        <a class="btn btn-default" href="<?php  echo $this->createWebUrl('devices', array('foo'=>'delete', 'id'=>$row['id']))?>" onclick="return confirm('删除设备将造成和腾讯平台设备不同步, 确认要删除吗?')"><i class="fa fa-remove"></i> 删除</a>
                    </div>
                </td>
            </tr>
            <?php  } } ?>
        </table>
    </div>
    <div class="panel-body text-le">
        <?php  echo $pager;?>
    </div>
    <div class="panel-footer">
        <div class="btn-group btn-group-sm">
            <a class="btn btn-primary" href="<?php  echo $this->createWebUrl('devices', array('foo'=>'create'))?>">创建设备</a>
            <a class="btn btn-success" href="<?php  echo $this->createWebUrl('devices', array('foo'=>'download'))?>">同步设备(推荐使用)</a>
            <!--<a class="btn btn-default" href="<?php  echo $this->createWebUrl('devices', array('foo'=>'create'))?>">刷新所有设备状态</a> -->
        </div>
    </div>
</div>