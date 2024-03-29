@extends('front.layout.app')
@section('content')
@section('pageTitle', '404 ERROR!')
@section('heading', '404 ERROR!')
@section('body', 'Something was not correct')

@include('front.pages_part.breadcrumb')
 <!-- 404 -->
                <section class="pt-50 pb-120 error-wrap">                    
                    <div class="theme-container container text-center">               
                        <h2 class="section-title no-margin"> 404 </h2>
                        <p class="fs-20">The page you are looking for is not found!<br>
                            Please use the correct link.</p>
                        <h3 class="no-margin pt-10"> <a href="{{ url('/')}}" class="title-1"> <i class="arrow_left fs-20"></i> go back to home </a> </h3>
                    </div>
                </section>
                <!-- /.404 -->

@endsection