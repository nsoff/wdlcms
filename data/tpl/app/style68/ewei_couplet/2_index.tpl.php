<?php defined('IN_IA') or exit('Access Denied');?>
<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;">
<title><?php  echo $reply['title'];?></title>
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="../addons/ewei_couplet/style/couplet.css">
<script src="../addons/ewei_couplet/style/jquery.js"></script>
<script src="../addons/ewei_couplet/style/couplet.js?v=<?php echo TIMESTAMP;?>"></script>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>	
<style type="text/css">
    body {
        <?php  if(!empty($reply['bgcolor'])) { ?>
        background: <?php  echo $reply['bgcolor'];?>;
        <?php  } ?>
    }
    <?php  if(!empty($reply['res_img1'])) { ?>
      .step2:before,.step3:before {
        background: url(<?php  echo tomedia($reply['res_img1'])?>) no-repeat 50% 0;
        background-repeat: no-repeat;background-size: 320px auto;
      }
   <?php  } ?>
   
     <?php  if(!empty($reply['res_img2'])) { ?>
       .step1 .form li,.step2:after,.step3:after,.step2 .door,.dialog,.dialog:after
        background: url(<?php  echo tomedia($reply['res_img2'])?>) no-repeat 50% 0;
      }
   <?php  } ?>
       
</style>
</head>
<body>
    <!-- 个人页面板 -->
    <div class="step2">
        <a href="javascript:;" id="toRule" class="btn_rule" onclick="couplet.showRule(true)">活动规则 &gt;</a>
        <p class="count">已有<span id="totalnum"><?php  echo $joincount;?></span>人参与</p>
        <div class="gg">
            <p>公告: <?php  echo $gonggao;?></p>
        </div>
        <div class="door">
            <div id="mycouplet" class="couplet">
                <div class="top">
                
                     <i class='f'><?php  echo $this->cut_str($reply['toptext'],1,0)?></i>
                      <i class='f'><?php  echo $this->cut_str($reply['toptext'],1,1)?></i>
                       <i class='f'><?php  echo $this->cut_str($reply['toptext'],1,2)?></i>
                        <i class='f'><?php  echo $this->cut_str($reply['toptext'],1,3)?></i>
                </div>
                <div class="left">
                    <?php  if(is_array($uptext)) { foreach($uptext as $ut) { ?>
                    <i class='f'><?php  echo $ut['char'];?></i>
                    <?php  } } ?>
                </div>
                <div class="right">
                    <?php  if(is_array($downtext)) { foreach($downtext as $key => $dt) { ?>
                    <i class='f f0 f<?php  echo $key +1?>'>
                        <?php  if(!empty($dt['bingo'])) { ?>
                        <?php  echo $dt['char'];?>
                        <?php  } ?>
                        
                    </i>
                    <?php  } } ?>
                    
                </div>
            </div>
        </div>
        <div class="action">
            
            <div class="do">
                <?php  if(!empty($fromfans) && $fromopenid!=$openid) { ?>
                
                  
                
                    <?php  if(empty($help)) { ?>
                    <p class="tips"><span id="nickname" class="num"><?php  echo $fromfans['nickname'];?></span>的下联已凑齐<span id="haved" class="num"><?php  echo $num;?></span>个字，还差<span id="rest" class="num"><?php  echo 7-$num?></span>个字<br>点击下方抽签罐帮TA抽字吧~</p>
                    <a id="doHelp" href="javascript:;" onclick="this.className='on'"><i></i><s></s><b></b></a>
                    <div class="an_tips"></div>
                    <?php  } else { ?>
                    <p class="tips"><?php  echo $help['desc'];?></p>  
                    <p>&nbsp;</p>
                    <?php  } ?>
                <?php  } ?>
            </div>
 
            <div class="form" >
                <?php  if(empty($fans)) { ?>
                <a id="metoo" href="javascript:;" class="btn_submit btn_important">我也要免费领取<?php  echo $reply['award_name'];?></a>
                <?php  } else { ?>
                    <?php  if($num>=7) { ?>
                       <?php  if(!empty($fans['log'])) { ?>
                        <a id="youtoo" href="javascript:;" class="btn_submit btn_important">邀请好友也玩 免费领取<?php  echo $reply['award_name'];?></a>
                        <p class="tips">
                            <?php  if($fans['status']==1) { ?>
                              您已经登记信息，请等待工作人员与您联系！
                            <?php  } else if($fans['status']==2) { ?>
                             恭喜您，您已经免费获得了 <?php  echo $reply['award_name'];?> !
                             <?php  } ?>
                        </p>
                       <?php  } else { ?>
                       <a id="meaward" href="javascript:;" class="btn_submit btn_important">登记信息 免费领取<?php  echo $reply['award_name'];?></a>
                       <p class="tips">您的下联已凑齐了，登记信息进行领奖.</p>
                       <?php  } ?>
                    <?php  } else { ?>
                    <a id="youtoo" href="javascript:;" class="btn_submit btn_important">邀请好友对下联 免费领取<?php  echo $reply['award_name'];?></a>
                     <p class="tips">您的下联已凑齐<span class="num"><?php  echo $num;?></span>个字, 还差 <span class="num"><?php  echo 7-$num?></span>个字.</p>
                    <?php  } ?>
                <?php  } ?>
            </div>
          
              
            <dl class="fans">
                <dt><em>好友帮忙列表</em></dt>
                <dd id="friendList" style='padding:5px;'></dd>
                <dd id="friendMore" style='width:100%;text-align:center;padding:10px;display:none' >
                    <a id='more_helpers' href='javascript:;' style='color:#fff' class='btn-submit'>获取更多帮助的好友</a>
                </dd>
            </dl>
        </div>
    </div>
    
    <div class="brand">
        <dl>
            <dt><em>@<?php  if(empty($reply['copyright'])) { ?><?php  echo $_W['account']['name'];?><?php  } else { ?><?php  echo $reply['copyright'];?><?php  } ?></em></dt>
        </dl>
        <span style='float:right'>
          <a href='<?php  echo $this->createMobileUrl('jubao')?>' style="color:white">举报
         </span>
        <p>&nbsp;</p>
    </div>
    
    <div id="dialog" class="dialog" style="margin-top:-195px;">
        <a href="javascript:;"  class="close">X</a>
        <div class="dialog_submit">
            <h3>您已成功提交信息，请耐心等候</h3>
            <a href="javascript:;" class="btn_submit">确认</a>
        </div>
    </div>
    <!-- 规则弹窗 -->
    <div id="ruleDialog" class="dialog" style="margin-top:-195px;">
        <a href="javascript:;" class="close">X</a>
        <div class="dialog_rule">
            <h3>活动规则：</h3>
            <ol id="rule_cont">
                <?php  echo $reply['detail'];?>
            </ol>
        </div>
    </div>
    <div id="infoDialog" class="dialog"  style="margin-top:-195px;">
        <a href="javascript:;" class="close">X</a>
        <div class="dialog_rule">
            <h3>信息登记 </h3>
            <table>
                <tr>
                    <td>真实姓名:</td>
                    <td><input type='text' id="realname" /></td>
                </tr>
                <tr>
                    <td>手机号码:</td>
                    <td><input type='tel' id="mobile" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>无效信息，无法领奖,请认真填写! </td>
                </tr>
            </table>
             <a href="javascript:;" class="btn_submit">提交信息</a>
        </div>
    </div>
    
    <div id="loading" class="dialog_loading" style="display:none">
      <i class="dialog_loading_icon"></i>
    </div>
    <!-- 显示添加class active -->
    <div id="shareTips" class="mod_sharetips">
        <p>点击右上角，<br>分享到【朋友圈】或发送给微信好友</p>
    </div>
    <div class="dialog_mask" style="display: none"></div>
    
