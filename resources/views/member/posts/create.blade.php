@extends('member.master')
@section('title')
    Dashboard | Member | Add New Post
@endsection
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Add New Post</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('member.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('member.post.index') }}">Posts</a></li>
                            <li class="breadcrumb-item active">Add New Post</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-md-10 mx-auto">
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
                        <div class="text-left mb-4"><h4 class="card-title">Add New Post</h4></div>
                        <form id="postForm" action="{{ route('member.post.store') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="row mb-3">
                                <label for="category" class="col-md-3">Select Category</label>
                                <div class="col-md-9">
                                    <select name="category_id" id="category" class="form-control @error('title') is-invalid @enderror">
                                        <option>------------Select Category-------------</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="title" class="col-md-3">Title</label>
                                <div class="col-md-9">
                                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter post title">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="meta_title" class="col-md-3">Meta title</label>
                                <div class="col-md-9">
                                    <input type="text" name="meta_title" id="meta_title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter post meta title">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="short_description" class="col-md-3">Short Description</label>
                                <div class="col-md-9">
                                    <textarea name="short_description" id="short_description" cols="50" rows="5" class="summernote"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="long_description" class="col-md-3">Long Description</label>
                                <div class="col-md-9">
                                    <textarea name="long_description" id="long_description" cols="50" rows="5" class="summernote"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="post_image" class="col-md-3">Upload Image</label>
                                <div class="col-md-9">
                                    <div class="custom-file">
                                        <input type="file" name="post_image" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Upload Image File</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9 offset-3">
                                    <button type="submit" id="Post" class="btn btn-primary">Add Post</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
