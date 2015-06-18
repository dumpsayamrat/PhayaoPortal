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
    <meta charset="utf-8">
    <title>Portal PHAYAO v2</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    {{--<link rel="icon" type="image/png" href="images/favicon.png">--}}
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/ihover.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<header class="p-header site-header" id="header">
    <div class="container head-logo hidden-xs">
        <div class="ct-logo">
        <a href="http://{{ Request::getHttpHost() }}">
            {{--<img style="max-width:35px;float: left;" class="img img-responsive" src="images/logo21.png" height="50">--}}
            <img style="" class="img img-responsive" src="images/logo20.png" height="50">
        </a>
        </div>
        <div class="weather" id="weather">
            <div class="currently">
                <div class="icon current-icon icon-27"></div>
                <div class="current-conditions">
                    <div class="current-loc"> พะเยา,ประเทศไทย </div>
                    <div class="current-temp"></div>
                    <span class="current-desc"></span>
                </div>
            </div>
        </div>
    </div>


    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="visible-xs nav-logo">
                        <a href="http://{{ Request::getHttpHost() }}">
                            <img class="img img-responsive" src="images/logo21.png" height="50">
                            <img class="img img-responsive" src="images/logo20.png" height="50">
                        </a>
                    </div>

                </div>

                <div class="collapse navbar-collapse" id="main-menu">
                    <ul class="nav navbar-nav">
                        {{--<li><span></span><a href="http://{{ Request::getHttpHost() }}" class="home">หน้าแรก</a></li>
                        <li><span></span><a href="{{ Request::path()=='' ? '#3rd' : 'http://'.Request::getHttpHost().'/#3rd' }}" class="about">หน่วยงานราชการ</a></li>
                        <li><span></span><a href="{{ Request::path()=='' ? '#1st' : 'http://'.Request::getHttpHost().'/#1st' }}" class="portfolio">มหาวิยาลัยพะเยา</a></li>
                        <li><span></span><a href="{{ Request::path()=='' ? '#2nd' : 'http://'.Request::getHttpHost().'/#2nd' }}" class="map">ท่องเที่ยว</a></li>--}}
                        <li><a href="http://{{ Request::getHttpHost() }}"><span class="home ihome-home">หน้าแรก</span></a></li>
                        <li><a href="{{ Request::path()=='/' ? '#3rd' : 'http://'.Request::getHttpHost().'/#3rd' }}"><span class="ihome-gov home home">หน่วยงานราชการ</span></a></li>
                        <li><a href="{{ Request::path()=='/' ? '#2nd' : 'http://'.Request::getHttpHost().'/#2nd' }}"><span class="ihome-travel home">ท่องเที่ยว</span></a></li>
                        <li><a href="{{ Request::path()=='/' ? '#1st' : 'http://'.Request::getHttpHost().'/#1st' }}"><span class="ihome-uni home">มหาวิทยาลัยพะเยา</span></a></li>
                        <li class="hidden-xs"><a id="toggle-search" href="#"><span class="ihome-search home">ค้นหา</span></a></li>
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
        <form action="">
            <fieldset>
                <input name="search-terms" type="search" placeholder="" />
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
        <li><a href="{{ Request::path()=='/' ? '#3rd' : 'http://'.Request::getHttpHost().'/#3rd' }}"><span class="ihome-gov home home">หน่วยงานราชการ</span></a></li>
        <li><a href="{{ Request::path()=='/' ? '#2nd' : 'http://'.Request::getHttpHost().'/#2nd' }}"><span class="ihome-travel home">ท่องเที่ยว</span></a></li>
        <li><a href="{{ Request::path()=='/' ? '#1st' : 'http://'.Request::getHttpHost().'/#1st' }}"><span class="ihome-uni home">มหาวิทยาลัยพะเยา</span></a></li>
        <li class=""><a id="toggle-search-menu" href="#"><span class="ihome-search home">ค้นหา</span></a></li>
    </ul>
</div>--}}

<div class="layout-content">
@yield('content')
</div>
<ul class="menu-button">
    <a class="menu menu-gov" href="{{ Request::path()=='/' ? '#3rd' : 'http://'.Request::getHttpHost().'/#3rd' }}">
        <li class="menu-item">
            {{----}}
            <img class="menu-img" src="/images/gov1.png">
            <span href="#3rd" class="menu-title">หน่วยงานราชการ</span>
            {{--as--}}
        </li>
    </a>
    <a class="menu menu-travel" href="{{ Request::path()=='/' ? '#2nd' : 'http://'.Request::getHttpHost().'/#2nd' }}">
    <li class="menu-item ">
        {{----}}
            <img class="menu-img" src="/images/traveler2.png">
            <span href="#2nd" class="menu-title">ท่องเที่ยว</span>
        {{----}}
    </li>
    </a>

    <a class="menu menu-uni" href="{{ Request::path()=='/' ? '#1st' : 'http://'.Request::getHttpHost().'/#1st' }}">
        <li class="menu-item">
            {{----}}
            <img class="menu-img" src="/images/university3.png">
            <span href="#3rd" class="menu-title">มหาวิทยาลัย</span>
            {{--as--}}
        </li>
    </a>
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
                        <img style="max-width: 49px;float: left;" class="img img-responsive" src="images/Untitled.png" height="50">
                        <img style="" class="img img-responsive" src="images/logo12.png" height="50">
                    </a>
                </div>
            </div>
            <div style="padding-top: 10px" class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <a href="#">เกี่ยวกับ Portal Phayao</a>
            </div>
            <div style="padding-top: 10px" class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <a href="#">นโยบายการใช้งาน</a>
            </div>
            <div style="padding-top: 10px" class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <a href="#">ติดต่อเรา</a>
            </div>
        </div>
    </div>
