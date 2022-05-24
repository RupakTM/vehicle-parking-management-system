<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Parking;
use App\Models\ParkingSlot;
use App\Models\Role;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['setting'] = Setting::first();

        $data['available_parking'] = ParkingSlot::where('status','=', 0)->count();
        $data['total_parkingslots'] = ParkingSlot::count();
        $data['total_parkings'] = Parking::count();
        $data['total_users'] = User::count();
        $data['total_roles'] = Role::count();
        return view('home',compact('data'));
    }
}
