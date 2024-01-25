@extends('front.layout.app')
@section('content')
@section('pageTitle', 'Quote')
@section('heading', 'Get a Quote')
@section('body', 'Track your Parcel & see the current condition')

@include('front.pages_part.breadcrumb')
@include('front.pages_part.calculate')
@include('front.pages_part.steps')

@endsection