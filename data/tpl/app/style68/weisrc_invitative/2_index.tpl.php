<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="expires" content="0"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php  echo $item['title'];?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>css/focus_aim.css">
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>css/invitative.css">
    <script type="text/javascript">
        var params = {
            InvitativeID: "<?php  echo $id;?>",
            NickName: '<?php  echo $nickname;?>',
            headimgurl: '<?php  echo $headimgurl;?>',
            IsGuest: '',
            GuestID: '<?php  echo $from_user;?>',
            IsDeepOAuth: '1',
            totalPage: parseInt('1'),
            location_url: "#",
            DisplayParticipant: "0",
            ParticipantCount: "2",
            IsFollowTips: parseInt(''),
            OneKeyFollow: ''
        };
    </script>
</head>
<body class="home_body" style="background-image: url('<?php  echo $bg;?>')">
<section id="cd_player" >
    <div class="btn_music" data_status="play"></div>
    <div class="music_note music_note_animation"></div>
</section>
<div id="invitative_wrap">
    <div id="loading_box">
        <div class="loading"></div>
        <p class="tips_loading">正在加载中，请稍后...</p>
    </div>
    <div id="invitative_box">
        <!--open invitative-->
        <article class="send_invitative_box" id="send_invitative_box">
            <div class="invitative_img" id="invitative_img"
                 style="background-image:url(<?php  echo $cardbg;?>)">
                <span class="right_hand hand" id="left_hand"></span>
                <span class="left_hand hand" id="right_hand"></span>
                <span id="btn_flicker_circle"></span>
                <span id="btn_finger"></span>
            </div>
        </article>
        <!--music play-->
        <?php  if(!empty($musicurl)) { ?>
        <audio data-src="<?php  echo $musicurl;?>" id="audio"></audio>
        <?php  } ?>
        <article class="activity_box" id="activity_box">
            <!--activity intro-->
            <div id="activity_scroll_content">
                <section class="main_area_wrap curItem" id="general_intro">
                    <div class="activity_intro_box activity_intro_wrap activity_content_bgcolor">
                        <h1 class="title_bg activity_title text_overflow"><?php  echo $item['title'];?></h1>
                        <div class="btn_signup_wrap">
                            <span class="detail_btn btn_signup checkOauth" data_id="signup">报名</span>
                        </div>
                        <span class="detail_btn view_activity_detail" data_id="activity_detail">活动详情</span>
                        <div class="intro_img_box" data_id="activity_detail">
                            <ul id="intro_img_container">
                                <?php  if(is_array($item['thumbs'])) { foreach($item['thumbs'] as $row) { ?>
                                <li>
                                    <div class="intro_img" style="background-image:url(<?php  if(strstr($row, 'http')) { ?><?php  echo $row;?><?php  } else { ?><?php  echo $_W['attachurl'];?><?php  echo $row;?><?php  } ?>)"></div>
                                </li>
                                <?php  } } ?>
                            </ul>
                        </div>
                        <div class="intro_othermessage">
                            <p class="date">报名时间：<br/>
                                <?php  echo date('Y/m/d H:i', $item['starttime']);?> 到 <?php  echo date('Y/m/d H:i', $item['endtime']);?>
                            </p>
                            <i class="activity_address">地址：<?php  echo $item['address'];?><a href="#" target="_blank" class="navgation_icon"></a></i>
                        </div>
                    </div>
                </section>
                <!--activity detail-->
                <section class="main_area_wrap" id="activity_detail">
                    <div class="activity_detail_box activity_content_bgcolor">
                        <span class="detail_btn btn_up"></span>
                        <div class="btn_signup_wrap">
                            <span class="detail_btn btn_signup checkOauth" data_id="signup">报名</span>
                        </div>
                        <div class="intro_detail_content">
                            <h1 class="activity_title top_5 text_overflow"><?php  echo $item['title'];?></h1>
                            <div class="organizer title_bg">
                                <p>主办方：<?php  echo $item['organizers'];?></p>
                            </div>
                            <div id="wrapper1" class="intro_detail_box">
                                <div class="scroller" id="scroller1">
                                    <?php  echo htmlspecialchars_decode($item['content'])?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--signup-->
                <section class="main_area_wrap" id="signup">
                    <div class="signup_box activity_content_bgcolor activity_content_bgimg">
                        <span class="detail_btn btn_up"></span>
                        <div class="register_avatar_box">
                            <div class="register_avatar" style="background-image: url(<?php  echo $headimgurl;?>)"></div>
                        </div>
                        <h2 style="text-align: center;font-weight: normal; margin-top:-8px;color: #999;padding-bottom: 10px;"><?php  echo $nickname;?></h2>
                        <div class="form_box" id="wrapper2">
                            <div class="scroller" id="scroller2">
                                <input type="hidden" name="GuestID" value="5363ad43721b83433b8b4657"
                                       id="GuestID" placeholder="邀请ID"/>
                                <input type="hidden" name="InvitativeID" value="53a157d0525619573a8b459c"
                                       id="InvitativeID"
                                       placeholder="邀请ID"/>
                                <div class="text">
                                    <input type="text" name="username" value="" id="username" placeholder="请输入姓名"/>
                                </div>
                                <div class="text">
                                    <input type="tel" name="tel" id="tel" value="" placeholder="请输入您的手机号"/>
                                </div>
                                <div class="text">
                                    <input type="text" name="company" value="" id="company" placeholder="请输入公司名称"/>
                                </div>
                                <div class="text">
                                    <input type="text" name="position" value="" id="position" placeholder="请输入职位"/>
                                </div>
                            </div>
                        </div>
                        <p class="register_error" id="register_error">请填写真实姓名以便我们联系您，谢谢！</p>
                        <div class="register_btn_box">
                            <button id="btn_signin" class="register_btn">接受邀请</button>
                        </div>
                    </div>
                </section>
                <!--signup success-->
                <section class="main_area_wrap" id="signup_success_wrap">
                    <div class="signup_success_box activity_content_bgcolor activity_content_bgimg">
                        <span class="detail_btn btn_up"></span>
                        <div class="register_avatar signup_success_avatar"
                             style="background-image: url(<?php  echo $headimgurl;?>)"></div>
                        <p class="signup_success_tips">感谢您的参与，我们将会有专人联系您！</p>
                        <div class="btn_signup_wrap" id="signup_success_img"></div>
                        <span class="detail_btn btn_invite  btn_invite_animation"></span>
                    </div>
                </section>
                <!--guest list-->
                <section class="main_area_wrap" id="vip_list">
                    <div class="guest_list_box activity_content_bgcolor activity_content_bgimg">
                        <span class="detail_btn btn_up"></span>
                        <div class="btn_signup_wrap" id="btn_signup_wrap"></div>
                        <h1 class="signup_number title_bg" id="txtTotalcount">2位贵宾已接受邀请</h1>
                        <div class="guest_list" id="wrapper3">
                            <div class="scroller" id="scroller3">
                                <ul id="guest_list_content"></ul>
                                <div id="pull_up">
                                    <p class="pullup_label"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </article>
    </div>
