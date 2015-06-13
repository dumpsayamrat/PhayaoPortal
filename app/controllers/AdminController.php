<?php

use Illuminate\Support\Facades\Redirect;
class AdminController extends BaseController {
    function __construct() {
        $this->beforeFilter('auth');
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
	public function showWelcome()
	{
		return View::make('hello');
	}

	|
	*/

    public function getManageEvent(){
        $events = Events::orderBy('type','ASC')->orderBy('start','ASC')->get();
        foreach($events as $event){
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
                $event->$times[$i]="$strDay $strMonthThai $strYear, $strHour:$strMinute";

            }
        }
        return View::make('admin.manage_event')->with('events',$events);
    }



    public function getCreateEvent(){
        return View::make('admin.create_event');
    }

    public function postCreateEvent(){
        $rules = array(
            'name' => 'required|unique:events,name',
            'img' => 'required|image|mimes:jpg,jpeg,png,gif',
            'type'=>'required',
            'start'=>'required',
            'finish'=>'required'
        );

        $validator = Validator::make(Input::all(),$rules);
        if ($validator->fails()) {
            return Redirect::to('/admin/events/create')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            if(Input::get('start') > Input::get('finish') ){
                $messages = $validator->errors();
                $messages->add('start', 'กรุณากรอก วัน/เวลา เริ่มและสิ้นสุดกิจกรรม ให้ถูกต้อง');
                return Redirect::to('/admin/events/create')
                    ->withErrors($messages)
                    ->withInput(Input::all());
            }
            $file =Input::file('img');
            //$fileName = $file->getClientOriginalName();
            $archivo = value(function() use ($file){
                $filename = str_random(34) . '.' . $file->getClientOriginalExtension();
                return strtolower($filename);
            });
            //var_dump($archivo);

            $destinationPath = '/uploads/events/';
            // Move file to generated folder
            $check = $file->move($destinationPath, $archivo);

            if($check){
                $event = new Events();
                $event->name = Input::get('name');
                $event->type = Input::get('type');
                $event->start = Input::get('start');
                $event->finish = Input::get('finish');
                $event->img = $archivo;
                $event->descript = Input::get('descript');
                $event->save();
                Session::flash('message', "สร้าง ".Input::get('name')." สำเร็จ!!");
                return Redirect::to('/admin/events/create');
            }else{
                $messages = $validator->errors();
                $messages->add('img', 'มีข้อผิดพลาดระหว่างการอัพโหลดรูป กรุณาลองอีกครั้ง');
                return Redirect::to('/admin/events/create')
                    ->withErrors($messages)
                    ->withInput(Input::all());
            }
        }
    }
    // delete event
    public function getDeleteEvent($id){
        $del = Events::findOrFail($id);
        $check=File::delete('/uploads/events/'.$del->img);
        $name=$del->name;
        $del->delete();
        Session::flash('message', "ลบ ".$name." สำเร็จ!!");
        return Redirect::to('/admin/events/manage');
    }
    //update event
    public function getUpdateEvent($id){
        $data = Events::find($id);
        return View::make('admin.update_event')->with('event',$data);
    }
    public function postUpdateEvent($id){
        $rules = array(
            'name' => 'required|unique:events,name,'.$id,
            'img' => 'image|mimes:jpg,jpeg,png,gif',
            'type'=>'required',
            'start'=>'required',
            'finish'=>'required'
        );

        $validator = Validator::make(Input::all(),$rules);
        if(Input::get('start') > Input::get('finish') ){
            $messages = $validator->errors();
            $messages->add('start', 'กรุณากรอก วัน/เวลา เริ่มและสิ้นสุดกิจกรรม ให้ถูกต้อง');
            return Redirect::to('/admin/events/create')
                ->withErrors($messages)
                ->withInput(Input::all());
        }
        if ($validator->fails()) {
            return Redirect::to('/admin/events/'.$id.'/update')
                ->withErrors($validator)
                //->withInput(Input::all())
                ;
        } else {
            if(Input::hasFile('img')){
                $event = Events::find($id);
                if($event->img){
                    File::delete('/uploads/events/'.$event->img);
                }

                $file =Input::file('img');
                //$fileName = $file->getClientOriginalName();
                $archivo = value(function() use ($file){
                    $filename = str_random(34) . '.' . $file->getClientOriginalExtension();
                    return strtolower($filename);
                });
                //var_dump($archivo);

                $destinationPath = 'uploads/events/';
                // Move file to generated folder
                $check = $file->move($destinationPath, $archivo);

                if($check){

                    //$event = new Events();
                    $event->name = Input::get('name');
                    $event->type = Input::get('type');
                    $event->start = Input::get('start');
                    $event->finish = Input::get('finish');
                    $event->img = $archivo;
                    $event->descript = Input::get('descript');
                    $event->save();
                    Session::flash('message', "แก้ไข ".Input::get('name')." สำเร็จ!!");
                    return Redirect::to('/admin/events/'.$id.'/update');

                }else{
                    $messages = $validator->errors();
                    $messages->add('img', 'มีข้อผิดพลาดระหว่างการอัพโหลดรูป กรุณาลองอีกครั้ง');
                    return Redirect::to('/admin/events/'.$id.'/update')
                        ->withErrors($messages)
                        ->withInput(Input::all());
                }
            }else{
                $event = Events::find($id);
                $check = true;
                if($check){
                    $event->name = Input::get('name');
                    $event->type = Input::get('type');
                    $event->start = Input::get('start');
                    $event->finish = Input::get('finish');
                    $event->descript = Input::get('descript');
                    $event->save();
                    Session::flash('message', "แก้ไข ".Input::get('name')." สำเร็จ!!");
                    return Redirect::to('/admin/events/'.$id.'/update');
                }
            }
            //var_dump(Input::all());


        }
    }


