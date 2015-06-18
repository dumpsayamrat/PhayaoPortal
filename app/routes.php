<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/admin/login','SessionsController@login');
Route::get('/admin/logout','SessionsController@destroy');
Route::resource('sessions', 'SessionsController');

Route::get('/','HomeController@getIndex');
Route::post('/addfrequency','HomeController@postFrequency');

Route::get('/older', function()
{
    if(Input::has('search')){
        $query = Input::get('search');
        $res   = Link::where('name', 'LIKE', "%$query%")->get();
        $events = Events::orderBy('type','DESC')->orderBy('start','ASC')->get();
        foreach($events as $event){
            date_default_timezone_set('Asia/Bangkok');
            $date11 = $event->start;
            $date21 = $event->finish;
            if(date("Y-m-d H:i:s") < $date11){
                $date1 = new DateTime($date11);
                $date2 = new DateTime(date("Y-m-d H:i:s"));
                $interval = $date2->diff($date1);
                if($interval->days==0){
                    $event['status'] = "-3";
                    $event['hr'] = $interval->h;
                }else{
                    $event['status'] = $interval->days;
                }
                //$event['status'] = $interval->days;
            }elseif(date("Y-m-d H:i:s")>=$date11&&date("Y-m-d H:i:s")<=$date21){
                $event['status'] = "-1";
            }elseif(date("Y-m-d H:i:s") >= $date21){
                $event['status'] = "-2";
            }else{
                $event['status'] = "9999";
            }
            $times = array("start","finish");
            for($i = 0;$i < sizeof($times);$i++){
                $strDate = $event->$times[$i];
                $strYear = date("Y",strtotime($strDate))+543;
                $strMonth= date("n",strtotime($strDate));
                $strDay= date("j",strtotime($strDate));
                $strHour= date("H",strtotime($strDate));
                $strMinute= date("i",strtotime($strDate));
                $strSeconds= date("s",strtotime($strDate));
                $strMonthCut = Array(
                    "",
                    "มกราคม",
                    "กุมภาพันธ์",
                    "มีนาคม",
                    "เมษายน",
                    "พฤษภาคม",
                    "มิถุนายน",
                    "กรกฎาคม",
                    "สิงหาคม",
                    "กันยายน",
                    "ตุลาคม ",
                    "พฤศจิกายน",
                    "ธันวาคม"
                );
                $strMonthThai=$strMonthCut[$strMonth];
                $event->$times[$i]="$strDay $strMonthThai $strYear เวลา $strHour:$strMinute นาฬิกา";
                //$event['stat'] = 'newenw';
            }
        }
        Session::flash('word',Input::get('search'));
        return View::make('home.search')->with('links',$res)->with('events',$events);
    }elseif(Input::has('search2')){
        $query = Input::get('search2');
        $res   = Link::where('name', 'LIKE', "%$query%")->get();
        $events = Events::orderBy('type','DESC')->orderBy('start','ASC')->get();
        foreach($events as $event){
            date_default_timezone_set('Asia/Bangkok');
            $date11 = $event->start;
            $date21 = $event->finish;
            if(date("Y-m-d H:i:s") < $date11){
                $date1 = new DateTime($date11);
                $date2 = new DateTime(date("Y-m-d H:i:s"));
                $interval = $date2->diff($date1);
                if($interval->days==0){
                    $event['status'] = "-3";
                    $event['hr'] = $interval->h;
                }else{
                    $event['status'] = $interval->days;
                }
                //$event['status'] = $interval->days;
            }elseif(date("Y-m-d H:i:s")>=$date11&&date("Y-m-d H:i:s")<=$date21){
                $event['status'] = "-1";
            }elseif(date("Y-m-d H:i:s") >= $date21){
                $event['status'] = "-2";
            }else{
                $event['status'] = "9999";
            }
            $times = array("start","finish");
            for($i = 0;$i < sizeof($times);$i++){
                $strDate = $event->$times[$i];
                $strYear = date("Y",strtotime($strDate))+543;
                $strMonth= date("n",strtotime($strDate));
                $strDay= date("j",strtotime($strDate));
                $strHour= date("H",strtotime($strDate));
                $strMinute= date("i",strtotime($strDate));
                $strSeconds= date("s",strtotime($strDate));
                $strMonthCut = Array(
                    "",
                    "มกราคม",
                    "กุมภาพันธ์",
                    "มีนาคม",
                    "เมษายน",
                    "พฤษภาคม",
                    "มิถุนายน",
                    "กรกฎาคม",
                    "สิงหาคม",
                    "กันยายน",
                    "ตุลาคม ",
                    "พฤศจิกายน",
                    "ธันวาคม"
                );
                $strMonthThai=$strMonthCut[$strMonth];
                $event->$times[$i]="$strDay $strMonthThai $strYear เวลา $strHour:$strMinute นาฬิกา";
                //$event['stat'] = 'newenw';
            }
        }
        Session::flash('word',Input::get('search2'));
        return View::make('home.search')->with('links',$res)->with('events',$events);
    }else{
        $events = Events::orderBy('type','DESC')->orderBy('start','ASC')->get();
        foreach($events as $event){
            date_default_timezone_set('Asia/Bangkok');
            $date11 = $event->start;
            $date21 = $event->finish;
            if(date("Y-m-d H:i:s") < $date11){
                $date1 = new DateTime($date11);
                $date2 = new DateTime(date("Y-m-d H:i:s"));
                $interval = $date2->diff($date1);
                if($interval->days==0){
                    $event['status'] = "-3";
                    $event['hr'] = $interval->h;
                }else{
                    $event['status'] = $interval->days;
                }
                //$event['status'] = $interval->days;
            }elseif(date("Y-m-d H:i:s")>=$date11&&date("Y-m-d H:i:s")<=$date21){
                $event['status'] = "-1";
            }elseif(date("Y-m-d H:i:s") >= $date21){
                $event['status'] = "-2";
            }else{
                $event['status'] = "9999";
            }
            $times = array("start","finish");
            for($i = 0;$i < sizeof($times);$i++){
                $strDate = $event->$times[$i];
                $strYear = date("Y",strtotime($strDate))+543;
                $strMonth= date("n",strtotime($strDate));
                $strDay= date("j",strtotime($strDate));
                $strHour= date("H",strtotime($strDate));
                $strMinute= date("i",strtotime($strDate));
                $strSeconds= date("s",strtotime($strDate));
                $strMonthCut = Array(
                    "",
                    "มกราคม",
                    "กุมภาพันธ์",
                    "มีนาคม",
                    "เมษายน",
                    "พฤษภาคม",
                    "มิถุนายน",
                    "กรกฎาคม",
                    "สิงหาคม",
                    "กันยายน",
                    "ตุลาคม ",
                    "พฤศจิกายน",
                    "ธันวาคม"
                );
                $strMonthThai=$strMonthCut[$strMonth];
                $event->$times[$i]="$strDay $strMonthThai $strYear เวลา $strHour:$strMinute นาฬิกา";
                //$event['stat'] = 'newenw';
            }
        }
        return View::make('home.index')->with('ucs',UserCategories::all())->with('events',$events);
    }
});

