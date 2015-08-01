<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-base', TEMPLATE_INCLUDEPATH)) : (include template('common/header-base', TEMPLATE_INCLUDEPATH));?>
<script>
$(document).ready(
function() {
$("#sidebarn").niceScroll({cursorcolor:"rgb(201, 16, 50)"});
}
);
</script>

<?php  if(defined('IN_MESSAGE')) { ?>
<div class="col-md-6" style="margin: 0 auto; float: none;padding-top:5%; width: 38%;">
    <div class="panel panel-primary">
        <div class="panel-heading ui-draggable-handle">
            <?php  if(is_array($msg)) { ?>
            <h3 class="panel-title">MYSQL 错误：</h3>
        </div>
        <div class="panel-body">
            <h3><?php  echo cutstr($msg['sql'], 300, 1);?></h3>
            <p><b><?php  echo $msg['error']['0'];?> <?php  echo $msg['error']['1'];?>：</b><?php  echo $msg['error']['2'];?></p>
        </div>
        <?php  } else { ?>
        <h3 class="panel-title"><?php  echo $caption;?></h3>

        <div class="panel-body">
            <h3><?php  echo $msg;?></h3>
            <?php  } ?>
            <?php  if($redirect) { ?>
            <h4><a href="<?php  echo $redirect;?>" class="alert-link">如果你的浏览器没有自动跳转，请点击此链接</a></h4>
            <script type="text/javascript">
                setTimeout(function () {
                    location.href = "<?php  echo $redirect;?>";
                }, 3000);
            </script>
            <?php  } else { ?>
            <h4>[<a href="javascript:history.go(-1);" class="alert-link">点击这里返回上一页</a>] &nbsp; [<a href="./?refresh" class="alert-link">首页</a>]</h4>
            <?php  } ?></div></div>
    <div class="panel-footer">
        <div class="contact-info" style="float: right;
width: 36%;">
            <p><small>感谢您使用WDLCMS营销平台</small></p>

        </div>
    </div>
</div>

<?php  } ?>


 

    <div class="page-container page-navigation-top-fixed">
      <script type="text/javascript">