</div>
<script type="text/javascript" src="<?php echo RES;?>js/zepto.js"></script>
<script type="text/javascript" src="<?php echo RES;?>js/wx.js"></script>
<script type="text/javascript" src="<?php echo RES;?>js/touch.js"></script>
<script type="text/javascript" src="<?php echo RES;?>js/iscroll.js"></script>
<script type="text/javascript" src="<?php echo RES;?>js/focus_aim.js"></script>
<!--<script type="text/javascript" src="<?php echo RES;?>js/invitative.js?v=1"></script>-->

<script type="text/javascript">
var guest_info = {};//用户信息
var isRequest = false;
var current_page = 1;
var isWifi = false;
var circle_flicker_count = 0;

var share_text;
if (params.DisplayParticipant) {
    share_text = '已有' + params.ParticipantCount + '人接受邀请';
}

//所需图片的预加载
function preload_img(fnCallback) {
    $('.home_body').height($(window).height());
    var images = ['../addons/weisrc_invitative/template/images/img_left_hand_280x365.png', '../addons/weisrc_invitative/template/images/img_right_hand_280x365.png', '../addons/weisrc_invitative/template/images/img_invitation_490x490.png'];
    var a = 0;
    for (var i = 0; i < images.length; i++) {
        (function (url) {
            var img = new Image();
            img.onload = function () {
                a++;
                if (a >= images.length) {
                    $('#loading_box').remove();
                    $('#send_invitative_box').addClass('send_invitative_animation');
//                    if(fnCallback){
//                        fnCallback();
//                    }
                    //送出邀请函之后
                    $('#send_invitative_box').on('webkitTransitionEnd transitionend', function () {
                        $('#left_hand,#right_hand').addClass('hand_hide');
                    });
                    //手消失之后
                    $('.hand').on('webkitAnimationEnd animationend', function () {
                        $('#invitative_img').addClass('bounce');
                    });
                    $('#invitative_img').on('webkitAnimationEnd animationend', circle_flicker, false);
                    $('#activity_box').on('webkitAnimationEnd animationend', intro_show_end, false);
                }
            };
            img.src = url;
        })(images[i]);
    }
}
//自适应大小
function reset_size(obj) {
    var refrence_w = 320;
    var win_w = $(window).width();
    var scale_ratio = win_w / refrence_w;
    $(obj).css({
        '-webkit-transform': 'scale(' + scale_ratio + ')'
    });
}
/*闪烁的圆提示出现*/
function circle_flicker() {
    circle_flicker_count++;
    if (circle_flicker_count == 3) {
        $('#btn_flicker_circle,#btn_finger').show();
        //打开邀请函
        open_invitative();
    }
}
//用户打开邀请函
function open_invitative() {
    $('#invitative_img').click(function () {
        $('#activity_box').addClass('activity_intro_animation');
        if (!$("#cd_player").attr("data-display")) {

            $('#cd_player').show();
            window.setTimeout(function () {
                music_play();
            }, 500);
        }
    })
}

