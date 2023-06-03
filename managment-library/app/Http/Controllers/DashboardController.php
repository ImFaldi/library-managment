<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Book;
use App\Models\Borrow;


class DashboardController extends Controller
{
    //

    public function home()
    {
        $total_user = User::count();
        $total_book = Book::count();
        $total_borrow = Borrow::count();

        //role based authentication
        if(auth()->user()->role == 'admin'){
            return view('dashboard.admin', compact('total_user', 'total_book', 'total_borrow'));
        }
        if(auth()->user()->role == 'resepsionis'){
            return view('dashboard.resepsionis', compact('total_book', 'total_borrow'));
        }
    }

    public function profile()
    {
        return view('dashboard.profile');
    }

    public function table()
    {
        return view('dashboard.table');
    }
}
