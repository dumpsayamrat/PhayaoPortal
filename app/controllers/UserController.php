<?php

use Illuminate\Support\Facades\Redirect;
class UserController extends BaseController {

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

	public function getIndex(){
		
		$users= User::all();
		
		return View::make('user.index')
			->with("users",$users);
	}
	
	public function getAdd(){
		return View::make('user.add');
	}

    public function getUpdate($id){
        $user = User::find($id);
        return View::make("user.update")->with("user",$user);
        //return 'Hello World';

    }

    /**
     * @param $id
     */
    public function postUpdate($id){
        $id = Input::get('id');
        $user = User::find($id);

       /* $user->username = Input::get('username');
        $user->password = Input::get('password');*/
        /* @var $user User*/
        $user->update(Input::all());
        $user->save();


    }
	
	public  function postAdd(){
		
		$user = new User();
		
		$user->username = Input::get('username');		
		$user->password = Input::get('password');
		
		$user->save();
		
		return Redirect::to('/users');
		//return Redirect::action('UserController@getIndex');
	}
}
