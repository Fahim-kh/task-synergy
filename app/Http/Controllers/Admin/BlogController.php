<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogModel;
use File;
use Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs =BlogModel::latest()->get();
        return view('admin.blogs.index')->with(compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $this->validate(request(),[
            'name' =>'required',
            'body' =>'required',
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);
          $fileName =null;
        if(request()->hasFile('image'))
        {
            $file = request()->file('image');
            $fileName =md5($file->getClientOriginalName()).time().".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/blog',$fileName);
        }
        BlogModel::create([
            'name'=>$request->get('name'),
            'slug' => Str::slug($request->name,'-'),
            'image'=> $fileName,
            'body' =>$request->get('body'),
            'status'=> $request->get('status'),
        ]);
        return redirect()->route('blog.index')->with('success','Blog Created');
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
        $blog= BlogModel::find($id);
        return view('admin.blogs.edit')->with(compact('blog'));
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
         $this->validate(request(),[
            'name' =>'required',
            'body' =>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);
        $blog= BlogModel::find($id);
        $currentImage =$blog->image;
          $fileName =null;
        if(request()->hasFile('image'))
        {
            $file = request()->file('image');
            $fileName =md5($file->getClientOriginalName()).time().".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/blog',$fileName);
        }

         $blog->update([
            'name'=>$request->get('name'),
            'slug' => Str::slug($request->name,'-'),
            'image'=>($fileName)? $fileName: $currentImage,
            'title'=>$request->get('title'),
            'body' =>$request->get('body'),
            'status'=> $request->get('status'),
        ]);
        if($fileName)
            File::delete(public_path().'/uploads/blog/'.$currentImage);

        return redirect()->route('blog.index')->with('success','Blog Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        $blog= BlogModel::find($id);
        $currentImage = $blog->image;
        $blog->delete();
        File::delete(public_path().'/uploads/blog/'.$currentImage);
       return redirect()->back();
    }
}
