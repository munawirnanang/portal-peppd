{{-- author  : Muhamad Munawir Amin
Email        : muhamadmunawiramin@gmail.com
Last Update  : 5 Februari 2021 --}}

@extends('pages.layouts.app')

@section('title', 'Guide')

@section('content')
<div class="section no-pad-bot" id="index-banner" style="margin-top: 1%;">

    <img class="image-background" src="{{ asset('images/map-indonesia-2-min.jpg') }}" alt="map-indonesia">
    
    <div class="container" style="width: 70%;">

        @include('pages.component_guide.guide_list_content')

    </div>

</div>

@endsection