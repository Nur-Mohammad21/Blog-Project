@extends('front.master')
@section('title')
    Blog Posts
@endsection
@section('content')

    <!-- start blog Section -->
    <section>
        <div class="container">
            <div class="row">
                <h3 class="display-4 text-info text-uppercase">Category Posts</h3>
                <!--  start blog left-->
                <div class="col-lg-8 col-md-12 sm-margin-50px-bottom">


                    @foreach($posts as $post)
                        <div class="card margin-30px-bottom border-0 bg-light rounded-0">

                            <div class="row no-gutters list-blog">

                                <div class="col-md-5">
                                    <div class="bg-img cover-background h-100 min-height-250" data-overlay-dark="0" data-background="{{ asset($post->post_image) }}"></div>
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">

                                        <span class="category">{{ $post->category->title }}</span>

                                        <h5><a href="{{ route('blog.detail',['id'=>$post->id]) }}">{{ $post->title }}</a></h5>
                                        <p>{!! $post->short_description !!}</p>

                                        <div class="meta">
                                            <span class="date">{{ $post->created_at->diffForhumans() }}</span>
                                            <span class="author">By <a href="#!">{{ $post->member->name }}</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                @endforeach
                <!-- start pager  -->

                    <div class="margin-50px-top">
                        {{ $posts->links() }}
                    </div>
                    <!-- end pager  -->

                </div>
                <!--  end blog left-->

                <!--  start blog right-->
                <div class="col-lg-4 col-md-12">
                    <div class="side-bar padding-30px-left md-no-padding-left">
                        <div class="widget search padding-30px-all md-padding-20px-all shadow-theme">
                            <div class="widget-title margin-35px-bottom">
                                <h3>Search</h3>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Type here..." aria-label="Recipient's username" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="button-addon2"><span class="ti-search"></span></button>
                                </div>
                            </div>
                        </div>

                        <div class="widget padding-30px-all md-padding-20px-all shadow-theme">
                            <div class="widget-title margin-35px-bottom">
                                <h3>Categories</h3>
                            </div>
                            <ul class="widget-list no-margin-bottom">
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{ route('category.posts',['id'=>$category->id]) }}">{{ $category->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="widget padding-30px-all md-padding-20px-all shadow-theme">
                            <div class="widget-title margin-35px-bottom">
                                <h3>Recent Posts</h3>
                            </div>
                            <div class="media margin-20px-bottom">
                                <img src="{{ asset('/') }}frontend/img/blog/blog-6.jpg" class="mr-4" alt="" />
                                <div class="media-body">
                                    <h5 class="no-margin-top margin-5px-bottom font-size15 font-weight-500"><a href="#" class="text-extra-dark-gray">She is known for playing</a></h5>
                                    <span class="font-size14">20 Mar, 2020</span>
                                </div>
                            </div>
                            <div class="media margin-20px-bottom">
                                <img src="{{ asset('/') }}frontend/img/blog/blog-7.jpg" class="mr-4" alt="" />
                                <div class="media-body">
                                    <h5 class="no-margin-top margin-5px-bottom font-size15 font-weight-500"><a href="#" class="text-extra-dark-gray">Craft a life you love</a></h5>
                                    <span class="font-size14">12 Mar, 2020</span>
                                </div>
                            </div>
                            <div class="media margin-20px-bottom">
                                <img src="{{ asset('/') }}frontend/img/blog/blog-8.jpg" class="mr-4" alt="" />
                                <div class="media-body">
                                    <h5 class="no-margin-top margin-5px-bottom font-size15 font-weight-500"><a href="#" class="text-extra-dark-gray">Wonderland of ice place</a></h5>
                                    <span class="font-size14">17 Feb, 2020</span>
                                </div>
                            </div>
                            <div class="media">
                                <img src="{{ asset('/') }}frontend/img/blog/blog-5.jpg" class="mr-4" alt="" />
                                <div class="media-body">
                                    <h5 class="no-margin-top margin-5px-bottom font-size15 font-weight-500"><a href="#" class="text-extra-dark-gray">Publish your passions</a></h5>
                                    <span class="font-size14">12 Jan, 2020</span>
                                </div>
                            </div>
                        </div>

                        <div class="widget padding-30px-all md-padding-20px-all shadow-theme">
                            <div class="widget-title margin-35px-bottom">
                                <h3>Tags</h3>
                            </div>
                            <ul class="tags no-margin-bottom">
                                <li><a href="jvascript:void(0)">Lifestyle</a></li>
                                <li><a href="jvascript:void(0)">Food</a></li>
                                <li><a href="jvascript:void(0)">Kids</a></li>
                                <li><a href="jvascript:void(0)">Fashion</a></li>
                                <li><a href="jvascript:void(0)">Travel</a></li>
                                <li><a href="jvascript:void(0)">DIY</a></li>
                                <li><a href="jvascript:void(0)">Music</a></li>
                                <li><a href="jvascript:void(0)">Crafts</a></li>
                                <li><a href="jvascript:void(0)">Business</a></li>
                                <li><a href="jvascript:void(0)">Career</a></li>
                            </ul>
                        </div>

                        <div class="widget padding-30px-all md-padding-20px-all shadow-theme">
                            <div class="widget-title margin-35px-bottom">
                                <h3>Instagram</h3>
                            </div>
                            <ul class="insta-link text-center no-margin-bottom">
                                <li>
                                    <a href="#"><img src="{{ asset('/') }}frontend/img/blog/insta-1.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('/') }}frontend/img/blog/insta-2.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('/') }}frontend/img/blog/insta-3.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('/') }}frontend/img/blog/insta-4.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('/') }}frontend/img/blog/insta-5.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('/') }}frontend/img/blog/insta-6.jpg" alt=""></a>
                                </li>
                            </ul>
                        </div>

                        <div class="widget padding-30px-all md-padding-20px-all shadow-theme">
                            <div class="widget-title margin-35px-bottom">
                                <h3>Follow us</h3>
                            </div>
                            <div class="bg-light padding-20px-all">
                                <ul class="social-links no-margin text-center">
                                    <li>
                                        <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><i class="fab fa-dribbble"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="widget">
                            <div class="bg-img text-center padding-30px-all cover-background" data-overlay-dark="5" data-background="{{ asset('/') }}frontend/img/content/testimonial.jpg">
                                <div class="owl-carousel owl-theme" id="testmonials-carousel">
                                    <div>
                                        <i class="fas fa-quote-left font-size24 text-white margin-30px-bottom"></i>
                                        <p class="text-white">Stotam rem aperiam, eaquelim ipsa quae ab illo inventore veritatis et architecto.</p>
                                        <h6 class="no-margin-bottom text-white font-size18 font-weight-400">- John Mariya</h6>
                                    </div>
                                    <div>
                                        <i class="fas fa-quote-left font-size24 text-white margin-30px-bottom"></i>
                                        <p class="text-white">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit onsequuntur.</p>
                                        <h6 class="no-margin-bottom text-white font-size18 font-weight-400">- Maria Parker</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--  end blog right-->

            </div>
        </div>
    </section>
@endsection
