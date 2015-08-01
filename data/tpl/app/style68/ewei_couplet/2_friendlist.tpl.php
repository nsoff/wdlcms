<?php defined('IN_IA') or exit('Access Denied');?><?php  if(is_array($list)) { foreach($list as $row) { ?>
<p class='item'><img src="<?php  echo $row['headurl'];?>" alt=""> <span><?php  echo $row['desc'];?></span></p>
<?php  } } ?>