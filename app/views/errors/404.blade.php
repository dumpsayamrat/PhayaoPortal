<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 6/29/2015
 * Time: 04:57
 */?>
@section('head')
    <title>404 ไม่พบหน้าที่คุณต้องการ | PHAYAO Portal</title>
@stop
@section('content')
    <div id="title-event" class="slide header">
        <div class="events" id="events">
            <div style="text-align:-webkit-center;" class="container">
                <div class="row terminal error-content">
                    <div style="text-align:-webkit-left;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h1 class="error-title">404 ไม่พบหน้าที่คุณต้องการ</h1>
                        <div>
                            <p>ขออภัย ดูเหมือนเราจะไม่พบสิ่งที่คุณกำลังมองหา </p>
                            <ul>
                                <li><a href="http://{{Request::getHttpHost()}}"> เยื่ยมชมหน้าหลักของเรา </a></li>
                                <li> <a href="#" id="click-search">ใช้การค้นหาของเรา</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('javascript')
    <script>
        $('#click-search').click(function(){
           $('#search-terms').select().focus();
        });
    </script>
@stop