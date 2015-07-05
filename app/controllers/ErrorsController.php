<?php

class ErrorsController extends BaseController {

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

    protected $layout = "home.layout";

    /*
    |--------------------------------------------------------------------------
    | Errors Controller
    |--------------------------------------------------------------------------
    */

    public function error($code) {
        switch ($code) {
            case 404:
                $this->layout->content = View::make('errors.404');
                break;

            default:
                $this->layout->content = View::make('errors.404');
                break;
        }
    }
}
