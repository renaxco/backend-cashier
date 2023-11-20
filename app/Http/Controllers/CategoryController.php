<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{

    public function index()
    {
        try {
            $data =  Category::get();
            return response()->json(['status'=>true, 'message'=>'success','data'=> $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'gagal menampilkan data']);
        }
    }

   
    public function store(CategoryRequest $request)
    {
        // return $request->all();
        try {
            $data = Category::create($request->all());
            return response()->json(['status'=>true, 'message'=>'input success','data'=> $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'gagal input data']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        try {
           
            return response()->json(['status'=>true, 'data'=>$category]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'data failed to get','error_type'=> $e]);
        }
    }

    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $category->update($request->all());
            return response()->json(['status'=>true, 'message'=>'data has been updated']);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'data failed to update','error_type'=> $e]);
        }
    }

    public function destroy(Category $category)
    {
        try {
            $data = $category->delete();
            return response()->json(['status'=>true, 'message'=>'data has been deleted','data'=> $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'data failed to delete']);
        }
    }
}
