<?php

namespace Cms\Cmspackage\View\Components;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Blade;

class CmsAdd extends Component
{
    public $message;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        if(config::get('cms.use_published_view') == "true"){
            return view('backend.cms.components.cms_add');
        }else{
            return view('cms::Backend.components.cms_add');
        }
    }
}
