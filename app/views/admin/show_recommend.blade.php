<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 7/3/2015
 * Time: 03:12
 */
?>
@extends('admin.layout')
@section('content')
    <div class="ui grid">
        <div class="sixteen wide column">
            <div class="title">
                <h1>{{$recommend->name}}</h1>
            </div>
            <br><br>
            <div class="ui grid">
                <div class="sixteen wide column">
                    @foreach($columns as $column)
                        @if($column!='gov_id'&&$column!='img')
                            @if($column == 'descript')
                                <h3 class="description">{{$column}}ion :&nbsp;&nbsp;&nbsp;&nbsp;<b>{{$recommend->$column}}</b></h3>   <div class="clearing"></div>
                            @else
                                <h3 class="description">{{$column}} :&nbsp;&nbsp;&nbsp;&nbsp;<b>{{$recommend->$column}}</b></h3>   <div class="clearing"></div>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop