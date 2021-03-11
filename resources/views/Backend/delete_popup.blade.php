<!-- Modal -->

<div class="btn-group btn-group-sm" cms="group" aria-label="">
    <a href="{{ route('cms.cms_edit',$cmsdata->id) }}" class="btn btn-primary" data-toggle="tooltip"
       data-placement="top" title="Edit">Edit
        <i class="fas fa-edit"></i>
    </a>

    <a href="{{ route('cms.cms_destroy',$cmsdata->id) }}"
       data-method="delete"
       data-trans-button-cancel="Cancel"
       data-trans-button-confirm="Delete"
       data-trans-title="Are you sure to delete"
       class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="">
        Delete
        <i class="fas fa-trash"></i>
    </a>
</div>
