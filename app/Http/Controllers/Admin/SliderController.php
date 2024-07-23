<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders =Slider::get();
        return view('admin.slider.index')->with(compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print_r($request->get('slug')); die();
        $this->validate(request(),[
            'heading' =>'required',
            'paragraph'=> 'required',
            'slider_img'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);
      
         $fileName =null;
        if(request()->hasFile('slider_img'))
        {
            $file = request()->file('slider_img');
            $fileName =md5($file->getClientOriginalName()).time().".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/slider',$fileName);
        }
        Slider::create([
            'heading'=> $heading =$request->get('heading'),
            'paragraph'=> $request->get('paragraph'),
            'slider_img'=>$fileName,
            'slug'=> $request->get('slug'),
            'status'=> $request->get('status'),
        ]);
        return redirect()->route('slider.index')->with('message','Slider Inserted!');
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
        $slider =Slider::find($id);
        return view('admin.slider.edit')->with(compact('slider'));
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
         $slider =Slider::find($id);
         $currentImage =$slider->slider_img;
          $fileName =null;
        if(request()->hasFile('slider_img'))
        {
            $file = request()->file('slider_img');
            $fileName =md5($file->getClientOriginalName()).time().".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/slider',$fileName);
        }
         $slider->update([
            'heading'=> $heading =$request->get('heading'),
            'paragraph'=> $request->get('paragraph'),
            'slider_img'=>($fileName)? $fileName : $currentImage,
            'slug'=> $request->get('slug'),
            'status'=> $request->get('status'),
          ]);
         if($fileName)
            File::delete(public_path().'/uploads/slider/'.$currentImage);
         return redirect()->route('slider.index')->with('message','Record Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) 
        {
           $slider= Slider::find($id);
           $currentImage = $slider->slider_img;
           $slider->delete();
           File::delete(public_path().'/uploads/slider/'.$currentImage);
           return 'true';
       }
       return redirect()->back();

    }
    public function status(Request $request,$id)
    {
        $slider= Slider::find($id);
        $newStatus=($slider->status==0)? 1 : 0 ;
        $slider->update([
            'status'=>$newStatus,
        ]);
        return redirect()->back();
    }
}
