<?php defined('IN_IA') or exit('Access Denied');?>
<style type="text/css">

.red {float:left;color:red}

.white{float:left;color:#fff}



.tooltipbox {

	background:#fef8dd;border:1px solid #c40808; position:absolute; left:0;top:0; text-align:center;height:20px;

	color:#c40808;padding:2px 5px 1px 5px; border-radius:3px;z-index:1000;

}

.red { float:left;color:red}

</style>

<script language='javascript'>

    function fetchChildCategory(cid) {

	var html = '<option value="0">请选择菜系</option>';

	if (!category || !category[cid]) {

		$('#cate_2').html(html);

		return false;

	}

	for (i in category[cid]) {

		html += '<option value="'+category[cid][i][0]+'">'+category[cid][i][1]+'</option>';

	}

	$('#cate_2').html(html);

}

    </script>