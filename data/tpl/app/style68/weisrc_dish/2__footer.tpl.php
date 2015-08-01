<?php defined('IN_IA') or exit('Access Denied');?><style>
    .header { padding: 5px 0; display: block; position: fixed; width: 100%; z-index: 3; bottom: 48px; color: #F03C03; background-color:#fff; line-height: 32px; font-size: 14px;border-top: 1px solid #E2E2E2; }
    .header .left { float: left;margin-left: 10px }
    .header .right { float: right;margin-right: 10px }
    .footermenu {
        position: relative;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 900;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    }
    .footermenu ul {
        position: fixed;
        z-index: 900;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        display: block;
        width: 100%;
        height: 48px;
        display: -webkit-box;
        display: box;
        -webkit-box-orient: horizontal;
        background-color: #282f35;
        background: -webkit-linear-gradient(top,#282f35,#282f35);

        background:#5ac5d4;
        border-top: 1px solid #5ac5d4;
        /*border-top: 1px solid #404a54;*/
    }
    .footermenu ul li {
        width: auto!important;
        height: 100%;
        position: static!important;
        margin: 0;
        border-radius: 0!important;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-box-flex: 1;
        box-flex: 1;
        -webkit-box-sizing: border-box;
        box-shadow: none!important;
        background: none;
    }                                                                                            w

    .footermenu ul li img {
        vertical-align: bottom;
    }

    .footermenu ul li a {
        color: #fff;
        text-align: center;
        display: block;
        text-decoration: none;
        padding-top: 2px;
        font-size: 12px;
        position: relative;
        height: 46px;
        text-shadow: 0 1px rgba(0, 0, 0, 0.2);
        line-height: 20px;
    }
    .footermenu ul li a.active {
        /*background: -webkit-linear-gradient(top,#404a54,#252c34);*/
        background: -webkit-linear-gradient(top,#5ac5d4,#5ac5d4);
        box-shadow: 0 -10px 25px 0px rgba(0,0,0,0.3) inset;
    }
    .xhlbtn {
        display: block;
        text-align: center;
        /*background-color: #F03C03;*/
        background-color: #fdb338;
        /*background-color: #5ac5d4;*/
        padding: 0 15px;
        border-radius: 3px;
        color: #fff;
        font-weight: bold;
    }
    img {
        width: 24px;
        height: 24px;
        vertical-align: middle;
    }
</style>
<div class="footermenu">
    <ul>
        <?php  if($do != 'rest') { ?>
        <li>
            <a <?php  if($do=='list') { ?>class="active"<?php  } ?> href="<?php  echo $this->createMobileurl('waplist', array('from_user' => $page_from_user, 'storeid' => $storeid, 'isdelivery' => $this->_isdelivery), true)?>">
                <img src="../addons/weisrc_dish/template/images/menu.png">
                <p>菜单</p>
            </a>
        </li>
        <?php  if(!empty($intelligents)) { ?>
        <li>
            <a href="<?php  echo $this->createMobileurl('wapselect', array('from_user' => $page_from_user, 'storeid' => $storeid), true)?>">
                <img src="../addons/weisrc_dish/template/images/store.png">
                <p>智能点餐</p>
            </a>
        </li>
        <?php  } ?>
        <li>
            <a <?php  if($do=='menu') { ?>class="active"<?php  } ?> href="<?php  echo $this->createMobileurl('wapmenu', array('from_user' => $page_from_user, 'storeid' => $storeid, 'isdelivery' => $this->_isdelivery), true)?>">
                <!--<span class="num" id="cartN2">0</span>-->
                <img src="../addons/weisrc_dish/template/images/cart.png">
                <p>购物车</p>
            </a>
        </li>
        <li>
            <a <?php  if($do=='order') { ?>class="active"<?php  } ?> href="<?php  echo $this->createMobileurl('orderlist', array('from_user' => $page_from_user, 'storeid' => $storeid, 'isdelivery' => $this->_isdelivery), true)?>">
                <img src="../addons/weisrc_dish/template/images/order.png">
                <p>订单</p>
            </a>
        </li>
        <li>
            <a <?php  if($do=='rest') { ?>class="active"<?php  } ?> href="<?php  echo $this->createMobileurl('waprestlist', array('from_user' => $page_from_user, 'storeid' => $storeid, 'isdelivery' => $this->_isdelivery), true)?>">
            <img src="../addons/weisrc_dish/template/images/home.png">
            <p>门店</p>
            </a>
        </li>
        <?php  } ?>
    </ul>
</div>