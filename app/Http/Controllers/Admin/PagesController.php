<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PagesModel;
use Str;
class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = PagesModel::get();
        return view('admin.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'name'=> 'required',
            'content' => 'required'
        ]);
        $content = $request->input('content');
        $content = str_replace('assets/img', asset('assets/img/'), $content);
        PagesModel::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name,'-'),
            'content' => $content,
            'status' => 1,
        ]);

        return redirect()->route('page.index')->with('message','Page created successfully!');
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
        $page = PagesModel::find($id);
        return view('admin.pages.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate(request(),[
            'name'=> 'required',
            'content' => 'required'
        ]);
        $page = PagesModel::find($id);
        $content = $request->input('content');
        $content = str_replace('assets/img', asset('assets/img/'), $content);
        $page->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name,'-'),
            'content' => $content,
            'status' => 1,
        ]);
        return redirect()->route('page.index')->with('message','Page created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $page = PagesModel::find($id)->delete();
        return redirect()->back()->with('message','Page deleted successfully!');
    }
}
