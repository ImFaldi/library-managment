<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoryController extends Controller
{
    //

    public function getCategory()
    {
        $response = Http::get('http://localhost:8080/api/categories');
        $data = $response->json();

        return response()->json($data, 200);
    }

    public function getCategoryById($id)
    {
        $response = Http::get('http://localhost:8080/api/categories/' . $id);
        $data = $response->json();

        return response()->json($data, 200);
    }

    public function addCategory(Request $request)
    {
        $response = Http::post('http://localhost:8080/api/categories', [
            'title' => $request->title
        ]);
        $data = $response->json();

        return response()->json($data, 200);
    }

    public function updateCategory(Request $request, $id)
    {
        $response = Http::put('http://localhost:8080/api/categories/' . $id, [
            'title' => $request->title
        ]);
        $data = $response->json();

        return response()->json($data, 200);
    }

    public function deleteCategory($id)
    {
        $response = Http::delete('http://localhost:8080/api/categories/' . $id);
        $data = $response->json();

        return response()->json($data, 200);
    }
}
