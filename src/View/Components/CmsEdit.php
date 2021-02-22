<?php

namespace Cms\Cmspackage\View\Components;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Blade;

class CmsEdit extends Component
{
    public $cmsPageEdit;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cmsPageEdit = null)
    {
        $this->cmsPageEdit = $cmsPageEdit;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        if(config::get('cms.use_published_view') == "true"){
            return view('backend.cms.components.cms_edit');
        }else{
            return view('cms::Backend.components.cms_edit');
        }
    }
}
