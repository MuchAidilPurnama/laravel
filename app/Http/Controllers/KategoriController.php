<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//import Model "Post"
use App\Models\Kategori;

//import Resource "PostResource"
use App\Http\Resources\KategoriResource;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

//import Facade "Validator"
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
   
    public function index()
    {
        //get all posts
        $kategori = Kategori::latest()->paginate(5);

        //return collection of posts as a resource
        return new KategoriResource(true, 'List Data Kategori', $kategori);
    }

   
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        //create post
        $kategori = Kategori::create([
            'title'     => $request->name,
        ]);

        //return response
        return new KategoriResource(true, 'Data Post Berhasil Ditambahkan!', $kategori);
    }

    
    public function show($id)
    {
        //find post by ID
        $kategori = kategori::find($id);

        //return single post as a resource
        return new KategoriResource(true, 'Detail Data Kategori!', $kategori);
    }

    
    public function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'name'     => 'required',

        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //find post by ID
        $kategori = Post::find($id);

        //check if image is not empty
        if ($request->hasFile('image')) {

            //upload image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            //delete old image
            Storage::delete('public/posts/'.basename($post->image));

            //update post with new image
            $post->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content,
            ]);

        } else {

            //update post without image
            $post->update([
                'title'     => $request->title,
                'content'   => $request->content,
            ]);
        }

        //return response
        return new PostResource(true, 'Data Post Berhasil Diubah!', $post);
    }

    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id)
    {

        //find post by ID
        $post = Post::find($id);

        //delete image
        Storage::delete('public/posts/'.basename($post->image));

        //delete post
        $post->delete();

        //return response
        return new PostResource(true, 'Data Post Berhasil Dihapus!', null);
    }
}