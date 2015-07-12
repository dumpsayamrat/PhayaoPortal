<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 6/21/2015
 * Time: 13:01
 */
?>
@extends('home.layout')
@section('content')
    <?php //print_r($results); ?>
<div id="ajax-search" class="slide header events">
    <div style="text-align: -webkit-center" class="container">
        <div class="terminal">
            <div class="content">
                <div class="title-search">
                    <div><h1 id="terms-search"> ผลการค้นหา "{{Session::has('search') ? Session::get('search') : '????'}}"</h1></div>{{--""--}}
                </div>
                <div style="text-align: -webkit-left" class="row tab-content res-search">
                    @if(!empty($results))
                        <h3 class="color0">
                            <a>หน่วยงานราชการ</a>
                        </h3>
                        <div class="row">
                            @foreach($results as $result )
                                @if($result->MiddleCategories->MajorCategories->UserCategories->name=="หน่วยงานราชการ")
                                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                        <a href="{{$result->link}}" target="_blank">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h4 class="media-heading">{{$result->name}}</h4>
                                                    <small class="">-{{$result->descript}}</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <h3 class="color1">
                            <a>มหาวิทยาลัยพะเยา</a>
                        </h3>
                        <div class="row">
                            @foreach($results as $result )
                                @if($result->MiddleCategories->MajorCategories->UserCategories->name=="มหาวิทยาลัยพะเยา")
                                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                        <a href="{{$result->link}}" target="_blank">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h4 class="media-heading">{{$result->name}}</h4>
                                                    <small class="">-{{$result->descript}}</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <h3 class="color2">
                            <a>ท่องเที่ยว</a>
                        </h3>
                        <div class="row">
                            @foreach($results as $result )
                                @if($result->MiddleCategories->MajorCategories->UserCategories->name=="ท่องเที่ยว")
                                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                        <a href="{{$result->link}}" target="_blank">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h4 class="media-heading">{{$result->name}}</h4>
                                                    <small class="">-{{$result->descript}}</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
            $('a[target=_blank]').click(function(e){
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
    </script>
    </div>

@stop