<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NewsController extends ResponseMessagesController
{
    public function addNews(Request $req){
        $validator = Validator::make($req->all(), [
            'token'=>['required'],
            'title' => ['required'],
            'category'=>['required'],
            'description' => ['required'],
            'image' => ['required', 'file'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], Response::HTTP_BAD_REQUEST);
        }


        $token = $req->input('token');
        $image = $req->file('image');
        $title = $req->input('title');
        $category = $req->input('category');
        $slug = $this->generateSlug($title);
        $description = $req->input('description');
        #check admin token
        $check = User::where('token', $token)->first();
        if(!$check){
            return response()->json([
              'status' => false,
              'message' => 'Invalid token'
            ], Response::HTTP_FORBIDDEN);
        }

        // Store the image in a more specific path
        $image->store('public/images');

        try {
            News::create([
                'title' => $title,
                'category_slug' => $category,
                'description' => $description,
                'image' => $image->hashName(),
                'slug' => $slug,
            ]);

            return response()->json([
                'status' => true,
                'message' => self::NEWS_SUCCESS,
            ], Response::HTTP_OK);
        } catch (\Exception $e) {

            Log::error($e);

            return response()->json([
                'status' => false,
                'message' => self::ERROR_MESSAGE,
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateNews(request $req){
        $validate = Validator::make($req->all(),[
            'token' => ['required'],
            'id' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'category' => ['required'],
            'image' => ['required', 'image'],
        ]);

        if ($validate->fails()) {
            return response()->json([
               'status' => false,
                'errors' => $validate->errors(),
            ], Response::HTTP_BAD_REQUEST);
        }

        $token = $req->input('token');
        $image = $req->file('image');
        $title = $req->input('title');
        $category = $req->input('category');
        $slug = $this->generateSlug($title);
        $description = $req->input('description');
        $id = $req->input('id');

        #check admin token
        $check = User::where('token', $token)->first();
        if(!$check){
            return response()->json([
              'status' => false,
              'message' => 'Invalid token'
            ], Response::HTTP_FORBIDDEN);
        }
        # check if news is exists
        $news = News::find($id);
        if(!$news){
            return response()->json([
              'status' => false,
              'message' => self::NEWS_NOT_FOUND
            ], Response::HTTP_NOT_FOUND);
        }

        # delete old image and download new image
        try{
            Storage::delete('public/images' . $news->image);
            $image->store('public/images');

            $news->update([
                'title' => $title,
                'description' => $description,
                'category' => $category,
                'slug' => $slug,
                'image'=>$image->hashName()
            ]);

            return response()->json([
                'status' => 'success',
                'data' => $news,
                'message' => self::NEWS_SUCCESS_UPD,
            ]);
        }catch(Exception $e){
            return response()->json([
                'status'=>false,
                'message'=>self::ERROR_MESSAGE,
                'error'=>$e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function deleteNews(request $req){
        $validate = Validator::make($req->all(),[
            'token' => ['required'],
            'id' => ['required'],
        ]);

        if ($validate->fails()) {
            return response()->json([
              'status' => false,
                'errors' => $validate->errors(),
            ], Response::HTTP_BAD_REQUEST);
        }

        $token = $req->input('token');
        $id = $req->input('id');

        #check admin token
        $check = User::where('token', $token)->first();
        if(!$check){
            return response()->json([
             'status' => false,
             'message' => 'Invalid token'
            ], Response::HTTP_FORBIDDEN);
        }
        # check if news is exists
        $news = News::find($id);
        if(!$news){
            return response()->json([
                'status' => false,
                'message' => self::NEWS_NOT_FOUND
            ], Response::HTTP_NOT_FOUND);
        }

        try{
            Storage::delete('public/images'. $news->image);
            $news->delete();

            return response()->json([
               'status' => true,
               'message' => self::NEWS_SUCCESS_DEL,
            ]);
        }catch (Exception $e){
            return response()->json([
              'status' => false,
              'message' => self::ERROR_MESSAGE,
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getNews(){
        $get = News::all();
        return response()->json([
            'news' => $get,
        ], Response::HTTP_OK);
    }

    public function getOneNews(News $news){
        if(!$news){
            return response()->json([
              'status' => false,
              'message' => self::NEWS_NOT_FOUND
            ], Response::HTTP_NOT_FOUND);
        }
        return response()->json([
            'status'=> true,
            'response' => $news,
        ], Response::HTTP_OK);
    }
}
