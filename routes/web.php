<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\PassengerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routess
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::middleware(['auth'])->group(function () {

    Route::controller(PassengerController::class)->group(function () {

        Route::any('SaveTravelData', 'SaveTravelData')->name('SaveTravelData');

        Route::any('PIR_Step_Three', 'PIR_Step_Three')->name('PIR_Step_Three');

        Route::any('PIR_Step_Two', 'PIR_Step_Two')->name('PIR_Step_Two');

        Route::any('PaasengerGoToStepTwo', 'PaasengerGoToStepTwo')->name('PaasengerGoToStepTwo');

        Route::any('SavePassengerData', 'SavePassengerData')->name('SavePassengerData');

        Route::any('PassengerRegistrationWizard', 'PassengerRegistrationWizard')->name('PassengerRegistrationWizard');

        Route::any('/', 'PassengerRegistrationWizard')
            ->name('PassengerRegistrationWizard');

        Route::any('/dashboard', 'PassengerRegistrationWizard')
            ->name('PassengerRegistrationWizard');

    });
    Route::controller(CrudController::class)->group(function () {
        Route::get('DeleteData/{id}/{TableName}', 'DeleteData')->name(
            'DeleteData'
        );
        Route::post('MassUpdate', 'MassUpdate')->name('MassUpdate');

        Route::post('MassInsert', 'MassInsert')->name('MassInsert');
    });
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';