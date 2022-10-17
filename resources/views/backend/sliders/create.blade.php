@extends('backend.master')
@section('title')
    Dashboard | Add New Slider
@endsection
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Add New Slider</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('sliders.index') }}">Sliders</a></li>
                            <li class="breadcrumb-item active">Add New Slider</li>
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
                        @if(Session::has('message'))
                            <p class="text-success alert alert-success alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-check-all mr-2"></i> {{ Session::get('message') }} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </p>
                        @endif
                        @if($errors->any())
                            <ul>
                                @foreach($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="row mb-3">
                                <label for="title" class="col-md-3">Title</label>
                                <div class="col-md-9">
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="url" class="col-md-3">Url</label>
                                <div class="col-md-9">
                                    <input type="text" name="url" id="url" class="form-control" placeholder="Enter url" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-md-3">Upload Image</label>
                                <div class="col-md-9">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Upload Image File</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-9 offset-3">
                                    <input type="submit" value="Add Slider" class="btn btn-primary" />
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

