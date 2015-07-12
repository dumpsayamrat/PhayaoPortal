<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 6/12/2015
 * Time: 17:02
 */?>
@extends('home.layout')

@section('content')

<div id="title" class="slide header">
    <div class="container" id="e-services">
        <div class="gov">
            <div class="row terminal">
                <div class="col-md-12" style="padding-left: 1px;padding-right: 1px">
                    <div class="title-top">
                        <div class="title">
                            <div style="float: left" class="hi-icon-wrap hi-icon-effect-4 hi-icon-effect-4a"><i class="fa fa-university fa-border hi-icon"></i></div>
                            <h2 style="float: left;  margin-top: 35px;">หน่วยงานราชการ</h2>
                        </div>
                        <ul style="list-style: none; float: left;  padding: 0px 0px 0px 20px;" class="nav-tabs" role="tablist" id="myTab">
                            @foreach($ucs as $data)
                                @if($data->name == "หน่วยงานราชการ")
                                    <?php $g=0;?>
                                    @foreach($data->MajorCategories as $mjc) <?php $g++;?>
                                    <li role="presentation" class="{{ $g==1 ? 'active' : '' }}"  data-toggle="tooltip" data-placement="bottom" title="{{$mjc->name}}">
                                        <a class="a-tab" href="#tab_{{$g}}" role="tab" data-toggle="tab">
                                            <img src="images/major/{{$mjc->id}}.png" /><div class="title-tab">{{$mjc->name}}</div></a>
                                    </li>
                                    @endforeach
                                @endif
                            @endforeach
                                <li role="presentation" class=""  data-toggle="tooltip" data-placement="bottom" title="หน่วยงานราชการ">
                                    <a class="a-tab" href="#tab_gov" role="tab" data-toggle="tab">
                                        <img src="images/gov_2.png" /><div class="title-tab">หน่วยงานราชการ</div></a>
                                </li>
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
                                                <div class="row">
                                                    @foreach($mjc->MiddleCategories as $mdc)
                                                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                                            <a href="{{URL::to('/category/'.$mdc->id.'/new')}}">
                                                                <div class="media">
                                                                    <div class="media-left pull-left">
                                                                        <img class="media-object" src="images/middle/{{$mdc->id}}.png" alt="">
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h4 class="media-heading">{{$mdc->name}}</h4>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <?php $h++;?>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
                                    @endforeach
                                        {{--หน่วยงาน--}}
                                    <div role="tabpanel" class="tab-pane" id="tab_gov">
                                            <div class="row">
                                                @foreach($government as $gov)
                                                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                                        <a href="{{URL::to('/government/'.$gov->id.'/show')}}">
                                                            <div class="media">
                                                                {{--<div class="media-left pull-left">
                                                                    <img class="media-object" src="images/middle/{{$mdc->id}}.png" alt="">
                                                                </div>--}}
                                                                <div class="media-body">
                                                                    <h4 class="media-heading">{{$gov->ministry}}</h4>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach

                                                <div class="clearfix"></div>
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
</div>

<div id="slide1" class="slide">
    <div class="container" id="trip" style="margin-bottom: 10px">
        <div class="travel">
            <div class="row terminal">
                <div class="col-md-12" style="padding-left: 1px;padding-right: 1px">
                    <div class="title-top">
                        <div class="title">
                            <div style="float: left" class="hi-icon-wrap hi-icon-effect-4 hi-icon-effect-4a"><i class="fa i-travel fa-border hi-icon"></i></div>
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
                                        <h3 class="color11">
                                            <a>แนะนำ</a>
                                        </h3>
                                        <div class="row">
                                            @foreach($recommends as $link )
                                                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                                        <a href="{{$link->link}}" target="_blank" data-type="recommend" data-item="{{$link->id}}">
                                                            <div class="media">
                                                                {{--<div class="media-left pull-left">
                                                                    <img class="media-object" src="/uploads/{{$link->img}}" alt="{{$link->name}}">
                                                                </div>--}}
                                                                <div class="media-body">
                                                                    <h4 class="media-heading">{{$link->name}}</h4>
                                                                    <small class="">-{{$link->descript}}</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                            @endforeach
                                        </div>
                                        <h3 class="color0">
                                            <a>ท่องเที่ยว</a>
                                        </h3>
                                        @foreach($ucs as $data)
                                            @if($data->name=="ท่องเที่ยว")
                                                @foreach($data->MajorCategories as $mjc)
                                                    @foreach($mjc->MiddleCategories as $mdc)
                                                        <div class="row">
                                                            @foreach($mdc->Link as $link )
                                                                @if($link->MiddleCategories->name=="ท่องเที่ยว")
                                                                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                                                        <a href="{{$link->link}}" target="_blank" data-type="link" data-item="{{$link->id}}">
                                                                            <div class="media">
                                                                                {{--<div class="media-left pull-left">
                                                                                    <img class="media-object" src="/uploads/{{$link->img}}" alt="{{$link->name}}">
                                                                                </div>--}}
                                                                                <div class="media-body">
                                                                                    <h4 class="media-heading">{{$link->name}}</h4>
                                                                                    <small class="">-{{$link->descript}}</small>
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
</div>

<div id="slide2" class="slide header">
    <div class="container" id="up">
        <div class="uni">
            <div class="row terminal">
                <div class="col-md-12" style="padding-left: 1px;padding-right: 1px">
                    <div class="title-top">
                        <div class="title">
                            <div style="float: left" class="hi-icon-wrap hi-icon-effect-4 hi-icon-effect-4a"><i class="fa fa-graduation-cap fa-border hi-icon"></i></div>
                            <h2 style="float: left;  margin-top: 35px;">มหาวิทยาลัย</h2>
                        </div>
                        <ul style="list-style: none; float: left;  padding: 0px 0px 0px 20px;" class="nav-tabs" role="tablist" id="myTab">
                            @foreach($ucs as $data)
                                @if($data->name == "มหาวิทยาลัยพะเยา")
                                    <?php $g=0;?>
                                    @foreach($data->MajorCategories as $mjc) <?php $g++;?>
                                    <li role="presentation" class="{{ $g==1 ? 'active' : '' }}"  data-toggle="tooltip" data-placement="bottom" title="{{$mjc->name}}">
                                        <a class="a-tab" href="#tab_up_{{$g}}" role="tab" data-toggle="tab">
                                            <img src="images/major/{{$mjc->id}}.png" /><div class="title-tab">{{$mjc->name}}</div></a>
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
                                        @if($data->name == "มหาวิทยาลัยพะเยา")
                                            <?php $g=0;?>
                                            @foreach($data->MajorCategories as $mjc) <?php $g++;?>
                                            <div role="tabpanel" class="tab-pane{{ $g==1 ? ' active' : '' }}" id="tab_up_{{$g}}">
                                                <?php $h=0;?>
                                                @foreach($mjc->MiddleCategories as $mdc)
                                                    <h3 class="color{{$h}}">
                                                        <a>{{$mdc->name}}</a>
                                                    </h3>
                                                    <div class="row">
                                                        @foreach($mdc->Link as $link )
                                                            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                                                <a href="{{$link->link}}" target="_blank" data-type="link" data-item="{{$link->id}}">
                                                                    <div class="media">
                                                                        {{--<div class="media-left pull-left">
                                                                            <img class="media-object" src="/uploads/{{$link->img}}" alt="{{$link->name}}">
                                                                        </div>--}}
                                                                        <div class="media-body">
                                                                            <h4 class="media-heading">{{$link->name}}</h4>
                                                                            <small class="">-{{$link->descript}}</small>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                        <div class="clearfix"></div>
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
</div>
@stop
