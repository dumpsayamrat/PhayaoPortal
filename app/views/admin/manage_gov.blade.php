<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 6/25/2015
 * Time: 17:49
 */?>
@extends('admin.layout')
@section('content')
    <h1><i class="big settings teal icon"></i> จัดการหน่วยงาน</h1>
    @if(Session::has('message'))
        <div class="ui info message">
            <div class="header">{{ Session::get('message') }}</div>
        </div>
    @endif

    <table class="ui celled striped teal table">
        <thead>
        <tr><th style="">
                No.
            </th>
            <th>
                ชื่อ
            </th>
            <th style="width: 140px;">
                กระทรวง
            </th>
            <th>
                สถานที่ตั้ง
            </th>
            <th>
                ติดต่อ
            </th>
            <th>
                จุดเชื่อมโยง
            </th>
            <th>
                จัดการ
            </th>
        </tr></thead><tbody>
        <?php $i=0; foreach($goverment as $gov): $i++;?>
        <tr>
            <td><?php echo $i;?></td>
            <td>
                {{ $gov->name }}
            </td>
            <td>
                {{ $gov->ministry }}
            </td>
            <td>
                {{ $gov->where }}
            </td>
            <td>
                {{ $gov->contact }}
            </td>
            <td style="word-break:break-all;">
                {{ $gov->link }}
            </td>
            <td class="collapsing">
                <a href="/admin/gov/{{$gov->id}}/show"><i class="search teal icon"></i></a>
                <a href="/admin/gov/{{$gov->id}}/update"><i class="configure teal icon"></i></a>
                <a class="del" href="/admin/gov/{{ $gov->id }}/delete"><i class="remove teal icon"></i></a>
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