@extends('backend.master')
@section('title')
    Dashboard | Sections
@endsection
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Sections</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Sections</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if(Session::has('message'))
                            <p class="text-success alert alert-success alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-check-all mr-2"></i> {{ Session::get('message') }} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </p>
                        @endif
                        <div class="text-right">
                            <a href="{{ route('section.create') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i>Add New Section</a>
                        </div>
                        <table id="datatable" class="table table-striped table-bordered table-responsive-md dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>SL. NO</th>
                                    <th>Section Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sections as $section)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $section->name }}</td>
                                        <td>
                                            @if($section->status==1)
                                                <a class="status" href="javascript:void(0)" id="status-{{ $section->id }}" record="section" record_id="{{ $section->id }}"><i class="fa fa-2x fa-toggle-on" status="active"></i></a>
                                            @else
                                                <a class="status" href="javascript:void(0)" id="status-{{ $section->id }}" record="section" record_id="{{ $section->id }}"><i class="fa fa-2x fa-toggle-off" status="inactive"></i></a>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="btn-group">
                                                <a href="{{ route('section.edit',['id'=>$section->id]) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('section.delete',['id'=>$section->id]) }}" onclick="return confirm('Are sure delete this item?');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
