<?php defined('IN_IA') or exit('Access Denied');?><input type="hidden" name="reply_id" value="<?php  echo $reply['id'];?>" />
<div class="panel panel-default">
    <div class="panel-heading">
        分享达人活动设置
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否启用</label>
            <div class="col-sm-9 col-xs-12">
                <select name="status" id="status" class="form-control">
                    <option value="1">启用</option>
                    <option value="0">禁用</option>
                </select>
                <?php  if(isset($reply['status'])) { ?>
                <script>$("#status").val('<?php  echo $reply['status']?>');</script>
                <?php  } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">需绑定信息</label>
            <div class="col-sm-9 col-xs-12">
                <select name="isname" id="isname" class="form-control">
                    <option value="1">不需要</option>
                    <option value="0">需要</option>
                </select>
                <?php  if(isset($reply['isname'])) { ?>
                <script>$("#isname").val('<?php  echo $reply['isname']?>');</script>
                <?php  } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动标题</label>
            <div class="col-sm-9 col-xs-12">
                <input type="text" id="title" class="form-control" placeholder="" name="title" value="<?php  echo $reply['title'];?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动时间</label>
            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_daterange('datelimit', array('starttime'=>date('Y-m-d',$reply['start_time']),'endtime'=>date('Y-m-d',$reply['end_time'])))?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享查看关键词</label>
            <div class="col-sm-9 col-xs-12">
                <input type="text" id="checkkeyword" class="form-control" placeholder="" name="checkkeyword" value="<?php  echo $reply['checkkeyword'];?>">
                <div class="help-block">粉丝分享数量查看关键词，不能与活动关键词重复，暂时锁定为：分享排名。上面添加关键词也要添加一个。</div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">图文消息图片</label>
            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_image('picture',$reply['picture']);?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动简介</label>
            <div class="col-sm-9 col-xs-12">
                <textarea style="height:60px;" id='description' name="description" class="form-control" cols="60"><?php  echo $reply['description'];?></textarea>
                <div class="help-block">用于图文显示的简介</div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动详情</label>
            <div class="col-sm-9 col-xs-12">
                <textarea style="height:200px;" id='content' name="content" class="form-control richtext" cols="60"><?php  echo $reply['content'];?></textarea>
                <span class="help-block">分享图文的详细内容（注意在内容最后加上分享示意图提示） </span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">点击次数</label>
            <div class="col-sm-9 col-xs-12">
                <input type="text" id="r" class="form-control" placeholder="" name="r" value="<?php  echo $reply['r'];?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">点赞次数</label>
            <div class="col-sm-9 col-xs-12">
                <input type="text" id="z" class="form-control" placeholder="" name="z" value="<?php  echo $reply['z'];?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">原文地址</label>
            <div class="col-sm-9 col-xs-12">
                <input type="text" id="u" class="form-control" placeholder="" name="u" value="<?php  echo $reply['u'];?>">
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        分享设置
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享标题</label>
            <div class="col-sm-9 col-xs-12">
                <input type="text" id="share_title" class="form-control" placeholder="" name="share_title" value="<?php  echo $reply['share_title'];?>">
            </div>
        </div>
        <div class="form-group" style="display:none;">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享地址</label>
            <div class="col-sm-9 col-xs-12">
                <input type="text" id="share_url" class="form-control" placeholder="" name="share_url" value="<?php  echo $reply['share_url'];?>">
                <div class="help-block">分享的链接，留空为首页地址! 推荐转成短地址。<a target="_blank" href="http://www.dwz.cn/">短网址转换</a></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享图片</label>
            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_image('share_txt',$reply['share_txt']);?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享描述</label>
            <div class="col-sm-9 col-xs-12">
                <textarea style="height:80px;" id='share_txt' name="share_desc" class="form-control richtext" cols="60"><?php  echo $reply['share_desc'];?></textarea>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    require(['jquery', 'util'], function($, u){
        $(function(){
            u.editor($('.richtext')[0]);
        });
    });
	$('#qiyong, #jinyong').click(function () {
	    setTimeout("history.go(0)",500);
	});	
</script>