<?php defined('IN_IA') or exit('Access Denied');?><script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
	// jssdk config 对象
	jssdkconfig = <?php  echo json_encode($_W['account']['jssdkconfig']);?> || { jsApiList:[] };
	
	// 是否启用调试
	// jssdkconfig.debug = true;
	
	// 已经注册了 jssdk 文档中所有的接口
	jssdkconfig.jsApiList = [
		'checkJsApi',
		'onMenuShareTimeline',
		'onMenuShareAppMessage',
		'onMenuShareQQ',
		'onMenuShareWeibo',
		'showOptionMenu',		
	];
	
	wx.config(jssdkconfig);

	sharedata = {
		title : "<?php  echo $reply['sharetitle'];?>",
		link : "<?php  echo $shareurl;?>",
		desc : "<?php  echo $reply['sharecontent'];?>",
		imgUrl :"<?php  echo $picture;?>"
	};
	
	wx.ready(function () {
		wx.showOptionMenu();
		wx.onMenuShareAppMessage(sharedata);
		wx.onMenuShareTimeline(sharedata);
		wx.onMenuShareQQ(sharedata);
		wx.onMenuShareWeibo(sharedata);
	});
</script>