<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;
use Validator;

class ModuleController extends Controller
{
    public function index(){
        $modules = Module::latest()->get();
        return view('admin.module.index',compact('modules'));
    }
    public function store(Request $request){
        $validators =Validator::make($request->all(),[
            'name' => 'required',
            'route' => 'required',
            'icon' => 'required',
        ]);
        if($validators->fails()){
            return response()->json([
                'errors' => $validators->errors()
            ], 422);
        } else{
            Module::create([
                'name' => $request->name,
                'route' => $request->route,
                'icon' => $request->icon,
                'parent_id' => ($request->parent_id != null)? $request->parent_id : 0,
                'sorting' => $request->sort,
            ]);
            return response()->json(['success' => 'Module added successfully!']);
        }
    }
}
