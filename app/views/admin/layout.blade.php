<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 3/30/2015
 * Time: 17:52
 */
  ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Portal PHAYAO | Admin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <!-- Semantic -->
    <link href="/semantic/dist/semantic.min.css" rel="stylesheet" type="text/css">
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    <link href="/js/datetimepicker/jquery.datetimepicker.css" rel="stylesheet" type="text/css">

</head>
<body>

<div id="admin" class="container">

    <div class="ui grid">

        <div class="doubling two column row">
            <div class="four wide column">
                <div class="ui vertical red menu">

                    <a class="{{ Request::path()=='admin/manage' ? 'active' : '' }} item" href="{{ URL::to('/admin/manage') }}">
                        <i class="grid layout icon"></i> จัดการจุดเชื่อมต่อภายนอก
                    </a>
                    <a class="{{ Request::path()=='admin/link/create' ? 'active' : '' }} item" href="{{ URL::to('/admin/link/create') }}">
                        <i class="add square icon"></i> เพิ่มจุดเชื่อมต่อภายนอก
                    </a>
                    <hr style="background-color: rgb(224, 55, 75);height: 3px">
                    {{--EVENTS--}}
                    <a class="{{ Request::path()=='admin/events/manage' ? 'active' : '' }} item" href="{{ URL::to('/admin/events/manage') }}">
                        <i class="grid layout icon"></i> จัดการกิจกรรม
                    </a>
                    <a class="{{ Request::path()=='admin/events/create' ? 'active' : '' }} item" href="{{ URL::to('/admin/events/create') }}">
                        <i class="add square icon"></i> เพิ่มกิจกรรม
                    </a>
                    <hr style="background-color: rgb(224, 55, 75);height: 3px">
                    <a class="{{ Request::path()=='admin/logout' ? 'active' : '' }} red item" href="{{ URL::to('/admin/logout') }}">
                        <i class="sign out icon"></i> ออกจากระบบ
                    </a>
                </div>
            </div>
            <div class="twelve wide column">
@yield('content')
            </div>

        </div>
    </div>
</div>

<script src="/js/jquery.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="/js/jquery-2.1.1.min.js"></script>
<!-- Semantic -->
<script src="/semantic/dist/semantic.min.js"></script>

<script src="/js/app.js"></script>
<script src="/js/datetimepicker/jquery.datetimepicker.js"></script>
<script>
    $('.ui.dropdown').dropdown();
    $('.ui.checkbox').checkbox();
    $('.dropdown')
            .dropdown({
                // you can use any ui transition
                transition: 'drop'
            });
    $('.ui.modal')
            .modal()
    ;
</script>
@yield('javascript')


</body>

</html>