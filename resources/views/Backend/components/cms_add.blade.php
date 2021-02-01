@extends('cms::Backend.app')
@section('content')
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <form action="{{ route('cms.cms_store') }}" class="form-horizontal" method="post" >
        {{ csrf_field() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{__('cms_lang::validation.custom.Cms_header')}}
                    </h4>
                </div><!--col-->
            </div><!--row-->
            <hr>
            @include('cms::Backend.messages');
            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">CMS Title</label>
                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="Title" required autofocus="true"/>
                        </div><!--col-->
                    </div><!--form-group-->

                    <!-- slug details -->
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">CMS Slug</label>
                        <div class="col-md-10">
                            <input type="text" name="slug" class="form-control" placeholder="Slug" required autofocus="true"/>
                        </div><!--col-->
                    </div><!--form-group-->
                    <!-- Description details -->
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">CMS Description</label>
                        <div class="col-md-10">
                            <textarea class="form-control list" id="description" name="description"></textarea>
                        </div><!--col-->
                    </div><!--form-group-->
                     <!-- cms meta title -->
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">Meta Title</label>
                        <div class="col-md-10">
                            <input type="text" name="meta_title" class="form-control" placeholder="Meta title Name"  autofocus="true"/>
                        </div>
                    </div>
                    <!-- cms meta title -->
                    <!-- cms meta keywords -->
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">Meta Description</label>
                        <div class="col-md-10">
                            <input type="text" name="meta_descripation" class="form-control" placeholder="Meta description"  autofocus="true"/>
                        </div>
                    </div>
                    <!-- cms meta keywords -->
                    <!-- cms meta description -->
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">Meta keyword</label>
                        <div class="col-md-10">
                            <input type="text" name="meta_keyword" class="form-control" placeholder="Meta keyword"  autofocus="true"/>
                        </div>
                    </div>
                    <!-- cms meta description -->
                    <!-- cms status-->
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label">Status</label>
                        <div class="col-md-10">
                           <select name="status" id="status" class="form-control w-75" required>
                                <option value="">Select Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->
                    <!-- cms status-->

                    <!--form-group-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col-sm-6">
                     <a href = "{{URL::previous()}}" class = 'btn btn-danger'>Cancel</a>
                </div><!--col-->
                <div class="col-sm-6 text-right">
                    <button class="btn btn-info">submit</button>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->

    </form>
    <script>
        CKEDITOR.replace( 'description', {
            filebrowserUploadUrl: "{{route('cms.cms_upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