</footer>

<!-- end contact -->

{{--start javascrict--}}

<script src="js/jquery.js"></script>
<script src="js/jquery.simple-text-rotator.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.simpleWeather.js"></script>

<script>
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
            'ลูกเห็บ',
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
  /*  $(document).ready(function () {
        $('#toggle-search-menu').on('click', function(event){
            event.preventDefault();
            // create menu variables
            var slideoutMenu = $('.slideout-menu');
            var slideoutMenuWidth = $('.slideout-menu').width();

            // toggle open class
            slideoutMenu.toggleClass("open");

            // slide menu
            if (slideoutMenu.hasClass("open")) {
                slideoutMenu.animate({
                    left: "0px"
                });
            } else {
                slideoutMenu.animate({
                    left: -slideoutMenuWidth
                }, 250);
            }
            $('html, body').animate({scrollTop:0}, 'slow');
            var isMobile = window.matchMedia("only screen and (max-width: 760px)");

            if (!isMobile.matches) {
                $('menu-button-form, #toggle-search').toggleClass('open');
            }else{
                $('#search-form, #toggle-search').toggleClass('open show');
            }

            $('#search-form input[type=search]').select();
            return false;
        });
        $('.slideout-menu-toggle').on('click', function(event){
            event.preventDefault();
            // create menu variables
            var slideoutMenu = $('.slideout-menu');
            var slideoutMenuWidth = $('.slideout-menu').width();

            // toggle open class
            slideoutMenu.toggleClass("open");

            // slide menu
            if (slideoutMenu.hasClass("open")) {
                slideoutMenu.animate({
                    left: "0px"
                });
            } else {
                $('.menu-button').css('display','block');
                slideoutMenu.animate({
                    left: -slideoutMenuWidth
                }, 250);
            }

        });
        $('.menu-button').on('click', function(event){
            event.preventDefault();
            // create menu variables
            var slideoutMenu = $('.slideout-menu');
            var slideoutMenuWidth = $('.slideout-menu').width();

            // toggle open class
            slideoutMenu.toggleClass("open");

            // slide menu
            if (slideoutMenu.hasClass("open")) {
                $(this).css('display','none');
                slideoutMenu.animate({
                    left: "0px"
                });
            } else {
                slideoutMenu.animate({
                    left: -slideoutMenuWidth
                }, 250);
            }
        });

    });*/
    /*$(document).on('click',function(event) {
        var target = $(event.target);
        if (!target.is('.slideout-menu')) {
            $('.slideout-menu').toggleClass('open');
        }
    });*/

    $(document).on('ready', function(event) {
        $('a[target=_blank]').click(function(e){
           // return false;

            var root = location.protocol + '//' + location.host;
            //alert(root+'/addfrequency1');
            $.ajax({
                url:root+'/addfrequency',
                data : { link:e.currentTarget.href},
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
        $('.menu-button').hide();
        $(window).scroll(function(){
            if($(window).scrollTop() >= 700)
            {
                $('#back-top').fadeIn(500);
                if (!$('.slideout-menu').hasClass("open")) {
                    $('.menu-button').fadeIn(500);
                }
            }
            else
            {
                $('#back-top').fadeOut(500);
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
                background: '#f5008a'
            });
            var scrollTop = $w.scrollTop();
            var shouldBeFixed = scrollTop > navHomeY;
            if ( shouldBeFixed && ! isFixed ){
                nav.css({
                    //position: 'fixed',
                    width: '100%',
                    top: 0,
                    opacity: 0.9,
                    background: '#f5008a'
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
                    opacity: 0.9,background: '#f5008a'
                });

                content.css({
                    paddingTop: '0'
                });

                isFixed = false;
            }
        });

    });
    /*(function($) {

        // Handle click on toggle search button
        $('#toggle-search').click(function() {
            $('#search-form, #toggle-search').toggleClass('open');
            $('#search-form input[type=search]').select();
            return false;
        });

        // Handle click on search submit button
        $('#search-form input[type=submit]').click(function() {
            $('#search-form, #toggle-search').toggleClass('open');
            return true;
        });

        // Clicking outside the search form closes it
        $(document).on('click',function(event) {
            var target = $(event.target);

            if (!target.is('#toggle-search') && !target.closest('#search-form').size()) {
                $('#search-form, #toggle-search').removeClass('open show');
            }
        });
        $(window).resize(function(){
            var target = $(event.target);
            var isMobile = window.matchMedia("only screen and (max-width: 760px)");

            if (!isMobile.matches) {
                $('#search-form, #toggle-search').removeClass('open show');
            }

        });
        $('#search-collapse').click(function(){
                $('#search-form, #toggle-search').toggleClass('open show');
                 $('#search-form input[type=search]').select();
                return false;
        });

    })(jQuery);*/
    $('#myTab a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
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
                $('.current-temp').html(w.temp + ''+' ~ '+w.high + '&deg;'+ w.units.temp);
                $('.current-desc').html(w.currently);
            },
            error: function(error) {
                $(".weather").html('<p>' + error + '</p>');
            }

        });

    };




</script>
<!-- end javascript -->
</body>
</html>