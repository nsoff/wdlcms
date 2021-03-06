<?php defined('IN_IA') or exit('Access Denied');?><input type="hidden" name="reply_id" value="<?php  echo $reply['id'];?>" />

<div class="panel panel-default">

    <div class="panel-heading">

        添加拔河活动

    </div>
    <div class="panel-body">


        <div class="form-group">

            <label class="col-xs-12 col-sm-3 col-md-2 control-label">查看内容</label>

            <div class="col-sm-9 col-xs-12">
                <div class='form-control-static'>
                    <a class='btn btn-default' href="<?php  echo $this->createWebUrl('bigscreen',array('id'=>$reply['rid']))?>" target="_blank">查看大屏幕</a></td>
                </div>
            </div>

        </div>
        <div class="form-group">

            <label class="col-xs-12 col-sm-3 col-md-2 control-label">状态</label>

            <div class="col-sm-9 col-xs-12">

                <label for="radio_1" class="radio-inline"><input type="radio" name="statuss" id="radio_1" value="0" <?php  if(empty($rid)) { ?>disabled<?php  } ?> <?php  if($reply['status'] == 0 || empty($reply['status'])) { ?> checked<?php  } ?> /> 未开始</label>
                <label for="radio_2" class="radio-inline"><input type="radio" name="statuss" id="radio_2" value="1" <?php  if(empty($rid)) { ?>disabled<?php  } ?> <?php  if($reply['status'] == 1) { ?> checked<?php  } ?>/> 进行中</label>
                <label for="radio_3" class="radio-inline"><input type="radio" name="statuss" id="radio_3" value="2" <?php  if(empty($rid)) { ?>disabled<?php  } ?> <?php  if($reply['status'] == 2) { ?> checked<?php  } ?> /> 已结束</label>


            </div>

        </div>
        <div class="form-group">

            <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动标题</label>

            <div class="col-sm-9 col-xs-12">

                <input type="text" id="title" class="form-control" placeholder="" name="title" value="<?php  echo $reply['title'];?>">

            </div>

        </div>

        <div class="form-group">

            <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动图片</label>

            <div class="col-sm-9 col-xs-12">


                <?php  echo tpl_form_field_image('picture', $reply['picture']);?>
                <div class="help-block">用于单图文回复的显示</div>
            </div>

        </div>

        <div class="form-group">

            <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动简介</label>

            <div class="col-sm-9 col-xs-12">

                <textarea style="height:200px;" id='description' name="description" class="form-control" cols="60"><?php  echo $reply['description'];?></textarea>

                <span class="help-block">用于图文显示的简介 </span>

            </div>

        </div>	

        <div class="form-group">

            <label class="col-xs-12 col-sm-3 col-md-2 control-label">人数限制</label>

            <div class="col-sm-9 col-xs-12">

                <input type="text" id="joinlimit" class="form-control" placeholder="" name="joinlimit" value="<?php  echo $reply['joinlimit'];?>">

            </div>

        </div>
        <div class="form-group">

            <label class="col-xs-12 col-sm-3 col-md-2 control-label">时间限制</label>

            <div class="col-sm-9 col-xs-12">

                <input type="text" id="joinlimit" class="form-control" placeholder="" name="timelimit" value="<?php  echo $reply['timelimit'];?>"> 秒(最多99秒)

            </div>

        </div>
        <div class="form-group">

            <label class="col-xs-12 col-sm-3 col-md-2 control-label">红队名字</label>

            <div class="col-sm-9 col-xs-12">

                <input type="text" id="teama" class="form-control" placeholder="" name="teama" value="<?php  echo $reply['teama'];?>">

            </div>

        </div>
        <div class="form-group">

            <label class="col-xs-12 col-sm-3 col-md-2 control-label">红队图片</label>

            <div class="col-sm-9 col-xs-12">


                <?php  echo tpl_form_field_image('teamapic', $reply['teamapic']);?>

            </div>

        </div>

        <div class="form-group">

            <label class="col-xs-12 col-sm-3 col-md-2 control-label">蓝队名字</label>

            <div class="col-sm-9 col-xs-12">

                <input type="text" id="teamb" class="form-control" placeholder="" name="teamb" value="<?php  echo $reply['teamb'];?>">

            </div>

        </div>


        <div class="form-group">

            <label class="col-xs-12 col-sm-3 col-md-2 control-label">蓝队图片</label>

            <div class="col-sm-9 col-xs-12">


                <?php  echo tpl_form_field_image('teambpic', $reply['teambpic']);?>

            </div>

        </div>
        <div class="form-group">

            <label class="col-xs-12 col-sm-3 col-md-2 control-label">广告图片1</label>

            <div class="col-sm-9 col-xs-12">


                <?php  echo tpl_form_field_image('ad1', $reply['ad1']);?>

            </div>

        </div>
        <div class="form-group">

            <label class="col-xs-12 col-sm-3 col-md-2 control-label">广告图片2</label>

            <div class="col-sm-9 col-xs-12">


                <?php  echo tpl_form_field_image('ad2', $reply['ad2']);?>

            </div>

        </div>
        <div class="form-group">

            <label class="col-xs-12 col-sm-3 col-md-2 control-label">广告图片3</label>

            <div class="col-sm-9 col-xs-12">


                <?php  echo tpl_form_field_image('ad3', $reply['ad3']);?>

            </div>

        </div>
        <div class="form-group">

            <label class="col-xs-12 col-sm-3 col-md-2 control-label">广告图片4</label>

            <div class="col-sm-9 col-xs-12">


                <?php  echo tpl_form_field_image('ad4', $reply['ad4']);?>

            </div>

        </div>
        <div class="form-group">

            <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动详情</label>

            <div class="col-sm-9 col-xs-12">

                <textarea style="height:200px;" id='rule' name="rule" class="form-control richtext" cols="60"><?php  echo $reply['rule'];?></textarea>

                <span class="help-block">活动的相关说明和活动奖品介绍。 </span>

            </div>

        </div>	

    </div>

</div>

<script type="text/javascript">

    require(['jquery', 'util'], function ($, u) {

        $(function () {

            u.editor($('.richtext')[0]);

        });

    });

    $('#qiyong, #jinyong').click(function () {

        setTimeout("history.go(0)", 500);

    });

</script>
