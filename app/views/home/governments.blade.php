<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 7/12/2015
 * Time: 05:49
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
                                <h2 style="float: left;  margin-top: 35px;">กระทรวง</h2>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row content">
                            <div class="col-lg-12">
                                <div role="tabpanel">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        @foreach($governments as $gov)
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