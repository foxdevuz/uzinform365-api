<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryNewsRequest;
use App\Http\Resources\NewsResource;
use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CategoryController extends ResponseMessagesController
{
    public function addCategory(Request $request){
        $validate = Validator::make($request->all(), [
            'token'=>['required'],
            'name'=>['required']
        ]);

        if($validate->fails()){
            return response()->json([
                'status'=>false,
                'message'=>$validate->errors()
            ], Response::HTTP_BAD_REQUEST);
        }

        $token = request('token');
        $name = request('name');
        #make slug
        $slug = $this->generateSlug($name);
        #make sure that token is valid
        $check = User::where('token', $token)->first();
        if(!$check){
            return response()->json([
                'status'=>'false',
                'message'=>'Invalid token'
            ], Response::HTTP_FORBIDDEN);
        }


        try{
            Category::create([
                'name'=>$name,
                'slug'=>$slug,
            ]);

            return response()->json([
                'status'=>'true',
                'message'=>'Category added successfully'
            ], Response::HTTP_OK);
        }catch(\Exception $e){
            return response()->json([
                'status'=>false,
                'message'=>self::ERROR_MESSAGE,
                'errors'=>$e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
    public function getAllCategories(){
        try{
            $categories = Category::all();
            return response()->json([
              'status'=>'true',
                'categories'=>$categories
            ], Response::HTTP_OK);
        }catch(\Exception $e){
            return response()->json([
              'status'=>false,
              'message'=>self::ERROR_MESSAGE,
                'errors'=>$e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
    public function getCategoryNews(CategoryNewsRequest $validator){
        $categorySlug = $validator->input('category');
        $news = News::where('category_slug', $categorySlug)->get();
        return NewsResource::collection($news);
    }
}
