<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 6/5/2015
 * Time: 04:12
 */?>

@extends('layout')

@section('content')

    <div style="margin-bottom: 10px">
        <div class="container">
            <div class="row terminal">
                <div class="col-md-12" style="padding-left: 1px;padding-right: 1px">
                    <div class="title-top">
                        <div class="title">
                            <div style="float: left" class="hi-icon-wrap hi-icon-effect-4 hi-icon-effect-4a"><i class="fa fa-search fa-border hi-icon"></i></div>
                            <h2 style="float: left;  margin-top: 35px;">ผลลัพธ์การค้นหา -> "{{Session::get('word')}}"</h2>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row content">
                        <div class="col-lg-12">
                            <div role="tabpanel">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active">
                                        <div class="row">
                                            @if(!$links->isEmpty())
                                                @foreach($links as $link)
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
                                            @else

                                                    <h4>การค้นหาของคุณ "{{Session::get('word')}}" ไม่ตรงกับข้อมูลใดๆ</h4>

                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="event container" id="4th" style="margin-bottom: 10px">
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
@stop