<?php

namespace cms\cmspackage\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use cms\cmspackage\Models\Cms;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;
use Session;

class CmsController extends Controller
{
    protected $cms;
    /**
     * 
     * @param Cms cms
     */
    public function __construct(Cms $cms) {
        $this->cms = $cms;
    }
    public function index(Request $request)
    {
        try{

        //initialise values
        $request['search_name'] = (Session::has('name'))?Session::get('name'):$request->get('name');
        $request['search_slug'] = (Session::has('slug'))?Session::get('slug'):$request->get('slug');
        $request['search_status'] = (Session::has('status'))?Session::get('status'):$request->get('status');

        $search_name   = $request->get('name');
        $search_slug   = $request->get('slug');
        $search_status = $request->get('status');
        //get all cms list
        $cms = cms::select('cms.*');

        if(isset($filter['sort_by']) && $filter['sort_by'] != '') {
                 $orderBy= $filter['sort_by'];
         } else {
             $orderBy = 'created_at';
         }

         if(isset($filter['sort_dir']) && $filter['sort_dir'] != '') {
             $sortDir = $filter['sort_dir'];
         } else {
             $sortDir = 'ASC';
         }
         $cms = $cms->orderBy($orderBy, $sortDir);

        if($search_name)
        {
          $cms->where('name', 'like', '%' . $search_name . '%');
        }
        if($search_slug)
        {
          $cms->where('slug', 'like', '%' . $search_slug . '%');
        }
        if($search_status)
        {
          $cms->where('status',$search_status);
        }

        $cms = $cms->get();

        // return redirect

        if(config::get('cms.use_published_view')){

            return view('backend.cms.components.cms_list',compact('cms'));
        }else{
            return view('cms::Backend.list',compact('cms'));
        }
        
        }catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return view('cms::Backend.error.505')->withFlashDanger($ex->getMessage());
        }
    }

    public function create()
    {
        // return view form 
        if(config::get('cms.use_published_view')){
            return view('backend.cms.components.cms_add');
        }else{
            return view('cms::Backend.add');
  
        }
    }

    public function store(Request $request)
    {
        try{
        //validation rules
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:3',
            'slug' => 'required|unique:cms|alpha',
            'description' => 'required',
        ]);
       //check validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        // create 
        $cms = Cms::create([
                            'name' => $request->name,
                            'slug' => $request->slug,
                            'description' => $request->description,
                            'meta_title' => $request->meta_title,
                            'meta_keywords' => $request->meta_keywords,
                            'meta_description' => $request->meta_description,
                            'status' => $request->status
                          ]);

        return redirect()->route('cms.cms_list')->withFlashSuccess(__('cms_lang::validation.custom.cms_add'));

        }catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return view('cms::Backend.error.505')->withFlashDanger($ex->getMessage());
        }
        
    }

    public function edit($id)
    {
        $cmsPageEdit =  Cms::findOrFail($id);
        if(config::get('cms.use_published_view')){
            
            return view('backend.cms.components.cms_edit', compact('cmsPageEdit'));
        }else{
           return view('cms::Backend.edit', compact('cmsPageEdit'));
  
        }
    }

    public function update(Request $request,$id)
    {
        try{
        //validation rules
        $validatedData = Validator::make($request->all(),[
            'name' => 'required|min:3',
            'slug' => 'required|unique:cms,slug,'.$id.',id,deleted_at,NULL',
            'description' => 'required',
            'meta_title' => 'string|max:255|nullable',
            'meta_keywords' => 'string|max:255|nullable',
            'meta_description' => 'string|max:255|nullable',
            'status' =>'required'
        ]);
        //check validation
        if ($validatedData->fails($validatedData)) {
            return Redirect::back()->withErrors($validatedData);
        }
        //update data
       Cms::whereId($id)->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'status' => $request->status
        ]);
        return redirect()->route('cms.cms_list')->withFlashSuccess(__('cms_lang::validation.custom.cms_edit'));

        }catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return view('cms::Backend.error.505')->withFlashDanger($ex->getMessage());
        }
    }

    public function destroy($id)
    {
       try{
        //check exit or not
        $cms = Cms::findOrFail($id);
        //delete 
        $cms->delete();
        // return redirect method
        return redirect()->route('cms.cms_list')->withFlashSuccess(__('cms_lang::validation.custom.cms_remove'));

        }catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return view('cms::Backend.error.505')->withFlashDanger($ex->getMessage());
        }
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('upload')->move(public_path('cms/uploads'), $filenametostore);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('cms/uploads/'.$filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

    public function active($id)
    {
        $cmsUpdate = $this->cms->findOrFail($id);
        $cmsUpdate->status = 'Active';
        $cmsUpdate->save();

        // return redirect method
        return redirect()->route('cms.cms_list')->withFlashSuccess(__('cms_lang::validation.custom.cms_active'));
    }

    /**
     * Inactive Site User
     * @param $id
     * @return mixed
     */
    public function inactive($id)
    {
        $cmsUpdate = $this->cms->findOrFail($id);
        $cmsUpdate->status = 'Inactive';
        $cmsUpdate->save();

       // return redirect method
        return redirect()->route('cms.cms_list')->withFlashSuccess(__('cms_lang::validation.custom.cms_inactive'));
    }
}