<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookController extends Controller
{
    //

    public function getBook()
    {
        $response = Http::get('http://localhost:8080/api/books');
        $data = $response->json();

        return response()->json($data, 200);
    }
}
