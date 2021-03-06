<?php defined('IN_IA') or exit('Access Denied');?><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1">
    <title>我的人脉圈</title>
    <link href="../addons/amouse_ecard/style/css/reset.css" rel="stylesheet">
    <link href="../addons/amouse_ecard/style/css/vpopup.css" rel="stylesheet">
    <link href="../addons/amouse_ecard/style/css/flytip.css" rel="stylesheet">
    <link href="../addons/amouse_ecard/style/css/nameCard.css?v=201410282" rel="stylesheet" type="text/css">
    <style type="text/css">
        html, body {
            background: #f0f0f6;
        }
    </style>
    <style id="qb_dict_style" type="text/css"></style>
</head>

<body class="namecard-favorite">
<div class="namecard-page">
<div class="create-next">
    <a class="create-next-btn" style="text-align: left; padding-left: 32px;" href="<?php  echo $this->createMobileUrl('Index',array('op'=>'list'))?>">
        <i class="icon-back"></i>返回名片
    </a>
    <section class="peoplehub-column js-peoplehub">
        <ul class="peoplehub-inner">
            <li class="peoplehub-inner-item <?php  if($op=='list') { ?>current<?php  } ?>">
                <a class="peoplehub-item-link"
                   href="<?php  echo $this->createMobileUrl('Renmai',array('id'=>$id, 'op'=>'list'))?>">
                    <span class="peoplehub-tit">人脉收藏</span>
                </a>
            </li>
            <li class="peoplehub-inner-item <?php  if($op=='mycollect') { ?>current<?php  } ?>">
                <a class="peoplehub-item-link "
                   href="<?php  echo $this->createMobileUrl('Renmai',array('id'=>$id, 'op'=>'mycollect'))?>">
                    <span class="peoplehub-tit">收藏我的</span>
                </a>
            </li>

        </ul>
    </section>

    <section class="favorite-column js-favoriteColumn" id="favoriteColumn">
        <div class="favorite-box">
            <?php  $a=""?>
            <?php  if(is_array($renmaiList)) { foreach($renmaiList as $k => $renmai) { ?>
            <?php  if($renmai['zimu'] != $a) { ?><h3 class="favor-title"><?php  echo $renmai['zimu'];?></h3><?php  } ?>
            <ul class="favorite-inner">
                <li class="favorite-inner-item js-favorite-inner-item">
                    <a class="remove-btn"><span class="vertical-m"></span>
                    </a>
                    <a class="favorite-item-link"
                       href="<?php  echo $this->createMobileUrl('Share',array('id'=>$renmai['id'], 'op'=>'renmai'))?>">
                        <?php  if($renmai['headimg']) { ?>
                        <?php  if(substr($renmai['headimg'],0,9) == 'http://wx') { ?>
                        <img class="favorite-avatar-thumbnail" src="<?php  echo $renmai['headimg'];?>">
                        <?php  } else { ?>
                        <img class="favorite-avatar-thumbnail" src="<?php  echo $_W['attachurl'];?><?php  echo $renmai['headimg'];?>">
                        <?php  } ?>
                        <?php  } else { ?>
                        <img class="favorite-avatar-thumbnail" src="../addons/amouse_ecard/style/images/header.png">
                        <?php  } ?>
                        <h3 class="favorite-name">
                            <span class="sp_Name"><?php  echo $renmai['realname'];?></span>
                            <span class="sp_Job"><?php  echo $renmai['job'];?></span>
                            <span class="sp_Job"><?php  echo $renmai['company'];?></span>
                        </h3>

                        <p class="favorite-company"><?php  echo $this->hehe($renmai['qianming'])?></p><i
                            class="icon-right"></i>
                    </a>

                    <div class="favorite-item-btn">
                        <a class="favor-btn cancel-favorite remark-btn" href="javascript:;"><span
                                class="vertical-m">备注</span></a>
                        <a class="favor-btn plus-star" href="javascript:;"><i class="icon-star "></i></a>
                    </div>
                </li>

            </ul>
            <?php  $a=$renmai['zimu']?>
            <?php  } } ?>
        </div>

    </section>
    <section class="favorite-column" id="searchFavorite" style="display: none;"></section>
    <div class="serch-letterbox js-serchLetterbox">A</div>
