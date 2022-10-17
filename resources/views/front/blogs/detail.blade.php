@extends('front.master')
@section('title')
    Blog Post Detail Page
@endsection
@section('content')
    <!-- start blog Section -->
    <section>
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-11">
                    <!-- start content  -->
                    <img src="{{ asset($post->post_image) }}" class="margin-30px-bottom" alt="..." />
                    <span class="text-extra-dark-gray font-size14"><span class="font-weight-600">By:</span> <a href="#" class="border-bottom">{{ $post->member->name }}</a> <span class="font-weight-600">, at </span> <a href="#" class="border-bottom"> {{ $post->created_at->diffForHumans() }}</a></span>
                    <h5 class="margin-15px-top font-weight-600 font-size32 sm-font-size28 xs-font-size24 line-height-40 xs-line-height-30">{{ $post->title }}</h5>
                    <p class="font-size16">{{ $post->meta_title }}</p>

                    <p class="font-size16">{!! $post->short_description !!} </p>

                    <p class="font-size16">{!! $post->long_description !!}</p>

                    <!-- end content -->

                    <div class="blogs margin-40px-top">
                        <!--  start comment-->
                        <div class="comments-area">
                            <div class="margin-50px-bottom sm-margin-30px-bottom">
                                <h3 class="font-size28 sm-font-size26 xs-font-size24">Comments</h3>
                            </div>
                            @foreach($comments as $comment)
                            <div class="comment-box">
                                <div class="author-thumb">
                                    <img src="{{ asset($comment->member->image) }}" alt="" style="height: 60px;" class="rounded-circle width-75  xs-width-100" />
                                </div>
                                <div class="comment-info">
                                    <h6><a href="javascript:void(0);">{{ $comment->member->name }}</a></h6>
                                    <p>{{ $comment->comment }}</p>
                                    @if(Session::has('reply_success_message')) <p class="text-success">{{ Session::get('reply_success_message') }}</p> @endif
                                    <div class="reply">
                                        <a href="javascript:void(0);"  class="reply_btn" replyBoxId="{{ $comment->id }}" >
                                            <i class="fa fa-reply" aria-hidden="true"></i> Reply
                                        </a>
                                        <div class="replyForm"  id="{{ $comment->id }}">
                                            <form action="{{ route('reply.store') }}" id="comment-form" method="post">@csrf
                                                <div class="controls">
                                                    <div class="row">
                                                        <div class="col-md-12 form-group">
                                                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                                            <textarea id="form_message" name="reply" placeholder="Message" rows="4" required="required" class="@error('comment') is-invalid @enderror"></textarea>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn btn-primary"><span>Reply</span></button>
                                                            <a href="javascript:void(0)" class="cancelBtn btn-danger btn"><span>Cancle</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @foreach($comment->reply as $reply)
                                    <div class="comment-box">
                                        <div class="author-thumb">
                                            <img src="{{ asset( $reply->member->image) }}" alt="{{ $reply->member->name }}"  style="height: 65px;" class="rounded-circle width-85 xs-width-100" />
                                        </div>
                                        <div class="comment-info">
                                            <h6><a href="javascript:void(0);">{{ $reply->member->name }}</a></h6>
                                            <p>{{ $reply->reply }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                        <!-- end comment-->

                        <!--  start form-->
                        <div class="comment-form">
                            <div class="margin-30px-bottom">
                                <h3 class="font-size28 xs-font-size22">Post a Comment</h3>
                                @if(Session::has('message')) <p class="text-primary">{{ Session::get('message') }}</p>@endif
                            </div>
                            <form action="{{ route('comment.store') }}" id="comment-form" method="post">@csrf
                                <div class="controls">
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            <textarea id="form_message" name="comment" placeholder="Message" rows="4" required="required" class="@error('comment') is-invalid @enderror"></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="butn"><span>Comment</span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--  end form-->
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--End blog section-->

@endsection
