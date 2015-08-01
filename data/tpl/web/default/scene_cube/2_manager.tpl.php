<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
    <link rel="stylesheet" type="text/css" href="../addons/scene_cube/style/css/style.css?v=2014-05-21" />
    <link rel="stylesheet" type="text/css" href="../addons/scene_cube/style/css/btn.css?v=2014-05-21" />
    <link rel="stylesheet" type="text/css" href="../addons/scene_cube/style/css/themes.css?v=2014-05-21" />
    <link rel="stylesheet" type="text/css" href="../addons/scene_cube/style/css/inside.css?v=2014-05-21" />
    <link rel="stylesheet" type="text/css" href="../addons/scene_cube/style/css/powerFloat.css" />
    <style type="text/css">
        .table-bordered>thead>tr>th,.table-bordered>thead>tr>td{border-bottom-width:1px}
        .norightborder{width:310px}
        .box-content .span12.control-group{height:30px;margin-bottom:10px;padding:0}
    </style>
    <script type="text/javascript" src="../addons/scene_cube/style/src/jQuery.js?v=2014-05-21"></script>
    <script type="text/javascript" src="../addons/scene_cube/style/src/bootstrap_min.js?v=2014-05-21"></script>
    <script type="text/javascript" src="../addons/scene_cube/style/src/inside.js?v=2014-05-21"></script>
    <script type="text/javascript" src="../addons/scene_cube/style/src/jquery-powerFloat.js"></script>

