<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'v1','namespace'=>'App\Http\Controllers\Api'],function(){
    Route::post('register', 'AuthController@register');
    Route::post('confirm/account', 'AuthController@confirmAccount');
    Route::post('reset/password/mail', 'AuthController@resetPasswordMail');
    Route::post('reset/password', 'AuthController@resetPassword');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('login', 'AuthController@authenticate')  ;
    Route::post('login/anonymous', 'AuthController@AnonimusAuthenticate')  ;
    Route::get('unauthenticated', function (){
        return response()->json(['error' => 'No autorizado'],403);
    })->name('unauthenticated');
 });


 Route::group(['prefix'=>'v1','middleware'=>['auth:api'],'namespace'=>'App\Http\Controllers\Api'],function(){
    
    Route::resource('admin/roles','AdminRolesAndPermissionsController');
    Route::post('admin/sync/rol/permissions','AdminRolesAndPermissionsController@syncRolPermissions');
    Route::get('admin/role','AdminRolesAndPermissionsController@adminRoles');
    Route::post('admin/role','AdminRolesAndPermissionsController@storeRole');
    Route::put('admin/role/{id}','AdminRolesAndPermissionsController@updateRole');
    Route::delete('admin/role/{id}','AdminRolesAndPermissionsController@deleteRole'); 
    Route::get('admin/permission','AdminRolesAndPermissionsController@adminPermissions');
    Route::post('admin/permission','AdminRolesAndPermissionsController@storePermission');
    Route::put('admin/permission/{id}','AdminRolesAndPermissionsController@updatePermission');
    Route::delete('admin/permission/{id}','AdminRolesAndPermissionsController@deletePermission');



 Route::resource('juegos','JuegosController');
 Route::resource('categorias','CategoriasController');
 Route::resource('boletos','BoletosController');
 Route::resource('torneos','TorneosController');
 //Route::resource('usuarios','TorneosController');
 Route::get('torneos/contar/usuarios/{tipo_usuario}/{torneo_id}', 'TorneosController@contarUsuarios');
});