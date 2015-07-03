<?php
use \Elasticquent\ElasticquentResultCollection as ResultCollection;
class HomeController extends BaseController {


    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */

	public function getIndex(){

        return View::make('home.index-demo')->with('ucs',UserCategories::all())->with('recommends',Recommend::idDescending()->get());//->with('events',$events);
		//return View::make('home.index-demo');
	}

    public function getEvents(){
        $events = Events::orderBy('start','ASC')->get();
        $countEvent = array();
        $countEvent['live'] = 0;
        $countEvent['future'] = 0;
        foreach($events as $event){
            date_default_timezone_set('Asia/Bangkok');
            $date11 = $event->start;
            $date21 = $event->finish;
            if(date("Y-m-d H:i:s") < $date11){
                $countEvent['future'] = $countEvent['future']+1;
                $date1 = new DateTime($date11);
                $date2 = new DateTime(date("Y-m-d H:i:s"));
                $interval = $date2->diff($date1);
                if($interval->days==0){
                    $event['status'] = "-3";
                    $event['hr'] = $interval->h;
                }else{
                    //$event['status'] = $interval->days;
                      $event['status'] = "-3";
                }
                //$event['status'] = $interval->days;
            }elseif(date("Y-m-d H:i:s")>=$date11&&date("Y-m-d H:i:s")<=$date21){
                $countEvent['live'] = $countEvent['live']+1;
                $event['status'] = "-1";
            }elseif(date("Y-m-d H:i:s") >= $date21){
                $event['status'] = "-2";
            }else{
                $event['status'] = "9999";
            }
            $start = new DateTime($date11);
            $finish = new DateTime($date21);
            $interval1 = $start->diff($finish);
            //dd($event->start);
            if($interval1->days < 1){
                $strDate = $event->start;
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
                $event['format']="$strDay $strMonthThai $strYear";
            }elseif($interval1->days > 0 ){
                if($strMonth= date("n",strtotime($event->start)) == $strMonth= date("n",strtotime($event->finish))){
                    $strDate = $event->start;
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
                    $strDayFinish= date("j",strtotime($event->finish));
                    $event['format']="$strDay - $strDayFinish $strMonthThai $strYear";
                }else{
                    $strDate = $event->start;
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
                    $strDayFinish= date("j",strtotime($event->finish));
                    $strMonthFinish= date("n",strtotime($event->finish));
                    $event['format']="$strDay $strMonthThai - $strDayFinish $strMonthCut[$strMonthFinish] $strYear";
                }
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
                $event->$times[$i]="$strDay $strMonthThai $strYear เวลา $strHour:$strMinute น.";
                //$event['stat'] = 'newenw';
            }
        }
        return View::make('home.events')->with('events',$events)->with('countEvent',$countEvent);
    }

    public function getSearch(){
        $events = Events::where('type','2')->orderBy('start','ASC')->get();
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
                $event->$times[$i]="$strDay $strMonthThai $strYear เวลา $strHour:$strMinute น.";
                //$event['stat'] = 'newenw';
            }
        }
        Session::flash('word',Input::get('search'));
        return View::make('home.event');
    }

    public function getEvent($id){
        $event = Events::find($id);
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
                    //$event['status'] = $interval->days;
                    $event['status'] = "-3";
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
                $event->$times[$i]="$strDay $strMonthThai $strYear เวลา $strHour:$strMinute น.";
                //$event['stat'] = 'newenw';
            }

        return View::make('home.showEvent')->with('event',$event);
    }

    public function postFrequency(){
        if(Request::ajax()){
            $link=Link::where('link', '=', Input::get('link'))->firstOrFail();
            $link->frequency = $link->frequency+1;
            $link->save();
        }else{
            App::abort(404);
        }

    }

    public function getAutoSearch($terms){
        if($terms!=-11111){
            $strQuery = $terms;
            $client = new \Elasticsearch\Client();
            $params = array(
                'index' => 'portal',
                'type'  => 'links'
            );
            $params['body']['query']['query_string']['fields'] = ["name","descript","link"];
            $params['body']['query']['query_string']['query'] = "*$strQuery* OR $strQuery";
            $params['body']['query']['query_string']['analyzer'] = 'thai';
            $params['analyzer'] = "thai";
            $params['size'] = 50;
            //$params['analyzer'] = 'thai';
            //$result =$client->mlt($params);
            $results = $client->search($params);
            $results = new ResultCollection($results, $instance = new Link());
            Session::flash('search',$terms);
            return View::make('home.ajax-search')->with('results',$results);
        }else {
            return View::make('home.ajax-search');
        }

        //return View::make('home.ajax-search');

    }
}