Route::get('/search',function(){
    if(Request::ajax()){
        $query = Input::get('term');
        $res   = Link::where('name', 'LIKE', "%$query%")->get();
        return Response::json($res);
    }
});

Route::get('/test',function(){
    /*$searchParams['index'] = 'portal';
    $searchParams['size'] = 50;
    $searchParams['body']['query']['query_string']['query'] = '*:*พะเยา*';

    $result = Es::search($searchParams);
    */
    $searchParams['index'] = 'data';
    $searchParams['size'] = 50;
    $searchParams['body']['query']['query_string']['query'] = '*:*up*';

    $result = Es::search($searchParams);
    //dd($result['hits']['hits']);
    //dd();
    /*$query = Input::get('search');
    $res   = Link::where('name', 'LIKE', "%ติดต่อ%")->get();*/
    //dd($res);
    echo "<pre>".print_r($result['hits']['hits'])."</pre>"; die();
    $events = Events::orderBy('type','DESC')->orderBy('start','ASC')->get();
    foreach($events as $event){
        date_default_timezone_set('Asia/Bangkok');
        $date11 = $event->start;
        $date21 = $event->finish;
        if(date("Y-m-d H:i:s") < $date11){
            $date1 = new DateTime($date11);
            $date2 = new DateTime(date("Y-m-d H:i:s"));
            $interval = $date2->diff($date1);
            if($interval->days==0){
                $event['status'] = "-3";
                $event['hr'] = $interval->h;
            }else{
                $event['status'] = $interval->days;
            }
            //$event['status'] = $interval->days;
        }elseif(date("Y-m-d H:i:s")>=$date11&&date("Y-m-d H:i:s")<=$date21){
            $event['status'] = "-1";
        }elseif(date("Y-m-d H:i:s") >= $date21){
            $event['status'] = "-2";
        }else{
            $event['status'] = "9999";
        }
        $times = array("start","finish");
        for($i = 0;$i < sizeof($times);$i++){
            $strDate = $event->$times[$i];
            $strYear = date("Y",strtotime($strDate))+543;
            $strMonth= date("n",strtotime($strDate));
            $strDay= date("j",strtotime($strDate));
            $strHour= date("H",strtotime($strDate));
            $strMinute= date("i",strtotime($strDate));
            $strSeconds= date("s",strtotime($strDate));
            $strMonthCut = Array(
                "",
                "มกราคม",
                "กุมภาพันธ์",
                "มีนาคม",
                "เมษายน",
                "พฤษภาคม",
                "มิถุนายน",
                "กรกฎาคม",
                "สิงหาคม",
                "กันยายน",
                "ตุลาคม ",
                "พฤศจิกายน",
                "ธันวาคม"
            );
            $strMonthThai=$strMonthCut[$strMonth];
            $event->$times[$i]="$strDay $strMonthThai $strYear เวลา $strHour:$strMinute นาฬิกา";
            //$event['stat'] = 'newenw';
        }
    }
    Session::flash('word',Input::get('search'));
    return View::make('home.search')->with('links',$result['hits']['hits'])->with('events',$events);
});

