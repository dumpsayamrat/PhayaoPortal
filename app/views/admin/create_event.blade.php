<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 5/4/2015
 * Time: 14:37
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

    <h1><i class="big settings teal icon"></i> เพิ่มจุดกิจกรรม</h1>

    {{ Form::open(array('url' => '/admin/events/create','class' => 'ui warning form teal segment','files'=>true)) }}
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
        {{ Form::label('name','ชื่อกิจกรรม') }}
        {{ Form::text('name',null,['placeholder'=>'ชื่อกิจกรรม']) }}
    </div>


    <div class="required field">
        {{ Form::label('type','หมวดหมู่') }}
        <select class="ui dropdown" name="type" id="type">
            <option value="">---เลือก---</option>
            <option value="1">มหาวิทยาลัย</option>
            <option value="2">ท่องเที่ยว</option>
        </select>
    </div>

    <div class="ui two fields segment">
        <div class="required field">
            {{ Form::label('start','วัน/เวลา เริ่มกิจกรรม') }}
            {{ Form::text('start',null,['id'=>'start','autocomplete'=>'off']) }}
        </div>
        <div class="required field">
            {{ Form::label('finish','วัน/เวลา สิ้นสุดกิจกรรม') }}
            {{ Form::text('finish',null,['id'=>'finish','autocomplete'=>'off']) }}
        </div>
        <div class="ui field segment">
            <div class="ui checkbox">
                <input id="repeat" type="checkbox" name="repeat">
                <label>วนซ้ำ</label>
            </div>
            <div id="day" style="display: none" class="ui field segment">
                {{ Form::label('day','เลือกวัน') }}
                {{ Form::select('day', array(
                    'วันอาทิตย์' => 'วันอาทิตย์',
                    'วันจันทร์' => 'วันจันทร์',
                    'วันอังคาร' => 'วันอังคาร',
                    'วันพุธ' => 'วันพุธ',
                    'วันพฤหัสบดี' => 'วันพฤหัสบดี',
                    'วันศุกร์' => 'วันศุกร์',
                    'วันเสาร์' => 'วันเสาร์',), 'วันอาทิตย์',array('class' => 'ui dropdown')) }}
            </div>
        </div>
    </div>

    <div class="two fields">
        <div class="field">
            {{ Form::label('where','สถานที่') }}
            {{ Form::text('where',null,['id'=>'where','autocomplete'=>'off']) }}
        </div>
        <div class="field">
            {{ Form::label('contact','ติดต่อ') }}
            {{ Form::text('contact',null,['id'=>'contact','autocomplete'=>'off']) }}
        </div>
    </div>
    <div class="field">
        {{ Form::label('descript','คำอธิบาย') }}
        {{ Form::textarea('descript') }}
    </div>

    <div class="required field">
        {{ Form::label('img','รูปภาพ') }}
        {{ Form::file('img') }}
    </div>
    {{ Form::submit('เพิ่ม',array('class'=>'ui submit teal button')) }}

    {{ Form::close() }}
    @stop
@section('javascript')
    <script>
       $('#start,#finish').datetimepicker({
             format:	'Y-m-d H:i',
            lang:'th',
            theme:'dark',
            mask:true
        });
       $(document).on('ready', function() {

            $('#repeat').change(function(){
                if($('#repeat').is(':checked')){
                    $('#day').fadeIn('slow');
                }else{
                    $('#day').fadeOut('slow');
                }
            });
        });

    </script>

    @stop