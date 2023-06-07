<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookController extends Controller
{
    //

    public function getBook()
    {
        $response = Http::get('http://localhost:3000/api/book');
        $data = $response->json();

        return response()->json($data, 200);
    }

    public function getBookById($id)
    {
        $response = Http::get('http://localhost:3000/api/book/' . $id);
        $data = $response->json();

        return response()->json($data, 200);
    }

    public function addBook(Request $request)
    {
        $temp = $request->all();

        $author_id = (int) $temp['author_id'];
        $category_id = (int) $temp['category_id'];
        $stock = (int) $temp['stock'];
        $response = Http::post('http://localhost:3000/api/book', [
            'title' => $request->title,
            'author_id' => $author_id,
            'category_id' => $category_id,
            'status' => $request->status,
            'stock' => $stock,
            'year' => $request->year
        ]);
        $data = $response->json();

        return response()->json($data, 200);
    }

    public function updateBook(Request $request, $id)
    {
        $response = Http::put('http://localhost:3000/api/book/' . $id, [
            'title' => $request->title,
            'author_id' => $request->author_id,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'stock' => $request->stock,
            'year' => $request->year
        ]);
        $data = $response->json();

        return response()->json($data, 200);
    }

    public function deleteBook($id)
    {
        $response = Http::delete('http://localhost:3000/api/book/' . $id);
        $data = $response->json();

        return response()->json($data, 200);
    }


}