use \Elasticquent\ElasticquentResultCollection as ResultCollection;

Route::get('/test2',function(){

    //$result=Link::search("*พะเยา*");
    //dd($result);
    if(Input::has('query')){
        $strQuery = Input::get('query');
    }else {
        $strQuery ="";
    }


    $client = new \Elasticsearch\Client();

    $params = array(
        'index' => 'portal',
        'type'  => 'links'
    );
    $params['body']['query']['query_string']['query'] = "*$strQuery*";
    $params['body']['query']['query_string']['analyzer'] = 'thai';
    $params['analyzer'] = "thai";
    $params['size'] = 20;
    //$params['analyzer'] = 'thai';
    //$result =$client->mlt($params);
    $result = $client->search($params);
    $result = new ResultCollection($result, $instance = new Link());
    return View::make('test')->with('result',$result);


});

Route::get('/test3',function(){

    if(Input::has('query')){
        $strQuery = Input::get('query');
    }else {
        $strQuery ="";
    }
    $result = Link::search("*$strQuery*");
    return View::make('test')->with('result',$result);
});
/***EVENTS***********/
Route::get('/admin/events/manage','AdminController@getManageEvent');
//create
Route::get('/admin/events/create','AdminController@getCreateEvent');
Route::post('/admin/events/create','AdminController@postCreateEvent');
//update
Route::get('/admin/events/{id}/update','AdminController@getUpdateEvent');
Route::post('/admin/events/{id}/update','AdminController@postUpdateEvent');
//delete
Route::get('/admin/events/{id}/delete','AdminController@getDeleteEvent');
/*stop*/


Route::get('/admin/manage','AdminController@getManage');
//create link
Route::get('/admin/link/create','AdminController@getCreateLink');
Route::post('/admin/link/create','AdminController@postCreateLink');
//stop create
// up to date link
Route::get('/admin/link/{id}/update','AdminController@getUpdateLink');
Route::post('/admin/link/{id}/update','AdminController@postUpdateLink');
//stop up to date
//delete link
Route::get('/admin/link/{id}/delete','AdminController@postDeleteLink');
// stop del

//update
Route::post('/admin/usercategory/{id}/update','AdminController@postUpdateCategory');
Route::post('/admin/majorcategory/{id}/update','AdminController@postUpdateCategory');
Route::post('/admin/middlecategory/{id}/update','AdminController@postUpdateCategory');
//stop update

//delete
Route::post('/admin/usercategory/{id}/delete','AdminController@postDeleteCategory');
Route::post('/admin/majorcategory/{id}/delete','AdminController@postDeleteCategory');
Route::post('/admin/middlecategory/{id}/delete','AdminController@postDeleteCategory');
//stop delete
Route::get('/ajax-usercategory','AdminController@ajaxUsercategory');
Route::get('/ajax-majorcategory','AdminController@ajaxMajorcategory');
Route::get('/ajax-middlecategory','AdminController@ajaxMiddlecategory');
Route::get('/admin/event/create','AdminController@getCreateEvent');
Route::resource('admin','AdminController');






/*Route::get('/users','UserController@getIndex');
Route::get('/users/add','UserController@getAdd');
Route::post('/users/add','UserController@postAdd');
Route::get('/users/{id}/update','UserController@getUpdate');
Route::post('/users/{id}/update','UserController@postUpdate');*/