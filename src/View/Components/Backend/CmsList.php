<?php

namespace cms\cmspackage\View\Components;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Blade;

class CmsList extends Component
{
    public $cms;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cms = null)
    {
        $this->cms = $cms;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
       return view('cms::Backend.components.cms_list');
    }
}
