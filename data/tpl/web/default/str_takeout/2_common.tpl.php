<?php defined('IN_IA') or exit('Access Denied');?><script>
	function cron() {
		$.post("<?php  echo $this->createWebUrl('cron');?>", function(){
			setTimeout(cron, 120000);
		});
	}
	$(function(){
		cron();
	});
</script>
