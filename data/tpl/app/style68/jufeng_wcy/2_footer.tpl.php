<?php defined('IN_IA') or exit('Access Denied');?>		<?php  if(empty($footer_off)) { ?>
			<div class="text-center footer" style="margin:10px 0 80px 0; width:100%; text-align:center; word-break:break-all;">
				<?php  if(!empty($_W['page']['footer'])) { ?>
					<?php  echo $_W['page']['footer'];?>
				<?php  } else { ?>
					<a href="<?php  echo url('mc');?>"><?php  load()->model('account');$account = uni_fetch();?><?php  echo $account['name'];?></a>
				<?php  } ?>
				&nbsp;&nbsp;<?php  echo $_W['setting']['copyright']['statcode'];?>
			</div>
		<?php  } ?>
		<?php  if(!empty($_W['quickmenu']['menus']) && empty($_W['quickmenu']['disabled'])) { ?>
			<?php  include_once template($_W['quickmenu']['template'], TEMPLATE_INCLUDEPATH);?>
		<?php  } ?>
		<script>require(['bootstrap']);</script>
	</div>
	<style>
		h5{color:#555;}
		a{color:#555;}
	</style>
	<script type="text/javascript">
		//对分享时的数据处理
		function _removeHTMLTag(str) {
			str = str.replace(/<script[^>]*?>[\s\S]*?<\/script>/g,'');
			str = str.replace(/<style[^>]*?>[\s\S]*?<\/style>/g,'');
			str = str.replace(/<\/?[^>]*>/g,'');
			str = str.replace(/\s+/g,'');
			str = str.replace(/&nbsp;/ig,'');
			return str;
		}
				
		require(['WeixinApi','jquery'], function(WeixinApi, $){
			<?php
				$_share['title'] = !empty($_share['title']) ? $_share['title'] : $_W['account']['name'];
				$_share['link'] = !empty($_share['link']) ? $_share['link'] : 'http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '&u=' . $_W['member']['uid']. '&wxref=mp.weixin.qq.com';
			?>
			//图片地址
			<?php  if(!empty($_share['imgUrl'])) { ?> 
				var _share_img = "<?php  echo $_share['imgUrl'];?>";
				if(_share_img.indexOf("http://") == -1 && _share_img.indexOf("https://") == -1 ) _share_img = "<?php  echo $_W['attachurl'];?>" + _share_img;
			<?php  } else { ?>
				var _share_img = $('body img:eq(0)').attr("src");
				if(typeof(_share_img) == "undefined") _share_img = "<?php  echo $_share['imgUrl'];?>";
				if(_share_img.indexOf("http://") == -1 && _share_img.indexOf("https://") == -1 ) _share_img = "<?php  echo $_W['attachurl'];?>" + _share_img;
			<?php  } ?>
			//分享内容
				var _share_content = "<?php  echo $_W['account']['name'];?>" + "，在线订餐，享受生活。";

			WeixinApi.ready(function(Api) {
				// 微信分享的数据
				var wxData = {
					"appId": "", // 服务号可以填写appId
					"imgUrl" : _share_img,
					"link" : "<?php  echo $_share['link'];?>",
					"desc" : _share_content,
					"title" : "<?php  echo $_share['title'];?>"
				};
				if(window.sharedata && window.sharedata['link']){
					wxData['appId'] = window.sharedata['appId'];
					wxData['imgUrl'] = window.sharedata['imgUrl'];
					wxData['link'] = window.sharedata['link'];
					wxData['desc'] = window.sharedata['desc'];
					wxData['title'] = window.sharedata['title'];
				}
				var wxCallbacks = {
					confirm : function(resp) {
						// todo: 
						if(window['onshared'] && typeof(window['onshared']) == 'function'){
							window['onshared']();
						}
					}
				};
				Api.shareToFriend(wxData, wxCallbacks);
				Api.shareToTimeline(wxData, wxCallbacks);
				Api.shareToWeibo(wxData, wxCallbacks);
				Api.generalShare(wxData,wxCallbacks);
			});
		});
	</script>
</body>
</html>
