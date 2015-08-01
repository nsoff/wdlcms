<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?php  echo $reply['title'];?></title>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">

        <!-- Mobile Devices Support @begin -->
            <meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
            <meta content="telephone=no, address=no" name="format-detection">
            <meta name="apple-mobile-web-app-capable" content="yes" /> <!-- apple devices fullscreen -->
            <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <!-- Mobile Devices Support @end -->
         <style>
            img{max-width:100%!important;}
        </style>
            
    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>	
    </head>
    <body onselectstart="return true;" ondragstart="return false;">
            <link rel="stylesheet" type="text/css" href="../addons/ewei_money/style/css/base.css"/>
        <script type="text/javascript" src="../addons/ewei_money/style/js/zepto.min.js"></script>
    <script type="text/javascript">

        /* 游戏配置 */
        var APP = {
            customer: '<?php  echo $_W['account']['name'];?>', // 商家名称
            userCount: <?php  echo $reply['play_times'];?>, // 参加活动的用户数
            IIMEOUT: <?php  if(empty($reply['game_time'])) { ?>5<?php  } else { ?><?php  echo $reply['game_time'];?><?php  } ?>, // 游戏时间(s)
            uid:'<?php  echo $ifans['id'];?>', // 用户ID
            openid:'<?php  echo $openid;?>', // 用户openid
            remainDayTimes:<?php  echo $reply['daytimes'];?>, // 用户的剩余当天次数
            remainAllTimes:<?php  echo $reply['alltimes'];?>, // 用户的剩余总次数
            followed: <?php echo $followed?'true':'false'?>,//是否关注
            mustFollow:<?php  if($reply['isfollow']==1) { ?>true<?php  } else { ?>false<?php  } ?>,//音乐
            end: <?php  if($reply['endtime']<time()) { ?>true<?php  } else { ?>false<?php  } ?>, // 活动结束标记
            REG_FIRST: <?php  if($reply['reg_first']==1) { ?>true<?php  } else { ?>false<?php  } ?>, // 填写用户个人信息规则: true--游戏开始前填写，false--游戏结束后填写
            MAX_SUM:<?php  echo $reply['max_sum'];?>, // 最大金额
            currency: [{"p":"<?php  echo $reply['c_rate_one'];?>","v":"0.1"},{"p":"<?php  echo $reply['c_rate_two'];?>","v":"0.2"},{"p":"<?php  echo $reply['c_rate_three'];?>","v":"0.5"},{"p":"<?php  echo $reply['c_rate_four'];?>","v":1},{"p":"<?php  echo $reply['c_rate_five'];?>","v":5},{"p":"<?php  echo $reply['c_rate_six'];?>","v":10},{"p":"<?php  echo $reply['c_rate_seven'];?>","v":20},{"p":"<?php  echo $reply['c_rate_eight'];?>","v":50},{"p":"<?php  echo $reply['c_rate_nine'];?>","v":100}],// 金额比例, i为货币图标名称的下标，p为货币百分比, v为货币面额
            URL_RULE:"<?php echo './index.php?i='.$_W['uniacid'].'&c=entry&m=ewei_money&do=rule&id='.$rid?>" , // 规则
            URL_RANK: "<?php echo './index.php?i='.$_W['uniacid'].'&c=entry&m=ewei_money&do=rank&id='.$rid?>", // 富豪榜
            URL_TICKET: "<?php echo './index.php?i='.$_W['uniacid'].'&c=entry&m=ewei_money&do=ticket&id='.$rid?>", // 大金库
            URL_USER: "<?php echo './index.php?i='.$_W['uniacid'].'&c=entry&m=ewei_money&do=user&id='.$rid?>", // 用户
            URL_VERIFY: "<?php echo './index.php?i='.$_W['uniacid'].'&c=entry&m=ewei_money&do=user&id='.$rid?>", // 短信验证
            URL_SCORE: "<?php echo './index.php?i='.$_W['uniacid'].'&c=entry&m=ewei_money&do=score&id='.$rid?>", // 分数
            URL_GET_TICKET: "<?php echo './index.php?i='.$_W['uniacid'].'&c=entry&m=ewei_money&do=ticket&id='.$rid?>", // 领取现金券
            URL_EXCHANGE: "<?php echo './index.php?i='.$_W['uniacid'].'&c=entry&m=ewei_money&do=exchange&id='.$rid?>", // 兑换奖品
            SHARE_IMG: '<?php  echo $_W['siteroot'];?>addons/ewei_money/style/img/ico_large.png',//分享图片
            SHARE_URL: "<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&m=ewei_money&do=index&id=<?php  echo $rid;?>",//分享链接地址
            SHATE_CALLBACK: "<?php echo './index.php?i='.$_W['uniacid'].'&c=entry&m=ewei_money&do=share&id='.$rid?>",//分享回调
            ICON_CURR_LOGO: '../addons/ewei_money/style/img/curr_logo.png' // 货币图标logo
        };
     
        
        // 如果只有一个货币，复制一个，否则快速滑动时，无效果！
        if ( APP.currency.length == 1) {
            APP.currency[0].p = 50;
            APP.currency[1] = APP.currency[0];
        }

        // 按金额百分比降序
        APP.currency.sort(function(a, b) {
            return b.p - a.p;
        });

        /* 游戏初始化 */
        var stage, loader, game;

        $(function() {
            init();
        });

        function init(){

         var manifest = [
                // 启动
                {src: "../addons/ewei_money/style/img/splash.png", id: "splash"},
                {src: "../addons/ewei_money/style/img/splashtitle.png", id: "splashtitle"},
                {src: "../addons/ewei_money/style/img/starttip.png", id: "starttip"},
                // 金额和倒计时
                {src: "../addons/ewei_money/style/img/tmbg.png", id: "tmbg"},
                {src: "../addons/ewei_money/style/img/tmicon.png", id: "tmicon"},
                // 飘落货币
                {src: APP.ICON_CURR_LOGO, id: "currLogo"},
                {src: "../addons/ewei_money/style/img/mb1000.png", id: "mb1000"},
                // 引导页
                {src: "../addons/ewei_money/style/img/share.png", id: "share"},
                {src: "../addons/ewei_money/style/img/follow.png", id: "follow"},
                // 券
                {src: "../addons/ewei_money/style/img/ticket_empty_title.png", id: "ticketEmpty"},
                {src: "../addons/ewei_money/style/img/line_arrow.png", id: "lineArrow"}
            ];

            var currArr = APP.currency || [],
                curr;
            // 动态加载货币
            for (var i=0,len=currArr.length; i<len; i++) {
                curr = currArr[i];
                if (curr) {
                    manifest.push({src: "../addons/ewei_money/style/img/mb" + (curr.v*10) + '.png', id: "mb"+ i});
                    manifest.push({src: "../addons/ewei_money/style/img/d" + (curr.v*10) +".png", id: "d"+ i});
                    manifest.push({src: "../addons/ewei_money/style/img/m" + (curr.v*10) +".png", id: "m"+ i});
                }
            }

            var oResWrap = document.getElementById("staticRes");
            var aImgTag = [], res;
            for (i=0,len=manifest.length; i<len; i++) {
                res = manifest[i];
                aImgTag.push('<img src="'+ res.src +'" id="'+ res.id +'" crossOrigin="Anonymous">');
            }

            oResWrap.innerHTML = aImgTag.join('');

            loader = {};
            for (i=0,len=manifest.length; i<len; i++) {
                res = manifest[i];
                loader[res.id] = document.getElementById(res.id);
            }
            hideloading();
        }
    </script>
    <script type="text/javascript" src="../addons/ewei_money/style/js/createjs-2013.12.12.min.js"></script>
    <script type="text/javascript" src="../addons/ewei_money/style/js/game.js"></script>
    <script type="text/javascript">
        function handleComplete() {

            var queue = new createjs.LoadQueue(false);
            queue.setMaxConnections(<?php  echo $reply['play_times'];?>);
            queue.installPlugin(createjs.Sound);
            queue.loadFile({src: "../addons/ewei_money/style/mp3/count.mp3", id: "count"});

            stage = new createjs.Stage("gameCanvas");
            createjs.Touch.enable(stage, true);
            createjs.Ticker.setFPS(60);

            game = new lib.Game(stage, loader);
            createjs.Ticker.on("tick", stage);
        }

        window.onload = handleComplete;
    </script>
