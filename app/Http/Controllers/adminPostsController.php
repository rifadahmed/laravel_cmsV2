<?php

namespace App\Http\Controllers;

use App\Post;

use App\Photo;
use App\Category;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\createPostRequest;
use App\Http\Requests\updatePostRequest;

class adminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::paginate(3);
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::pluck('name','id')->all();
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createPostRequest $request)
    {
        $user=Auth::user();
        $input=$request->all();
        if($file=$request->file('photo_id'))
        {
            $name=$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::create(['file'=>$name]);
            $input['photo_id']=$photo->id;
            
        }
        $user->posts()->create($input);
         return redirect('admin/posts');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::findOrFail($id);
        $categories=Category::pluck('name','id')->all();
        return view('admin.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updatePostRequest $request, $id)
    
    {          
         $user=Auth::user();
        $input=$request->all();
        if($file=$request->file('photo_id'))
        {
            $name=$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::create(['file'=>$name]);
            $input['photo_id']=$photo->id;
            
        }
        $post=Post::findOrFail($id);
        $post->slug = null;
        $post->update($input);
       return redirect("admin/posts");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $post=Post::findOrFail($id);
        //  $photo="/home/rifayypf/cms.rifadahmed.com".$post->photo->file;
        if($post->photo){
            $photo=public_path().$post->photo->file;
            $post->photo->delete();
            
            unlink($photo); 
            
        }
        $post->delete();
        return redirect("admin/posts");
        
     
    }
    public function post($slug)
    {
        $post=Post::where('slug',$slug)->get();

        return view('post',compact('post'));
    }
}
