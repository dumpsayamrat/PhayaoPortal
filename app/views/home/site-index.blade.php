<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 7/12/2015
 * Time: 16:00
 */?>
@extends('home.layout')
@section('content')
    <div id="title" class="slide header">
        <div id="siteindax" style="text-align: -webkit-center" class="container" id="e-services">
            <div class="row terminal">
                <div class="col-md-12" style="padding-left: 1px;padding-right: 1px">
                    <div class="title-top">
                        <div class="title">
                            <h2 style="float: left;  margin-top: 35px;">Site Index</h2>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row content">
                        <div class="btn-group" role="group">
                            <?php $i=0;?>
                            @foreach($thaiChar as $c)
                                @if($c==$char)
                                    <a href="{{URL::to('site-index/'.$c)}}" type="button" class="btn btn-default index active">{{$c}}</a>
                                @elseif(in_array($c,$disablechar))
                                        <button type="button" class="btn btn-default index disabled">{{$c}}</button>
                                @else
                                    <a href="{{URL::to('site-index/'.$c)}}" type="button" class="btn btn-default index">{{$c}}</a>
                                @endif
                                    <?php $i++;?>
                            @endforeach
                            <div class="clearfix"></div>
                            <div class="char">
                                <h1>{{$char}}</h1>
                            </div>

                            <div class="link">
                                <ul>
                                    @foreach($links as $link)
                                        <li><a href="{{$link->link}}" target="_blank" data-type="link" data-item="{{$link->id}}">{{$link->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
