<?php

namespace App\Http\Controllers;

use App\Photo;

use App\Http\Requests;
use Illuminate\Http\Request;

class adminMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos=Photo::all();
        return view('admin.media.index',compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file=$request->file('file');
        $name=$file->getClientOriginalName();
        $file->move('images',$name);
        Photo::create(['file'=>$name]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo=Photo::findOrFail($id);
        
        unlink(public_path().$photo->file);
        $photo->delete();
        return redirect('admin/media');
    }
     public function bulkDelete(Request $request)
    {
   
           if(count($request->checkBoxArray)>0)
        {
            for($i =0;$i< count($request->checkBoxArray);$i++)
            {
                $photo=Photo::findOrFail($request->checkBoxArray[$i]);
                unlink(public_path().$photo->file);
                $photo->delete();
            }
            return redirect()->back();
         
        }
          else  
        {
            $photo=Photo::findOrFail($request->single_delete);
            unlink(public_path().$photo->file);
            $photo->delete();
            return redirect()->back();
        }
        

        
       

    

    }
}
