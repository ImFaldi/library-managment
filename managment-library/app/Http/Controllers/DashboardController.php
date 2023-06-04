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
        //tampilkan semua role resespsionis
        $resepsionis = User::where('role', 'resepsionis')->get();
        $admin = User::where('role', 'admin')->get();
        return view('dashboard.profile', compact('resepsionis', 'admin'));
    }

    public function table()
    {
        $member = User::where('role', 'member')->get();
        $book = Book::all();
        $borrow = Borrow::all();
        return view('dashboard.table', compact('member','book','borrow'));
    }
}
