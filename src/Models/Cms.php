<?php

namespace Cms\Cmspackage\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cms extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'description',
        'status',
        'slug',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
