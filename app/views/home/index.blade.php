<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 8/3/2558
 * Time: 16:40
 */?>
@extends('layout')

@section('content')

    <div class="event container" id="4th">
        <div class="row content">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 grid cs-style-1">
                <h1> <i class="fa fa-bullhorn"></i> เทศกาลและงานประเพณี จังหวัดพะเยา</h1>
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php $i=0;?>
                        @foreach($events as $event)
                            @if($event->type == 2&&$event->status!=-2)
                                <li data-target="#carousel-example-generic" data-slide-to="{{$i}}" class="{{ $i==0 ? 'active' : '' }}"></li>
                                <?php $i++;?>
                            @endif
                        @endforeach
                    </ol>
                    <?php $c=0;?>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        @foreach($events as $event)
                            @if($event->type == 2&&$event->status!=-2)
                                <?php $c++;?>
                                <div class="item {{ $c==1 ? 'active' : '' }}">
                                    <div class="carousel-caption carousel-caption-first">
                                        <?php
                                        if($event->status == -1){
                                            echo'<h3>อยู่ในช่วงกิจกรรม</h3>';
                                        }elseif($event->status==-3){
                                            echo '<h3>เหลืออีก '.$event->hr.' ช.ม.</h3>';
                                        }else{
                                            echo '<h3>เหลืออีก '.$event->status.' วัน</h3>';
                                        }
                                        ?>
                                    </div>
                                    <img src="/uploads/events/{{$event->img}}" alt="">
                                    <div class="carousel-caption carousel-caption-second">
                                        <h3>{{$event->name}}</h3>
                                        <p>{{ $event->descript }} ผู้สนใจเข้าร่วมงานได้ระหว่างวันที่ {{$event->start.'  ถึงวันที่  '.$event->finish}}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                {{--<figure>
                    <img src="/uploads/events/{{$event->img}}">
                    <figcaption>
                        <h3>Camera</h3>
                        <span>Jacob Cummings</span>
                        <a href="http://dribbble.com/shots/1115632-Camera">Take a look</a>
                    </figcaption>
                </figure>--}}
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 grid cs-style-1">
                <h1> <i class="fa fa-bullhorn"></i> มหาวิทยาลัยพะเยา</h1>
                <div id="carousel-2" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php $i=0;?>
                        @foreach($events as $event)
                            @if($event->type == 1&&$event->status!=-2)
                                <li data-target="#carousel-2" data-slide-to="{{$i}}" class="{{ $i==0 ? 'active' : '' }}"></li>
                                <?php $i++;?>
                            @endif
                        @endforeach
                    </ol>
                    <?php $c=0;?>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        @foreach($events as $event)
                            @if($event->type == 1&&$event->status!=-2)
                                <?php $c++;?>
                                <div class="item {{ $c==1 ? 'active' : '' }}">
                                    <div class="carousel-caption carousel-caption-first">
                                        <?php
                                        if($event->status == -1){
                                            echo'<h3>อยู่ในช่วงกิจกรรม</h3>';
                                        }elseif($event->status==-3){
                                            echo '<h3>เหลืออีก '.$event->hr.' ช.ม.</h3>';
                                        }else{
                                            echo '<h3>เหลืออีก '.$event->status.' วัน</h3>';
                                        }
                                        ?>
                                    </div>
                                    <img src="/uploads/events/{{$event->img}}" alt="">
                                    <div class="carousel-caption carousel-caption-second">
                                        <h3>{{$event->name}}</h3>
                                        <p>{{ $event->descript }} ผู้สนใจเข้าร่วมงานได้ระหว่างวันที่ {{$event->start.'  ถึงวันที่  '.$event->finish}}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-2" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-2" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="gov" id="3rd">
        <div class="container">
            <div class="row terminal">
                <div class="col-md-12" style="padding-left: 1px;padding-right: 1px">
                    <div class="title-top">
                        <div class="title">
                            <div style="float: left" class="hi-icon-wrap hi-icon-effect-4 hi-icon-effect-4a"><i class="fa fa-university fa-border hi-icon"></i></div>
                            <h2 style="float: left;  margin-top: 35px;">หน่วยงานราชการ</h2>
                        </div>
                        <ul style="list-style: none; float: left;" class="nav-tabs" role="tablist" id="myTab">
                            @foreach($ucs as $data)
                                @if($data->name == "หน่วยงานราชการ")
                                    <?php $g=0;?>
                                    @foreach($data->MajorCategories as $mjc) <?php $g++;?>
                                        <li role="presentation" class="{{ $g==1 ? 'active' : '' }}"  data-toggle="tooltip" data-placement="bottom" title="{{$mjc->name}}">
                                            <a href="#tab_{{$g}}" role="tab" data-toggle="tab">
                                                <img src="images/gov_{{$g}}.png" /></a>
                                        </li>
                                    @endforeach
                                @endif
                            @endforeach
                            {{--<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>--}}
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row content">
                        <div class="col-lg-12">
                            <div role="tabpanel">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    @foreach($ucs as $data)
                                        @if($data->name == "หน่วยงานราชการ")
                                            <?php $g=0;?>
                                            @foreach($data->MajorCategories as $mjc) <?php $g++;?>
                                                <div role="tabpanel" class="tab-pane{{ $g==1 ? ' active' : '' }}" id="tab_{{$g}}">
                                                    <?php $h=0;?>
                                                    @foreach($mjc->MiddleCategories as $mdc)
                                                        <h3 class="color{{$h}}">
                                                            <a>{{$mdc->name}}</a>
                                                        </h3>
                                                        <div class="row">
                                                        @foreach($mdc->Link as $link )
                                                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                                                    <a href="{{$link->link}}" target="_blank">
                                                                        <div class="media">
                                                                            <div class="media-left pull-left">
                                                                                <img class="media-object" src="/uploads/{{$link->img}}" alt="{{$link->name}}">
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <h4 class="media-heading">{{$link->name}}</h4>
                                                                                <small class="visible-md visible-lg">-{{$link->descript}}</small>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                        @endforeach
                                                        </div>
                                                        <?php $h++;?>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="uni" id="1st">
        <div class="container">
            <div class="row terminal">
                <div class="col-md-12" style="padding-left: 1px;padding-right: 1px">
                    <div class="title-top">
                        <div class="title">
                            <div style="float: left" class="hi-icon-wrap hi-icon-effect-4 hi-icon-effect-4a"><i class="fa fa-graduation-cap fa-border hi-icon"></i></div>
                            <h2 style="float: left;  margin-top: 35px;">มหาวิทยาลัยพะเยา</h2>
                        </div>
                        <ul style="list-style: none; float: left;  margin: 5px 0 0 30px!important;" class="nav-tabs" role="tablist" id="myTab">
                            <li role="presentation" class="active"  data-toggle="tooltip" data-placement="bottom" title="ทั่วไป">
                                <a href="#tab_genaral" role="tab" data-toggle="tab">
                                    <img src="images/uni1.png" /></a>
                            </li>
                            <li role="presentation"  data-toggle="tooltip" data-placement="bottom" title="ผู้สนใจเข้าศึกษา">
                                <a href="#tab_student" aria-controls="student" role="tab" data-toggle="tab">
                                    <img src="images/uni2.png" /></a>
                            </li>
                            <li role="presentation"  data-toggle="tooltip" data-placement="bottom" title="บุคคลภายยนอก">
                                <a href="#tab_personel" aria-controls="personel" role="tab" data-toggle="tab">
                                    <img src="images/uni3.png" /></a>
                            </li>
                            {{--<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>--}}
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row content">
                        <div class="col-lg-12">
                            <div role="tabpanel">
                                <!-- Tab panes -->
                                <div class="tab-content">

                                    @foreach($ucs as $data)
                                        @if($data->name=="ทั่วไป")
                                            <div role="tabpanel" class="tab-pane active" id="tab_genaral">{{--genaral--}}
                                                @foreach($data->MajorCategories as $mjc)
                                                    <h3 class="color0">
                                                        <a>ข้อมูลมหาวิทยาลัย</a>
                                                    </h3>
                                                    <div class="row color0">
                                                         @foreach($mjc->MiddleCategories as $mdc)
                                                            @foreach($mdc->Link as $link )
                                                                @if($link->MiddleCategories->name=="ข้อมูลมหาวิทยาลัย")
                                                                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                                                        <a class="color0" href="{{$link->link}}" target="_blank">
                                                                            <div class="media">
                                                                                <div class="media-left pull-left">
                                                                                    <img class="media-object" src="/uploads/{{$link->img}}" alt="{{$link->name}}">
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <h4 class="media-heading">{{$link->name}}</h4>
                                                                                    <small class="visible-md visible-lg">-{{$link->descript}}</small>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                         @endforeach
                                                    </div>
                                                    <h3 class="color1">
                                                        <a>ข้อมูลคณะ/วิทยาลัย/วิทยาเขต</a>
                                                    </h3>
                                                    <div class="row">
                                                        @foreach($mjc->MiddleCategories as $mdc)
                                                            @foreach($mdc->Link as $link )
                                                                @if($link->MiddleCategories->name=="ข้อมูลคณะ/วิทยาลัย/วิทยาเขต")
                                                                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                                                        <a href="{{$link->link}}" target="_blank">
                                                                            <div class="media">
                                                                                <div class="media-left pull-left">
                                                                                    <img class="media-object" src="/uploads/{{$link->img}}" alt="{{$link->name}}">
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <h4 class="media-heading">{{$link->name}}</h4>
                                                                                    <small class="visible-md visible-lg">-{{$link->descript}}</small>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </div>
                                                    <h3 class="color2">
                                                        <a>ติดต่อมหาวิทยาลัย</a>
                                                    </h3>
                                                    <div class="row">
                                                        @foreach($mjc->MiddleCategories as $mdc)
                                                            @foreach($mdc->Link as $link )
                                                                @if($link->MiddleCategories->name=="ติดต่อมหาวิทยาลัย")
                                                                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                                                        <a href="{{$link->link}}" target="_blank">
                                                                            <div class="media">
                                                                                <div class="media-left pull-left">
                                                                                    <img class="media-object" src="/uploads/{{$link->img}}" alt="{{$link->name}}">
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <h4 class="media-heading">{{$link->name}}</h4>
                                                                                    <small class="visible-md visible-lg">-{{$link->descript}}</small>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>
                                        @elseif($data->name=="ผู้สนใจเข้าศึกษา")
                                            <div role="tabpanel" class="tab-pane" id="tab_student">{{--student--}}
                                                @foreach($data->MajorCategories as $mjc)
                                                    <h3 class="color0">
                                                        <a>การรับสมัครศึกษาต่อ</a>
                                                    </h3>
                                                    <div class="row">
                                                        @foreach($mjc->MiddleCategories as $mdc)
                                                            @foreach($mdc->Link as $link )
                                                                @if($link->MiddleCategories->name=="การรับสมัครศึกษาต่อ")
                                                                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                                                        <a href="{{$link->link}}" target="_blank">
                                                                            <div class="media">
                                                                                <div class="media-left pull-left">
                                                                                    <img class="media-object" src="/uploads/{{$link->img}}" alt="{{$link->name}}">
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <h4 class="media-heading">{{$link->name}}</h4>
                                                                                    <small class="visible-md visible-lg">-{{$link->descript}}</small>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </div>
                                                    <h3 class="color1">
                                                        <a>ช่องทางการรับสมัคร</a>
                                                    </h3>
                                                    <div class="row">
                                                        @foreach($mjc->MiddleCategories as $mdc)
                                                            @foreach($mdc->Link as $link )
                                                                @if($link->MiddleCategories->name=="ช่องทางการรับสมัคร")
                                                                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                                                        <a href="{{$link->link}}" target="_blank">
                                                                            <div class="media">
                                                                                <div class="media-left pull-left">
                                                                                    <img class="media-object" src="/uploads/{{$link->img}}" alt="{{$link->name}}">
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <h4 class="media-heading">{{$link->name}}</h4>
                                                                                    <small class="visible-md visible-lg">-{{$link->descript}}</small>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </div>
                                                    <h3 class="color2">
                                                        <a>ชีวิตและความเป็นอยู่</a>
                                                    </h3>
                                                    <div class="row">
                                                        @foreach($mjc->MiddleCategories as $mdc)
                                                            @foreach($mdc->Link as $link )
                                                                @if($link->MiddleCategories->name=="ชีวิตและความเป็นอยู่")
                                                                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                                                        <a href="{{$link->link}}" target="_blank">
                                                                            <div class="media">
                                                                                <div class="media-left pull-left">
                                                                                    <img class="media-object" src="/uploads/{{$link->img}}" alt="{{$link->name}}">
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <h4 class="media-heading">{{$link->name}}</h4>
                                                                                    <small class="visible-md visible-lg">-{{$link->descript}}</small>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>
                                        @elseif($data->name=="บุคคลภายยนอก")
                                            <div role="tabpanel" class="tab-pane" id="tab_personel">{{--personel--}}
                                                @foreach($data->MajorCategories as $mjc)
                                                    <h3 class="color3">
                                                        <a>การรับสมัครงาน</a>
                                                    </h3>
                                                    <div class="row">
                                                        @foreach($mjc->MiddleCategories as $mdc)
                                                            @foreach($mdc->Link as $link )
                                                                @if($link->MiddleCategories->name=="การรับสมัครงาน")
                                                                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                                                        <a href="{{$link->link}}" target="_blank">
                                                                            <div class="media">
                                                                                <div class="media-left pull-left">
                                                                                    <img class="media-object" src="/uploads/{{$link->img}}" alt="{{$link->name}}">
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <h4 class="media-heading">{{$link->name}}</h4>
                                                                                    <small class="visible-md visible-lg">-{{$link->descript}}</small>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </div>
                                                    <h3 class="color2">
                                                        <a>เอกสารสมัครงาน</a>
                                                    </h3>
                                                    <div class="row">
                                                        @foreach($mjc->MiddleCategories as $mdc)
                                                            @foreach($mdc->Link as $link )
                                                                @if($link->MiddleCategories->name=="เอกสารสมัครงาน")
                                                                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                                                        <a href="{{$link->link}}" target="_blank">
                                                                            <div class="media">
                                                                                <div class="media-left pull-left">
                                                                                    <img class="media-object" src="/uploads/{{$link->img}}" alt="{{$link->name}}">
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <h4 class="media-heading">{{$link->name}}</h4>
                                                                                    <small class="visible-md visible-lg">-{{$link->descript}}</small>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div id="2nd" style="margin-bottom: 10px">
        <div class="container">
            <div class="row terminal">
                <div class="col-md-12" style="padding-left: 1px;padding-right: 1px">
                    <div class="title-top">
                        <div class="title">
                            <div style="float: left" class="hi-icon-wrap hi-icon-effect-4 hi-icon-effect-4a"><i class="fa fa-suitcase fa-border hi-icon"></i></div>
                            <h2 style="float: left;  margin-top: 35px;">ท่องเที่ยว</h2>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row content">
                        <div class="col-lg-12">
                            <div role="tabpanel">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active">
                                    @foreach($ucs as $data)
                                        @if($data->name=="ท่องเที่ยว")
                                            @foreach($data->MajorCategories as $mjc)
                                                @foreach($mjc->MiddleCategories as $mdc)
                                                    <div class="row">
                                                        @foreach($mdc->Link as $link )
                                                            @if($link->MiddleCategories->name=="ท่องเที่ยว")
                                                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                                                    <a href="{{$link->link}}" target="_blank">
                                                                        <div class="media">
                                                                            <div class="media-left pull-left">
                                                                                <img class="media-object" src="/uploads/{{$link->img}}" alt="{{$link->name}}">
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <h4 class="media-heading">{{$link->name}}</h4>
                                                                                <small class="visible-md visible-lg">-{{$link->descript}}</small>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            @endforeach
                                        @endif
                                    @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

