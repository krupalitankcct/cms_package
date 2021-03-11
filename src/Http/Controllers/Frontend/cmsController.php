<?php

namespace Cms\Cmspackage\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cms\Cmspackage\Models\Cms;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;
use Redirect;

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
    public function show($slug)
    {
        try{
            // get cms list
            $page = CMS::whereSlug($slug)->first();
            return view('cms::Frontend.index',compact('page'));

        }catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return Redirect::back()->withFlashDanger($ex->getMessage());
        }
    }

}