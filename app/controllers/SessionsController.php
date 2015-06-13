<?php

class SessionsController extends BaseController {

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

    public function login(){

        if(Auth::check()){
            return Redirect::to('/admin/manage');
        }
        return View::make('admin.index');
    }

    public function store(){

        $remember = (Input::has('remember')) ? true : false;
        //var_dump($remember);


        if(Auth::attempt(Input::only('username','password'),$remember)){

            return Redirect::to('/admin/manage');
        }

        return Redirect::back()->withInput();
    }

    public function destroy(){
        Auth::logout();

        return Redirect::to('/admin/login');
    }
}