function reinitIframe(){
var iframe = document.getElementById("main");
try{
var bHeight = iframe.contentWindow.document.body.scrollHeight;
var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
var height = Math.max(bHeight, dHeight);
iframe.height = height;
console.log(height);
}catch (ex){}
}
window.setInterval("reinitIframe()", 200);
</script>
            <iframe frameborder="0" id="main" name="main" src="" onload="this.height=10" style=" width:100%; " scrolling="no"></iframe>
			
			 <ul class="x-navigation x-navigation-horizontal" style="z-index: 8;position: fixed;" >
        <li class="xn-logo" style="background: #0D708F;">
            <a href="javascript:;"></a>
         
        </li>
    
        <li class="xn-openable pull-left">
            <a href="<?php  echo url('home/welcome/ext');?>" ><i class="fa fa-dedent"></i>功能管理首页</a>
        </li>
		<li>
			<a href="./themes/default/wx/index.html" target="_blank"><i class="fa fa-file-text"></i>编辑微信图文</a>
		</li>
        <li class="xn-openable pull-right">
            <a href="<?php  echo url('user/logout');?>" class="mb-control" data-box="#mb-signout"><i class="fa fa-sign-out"></i> 退出</a>
        </li>
        <li class="pull-right xn-openable">
            <a href="javascript:;" >
                <i class="fa fa-user"></i> <?php  echo $_W['user']['username'];?></a>
        </li>
        <li class="xn-openable pull-right" >
            <a href="javascript:;" ><i class="fa fa-comments-o"></i> <?php  echo $_W['account']['name'];?></a>
        </li>

    </ul>
        <div class="page-sidebar page-sidebar-fixed" id="sidebarn" style="top:50px;">
            <!-- START X-NAVIGATION -->
            <ul class="x-navigation" id="navexpp"  >
                <li class="xn-profile">
                    <div class="profile">

                        <div class="profile-image">
                            <img src="<?php  echo $_W['attachurl'];?>headimg_<?php  echo $_W['uniacid'];?>.jpg?$acid=<?php  echo $_W['uniacid'];?>" class="" onerror="this.src='resource/wdlcms/assets/images/users/568.jpg'" />
                        </div>
                        <div class="profile-data">
                            <div class="profile-data-name"><?php  echo $_W['user']['username'];?></div>
                            <div class="profile-data-title">WDLCMS欢迎您回来!</div>
                        </div>

                    </div>
                </li>

            <?php  if($moudles) { ?>
               <li class="xn-title">快速入口</li>

            <li>
                <a href="<?php  echo url('account/display');?>"><span class="fa fa-comments"></span> <span class="xn-text">公众号管理</span></a>
            </li>
                <?php  if($_W['isfounder']) { ?>
                
             <li>
                <a href="<?php  echo url('system/welcome');?>"><span class="fa fa-cog"></span> <span class="xn-text">系统设置</span></a>
            </li>
             <li>
                <a href="<?php  echo url('profile/module');?>"><span class="fa fa-cogs"></span> <span class="xn-text">扩展功能管理</span></a>
            </li>
             <li>
                 <a href="<?php  echo url('utility/emulator');?>"><span class="fa fa-edit"></span> <span class="xn-text">模拟测试</span></a>
              </li>
            
            
            <?php  } ?>
            <li>
                <a href="<?php  echo url('user/logout');?>"><span class="fa fa-sign-out"></span> <span class="xn-text">直接退出</span></a>
            </li>
                <div id="oldname">
            <li class="xn-title">QQ在线客服</li>
            <li>
                <a href="http://wpa.b.qq.com/cgi/wpa.php?ln=1&key=XzgwMDA4MzA3NV8yMTc1MThfODAwMDgzMDc1XzJf"><span class="fa fa-comments-o"></span> <span class="xn-text">售前客服</span></a>
            </li>
            <li>
                <a href="http://wpa.b.qq.com/cgi/wpa.php?ln=1&key=XzgwMDA4MzA3NV8yMTc1MThfODAwMDgzMDc1XzJf"><span class="fa fa-comments-o"></span> <span class="xn-text">售后技术</span></a>
            </li>
            </div>

                <?php  } else { ?>
                <li class="xn-openable active">

                            <a data-toggle="collapse" data-parent="#frame-<?php  echo $k;?>" href="#frame-<?php  echo $k;?>"><span class="xn-text">核心功能设置</span></a>

                        <ul id="frame-<?php  echo $k;?>" class="panel-collapse collapse in">
                            <?php  if($entries['cover']) { ?>
                            <?php  if(is_array($entries['cover'])) { foreach($entries['cover'] as $cover) { ?>

                            <li>
                                <a href="<?php  echo $cover['url'];?>" title="<?php  echo $cover['title'];?>" target="main"  class="list-group-item1">
                                    <?php  echo $cover['title'];?>
                                </a>
                            </li>
                            <?php  } } ?>
                            <?php  } ?>
                            <?php  if($module['isrulefields']) { ?>
                            <li>
                                <a href="<?php  echo url('platform/reply', array('m' => $m))?>" target="main"  class="list-group-item1">
                                    回复规则列表

                                </a>
                            </li>
                            <?php  } ?>
                            <?php  if($entries['home'] || $entries['profile'] || $entries['shortcut']) { ?>
                            <?php  if($entries['home']) { ?>
                            <li>
                                <a href="<?php  echo url('site/nav/home', array('m' => $m))?>" target="main"  class="list-group-item1">

                                    微站首页导航

                                </a>
                            </li>
                            <?php  } ?>
                            <?php  if($entries['profile']) { ?>
                            <li>
                                <a href="<?php  echo url('site/nav/profile', array('m' => $m))?>" target="main" class="list-group-item1">

                                    个人中心导航

                                </a>
                            </li>
                            <?php  } ?>
                            <?php  if($entries['shortcut']) { ?>
                            <li>
                                <a href="<?php  echo url('site/nav/shortcut', array('m' => $m))?>" target="main"
                                   class="list-group-item1">
                                    快捷菜单
                                </a>
                            </li>
                            <?php  } ?>
                            <?php  } ?>
                            <?php  if($module['settings']) { ?>
                            <li>
                                <a href="<?php  echo url('profile/module/setting', array('m' => $m));?>" target="main"  class="list-group-item1">

                                    参数设置
                                </a>
                            </li>
                            <?php  } ?>
                        </ul></li>

                        <?php  if(empty($module['issolution'])) { ?>
                        <?php  if($entries['menu']) { ?>
                <li class="xn-openable active">
                            <a data-toggle="collapse"  data-parent="#frame-<?php  echo $k1;?>" href="#frame-<?php  echo $k1;?>"><span class="xn-text">业务功能菜单</span></a>

                        <ul id="frame-<?php  echo $k1;?>" class="panel-collapse collapse in">
                            <?php  if(is_array($entries['menu'])) { foreach($entries['menu'] as $menu) { ?>
                            <li>
                                <a href="<?php  echo $menu['url'];?>" title="<?php  echo $menu['title'];?>" target="main"  class="list-group-item1">

                                    <?php  echo $menu['title'];?>

                                </a>
                            </li>
                            <?php  } } ?>
                        </ul>
                        </li><?php  } ?>
                        <?php  } else { ?>
                        <li class="xn-openable active">
                            <a data-toggle="collapse"  data-parent="#frame-<?php  echo $k;?>" href="#frame-<?php  echo $k;?>"><span class="xn-text">功能分权 (仅限行业模块)</span></a>

                        <ul id="frame-<?php  echo $k;?>" class="panel-collapse collapse in">
                            <li>
                                <a href="<?php  echo url('profile/worker', array('m' => $m, 'reference' => 'solution'));?>"  target="main" class="list-group-item1">
                                    设置操作用户
                                </a>
                            </li>
                            <li>
                                <a href="<?php  echo url('home/welcome/solution', array('m' => $m));?>" target="main"  class="list-group-item1">

                                    进入管理后台

                                </a>
                            </li>
                        </ul>
                        <?php  } ?>	</li>
                <?php  } ?>
            </ul>
        </div>


        <div class="page-content" style="padding:0px;background: transparent;">

            <div class="page-content-wrap" >


                <div id="row" style="margin-top: 50px;">
                    <div class="col-md-12">

                                <?php  if($moudles) { ?>
                                <div class="row" >
                                    <div class="page-title">
                                        <h2 style="margin-bottom: 0px; font-size: 15px;"><span class="fa fa-arrow-circle-o-left"></span> 基础设置</h2>
                                    </div>
                                    <div class="col-md-mm" style="float: left; min-width: 130px;">
                                        <a href="javascript:;" onclick="window.location.href = '<?php  echo url('home/welcome/platform');?>'" class="tile tile-primary" onclick="setdis()">
                                            <i class="fontello-icon-tools" style="font-size: 25px; line-height: normal;"></i>
                                            <p>基本回复设置</p>
                                            <div class="informer informer-default dir-tr"><span class="fo fontello-icon-tools"></span></div>
                                        </a>
                                    </div>
                                    <div class="col-md-mm" style="float: left; min-width: 130px;">
                                        <a href="<?php  echo url('home/welcome/site');?>" class="tile tile-primary" onclick="setdis()">
                                            <i class="fontello-icon-globe" style="font-size: 26px; line-height: normal; "></i>
                                            <p>微站功能</p>
                                            <div class="informer informer-default dir-tr"><span class="fo fontello-icon-globe"></span></div>
                                        </a>
                                    </div>
                                    <div class="col-md-mm" style="float: left; min-width: 130px;">
                                        <a href="<?php  echo url('home/welcome/mc');?>" class="tile tile-primary" onclick="setdis()">
                                            <i class="fontello-icon-users-1" style="font-size: 26px; line-height: normal; "></i>
                                            <p>粉丝营销</p>
                                            <div class="informer informer-default dir-tr"><span class="fo fontello-icon-users-1"></span></div>
                                        </a>
                                    </div>
                                    <div class="col-md-mm" style="float: left; min-width: 130px;">
                                        <a href="<?php  echo url('home/welcome/setting');?>" class="tile tile-primary" onclick="setdis()">
                                            <i class="fontello-icon-bag" style="font-size: 26px; line-height: normal; "></i>
                                            <p>功能选项</p>
                                            <div class="informer informer-default dir-tr"><span class="fo fontello-icon-bag"></span></div>
                                        </a>
                                    </div>
                                    <div class="col-md-mm" style="float: left; min-width: 130px;">
                                        <a href="<?php  echo url('user/profile');?>" class="tile tile-primary" onclick="setdis()">
                                            <i class="fontello-icon-user-4" style="font-size: 26px; line-height: normal; "></i>
                                            <p>我的账户</p>
                                            <div class="informer informer-default dir-tr"><span class="fo fontello-icon-user-4"></span></div>
                                        </a>
                                    </div>

                                </div>

	<?php  if(is_array($frames)) { foreach($frames as $k => $frame) { ?>

	<div class="row">
        <div class="page-title">
            <h2 style="margin-bottom: 0px; font-size: 15px;"><span class="fa fa-arrow-circle-o-left"></span> <?php  echo $frame['title'];?></h2>
        </div>
		<?php  if(is_array($frame['items'])) { foreach($frame['items'] as $link) { ?>
        <?php 
		switch ($link['title']) {
			case '微商城':
			$snav_icon = 'fontello-icon-basket-2';
			break;
			case '扫码查快递':
			$snav_icon = 'fontello-icon-qrcode';
			break;
			case '微相册':
			$snav_icon = 'fontello-icon-picture';
			break;
			case '余额提现':
			$snav_icon = 'fontello-icon-dollar';
			break;
			case '淘宝同步助手':
			$snav_icon = 'fontello-icon-loop-alt';
			break;
			case '通用表单':
			$snav_icon = 'fontello-icon-grid';
			break;
			case '微考试':
			$snav_icon = 'fontello-icon-pencil-1';
			break;
			case '微画报（微场景）':
			$snav_icon = 'fontello-icon-newspaper';
			break;
			case '幸运大抽奖':
			$snav_icon = 'fontello-icon-gift';
			break;
			case '砸蛋' :
			$snav_icon = 'fontello-icon-hammer';
            break;
            case '微投票' :
			$snav_icon = 'fontello-icon-emo-wink2';
            break;
            case '大转盘' :
			$snav_icon = 'fontello-icon-lifebuoy';
			break;
			case '摇骰子' :
			$snav_icon = 'fontello-icon-soccer';
            break;
            case '做粽子' :
			$snav_icon = 'fontello-icon-eject';
            break;
            case '占楼有礼' :
			$snav_icon = 'fontello-icon-upload-2';
            break;
            case '打气球':
			$snav_icon = 'fontello-icon-location-inv';
			break;
			case '送贺卡':
			$snav_icon = 'fontello-icon-docs-landscape-1';
			break;
			case '零元购':
			$snav_icon = 'fontello-icon-comment-alt2';
			break;
			case '摇一摇中奖':
			$snav_icon = 'fontello-icon-mobile-2';
			break;
			case '场景魔方' :
			$snav_icon = 'fontello-icon-lemon';
            break;
            case '客服消息群发' :
			$snav_icon = 'fontello-icon-chat-5';
            break;
            case '微信墙':
			$snav_icon = 'fontello-icon-eye-4';
			break;
			case '来吧来吧':
			$snav_icon = 'fontello-icon-right-hand';
			break;
			case '防伪会员积分系统':
			$snav_icon = 'fontello-icon-barcode';
			break;
			case '联盟微信墙':
			$snav_icon = 'fontello-icon-eye-1';
			break;
			case '消息通知中心':
			$snav_icon = 'fontello-icon-bullhorn';
			break;
			case '工具箱':
			$snav_icon = 'fontello-icon-wrench-1';
			break;
			case '会员余额导入':
			$snav_icon = 'fontello-icon-retweet-2';
			break;
			case '聊天机器人':
			$snav_icon = 'fontello-icon-chat-4';
			break;
			case '调研' :
			$snav_icon = 'fontello-icon-doc-1';
			break;
			case '预约与调查':
			$snav_icon = 'fontello-icon-edit-1';
			break;
			case '关注有礼' :
			$snav_icon = 'fontello-icon-export-1';
            break;
			default:
			$snav_icon = 'fontello-icon-emo-happy';
			}
			?>
		<div class="col-md-mm" style="float: left;min-width: 130px; margin-bottom: 20px;">
            <a href="<?php  echo $link['url'];?>" class="tile tile-primary">
                <i class="<?php  echo $snav_icon;?>" style="font-size: 26px; line-height: normal; "></i>
                <p><?php  echo $link['title'];?></p>
                <div class="informer informer-default dir-tr"><span class="fo <?php  echo $snav_icon;?>"></span></div>
            </a>
        </div>
								<?php  } } ?>
		</div>
<?php  } } ?>
<!--新增开始-->
<?php  } else { ?>

	<div class="page-header2">
		<h4><i class="fa2 fa-plane"></i> 点击左侧功能列表，开始设置功能吧！</h4>
	</div>


<!--新end-->

<?php  } ?>


<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>