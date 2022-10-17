@extends('front.master')
@section('title')
    Contact us
@endsection
@section('content')


    <!-- start contact Section -->
    <section>
        <div class="container">
            <div class="row">

                <!--  start contact left-->
                <div class="col-lg-8 col-md-12 sm-margin-50px-bottom">
                    <div>
                        <h5 class="font-size24">Contact Us</h5>
                        <div class="margin-30px-bottom">
                            <iframe class="map" id="gmap_canvas" src="https://maps.google.com/maps?q=london&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        </div>
                        <ul class="list-style-1 margin-30px-bottom">
                            <li>
                                <span class="d-inline-block vertical-align-top font-size18"><i class="fas fa-map-marker-alt text-theme-color"></i></span>
                                <span class="d-inline-block width-65 sm-width-85 vertical-align-top padding-10px-left">74 Guild Street 542B, Great North Town MT.</span>
                            </li>
                            <li>
                                <span class="d-inline-block vertical-align-top font-size18"><i class="fas fa-phone text-theme-color"></i></span>
                                <span class="d-inline-block width-65 sm-width-85 vertical-align-top padding-10px-left">4355 6567 789</span>
                            </li>
                            <li>
                                <span class="d-inline-block vertical-align-top font-size18"><i class="fas fa-envelope text-theme-color"></i></span>
                                <span class="d-inline-block width-65 sm-width-85 vertical-align-top padding-10px-left">example@yourname.com</span>
                            </li>
                        </ul>
                        <h6 class="font-size20 font-weight-500">Keep In Touch:</h6>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control no-margin-bottom padding-10px-tb" name="exampleInputName" id="exampleInputName" placeholder="Your Name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control no-margin-bottom padding-10px-tb" name="exampleInputEmail" id="exampleInputEmail" placeholder="Email">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control no-margin-bottom padding-10px-tb" name="exampleInputTitle" id="exampleInputTitle" placeholder="Subject Title">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Message"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="butn"><span>submit message</span></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  end contact left-->

                <!--  start contact right-->
                <div class="col-lg-4 col-md-12">
                    <div class="side-bar padding-30px-left md-no-padding-left">

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
                <!--  end contact right-->

            </div>
        </div>
    </section>
    <!-- end contact section -->

@endsection