    public function getManage(){

        //$data = UserCategories::all();
        //$data = Link::orderBy('middle_categories_id', 'DESC')->get();
        $data = Link::orderBy('middle_categories_id', 'DESC')->get();

        return View::make('admin.admin1')->with('links',$data);
    }

    public function getCreateLink(){
        return View::make('admin.create_link');
    }
    public function postCreateLink(){

        if(Input::get('form')=='form_main'){
            //var_dump(Input::all());
            $rules = array(
                'name' => 'required|unique:links,name',
                'img' => 'required|image|mimes:jpg,jpeg,png,gif',
                'link'=>'required'
            );
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return Redirect::to('/admin/link/create')
                    ->withErrors($validator)
                    ->withInput(Input::all());
            } else {
                $file =Input::file('img');
                //$fileName = $file->getClientOriginalName();
                $archivo = value(function() use ($file){
                    $filename = str_random(34) . '.' . $file->getClientOriginalExtension();
                    return strtolower($filename);
                });
                //var_dump($archivo);

                $destinationPath = '/uploads/';
                // Move file to generated folder
                $check = $file->move($destinationPath, $archivo);

                if($check){
                    $link = new Link();
                    $link->name = Input::get('name');
                    $link->link = Input::get('link');
                    $link->descript = Input::get('descript');
                    $link->img = $archivo;
                    if(Input::get('middlecategories')){
                        $link->middle_categories_id = Input::get('middlecategories');
                    }else{
                        $link->middle_categories_id = 3;
                    }

                    $link->save();
                    Session::flash('message', "สร้าง ".Input::get('name')." สำเร็จ!!");
                    return Redirect::to('/admin/link/create');
                 }else{
                    $messages = $validator->errors();
                    $messages->add('img', 'มีข้อผิดพลาดระหว่างการอัพโหลดรูป กรุณาลองอีกครั้ง');
                    return Redirect::to('/admin/link/create')
                        ->withErrors($messages)
                        ->withInput(Input::all());
                }

            }


        }else if(Request::ajax()&&Input::get('form')=='form_uc'){
            $data = new UserCategories();
            $data->name = Input::get('name');
            $data->save();
        }else if(Request::ajax()&&Input::get('form')=='form_mjc'){
            $data = new MajorCategories();
            $data->name = Input::get('name');
            $data->user_categories_id = 6;
            $data->save();
        }else if(Request::ajax()&&Input::get('form')=='form_mdc'){
            $data = new MiddleCategories();
            $data->name = Input::get('name');
            $data->major_categories_id = 6;
            $data->save();
        }

    }

    public function postDeleteLink($id){
        $del = Link::findOrFail($id);
        $check=File::delete('/uploads/'.$del->img);
        $name=$del->name;
        $del->delete();
        Session::flash('message', "ลบ ".$name." สำเร็จ!!");
        return Redirect::to('/admin/manage');


    }

    public function getUpdateLink($id){
        $link = Link::find($id);
        $uc = UserCategories::all();
        $usercategories = array();
        foreach($uc as $ucc){
            $usercategories[$ucc->id]= $ucc->name;
        }
        $mjc = MajorCategories::where('user_categories_id','=',$link->MiddleCategories->MajorCategories->UserCategories->id)->get();
        foreach($mjc as $mjcc){
            $majorcategories[$mjcc->id]= $mjcc->name;
        }
        $mdc = MiddleCategories::where('major_categories_id','=',$link->MiddleCategories->MajorCategories->id)->get();
        foreach($mdc as $mdcc){
            $middlecategories[$mdcc->id]= $mdcc->name;
        }
        return View::make('admin.update_link')
            ->with('link',$link)
            ->with('usercategories',$usercategories)
            ->with('majorcategories',$majorcategories)
            ->with('middlecategories',$middlecategories);
    }
    public function postUpdateLink($id){
        $rules = array(
            'name' => 'required|unique:links,name,'.$id,
            'img' => 'image|mimes:jpg,jpeg,png,gif',
            'link'=>'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('/admin/link/'.$id.'/update')
                ->withErrors($validator)
                //->withInput(Input::all())
                ;
        } else {
            if(Input::hasFile('img')){
                $link = Link::find($id);
                if($link->img){
                    File::delete('/uploads/'.$link->img);
                }

                $file =Input::file('img');
                //$fileName = $file->getClientOriginalName();
                $archivo = value(function() use ($file){
                    $filename = str_random(34) . '.' . $file->getClientOriginalExtension();
                    return strtolower($filename);
                });
                //var_dump($archivo);

                $destinationPath = '/uploads/';
                // Move file to generated folder
                $check = $file->move($destinationPath, $archivo);

                if($check){

                    $link->name = Input::get('name');
                    $link->link = Input::get('link');
                    $link->descript = Input::get('descript');
                    $link->img = $archivo;
                    if(Input::get('middlecategories')){
                        $link->middle_categories_id = Input::get('middlecategories');
                    }else{
                        $link->middle_categories_id = 3;
                    }

                    $link->save();
                    Session::flash('message', "แก้ไข ".Input::get('name')." สำเร็จ!!");
                    return Redirect::to('/admin/link/'.$id.'/update');
                }else{
                    $messages = $validator->errors();
                    $messages->add('img', 'มีข้อผิดพลาดระหว่างการอัพโหลดรูป กรุณาลองอีกครั้ง');
                    return Redirect::to('/admin/link/'.$id.'/update')
                        ->withErrors($messages);
                        //->withInput(Input::all());
                }
            }else{
                $link = Link::find($id);
                $check = true;
                if($check){

                    $link->name = Input::get('name');
                    $link->link = Input::get('link');
                    $link->descript = Input::get('descript');

                    if(Input::get('middlecategories')){
                        $link->middle_categories_id = Input::get('middlecategories');
                    }else{
                        $link->middle_categories_id = 3;
                    }

                    $link->save();
                    Session::flash('message', "แก้ไข ".Input::get('name')." สำเร็จ1!!");
                    return Redirect::to('/admin/link/'.$id.'/update');
                }
            }
            //var_dump(Input::all());


        }
    }




    public function postDeleteCategory($id){
        if(Request::ajax()){
            if (Request::ajax()&&Request::is('admin/usercategory/*'))
            {
                $data = UserCategories::findOrFail($id);
                $data->delete();
            }else if(Request::is('admin/majorcategory/*')){
                $data = MajorCategories::findOrFail($id);
                $data->delete();
            }else if(Request::is('admin/middlecategory/*')){
                $data = MiddleCategories::findOrFail($id);
                $data->delete();
            }
            return Redirect::to('admin/login');
        }

    }
    public function postUpdateCategory($id){
        if(Request::ajax()){
            if (Request::is('admin/usercategory/*'))
            {
                $data = UserCategories::find($id);
                $data->name=Input::get('name');
                $data->save();

                //return $id;
            }else if(Request::is('admin/majorcategory/*')){
                $data = MajorCategories::find($id);
                $data->name=Input::get('name');
                $data->user_categories_id = Input::get('user_categories_id');
                $data->save();
            }else if(Request::is('admin/middlecategory/*')){
                $data = MiddleCategories::find($id);
                $data->name=Input::get('name');
                $data->major_categories_id = Input::get('major_categories_id');
                $data->save();
            }
            return Redirect::to('admin/login');
        }
    }


    public function ajaxUsercategory(){
        $data = UserCategories::all();

        return Response::json($data);
    }
    public function ajaxMajorcategory(){
        $mjc_id =Input::get('mjc_id');

        if(is_numeric($mjc_id)){
            $data = MajorCategories::where('user_categories_id','=',$mjc_id)->get();
        }else{
            $data = MajorCategories::all();
        }

        return Response::json($data);
    }
    public function ajaxMiddlecategory(){
        $mdc_id =Input::get('mdc_id');
        if(is_numeric($mdc_id)){
            $data = MiddleCategories::where('major_categories_id','=',$mdc_id)->get();
        }else{
            $data = MiddleCategories::all();
        }


        return Response::json($data);
    }

}
