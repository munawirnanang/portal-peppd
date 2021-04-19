{{-- author  : Muhamad Munawir Amin
Email        : muhamadmunawiramin@gmail.com
Last Update  : 3 Februari 2021 --}}

@extends('pages.layouts.app')

@section('title', 'Home')

@section('content')
<div class="section no-pad-bot" id="index-banner" style="margin-top: 1%; padding: 2%; padding-right: 0%;">
    
    {{-- <div class="container" style="width: 90%;"> --}}

    {{-- <img class="image-background" src="{{ asset('images/map-indonesia-2-min.jpg') }}" alt="map-indonesia"> --}}

    <div class="row" style="margin-bottom: 0px;">

      <div class="col s12 m8 l8" style="margin-top: 1%;">
        @include('pages.component_home.home_2.slider_content_2')
      </div>
      <div class="col s12 m4 l4">
        @include('pages.component_home.home_2.activity_content_2')
      </div>
      
    </div>

    <div class="row">

      <div class="col s12 m8 l8">
        @include('pages.component_home.home_2.publication_content_2')

        @include('pages.component_home.home_2.guide_content_2')
      </div>
      <div class="col s12 m4 l4">
        @include('pages.component_home.home_2.application_content_2')

        @include('pages.component_home.home_2.contact_us_2')
      </div>

    </div>

    {{-- </div> --}}

</div>

@endsection