<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 7/11/2015
 * Time: 10:49
 */?>
@extends('home.layout')

@section('content')
    <div class="slide header" id="">
        <div class="events" id="category">
            <div style="text-align:-webkit-center;" class="container">
                <div style="text-align: left" class="row content-event terminal">
                    <div class="description">
                        <div class="title">
                            {{$gov->name}}
                        </div>

                        <div class="panel panel-primary">
                            <div class="panel-heading">ข้อมูลพื้นฐาน</div>
                            <div class="panel-body">
                                <p><span>ชื่อหน่วยงาน : </span>{{$gov->name}}</p>
                                <p><span>ลิ้งหน่วยงาน : </span>
                                    <a href="{{$gov->link}}" target="_blank" data-type="gov" data-item="{{$gov->id}}">
                                        {{$gov->link}}
                                    </a>
                                </p>
                                <p><span>หน่วยงานต้นสังกัด : </span><a href="{{URL::to('government/'.$gov->id.'/show')}}">{{$gov->ministry}}</a></p>
                                <p><span>สถานที่ตั้ง : </span>{{$gov->where}} </p>
                                <p><span>ข้อมูลการติดต่อ : </span>{{$gov->contact}} </p>
                            </div>
                        </div>

                        <div class="panel panel-primary">
                            <div class="panel-heading">บริการที่เกี่ยวข้อง</div>
                            <div class="panel-body">
                                <ul>
                                    @foreach($gov->Link as $link)
                                        <li><a href="{{URL::to('category/link/'.$link->id.'/show')}}">{{$link->name}}</a></li>
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