//播放音乐
function music_play() {
    var audio_src = $('#audio').attr('data-src');
    if (isWifi) {
        $('#audio').attr("src", audio_src);
        $('#audio')[0].play();
        $('.music_note').show();
        $(".btn_music").addClass("music_play_animation");
    }
    else {
        if (window.confirm("2G/3G 网络将产生流量费用，是否播放音乐？")) {
            $('#audio').attr("src", audio_src);
            $('#audio')[0].play();
            $('.music_note').show();
            $(".btn_music").addClass("music_play_animation");
        }
    }
    $('.btn_music').tap(function () {
        var data_status = $(this).attr('data_status');
        if (data_status == 'play') {
            $('#audio')[0].pause();
            $(this).removeClass('music_play_animation');
            $('.music_note').hide();
            $(this).attr('data_status', 'stop');
        }
        else {
            $('#audio').attr("src", audio_src);
            $('#audio')[0].play();
            $(this).addClass('music_play_animation');
            $('.music_note').show();
            $(this).attr('data_status', 'play');
        }
    })
}

function myscroll(obj) {
    var obj_arr = obj.split(',');
    for (var i = 0; i < obj_arr.length; i++) {
        var wrapper_h = $('#' + obj_arr[i]).height();
        var wrapper_document_h = $('#' + obj_arr[i]).find('div').height();
        if (wrapper_document_h > wrapper_h) {
            var newIscroll = new iScroll(obj_arr[i], {scrollbarClass: 'myScrollbar',hideScrollbar: false});

            var imgs = $('#' + obj_arr[i]).find('img');
            var srcArr = [];
            $.each(imgs, function (idx, img) {
                srcArr.push(img.src);
            })
            var a = 0;

            for (var j = 0; j < imgs.length; j++) {
                //(function () {
                var img = new Image();
                img.src = srcArr[j];
                img.onload = function () {
                    a++;
                    if (a >= imgs.length) {
                        newIscroll.refresh();
                    }
                };
                img.onerror = function () {
                    a++;
                    if (a >= imgs.length) {
                        newIscroll.refresh();
                    }
                }
                //})();
            }
        }
    }
}

