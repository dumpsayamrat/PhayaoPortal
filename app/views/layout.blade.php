
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Portal PHAYAO</title>
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

<!-- start navigation -->
<header class="site-header" id="top">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>


                    <div class="nav-logo">
                        <a href="http://{{ Request::getHttpHost() }}">
                            <img style="max-width:35px;float: left;" class="img img-responsive" src="images/logo21.png" height="50">
                            <img style="" class="img img-responsive" src="images/logo20.png" height="50">
                        </a>
                    </div>

                </div>

                <div class="collapse navbar-collapse" id="main-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li><span></span><a href="http://{{ Request::getHttpHost() }}" class="home">หน้าแรก</a></li>
                        <li><span></span><a href="{{ Request::path()=='' ? '#3rd' : 'http://'.Request::getHttpHost().'/#3rd' }}" class="about">หน่วยงานราชการ</a></li>
                        <li><span></span><a href="{{ Request::path()=='' ? '#1st' : 'http://'.Request::getHttpHost().'/#1st' }}" class="portfolio">มหาวิยาลัยพะเยา</a></li>
                        <li><span></span><a href="{{ Request::path()=='' ? '#2nd' : 'http://'.Request::getHttpHost().'/#2nd' }}" class="map">ท่องเที่ยว</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </nav>
</header>
{{--<progress value="0"></progress>--}}
<!-- end navigation -->

<!-- start home -->

<section id="big-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <ul class="main-icons">
                    <li>{{--<a href="#"><img style="" class="img " src="images/gov.png"><!--<br>มหาวิทยาลัยพะเยา--></a>--}}
                        <div class="ih-item circle effect1"><a href="{{ Request::path()=='' ? '#3rd' : 'http://'.Request::getHttpHost().'/#3rd' }}">
                            <div class="spinner"></div>
                                <div class="img"><img src="images/gov1.png" alt="img"></div>
                                <div class="info">
                                    <div class="info-back">
                                        <h3>หน่วยงานราชการ</h3>
                                        <p>รวบรวมเว็บไซค์ที่เกี่ยวกับหน่วยงานราชการในจังหวัดพะเยา</p>
                                 </div>
                            </div>
                         </a></div>
                    </li>
                    <li>{{--<a href="#"><img style="" class="img " src="images/university.png"><!--<br>หน่วยงานราชการ--></a>--}}
                        <div class="ih-item circle effect1"><a href="{{ Request::path()=='' ? '#1st' : 'http://'.Request::getHttpHost().'/#1st' }}">
                                <div class="spinner"></div>
                                <div class="img"><img src="images/university3.png" alt="img"></div>
                                <div class="info">
                                    <div class="info-back">
                                        <h3>มหาวิทยาลัยพะเยา</h3>
                                        <p>รวบรวมเว็บไซค์ที่เกี่ยวกับมหาวิทยาลัยพะเยา</p>
                                    </div>
                                </div>
                            </a></div>
                    </li>
                    <li>{{--<a href="#"><img style="" class="img " src="images/traveler.png"><!--<br>ท่องเที่ยว--></a>--}}
                        <div class="ih-item circle effect1"><a href="{{ Request::path()=='' ? '#2nd' : 'http://'.Request::getHttpHost().'/#2nd' }}">
                                <div class="spinner"></div>
                                <div class="img"><img src="images/traveler2.png" alt="img" \></div>
                                <div class="info">
                                    <div class="info-back">
                                        <h3>ท่องเที่ยว</h3>
                                        <p>รวบรวมเว็บไซค์ที่เกี่ยวกับการท่องเที่ยวในจังหวัดพะเยา</p>
                                    </div>
                                </div>
                            </a></div>
                    </li>
                </ul>
            </div>
        </div>
        <div id="newsletter" class="col-md-12 wow fadeInDown animated hidden-phone1" data-wow-delay="10000" style="visibility: visible;text-align: center">
            <form id="form1" role="form" method="get">
                <div class="row" style="text-align: -webkit-center;">
                    <div style="" class="input-group">
                        <input type="text" class="form-control" placeholder="ค้นหา..." name="search" id="search">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search fa-2x"></i></button>
                          </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- end home -->
<div id="first-section" class="hidden-phone2">
    <div class="heading">
        <div class="container">
            <div class="row">
                <div id="newsletter" class="col-md-12 wow fadeInDown animated" data-wow-delay="2000" style="visibility: visible;">
                    <form id="form2" role="form" method="get">
                        <div class="row" style="text-align: -webkit-center;">
                            <div style="" class="input-group">
                                <input type="text" class="form-control" placeholder="ค้นหา..." name="search2" id="search2">
                                  <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="fa fa-search fa-2x"></i></button>
                                  </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@yield('content')

<footer>
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

<script>
    $(document).on('ready', function() {
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


    });
    $('#myTab a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });



</script>
<!-- end javascript -->
</body>
</html>