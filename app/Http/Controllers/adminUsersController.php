<?php

namespace App\Http\Controllers;

use App\Post;

use App\Role;
use App\User;
use App\Photo;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\createUserRequest;
use App\Http\Requests\updateUserRequest;

class adminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::pluck('name','id')->all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createUserRequest $request)
    {
        $input=$request->all();
        if($file=$request->file('photo_id'))
        {
            $name=$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::create(['file'=>$name]);
            $input['photo_id']=$photo->id;
           
          
        }
        $input['password']=bcrypt($request->password);
        User::create($input); 
        Session::flash('created_user', "user has been created");
        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrFail($id);
        $roles=Role::pluck('name','id')->all();
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateUserRequest $request, $id)
    {
      
        $user=User::findOrFail($id);
        $input=$request->all();
       
        if ($file=$request->file('photo_id')) {
            $name=$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::create(['file'=>$name]);
            $input['photo_id']=$photo->id;
        }
        
            $input['password']=bcrypt($request->password);
        
        
        $user->update($input);

        Session::flash('updated_user', "user has been updated");
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $user=User::findOrFail($id);// finding user
         $post=Post::where('user_id',$user->id)->get();//finding all posts of that user
        //  if("/home/rifayypf/cms.rifadahmed.com".$user->photo->file){
            if(public_path().$user->photo->file){
            // $userPhoto="/home/rifayypf/cms.rifadahmed.com".$user->photo->file;//finding user photo in directory
            $userPhoto=public_path().$user->photo->file;//finding user photo in directory

        }
         
        
         foreach($post as $x)
         {
            unlink(public_path().$x->photo->file); //remove every post photo from directory
            $x->photo->file; //finding post photo
            $x->photo->delete();//deleting post photo
            $x->delete();//deleting post
         }
         $user->delete(); //deleting user
         if($user->photo)
         {
            $user->photo->delete();//deleting user photo
            unlink($userPhoto);//deleting user photo from directory 
         }
        

          

        Session::flash('deleted_user', "user has been deleted");
        return redirect("/admin/users");

    }
}
