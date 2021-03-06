<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class='container' style='padding: 0 5px 10px; margin: 0; width: 100%'>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#">参数设置</a></li>
    </ul>
    <div class="panel panel-success">
        <div class="panel-heading">分享借用高级认证设置如果你的公众号未认证，则需要借用其他认证订阅号，或认证服务号。</div>
        <div class="panel-body">
            <form class="form-horizontal" action="" method="post">
                <input type="hidden" id="isoauth_hid" name="status_hid" value="<?php  echo $settings['isoauth'];?>"/>
                <div class="form-group" >
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">引导关注</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="guanzhuUrl" class="form-control" value="<?php  echo $settings['guanzhuUrl'];?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">背景图片</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('indexPic', $settings['indexPic'])?>
					<span class="help-block">
						建议图片大小为： 60*22
						比如：
                        <img src="../addons/zombie_fighting/template/style/images/desc_bg.jpg" style="width:60px;height: 22px; ">
					</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否借用</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="radio" name="isoauth" value="0" id="form-oauth-0" <?php  if($settings['isoauth']==0) { ?>checked="true"<?php  } ?>  /> 是
                        <input type="radio" name="isoauth" value="1" id="form-oauth-1"  <?php  if($settings['isoauth']==1) { ?>checked="true"<?php  } ?>  /> 否
                        <span class="help-block">如果开启oauth认证，需要认证的服务号才能使用此功能。</span>
                    </div>
                </div>

                <div class="form-group" id="appid_div">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">AppId</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="appid" class="form-control"  value="<?php  echo $settings['appid'];?>" />
                    </div>
                </div>
                <div class="form-group" id="appsecret_div">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">AppSecret</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="secret" class="form-control" value="<?php  echo $settings['secret'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input name="token" type="hidden" value="<?php  echo $_W['token'];?>"/>
                        <button type="submit" class="btn btn-success col-sm-2" name="submit" value="提交">
                            <i class="fa fa-check-circle"></i> 提交
                        </button>
                    </div>
                </div>
                <div class="form-group" id="image_div">>
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                        借用说明：必需设置借用认证号的JS接口安全域名。在公众号设置-功能设置中，可以找到。 <br />
                        <img src="../addons/zombie_fighting/template/style/images/jssdk.png">
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>
<script>

    $(function(){

        $("#form-oauth-<?php  echo $settings['isoauth'];?>").attr("checked", true);
        var isoauth_hid =$("#isoauth_hid").val();
        if(isoauth_hid==1){
            $("#appid_div").hide();
            $("#appsecret_div").hide();
            $("#image_div").hide();
        }
        $("input[name='isoauth']").on("change", function(){
            var type = $("input[name='isoauth']:checked").val();
            //不弹出
            if(type == 0) {
                $("#appid_div").show();
                $("#appsecret_div").show();
                $("#image_div").show();
            } else {
                $("#appid_div").hide();
                $("#appsecret_div").hide();
                $("#image_div").hide();
            }
        });
    });
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>