</div>
<script src="../addons/amouse_ecard/style/js/jquery.1.11.1.js?v=20150406"></script>
<script src="../addons/amouse_ecard/style/js/vpopup.js?v=20150406"></script>
<script src="../addons/amouse_ecard/style/js/flytip.js?v=20150406"></script>
<script src="../addons/amouse_ecard/style/js/scrollLoad.js?v=20150406"></script>
<script src="../addons/amouse_ecard/style/js/fovorite.js?v=20150406"></script>
<script type="text/javascript">
    $(function () {
        var $loading = $("#loading");
        var $favoriteColumn = $("#favoriteColumn");
        var last = null;
        var loadata = function (data) {
            $loading.hide();
            var headname = data.headname ? "display:" + data.headname : "";
            var res = data.results;
            var htmls = "";
            if (res) {
                for (var r in res) {
                    if (last == null || last != r) {
                        htmls += '<div class="favorite-box"><h3 class="favor-title" style="' + headname + '">' + r + '</h3><ul class="favorite-inner">';
                    }
                    var h = "";
                    var re = res[r];
                    var l = re.length;

                    for (var i = 0; i < l; i++) {
                        var star = re[i]["star"] == true ? "icon-star-active" : "";
                        var companyName = re[i]["companyName"] ? re[i]["companyName"] : "TA未创建微名片";
                        var cardUserJob = re[i]["cardUserJob"] ? re[i]["cardUserJob"] : "";

                        h += '<li class="favorite-inner-item js-favorite-inner-item" data-openid="' + re[i]["friendId"] + '">' +
                                '<a class="remove-btn" href="javascript:;"><span class="vertical-m"></span></a>' +
                                '<a class="favorite-item-link" href="/app/bizcard/card/' + re[i]["friendId"] + '.action">' +
                                '<img src="' + re[i]["userAvatar"] + '" class="favorite-avatar-thumbnail">' +
                                '<h3 class="favorite-name"><span class="sp_Name">' + re[i]["remarkName"] + '</span><span class="sp_Job">' + cardUserJob + '</span></h3>' +
                                '<p class="favorite-company">' + companyName + '</p>' +
                                '<i class="icon-right"></i>' +
                                '</a>' +
                                '<div class="favorite-item-btn">' +
                                '<a class="favor-btn cancel-favorite remark-btn" href="javascript:;"><span class="vertical-m">备注</span></a><a class="favor-btn plus-star" href="javascript:;"><i class="icon-star ' + star + '"></i></a>' +
                                '</div>' +
                                '</li>';
                    }
                    if (last == null || last != r) {
                        htmls += h + "</ul></div>";
                    } else {
                        htmls = h;
                        $favoriteColumn.find(".favorite-box").eq(-1).find(".favorite-inner").append(htmls);
                        htmls = "";
                    }
                    last = r;

                }
                return htmls;
            } else {
                $favoriteColumn.html("<span class='noFavour'>您还没有人脉哦</span>");
            }
        };
        $favoriteColumn.scrollLoad({
           // "url": "/app/bizcard/fovoriteList.do",
            "fromPage": 1, //从第几页开始
            "scrollWrap": $(document), //滚动的对象
            "pageSize": 30, //每页加载个数
            "bsCallback": function () {
                $loading.show();
            },
            "params": {"star": "false"},
            "htmlTemp": function (data) { //func 数据的html结构 接受了返回的data
                return loadata(data);
            }
        });

        var $searchFavorite = $("#searchFavorite");

        function searchNow(key) {
            $searchFavorite.scrollLoad({
               // "url": "/app/bizcard/fovoriteList.do",
                "fromPage": 1, //从第几页开始
                "scrollWrap": $(document), //滚动的对象
                "pageSize": 30, //每页加载个数
                "bsCallback": function () {
                    $loading.show();
                },
                "params": {keyWord: key, "star": "false"},
                "htmlTemp": function (data) { //func 数据的html结构 接受了返回的data
                    data.headname = "none";
                    return loadata(data);
                }
            });
        }

        //搜索NOW
        function searchX() {
            $favoriteColumn.hide();
            $searchFavorite.show();
            $searchFavorite.html("");
            searchNow($("#searchInput").val());
        }

        $("#searchInput").blur(function () {
            searchX();
        });

        document.onkeydown = function () {
            if (event.keyCode == 13) {
                searchX();
            }
        }

        $("#fovoriteEdit").click(function () {
            var $this = $(this);
            $this.text() == "编辑" ? $this.text("完成") : $this.text("编辑");
            $favoriteColumn.toggleClass("edit");
        });

    });

    document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
        WeixinJSBridge.call('hideOptionMenu');
    });

</script>
<!--#end JS-->
<?php  if($setting['cnzz']) { ?>
<?php  echo htmlspecialchars_decode($setting['cnzz']);?>
<?php  } ?>

<div id="dict__tip" style="left: auto; top: auto; right: auto; visibility: hidden;">
    <div id="dict__tip_dict_info" style="width: auto;"><span class="dict-link" id="dict__tip_dict_link"><a
            id="dict__tip_copy_translate" href="javascript:void(0)" target="_blank">复制</a><a
            id="dict__tip_translate_link" href="#" target="_blank">去Google翻译</a></span>
        <span class="dict-copyright" id="dict__tip_dict_copyright">翻译结果</span>
    </div>
    <div id="dict__tip_translate_result"></div>
</div>
</body>