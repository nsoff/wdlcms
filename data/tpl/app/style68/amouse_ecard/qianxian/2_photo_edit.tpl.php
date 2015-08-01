<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1">
<title>栏目编辑-相册</title>
<link rel="stylesheet" href="../addons/amouse_ecard/style/css/reset.css">
<link rel="stylesheet" href="../addons/amouse_ecard/style/css/flytip.css">
<link rel="stylesheet" href="../addons/amouse_ecard/style/css/nameCard.css?v=2014125">
</head>

<body class="namecard-editor album-editpage">

<!--#=start page-->
<div class="namecard-page"> 
  <form action="" class="validate" method="post" id="personForm">
  <!--#=start column-->
  <section class="editor-column">
      <ul class="editor-inner">
        <li class="editor-inner-item" >
           <span class="editor-item-title">栏目图标</span>
           <span class="icons-prev" id="iconsPrev">
		   <?php  if($list['icon']) { ?><img src="<?php  echo $list['icon'];?>"></span><?php  } else { ?>
		   <img src="../addons/amouse_ecard/style/images/icon/ico-35.png"></span><?php  } ?>
           <input type="hidden" id="iconsPath" name="icon" value="<?php  echo $list['icon'];?>">
        </li>
        
        <li class="editor-inner-item">
           <span class="editor-item-title">栏目名称</span>
        	<?php  if($list['title']) { ?><input type="text" class="inptext"  name="title" value="<?php  echo $list['title'];?>" id="itemTitle" ><?php  } else { ?>
			<input type="text" class="inptext"  name="title" value="精彩相册" id="itemTitle" ><?php  } ?>
        </li>
      </ul>
  </section>
  <!--#=end column-->
  
						<input type="hidden"  name="id" value="<?php  echo $id;?>" />
						<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
						<input type="hidden" name="photoId" value="<?php  echo $list['id'];?>" />
						<input type="hidden" name="cid" value="<?php  echo $cid;?>" />
  <!--#=start column-editcontent-->
  <section class="editcontent-column">
      <div class="editcontent-inner">
      	<div class="editcontent-inner-title">相册图片</div>
      	<div id="photoList">
		<?php  $i=0?>
			<?php  if(is_array($thumb)) { foreach($thumb as $img) { ?>
			<?php  if($img) { ?>
			<div class="editcontent-box">
				<div class="editcontent-image">
					<div class="editcontent-upload">
						<a class="upload-btn" href="javascript:;"><img style="display: block;" id="fileimg<?php  echo $i;?>" src="<?php  echo $_W['attachurl'];?><?php  echo $img;?>" width="100%;" height="100%;" class="fillIn-avatar-thumbnail">
						<span class="upload-text">点击上传图片</span>
						
							<input type="file" id="<?php  echo $i;?>" name="file" onchange="imageupload(this)" class="uploadFile" single="" accept="image/*">
						
						<input type="hidden" id="pic_url<?php  echo $i;?>" name="headimg[]" value="<?php  echo $img;?>">
							<div class="progress"><?php  echo $i;?></div>
						</a>
							<div class="editcontent-editor-btn">
								<a class="image-btn edit-btn up-btn" href="javascript:;">上移</a>
								<a class="image-btn detele-btn" href="javascript:;">删除</a>
							</div>
					</div>
				</div>
			</div>
			<?php  } ?>
			<?php  $i=$i+1?>
			<?php  } } ?>
	    </div>
        
       	<div class="editcontent-addbox"><span class="editcontent-addbtn" id="addbtn">添加新图片</span></div>
        
      </div>
  </section>
  <input type='hidden' id='' name='op' value="post"/>

  
  <div class="row">
				
			</div>
			<div class="row">

</div>


			<span id="aaa"></span>
			
			
			
  <div class="editcontent-tips">
  请不要上传过大的图片
  </div>
  <!--#=end column-editcontent-->
  <div class="editor-confirm" id="footerFixed"> <a class="editor-btn" href="javascript:savePersonInfo()" id="subBtn">确 定</a> </div>
</div>
  </form>

<!--#=end page-->

<div class="icons-list" id="iconsList">
	<ul class="icons-list-inner" id="iconsListInner"></ul>
</div>

<!--#start JS-->
<script src="../addons/amouse_ecard/style/js/jquery.1.11.1.js?v=20150405"></script>
<script src="../addons/amouse_ecard/style/js/flytip.js"></script>
<script src="../addons/amouse_ecard/style/js/h5upload.js?v=2014122"></script>
<script src="../addons/amouse_ecard/style/js/bottomFixed.js?v=2014122"></script>
<script type="text/javascript" src="../addons/amouse_ecard/style/js/zepto.form.js"></script>

<script>
var fileNum = $('.uploadFile');
var count = fileNum.length;

