<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 7/3/2015
 * Time: 03:11
 */
?>
@extends('admin.layout')
@section('content')
    <h1><i class="big settings teal icon"></i> จัดการ จุดเชื่อมโยงแนะนำ</h1>
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
                จุดเชื่อมโยง
            </th>
            <th>
                คำอธิบาย
            </th>
            <th>
                จัดการ
            </th>
        </tr></thead><tbody>
        <?php $i=0; foreach($recommends as $recommend): $i++;?>
        <tr>
            <td><?php echo $i;?></td>
            <td>
                {{ $recommend->name }}
            </td>
            <td style="word-break:break-all;">
                {{ $recommend->link }}
            </td>
            <td style="word-break:break-all;">
                {{ $recommend->descript }}
            </td>

            <td class="collapsing">
                <a href="/admin/recommend/{{$recommend->id}}/show"><i class="search teal icon"></i></a>
                <a href="/admin/recommend/{{$recommend->id}}/update"><i class="configure teal icon"></i></a>
                <a class="del" href="/admin/recommend/{{ $recommend->id }}/delete"><i class="remove teal icon"></i></a>
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