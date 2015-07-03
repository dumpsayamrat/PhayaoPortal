<?php

use Illuminate\Support\Facades\Redirect;
class RecommendController extends BaseController
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
    public function getManageRecommend(){
        return View::make('admin.manage_recommend')->with('recommends',Recommend::all());
    }

    public function getCreateRecommend(){
        return View::make('admin.create_recommend');
    }
    public function postCreateRecommend(){
        $rules = array(
            'name' => 'required|unique:recommend,name',
            'link' => 'required',
            'descript'=>'required',
        );

        $validator = Validator::make(Input::all(),$rules);
        if ($validator->fails()) {
            return Redirect::to('/admin/recommend/create')
                ->withErrors($validator)
                ->withInput(Input::all());
        }else{
            $recommend = new Recommend();
            $recommend->name = Input::get('name');
            $recommend->link = Input::get('link');
            $recommend->descript = Input::get('descript');
            $recommend->frequency = 0;
            $recommend->save();
            Session::flash('message', "สร้าง ".Input::get('name')." สำเร็จ!!");
            return Redirect::to('/admin/recommend/create');
        }
    }

    public function getUpdateRecommend($id){
        $recommend = Recommend::find($id);
        return View::make('admin.update_recommend')->with('recommend',$recommend);
    }

    public function postUpdateRecommend($id){
        $rules = array(
            'name' => 'required|unique:recommend,name,'.$id,
            'link' => 'required',
            'descript'=>'required',
        );

        $validator = Validator::make(Input::all(),$rules);
        if ($validator->fails()) {
            return Redirect::to('/admin/recommend/'.$id.'/update')
                ->withErrors($validator)
                ->withInput(Input::all());
        }else{
            $recommend = Recommend::find($id);
            $recommend->name = Input::get('name');
            $recommend->link = Input::get('link');
            $recommend->descript = Input::get('descript');
            $recommend->save();
            Session::flash('message', "สร้าง ".Input::get('name')." สำเร็จ!!");
            return Redirect::to('/admin/recommend/'.$id.'/update');
        }
    }

    public function getDeleteRecommend($id){
        $del = Recommend::findOrFail($id);
        $name=$del->name;
        $del->delete();
        Session::flash('message', "ลบ ".$name." สำเร็จ!!");
        return Redirect::to('/admin/recommend/manage');
    }

    public function getShowRecommend($id){
        $recommend = Recommend::find($id);
        $columns = Schema::getColumnListing('recommend');
        return View::make('admin.show_recommend')->with('recommend',$recommend)->with('columns',$columns);
    }


}