<?php defined('IN_IA') or exit('Access Denied');?><div class="header">
    <input type="hidden" id="totalprice" value="<?php  echo $totalprice;?>" name="totalprice">
    <input type="hidden" id="totalcount" value="<?php  echo $totalcount;?>" name="totalcount">
    <div class="left">已选：<span id="cartN"><span id="totalcountshow"><?php  echo $totalcount;?></span>份　总计：￥<span id="totalpriceshow"><?php  echo $totalprice;?></span></span>元</div>
    <div class="right"><a class="xhlbtn" href="<?php  echo $this->createMobileurl('wapmenu', array('from_user' => $from_user, 'storeid' => $storeid), true)?>" style="color: #fff;">选好了</a></div>
</div>