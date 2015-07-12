<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 6/20/2015
 * Time: 00:11
 */?>

@extends('home.layout')
@section('head')
    <title>{{$event->name}} | PHAYAO Portal</title>
@stop
@section('content')
    <div id="title-event" class="slide header">
        <div class="events" id="events">
            <div style="text-align:-webkit-center;" class="container">
                <div style="background-color: transparent;border: 0" class="row content-event terminal">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="feature feature-event">
                            <div class="title-search">
                                <h1> {{$event->name}} </h1>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sx-6 col-sm-6 col-md-6 col-lg-6">
                                    <div class="event-img-left">
                                        <img class="img img-responsive" src="/uploads/events/{{$event->img}}">
                                    </div>
                                </div>
                                <div style="text-align:-webkit-left;  padding: 18px;" class="col-xs-12 col-sx-6 col-sm-6 col-md-6 col-lg-6">
                                    <div class="event-desc">
                                        <div class="detail">
                                            <label>
                                                สถานที่ ?
                                            </label>
                                            <div>
                                                {{$event->where}}
                                            </div>
                                        </div>
                                        <div class="detail">
                                            <label>
                                                วัน/เวลา ?
                                            </label>
                                            <div>
                                                @if(!$event->repeat)
                                                    เริ่ม - {{$event->start}}<br />
                                                    สิ้นสุด - {{$event->finish}}
                                                @else
                                                    ทุก{{$event->day}} เริ่ม {{$event->start}} <br />
                                                    สิ้นสุด - {{$event->finish}}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="detail">
                                            <label>
                                                ติดต่อ ?
                                            </label>
                                            <div>
                                                {{$event->contact}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop