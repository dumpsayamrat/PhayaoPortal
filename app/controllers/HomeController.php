<?php
use \Elasticquent\ElasticquentResultCollection as ResultCollection;
class HomeController extends BaseController {
    protected $breadcrumbs;

    function __construct() {
        $this->breadcrumbs = new Breadcrumbs;
    }
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


    public function setupLayout() {
        $this->getCountEvent();
    }
    public function getCountEvent(){
        $countEventLive = 0;
        $events = Events::orderBy('start','ASC')->get();
        foreach($events as $event){
            date_default_timezone_set('Asia/Bangkok');
            $date11 = $event->start;
            $date21 = $event->finish;
            if(date("Y-m-d H:i:s")>=$date11&&date("Y-m-d H:i:s")<=$date21){
                $countEventLive = $countEventLive+1;
                $event['status'] = "-1";
            }

            View::share('countEventLive',$countEventLive);
        }
    }


	public function getIndex(){
        $government = Gov::groupBy('ministry')->get();
        $this->breadcrumbs->generate();
        return View::make('home.index-demo')
            ->with('ucs',UserCategories::all())
            ->with('recommends',Recommend::idDescending()->get())
            ->with('government',$government);//->with('events',$events);
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
        // generate breadcrumbs
        $this->breadcrumbs->push('กิจกรรม',URL::to('/events'));
        $this->breadcrumbs->generate();

        return View::make('home.events')->with('events',$events)->with('countEvent',$countEvent);
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
        $this->breadcrumbs->push('กิจกรรม',URL::to('/events'));
        $this->breadcrumbs->push($event->name,URL::to('/events/'.$id.'/show'));
        $this->breadcrumbs->generate();
        return View::make('home.showEvent')->with('event',$event);
    }

    public function postFrequency(){
        if(Request::ajax()){
            if(Input::get('type')=='link'){
                $link=Link::where('id', '=', Input::get('link'))->firstOrFail();
                $link->frequency = $link->frequency+1;
                $link->save();
            }elseif(Input::get('type')=='recommend'){

                $recommend=Recommend::where('id', '=', Input::get('link'))->firstOrFail();
                $recommend->frequency = $recommend->frequency+1;
                $recommend->save();
            }elseif(Input::get('type')=='gov'){
                $gov=Gov::where('id', '=', Input::get('link'))->firstOrFail();
                $gov->frequency = $gov->frequency+1;
                $gov->save();
            }
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
           //dd($results);

            Session::flash('search',$terms);
            return View::make('home.ajax-search')->with('results',$results);
        }else {
            return View::make('home.ajax-search');
        }

        //return View::make('home.ajax-search');

    }

    public function getCategories(){
        $this->breadcrumbs->push('หมวดหมู่',URL::to('/categories'));
        $this->breadcrumbs->generate();
        return View::make('home.categories')->with('ucs',UserCategories::all());
    }


    public function getCategory($id){
        $field = 'created_at';
        $type = 'decs';
        if(Request::is('category/*/new')){
            $field = 'created_at';
            $type = 'decs';
        }elseif(Request::is('category/*/update')){
            $field = 'updated_at';
            $type = 'decs';
        }elseif(Request::is('category/*/most')){
            $field = 'frequency';
            $type = 'decs';
        }
        $results = Link::where('middle_categories_id','=',$id)->orderBy($field,$type)->get();
        $results = getDays($results);
        $result = MiddleCategories::where('id',$id)->first();

        $this->breadcrumbs->push('หมวดหมู่',URL::to('/categories'));
        $this->breadcrumbs->push($result->name,URL::to('/category/'.$id.'/new'));
        $this->breadcrumbs->generate();
        return View::make('home.category')->with('links',$results)->with('resultCategory',$result)->with('id',$id);
    }

    public function getCategoryLink($id){
        $link = Link::find($id);
        if(isset($link->gov_id)){

            $this->breadcrumbs->push('หมวดหมู่',URL::to('/categories'));
            $this->breadcrumbs->push($link->MiddleCategories->name,URL::to('/category/'.$link->MiddleCategories->id.'/new'));
            $this->breadcrumbs->push($link->name,URL::to('/category/link/'.$link->Gov->id.'/show'));
            $this->breadcrumbs->generate();
            return View::make('home.category_link')->with('link',$link);
        }else{
            App::abort(404);
        }
    }

    public function getGovernments(){
        $governments = Gov::groupBy('ministry')->get();

        $this->breadcrumbs->push('หน่วยงาน',URL::to('/governments'));
        $this->breadcrumbs->generate();
        return View::make('home.governments')->with('governments',$governments);
    }

    public function getGovernment($id){
        $gov = Gov::find($id);
        $government = Gov::where('ministry','=',$gov->ministry)->get();

        $this->breadcrumbs->push('หน่วยงาน',URL::to('/governments'));
        $this->breadcrumbs->push($gov->ministry,URL::to('/government/'.$id.'/show'));
        $this->breadcrumbs->generate();
        return View::make('home.government')->with('government',$government)->with('ministryName',$gov->ministry);
    }
    public function getGovernmentLink($id){
        $gov = Gov::find($id);

        $this->breadcrumbs->push('หน่วยงาน',URL::to('/governments'));
        $this->breadcrumbs->push($gov->ministry,URL::to('/government/'.$id.'/show'));
        $this->breadcrumbs->push($gov->name,URL::to('/government/link/'.$id.'/show'));
        $this->breadcrumbs->generate();
        return View::make('home.government_link')->with('gov',$gov);
    }
    public function getSiteIndex(){
        $char = "ก";
        $check = false;
        $disablechar = [];
        $thaichar = array('ก','ข','ค','ง','จ','ฉ','ช','ซ','ฌ','ญ','ฐ','ฑ','ฒ'
        ,'ณ','ด','ต','ถ','ท','ธ','น','บ','ป','ผ','ฝ','พ','ฟ','ภ','ม','ย','ร','ล'
        ,'ว','ศ','ษ','ส','ห','ฬ','อ','ฮ');
        $thaivowel = array('เ','แ','ใ','ไ','โ');


        for($i=0;$i<count($thaichar);$i++){
            if($char == $thaichar[$i]){
                $check = true;
            }
        }
        if(!$check){
            App::abort(404);
        }

        $links = Link::where('name','LIKE',$char.'%')->get();

        for($i=0;$i<count($thaivowel);$i++){
            $links = $links->merge(Link::where('name','LIKE',$thaivowel[$i].$char.'%')->get());
        }

        for($i=0;$i<count($thaichar);$i++){
            $checkChar = Link::where('name','LIKE',$thaichar[$i].'%')->get();
            for($j=0;$j<count($thaivowel);$j++){
                $checkChar = $checkChar->merge(Link::where('name','LIKE',$thaivowel[$j].$thaichar[$i].'%')->get());
            }
            if(count($checkChar)==0){
                $disablechar[] = $thaichar[$i];
            }
        }

        $this->breadcrumbs->push('Site Index',URL::to('/site-index'));
        $this->breadcrumbs->generate();
        return View::make('home.site-index')
            ->with('thaiChar',$thaichar)
            ->with('char',$char)
            ->with('links',$links)
            ->with('disablechar',$disablechar);
    }

    public function getSiteIndexs($char){
        $check = false;
        $disablechar = [];
        $thaichar = array('ก','ข','ค','ง','จ','ฉ','ช','ซ','ฌ','ญ','ฐ','ฑ','ฒ'
        ,'ณ','ด','ต','ถ','ท','ธ','น','บ','ป','ผ','ฝ','พ','ฟ','ภ','ม','ย','ร','ล'
        ,'ว','ศ','ษ','ส','ห','ฬ','อ','ฮ');
        $thaivowel = array('เ','แ','ใ','ไ','โ');

        if(!isset($char)){
            $char = "ก";
        }
        for($i=0;$i<count($thaichar);$i++){
            if($char == $thaichar[$i]){
                $check = true;
            }
        }
        if(!$check){
            App::abort(404);
        }

        $links = Link::where('name','LIKE',$char.'%')->get();

        for($i=0;$i<count($thaivowel);$i++){
            $links = $links->merge(Link::where('name','LIKE',$thaivowel[$i].$char.'%')->get());
        }

       for($i=0;$i<count($thaichar);$i++){
            $checkChar = Link::where('name','LIKE',$thaichar[$i].'%')->get();
            for($j=0;$j<count($thaivowel);$j++){
                $checkChar = $checkChar->merge(Link::where('name','LIKE',$thaivowel[$j].$thaichar[$i].'%')->get());
            }
            if(count($checkChar)==0){
                $disablechar[] = $thaichar[$i];
            }
        }

        $this->breadcrumbs->push('Site Index',URL::to('/site-index'));
        $this->breadcrumbs->generate();
        return View::make('home.site-index')
            ->with('thaiChar',$thaichar)
            ->with('char',$char)
            ->with('links',$links)
            ->with('disablechar',$disablechar);
    }




}
