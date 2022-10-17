@extends('backend.master')
@section('title')
    Dashboard | Add New Member
@endsection
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Add New Member</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('member.index') }}">Members</a></li>
                            <li class="breadcrumb-item active">Add New Member</li>
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
                        <div class="text-left mb-4"><h4 class="card-title">Add New Member</h4></div>
                        <form id="postForm" action="{{ route('member.store') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-3">Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter member name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-3">Email</label>
                                <div class="col-md-9">
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone" class="col-md-3">Phone</label>
                                <div class="col-md-9">
                                    <input type="number" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter phone">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="address" class="col-md-3">Address</label>
                                <div class="col-md-9">
                                    <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="Enter address">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="address" class="col-md-3">Password</label>
                                <div class="col-md-9">
                                    <input type="text" name="password" id="address" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password">
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
                            <div class="row">
                                <div class="col-md-9 offset-3">
                                    <button type="submit" id="Post" class="btn btn-primary">Add member</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