<script type="text/javascript">
 
         wx.config({
                debug:false,
                appId: "<?php  echo $appIdShare;?>",
                timestamp: <?php  if(empty($package["timestamp"])) { ?>0<?php  } else { ?><?php  echo $package["timestamp"];?><?php  } ?>,
                nonceStr: '<?php  echo $package["nonceStr"];?>',
                signature: '<?php  echo $package["signature"];?>',
                jsApiList: [
                  'onMenuShareTimeline','onMenuShareAppMessage','onMenuShareWeibo'
                ]
              });
      

     $(function(){
 
         couplet.init({ 
             baseUrl:"<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&m=ewei_couplet&id=<?php  echo $id;?>&do=method",
             openid: "<?php  echo $openid;?>",
             nickname: "<?php  echo $nickname;?>",
             fromopenid:"<?php  echo $fromopenid;?>",
             fromnickname: "<?php  echo $fromfans['nickname'];?>",
             followed: <?php echo $followed?'true':'false'?>,
             hasOther:<?php echo $hasOther?'true':'false'?>,
             needHelpers:<?php echo $needHelpers?'true':'false'?>,
             shareMeta:{
                 title: "<?php  echo $sharetitle;?>",
                 desc: "<?php  echo $sharedesc;?>",
                 link: "<?php  echo $sharelink;?>",
                 imgUrl: "<?php  echo $_W['siteroot'];?>addons/ewei_couplet/icon.jpg"
             }
        });
        
     });
     
                
      wx.ready(function(){ 
            wx.onMenuShareTimeline(couplet.shareMeta);
            wx.onMenuShareAppMessage(couplet.shareMeta);
            wx.onMenuShareWeibo(couplet.shareMeta);
      });
</script>
 
</body>
</html>
