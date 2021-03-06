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
        规则设置
    </div>
    <div class="panel-body">
        
           
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>默认获得钱数</label>
            <div class="col-sm-3">
		            <div class="input-group">
		                  <input  name="start" type="text" class="form-control" value="<?php  echo $reply['start'];?>"  maxlength="50"/> 
		                  <span class="input-group-addon">到</span>
		                  <input  name="end" type="text" class="form-control" value="<?php  echo $reply['end'];?>"  maxlength="50" /> 
		                  
		            </div>
		             <span class="help-block">参加活动默认获得的钱数，或者后续没有规则时候的范围，如果固定，则两个设置成一样</span>
             </div>

        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>助力规则</label>
            <div class="col-sm-9 col-xs-12">
                 
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th>钱数(大于此钱数)</th>
                                    <th>范围从</th>
                                    <th>到</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody id="rule-items">
                                <?php  if(is_array($rules)) { foreach($rules as $rule) { ?>
                                <tr class='rule_item'>
                                    <td><input  name="rule_point[]" type="text" class="form-control span3" value="<?php  echo $rule['point'];?>"  maxlength="50"/></td>
                                    <td>
                                        <input  name="rule_start[]" type="text" class="form-control span1" value="<?php  echo $rule['start'];?>"  maxlength="50"/> </td>
                                        <td><input  name="rule_end[]" type="text" class="form-control span1" value="<?php  echo $rule['end'];?>"  maxlength="50"/></td>
                                      <td>
                                            <input  name="rule_id[]" type="hidden" value="<?php  echo $rule['id'];?>" />
                                        <a class="btn btn-default" href='javascript:;' onclick='removeRule(this)'><i class='icon icon-remove fa fa-times'></i> 删除</a>
                                    </td>
                                </tr>
                                <?php  } } ?>
                                
                            </tbody>
                        </table>
                    
                 <a class="btn btn-default" href="javascript:;" onclick="addRule();"><i class="fa fa-plus" title="添加规则"></i> 添加规则</a>
            </div>
        </div>
        
         <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>可申请提现底数</label>
            <div class="col-sm-9 col-xs-12">
                     <input type="text" id="points" class="form-control span7" placeholder="" name="points" value="<?php  if(empty($reply['points'])) { ?>100<?php  } else { ?><?php  echo $reply['points'];?><?php  } ?>">
                     <div class="help-block">用户红包达到多少可以申请提现</div>
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
        
        var html = " <tr class='rule_item'>";
        html+="<td><input  name='rule_point[]' type='text' class='form-control span2' value=''  maxlength='50'/></td>";
        html+="<td><input  name='rule_start[]' type='text' class='form-control span1' value=''  maxlength='50'/></td>";
        html+="<td><input  name='rule_end[]' type='text' class='form-control span1' value=''  maxlength='50'/></td>";
        html+="<td>";
                    html+="<input  name='rule_id[]' type='hidden' value='' />";
                    html+="<a href='javascript:;' onclick='removeRule(this)'><i class='icon icon-remove fa fa-times'></i> 删除</a>";
                    html+="</td>";
                    html+="</tr>";
                    $("#rule-items").append(html);
                                
    }
    function removeRule(obj){
        $(obj).parent().parent().remove();
    }
    
    </script>