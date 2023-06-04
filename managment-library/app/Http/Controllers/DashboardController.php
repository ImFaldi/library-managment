<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Book;
use App\Models\Borrow;
use Faker\Provider\ar_EG\Person;

class DashboardController extends Controller
{
    //

    public function home()
    {
        $borrow = Borrow::all();
        $book = Book::all();
        $user = User::all();
        $total_user = User::count();
        $total_book = Book::count();
        $total_borrow = Borrow::count();

        $date_now = date('Y-m-d');
        $date_yesterday = date('Y-m-d', strtotime('-1 day', strtotime($date_now)));

        foreach($borrow as $b){
            if($b->return_date < $date_now && $b->status == 'borrowed'){
                //hitung selisih hari
                $selisih = strtotime($date_now) - strtotime($b->return_date);

                //hitung denda jika telas sehari adalah 10
                $denda = floor($selisih / (60 * 60 * 24)) * 10000;

                //update denda dan di kasih misal 1000 menjadi 1.000
                $b->penalty = number_format($denda, 0, ',', '.');
            }
        }

        //role based authentication
        if(auth()->user()->role == 'admin'){
            return view('dashboard.admin', compact('total_user', 'total_book', 'total_borrow'));
        }
        if(auth()->user()->role == 'resepsionis'){
            return view('dashboard.resepsionis', compact('total_book', 'total_borrow', 'borrow', 'book', 'date_now', 'date_yesterday'));
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
