<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 6/12/2015
 * Time: 17:02
 */?>
<!DOCTYPE html>
<html lang="en">

<head>
    @yield('head')

    <meta charset="utf-8">
    <title>PHAYAO Portal</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    {{--<link rel="icon" type="image/png" href="images/favicon.png">--}}
    <link rel="stylesheet" href="/css/jquery-ui.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/animate.min.css">
    <link rel="stylesheet" href="/css/ihover.css">
    <link rel="stylesheet" href="/css/main.css">

</head>
<body>
<header class="p-header site-header" id="header">
    <div id="headd" class="container head-logo hidden-xs">
        <div class="ct-logo">
            <a href="http://{{ Request::getHttpHost() }}">
                {{--<img style="max-width:35px;float: left;" class="img img-responsive" src="images/logo21.png" height="50">--}}
                <img style="" class="img img-responsive" src="/images/main-logo.png" height="50">
                <div class="slogan">
                    พะเยาเริ่มที่นี่
                </div>
            </a>
        </div>
        <div class="weather" id="weather">
            <a href="https://weather.yahoo.com/thailand/phayao/phayao-1226090/" class="currently" target="_blank">
                <div class="icon current-icon icon-27"></div>
                <div class="current-conditions">
                    <div class="current-loc"> พะเยา,ประเทศไทย </div>
                    <div class="current-temp"></div>
                    <span class="current-desc"></span>
                </div>
            </a>
        </div>
        <div class="feedback">
            <a href="#">feedback</a>
        </div>

    </div>


    <nav id="nav" class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="visible-xs nav-logo">
                        <a href="http://{{ Request::getHttpHost() }}">
                            <img class="img img-responsive" src="/images/logo21.png" height="50">
                            <img class="img img-responsive" src="/images/logo20.png" height="50">
                        </a>
                    </div>

                </div>

                <div class="collapse navbar-collapse" id="main-menu">
                    <ul class="nav navbar-nav">
                        {{--<li><span></span><a href="http://{{ Request::getHttpHost() }}" class="home">หน้าแรก</a></li>
                        <li><span></span><a href="{{ Request::path()=='' ? '#e-services' : 'http://'.Request::getHttpHost().'/#e-services' }}" class="about">หน่วยงานราชการ</a></li>
                        <li><span></span><a href="{{ Request::path()=='' ? '#up' : 'http://'.Request::getHttpHost().'/#up' }}" class="portfolio">มหาวิยาลัยพะเยา</a></li>
                        <li><span></span><a href="{{ Request::path()=='' ? '#trip' : 'http://'.Request::getHttpHost().'/#trip' }}" class="map">ท่องเที่ยว</a></li>--}}
                        <li>
                            <a class="{{Request::path()=='/' ? 'active' : ''}}" id="tab-home" href="http://{{ Request::getHttpHost() }}">
                                <span class="home ihome-home">หน้าแรก</span>
                            </a>
                        </li>
                        <li>
                            <a id="tab-gov" href="{{ Request::path()=='/' ? '#e-services' : 'http://'.Request::getHttpHost().'/#e-services' }}">
                                <span class="ihome-gov home home">หน่วยงานราชการ</span>
                            </a>
                        </li>
                        <li>
                            <a id="tab-travel" href="{{ Request::path()=='/' ? '#trip' : 'http://'.Request::getHttpHost().'/#trip' }}">
                                <span class="ihome-travel home">ท่องเที่ยว</span>
                            </a>
                        </li>
                        <li>
                            <a id="tab-uni" href="{{ Request::path()=='/' ? '#up' : 'http://'.Request::getHttpHost().'/#up' }}">
                                <span class="ihome-uni home">มหาวิทยาลัยพะเยา</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{Request::path()=='events' ? 'active' : ''}}" href="{{'http://'.Request::getHttpHost().'/events'}}">
                                <span class="ihome-event home">กิจกรรม {{$countEventLive != 0 ? '<span class="badge">'.$countEventLive.'</span>':''}}</span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </nav>
