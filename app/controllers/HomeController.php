<?php

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
        return View::make('home.index-demo')->with('ucs',UserCategories::all());//->with('events',$events);
		//return View::make('home.index-demo');
	}

    public function getEvent(){
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
                $event->$times[$i]="$strDay $strMonthThai $strYear เวลา $strHour:$strMinute นาฬิกา";
                //$event['stat'] = 'newenw';
            }
        }
        Session::flash('word',Input::get('search'));
        return View::make('home.event');
    }
}