//详情介绍页面图片的滚动
function pic_show() {
    var $intro_img_container = $('#intro_img_container');
    var lis = $intro_img_container.find('li');
    var li_w = $('.intro_img_box').width();
    var len = lis.length;
    lis.width(207);
    $intro_img_container.width(li_w * len);
    var left = parseFloat(li_w) + 'px';

    function translateLeft() {
        $intro_img_container.css({
            '-webkit-transform': 'translateX(-207px)',
            '-webkit-transition': 'all 1s ease-in'
        });
    }

    $intro_img_container.on('webkitTransitionEnd transitionend', function () {
        $intro_img_container.css({
            '-webkit-transition': 'none',
            '-webkit-transform': 'translateX(0)'
        });
        $intro_img_container.find('li').first().appendTo($intro_img_container);
    }, false);
    setInterval(translateLeft, 3000);
}
//详情介绍页面弹出后
function intro_show_end() {
    $('#btn_flicker_circle').hide();
    $('#btn_finger').css('opacity', 0);
    //内容切换调用
    var slider_arr = ['btn_guest_list', 'btn_signup', 'view_activity_detail', 'intro_img'];
    //slider_go(slider_arr.toString());

    //生成页面滑动
    window.slide = $('.main_area_wrap').slideItem({
        loop: true,
        afterslide: function () {
            slide.removeClass('nextItem lastItem active');
        }
    })

    //绑定跳到上一页下一页
    $('.btn_guest_list,.view_activity_detail,.btn_signup,.intro_img_box').tap(function () {
        var data_id = $(this).attr('data_id');
        var toIdx = $('#' + data_id).index();
        slide.slideNext(toIdx);
        if (data_id == "vip_list") {
            current_page = 1;
            loadData();
            $('#guest_list_content').html('');
            if (params.IsGuest) {
                $('.btn_signup_wrap').html('');
                $('<span class="detail_btn btn_signup_success"></span>').appendTo($('.btn_signup_wrap'));
            }
        }
    });
    $('.btn_signup').on('tap',function(){
        if (params.IsFollowTips) {
            //提示关注
            focusAIM();
        }
    })
    $('.btn_up').tap(function () {
        slide.slidePre();
    })

    if ($('#intro_img_container li').length > 1) {
        setTimeout(function () {
            pic_show();
        }, 1000);
    }
    $('#activity_box').off('webkitAnimationEnd animationend', intro_show_end);
}
//submit form
function infoSubmit() {
    if (isRequest)
        return;
    isRequest = true;
    $('#btn_signin').text('正在提交中...').attr('disabled', 'disabled');

    var url = "<?php  echo $this->createMobileUrl('guestinfo', array(), true);?>";

    //提交表单
    $.ajax({
        type: 'post',
        url: url,
        dataType: 'json',
        data: guest_info,
        complete: function () {
            isRequest = false;
            $('#btn_signin').text('提 交').removeAttr('disabled');
            console.log('complete');
        },
        success: function (data) {
            if (data.status == 1) {
                slide.slideNext($('#signup_success_wrap').index());
                $('#general_intro').removeClass('curItem');
                $('.btn_signup').remove();
                $('<span class="detail_btn btn_signup_success"></span>').appendTo($('.btn_signup_wrap'));
                $('#signup_success_img').find('.btn_signup_success').addClass('signup_success_animation');
            } else {
                $('#register_error').html(data.message);
            }
        }
    });
}
//iscroll 拉动刷新
var myScroll, pullUpEl, pullUpOffset;
var hasIscroll = false;
//嘉宾名单加入列表
function loadData() {
    var html_arr = [];
    if (current_page <= params.totalPage) {
        alert('debug');//debug
        $.ajax({
            type: 'post',
            url: '/invitative/api/guest_pageGetRows',
            dataType: 'json',
            data: {
                TID: params.TID,
                InvitativeID: params.InvitativeID,
                Page: current_page
            },
            complete: function () {
                isRequest = false;
            },
            success: function (data) {
                $.each(data.rows, function (idx, obj) {
                    html_arr.push('<li><div class="guest_avatar" style="background-image:url(' + obj.Headimageurl + ')"></div>');
                    html_arr.push('<p class="guest_name text_overflow">' + obj.Name + '</p>');
                    html_arr.push('<p class="guest_tel">' + obj.Mobile + '</p>');
                    html_arr.push('</li>');
                });
                $('#txtTotalcount').html(data.totalcount + "位贵宾已报名");
                var html = html_arr.join('');
                $(html).appendTo($('#guest_list_content'));
                if (myScroll) {
                    myScroll.refresh();
                }

                if (hasIscroll) {
                    return false;
                } else {
                    loaded();
                    hasIscroll = true;
                }
            }
        });
        current_page++;
    }
    if (current_page <= params.totalPage || $('#guest_list_content').height() < $('#wrapper3').height()) {
        $('#pull_up').hide();
    }
}

