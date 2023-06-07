<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Mockery\Undefined;

class BorrowController extends Controller
{

    public function getBorrow()
    {
        $response = Http::get('http://localhost:3000/api/borrow');
        $data = $response->json();

        return response()->json($data, 200);
    }

    public function getBorrowById($id)
    {
        $response = Http::get('http://localhost:3000/api/borrow/' . $id);
        $data = $response->json();

        return response()->json($data, 200);
    }

    public function updateBorrow(Request $request, $id)
    {
        $response = Http::put('http://localhost:3000/api/borrow/' . $id, [
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'borrow_date' => $request->borrow_date,
            'return_date' => $request->return_date,
            'status' => $request->status,
            'penalty' => $request->penalty
        ]);

        $data = $response->json();

        return response()->json($data, 200);
    }

    public function deleteBorrow($id)
    {
        $response = Http::delete('http://localhost:3000/api/borrow/' . $id);
        $data = $response->json();

        return response()->json($data, 200);
    }

    public function addBorrow(Request $request)
    {
        $temp = $request->all();

        //masukan data user_id ke $response
        $user_id = (int) $temp['user_id'];
        $book_id = (int) $temp['book_id'];
        $response = Http::post('http://localhost:8080/api/borrows', [
            'user_id' => $user_id,
            'book_id' => $book_id,
            'borrow_date' => $request->borrow_date,
            'return_date' => $request->return_date,
            'status' => $request->status,
            'penalty' => $request->penalty
        ]);


        return redirect()->intended('dashboard')->with('success', 'Book has been borrowed');
    }

    public function returnBorrow(Request $request, $id)
    {
        $response = Http::put('http://localhost:8080/api/borrows/return/' . $id, [
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'borrow_date' => $request->borrow_date,
            'return_date' => $request->return_date,
            'status' => $request->status,
            'penalty' => $request->penalty
        ]);

        return redirect()->intended('dashboard')->with('success', 'Book has been returned');
    }
}
