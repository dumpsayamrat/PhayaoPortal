<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 3/30/2015
 * Time: 19:39
 */?>
@extends('admin.layout')

@section('content')
   {{-- <div class="ui page grid">--}}
<style>
    table tbody td img{
        max-width: 25px;
    }
</style>
                    <h1><i class="big settings teal icon"></i> จัดการจุดเชื่อมโยง</h1>
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
                                   หมวดหมู่
                               </th>
                               <th>
                                   link address
                               </th>
                               <th style="  width: 100px;">
                                   จัดการ
                               </th>
                           </tr></thead><tbody>
                           <?php $i=0; foreach($links as $link): $i++;?>
                           <tr>
                               <td><?php echo $i;?></td>
                               <td>
                                   {{ $link->name }}
                               </td>
                               <td style="    width: 200px;white-space: pre-line;">{{ $link->MiddleCategories->MajorCategories->UserCategories->name}}<i class="long arrow right blue icon"></i>
                                   {{ $link->MiddleCategories->MajorCategories->name}}<i class="long arrow right blue icon"></i>
                                   {{ $link->MiddleCategories->name}}
                               </td>
                               <td style="word-break:break-all;">{{ $link->link }}</td>
                               <td class="collapsing">
                                   <a href="/admin/link/{{$link->id}}/show"><i class="search teal icon"></i></a>
                                   <a href="/admin/link/{{$link->id}}/update"><i class="configure teal icon"></i></a>
                                   <a class="del" href="/admin/link/{{ $link->id }}/delete"><i class="remove teal icon"></i></a>
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