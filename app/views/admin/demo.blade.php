<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 4/15/2015
 * Time: 21:41
 */?>

@extends('admin.layout')

@section('content')

    <div class="field">

        <select class="ui" name="usercategories" id="usercategories">
            <option value=""></option>
        </select>
        <button id="ss" class="ui submit teal button">เพิ่ม</button>
    </div>
    <div class="ui small modal">
        <i class="close icon"></i>
        <div class="header center aligned">
            <i class="settings icon"></i>
            เพิ่มหมวดหมู่ผู้ใช้
        </div>
        <div class="content">
        {{ Form::open(array('data-remote','class'=>'ui form red segment','id'=>'sss')) }}
            {{ Form::label('name','name :') }}
            {{ Form::text('name') }}

        </div>
        <div class="actions">
            <div class="ui black button">
                ออก
            </div>
            {{--<div class="ui button">
                <i class="checkmark icon"></i>
            </div>--}}
            {{ Form::submit('เพิ่ม',['class'=>'ui green button']) }}

            {{ Form::close() }}
        </div>
    </div>

    <br />
    --
    <br />
    <?php foreach($data as $d):?>
        <?php echo $d;?><br />

    <?php if(Hash::make('dumpz5')==$d) echo '<br />well<br />';?>
   <?php endforeach; ?>
    @stop
@section('javascript')
    <script>
        run1();
        $('#sss').on('submit',function(e){
            e.preventDefault();
            var form = $(this);
            var url = form.prop('action');
            $.ajax({
                url:url,
                data: form.serialize(),
                method:'POST',
                success:function(){

                    run1();
                }
            });
        });
        $('#ss').click(function(){
            $('.modal').modal('show');
            //alert('asd')
        });

        function run1(){
            //alert('a');
            $.get('/ajax-products',function(data){

                $('#usercategories').empty();
                $('#usercategories').append('<option value="">เลือก ---</option>');
                $.each(data,function(index,ucOdj){
                    $('#usercategories').append('<option value="'+ucOdj.id+'">'+ucOdj.name+'</option>');
                });
            });
        }
    </script>
    @stop