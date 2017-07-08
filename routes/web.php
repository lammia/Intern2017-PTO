<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('a', function () {
    echo 'aa';
});

Route::get('db',function(){
 $list = DB::table('users')->get();
 echo '<pre>';
 print_r($list);
 echo '</pre>';
 echo $list->count();
});

Route::get('login', 'MyController@getForm');

//Route::post('login','MyController@postForm');

Route::post('login',['as'=>'postForm','uses'=>'MyController@postForm']);

Route::post('',['as'=>'postForm','uses'=>'MyController@postForm']);

Route::get('database',function(){
	Schema::create('loaisanpham',function($table){
		$table->increments('id');
		$table->string('ten',200);
	});
	echo'cc';
});

Route::get('logout', 'MyController@logout');

//ADMIN

Route::get('admin/login','Admin\AuthController@getLogin');
Route::post('admin/login',['as'=>'postForm1','uses'=>'Admin\AuthController@postLogin']);
Route::get('admin/logout', 'Admin\AuthController@logout');

//Manager
Route::get('manager/login','Manager\ManagerController@getLogin');
Route::post('manager/login',['as'=>'postForm2','uses'=>'Manager\ManagerController@postLogin']);
Route::get('manager/logout', 'Manager\ManagerController@logout');

Route::get('cc', function () {
    $a = App\Admin::all();
    var_dump($a);
});

Route::get('index', function () {
    return view('user.content');
});
Route::get('manager/index', function () {
    return view('manager.content');
});
//view lich su cua user
Route::get('historyuser', function () {
    return view('user.history');
});

/*----------------------------- Lien quan den Manager------------------------------*/
//view lich su cua cac user trong manager
Route::get('historymanager', function () {
    return view('manager.history');
});

Route::get('historyofteam', function () {
    return view('manager.historyofteam');
});

Route::get('responsePtoOfTeam', function () {
    return view('manager.responsePtoOfTeam');
});

//xac nhan hoac tu choi tu phia user
/*Route::get('responsePtoOfTeam/{menu}', function ($menu) {
    echo $menu;
    return view('manager.responsePtoOfTeam');
});
*/
Route::get('/acceptPtoOfTeam/{menu}', 'Manager\ManagerController@acceptrequest');
Route::get('/denyPtoOfTeam/{menu}', 'Manager\ManagerController@denyrequest');



/*----------------------------- Lien quan den Admin------------------------------*/
//view lich su cua tat ca cac user trong cong ty

Route::get('historyofall', function () {
    return view('admin.historyofall');
});
Route::get('responsePtoOfAll', function () {
    return view('admin.responsePtoOfAll');
});

//xac nhan hoac tu choi tu phia user
Route::get('/acceptPtoOfAll/{menu}', 'Admin\AuthController@acceptrequest');
Route::get('/denyPtoOfAll/{menu}', 'Admin\AuthController@denyrequest');


/*---------------Admin Edit PTO khi user gui yeu cau len------------------------- */
Route::get('/editPtoOfAll/{menu}', 'Admin\AuthController@editrequest');
/*------------------------------Admin Delete PTO -------------------------------- */
Route::get('/deletePtoOfAll/{menu}', 'Admin\AuthController@deleterequest');





Route::get('join', function () {    
    $list = DB::table('pto_request')
    ->join('users', 'pto_request.id', '=', 'users.id')
    ->join('team', 'team.teamid', '=', 'users.teamid')
    ->select('pto_request.rqid', 
       'pto_request.id',
       'pto_request.dateofrequest',
       'pto_request.datestart',
       'pto_request.dateend',
       'pto_request.reason',
       'pto_request.approvalofmanager',
       'pto_request.reasonforrejected',
       'pto_request.approvalofadmin',
       'users.teamid',
       'users.email',
       'users.fullname',
       'users.dayleft',
       'team.teamname') 
    ->get();
    echo '<pre>';
    print_r($list);
    echo '</pre>';
});

Route::get('jointeam', function () {    
    $list2 = DB::table('pto_request')
    ->join('users', 'pto_request.id', '=', 'users.id')
    ->join('team', 'team.teamid', '=', 'users.teamid')
    ->where('team.teamid','=','T002')
    ->select('pto_request.rqid', 
       'users.email',
       'users.fullname',
       'users.dayleft',
       'team.teamname',
       'pto_request.dateofrequest',
       'pto_request.datestart',
       'pto_request.dateend',
       'pto_request.reason',
       'pto_request.approvalofmanager',
       'pto_request.reasonforrejected',
       'pto_request.approvalofadmin'
       ) 
    ->get();
    echo '<pre>';
    print_r($list2);
    echo '</pre>';
});


/*----------------------------Hanley---------------------------*/

Route::GET('newPTO',['as'=>'form','uses'=>'FormController@viewform']);
Route::POST('newPTO-send',['as'=>'abc','uses'=>'FormController@insert']);

Route::GET('newPTOManager',['as'=>'form1','uses'=>'Manager\FormControllerManager@viewform']);
Route::POST('newPTOManager-send',['as'=>'abc1','uses'=>'Manager\FormControllerManager@insert']);

/*
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/
Route::get('form', function () {
    return view('user.form');
});

//edit PTO Request

Route::post('/editrequest/{menu}', 'EditRequestController@update');
Route::post('/DeleteRequestUser/{menu}', 'EditRequestController@delete');
Route::post('/EditRequestManager/{menu}', 'Manager\EditRequestController@update');
Route::post('/DeleteRequestManager/{menu}', 'Manager\EditRequestController@delete');

//demotk
Route::get('demotk', function(){
  return view('admin.demotk');
});

