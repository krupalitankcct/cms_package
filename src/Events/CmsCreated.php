<?php

namespace cms\cmspackage\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Cms\Cmspackage\Models\Cms;

class CmsCreated
{
    use Dispatchable, SerializesModels;

    public $cms;

    public function __construct(Cms $cms)
    {
        $this->cms = $cms;
    }
}