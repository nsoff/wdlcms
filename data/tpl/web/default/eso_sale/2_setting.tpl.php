<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<div class="main">

    <form action="" method="post" class="form-horizontal form">

        <div class="panel panel-default">
            <div class="panel-heading">
                商城设置
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">佣金打款限额</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="zhifuCommission" class="form-control" value="<?php  echo $settings['zhifuCommission'];?>"  />
                        满足此金额的佣金才能打款！
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">1级整站佣金</label>
                    <div class="col-sm-9 col-xs-12">
                        <div class="input-group">
                            <input type="text" name="globalCommission" class="form-control" value="<?php  echo $settings['globalCommission'];?>" />
                            <span class="input-group-addon">%</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">2级整站佣金</label>
                    <div class="col-sm-9 col-xs-12">
                        <div class="input-group">
                            <input type="text" name="globalCommission2" class="form-control" value="<?php  echo $settings['globalCommission2'];?>" />
                            <span class="input-group-addon">%</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">3级整站佣金</label>
                    <div class="col-sm-9 col-xs-12">
                        <div class="input-group">
                            <input type="text" name="globalCommission3" class="form-control" value="<?php  echo $settings['globalCommission3'];?>" />
                            <span class="input-group-addon">%</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">首页限时特卖（显示条数）</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="indexss" class="form-control small " value="<?php  echo $settings['indexss'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">未关注引导页面</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="ydyy" class="form-control" value="<?php  echo $settings['ydyy'];?>" /> 请到把引导页面链接缩短成短网址形式，以防止报错！<a target="_blank" href="http://www.dwz.cn">百度短网址</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                转发参数设置
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">转发图片</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php  echo tpl_form_field_image('logo', $settings['logo']);?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">转发话术</label>
                    <div class="col-sm-9 col-xs-12">
                        <textarea id="description" name="description" class="form-control" cols="60"><?php  echo $settings['description'];?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                消息模板
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">提交订单消息模板</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="paymsgTemplateid" class="form-control" value="<?php  echo $settings['paymsgTemplateid'];?>" />
                    </div>
                </div>
                <div class="help-block">在http://mp.weixin.qq.com登录后，依次点击"消息模板",点击"模板库"，选择编号为TM00001的模板点击"详情"，再点击"添加"。添加成功后查看“我的模板”，将模板ID填写到这里</div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                借用高级认证
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">AppId</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="appid" class="form-control" value="<?php  echo $settings['appid'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">AppSecret</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="secret" class="form-control" value="<?php  echo $settings['secret'];?>" />
                    </div>

                </div>
                <div class="help-block">借用说明：必需设置借用高级认证号的"网页授权获取用户基本信息"的回调域名为你公众号第三方平台的全域名。
                        如：你的域名为：weixin.esonet.cn ，你必需让借用高级认证号设置"网页授权获取用户基本信息"的回调域名为:weixin.esonet.cn</div>
            </div>
        </div>

        <input name="submit" type="submit" value="提交" class="btn btn-primary span3" />
        <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />

       <!-- <h4>商城信息</h4>
        <table class="tb">
            <tr>
                <th>品牌名称</th>
                <td>
                    <input type="text" name="shopname" class="span5" value="<?php  echo $settings['shopname'];?>" />
                </td>
            </tr>

            <tr>
                <th><label for="">官方网址</label></th>
                <td>
                    <input type="text" name="officialweb" class="span6" value="<?php  echo $settings['officialweb'];?>" />
                </td>
            </tr>				
        				
           	
               <tr>
                <th>联系电话：</th>
                <td><input type="text" id="phone" name="phone"  class="span7" value="<?php  echo $settings['phone'];?>"> </td>
            </tr>
            <tr>
                <th>所在地址：</th>
                <td><input type="text" id="address" name="address"  class="span7" value="<?php  echo $settings['address'];?>"> </td>
            </tr>
          
      
          <tr>
                <th></th>
                <td>
                    <input name="submit" type="submit" value="提交" class="btn btn-primary span3" />
                    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                </td>
            </tr>-->
			

    </form>
</div>
<script type="text/javascript">
    //
    require(['jquery', 'util'], function($, u){
        $(function(){
            u.editor($('#description')[0]);
        });
    });
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>