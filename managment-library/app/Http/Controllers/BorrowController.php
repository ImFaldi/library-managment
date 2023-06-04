<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BorrowController extends Controller
{

    public function getBorrow()
    {
        $response = Http::get('http://localhost:8080/api/borrows');
        $data = $response->json();

        return response()->json($data, 200);
    }

    public function getBorrowById($id)
    {
        $response = Http::get('http://localhost:8080/api/borrows/' . $id);
        $data = $response->json();

        return response()->json($data, 200);
    }

    public function updateBorrow(Request $request, $id)
    {
        $response = Http::put('http://localhost:8080/api/borrows/' . $id, [
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
        $response = Http::delete('http://localhost:8080/api/borrows/' . $id);
        $data = $response->json();

        return response()->json($data, 200);
    }

    public function addBorrow(Request $request)
    {
        $response = Http::post('http://localhost:8080/api/borrows', [
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

        $data = $response->json();

        return redirect()->intended('dashboard')->with('success', 'Book has been returned');
    }
}
