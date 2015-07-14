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
use \Elasticquent\ElasticquentResultCollection as ResultCollection;



//Route::resource('admin','AdminController');
Route::get('/admin/login','SessionsController@login');
Route::get('/admin/logout','SessionsController@destroy');
Route::resource('sessions', 'SessionsController');
//หน้าหลัก
Route::get('/','HomeController@getIndex');
//หมวดหมู่
Route::get('/categories','HomeController@getCategories');
Route::get('/category/{id}/update','HomeController@getCategory');
Route::get('/category/{id}/most','HomeController@getCategory');
Route::get('/category/link/{id}/show','HomeController@getCategoryLink');
//หน่วยงาน
Route::get('/governments','HomeController@getGovernments');
Route::get('/government/{id}/show','HomeController@getGovernment');
Route::get('/government/link/{id}/show','HomeController@getGovernmentLink');
//กิจกรรม
Route::get('/events','HomeController@getEvents');
Route::get('/events/{id}/show','HomeController@getEvent');
//เพิ่ม สถิติเมื่อคลิ๊กลิ้ง
Route::post('/addfrequency','HomeController@postFrequency');
Route::get('/addfrequency',function(){
    App::abort(404);
});
//serch
Route::get('/search/str/{terms}/keywords_top','HomeController@getAutoSearch');
//site index
Route::get('/site-index','HomeController@getSiteIndex');
Route::get('/site-index/{char}','HomeController@getSiteIndexs');

//debug route
Route::get('/s',function(){
 App::abort(404);
});

Route::get('/search',function(){
    if(Request::ajax()){
        if(Input::has('term')){
            $strQuery = Input::get('term');
        }else {
            $strQuery ="";
        }


        $client = new \Elasticsearch\Client();

        $params = array(
            'index' => 'portal',
            'type'  => 'links'
        );
        $params['body']['query']['query_string']['fields'] = ["name","descript","link"];
        $params['body']['query']['query_string']['query'] = "*$strQuery* OR $strQuery";
        $params['body']['query']['query_string']['analyzer'] = 'thai';
        $params['analyzer'] = "thai";
        $params['size'] = 20;
        //$params['analyzer'] = 'thai';
        //$result =$client->mlt($params);
        $result = $client->search($params);
        $result = new ResultCollection($result, $instance = new Link());
        foreach ($result as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->name,'link'=>$query->link ];
        }
        return Response::json($results);
        //return View::make('test')->with('result',$result);
    }else{
        App::abort(404);
    }
});


/***EVENTS***********/
Route::get('/admin/events/manage','AdminController@getManageEvent');
Route::get('/admin/events/{id}/show','AdminController@getShowEvent');
//create
Route::get('/admin/events/create','AdminController@getCreateEvent');
Route::post('/admin/events/create','AdminController@postCreateEvent');
//update
Route::get('/admin/events/{id}/update','AdminController@getUpdateEvent');
Route::post('/admin/events/{id}/update','AdminController@postUpdateEvent');
//delete
Route::get('/admin/events/{id}/delete','AdminController@getDeleteEvent');
/*stop*/

/***GOV********/
Route::get('/admin/gov/manage','GovController@getManageGov');
Route::get('/admin/gov/{id}/show','GovController@getShowGov');
//create
Route::get('/admin/gov/create','GovController@getCreateGov');
Route::post('/admin/gov/create','GovController@postCreateGov');
//update
Route::get('/admin/gov/{id}/update','GovController@getUpdateGov');
Route::post('/admin/gov/{id}/update','GovController@postUpdateGov');
//delete
Route::get('/admin/gov/{id}/delete','GovController@getDeleteGov');
/*stop*/

/***recommends********/
Route::get('/admin/recommend/manage','RecommendController@getManageRecommend');
Route::get('/admin/recommend/{id}/show','RecommendController@getShowRecommend');
//create
Route::get('/admin/recommend/create','RecommendController@getCreateRecommend');
Route::post('/admin/recommend/create','RecommendController@postCreateRecommend');
//update
Route::get('/admin/recommend/{id}/update','RecommendController@getUpdateRecommend');
Route::post('/admin/recommend/{id}/update','RecommendController@postUpdateRecommend');
//delete
Route::get('/admin/recommend/{id}/delete','RecommendController@getDeleteRecommend');
/*stop*/

/*LINK*/
Route::get('/admin/manage','AdminController@getManage');
Route::get('/admin/link/{id}/show','AdminController@getShowLink');
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




/*All ajax categories*/
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

/*Route::get('/users','UserController@getIndex');
Route::get('/users/add','UserController@getAdd');
Route::post('/users/add','UserController@postAdd');
Route::get('/users/{id}/update','UserController@getUpdate');
Route::post('/users/{id}/update','UserController@postUpdate');*/