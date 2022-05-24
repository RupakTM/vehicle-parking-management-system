<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\ParkingController;
use App\Http\Controllers\Backend\ParkingSlotController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\StaffController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\ModuleController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\PaymentController;



use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Auth;

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
Route::get('/welcome', function () {
    return view('welcome');
});



Auth::routes([
    'register' => false,
]);
Route::middleware(['web','auth'])->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::redirect('/', '/home');

        //Parking Slot Route
        Route::resource('parkingslot',ParkingSlotController::class);

        //Parking Route
        Route::get('parking/report', [ParkingController::class, 'report'])->name('parking.report');
        Route::get('parking/{car_no}/reportShow', [ParkingController::class, 'reportShow'])->name('parking.reportShow');
        Route::get('parking/showparkingreport', [ParkingController::class, 'showparkingreport'])->name('parking.showparkingreport');
        Route::get('parking/exit', [ParkingController::class, 'exit'])->name('parking.exit');
        Route::get('parking/create', [ParkingController::class, 'create'])->name('parking.create');
        Route::post('parking', [ParkingController::class, 'store'])->name('parking.store');
        Route::get('parking', [ParkingController::class, 'index'])->name('parking.index');
        Route::get('parking/{id}', [ParkingController::class, 'show'])->name('parking.show');
        Route::get('parking/{id}/edit', [ParkingController::class, 'edit'])->name('parking.edit');
        Route::put('parking/{id}', [ParkingController::class, 'update'])->name('parking.update');
        Route::post('parking/exitCar', [ParkingController::class, 'exitCar'])->name('parking.exitCar');
        Route::get('parking/invoice', [ParkingController::class, 'invoice'])->name('parking.invoice');


        //User Route
        Route::get('user/trash', [UserController::class, 'trash'])->name('user.trash');
        Route::post('user/{id}/restore', [UserController::class,'restore'])->name('user.restore');
        Route::delete('user/{id}/force-delete',[UserController::class,'forceDelete'])->name('user.forceDelete');
        Route::resource('user',UserController::class);

        //Setting Route
        Route::get('setting/edit', [SettingController::class, 'edit'])->name('setting.edit');
        Route::put('setting/{id}', [SettingController::class, 'update'])->name('setting.update');

        //Role Route
        Route::get('role/trash', [RoleController::class, 'trash'])->name('role.trash');
        Route::post('role/{id}/restore', [RoleController::class,'restore'])->name('role.restore');
        Route::delete('role/{id}/force-delete',[RoleController::class,'forceDelete'])->name('role.forceDelete');
        Route::resource('role',RoleController::class);

        //Staff Route
        Route::get('staff/trash', [StaffController::class, 'trash'])->name('staff.trash');
        Route::post('staff/{id}/restore', [StaffController::class,'restore'])->name('staff.restore');
        Route::delete('staff/{id}/force-delete',[StaffController::class,'forceDelete'])->name('staff.forceDelete');
        Route::resource('staff',StaffController::class);

        //Customer Route
        Route::resource('customer',CustomerController::class);

        //Payment Route
        Route::post('payment/search', [PaymentController::class, 'search'])->name('payment.search');
        Route::post('payment/reportlist', [PaymentController::class, 'reportlist'])->name('payment.reportlist');

        Route::resource('payment',PaymentController::class);

});



