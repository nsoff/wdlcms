<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>红包提现</title>
    <meta name="format-detection" content="telephone=no"/>
    <link rel="stylesheet" type="text/css" href="<?php  echo $resroot;?>details.css"/>
</head>
<body>
<div class="dj-base-wrap">
    <header>
        <p>提现申请（必须关注后）</b>
        </p>
    </header>

    <div class="content">
        <h2 id="activityName"></h2>

        <p>红包总额：
            <b id="amount"><?php  echo $fans['points_current'];?>元</b>
        </p>

        <p class="times_right">
            <?php  echo $reply['points'];?> 元起可以申请提现,
        </p>
        <ul class="list-form">
            <li>
                收款姓名：<input type="text" id="name" value="<?php  echo $fans['realname'];?>"/>
            </li>
            <li>
                手机号码：<input type="tel" id="mobile"  value="<?php  echo $fans['mobile'];?>"/>
            </li>
            <li>
                提现方式：
                <select name="withdrawType" id="withdrawType">
                    <option value="1" <?php  if($fans['paytype']==1) { ?>selected<?php  } ?>>支付宝</option>
                    <option value="2" <?php  if($fans['paytype']==2) { ?>selected<?php  } ?>>银行卡</option>
                </select>
            </li>
            <li>
                打款账号：<input  type="text" id="payAccount" value="<?php  echo $fans['account'];?>"/>
            </li>
            <li>
                确认账号：<input  type="text" id="rePayAccount"/>
            </li>
           <li class="textarea" <?php  if(empty($fans['paytype']) || $fans['paytype']==1) { ?>style="display: none;"<?php  } ?>>
                <label for=""> 开户行信息：</label>
                <textarea id="bankName"><?php  echo $fans['bank'];?></textarea>
            </li>
        </ul>
        <div class="wrap_btn">
            <span><input type="number" id="money">元</span>
            <a href="javascript:" class="btn <?php  if($fans['points_current']<$reply['points'] || $followed) { ?>disabled<?php  } ?> " id="subBtn">提现</a> <!-- 达到提现的条件则去掉class="disabled" -->
        </div>
    </div> 

    <a class="footer" href="<?php  echo $this->createMobileUrl('mylist',array('openid'=>$openid,'id'=>$id))?>">返回红包列表</a>

</div>
<script type="text/javascript" src="<?php  echo $resroot;?>jquery.js"></script>
<script type="application/javascript" src="<?php  echo $resroot;?>fastclick.js"></script>
<script type="text/javascript">
$(function(){
    FastClick.attach(document.body);
});
</script>
<script type="text/javascript" src="<?php  echo $resroot;?>ajax-loading.js?v=2"></script>
<script type="text/javascript" src="<?php  echo $resroot;?>alert.js"></script>
<script type="text/javascript">
    var maxMoney = <?php  echo $fans['points_current'];?> ;
    $(function () {
        $("#withdrawType").change(function () {
            var withdrawType = $("#withdrawType").val();
            if (withdrawType == '1') {
                $(".textarea").css("display", "none");
            } else {
                $(".textarea").css("display", "block");
            }
        });


        $("#subBtn").click(function () {
            var money = $("#money").val();
            if (!/^-?\d+\.?\d{0,2}$/.test(money)) {
                showMsg({"msg": "请输入正确金额"})
                return;
            }
            if(money > maxMoney){
                showMsg({"msg": "输入金额超过红包最大额度"})
                return;
            }

            if ($("#name").val() == "") {
                showMsg({"msg": "请填写姓名"})
                return;
            }
            if ($("#mobile").val() == "") {
                showMsg({"msg": "请输入手机号码"})
                return;
            }
            if ($("#payAccount").val() == "") {
                showMsg({"msg": "请输入账号信息"})
                return;
            }
            if ($("#rePayAccount").val() == "") {
                showMsg({"msg": "请输入确认信息"})
                return;
            }
            if ($("#rePayAccount").val() != $("#payAccount").val()) {
                showMsg({"msg": "确认账号错误"})
                $("#rePayAccount").val("");
                return;
            }
            var bankName = $("#bankName").val();
            if (bankName == null || bankName == "") {
                bankName = "";
            }

            // Ajax 请求
            $.ajax({
                url: "<?php  echo $this->createMobileUrl('tixian')?>",     // URL 链接
                async: false,                               // 异步请求
                data: {
                    "id":"<?php  echo $id;?>",
                    "openid":"<?php  echo $openid;?>",
                    "realname": $("#name").val(),        // 请求的数据
                    "mobile": $("#mobile").val(),
                    "paytype": $("#withdrawType").val(),
                    "bank": bankName,
                    "points": $("#money").val(),
                    "account": $("#payAccount").val()},
                type: "post",                               // 请求 POST
                dataType:"json",
                success: function (jsonData) {              // 成功回调
                    if (!jsonData.success) {
                        showMsg({msg: jsonData.message});
                        return;
                    }
                    showMsg({msg: "申请成功,请等待审核"});
                    setTimeout(function () {
                        window.history.back(-1);
                    }, 1500);
                }
            });

        });
    });
</script>
</body>
</html>
