<?php defined('IN_IA') or exit('Access Denied');?><?php  if(is_array($list)) { foreach($list as $row) { ?>
<li style="">
	<a href="<?php  echo toimage($row['attachment'])?>">
		<img src="<?php  echo toimage($row['attachment'])?>" alt="<?php  echo $row['title'];?>">
	</a>
</li>
<?php  } } ?>
