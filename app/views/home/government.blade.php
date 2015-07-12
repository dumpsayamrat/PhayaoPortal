<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 7/11/2015
 * Time: 10:37
 */?>
@extends('home.layout')
@section('content')
    <div class="slide header">
        <div class="events" id="category">
            <div style="text-align:-webkit-center;" class="container">
                <div style="text-align: left" class="row content-event terminal">
                    <div class="title">
                        {{$ministryName}}
                    </div>

                    @if(count($government) > 0)
                        @foreach($government as $gov)
                            <div class="bs-callout bs-callout-primary">
                                <h3><a href="{{URL::to('/government/link/'.$gov->id.'/show')}}">{{$gov->name}}</a></h3>

                                <a href="{{ $gov->link }}" class="btn btn-info" target="_blank" data-type="gov" data-item="{{$gov->id}}">เข้าใช้งาน</a>
                            </div>
                            <div class="clearfix"></div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop