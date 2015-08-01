<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<input type="hidden" name="reply_id" value="<?php  echo $reply['id'];?>" />
<div class="panel panel-default">
    <div class="panel-heading">
        活动设置
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动名称</label>
            <div class="col-sm-9 col-xs-12">
               	<input type="text" id="title" class="form-control" placeholder="" name="title" value="<?php  echo $reply['title'];?>">
            </div>
        </div>
 <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动图片</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_image('thumb',$reply['thumb']);?>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动说明</label>
            <div class="col-sm-9 col-xs-12">
               	<textarea style="height:60px;" id='description' name="description" class="form-control" cols="60"><?php  echo $reply['description'];?></textarea>
            </div>
        </div>
        
           <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动时间</label>
            <div class="col-sm-9 col-xs-12">
            
               	<?php  echo tpl_form_field_daterange('datelimit', array('starttime'=>date('Y-m-d H:i',$reply['starttime']),'endtime'=>date('Y-m-d H:i',$reply['endtime'])),true)?>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>关注引导</label>
            <div class="col-sm-9 col-xs-12">
                     <input type="text" id="followurl" class="form-control span7" placeholder="" name="followurl" value="<?php  echo $reply['followurl'];?>">
                    <div class="help-block">未关注的粉丝，关注引导链接,如果出现错误请使用 <a target="_blank" href="http://www.dwz.cn/">短网址转换</a></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>初始参加人数</label>
            <div class="col-sm-9 col-xs-12">
                     <input type="text" id="joincount" class="form-control span7" placeholder="" name="joincount" value="<?php  echo $reply['joincount'];?>">
                     <div class="help-block">前台显示为初始参加人数+实际参加人数</div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>活动规则</label>
            <div class="col-sm-9 col-xs-12">
                <textarea style="height:200px; width:100%;" id='detail' class="form-control span7 richtext" name="detail" cols="70"><?php  echo $reply['detail'];?></textarea>
            </div>
        </div>
       <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">可帮助次数</label>
            <div class="col-sm-9 col-xs-12">
                     <input type="text" id="friendcount" class="form-control span7" placeholder="" name="friendcount" value="<?php  echo $reply['friendcount'];?>">
                     <div class="help-block">每个人可以被 xx 个好友帮助抽奖，0为不限制</div>
            </div>
        </div>
         <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">横批</label>
            <div class="col-sm-9 col-xs-12">
                     <input type="text" id="toptext" class="form-control span7" placeholder="" name="toptext" value="<?php  echo $reply['toptext'];?>">
                     <div class="help-block">横批 4个字</div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">版权信息</label>
            <div class="col-sm-9 col-xs-12">
                    <input type="text" id="copyright" class="form-control" placeholder="" name="copyright" value="<?php  echo $reply['copyright'];?>">
		<div class="help-block">版权信息，如果不填写，默认为公众号名称！</div>
            </div>
        </div>
        
    </div>
</div>
 <div class="panel panel-default">
    <div class="panel-heading">
        对联规则设置 <small>用户参加后随机获取对联后，随机获取下联每一个字的一条概率规则</small>
    </div>
    <div class="panel-body">
   
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>概率规则</label>
            <div class="col-sm-9 col-xs-12">
                 
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th>字1</th>
                                    <th>字2</th>
                                    <th>字3</th>
                                    <th>字4</th>
                                    <th>字5</th>
                                    <th>字6</th>
                                    <th>字7</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody id="rule-items">
                                <?php  if(is_array($rules)) { foreach($rules as $rule) { ?>
                                   <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('rule_item', TEMPLATE_INCLUDEPATH)) : (include template('rule_item', TEMPLATE_INCLUDEPATH));?>
                                <?php  } } ?>
                                
                            </tbody>
                        </table>
                    
                 <a class="btn btn-default btn-add-rule" href="javascript:;" onclick="addRule();"><i class="fa fa-plus" title="添加规则"></i> 添加规则</a>
            </div>
        </div>
    </div>
</div>
  <div class="panel panel-default">
    <div class="panel-heading">
        对联设置 </small>
    </div>
    <div class="panel-body">
  <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 对联内容</label>
            <div class="col-sm-9 col-xs-12">
               	<textarea style="height:600px;" id='couplets' name="couplets" class="form-control" cols="60"><?php  echo $reply['couplets'];?></textarea>
                <span class="help-block">一行未一副对联</span>
            </div>
        </div>
        </div>
</div>
 
<div class="panel panel-default">
    <div class="panel-heading">
        奖品设置
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 奖品名称</label>
            <div class="col-sm-9 col-xs-12">
               	<input type="text" id="award_name" class="form-control" placeholder="" name="award_name" value="<?php  echo $reply['award_name'];?>">
            </div>
        </div>
       <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 奖品数量</label>
            <div class="col-sm-5">
                <div class="input-group">
                    <span class="input-group-addon">总数</span>
                    <input type="text" id="award_total" class="form-control" placeholder="" name="award_total" value="<?php  echo $reply['award_total'];?>">    
                    <span class="input-group-addon">个，剩余</span>
                    <input type="text" id="award_last" class="form-control" placeholder="" name="award_last" value="<?php  echo $reply['award_last'];?>">    
                    <span class="input-group-addon">个</span>
                </div>
            </div>
        </div>

        
    </div>
</div>
    

    <div class="panel panel-default">
    <div class="panel-heading">
        样式设置 ( 尽量不要修改对联位置，如果不会修改，只修改头部图片即可,保持原有元素大小及位置)
    </div>
    <div class="panel-body">
      
    <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"> 资源图片1</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_image('res_img1',$reply['res_img1']);?>
                <span class="help-block">对联位置不要改变，可以修改背景</span>
            </div>
        </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"> 资源图片2</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_image('res_img2',$reply['res_img2']);?>
                <span class="help-block">此资源图片必须为PNG格式</span>
            </div>
        </div>
         <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"> 背景颜色</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_color('bgcolor',$reply['bgcolor']);?>
            </div>
        </div>
    </div>
</div>


<script>
    $('form').submit(function() {

        if ($("#title").isEmpty()) {
            Tip.focus("title", "请输入活动名称!", "right");
            return false;
        }
         return true;
    });
    
      require(['jquery', 'util'], function($, u){
	$(function(){
			u.editor($('#detail')[0]);
	});
});
    
</script>


<script language='javascript'>
    function addRule(){
         $(".btn-add-rule").button("loading");
             $.ajax({
                 url: "<?php  echo $this->createWebUrl('tpl',array('t'=>'rule_item'))?>",
                 cache:false
             }).done(function(html){
               $(".btn-add-rule").button("reset");
               $("#rule-items").append(html);
             });
    }
    function removeRule(obj){
        $(obj).parent().parent().remove();
    }
    
    </script>