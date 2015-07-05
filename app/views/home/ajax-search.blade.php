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
            <div class="title-search">
                <div><h1 id="terms-search"> ผลการค้นหา "{{Session::has('search') ? Session::get('search') : '????'}}"</h1></div>{{--""--}}
            </div>
            <div style="text-align: -webkit-left" class="row tab-content res-search">
                @if(!empty($results))
                    @foreach($results as $result )
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                            <a href="{{$result->link}}" target="_blank">
                                <div class="media">
                                    {{--<div class="media-left pull-left">
                                        <img class="media-object" src="/uploads/{{$result->img}}" alt="{{$result->name}}">
                                    </div>--}}
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$result->name}}</h4>
                                        <small class="">-{{$result->descript}}</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
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