function pullUpAction() {
    loadData();
    myScroll.refresh();
}
function loaded() {
    pullUpEl = $('#pull_up')[0];
    pullUpOffset = pullUpEl.offsetHeight;
    setTimeout(function () {
        myScroll = new iScroll('wrapper3', {
            useTransition: true,
            hScrollbar: false,
            scrollbarClass: 'myScrollbar',
            onRefresh: function () {
                if (pullUpEl.className.match('loading')) {
                    pullUpEl.className = '';
                }
            },
            onScrollMove: function () {
                if (this.y < (this.maxScrollY - 5) && !pullUpEl.className.match('flip')) {
                    pullUpEl.className = 'flip';
                    this.maxScrollY = this.maxScrollY;
                }
            },
            onScrollEnd: function () {
                if (pullUpEl.className.match('flip')) {
                    pullUpEl.className = 'loading';
                    $('.pullup_label').html('往上拉加载更多...');
                    loadData();
                }
            }
        });
        if ($('#guest_list_content').height() > $('#wrapper3').height()) {
            $(myScroll.vScrollbarWrapper).css('opacity', "1 !important");
        }
    }, 100);
    setTimeout(function () {
        $('#wrapper3').css('left', 0);
    }, 800);
}
document.addEventListener('touchmove', function (e) {
    e.preventDefault();
}, false);

function init() {
    preload_img();
    reset_size($('#invitative_box'));

    //iscroll
    var iscroll_arr = ['wrapper1', 'wrapper2'];
    myscroll(iscroll_arr.toString());

    //检验授权
    $('.checkOauth').tap(function () {
        if (params.IsDeepOAuth == false) {
            //window.location.href = '/invitative/api/show_oauth/' + params.TID + '/' + params.InvitativeID;
        }
    });

    //填写报名信息
    $('#btn_signin').on('click', function () {
        var username = $("#username").val();
        var tel = $("#tel").val();
        var company = $("#company").val();
        var position = $("#position").val();
        var activityid = "";
        guest_info = {
            activityid:"<?php  echo $id;?>",
            from_user:"<?php  echo $from_user;?>",
            username:username,
            tel:tel,
            company:company,
            position:position
        };
//        $.each($('#scroller2 input'), function (idx, obj) {
//            name = $(obj).attr('name');
//            value = $(obj).attr('value');
//            guest_info[name] = value;
//        });
        function validInput(){
            var flag=true;
//            var $inputExtends=$("input[name^=Extend]"),
//                    flag=true;
//            for(var i=0;i<$inputExtends.length;i++){
//                var tempobj=$($inputExtends[i]),
//                        value=tempobj.val();
//                if(!value){
//                    flag=false;
//                    break;
//                }
//            }
//            return flag;

            if (!username || !tel || !company || !position) {
                flag = false;
            }
            return flag;
        };
        if(!validInput()){
            $('#register_error').text('信息填写不完整');
            $('#register_error').show();
            return false;
        }
        infoSubmit();
    });
    //检测3g或wifi
    window.onload = function () {
        document.addEventListener("WeixinJSBridgeReady", function () {
            WeixinJSBridge.invoke('getNetworkType', {}, function (e) {
                network = e.err_msg.split(":")[1];  //结果在这里
                if (network == 'wifi') {
                    isWifi = true;
                }
            });
        }, false);
    }
}

