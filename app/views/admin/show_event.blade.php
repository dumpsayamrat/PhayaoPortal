<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 6/26/2015
 * Time: 02:16
 */?>
@extends('admin.layout')
@section('content')
    <div class="ui grid">
        <div class="sixteen wide column">
            <div class="title">
                <h1>{{$event->name}}</h1>
            </div>
            <br><br>
            <div class="ui grid">
                <div class="sixteen wide column">
                    @foreach($columns as $column)
                        @if($column!='day')
                            @if($column == 'type')
                                <h3 class="description">{{$column}} :&nbsp;&nbsp;&nbsp;&nbsp;<b>{{$event->$column==1 ? 'มหาวิทยาลัย' : 'ท่องเที่ยว'}}</b></h3>   <div class="clearing"></div>
                            @elseif($column == 'repeat')
                                <h3 class="description">{{$column}} :&nbsp;&nbsp;&nbsp;&nbsp;<b>{{$event->$column == 0 ?'ไม่มีวนซ้ำ' : 'วนซ้ำ  '.$event->day}}</b></h3>   <div class="clearing"></div>
                            @elseif($column == 'descript')
                                <h3 class="description">{{$column}}ion :&nbsp;&nbsp;&nbsp;&nbsp;<b>{{$event->$column}}</b></h3>   <div class="clearing"></div>
                            @else
                                <h3 class="description">{{$column}} :&nbsp;&nbsp;&nbsp;&nbsp;<b>{{$event->$column}}</b></h3>   <div class="clearing"></div>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop