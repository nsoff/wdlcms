<?php defined('IN_IA') or exit('Access Denied');?><script type="text/javascript" src="../addons/scene_cube/style/src/WeixinApi.js" ></script>	<!--微信分享统计 -->
<script>
WeixinApi.ready(function(Api){
    // 微信分享的数据
    var wxData = {
        "imgUrl":"<?php  echo toimage($list['share_thumb'])?>",
        "link":document.URL,
        "desc":"<?php  echo $list['share_content'];?>",
        "title":"<?php  echo $list['share_title'];?>"
    };
    // 分享的回调
    var wxCallbacks = {
        // 分享成功
        confirm:function (resp) {
            //var self = this;
            $.get("<?php  echo $this->createMobileurl('share',array('id'=>$id));?>",function(responseData){
                //alert('aaa');
            });
        },
		// 整个分享过程结束
		all : function(resp,shareTo) {
			// 如果你做的是一个鼓励用户进行分享的产品，在这里是不是可以给用户一些反馈了？
			alert("分享" + (shareTo ? "到" + shareTo : "") + "结束，感谢您的分享");
		}
    };
    Api.shareToFriend(wxData, wxCallbacks);
    Api.shareToTimeline(wxData, wxCallbacks);
    Api.shareToWeibo(wxData, wxCallbacks);
	// iOS上，可以直接调用这个API进行分享，一句话搞定
	Api.generalShare(wxData,wxCallbacks);
});
</script>
<div style="display:none"><?php  echo htmlspecialchars_decode($list['tongji'])?></div>