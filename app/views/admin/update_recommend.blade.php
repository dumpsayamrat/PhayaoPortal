<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 7/3/2015
 * Time: 03:13
 */?>
@extends('admin.layout')

@section('content')
    <style>
        .ui.form select{
            width: 80%;
            display: -webkit-inline-box;
        }
        .ui.form .tag{
            margin-top: 5px;
        }
        .ui.header{
            font-weight: 0;
        }
        .ui.header:not(h1):not(h2):not(h3):not(h4):not(h5):not(h6) {
            font-size: 1.0em;
        }
    </style>
    {{-- <div class="ui page grid">--}}

    <h1><i class="big settings teal icon"></i> แก้ไขจุดเชื่อมโยงแนะนำ </h1>
    {{ Form::open(array('url' => '/admin/recommend/'.$recommend->id.'/update','class' => 'ui warning form teal segment','files'=>false)) }}
    @if(!$errors->isEmpty())

        <div class="ui red message">
            <div class="header">{{ HTML::ul($errors->all()) }}</div>
        </div>
    @elseif(Session::has('message'))
        <div class="ui info message">
            <div class="header">{{ Session::get('message') }}</div>
        </div>
    @endif

    <div class="required field">
        {{ Form::label('name','ชื่อจุดเชื่อมโยงแนะนำ') }}
        {{ Form::text('name',$recommend->name,['placeholder'=>'ชื่อจุดเชื่อมโยงแนะนำ']) }}
    </div>
    <div class="required field">
        {{ Form::label('link','ที่อยู่จุดเชื่อมโยง') }}
        {{ Form::text('link',$recommend->link,['placeholder'=>'ที่อยู่จุดเชื่อมโยง']) }}
    </div>
    <div class="required field">
        {{ Form::label('descript','คำอธิบาย') }}
        {{ Form::textarea('descript',$recommend->descript) }}
    </div>

    {{ Form::submit('เพิ่ม',array('class'=>'ui submit teal button')) }}
    {{ Form::close() }}
@stop