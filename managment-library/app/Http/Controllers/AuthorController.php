<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthorController extends Controller
{
    //

    public function getAuthor()
    {
        $response = Http::get('http://localhost:8080/api/authors');
        $data = $response->json();

        return response()->json($data, 200);
    }

    public function getAuthorById($id)
    {
        $response = Http::get('http://localhost:8080/api/authors/' . $id);
        $data = $response->json();

        return response()->json($data, 200);
    }

    public function addAuthor(Request $request)
    {
        $response = Http::post('http://localhost:8080/api/authors', [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);
        $data = $response->json();

        return response()->json($data, 200);
    }

    public function updateAuthor(Request $request, $id)
    {
        $response = Http::put('http://localhost:8080/api/authors/' . $id, [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);
        $data = $response->json();

        return response()->json($data, 200);
    }

    public function deleteAuthor($id)
    {
        $response = Http::delete('http://localhost:8080/api/authors/' . $id);
        $data = $response->json();

        return response()->json($data, 200);
    }
}
