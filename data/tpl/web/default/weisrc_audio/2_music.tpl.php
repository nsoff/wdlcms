<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li <?php  if($operation == 'post') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('music', array('op' => 'post'))?>">添加音乐</a></li>
    <li <?php  if($operation == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('music', array('op' => 'display'))?>">管理音乐</a></li>
</ul>
<?php  if($operation == 'display') { ?>
<style>
    .form th {
        text-align: left;
        width: 10px;
        margin-right: 20px;
        overflow: hidden;
        float: none;
    }
</style>
<style>
    .form-control-excel {
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    }
</style>
<div class="main">
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="weisrc_audio" />
                <input type="hidden" name="do" value="music" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width: 100px;">关键字</label>
                    <div class="col-sm-2 col-lg-2">
                        <input class="form-control" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>"  placeholder="请输入歌手或歌曲名称">
                    </div>
                    <div class="col-sm-2 col-lg-2">
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <form action="" method="post" class="form-horizontal form" onsubmit="return formcheck(this)" enctype="multipart/form-data">
        <input type="hidden" name="leadExcel" value="true">
        <input type="hidden" name="act" value="module" />
        <input type="hidden" name="do" value="UploadExcel" />
        <input type="hidden" name="name" value="weisrc_audio" />
        <input type="hidden" name="ac" value="music" />
        歌曲导入:
        <input class="form-control-excel" name="viewfile" id="viewfile" type="text" value="" style="margin-left: 10px;" readonly>
        <a class="btn btn-primary"><label for="unload" style="margin: 0px;padding: 0px;">上传...</label></a>
        <input type="file" class="pull-left btn-primary span3" name="inputExcel" id="unload" style="display: none;"
               onchange="document.getElementById('viewfile').value=this.value;this.style.display='none';">
        <!--<input type="file" class=" pull-left btn-primary span3" name="inputExcel">-->
        <input type="submit" class="btn btn-primary span2" name="btnExcel" value="导入数据">
        <a class="btn btn-primary" href="../addons/weisrc_audio/example/example_music.xls">下载导入模板</a>
    </form>
    <div style="padding-top: 15px;"></div>
    <div class="panel panel-default">
        <div class="table-responsive panel-body">
        <form action="" method="post" class="form-horizontal form">
        <table class="table table-hover">
            <thead class="navbar-inner">
            <tr>
                <th style="width:30px;">顺序</th>
                <th style="width:30px;">编号</th>
                <th style="width:120px;">歌曲名称</th>
                <th style="width:80px;">歌手</th>
                <th style="width:50px;">收藏</th>
                <th style="width:100px;text-align: right;">预览/编辑/删除</th>
            </tr>
            </thead>
            <tbody id="level-list">
            <?php  if(is_array($list)) { foreach($list as $item) { ?>
            <tr>
                <td><input type="text" class="form-control" name="displayorder[<?php  echo $item['mid'];?>]" value="<?php  echo $item['displayorder'];?>" style="width: 60px;"></td>
                <td><?php  echo $item['mid'];?></td>
                <td><?php  echo $item['title'];?></td>
                <td><?php  echo $item['singer'];?></td>
                <td><?php  echo $item['collect'];?></td>
                <td style="text-align: right;">
                    <a class="btn btn-default btn-sm" href="../app/<?php  echo $this->createMobileurl('index', array('op' => 'view', 'song_id' => $item['mid']), true)?>" title="预览"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('music', array('op' => 'post', 'id' => $item['mid']))?>" title="编辑"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-default btn-sm" onclick="return confirm('确认删除吗？');return false;" href="<?php  echo $this->createWebUrl('music', array('op' => 'delete', 'id' => $item['mid']))?>" title="删除"><i class="fa fa-times"></i></a>
                </td>
            </tr>
            <?php  } } ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="6">
                    <input name="submit" type="submit" class="btn btn-primary" value="批量修改排序">
                    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                </td>
            </tr>
            </tfoot>
        </table>
        </form>
        </div>
    </div>
    <?php  echo $pager;?>
</div>
<script>
    function drop_confirm(msg, url){
        if(confirm(msg)){
            window.location = url;
        }
    }
</script>
<?php  } else if($operation == 'post') { ?>
<style>
    .item_box img{
        width: 100%;
        height: 100%;
    }
</style>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading">
                音乐编辑
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">歌曲名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" value="<?php  echo $reply['title'];?>" id="title" class="form-control" /> <?php  if(!empty($reply)) { ?><a class="btn" href="<?php  echo $this->createMobileurl('index', array('op' => 'view', 'song_id' => $reply['mid']))?>" title="预览"><i class="icon-eye-open"></i></a><?php  } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">封面</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('cover', $reply['cover'])?>
                        <div class="help-block">大图片建议尺寸：300像素 * 294像素</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">音频链接</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_audio('url', $reply['url'])?>
                        <span class="help-block">选择上传的音频文件或直接输入URL地址，常用格式：mp3,wav,ogg</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">歌手</label>
                    <div class="col-sm-9">
                        <input type="text" name="singer" id="singer" value="<?php  echo $reply['singer'];?>" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">简介</label>
                    <div class="col-sm-9">
                        <textarea name="intro" id="intro" class="form-control" cols="60" rows="4"><?php  echo $reply['intro'];?></textarea>
                        <div class="help-block">歌曲简介.</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否显示</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="status" value="1" <?php  if($reply['status']==1 || empty($reply)) { ?>checked<?php  } ?>>显示
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" value="0" <?php  if(isset($reply['status']) && empty($reply['status'])) { ?>checked<?php  } ?>>隐藏</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
                    <div class="col-sm-9">
                        <input type="text" name="displayorder" value="<?php  if(empty($reply)) { ?>0<?php  } else { ?><?php  echo $reply['displayorder'];?><?php  } ?>" id="displayorder" class="form-control" />
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
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
