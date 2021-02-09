@extends('cms::Backend.layouts.admin-app')
@section('content')
<div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    @include('cms::Backend.messages')
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>{{__('cms_lang::validation.custom.Cms_header')}}

                            <div class="m-portlet__head-tools float-right">
                                <a class="btn btn-success" routerlink="add" routerlinkactive="active" style="margin-right:10px;" ng-reflect-router-link="add" ng-reflect-router-link-active="active" href="{{route('cms.cms_add')}}">
                                    <span><i class="cil-user-plus"></i><span>{{__('cms_lang::validation.cms_list.cms_add')}}</span></span>
                                </a>
                            </div>
                        </div>
                        <br>
                        <form class="form-inline" action="{{route('cms.cms_list')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="text" id="name" name="name" value="{{ Request::get('name') }}" placeholder="{{__('cms_lang::validation.cms_list.name')}}" class="form-control" >
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="text" id="slug" name="slug" value="{{ Request::get('slug') }}" placeholder="{{__('cms_lang::validation.cms_list.slug')}}" class="form-control" >
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                              <select name="status" id="status" class="form-control">
                                <option value="">Select Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>  
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <button type="submit" name="submit" id="submit" class="btn btn-success">Search</button>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <a href="{{ route('cms.cms_list') }}" name="reset" class="btn btn-secondary">Reset</a>
                            </div>
                        </form>
                        <div class="card-body">

                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                <tr>
                                    <th>{{__('cms_lang::validation.cms_list.name') }}</th>
                                    <th>{{__('cms_lang::validation.cms_list.slug') }}</th>
                                    <th>{{__('cms_lang::validation.cms_list.status') }}</th>
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
                                                <a href="{{ route('cms.cms_edit',$cmsdata->id) }}"  class='btn btn-info '><i class="glyphicon glyphicon-edit"></i>Edit</a><a href="{{ route('cms.cms_destroy',$cmsdata->id) }}"  class='btn btn-danger'><i class="glyphicon glyphicon-remove"></i>Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                        <tr>
                                            <td colspan="100%" align="center">{{__('cms_lang::validation.cms_list.no_record')}}</td>
                                        </tr>
                                    @endif
                                    @else
                                        <tr>
                                            <td colspan="100%" align="center">{{__('cms_lang::validation.cms_list.no_record')}}</td>
                                        </tr>
                                    @endif
                               
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


