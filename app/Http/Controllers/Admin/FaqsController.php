<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FaqModel;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs =FaqModel::get();
        return view('admin/faqs/index')->with(compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'question' =>'required',
            'answer'=> 'required',
            'type'=> 'required',
        ]);
        FaqModel::create([
            'type'=>request()->get('type'),
            'question'=>request()->get('question'),
            'answer'=>request()->get('answer'),
            'status'=> $request->get('status'),
        ]);

        return redirect()->route('faq.index')->with('message','Record Added Successfully.');
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
        $faq =FaqModel::find($id);
        $faqs =FaqModel::get();
        return view('admin/faqs/edit')->with(compact('faq','faqs'));
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
            'type' =>'required',
            'question' =>'required',
            'answer'=> 'required',
        ]);
        $faq=FaqModel::find($id);
        $faq->update([
            'type'=>request()->get('type'),
            'question'=>request()->get('question'),
            'answer'=>request()->get('answer'),
            'status'=> $request->get('status'),
        ]);

        return redirect()->route('faq.index')->with('message','Record Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        
        $faq= FaqModel::find($id);
        $faq->delete();
    
       return redirect()->back();
    }
    public function status(Request $request, $id)
    {
            $faq= FaqModel::find($id);
            $newStatus=($faq->status==0)? 1 : 0 ;
            $faq->update([
                'status'=>$newStatus,
            ]);
        return redirect()->back();
    }
}
