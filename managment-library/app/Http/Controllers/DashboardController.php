<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class DashboardController extends Controller
{
    //

    public function home()
    {
        //role based authentication
        if(auth()->user()->role == 'admin'){
            return view('dashboard.home');
        }
        if(auth()->user()->role == 'user'){
            return view('dashboard.user');
        }
    }
}
