<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LocationModel;
use Validator;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = LocationModel::paginate(20);
        return view('admin.locations.index',compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.locations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validators = Validator::make($request->all(),[
            'name' => 'required'
        ]);
        if($validators->fails()){
            return redirect()->back()->withErrors($validators->errors());
        } else{
            LocationModel::create([
                'name' => $request->name,
                'status' => $request->status
            ]);
        }
        return redirect()->route('location.index')->with('success','Location created successfully!');
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
        $location = LocationModel::find($id);
        return view('admin.locations.edit',compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validators = Validator::make($request->all(),[
            'name' => 'required|string'
        ]);
        if($validators->fails()){
            return redirect()->back()->withErrors($validators->errors());
        } else{
            $location = LocationModel::find($id);
            $location->update([
                'name' => $request->name,
                'status' => $request->status
            ]);
        }
        return redirect()->route('location.index')->with('success','Location updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function location_delete(Request $request)
    {
        $location = LocationModel::find($request->id);
        $location->delete();
        return response()->json(['success'=> 'location deleted successfully ']);
    }
    public function location_status(Request $request){
        $location = LocationModel::find($request->id);
        $newStatus=($location->status==0)? 1 : 0 ;
        $location->update(['status' => $newStatus]);
        return response()->json(['success' => $newStatus]);
    }
}
