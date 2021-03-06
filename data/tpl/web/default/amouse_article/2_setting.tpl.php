<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class='container'
     style='padding: 0 5px 10px; margin: 0; width: 100%'>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#">微信互推设置</a></li>
    </ul>
    <div class="panel panel-success">
        <div class="panel-heading">参数设置</div>
        <div class="panel-body">
            <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">引导关注名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="guanzhutitle" class="form-control" value="<?php  echo $settings['guanzhutitle'];?>" />
                    </div>
                </div>

                <div class="form-group" >
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">引导关注</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="guanzhuUrl" class="form-control" value="<?php  echo $settings['guanzhuUrl'];?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">背景图片</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('bjthumb', $settings['bjthumb'])?>
                    </div>
                </div>

                <div class="form-group" >
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">版权信息</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="copyright" class="form-control" value="<?php  echo $settings['copyright'];?>" />
                        <span class="help-block">
						如果没空的话，默认是本公众号
					</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">赞助连接</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="patron" class="form-control"  value="<?php  echo $settings['patron'];?>" />
                        <span class="help-block"> 借助第三方统计代码,如百度,量子,51la,chinaz</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">联系我</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="contact" class="form-control"  value="<?php  echo $settings['contact'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">最火小游戏链接</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="gameUrl" class="form-control"  value="<?php  echo $settings['gameUrl'];?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">计数器链接</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="countUrl" class="form-control"  value="<?php  echo $settings['countUrl'];?>" />
                        <span class="help-block">申请网址：http://www.amazingcounters.com/ 把申请后的填写到此处</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
                        <button type="submit" class="btn btn-success col-sm-2" name="submit" value="提交">
                            <i class="fa fa-check-circle"></i> 提交
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>