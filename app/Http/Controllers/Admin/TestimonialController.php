<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TestimonialModel;
use File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $testimonials= TestimonialModel::latest()->get();
     return view('admin/testimonial/index')->with(compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/testimonial/create');
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
            'designation' =>'required',
            'message' =>'required',
            'testimonial_image' =>'image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);
        $fileName =null;
        if($request->hasFile('testimonial_image'))
        {
            $file =$request->file('testimonial_image');
            $fileName =md5($file->getClientOriginalName()).time().'.'.$file->getClientOriginalExtension();
          // print_r($fileName); die();
            $file->move(public_path().'/uploads/testimonial/',$fileName);
        }
        TestimonialModel::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'message'=> $request->message,
            'testimonial_image' =>$fileName,
            'status' => $request->status,
        ]);
        return redirect()->route('testimonial.index')->with('message','Testimonial added successfully');
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
        $testimonial =TestimonialModel::find($id);
         return view('admin/testimonial/edit')->with(compact('testimonial'));
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
            'designation' =>'required',
            'message' =>'required',
            'testimonial_image' =>'image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);
        $fileName =null;
        if($request->hasFile('testimonial_image'))
        {
            $file =$request->file('testimonial_image');
            $fileName =md5($file->getClientOriginalName()).time().'.'.$file->getClientOriginalExtension();
          // print_r($fileName); die();
            $file->move(public_path().'/uploads/testimonial/',$fileName);
        }
        $testimonial =TestimonialModel::find($id);
        $currentImage =$testimonial->testimonial_image;
        $testimonial->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'message'=> $request->message,
            'testimonial_image' =>($fileName)? $fileName: $currentImage,
            'status' => $request->status,
        ]);
        if($fileName)
            File::delete(public_path().'/uploads/testimonial/'.$currentImage);

        return redirect()->route('testimonial.index')->with('message','Testimonial Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        
        $testimonial= TestimonialModel::find($id);
        $testimonial->delete();
        return redirect()->back();
    }
    public function status(Request $request, $id)
    {
        $testimonial= TestimonialModel::find($id);
        $newStatus=($testimonial->status==0)? 1 : 0 ;
        $testimonial->update([
            'status'=>$newStatus,
        ]);
        return redirect()->back();
    }
}
