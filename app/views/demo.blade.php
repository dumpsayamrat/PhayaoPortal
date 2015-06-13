<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 4/14/2015
 * Time: 21:18
 */
 ?>
TEST UPloadFile
{{ Form::open(['url'=>'/demo1','files'=>true]) }}
    {{ Form::label('title','Titles :') }}
    {{ Form::text('title') }}<br />
    {{ Form::label('img','img :') }}
    {{ Form::file('img') }}
    <br />
    {{ Form::submit('send') }}
{{ Form::close() }}