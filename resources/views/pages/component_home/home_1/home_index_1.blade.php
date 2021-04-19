{{-- author  : Muhamad Munawir Amin
Email        : muhamadmunawiramin@gmail.com
Last Update  : 3 Februari 2021 --}}

@extends('pages.layouts.app')

@section('title', 'Home')

@section('content')
<div class="section no-pad-bot" id="index-banner" style="margin-top: 1%;">
    
    {{-- <div class="container" style="width: 90%;"> --}}

    <img class="image-background" src="{{ asset('images/map-indonesia-2-min.jpg') }}" alt="map-indonesia">

    @include('pages.component_home.home_1.slider_content_1')

    @include('pages.component_home.home_1.publication_content_1')

    @include('pages.component_home.home_1.activity_content_1')

    @include('pages.component_home.home_1.application_content_1')

    {{-- </div> --}}

</div>

@endsection