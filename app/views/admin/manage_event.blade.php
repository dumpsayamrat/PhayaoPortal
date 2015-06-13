<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 5/4/2015
 * Time: 13:49
 */
?>
@extends('admin.layout')

@section('content')
    {{-- <div class="ui page grid">--}}
    <style>
        .collapsing img{
            max-width: 25px;
        }
    </style>
    <h1><i class="big settings teal icon"></i> จัดการกิจกรรม</h1>
    @if(Session::has('message'))
        <div class="ui info message">
            <div class="header">{{ Session::get('message') }}</div>
        </div>
    @endif

    <table class="ui celled striped teal table">
        <thead>
        <tr><th style="  width: 10px;">
                No.
            </th>
            <th>
                ชื่อ
            </th>
            <th style="  width: 120px;">
                ชนิด
            </th>
            <th>
                วัน/เวลา เริ่มกิจกรรม
            </th>
            <th style="  width: 100px;">
                วัน/เวลา สิ้นสุดกิจกรรม
            </th>
            <th style="  width: 100px;">
                จัดการ
            </th>
        </tr></thead><tbody>
        <?php $i=0; foreach($events as $event): $i++;?>
        <tr>
            <td><?php echo $i;?></td>
            <td class="collapsing">
                <img src="/uploads/events/{{ $event->img == '' ? 'blank.png' : $event->img  }}"> {{ $event->name }}
            </td>
            <td>
                {{$event->type==1?'มหาวิทยาลัย':'ท่องเที่ยว'}}
            </td>
            <td class="collapsing">{{ $event->start }}</td>
            <td class="collapsing">{{ $event->finish }}</td>
            <td>
                <i class="search teal icon"></i>
                <a href="/admin/events/{{$event->id}}/update"><i class="configure teal icon"></i></a>
                <a class="del" href="/admin/events/{{ $event->id }}/delete"><i class="remove teal icon"></i></a>
            </td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>


@stop

@section('javascript')
    <script>
        $('.del').click(function(){
            if(confirm('ต้องการลบข้อมูลนี้ใช่หรือไม่')){
                return true;
            }else{
                return false;
            }

        });
    </script>
@stop