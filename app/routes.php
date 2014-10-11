<?php
Route::get('/', array(
		'as' => 'home',
		'uses' => 'HomeController@home'

));
/*auth grup*/
Route::group(array('before'=>'auth'), function(){
	/*LOGOUT GET*/
	Route::get('/account/logout',array(
		'as' => 'account-logout',
		'uses' => 'AccountController@getLogout'
		));
	/*table*/
	Route::get('/pages/tabel', array(
		 'as' => 'tabel',
		'uses' => 'TabelController@getTabel'
		));
	
	

});




/*unauth grup*/
Route::group(array('before'=> 'guest'),function(){
		
		/*crsf grup*/	
		Route::group(array('before'=> 'csrf'),function(){
			/*create akun POST*/
		Route::post('/account/create',array(
				'as' => 'account-create-post',
				'uses' => 'AccountController@postCreate'
			));

		});

		/*LOGIN POST*/  
		Route::post('account/login', array(
			'as' => 'account-login-post',
			'uses' => 'AccountController@postLogin'
			));
		/*LOGIN GET*/  
		Route::get('account/login', array(
			'as' => 'account-login',
			'uses' => 'AccountController@getLogin'
			));
		/*create akun*/
		Route::get('/account/create',array(
				'as' => 'account-create',
				'uses' => 'AccountController@getCreate'
			));
		Route::get('/account/activate/{code}',array(
			'as' => 'account-activate',
			'uses' => 'AccountController@getActivate'
			));

});
