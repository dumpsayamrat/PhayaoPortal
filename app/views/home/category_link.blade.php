<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 7/11/2015
 * Time: 08:55
 */?>
@extends('home.layout')

@section('content')
    <div class="slide header" id="category-link">
        <div class="events" id="">
            <div style="text-align:-webkit-center;" class="container">
                <div style="text-align: left" class="row content-event terminal">
                    <div class="description">
                    <div class="title">
                        {{$link->name}}
                    </div>

                        <div class="panel panel-primary">
                            <div class="panel-heading">ข้อมูลพื้นฐาน</div>
                            <div class="panel-body">
                                <p><span>ชื่อบริการ : </span>{{$link->name}}</p>
                                <p><span>ลิ้งบริการ : </span>
                                    <a href="{{$link->link}}" target="_blank" data-type="link" data-item="{{$link->id}}">
                                        {{$link->link}}
                                    </a>
                                </p>
                                <p><span>ชื่อหน่วยงาน : </span><a href="{{URL::to('/government/link/'.$link->gov_id.'/show')}}">{{$link->Gov->name}}</a></p>
                                <p><span>เว็บไซต์ที่เกี่ยวข้อง : </span>
                                    <a href="{{$link->Gov->link}}" target="_blank" data-type="gov" data-item="{{$link->Gov->id}}">
                                        {{$link->Gov->link}}
                                    </a>
                                </p>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>

@stop