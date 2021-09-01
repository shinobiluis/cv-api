<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    AuthController,
    ProfileController,
    AdditionalInformationController,
    DescriptionController
};
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Crear cuenta
Route::post('/register', [ AuthController::class, 'register' ] );
// login
Route::post('/login', [ AuthController::class, 'login' ] )->name('login');

Route::group(['middleware' => 'auth:sanctum'], function (){
	Route::get('/info', [ AuthController::class, 'infoUser' ] );
	Route::get('/logout', [ AuthController::class, 'logout' ] );

	// Perfil de usaurio
    Route::post('profile/insert', [ ProfileController::class, 'insertProfile' ]);
    Route::put( 'profile/update', [ ProfileController::class, 'updateProfile' ] );
    Route::get('profile', [ ProfileController::class, 'consultProfile' ]);
    Route::post('profile/image', [ ProfileController::class,  'uploadImage' ]);
    Route::get('consult/avatar', [ ProfileController::class, 'consultAvatar' ]);

    // informacion adicional
    Route::post('additional-information/insert', [ AdditionalInformationController::class, 'insertAdditionalInformation' ]);
    Route::get('additional-information', [ AdditionalInformationController::class, 'consultAdditionalInformation' ]);
    Route::post('additional-information/update', [ AdditionalInformationController::class, 'updateAdditionalInformation' ]);

    // Descripcion
    Route::post('description/insert', [ DescriptionController::class, 'insertDescription' ]);
    Route::put('description/update', [ DescriptionController::class, 'updateDescription' ]);
    Route::get('description', [ DescriptionController::class, 'consultDescription' ]);

});


