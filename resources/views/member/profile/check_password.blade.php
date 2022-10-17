@extends('member.master')
@section('title')
    Dashboard | Update Profile Password
@endsection
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Update Profile Password</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('member.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Update Profile Password</li>
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
                        @if($errors->any())
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li class="text-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        @if(Session::has('success_message'))
                            <p class="text-success alert alert-success alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-check-all mr-2"></i> {{ Session::get('success_message') }} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </p>
                        @endif
                        @if(Session::has('error_message'))
                            <p class="text-danger alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-check-all mr-2"></i> {{ Session::get('error_message') }} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </p>
                        @endif
                        <form action="{{ route('member.update.password') }}" method="post">@csrf
                            <div class="row mt-3">
                                <label for="current_password" class="col-md-3">Current Password</label>
                                <div class="col-md-9">
                                    <input type="password" id="current_password" name="current_password"  class="form-control">
                                    <p class="match_password"></p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="new_password" class="col-md-3">New Password</label>
                                <div class="col-md-9">
                                    <input type="password" id="new_password" name="new_password" class="form-control" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="confirm_password" class="col-md-3">Confirm Password</label>
                                <div class="col-md-9">
                                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-9 offset-3">
                                    <input type="submit"  class="btn btn-primary" value="Update Password">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
