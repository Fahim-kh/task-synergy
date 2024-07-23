<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServicesModel;
use App\Models\SubServicesModel;
use Str;
use Validator;
use File;

class SubServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sub_services  = SubServicesModel::latest()->with('services')->get();
        return view('admin.subservices.index',compact('sub_services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services  = ServicesModel::where('status',1)->get();
        return view('admin.subservices.create',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validators = Validator::make($request->all(),[
            'service_id' => 'required',
            'name' => 'required',
            'content' => 'required',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
            'side_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120'
        ]);
        if($validators->fails()){
            return redirect()->back()->withErrors($validators->errors());
        } else{
            $bannerImage = null;
            $sideImage = null;
            if(request()->hasFile('banner_image')){
                $file = request()->file('banner_image');
                $bannerImage =md5($file->getClientOriginalName()).time().".".$file->getClientOriginalExtension();
                $file->move(public_path().'/uploads/sub_service',$bannerImage);
            }
            if(request()->hasFile('side_image')){
                $file = request()->file('side_image');
                $sideImage =md5($file->getClientOriginalName()).time().".".$file->getClientOriginalExtension();
                $file->move(public_path().'/uploads/sub_service',$sideImage);
            }
            $content = $request->input('content');
            $content = str_replace('assets/img', asset('assets/img/'), $content);
            SubServicesModel::create([
                'service_id' => $request->service_id,
                'name' => $request->name,
                'slug' => Str::slug($request->name,'-'),
                'content' => $content,
                'banner_image' => $bannerImage,
                'side_image' => $sideImage,
            ]);
        }
        return redirect()->route('subservices.index')->with('success','Sub Service created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $services  = ServicesModel::where('status',1)->get();
        $subService =SubServicesModel::find($id);
        return view('admin.subservices.edit',compact('services','subService'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validators = Validator::make($request->all(),[
            'service_id' => 'required',
            'name' => 'required',
            'content' => 'required',
            'banner_image' => 'image|mimes:jpeg,png,jpg,webp|max:5120',
            'side_image' => 'image|mimes:jpeg,png,jpg,webp|max:5120'
        ]);
        if($validators->fails()){
            return redirect()->back()->withErrors($validators->errors());
        } else{
            $bannerImage = null;
            $sideImage = null;
            if(request()->hasFile('banner_image')){
                $file = request()->file('banner_image');
                $bannerImage =md5($file->getClientOriginalName()).time().".".$file->getClientOriginalExtension();
                $file->move(public_path().'/uploads/sub_service',$bannerImage);
            }
            if(request()->hasFile('side_image')){
                $file = request()->file('side_image');
                $sideImage =md5($file->getClientOriginalName()).time().".".$file->getClientOriginalExtension();
                $file->move(public_path().'/uploads/sub_service',$sideImage);
            }
            $subService =SubServicesModel::find($id);
            $currentBannerImage = $subService->banner_image;
            $currentSideImage = $subService->side_image;
            $content = $request->input('content');
            $content = str_replace('assets/img', asset('assets/img/'), $content);
            $subService->update([
                'service_id' => $request->service_id,
                'name' => $request->name,
                'slug' => Str::slug($request->name,'-'),
                'content' => $content,
                'banner_image' => ($bannerImage)? $bannerImage : $currentBannerImage,
                'side_image' => ($sideImage)? $sideImage : $currentSideImage,
            ]);
            if($bannerImage)
            File::delete(public_path().'/uploads/sub_service/'.$currentBannerImage);

            if($sideImage)
            File::delete(public_path().'/uploads/sub_service/'.$currentSideImage);
        }
        return redirect()->route('subservices.index')->with('success','Sub Service created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subService =SubServicesModel::find($id);
        $currentBannerImage = $subService->banner_image;
        $currentSideImage = $subService->side_image;
        File::delete(public_path().'/uploads/sub_service/'.$currentBannerImage);
        File::delete(public_path().'/uploads/sub_service/'.$currentSideImage);
        $subService->delete();
        return redirect()->route('subservices.index')->with('success','Sub Service deleted successfully!');
    }
    public function status($id){
        $subService =SubServicesModel::find($id);
        $newStatus=($subService->status==0)? 1 : 0 ;
            $subService->update([
                'status'=>$newStatus,
            ]);
        return redirect()->back();
    }
}
