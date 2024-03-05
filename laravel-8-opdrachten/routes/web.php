<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('hello', function() {
    echo "Hello World";
} );

Route::get( '/mooiekop', function() {
    $kop = 'Dit is een mooie kop';
    return view( 'jack' )->with( 'kop', $kop );
});

Route::get( '/{param}', function( string $param ) {
    echo "Hallo $param";
});


// Routes for todoes database
Route::get( '/create', function(){

});

Route::get( '/delete', function(){

});

Route::get( '/update', function(){

});