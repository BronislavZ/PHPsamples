<?php




Route::get('/about','FirstController@show');
Route::get('/about/{id}',['uses'=>'FirstController@showid', 'as'=>'home']);






// Route::post('/page1', function(){
// 	print_r($_POST);
// });

// Route::get('/page/{cat}/{id}' ,function( $var1 , $var2){
// 	echo $var1 . $var2;
// })->where(['id'=>'[0-9]+','cat'=>'[A-Za-z]+']);//->where('id','[0-9]+')    

// Route::group(['prefix'=>'admin'],function(){

// 	Route::get('/page/create',function(){
// 		echo 'page/create';
// 	});

// 		Route::get('/page/die',function(){
// 		echo 'page/die';
// 	});
// });




// Route::get('/', ['as' => 'home', function () {
//     return view('welcome');
// }]);

// Route::get('/home',  function () {
//     echo route('home');
// });

// Route::get('/homeredir',  function () {
//     return redirect()-> route('home');
// });







// Route::get('/{cat}/{id}', ['as' => 'home', function ($var1,$var2) {
//     	echo $var1.$var2;
// }]);


// Route::get('/homeredir',  function () {
//     return redirect()-> route('home', array('id'=>10, 'cat'=>'all'));
// });





// Route::group(['prefix'=>'admin/{id}'],function($id){

// 	Route::get('/page/create',function(){
// 		echo 'page/create';
// 	});

// 		Route::get('/page/create2',function(){
// 		echo 'page/create2';
// 	});
// });

// Route::get('/page/create/{id}',function($var){
// 	$route = Route::current();
// 	 echo $route->getName();
// 	print_r( $route->parameters());
// })->name('createpage');








