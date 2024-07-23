<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SEOModel;
use Validator;
class SeoController extends Controller
{
    public function index(){
        return view('admin.seo');
    }
    public function index_data(){
       $search_engine= SEOModel::latest()->get();
       return response()->json(['search_engine'=>$search_engine]);
    }
    public function seo_edit($id){
        $search_engine= SEOModel::find($id);
        return response($search_engine);
    }
    public function search_engine_store(Request $request){
        $validator = Validator::make(request()->all(),[
            'page_name' => 'required|unique:web_seo',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keyword' => 'required',
            'page_url' => 'required|unique:web_seo',
        ]);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        } else{
            SEOModel::create([
                'page_name' => $request->page_name,
                'page_url' => $request->page_url,
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'canonical_url' => $request->page_url,
            ]);
            return response()->json(['success' => "Seo added to page successfully"]);
        }
    }
    public function search_engine_update(Request $request, $id){
        $seo_data = SEOModel::find($id);
        $validator = Validator::make(request()->all(),[
            // 'page_name' => 'required|unique:web_seo',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keyword' => 'required',
            // 'page_url' => 'required|unique:web_seo',
        ]);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        } else{
            $seo_data->update([
                // 'page_name' => $request->page_name,
                'page_url' => $request->page_url,
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                // 'canonical_url' => $request->page_url,
            ]);
            return response()->json(['success' => "updated successfully"]);
        }
    }
    public function seo_delete(Request $request, $id){
        $seo_data = SEOModel::find($id);
        $seo_data->delete();
        return response()->json(['success' => "Deleted successfully"]);

    }
}
