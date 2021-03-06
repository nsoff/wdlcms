<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
<?php 
if (empty($_W['styles']['listtype'])) {
	$_W['styles']['listtype'] = 1;
}
?>
<script type='text/javascript' src='resource/js/lib/jquery-1.11.1.min.js'></script>
<link rel="stylesheet" type="text/css" href="../addons/we7_album/template/mobile/photo.mobile.css" media="all" />
<link rel="stylesheet" type="text/css" href="../addons/we7_album/template/mobile/photoswipe.mobile.css" media="all" />
<style>
<?php  if($_W['styles']['listtype'] == 2) { ?>
/* 双排 class="album2" */
.gallery{overflow:hidden;}
#gallery li{display:inline-block;width:50%;-webkit-box-sizing:border-box;float:left;border-radius:0;background:none;padding:5px;border:0;box-shadow:none;}
#gallery li a{display:block;background-color: #ffffff;border: 1px solid #ffffff;-moz-border-radius: 2px;-webkit-border-radius: 2px;border-radius: 2px;cursor: pointer;padding: 4px;box-shadow: 0 0 2px 0 rgba(0, 0, 0, 0.1);-moz-box-shadow: 0 0 2px 0 rgba(0, 0, 0, 0.1);-webkit-box-shadow: 0 0 2px 0 rgba(0, 0, 0, 0.1);height:150px;overflow:hidden;position:relative;}
#gallery li a p{position:absolute;width:100%;bottom:0;background:#fff;line-height:30px;padding-right: 10px;-webkit-box-sizing:border-box;}
#gallery li a img{width:100%;min-height:100%;}
.album li p>span, .album1 li p>span, .album2 li p>span {float: right;color: #aaa;position: absolute;right: 5px;background: #fff;padding-left: 5px;}
#gallery li p {display: inline-block;max-width: 100%;}
<?php  } ?>

<?php  if($_W['styles']['listtype'] == 1 || $show_category) { ?>
/* 单排  class="album" */
#gallery li{display:block;width:inherit;margin:5px;}
.album li p>span, .album1 li p>span, .album2 li p>span {float: right;color: #aaa;position: absolute;right: 5px;background: #fff;padding-left: 5px;}
#gallery li p {display: inline-block;max-width: 100%;}
<?php  } ?>

<?php  if($_W['styles']['listtype'] == '3' && !$show_category) { ?>
/* 瀑布流 class="album" */
.album li p>span, .album1 li p>span, .album2 li p>span {float: right;color: #aaa;position: absolute;right: 5px;background: #fff;padding-left: 5px;}
#gallery li p {display: inline-block;max-width: 100%;}
<?php  } ?>

.show-more{text-align:center; margin:10px 0;}
.show-more a{display:inline-block; color:#555; font-size:13px; text-shadow:0 1px 1px #fff; box-shadow:0 1px 1px 0 rgba(0,0,0,0.2) inset; padding:8px 50px; background:#DDD; text-decoration:none;}
</style>
<div id="photo">
	<div class="body">
		<div class="qiandaobanner">
			<a href="#">
            <?php  if(empty($_W['styles']['toppic'])) { ?>
				<img src="../addons/we7_album/template/images/albums_head.jpg" alt="" style="max-height:200px;"/>
            <?php  } else { ?>
            	<img src="<?php  echo toimage($_W['styles']['toppic'])?>" alt="" style="max-height:200px;"/>
            <?php  } ?>
			</a>
		</div>
		<div id="main" class="<?php  if($_W['styles']['listtype'] == 2) { ?>album2<?php  } else { ?>album<?php  } ?>"> <!--这个地方class有变化-->
        <?php  if($show_category) { ?>
        <p style='padding:5px;'>相册分类 <?php  if(!empty($pc)) { ?> (<?php  echo $pc['name'];?>)<?php  } ?> </p>
		<ul id="gallery" class="gallery clearfix">
        	<?php  if(!empty($category)) { ?>
         	<?php  if(is_array($category)) { foreach($category as $row) { ?>
            	<?php  if(empty($row['parentid'])) { ?>
		     	<li style="">
		        	<a href="<?php  echo $row['url'];?>">
                    <?php  if(!empty($row['thumb'])) { ?>
						<img src="<?php  echo toimage($row['thumb'])?>" alt="<?php  echo $row['name'];?>">
					<?php  } ?>
                    <p style="padding-top:5px; font-size:14px; font-weight:800;"><?php  echo $row['name'];?></p>
                    <?php  if(!empty($row['description'])) { ?><p><?php  echo $row['description'];?></p><?php  } ?>
                    </a>
                	<?php  } ?>
            		<?php  if(is_array($row['children'])) { foreach($row['children'] as $row1) { ?>
                	<p style='width:100%;border-top:1px solid #ccc;padding-top:8px;'>
                		<a href="<?php  echo $row1['url'];?>">
                			<?php  if(!empty($row1['thumb'])) { ?><img src="<?php  echo toimage($row1['thumb'])?>" alt="<?php  echo $row1['name'];?>" class='pull-left' style='width:40px;height:40px;' ><?php  } ?>
                    		<span class='pull-left' style="padding-top:2px;margin-left:10px;">
                    			<span style="font-weight:600;"><?php  echo $row1['name'];?></span>
								<?php  if(!empty($row1['description'])) { ?><br/><?php  echo $row1['description'];?><?php  } ?>
                   	 		</span>
               			</a>
               	 	</p>
                	<?php  } } ?>
                </li>
             <?php  } } ?>
             <?php  } ?>
        </ul>
        <div class="show-more"><a href="javascript:;" onclick="loadRecPage();" class="img-rounded pager">显示更多</a></div>
		<?php  } else { ?>
        	<p style='padding:5px;'><?php  if(!empty($pc)) { ?><?php  echo $pc;?><?php  } ?><?php  if(!empty($cc)) { ?>  - <?php  echo $cc;?><?php  } ?> </p>
            <ul id="gallery" class="gallery clearfix">
				<?php  if(is_array($list)) { foreach($list as $row) { ?>
				<li style="">
					<a href="<?php  echo $this->createMobileUrl('detail', array('id' => $row['id'], 'weid' => $_W['uniacid']))?>">
						 <?php  if(!empty($row['thumb'])) { ?><img src="<?php  echo toimage($row['thumb'])?>" alt="<?php  echo $row['title'];?>"><?php  } ?>
						<p><?php  echo $row['title'];?></p>
					</a>
				</li>
				<?php  } } ?>
			</ul>
		</div>
	</div>
<?php  } ?>
</div>
<?php  echo $pager;?>
<?php  if($show_category) { ?>
<script type="text/javascript">
var pindex = 1;
function loadRecPage() {
	pindex = parseInt(pindex) + 1;
	var pager = $('.pager');
	pager.html('正在加载数据...');
	var url = "<?php  echo $this->createMobileUrl('listmore')?>";
	$.get(url, {'page': pindex}, function(html){
            $('#gallery').append(html);
		if (html.indexOf('li') > - 1) {
			pager.html('显示更多');
		} else {
			pager.html('已全部加载');
		}
	});
}
</script>
<?php  } ?>
<?php  if($_W['styles']['listtype'] == 3 && !$show_category) { ?>
<script type="text/javascript" src="../addons/we7_album/template/mobile/jquery.imagesloaded.js"></script>
<script type="text/javascript" src="../addons/we7_album/template/mobile/jquery.wookmark.min.js"></script>
<script type="text/javascript">
//下面是瀑布流js
$(function() {
  $('#gallery').imagesLoaded(function() {
	// Prepare layout options.
	var options = {
	  autoResize: false, // This will auto-update the layout when the browser window is resized.
	  container: $('#main'), // Optional, used for some extra CSS styling
	  offset: 4, // Optional, the distance between grid items
	  itemWidth: 140 // Optional, the width of a grid item
	};

	// Get a reference to your grid items.
	var handler = $('#gallery li');
	// Call the layout function.
	handler.wookmark(options);
  });
});
</script>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>