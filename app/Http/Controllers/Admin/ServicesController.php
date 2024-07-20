<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServicesModel;
use File;
use Str;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services =ServicesModel::get();
        return view('admin.services.index')->with(compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('admin.services.create');
    }
    public function aditional($id)
    {
        $serviceID =ServicesModel::find($id);
        return view('admin.services.aditional_service')->with(compact('serviceID'));
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
            'services_image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        $fileName =null;
        if(request()->hasFile('services_image'))
        {
            $file = request()->file('services_image');
            $fileName =md5($file->getClientOriginalName()).time().".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/services',$fileName);
        }


     $services =   ServicesModel::create([
            'name'=>$request->get('name'),
            'slug'=> Str::slug($request->name,'-'),
            'featured'=>$request->get('featured'),
            'paragraph'=>$request->get('paragraph'),
            'excerpt'=>$request->get('excerpt'),
            'image'=>$fileName,
            'status'=> $request->get('status'),

        ]);

        return redirect()->route('services.index')->with('message','Service created successfully!');
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
        $service = ServicesModel::find($id);
        return view('admin.services.edit')->with(compact('service'));
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
            'services_image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);
        $services =ServicesModel::find($id);
        $currentImage =$services->image;
        $fileName =null;
        if(request()->hasFile('services_image'))
        {
            $file = request()->file('services_image');
            $fileName =md5($file->getClientOriginalName()).time().".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/services',$fileName);
        }
        $services->update([
            'name'=>$request->get('name'),
            'slug'=> Str::slug($request->name,'-'),
            'paragraph'=>$request->get('paragraph'),
            'excerpt'=>$request->get('excerpt'),
            'image'=>($fileName)? $fileName: $currentImage,
            'featured'=>$request->get('featured'),
            'status'=> $request->get('status'),
        ]);
        if($fileName)
            File::delete(public_path().'/uploads/services/'.$currentImage);

      return redirect()->route('services.index')->with('message','Record Updated Successfully');
    }
        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        
        $service= ServicesModel::find($id);
        $currentImage = $service->services_image;
        File::delete(public_path().'/uploads/services/'.$currentImage);
        $service->delete();
        return redirect()->back()->with('error','Record Deleted Successfully');
    }

    public function status(Request $request,$id)
    {
        
        $service= ServicesModel::find($id);
        $newStatus=($service->status==0)? 1 : 0 ;
        $service->update([
            'status'=>$newStatus,
        ]);
    
        return redirect()->back()->with('status','Status Changed');
    }
    
}