$.fn.slideItem = function (options) {
    this.defaultOptions = {
        loop: false,
        startIdx: 0,
        startslide: function () {
        },
        afterslide: function () {
        }
    }
    var settings = $.extend({}, this.defaultOptions, options);
    var $this = $(this);
    this.curIdx = settings.startIdx;
    var doingSlideEnd = false, doingSlideStart = true;
    this.slideNext = function (slideToIdx) {
        lastIdx = this.curIdx;
        if (slideToIdx) {
            this.curIdx = slideToIdx;
        } else {
            if (this.curIdx >= $this.length - 1) {
                if (!settings.loop) {
                    settings.itemsEnd();
                    return false;
                }
                this.curIdx = 0;
            } else {
                this.curIdx++;
            }
        }
        $this.eq(lastIdx).removeClass('curItem').addClass("lastItem active").siblings().addClass('nextItem');
        setTimeout(function () {
            $this.eq($this.curIdx).addClass('curItem active');
        }, 1)
        //startslide函数放在这里了~~~~~囧
        settings.startslide();
    }
    this.slidePre = function () {
        lastIdx = this.curIdx;
        this.curIdx = 0;
        $this.eq(lastIdx).removeClass('curItem').addClass("nextItem active").siblings().addClass('lastItem');
        setTimeout(function () {
            $this.eq($this.curIdx).addClass('curItem active');
        }, 1)
    }
    $this.on('webkitTransitionEnd transitionend', function (e) {
        if (doingSlideEnd) {//因为需要滑两个item，所以每次切换都会执行两次slideStart
            doingSlideEnd = false;
            return false;
        }
        doingSlideEnd = true;
        if (e.target === this) {
            settings.afterslide()
        }
    });
    return this;
}
</script>
<script type="text/javascript">
    //未写完   实时更新分享参加人数
    var wxSetting = {
        //是否显示右上分享按钮
        hideOptionMenu: false,
        //是否显示底部工具栏
        hideToolbar: true,
        //分享的结构
        share: {
            "send2Friend": {
                "content": "" + share_text,
                "img": "",
                "link": "",
                "title": ""
            },
            "share2Friend": {
                "img": "",
                "link": "",
                "title": " - " + share_text
            },
            "share2QQBlog": {
                "content": " - " + share_text,
                "link": ""
            },
            "share2Email": {
                "content": " - " + share_text,
                "link": "",
                "title": ""
            }
        }
    };

    $(function () {
        init();
        //生成页面滑动
        var slide = $('.main_area_wrap').slideItem({
            loop: true,
            afterslide: function () {
                slide.removeClass('nextItem lastItem active');
            }
        })
    });

    $(document).ready(function () {
        //AJAX  获取报名状态
        var url = "<?php  echo $this->createMobileUrl('CheckSignupStatus', array(), true);?>";
        if (params.IsGuest == '') {
            //ajax
            $.ajax({
                type: 'post',
                url: url,
                dataType: 'json',
                data: {
                    id: params.InvitativeID,
                    from_user: params.GuestID
                },
                success: function (data) {
                    //alert('success');
                    if (data.status == 1) {
                        $('.btn_signup_wrap').html('');
                        $('<span class="detail_btn btn_signup_success"></span>').appendTo($('.btn_signup_wrap'));
                    } else {
                        //$('#register_error').html(data.msg);
                    }
                },
                error: function(data){
                    //alert('网络有问题，请稍后再试!!!');
                }
            });
        }
    });
</script>
</body>
</html>