<?php defined('IN_IA') or exit('Access Denied');?><table class="table table-hover" style="min-width: 600px;">
	<tbody>
		<?php  if(is_array($ds)) { foreach($ds as $item) { ?>
		<tr>
			<td title="<?php  echo $item['title'];?>"><?php  echo $item['title'];?></td>
			<td style="width:80px;"><a href="javascript:;" onclick='select_entry(<?php  echo json_encode($item['entry']);?>)'>添加</a></td>
		</tr>
		<?php  } } ?>
	</tbody>
</table>
