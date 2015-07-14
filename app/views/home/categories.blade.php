<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 7/6/2015
 * Time: 21:50
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
                                <div style="float: left" class="hi-icon-wrap hi-icon-effect-4 hi-icon-effect-4a"><i class="fa fa-sitemap fa-border hi-icon"></i></div>
                                <h2 style="float: left;  margin-top: 35px;">หมวดหมู่</h2>
                            </div>
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
                                                                <a href="{{URL::to('/category/'.$mdc->id.'/update')}}">
                                                                    <div class="media">
                                                                        <div class="media-left pull-left">
                                                                            <img class="media-object" src="/images/middle/{{$mdc->id}}.png" alt="">
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