<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis' => 'required',
            'keterangan' => 'required|unique:category',
        ]);


        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $data = [
            'jenis' => $request->jenis,
            'keterangan' => $request->keterangan,
        ];

        $input = $data;
        $category = Category::create($input);

        return response()->json([
            'message ' => 'Sukses',
            'data' => $category,
        ], 200);
    }

    public function read()
    {
        $categories = Category::all();
        if ($categories) {
            return response()->json($categories, 200);
        } else {
            return response()->json([
                'message' => '404 Not Found'
            ], 404);
        }
    }

    public function get(Category $category)
    {
        if ($category) {
            return response()->json([$category], 200);
        } else {
            return response()->json([
                'message' => '404 Not Found'
            ], 404);
        }
    }

    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'jenis' => 'required',
            'keterangan' => 'required|unique:category',
        ]);


        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $category->update($request->all());

        return response()->json($category, 201);
    }

    public function delete(Category $category)
    {
        $data = $category;
        $category->delete();

        return response()->json([
            'Data ' . $data->jenis . ' : ' . $data->keterangan . ', berhasil dihapus!'
        ], 200);
    }
}