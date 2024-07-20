<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LocationModel;
use App\Models\BranchModel;
use Validator;

class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = LocationModel::get();
        $branches = BranchModel::with('location')->paginate(20);
        return view('admin.branch.index',compact('locations','branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = LocationModel::get();
        return view('admin.branch.create',compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validators = Validator::make($request->all(),[
            'location' => 'required',
            'name' => 'required',
            'address' => 'required',
        ]);
        if($validators->fails()){
            return redirect()->back()->withErrors($validators->errors());
        } else{
            BranchModel::create([
                'name' => $request->name,
                'location_id' => $request->location,
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
                'phone_optional' => $request->phone_optional,
                'status' => $request->status
            ]);
        }
        return redirect()->route('branch.index')->with('success','Branch created successfully!');
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
        $locations = LocationModel::get();
        $branch = BranchModel::find($id);
        return view('admin.branch.edit',compact('locations','branch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validators = Validator::make($request->all(),[
            'location' => 'required',
            'name' => 'required',
            'address' => 'required',
        ]);
        if($validators->fails()){
            return redirect()->back()->withErrors($validators->errors());
        } else{
            $branch = BranchModel::find($id);
            $branch->update([
                'name' => $request->name,
                'location_id' => $request->location,
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
                'phone_optional' => $request->phone_optional,
                'status' => $request->status
            ]);
        }
        return redirect()->route('branch.index')->with('success','Branch updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $branch = BranchModel::find($id)->delete();
        return redirect()->route('branch.index')->with('success','Branch deleted successfully!');

    }
    public function branch_status(Request $request){
        $branch_status = BranchModel::find($request->id);
        $newStatus=($branch_status->status==0)? 1 : 0 ;
        $branch_status->update(['status' => $newStatus]);
        return response()->json(['success' => $newStatus]);
    }
}
