@extends('cms::Backend.app')
@section('content')
<div style="padding-top: 10px;padding-bottom: 10px" >
	<div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                       {{__('cms_lang::validation.custom.Cms_header')}}
                    </h4>
                </div><!--col-->
                <div class="btn-toolbar float-right">
                    <a href="{{route('cms.cms_add')}}" class="btn btn-success ml-1" data-toggle="tooltip" ><i class="glyphicon glyphicon-plus"></i></a>
                </div>
            </div><!--row-->
            @include('cms::Backend.messages')
            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table data-table">
                            <thead>
                            <tr>
                                <th class="list">Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Operation</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($cms)
                            @if($cms->count() > 0)
                            @foreach($cms as $cmsdata)
                                <tr>
                                    <td>{{ $cmsdata->name }}</td>
                                    <td>{{ $cmsdata->slug }}</td>
                                    <td>
                                        @if($cmsdata->status == 'Active')
                                            <a href="{{ route('cms.inactive',$cmsdata->id) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Click to Inactive">
                                            Active
                                            </a>
                                        @else
                                            <a href="{{ route('cms.active',$cmsdata->id) }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Click to Active">
                                             InActive   
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class='btn-group'>
                                        <a href="{{ route('cms.cms_edit',$cmsdata->id) }}"  class='btn btn-info '><i class="glyphicon glyphicon-edit"></i></a><a href="{{ route('cms.cms_destroy',$cmsdata->id) }}"  class='btn btn-danger'><i class="glyphicon glyphicon-remove"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="100%" align="center">No Record Found</td>
                                </tr>
                            @endif
                            @else
                                <tr>
                                    <td colspan="100%" align="center">No Record Found</td>
                                </tr>
                            @endif
                            <tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div class="float-right">
                                {{ $cms->links('cms::Backend.pagination') }}
                            </div>
                        </div><!--col-->
                    </div>
                </div>
                <div class="col">
                    <a href = "{{URL::previous()}}" class = 'btn btn-danger'>Cancel</a>
                </div><!--col-->
            </div>
        </div>
    </div>
</div>
@endsection