@extends('backend.master')
@section('title')
    Dashboard | Edit Category
@endsection
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Add New Section</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Categories</a></li>
                            <li class="breadcrumb-item active">Edit Category</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <p class="alert alert-danger alert-dismissible fade show" role="alert"><i class="mdi mdi-block-helper mr-2"></i> {{ $error }} <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>
                            @endforeach
                        @endif
                        @if(Session::has('message'))
                            <p class="text-success alert alert-success alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-check-all mr-2"></i> {{ Session::get('message') }} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </p>
                        @endif
                        <div class="text-left mb-4"><h4 class="card-title">Edit Category</h4></div>
                        <form id="sectionForm" action="{{ route('category.update') }}" method="post">@csrf
                            <div class="row mb-3">
                                <label for="title" class="col-md-3">Category Title</label>
                                <div class="col-md-9">
                                    <input type="hidden" name="id" value="{{ $category->id }}">
                                    <input type="text" name="title" id="title" class="form-control" value="{{ $category->title }}" placeholder="Enter category name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-md-3">Description</label>
                                <div class="col-md-9">
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{ $category->description }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9 offset-3">
                                    <button type="submit" id="category" class="btn btn-primary">Edit Category</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
