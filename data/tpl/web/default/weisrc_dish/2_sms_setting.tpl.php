<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
     .item_box img{
         width: 100%;
         height: 100%;
     }
</style>
<script type="text/javascript">
    $(function(){
        $(':radio[name="sms_enable"]').click(function(){
            if(this.checked) {
                if($(this).val() == '1') {
                    $('.sms').show();
                } else {
                    $('.sms').hide();
                }
            }
        });
    });
</script>
<?php  echo $this -> set_tabbar($action, $storeid);?>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php  echo $setting['id'];?>" />
        <div class="panel panel-default">
            <div class="panel-heading">
                短信设置
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">提醒接收手机号</label>
                    <div class="col-sm-9">
                        <input type="text" name="sms_mobile" class="form-control" value="<?php  echo $setting['sms_mobile'];?>" />
                        <div class="help-block">请输入要接受订单提醒的手机号码.</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商户短信提醒</label>
                    <div class="col-sm-9">
                        <label for="sms_enable" class="radio-inline"><input type="radio" name="sms_enable" value="1" id="sms_enable" <?php  if($setting['sms_enable']==1) { ?>checked<?php  } ?> /> 是</label>
                        &nbsp;&nbsp;&nbsp;
                        <label for="sms_enable2" class="radio-inline"><input type="radio" name="sms_enable" value="0" id="sms_enable2"  <?php  if($setting['sms_enable']==0 || empty($setting)) { ?>checked<?php  } ?> /> 否</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商户通知短信模板</label>
                    <div class="col-sm-9">
                        <textarea style="height:100px;" class="form-control" name="sms_business_tpl" cols="70"><?php  if(empty($setting['sms_business_tpl']) || empty($setting)) { ?>您有新的订单：【变量】，收货人：【变量】，电话：【变量】，请及时确认订单！<?php  } else { ?><?php  echo $setting['sms_business_tpl'];?><?php  } ?></textarea><br/>
                        <p class="help-block">用于接受客户的订单消息，[sn]订单号，[name]客户名称,[date]时间，[goods]菜品详情，[totalnum]总数量，[totalprice]总价格，[tel]电话，[address]地址，[remark]备注。<br/>注意:你添加的文字替换在【变量】，否则无法发送.<br>短信70字符内算1条收费，超70字符,按65字符/条，多条收费。(目前运营商行业标准）
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <input name="submit" type="submit" value="提交" class="btn btn-primary span3">
            <input type="hidden" name="id" value="<?php  echo $setting['id'];?>" />
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
	</form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>