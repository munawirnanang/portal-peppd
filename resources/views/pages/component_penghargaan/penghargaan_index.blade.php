{{-- author  : Muhamad Munawir Amin
Email        : muhamadmunawiramin@gmail.com
Last Update  : 3 Februari 2021 --}}

@push('style')
    <!-- Start WOWSlider.com HEAD section -->
    <link 
      rel="stylesheet" 
      type="text/css" 
      href="{{ asset('engine1/style.css') }}" 
    />

    <link
      href="{{ asset('css/hardcode/activity_content.css') }}"
      type="text/css"
      rel="stylesheet"
      media="screen,projection"
    />
@endpush

@extends('pages.layouts.app')

@section('title', 'Penghargaan')

@section('content')
<div class="section no-pad-bot" id="index-banner" style="margin-top: 1%; padding: 2%; padding-right: 0%;">
    
    <div class="container" style="width: 100%;">

        {{-- <img class="image-background" src="{{ asset('images/map-indonesia-2-min.jpg') }}" alt="map-indonesia"> --}}

        <div class="row" style="margin-bottom: 0px;">

            <div class="col s12 m12 l12" style="margin-top: 1%;">
                
                <!-- Start WOWSlider.com BODY section -->
                <div id="wowslider-container1">
                    <div class="ws_images">
                        <ul>
                            <li><img src="{{ asset('data1/images/carousel/carousel_1_1min.png') }}" alt="Penghargaan Pembangunan Daerah" title="Penghargaan Pembangunan Daerah" id="wows1_0"/></li>
                        </ul>
                    </div>
                </div>
                <!-- End WOWSlider.com BODY section -->

                <br>
                
                <div class="container activity-content-container-3" style="width: 100%;">
                    <h6 class="menu-title activity-content-title" id="activity-content" style="text-align: left;"><b><i class="tiny material-icons">local_activity</i> PENGHARGAAN PEMBANGUNAN DAERAH</b></h6>
                    <hr>
                    <div class="row">

                    <div class="col s6 m4 l4">
                        <div class="card activity-content-card-3 activity-content-card-hover" style="border-radius: 10px; height: 200px;">
                            <!-- <div class="card-image activity-content-card-image-3" style="padding: 10px;">
                                <img src="{{ asset('images/icons_2/PEPPD.png') }}" height="150" alt="profil">
                            </div> -->
                            <div class="card-content black-text activity-content-card-content-3" style="text-align: center; padding: 25px;">
                                <span class="card-title activity-content-card-title-3" style="line-height: 20px; font-size: 22px;"><b style="font-weight: 700;">PROFIL</b></span>
                            </div>
                        </div>
                    </div>

                    <div class="col s6 m4 l4">
                        <div class="card activity-content-card-3 activity-content-card-hover" style="border-radius: 10px; height: 200px;">
                            <!-- <div class="card-image activity-content-card-image-3" style="padding: 10px;">
                                <img src="{{ asset('images/icons_2/pemantauan-min.png') }}" height="150" alt="pemantauan">
                            </div> -->
                            <div class="card-content black-text activity-content-card-content-3" style="text-align: center; padding: 25px;">
                                <span class="card-title activity-content-card-title-3" style="line-height: 130px; font-size: 34px;"><b style="font-weight: 700;">PEDOMAN</b></span>
                            </div>
                        </div>
                    </div>

                    <div class="col s6 m4 l4">
                        <div class="card activity-content-card-3 activity-content-card-hover" style="border-radius: 10px; height: 200px;">
                            <!-- <div class="card-image activity-content-card-image-3" style="padding: 10px;">
                                <img src="{{ asset('images/icons_2/Apps.png') }}" height="150" alt="apps">
                            </div> -->
                            <div class="card-content black-text activity-content-card-content-3" style="text-align: center; padding: 25px;">
                                <span class="card-title activity-content-card-title-3" style="line-height: 130px; font-size: 34px;"><b style="font-weight: 700;">APPS</b></span>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>

            </div>
        
        </div>

    </div>

</div>

@endsection

@push('script')
    <!-- End WOWSlider.com HEAD section -->
    <script type="text/javascript" src="{{ asset('engine1/jquery-3.5.1.js') }}"></script>

    <script type="text/javascript" src="{{ asset('engine1/wowslider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('engine1/script.js') }}"></script>
@endpush