</header>
<div id="search-form" class="search open">
    <div class="container">
        <div class="search-label">
            <h1>
                ค้นหา :
            </h1>
        </div>
        <form id="auto-search">
            <fieldset>
                <input id="search-terms" name="search-terms" type="search" placeholder="" />
                <button type="submit"><i class="fa fa-search"></i></button>
                {{--<input type="submit" value="Ok" />--}}
            </fieldset>
        </form>

    </div>
</div>

{{--<div id="menu-slide" class="slideout-menu">
    <h3>Menu <a href="#" class="slideout-menu-toggle"><i class="fa fa-times"></i></a></h3>
    <ul>
        <li><a href="http://{{ Request::getHttpHost() }}"><span class="home ihome-home">หน้าแรก</span></a></li>
        <li><a href="{{ Request::path()=='/' ? '#e-services' : 'http://'.Request::getHttpHost().'/#e-services' }}"><span class="ihome-gov home home">หน่วยงานราชการ</span></a></li>
        <li><a href="{{ Request::path()=='/' ? '#trip' : 'http://'.Request::getHttpHost().'/#trip' }}"><span class="ihome-travel home">ท่องเที่ยว</span></a></li>
        <li><a href="{{ Request::path()=='/' ? '#up' : 'http://'.Request::getHttpHost().'/#up' }}"><span class="ihome-uni home">มหาวิทยาลัยพะเยา</span></a></li>
        <li class=""><a id="toggle-search-menu" href="#"><span class="ihome-search home">ค้นหา</span></a></li>
    </ul>
</div>--}}
<div class="nav-menu hidden-xs">
    <ul class="menu">
        <li class="">
            <a class="menu-gov" href="{{ Request::path()=='/' ? '#e-services' : 'http://'.Request::getHttpHost().'/#e-services' }}">
                <img class="menu-img" src="/images/gov1.png">
                <span href="#e-services" class="menu-title">หน่วยงานราชการ</span>
            </a>
        </li>

        <li class="">
            <a class="menu-travel" href="{{ Request::path()=='/' ? '#trip' : 'http://'.Request::getHttpHost().'/#trip' }}">
                <img class="menu-img" src="/images/traveler2.png">
                <span href="#trip" class="menu-title">ท่องเที่ยว</span>
            </a>
        </li>

        <li class="">
            <a class="menu-uni" href="{{ Request::path()=='/' ? '#up' : 'http://'.Request::getHttpHost().'/#up' }}">
                <img class="menu-img" src="/images/university3.png">
                <span href="#e-services" class="menu-title">มหาวิทยาลัย</span>
            </a>
        </li>
    </ul>
</div>

<div id="layout-content" class="layout-content">

    <div style="text-align: -webkit-center;height: 8vh;" class="container">
        <div class="layout-breadcrumd">
            @if(!Request::is('/'))
                @if (isset($breadcrumbs))
                    <ol class="breadcrumb">
                        @foreach ($breadcrumbs as $breadcrumb)
                            @if (!$breadcrumb->last)
                                <li><a href="{{{ $breadcrumb->url }}}">{{{ $breadcrumb->title }}}</a></li>
                            @else
                                <li class="active">{{{ $breadcrumb->title }}}</li>
                            @endif
                        @endforeach
                    </ol>
                @endif
            @endif
        </div>
    </div>

    @yield('content')

</div>

<ul class="menu-button">
    <li id="back-top" class="menu-item">
        <i class="fa fa-arrow-up fa-2x"></i>
    </li>
</ul>

<footer class="">
    <div class="container">
        <div class="row">
            <div style="text-align: -webkit-center;" class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <div class="foot-logo">
                    <a href="http://{{ Request::getHttpHost() }}">
                        <img style="max-width: 49px;float: left;" class="img img-responsive" src="/images/footer-logo1.png" height="50">
                        <img style="" class="img img-responsive" src="/images/footer-desc-logo.png" height="50">
                    </a>
                </div>
            </div>
            <div style="padding-top: 10px" class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <a href="#">เกี่ยวกับ Portal Phayao</a>
            </div>
            <div style="padding-top: 10px" class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <a href="{{URL::to('/site-index')}}">site Index</a>
            </div>
            <div style="padding-top: 10px" class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <a href="#">ติดต่อเรา</a>
            </div>
        </div>
    </div>
