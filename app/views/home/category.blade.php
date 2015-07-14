<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 7/6/2015
 * Time: 21:50
 */?>
@extends('home.layout')
@section('content')
    <div id="" class="slide header">
        <div class="events" id="category">
            <div style="text-align:-webkit-center;" class="container">
                <div style="text-align: left" class="row content-event terminal">
                    <div class="title">
                        <img src="/images/middle/{{$resultCategory->id}}.png" /> {{$resultCategory->name}}
                    </div>

                    @if(count($links) > 0)
                        <div class="mainCategory">
                            <span class="label {{Request::is('category/*/update')? 'label-active' : 'label-default'}}">
                                <a href="{{URL::to('category/'.$id.'/update')}}">ปรับปรุงล่าสุด</a>
                            </span>
                            <span class="label {{Request::is('category/*/most')? 'label-active' : 'label-default'}}">
                                <a href="{{URL::to('category/'.$id.'/most')}}">ดูมากที่สุด</a>
                            </span>
                        </div>
                        @foreach($links as $link)
                            <div class="bs-callout bs-callout-primary">
                                <h3><a href="{{URL::to('/category/link/'.$link->id.'/show')}}">{{$link->name}}</a></h3>
                                <div class="description">
                                    <p>หน่วยงาน : <a href="{{URL::to('government/link/'.$link->Gov->id.'/show')}}">{{$link->Gov->name}}</a></p>
                                    <p>ปรับปรุงล่าสุด : {{$link->updated_at_new}} / เข้าชม {{$link->frequency}} ครั้ง</p>
                                </div>
                                <a href="{{ $link->link }}" class="btn btn-info" target="_blank" data-type="link" data-item="{{$link->id}}">เข้าใช้งาน</a>
                            </div>
                            <div class="clearfix"></div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop