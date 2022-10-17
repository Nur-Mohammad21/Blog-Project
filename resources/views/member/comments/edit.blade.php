@extends('member.master')
@section('title')
    Dashboard | Edit Comment
@endsection
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Edit Comment</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('member.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('member.comment.index') }}">Comments</a></li>
                            <li class="breadcrumb-item active">Edit Comment</li>
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
                        <form action="{{ route('member.comment.update') }}" method="post">@csrf
                            <div class="row">
                                <label for="" class="col-md-2">Comment</label>
                                <div class="col-md-8">
                                    <input type="hidden" name="id" value="{{ $comment->id }}">
                                    <input type="text" name="comment" value="{{ $comment->comment }}" class="form-control">
                                </div>
                                <div class="col-md-2"><button type="submit" class="btn btn-info">Update</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