</footer>

<!-- end contact -->

{{--start javascrict--}}

<script src="/js/jquery.js"></script>
<script src="/js/jquery.simple-text-rotator.js"></script>
<script type="text/javascript" src="/js/custom.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.simpleWeather.js"></script>
@yield('javascript')
<script>
    var root = location.protocol + '//' + location.host;
    var input=0;
    function runAutoComplete(){
        $('#search-terms').autocomplete({
            source: root+'/search',
            minLenght:2,
            focus: function(e,ui){
                $('#terms-search').text("ผลการค้นหา \""+$('input[type=search]').val()+"\"");
            },
            select : function(e,ui){
                $.ajax(
                        {
                            url: root+'/search/str/'+ui.item.value+'/keywords_top',
                            type: 'GET'
                        }).done(
                        function(data)
                        {                        //console.log( data );
                            $('#layout-content').html($(data).find('div#ajax-search')).fadeIn('slow');
                        }
                );
            },
            open: function(event, ui) {
                $("#ui-autocompelte").css("z-index", 1000);
            }
        });
    }

    $(document).on('ready', function(event) {
        /*up to date url path*/
        checkUrl();

        /* search when submit */
        $('#auto-search').submit(function(e){
        $('.ui-autocomplete').css("display","none");
        $.ajax(
                {
                    url: root+'/search/str/'+e.currentTarget[1].value+'/keywords_top',
                    type: 'GET'
                    //dataType: 'html',
                    //data: {id: selected}
                }).done(
                function(data)
                {
                    $('#layout-content').html($(data).find('div#ajax-search')).fadeIn('slow');
                }
            );
            e.preventDefault();
        });

        /* search autocomplete when key press*/
        $('input[type=search]').focus(function()
        {
                $('input[type=search]').on('keypress keyup',function(e){

                    if(!input==1){
                        //console.log(this.value);

                            $('html, body').animate(
                                    {scrollTop:150},
                                    'slow',
                                    function(){
                                        if($(window).scrollTop() == 150){
                                            $('#headd').css("display", "none");
                                            $(window).scrollTop(0);
                                        }
                                        runAutoComplete();
                                        /* ajax .load */
                                        var content = '<?php echo URL::to('/search/str/-11111/keywords_top'); ?>';
                                        $.ajax(
                                                {
                                                    url: content,
                                                    type: 'GET'
                                                    //dataType: 'html',
                                                    //data: {id: selected}
                                                }).done(
                                                function(data)
                                                {
                                                    $('#tab-gov').click(function(e){
                                                        window.location.href = root+"/?#e-services";
                                                    });
                                                    $('#tab-travel').click(function(){
                                                        window.location.href = root+"/?#trip";
                                                    });
                                                    $('#tab-uni').click(function(){
                                                        window.location.href = root+"/?#up";
                                                    });
                                                    $('#layout-content').html($(data).find('div#ajax-search')).fadeIn('slow');
                                                    $('#terms-search').text("ผลการค้นหา \""+$('input[type=search]').val()+"\"");
                                                    $('input[type=search]').on('keypress keyup',function(e){
                                                        $('#terms-search').text("ผลการค้นหา \""+$('input[type=search]').val()+"\"");
                                                    });

                                                }
                                        );

                                    }
                            );

                    }
                    if(e.keyCode==8&&!this.value ){}
                    input=1;

                });

        });
    });
    var currentlyDesc = [
            'พายุเทอร์นาโด',
            'พายุโซนร้อน',
            'พายุเฮอริเคน',
            'พายุรุนแรง',
            'พายุฝนฟ้าคะนอง',
            'ฝนและหิมะ',
            'ฝนและลูกเห็บ',
            'หิมะและลูกเห็บ',
            'ฝนตกปรอยๆ',
            'ฝนตกปรอยๆ',
            'ฝนตกปรอยๆ',
            'ฝนตกหนัก',
            'ฝนตกหนัก',
            'ละอองหิมะ',
            'อาบน้ำหิมะ',
            'หิมะพัด',
            'หิมะ',
            'ลูกเห็บ',
            'หิมะฝน',
            'ฝุ่น',
            'มีหมอกหนา',
            'หมอกควัน',
            'ควัน',
            'ลมพัด',
            'มีลมแรง',
            'เย็น',
            'มีเมฆมาก',
            'มีเมฆเป็นส่วนใหญ่',
            'มีเมฆเป็นส่วนใหญ่',
            'มีเมฆบางส่วน',
            'มีเมฆบางส่วน',
            'ท้องฟ้าโปร่ง',
            'มีแดด ,แดดจัด',
            'ท้องฟ้าโปร่ง',
            'ท้องฟ้าโปร่ง',
            'ฝนและลูกเห็บ',
            'อากาศร้อน',
            'ฝนฟ้าคะนอง',
            'พายุฝนฟ้าคะนองกระจายอยู่',
            'พายุฝนฟ้าคะนองกระจายอยู่',
            'ฝนบางส่วน',
            'หิมะตกหนัก',
            'หิมะกระจัดกระจาย',
            'หิมะตกหนัก',
            'มีเมฆบางส่วน',
            'มีฝนฟ้าคะนอง',
            'หิมะ',
            'ฝนฟ้าคะนอง'
    ];

    // Custom autocomplete instance.
    $.widget( "app.autocomplete", $.ui.autocomplete, {

        // Which class get's applied to matched text in the menu items.
        options: {
            highlightClass: "ui-state-highlight"
        },

        _renderItem: function( ul, item ) {

            // Replace the matched text with a custom span. This
            // span uses the class found in the "highlightClass" option.
            var re = new RegExp( "(" + this.term + ")", "gi" ),
                    cls = this.options.highlightClass,
                    template = "<span class='" + cls + "'>$1</span>",
                    label = item.label.replace( re, template ),
                    $li = $( "<li/>" ).appendTo( ul );

            // Create and return the custom menu item content.
            $( "<a/>" ).attr( "href", "#" )
                    .html( label )
                    .appendTo( $li );

            return $li;

        }

    });
    $(document).on('ready', function(event) {
        $('a[target=_blank]').click(function(e){
            //console.log(e)
            $.ajax({
                url:root+'/addfrequency',
                data : { link:e.currentTarget.dataset.item,type:e.currentTarget.dataset.type},
                method:'POST',
                success:function(data){
                    //alert('done');
                }
            });

        });
        $('#back-top').click(function(){
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');
        });
        var winHeight = $(window).height(),
                docHeight = $(document).height(),
                progressBar = $('progress'),
                max, value;

        /* Set the max scrollable area */
        max = docHeight - winHeight;
        progressBar.attr('max', max);

        $(document).on('scroll', function(){
            value = $(window).scrollTop();
            if(value<=0) progressBar.attr('value', value);
            else progressBar.attr('value', value+30);
        });
        $('#search2').autocomplete({
            source:'search',
            minLenght:2,
            select : function(e,ui){
                window.open(ui.item.link, '_blank');
            },
            open: function(event, ui) {
                $("#ui-autocompelte").css("z-index", 1000);
            }
        }).autocomplete( "instance" )._renderItem = function( ul, item ) {
            return $( "<li>" )
                    .append("<strong>"+item.name+"</strong><br><small> -"+item.descript+"</small>")
                    .appendTo( ul );
        };
        $('#search').autocomplete({
            source:'search',
            highlightClass: "bold-text",
            minLenght:2,
            select : function(e,ui){
                window.open(ui.item.link, '_blank');
            },
            open: function(event, ui) {
                $("#ui-autocompelte").css("z-index", 1000);
            }
        }).autocomplete( "instance" )._renderItem = function( ul, item ) {
            return $( "<li>" )
                    .append("<strong>"+item.name+"</strong><br><small> -"+item.descript+"</small>")
                    .appendTo( ul );
        };
        /// Back to top
        $('#back-top').hide();
        $('.nav-menu').hide();
        $(window).scroll(function(){
            if($(window).scrollTop() >= 350)
            {
                $('#back-top').fadeIn(1);
                $('.nav-menu').fadeIn(1);
                if (!$('.slideout-menu').hasClass("open")) {
                    $('.menu-button').fadeIn(500);
                }
            }
            else
            {
                $('#back-top').fadeOut(500);
                $('.nav-menu').fadeOut(500);
                if (!$('.slideout-menu').hasClass("open")) {
                    $('.menu-button').fadeOut(500);
                }
            }
        });

        // parallax header
        $(window).scroll( function(){
            var scroll = $(window).scrollTop(), slowScroll = scroll/2;
            $('.head-logo').css({ transform: "translateY(" + slowScroll + "px)" });
        });

        // sticky nav
        var nav      = $('nav');
        var content  = $('.layout-content');
        var navHomeY = nav.offset().top;
        var isFixed  = false;
        var $w       = $(window);

        $w.scroll(function(){
            nav.css({
                background: '#E91E63'
            });
            var scrollTop = $w.scrollTop();
            var shouldBeFixed = scrollTop > navHomeY;
            if ( shouldBeFixed && ! isFixed ){
                nav.css({
                    //position: 'fixed',
                    width: '100%',
                    top: 0,
                    opacity: 0.9,
                    background: '#E91E63'
                });

                content.css({
                    //paddingTop: '80px'
                });

                isFixed = true;
            }
            else if ( ! shouldBeFixed && isFixed ){
                nav.css({
                    position: 'relative',
                    width: '100%',
                    opacity: 0.9,background: '#E91E63'
                });

                content.css({
                    paddingTop: '0'
                });

                isFixed = false;
            }
        });

    });

    $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    var wUnit = '';
    weather('Phayao', ' ', "c");
    // Get the Weather!
    function weather(location, woeid, unit) {
        $.simpleWeather({
            location: location,
            woeid: woeid,
            unit: unit,
            success: function(w) {
                //$('.loading').fadeOut();

                // Style background for hot/cold temps
                if (w.units.temp === 'F') {
                    if (w.temp > 80) {
                        $('body').addClass('hot').removeClass('cold');
                    } else if (w.temp < 40) {
                        $('body').addClass('cold').removeClass('hot');
                    } else {
                        $('body').removeClass('hot cold');
                    }
                }

                // If there isn't a region, show the country instead
                if (w.region === '') {
                    w.region = w.country;
                }

                // Current conditions data
                //var displayLoc = w.city + ', ' + w.region;
                //$(".city h1").html(displayLoc);
                for(var i=0;i<currentlyDesc.length;i++){
                    if(i== w.code){
                        w.currently=currentlyDesc[i];
                    }
                }
                $('.current-icon').addClass('icon-' + w.code);
                $('.current-temp').html(w.low + ''+' ~ '+w.high + '&deg;'+ w.units.temp);
                $('.current-desc').html(w.currently);
            },
            error: function(error) {
                $(".weather").html('<p>' + error + '</p>');
            }

        });

    };

    function checkUrl(){
        if($(location).attr('href')==root+"/?#e-services"){
            window.history.pushState("object or string", "Title", "/#e-services");
        }else if($(location).attr('href')==root+"/?#trip"){
            window.history.pushState("object or string", "Title", "/#trip");
        }else if($(location).attr('href')==root+"/?#up"){
            window.history.pushState("object or string", "Title", "/#up");
        }

    }




</script>
<!-- end javascript -->
</body>
</html>