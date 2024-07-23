<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamModel;
use File;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team_members = TeamModel::latest()->get();
        return view('admin.team.index')->with(compact('team_members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.team.create');
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
            'name'=> 'required',
            'designation'=> 'required',
            'team_img'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:5120'
                
        ]);  
         $fileName =null;
        if(request()->hasFile('team_img'))
        {
            $file = request()->file('team_img');
            $fileName =md5($file->getClientOriginalName()).time().".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/team/',$fileName);
        }
        TeamModel::create([
            'name' =>$request->get('name'),
            'designation' =>$request->get('designation'),
            'status' =>$request->get('status'),
            'team_img'=>$fileName,
            'bio' => $request->get('wysiwyg-editor'),
        ]);
        return redirect()->route('team.index')->with('message', 'Record add Successfully');;
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
         $team =TeamModel::find($id);
        return view('admin/team/edit')->with(compact('team'));
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
        $team =TeamModel::find($id);
         $currentImage=$team->team_img;
        $fileName =null;
        if(request()->hasFile('team_img'))
        {
            $file = request()->file('team_img');
            $fileName =md5($file->getClientOriginalName()).time().".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/team/',$fileName);
        }
        $team->update([
            'name' =>$request->get('name'),
            'designation' =>$request->get('designation'),
            'status' => $request->get('status'),
            'team_img'=>($fileName)? $fileName: $currentImage,
             'bio' => $request->get('wysiwyg-editor'),
        ]);
        if($fileName)
            File::delete(public_path().'/uploads/team/'.$currentImage);

        return redirect()->route('team.index')->with('message', 'Record Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        
        $team= TeamModel::find($id);
        $currentImage = $team->team_img;
        $team->delete();
        File::delete(public_path().'/uploads/team/'.$currentImage);
        return redirect()->back()->with('message', 'Record deleted successfully');
    }

     public function status(Request $request,$id)
    {
        
        $team= TeamModel::find($id);
        $newStatus=($team->status==0)? 1 : 0 ;
        $team->update([
            'status'=>$newStatus,
        ]);
        return redirect()->back();
    }

}
