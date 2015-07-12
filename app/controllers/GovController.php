<?php

use Illuminate\Support\Facades\Redirect;
class GovController extends BaseController
{
    function __construct()
    {
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
    public function getManageGov(){
        return View::make('admin.manage_gov')->with('goverment',Gov::all());
    }

    public function getCreateGov(){
        return View::make('admin.create_gov');
    }
    public function postCreateGov(){
        $rules = array(
            'name' => 'required|unique:gov,name',
            'ministry' => 'required',
            'where'=>'required',
            'contact'=>'required',
            'link'=>'required'
        );

        $validator = Validator::make(Input::all(),$rules);
        if ($validator->fails()) {
            return Redirect::to('/admin/gov/create')
                ->withErrors($validator)
                ->withInput(Input::all());
        }else{
            $gov = new Gov();
            $gov->name = Input::get('name');
            $gov->ministry = Input::get('ministry');
            $gov->where = Input::get('where');
            $gov->contact = Input::get('contact');
            $gov->link = Input::get('link');
            $gov->frequency = 0;
            $gov->save();
            Session::flash('message', "สร้าง ".Input::get('name')." สำเร็จ!!");
            return Redirect::to('/admin/gov/create');
        }
    }

    public function getUpdateGov($id){
        $gov = Gov::find($id);
        return View::make('admin.update_gov')->with('gov',$gov);
    }

    public function postUpdateGov($id){
        $rules = array(
            'name' => 'required|unique:gov,name,'.$id,
            'ministry' => 'required',
            'where'=>'required',
            'contact'=>'required',
            'link'=>'required'
        );

        $validator = Validator::make(Input::all(),$rules);
        if ($validator->fails()) {
            return Redirect::to('/admin/gov/'.$id.'/update')
                ->withErrors($validator)
                ->withInput(Input::all());
        }else{
            $gov = Gov::find($id);
            $gov->name = Input::get('name');
            $gov->ministry = Input::get('ministry');
            $gov->where = Input::get('where');
            $gov->contact = Input::get('contact');
            $gov->link = Input::get('link');
            $gov->save();
            Session::flash('message', "สร้าง ".Input::get('name')." สำเร็จ!!");
            return Redirect::to('/admin/gov/'.$id.'/update')->withInput(Input::all());
        }
    }

    public function getDeleteGov($id){
        $del = Gov::findOrFail($id);
        $name=$del->name;
        $del->delete();
        Session::flash('message', "ลบ ".$name." สำเร็จ!!");
        return Redirect::to('/admin/gov/manage');
    }

    public function getShowGov($id){
        $gov = Gov::find($id);
        $columns = Schema::getColumnListing('gov');
        return View::make('admin.show_gov')->with('gov',$gov)->with('columns',$columns);
    }


}