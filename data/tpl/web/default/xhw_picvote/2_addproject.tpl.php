<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <ul class="nav nav-tabs">
        <li><a href="<?php  echo $this->createWebUrl('project');?>">项目管理</a></li>
        <li class="active"><a href="<?php  echo $this->createWebUrl('addproject');?>">添加项目</a></li>
    </ul>
<style>
.table td span{display:inline-block;margin-top:4px;}
.table td input{margin-bottom:0;}
</style>
<div class="clearfix">
<form class="form-horizontal form" action="" method="post" enctype="multipart/form-data">
    <div class="panel panel-default">
        <div class="panel-heading">基本信息</div>
        <div class="panel-body">
                <input type="hidden" name="id" value="<?php  echo $_GPC['id'];?>">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">活动标题</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" placeholder="" name="title" value="<?php  echo $subject['title'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">活动图片</label>
                    <div class="col-sm-8 col-xs-12">
                       <?php  echo tpl_form_field_image('photo',$subject['photo']);?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                        <div class="help-block">活动封面图片 建议700*300</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">活动描述</label>
                    <div class="col-sm-8 col-xs-12">
                        <textarea id="smalltext" name="smalltext" class="form-control" rows="5" cols="60"><?php  echo $subject['smalltext'];?></textarea>
                    </div>
                </div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>活动规则</label>
					<div class="col-sm-9 col-xs-12">
						<textarea style="height:200px; width:100%;" id='rule' class="form-control span7 richtext" name="rule" cols="70"><?php  echo $subject['rule'];?></textarea>
					</div>
				</div>
				<div class="form-group system-icon">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">背景颜色</label>
					<div class="col-sm-9 col-xs-12">
						<?php  echo tpl_form_field_color('bgcolor', $subject['bgcolor']);?>
						<span class="help-block">图标颜色，上传图标时此设置项无效</span>
					</div>
				</div>
        <!--<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动时间</label>
            <div class="col-sm-9 col-xs-12">
    <?php  echo tpl_form_field_daterange('datelimit', array('starttime'=>$subject['starttime'],'endtime'=>$subject['endtime']),true)?>
            </div>
        </div>-->
        <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">活动图片</label>
                    <div class="col-sm-8 col-xs-12">
                       <?php  echo tpl_form_field_image('logo',$subject['logo']);?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                   <div class="help-block">LOGO图片，建议222*45，透明白字（参考xhw_picvote文件夹下的logo.png）</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">分享时的标题</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" placeholder="" name="share_title" value="<?php  echo $subject['share_title'];?>">
                         <div class="help-block">活动首页分享时的标题</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">分享时的摘要</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" placeholder="" name="share_desc" value="<?php  echo $subject['share_desc'];?>">
                         <div class="help-block">活动首页分享时的摘要</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">引导关注素材</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" placeholder="" name="follow_url" value="<?php  echo $subject['follow_url'];?>">
                         <div class="help-block">建议做一条引导关注的图文素材。例：<a href="http://mp.weixin.qq.com/s?__biz=MzA3NDc3NzgyNQ==&mid=201294640&idx=1&sn=e36d516bd3696c2619700bb709be568a#rd" target="_black">点击查看</a></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">人气规则说明</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" placeholder="" name="rule_url" value="<?php  echo $subject['rule_url'];?>">
                         <div class="help-block">建议做一条朋友圈人气榜规则说明的图文素材。例：<a href="http://mp.weixin.qq.com/s?__biz=MzA3NDc3NzgyNQ==&mid=201294640&idx=2&sn=cc137110f8a516cc07cabc00ff522c5d#rd" target="_black">点击查看</a></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">活动介绍说明</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" placeholder="" name="submit_url" value="<?php  echo $subject['submit_url'];?>">
                         <div class="help-block">建议做一条活动介绍的图文素材，可详细说明规则和奖品等细节。例：<a href="http://mp.weixin.qq.com/s?__biz=MzA3NDc3NzgyNQ==&mid=201294640&idx=4&sn=54d1380fcc8f7685d3ae57fbcde246e7#rd" target="_black">点击查看</a></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">投稿照片数限制</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" placeholder="" name="imgnum" value="<?php  echo $subject['imgnum'];?>">
                         <div class="help-block">如设置8，则每个参赛者投稿时最多上传8张照片</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">每日投票数限制</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" placeholder="" name="mynum" value="<?php  echo $subject['mynum'];?>">
                         <div class="help-block">同一用户每天可投给多少人，如50：每天每个用户可给50个选手投票</div>
                    </div>
                </div>

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否可重复投票</label>
            <div class="col-sm-9 col-xs-12">
              <label class="radio-inline">
             <input type="radio" name="day" value="1" <?php  if($subject['day'] == 1) { ?> checked="checked"<?php  } ?>/>不可重复</label>
        <label class="radio-inline">
             <input type="radio" name="day" value="0" <?php  if($subject['day'] == 0) { ?> checked="checked"<?php  } ?>/>可重复</label>
              <span class="help-block">如果勾选可重复，则第二天可继续投票给同一用户，既今天我投票给1号明天还可以投票给1号。</span>
            </div>
        </div>

<div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">首页列表显示数</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" placeholder="" name="anum" value="<?php  echo $subject['anum'];?>">
                         <div class="help-block">首页显示歌手的数量，请填写3的倍数，切勿过大影响打开速度</div>
                    </div>
                </div>
<div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">人气榜显示个数</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" placeholder="" name="bnum" value="<?php  echo $subject['bnum'];?>">
                         <div class="help-block">人气榜显示歌手的数量，请填写3的倍数，切勿过大影响打开速度</div>
                    </div>
                </div>
 <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">站长统计代码</label>
                    <div class="col-sm-8 col-xs-12">
                        <textarea id="cnzz" name="cnzz" class="form-control" rows="5" cols="60"><?php  echo $subject['cnzz'];?></textarea>
                        <div class="help-block">填写站长统计代码，不需要就留空</div>
                    </div>
                </div>

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">投稿是否需审核</label>
            <div class="col-sm-9 col-xs-12">
              <label class="radio-inline">
             <input type="radio" name="pass" value="1" <?php  if($subject['pass'] == 1) { ?> checked="checked"<?php  } ?>/>不需要</label>
         <label class="radio-inline">
             <input type="radio" name="pass" value="0" <?php  if($subject['pass'] == 0) { ?> checked="checked"<?php  } ?>/>需审核</label>
               <div class="help-block">如果勾选不需要，则用户投稿后会直接展示在前台，可能会有一定风险。</div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动首页显示</label>
            <div class="col-sm-9 col-xs-12">
              <label class="radio-inline">
           <input type="radio" name="hot" value="1" <?php  if($subject['hot'] == 1) { ?> checked="checked"<?php  } ?>/>按最新排序</label>
         <label class="radio-inline">
             <input type="radio" name="hot" value="0" <?php  if($subject['hot'] == 0) { ?> checked="checked"<?php  } ?>/>按最热排序</label>
               <div class="help-block">活动首页列表排序规则，如果勾选最新则最新加入的显示在最前面，最热则是票数高在首页。</div>
            </div>
        </div>



        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <input name="submit" type="submit" value="提交" class="btn btn-primary col-lg-1">
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
    </div>
</form>
</div>
<script type="text/javascript">
    var category = <?php  echo json_encode($children)?>;
    require(['jquery', 'util'], function($, u){
        $(function(){
            u.editor($('.richtext')[0]);
        });
        $('#credit1').click(function(){
            $('#credit-status1').show();
        });
        $('#credit0').click(function(){
            $('#credit-status1').hide();
        });
    });
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>