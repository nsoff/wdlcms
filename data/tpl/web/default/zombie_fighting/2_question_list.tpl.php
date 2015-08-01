<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class='container' style='padding:0 5px 10px;margin:0;width:100%'>
    <ul class="nav nav-tabs">
      <li <?php  if($op == 'post' && empty($id)) { ?>class="active"<?php  } ?>>
        <a href="<?php  echo $this->createWebUrl('questions', array('op' => 'post'));?>">添加题库</a>
      </li>
      <li <?php  if($op == 'display') { ?>class="active"<?php  } ?>>
        <a href="<?php  echo $this->createWebUrl('questions',array('op'=>'display'));?>">管理题库</a>
      </li>
      <?php  if(!empty($id) && $op == 'post') { ?>
      <li class="active">
        <a href="<?php  echo $this->createWebUrl('questions',array('op'=>'post','name' => 'zombie_fighting','id'=>$id));?>">
         编辑题库
        </a>
      </li>
      <?php  } ?>
      <li <?php  if($op == 'list') { ?>class="active"<?php  } ?>>
            <a href="<?php  echo $this->createWebUrl('questions', array('op' => 'list'));?>">活动列表</a>
      </li>
      <?php  if(!empty($rid) && $op == 'rankList') { ?>
        <li class="active">
        <a href="<?php  echo $this->createWebUrl('questions', array('op' => 'rankList','rid'=>$rid));?>">排名信息</a>
        </li>
      <?php  } ?>
    <?php  if(!empty($id) &&!empty($fid) && $op == 'postRank') { ?>
    <li class="active">
        <a href="<?php  echo $this->createWebUrl('questions', array('op' => 'rankList','rid'=>$fid));?>">排名信息</a>
    </li>
    <?php  } ?>
    </ul>

    <?php  if($op =='display') { ?>
        <div class="panel panel-success">
            <div class="panel-heading"> 营销及活动 >> 一站到底 >> 管理题库</div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">筛选</div>
            <div class="panel-body">
                <form role="form" class="form-horizontal" method="get" action="./index.php">
                    <input type="hidden" name="m" value="zombie_fighting" >
                    <input type="hidden" name="do" value="questions" >
                    <input type="hidden" name="c" value="site" />
                    <input type="hidden" name="a" value="entry" />
                    <input type="hidden" value="display" name="op">
                    <div class="form-group">
                        <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">关键字</label>
                        <div class="col-sm-8">
                            <input type="text" placeholder="搜索题目" value="<?php  echo $_GPC['keyword'];?>" id="" name="keyword" class="form-control">
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
                        <th style="width:350px;">题目<i></i></th>
                        <th class="width:150px;">选项<i></i></th>
                        <th style="width:50px;">分值<i></i></th>
                        <th style="width:50px;">答案<i></i></th>
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
                            <a title="<?php  echo $v['question'];?>" href="javascript:;" >
                            <?php  echo substr($v['question'],0,569);?>
                            </a>
                        </th>
                        <th>A.<?php  echo $v['optionA'];?>
                            B.<?php  echo $v['optionB'];?>
                            <?php  if($v['optionC']) { ?>C.<?php  echo $v['optionC'];?> <?php  } else { ?> <?php  } ?>
                            <?php  if($v['optionD']) { ?>D.<?php  echo $v['optionD'];?> <?php  } else { ?> <?php  } ?>
                            <?php  if($v['optionE']) { ?>E.<?php  echo $v['optionE'];?> <?php  } else { ?> <?php  } ?>
                            <?php  if($v['optionF']) { ?>F.<?php  echo $v['optionF'];?> <?php  } else { ?> <?php  } ?>
                        </th>
                        <td>
                            <?php  echo $v['figure'];?>
                        </td>
                        <td>
                            <a title="<?php  echo $v['answer'];?>" href="javascript:;" >
                                <?php  echo $v['answer'];?>
                            </a>
                        </td>
                        <td>
                            <a href="<?php  echo $this->createWebUrl('questions', array('op' => 'post', 'id' => $v['id']))?>" title="编辑" class="btn btn-mini btn-primary"><i class="fa fa-edit"></i></a>
                            <a onclick="return confirm('此操作不可恢复，确认吗？'); return false;" href="<?php  echo $this->createWebUrl('questions', array('id' => $v['id'],'op'=>'del'))?>" title="删除" class="btn btn-mini btn-danger"><i class="fa fa-times"></i></a>
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
                <input type="hidden" value="questions" name="do">
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
        <div class="panel-heading">营销及活动 >> 一站到底 >> >> <?php  if(!empty($id) && $op == 'post') { ?>编辑<?php  } else { ?>添加<?php  } ?>题目</div>
    </div>
    <div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" onsubmit="return validate(this);">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php  if(!empty($id)&&$op == 'post') { ?>编辑<?php  } else { ?>添加<?php  } ?>题目
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                <span style='color:red'>*</span>题目</label>
                            <div class="col-sm-9">
                                <input type="text" name="question" id="question" class="form-control" value="<?php  echo $item['question'];?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                <span style='color:red'>*</span>分值</label>
                            <div class="col-sm-9">
                                <input type="text" name="figure" id="figure" class="form-control" value="<?php  echo $item['figure'];?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                <span style='color:red'>*</span>正确答案</label>
                            <div class="col-sm-9">
                                <input type="text" name="answer" id="answer" class="form-control" value="<?php  echo $item['answer'];?>" />
                                <span>例如  A </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                <span style='color:red'>*</span>选项个数</label>
                            <div class="col-sm-9">
                                <input type="text" name="option_num" id="option_num" class="form-control" value="1" readonly/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                <span style='color:red'>*</span>选项A</label>
                            <div class="col-sm-9">
                                <input type="text" name="optionA" id="optionA" class="form-control" value="<?php  echo $item['optionA'];?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                <span style='color:red'>*</span>选项B</label>
                            <div class="col-sm-9">
                                <input type="text" name="optionB" id="optionB" class="form-control" value="<?php  echo $item['optionB'];?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                <span style='color:red'>*</span>选项C</label>
                            <div class="col-sm-9">
                                <input type="text" name="optionC" id="optionC" class="form-control" value="<?php  echo $item['optionC'];?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                <span style='color:red'>*</span>选项D</label>
                            <div class="col-sm-9">
                                <input type="text" name="optionD" id="optionD" class="form-control" value="<?php  echo $item['optionD'];?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                <span style='color:red'>*</span>选项E</label>
                            <div class="col-sm-9">
                                <input type="text" name="optionE" id="optionE" class="form-control" value="<?php  echo $item['optionE'];?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                                <span style='color:red'>*</span>选项F</label>
                            <div class="col-sm-9">
                                <input type="text" name="optionF" id="optionF" class="form-control" value="<?php  echo $item['optionF'];?>" />
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
                /*if($.trim($('select[name="bid"]').val()) == ''
                 ||$.trim($('select[name="bid"]').val()) == 0) {
                 message('必须选择所属品牌.', '', 'error');
                 return false;
                 }
                 if($.trim($('select[name="sid"]').val()) == ''
                 ||$.trim($('select[name="sid"]').val()) == 0) {
                 message('必须选择所属车系.', '', 'error');
                 return false;
                 }
                 if($.trim($(':text[name="title"]').val()) == '') {
                 message('必须填写年款名称.', '', 'error');
                 return false;
                 }
                 return true;*/
            }
        </script>
        <?php  } else if($op =='list') { ?>
        <div class="panel panel-success">
            <div class="panel-heading"> 营销及活动 >> 一站到底 >> 活动管理</div>
        </div>
        <div style="padding:15px;">
            <form id="form2" class="form-horizontal" method="post">
                <table class="table table-hover">
                    <thead class="navbar-inner">
                    <tr>
                        <th style="width:50px;" class="row-first">选择</th>
                        <th style="width:200px;">活动名称</th>
                        <th class="width:100px;">活动简介</th>
                        <th style="width:50px;">题数</th>
                        <th style="width:100px;">活动状态</th>
                        <th style="width:150px;">开始时间</th>
                        <th style="width:150px;">结束时间</th>
                        <th style="width:110px;">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  if(is_array($list)) { foreach($list as $row) { ?>
                    <tr>
                        <td class="row-first"><input type="checkbox" name="select[]" value="<?php  echo $row['id'];?>" /></td>
                        <td>
                            <div class="mainContent">
                                <div class="nickname" style="text-align:left;"><?php  echo substr($row['title'],0,69);?></div>
                            </div>
                        </td>
                        <td style="text-align:left;"><?php  echo $row['description'];?></td>
                        <td style="text-align:left;"><?php  echo $row['qnum'];?></td>
                        <td style="text-align:left;font-size:12px; color:#666;">
                            <div><?php  if($row['status_fighting'] == '1') { ?>暂停<?php  } else if($row['status_fighting'] == '2') { ?>结束<?php  } else { ?> 正常<?php  } ?></div>
                        </td>
                        <td style="text-align:left;"><?php  echo date('Y-m-d', $row['start']);?></td>
                        <td style="text-align:left;"><?php  echo date('Y-m-d', $row['end']);?></td>
                        <td style="text-align: left;">
                            <a class="btn btn-mini btn-primary" href="<?php  echo $this->createWebUrl('questions', array('op' => 'rankList', 'rid' => $row['id']))?>">排名</a>
                            <a href="./index.php?c=platform&a=reply&do=post&m=zombie_fighting&rid=<?php  echo $row['rid'];?>" title="编辑" class="btn btn-mini btn-primary"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                    <?php  } } ?>
                    </tbody>
                    <?php  echo $pager;?>

                </table>
                <table class="table">
                    <tr>
                        <td style="width:40px;" class="row-first"><input type="checkbox" onclick="selectall(this, 'select');" /></td>
                        <td colspan="4">
                            <input type="submit" name="delete" value="删除选中" class="btn btn-primary" />
                            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                        </td>
                    </tr>
                </table>

                <input type="hidden" value="questions" name="do">
                <input type="hidden" value="del" name="op">
                <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
            </form>
            <script>
                $(function(){
                    $('.pagination').removeClass().children().addClass('pagination');
                })
                $('#form2').submit(function(){
                    if($(":checkbox[name='delete[]']:checked").size() > 0){
                        return confirm('删除后不可恢复，您确定删除吗？');
                    }
                    return false;
                });
            </script>
        </div>
        <?php  } else if($op =='rankList') { ?>
        <div class="panel panel-success">
            <div class="panel-heading"> 营销及活动 >> 一站到底 >> 排名信息</div>
        </div>
        <div style="padding:15px;">
            <form id="form2" class="form-horizontal" method="post">
                <table class="table table-hover">
                    <thead class="navbar-inner">
                    <tr>
                        <th style="width: 45px;" class="row-first">选择</th>
                        <th style="width: 150px;">用户名<i></i></th>
                        <th class="width:150px;">活动<i></i></th>
                        <th style="width: 200px;">最后答题时间<i></i></th>
                        <th style="width: 100px;">最后得分<i></i></th>
                        <th style="width: 150px;">称谓<i></i></th>
                        <th style="width: 110px;">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  if(is_array($list)) { foreach($list as $row) { ?>
                    <tr>
                        <td class="row-first">
                            <input type="checkbox" name="deletes[]" value="<?php  echo $row['id'];?>" />
                        </td>
                        <td>
                            <div class="nickname" style="text-align: left;"><?php  echo $row['nickname'];?></div>
                        </td>
                        <td style="text-align: left;"><?php  echo $seriesArr[$row['fid']];?></td>
                        <td style="text-align: left;"><?php  echo date('Y-m-d h:i:s', $row['lasttime']);?></td>
                        <td style="text-align: left; font-size: 12px; color: #666;">
                            <div style="margin-bottom: 10px;"><?php  echo $row['lastcredit'];?></div>
                        </td>
                        <td style="text-align: left; font-size: 12px; color: #666;">
                            <div style="margin-bottom: 10px;"><?php  echo $row['levelname'];?></div>
                        </td>
                        <td style="text-align: left;">
                            <a href="<?php  echo $this->createWebUrl('questions', array('op' => 'postRank', 'id' => $row['id'], 'fid' => $row['fid']))?>" title="编辑" class="btn btn-mini btn-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a onclick="return confirm('此操作不可恢复，确认吗？'); return false;" href="<?php  echo $this->createWebUrl('questions', array('rid' => $row['id'],'op'=>'delRank'))?>" title="删除" class="btn btn-mini btn-danger">
                                <i class="fa fa-times"></i>
                            </a>

                            <a href="<?php  echo $this->createWebUrl('worngquestion', array('op' => 'postRank', 'rid' => $row['id']))?>" title="编辑" class="btn btn-mini btn-primary">
                                查看错误答题
                            </a>

                        </td>
                    </tr>
                    <?php  } } ?>
                    </tbody>
                    <?php  echo $pager;?>
                </table>
                <table class="table">
                    <tr>
                        <td style="width:40px;" class="row-first">
                            <input type="checkbox" onclick="selectall(this, 'select');" />
                        </td>
                        <td colspan="4">
                            <input type="submit" name="delete" value="删除选中" class="btn btn-primary" />
                            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                        </td>
                    </tr>
                </table>

                <input type="hidden" value="questions" name="do">
                <input type="hidden" value="delRank" name="op">
                <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
            </form>
            <script>
                $('#form2').submit(function(){
                    if($(":checkbox[name='delete[]']:checked").size() > 0){
                        return confirm('删除后不可恢复，您确定删除吗？');
                    }
                    return false;
                });
            </script>
        </div>

    <?php  } else if($op == 'postRank') { ?>
    <div class="panel panel-success">
        <div class="panel-heading">营销及活动 >> 一站到底 >> >> 修改分值</div>
    </div>
    <div class="main">
        <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" onsubmit="return validate(this);">
            <div class="panel panel-default">
                <div class="panel-heading">
                   修改分值
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                            <span style='color:red'>*</span>昵称</label>
                        <div class="col-sm-9">
                            <input type="text" name="nickname" id="nickname" class="form-control" value="<?php  echo $rank['nickname'];?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">
                            <span style='color:red'>*</span>最后得分</label>
                        <div class="col-sm-9">
                            <input type="text" name="lastcredit" id="lastcredit" class="form-control" value="<?php  echo $rank['lastcredit'];?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                        <div class="col-sm-4">
                            <input type="hidden" name="id" value="<?php  echo $rank['id'];?>">
                            <input type="hidden" name="uid" value="<?php  echo $rank['uid'];?>">
                            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                            <input name="submit" type="submit" value="提交" class="btn btn-primary span3" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php  } ?>
</div>