<div class="game-frame">
    <canvas id="gameCanvas">
        Your browser not support for html5, please change one.
    </canvas>

    <div id="staticRes"></div>

    <!--底部TabBar-->
    <div id="bottomBar">
        <div class="bar-wrap">
            <ul>
                <li seed="1">
                    <a class="bar-item" href="javascript:;"><img src="../addons/ewei_money/style/img/bt2.png">富豪榜</a>
                </li>
                <li seed="2">
                    <a class="bar-item" href="javascript:;"><img src="../addons/ewei_money/style/img/bt3.png">大金库</a>
                </li>
                <li class="start" seed="3">
                    <a class="bar-start" href="javascript:;"><img src="../addons/ewei_money/style/img/startgame.png" width="114" height="74"></a>
                </li>
                <li seed="4">
                    <a class="bar-item" href="javascript:;"><img src="../addons/ewei_money/style/img/bt1.png">规则</a>
                </li>
                <li seed="5">
	 <a class="bar-item" href="<?php  echo $reply['homeurl'];?>" target="_blank"><img src="../addons/ewei_money/style/img/bt4.png"><?php  echo $reply['homename'];?></a>
	 </li>
            </ul>
        </div>
    </div>

    <!--领取页面-->
    <div id="getFrame" class="popup-frame">
        <div class='popup-wrap'>
            <h1 class="frame-title get-title"></h1>
            <span id="J_GetClose" class="frame-close"></span>
            <p class="get-sum" id="J_UserSum">￥0</p>
            <p class="get-txt">人类已经无法阻止你成为土豪了，赶紧【领取】现金券，查看你的大金库吧！</p>
            <div class="get-score">
                <label class="score-lt">最佳成绩：<span id="J_UserMax">￥0</span></label>
                <label class="score-rt">当前排名：<span id="J_UserRank">0位</span></label>
            </div>
            <div id="J_BottomBtn" class="bottom-btn">
                <div class="btn-wrap"><button id="J_Follow" class="btn green-btn" type="button">关注</button></div>
                <div class="btn-wrap"><button id="J_Share" class="btn" type="button">邀请挑战</button></div>
                <div class="btn-wrap"><button id="J_Get" class="btn" type="button">领取</button></div>
            </div>
        </div>
    </div>

    <!--注册页面: 除“昵称”字段外，其他字段根据后台配置动态显示-->
    <div id="regFrame" class="popup-frame">
        <input type="hidden" name="openid" value="<?php  echo $openid;?>" class='frame-input'/>
        <div class='popup-wrap'>
            <!-- 游戏前注册 -->
                        <div class="input-wrap">

                                <h1 class="frame-title score-title"></h1>
                                <!-- 游戏前注册 -->
                                <div class="field">
                    <input id="J_Name" class='frame-input' type="text" value="<?php  echo $fans['nickname'];?>" name="nick" placeholder='昵称' required/>
                </div>
                                                                                                                    <div class="field">
                        <input id="J_Mobile" class='frame-input' type="tel" name="mobile" value="<?php  echo $fans['mobile'];?>" placeholder='手机号' required/>
                    </div>
                                                </div>
            <div class="bottom-btn">
                                <div class="btn-wrap"><button id="J_CancelScore" class="btn green-btn" type="button">不需要</button></div>
                <div class="btn-wrap"><button id="J_SaveScore" class="btn" type="button">提交</button></div>
                                <!-- 游戏前注册 -->
                            </div>
        </div>
    </div>

    <!--兑换页面-->
    <div id="exchangeFrame" class="popup-frame">
        <div class='popup-wrap'>
            <h1 class="frame-title exchange-title"></h1>
            <div class="field">
                <input id="J_SN" class='frame-input' type="text" name="sn" placeholder='兑换密码' required/>
            </div>
            <div class="bottom-btn">
                <div class="btn-wrap"><button id="J_ExchangeNo" class="btn green-btn" type="button">取消</button></div>
                <div class="btn-wrap"><button id="J_ExchangeYes" class="btn" type="button">确定</button></div>
            </div>
        </div>
    </div>

    <!--提示页面-->
    <div id="tooltipFrame" class="popup-frame">
        <div class='popup-wrap'>
            <h1 class="frame-title-text" id="J_TipTitle"></h1>
            <div class="bottom-btn">
                <div class="btn-wrap"><button id="J_TipYes" class="btn" type="button">我知道了</button></div>
            </div>
        </div>
    </div>

    <!--规则页面-->
    <div id="ruleFrame" class="tab-frame" style="display:none;">
        <div class="tab-wrap">
            <dl id="J_TimesDesc">
                <dt>游戏次数</dt>
                <dd>游戏总次数：<span id="J_UsedAllTimes" class="num"></span>/<span id="J_AllTimes" class="num"></span>次</dd>
                <dd>今天可玩游戏次数：<span id="J_UsedDayTimes" class="num"></span>/<span id="J_DayTimes" class="num"></span>次</dd>
            </dl>
            <dl>
                <dt>活动时间</dt>
                <dd id="J_GameExpires"></dd>
            </dl>
            <dl>
                <dt>活动规则</dt>
                <dd id="J_GameRule"></dd>
            </dl>
            <dl>
                <dt>兑奖说明</dt>
                <dd id="J_ExchangeDesc"></dd>
            </dl>
        </div>
    </div>

    <!--富豪榜页面-->
    <div id="rankFrame" class="tab-frame" data-role="rankPage">
        <div class="tab-wrap">
            <div class="tab-inner">
                <h1 class="rank-title">富豪榜</h1>
                <table class="rank-table" id="J_RankTable">
                    <thead><tr><th>排名</th><th>昵称</th><th>金额</th></tr></thead>
                    <tbody></tbody>
                </table>
                <div class="loading"></div>
            </div>
        </div>
    </div>

    <!--大金库页面-->
    <div id="ticketFrame" class="tab-frame" data-role="ticketPage">
        <div class="tab-wrap">
            <div class="tab-inner">
                <h1 class="ticket-title">您还可再领<span class="num" id="J_RemainTicket">0</span>张现金券</h1>
                <ul class="ticket-list" id="J_TicketList">
                </ul>
                <div class="loading"></div>
            </div>
        </div>
    </div>
    <!--加载提示-->
    <div id="J_Loading" class="ajax-loading"><span>加载中...</span></div>
</div>
  
<script language="javascript">
    
              wx.config({
                debug:false,
                appId: "<?php  echo $appIdShare;?>",
                timestamp: <?php echo empty($signPackage["timestamp"])?0:$signPackage["timestamp"]?>,
                nonceStr: '<?php  echo $signPackage["nonceStr"];?>',
                signature: '<?php  echo $signPackage["signature"];?>',
                jsApiList: [
                  'onMenuShareTimeline','onMenuShareAppMessage','onMenuShareWeibo'
                ]
              });
</script>

<script type="text/javascript" src="../addons/ewei_money/style/js/game.base.js"></script>
        		<div mark="stat_code" style="width:0px; height:0px; display:none;">
					</div>
	</body>

</html>