function addNewphoto(){
	var $photoList = $("#photoList");
	var $temp = $('<div class="editcontent-box">'+
		        	'<div class="editcontent-image">'+
		          	'<div class="editcontent-upload">'+
		            	'<a class="upload-btn" href="javascript:;">'+
		            		'<img <?php  if($list['headimg']) { ?> style="display:block;" <?php  } else { ?> style="display:none" <?php  } ?> id="fileimg'+count+'" src="<?php  echo $_W['attachurl'];?><?php  echo $list['headimg'];?>" width="100%;" height="100%;"class="fillIn-avatar-thumbnail"><?php  if($list['headimg']) { ?><?php  } ?>'+
		            		'<span class="upload-text">点击上传图片</span>'+
		            		'<input type="file" id="'+count+'" name="file" onchange="imageupload(this)" class="uploadFile" single accept="image/*">'+
		            		'<input type="hidden" id="pic_url'+count+'" name="headimg[]" value=""/>'+
		            		'<div class="progress">0</div>'+
		            	'</a>'+
		              	'<div class="editcontent-editor-btn"><a class="image-btn edit-btn up-btn" href="javascript:;">上移</a><a class="image-btn detele-btn" href="javascript:;">删除</a></div>'+
		            '</div>'+
		          '</div>'+
		        '</div>');
				
	count = count +1;
	$temp.find(".detele-btn").click(function(){
		$temp.remove();
	});
	
	$photoList.append($temp);
	/*
	$temp.h5upload({
		"uploadUrl": "/upload/ajaxUploadifyUploadMobileFile.do?fileType=bizcard&sizeRange=480x"
	});
	*/
}

//图片上传
function imageupload(obj){
			inputId = "#"+obj.id;
			fileimgId = "#fileimg"+obj.id;
			fileimgElementId = "fileimg"+obj.id;
			pic_urlId = "#pic_url"+obj.id;
			$(inputId).wrap('<form method="post" id="formUpload" action="<?php  echo $this->createMobileUrl('uploadimage');?>" enctype="multipart/form-data"></form>');	
			document.getElementById(fileimgElementId).style.display = 'none';
			$("#formUpload").ajaxSubmit({
				dataType:  'json',
				beforeSend: function() {

				},
				uploadProgress: function(event, position, total, percentComplete) {
			
				},
				success: function(data) {
					if(data.error==1) {
					}else{
						var picurl = data.filename;
						$(fileimgId).attr('src','<?php  echo $_W['attachurl'];?>'+picurl);
						$(pic_urlId).attr('value',picurl);
						document.getElementById(fileimgElementId).style.display = 'block';
					}
				},
				error:function(xhr){
					btn.html("上传失败了");
				}
			});
}

//组装数据
function pushData(){
	var $photoList = $("#photoList");
	var $photoListLi = $photoList.find(".editcontent-box");
	var items = [];

	$photoListLi.each(function(){
		var $this = $(this);
		var pic = $this.find(".picPath").val();
		if(pic){
			items.push({"pic":pic});
		}
	});
	
	var datas = {"photos":items};
	return datas;
}

//数据提交
function savePersonInfo() {
	$("#saveBtn").text("正在保存...");
	$("#personForm").submit();
}

//插入ICON列表
function iconsList(){
	var $iconsListInner = $("#iconsListInner");
	var items = "";
	for(var i=1; i<=35; i++){
		items += '<li class="icons-list-item"><img src="../addons/amouse_ecard/style/images/icon/ico-'+i+'.png"></li>';
	}
	$iconsListInner.append(items);
}

$(function(){
	$("#photoList .editcontent-box").each(function(){
		//$(this).h5upload();
	});

	//添加
	$("#addbtn").click(function(){
		//--不能超过30个
		if($(".editcontent-box").length >= 30){
			$.flytip("最多上传 30 个图片！");
			return false;
		}
		addNewphoto();
	});
	
	//上移
	$("#photoList").on("click", ".up-btn", function(){
		var $thisP = $(this).parents(".editcontent-box");
		if($thisP.index()>0){
			$thisP.prev().before($thisP);
		}else{
			$.flytip("已经是最顶了");
		}
	});
	//删除
	$("#photoList").on("click", ".detele-btn", function(){
		$(this).parents(".editcontent-box").remove();
	});
	
	//图标
	iconsList();
	
	var $iconsList = $("#iconsList");
	var $iconsPrev = $("#iconsPrev");
	
	$iconsPrev.click(function(){
		$iconsList.show();
	});
	
	$iconsList.on("click", ".icons-list-item", function(){
		var $this = $(this);
		var url = $this.find("img").attr("src");
		$("#iconsPath").val(url);
		$iconsPrev.find("img").attr("src",url);
		$iconsList.hide();
	});
	
	$("#footerFixed").bottomFixed();
	
});
</script>
<script src="../addons/amouse_ecard/style/js/wx-hideShare.js"></script>
<!--#end JS-->
</body>
</html>