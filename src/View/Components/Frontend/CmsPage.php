<?php

namespace cms\cmspackage\View\Components;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Blade;

class CmsPage extends Component
{
    public $page;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($page = null)
    {
        $this->page = $page;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('cms_frontend::components.cms_page');
    }
}