<div id="main">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">

                <div class="box">
                    <div class="box-title">
                        <div class="pull-left">
                            <h3><i class="icon-table"></i>微场景</h3>
                        </div>
                        <div class="pull-right">
                            <form action="" method="get" class="form-horizontal">
                                <input type="text" id="keyword-input" name="keyword" class="input-small-z"
                                       placeholder="请输入关键词" data-rule-required="true" style="vertical-align:middle"/>
                                <button class="btn">查询</button>
                            </form>
                        </div>
                    </div>

                    <div class="box-content">

                        <div class="row-fluid">
                            <div class="span12 control-group">
                                <div class="pull-left">
                                    <a class="btn" href="<?php  echo $this->createWebUrl('manager', array('foo' => 'create'));?>"><i class="icon-plus"></i>新增</a>
                                    <a class="btn" href="javascript:location.reload()"><i class="icon-refresh"></i>刷新</a>
                                </div>
                                <div class="pull-left datatabletool margin-left5">
                                    <a class="btn delAll" title="删除"><i class="icon-trash"></i>删除</a>
                                </div>
                                <?php  if($_W['isfounder']) { ?>
                                <div class="pull-left  margin-left5">
                                    <a class="btn" title="App管理" href="<?php  echo $this->createWebUrl('app', array('foo' => 'list'));?>"><i class="icon-add"></i>App管理</a>
                                </div>
                                <?php  } ?>
                            </div>

                        </div>

                        <div class="row-fluid dataTables_wrapper">
                            <form action="/plus/formajax.php" method="post" class="form-horizontal">
                                <table id="listTable" class="table table-bordered table-hover dataTable">
                                    <thead>
                                    <tr>
                                        <!--<th class='with-checkbox'>
                                            <input type="checkbox" class="check_all" /></th>-->
                                        <th>微场景名称</th>
                                        <?php  if($_W['isfounder']) { ?><th>类型</th><?php  } ?>
                                        <th>浏览量pv</th>
                                        <th>被分享数</th>
                                        <!--<th>被收藏数</th>-->
                                        <th>有效时间</th>
                                        <th>状态</th>
                                        <th class="norightborder">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php  if(is_array($list)) { foreach($list as $row) { ?>
                                    <tr>
                                        <!--<td class="with-checkbox">
                                            <input type="checkbox" name="check" value="1"></td>-->
                                        <td><?php  echo $row['title'];?></td>
                                        <?php  if($_W['isfounder']) { ?><td><?php  echo $row['iden'];?></td><?php  } ?>
                                        <td><?php  echo $row['hits'];?></td>
                                        <td><?php  echo $row['shares'];?></td>
                                        <td><?php  echo date('Y-m-d H:i:s',$row['start_time'])?><br><?php  echo date('Y-m-d H:i:s',$row['end_time'])?></td>
                                        <td><?php  if($row['start_time']>$_W['timestamp']) { ?>
                                            <?php  $norun=1;?>
                                            <span class="label label-red">未开始</span>
                                            <?php  } else if($row['end_time']<$_W['timestamp']) { ?>
                                            <?php  $norun=true;?>
                                            <span class="label label-red">已结束</span>
                                            <?php  } else { ?>
                                            <?php  $norun='';?>
                                            <span class="label label-satgreen">进行中</span>
                                            <?php  } ?>
                                        </td>
                                        <td class="norightborder">
                                            <a class="btn" target="_blank"  href="<?php  echo $_W['siteroot'].'app/'.$this->createMobileUrl('show',array('id'=>$row['id']))?>" rel="tooltip" title="预览微场景"><i class="icon-eye-open"></i></a>
                                            <a class="btn" href="<?php  echo $this->createWeburl('listpage',array('s_id'=>$row['s_id'],'iden'=>$row['iden'],'list_id'=>$row['id']))?>" rel="tooltip" title="微场景画面管理"><i class="icon-cog"></i></a>
                                            <a class="btn" href="<?php  echo $this->createWeburl('post',array('s_id'=>$row['s_id'],'id'=>$row['id']))?>" rel="tooltip" title="编辑"><i class="icon-edit"></i></a>
                                            <!--a class="btn" rel="tooltip" href="<?php  echo $this->createWeburl('statisticsPage',array('id'=>$row['id']))?>" title="统计图表"><i class="icon-bar-chart"></i></a-->
                                            <!--a class="btn" title="暂停" href="javascript:drop_confirm('您确定要暂停吗？', '<?php  echo $this->createWeburl('stop',array('id'=>$row['id']))?>');"><i class="icon-stop"></i></a-->
                                            <?php  if($_W['isfounder']) { ?>
                                            <a class="btn" rel="tooltip" title="删除" href="javascript:drop_confirm('您确定要删除吗?', '<?php  echo $this->createWeburl('del',array('id'=>$row['id']))?>');"><i class="icon-remove"></i></a>
                                            <?php  } ?>
                                            <?php  if(empty($norun)) { ?>
                                            <a class="btn qrcode" href="javascript:;"  rel="http://qr.liantu.com/api.php?text=<?php  echo urlencode($_W['siteroot'].'app/'.$this->createMobileUrl('show',array('id'=>$row['id'])))?>&.jpg" title="二维码"  ><i class="icon-th"></i></a>
                                            <?php  } ?>
                                            <?php  if($row['isyuyue']==1) { ?>
                                            <a class="btn" href="<?php  echo $this->createWebUrl('book',array('id'=>$row['id'],'s_id'=>$row['s_id']))?>" rel="tooltip" target="_blank" title="查看预约"><i class="icon-envelope-alt"></i></a>
                                            <?php  } ?>
                                            <?php  if($row['iscomment']==1) { ?>
                                            <a class="btn" href="<?php  echo $this->createWebUrl('comment',array('id'=>$row['id'],'s_id'=>$row['s_id']))?>" rel="tooltip" target="_blank" title="查看留言"><i class="icon-comment-alt"></i></a>
                                            <?php  } ?>

                                        </td>
                                    </tr>
                                    <?php  } } ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <?php  echo $pager;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $(".delAll").click(function(){
            var check = $("#listTable input:checked");
            var id = new Array();
            check.each(function(i){
                id[i] = $(this).val();
            });
            $.post('/plus/formajax.php', {tid:id, aid:$('#aid').val()},function(data){
                G.ui.tips.info(data.error);
            },'json');
        });
    });
    $(".qrcode").powerFloat({
        targetMode: "ajax"
    });

    function drop_confirm(msg, url){
        if(confirm(msg)){
            $.post(url, {},function(data){
                G.ui.tips.info(data.error);
                window.location = data.url;
            },'json');
        }
    }
</script>
<script>
    window.document.onkeydown = function(e) {
        if ('BODY' == event.target.tagName.toUpperCase()) {
            var e=e || event;
            var currKey=e.keyCode || e.which || e.charCode;
            if (8 == currKey) {
                return false;
            }
        }
    };
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>