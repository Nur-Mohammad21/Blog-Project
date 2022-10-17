@extends('member.master')
@section('title')
    Dashboard | Profile
@endsection
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Profile</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('member.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        @if(Session::has('message'))
                            <p class="text-success alert alert-success alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-check-all mr-2"></i> {{ Session::get('message') }} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </p>
                        @endif
                        <form action="{{ route('member.profile.update') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="row mt-3">
                                <label for="" class="col-md-3">Name</label>
                                <div class="col-md-9">
                                    <input type="hidden" name="id" value="{{ $member->id }}" class="form-control">
                                    <input type="text" name="name" value="{{ $member->name }}" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-3">Email</label>
                                <div class="col-md-9">
                                    <input type="email" name="email" value="{{ $member->email }}" class="form-control" readonly />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-3">Phone</label>
                                <div class="col-md-9">
                                    <input type="text" name="phone"  value="{{ $member->phone }}"class="form-control">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-3">Address</label>
                                <div class="col-md-9">
                                    <input type="text" name="address" value="{{ $member->address }}" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-3">Upload Image</label>
                                <div class="col-md-9">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Upload Image File</label>
                                    </div>
                                    @if(!empty($member->image))
                                        <img class="post-image mt-2" src="{{ asset($member->image) }}" alt="member image">
                                    @endif
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-9 offset-3">
                                    <input type="submit"  class="btn btn-primary" value="Update">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
