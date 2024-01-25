@extends('front.layout.app')
@section('content')
@section('pageTitle', 'About Us')
@section('heading', 'About Us')
@section('body', 'Know about us more')

@include('front.pages_part.breadcrumb')
@include('front.pages_part.aboutpart')

 <!-- More About Us -->
                <section class="pad-30 more-about-wrap">
                    <div class="theme-container container pb-100">               
                        <div class="row">
                            <div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                                <div class="more-about clrbg-before">
                                    <h2 class="title-1">what we do</h2>
                                    <div class="pad-10"></div>
                                    <p>Lorem ipsum dolor sit amet, consectetuer 
                                        adipiscing elit, sed diam nonummy nibh eui
                                        tincidunt ut laoreet dolore magna aliquam
                                        volutpat. Ut wisi enim ad minim veniam, quis 
                                        nostrud exerci tation ullamcorper suscipit 
                                        lobortis nisl ut aliquip ex ea commodo</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-offset="50" data-wow-delay=".30s">
                                <div class="more-about clrbg-before">
                                    <h2 class="title-1">Our History</h2>
                                    <div class="pad-10"></div>
                                    <p>Lorem ipsum dolor sit amet, consectetuer 
                                        adipiscing elit, sed diam nonummy nibh eui
                                        tincidunt ut laoreet dolore magna aliquam
                                        volutpat. Ut wisi enim ad minim veniam, quis 
                                        nostrud exerci tation ullamcorper suscipit 
                                        lobortis nisl ut aliquip ex ea commodo</p>
                                </div>
                            </div>
                            <div class="col-md-4  col-sm-4 wow fadeInUp" data-wow-offset="50" data-wow-delay=".40s">
                                <div class="more-about clrbg-before">
                                    <h2 class="title-1">our mission</h2>
                                    <div class="pad-10"></div>
                                    <p>Lorem ipsum dolor sit amet, consectetuer 
                                        adipiscing elit, sed diam nonummy nibh eui
                                        tincidunt ut laoreet dolore magna aliquam
                                        volutpat. Ut wisi enim ad minim veniam, quis 
                                        nostrud exerci tation ullamcorper suscipit 
                                        lobortis nisl ut aliquip ex ea commodo</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.More About Us -->

@endsection