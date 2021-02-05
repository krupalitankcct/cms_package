@extends('cms::Backend.layouts.admin-app')
@section('content')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    @include('cms::Backend.messages')
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> {{__('cms_lang::validation.custom.Cms_header')}}
                        </div>

                        <div class="card-body">
                        <form action="{{ route('cms.cms_update',$cmsPageEdit->id) }}" class="form-horizontal" method="post"> 
                            {{ csrf_field() }}
                            <div class="row mt-4">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">{{__('cms_lang::validation.cms_add.title')}}</label>
                                            <div class="col-md-10">
                                                <input type="text" name="name" class="form-control" placeholder="Title" required autofocus="true" value="{{$cmsPageEdit->name}}"/>
                                            </div><!--col-->
                                        </div><!--form-group-->

                                        <!-- slug details -->
                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">{{__('cms_lang::validation.cms_add.slug')}}</label>
                                            <div class="col-md-10">
                                                <input type="text" name="slug" class="form-control" placeholder="Slug" required autofocus="true"/ value="{{$cmsPageEdit->slug}}">
                                            </div><!--col-->
                                        </div><!--form-group-->
                                        <!-- Description details -->
                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">{{__('cms_lang::validation.cms_add.discription')}}</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control list" id="description" name="description">{{$cmsPageEdit->description}}</textarea>
                                            </div><!--col-->
                                        </div><!--form-group-->
                                         <!-- cms meta title -->
                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">{{__('cms_lang::validation.cms_add.meta_title')}}</label>
                                            <div class="col-md-10">
                                                <input type="text" name="meta_title" class="form-control" placeholder="Meta title Name"  autofocus="true" value="{{$cmsPageEdit->meta_title}}"/>
                                            </div>
                                        </div>
                                        <!-- cms meta title -->
                                        <!-- cms meta keywords -->
                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">{{__('cms_lang::validation.cms_add.meta_des')}}</label>
                                            <div class="col-md-10">
                                                <input type="text" name="meta_descripation" class="form-control" placeholder="Meta description"  autofocus="true" value="{{$cmsPageEdit->meta_descripation}}"/>
                                            </div>
                                        </div>
                                        <!-- cms meta keywords -->
                                        <!-- cms meta description -->
                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">{{__('cms_lang::validation.cms_add.meta_key')}}</label>
                                            <div class="col-md-10">
                                                <input type="text" name="meta_keyword" class="form-control" placeholder="Meta keyword"  autofocus="true" value="{{$cmsPageEdit->meta_keyword}}"/>
                                            </div>
                                        </div>
                                        <!-- cms meta description -->
                                        <!-- cms status-->
                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">{{__('cms_lang::validation.cms_add.status')}}</label>
                                            <div class="col-md-10">
                                               <select name="status" id="status" class="form-control w-75" required>
                                                    <option value="">Select Status</option>
                                                    <option value="Active" {{ $cmsPageEdit->status == 'Active' ? 'selected' : ''}}>Active</option>
                                                    <option value="Inactive" {{ $cmsPageEdit->status == 'Inactive' ? 'selected' : ''}}>Inactive</option>
                                                </select>
                                            </div><!--col-->
                                        </div><!--form-group-->
                                        <!-- cms status-->

                                        <!--form-group-->
                                    </div><!--col-->
                            </div><!--row-->
                            <div>
                                <div class="row">
                                    <div class="col-sm-6">
                                         <a href = "{{URL::previous()}}" class = 'btn btn-danger'>Cancel</a>
                                    </div><!--col-->
                                    <div class="col-sm-6 text-right">
                                        <button class="btn btn-info">Edit</button>
                                    </div><!--col-->
                                </div><!--row-->
                            </div><!--card-footer-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace( 'description', {
            filebrowserUploadUrl: "{{route('cms.cms_upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection

