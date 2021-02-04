<?php

namespace cms\cmspackage\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use cms\cmspackage\Models\Cms;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;

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
        $page = CMS::whereSlug($slug)->first();
        return view('cms_frontend::index',compact('page'));
    }

}