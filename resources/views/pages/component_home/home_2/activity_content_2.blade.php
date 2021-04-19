{{-- author  : Muhamad Munawir Amin
Email        : muhamadmunawiramin@gmail.com
Last Update  : 3 Februari 2021 --}}

@push('style')
    <link
      href="{{ asset('css/hardcode/activity_content.css') }}"
      type="text/css"
      rel="stylesheet"
      media="screen,projection"
    />
@endpush

<div class="container activity-content-container-2" style="width: 80%;">
    <h6 class="menu-title activity-content-title" id="activity-content" style="text-align: left;"><b><i class="tiny material-icons">local_activity</i> KEGIATAN</b></h6>
    <hr>
    <div class="row">

        <div class="col s6 m6 l6">
            {{-- <div class="card blue-grey darken-1 activity-content-card-2 activity-content-card-hover" style="border-radius: 10px;"> --}}
            <a href="{{ url('/penghargaan') }}">
                <div class="card activity-content-card-2 activity-content-card-hover" style="border-radius: 10px;">
                    <div class="card-image activity-content-card-image-2" style="padding: 55px; padding-top: 5%; padding-bottom: 5%">
                        <img src="{{ asset('images/icons_2/ppd-min.png') }}" alt="ppd">
                        {{-- <span class="card-title">Card Title</span> --}}
                    </div>
                    <div class="card-content black-text activity-content-card-content-2" style="text-align: center; padding: 5%;">
                        <span class="card-title activity-content-card-title-2" style="line-height: 20px; font-size: 13px;"><b style="font-weight: 500;">PENGHARGAAN PEMBANGUNAN DAERAH</b></span>
                        {{-- <p>I am a very simple card. I am good at containing small bits of information.
                        I am convenient because I require little markup to use effectively.</p> --}}
                    </div>
                    {{-- <div class="card-action">
                        <a href="#">This is a link</a>
                        <a href="#">This is a link</a>
                    </div> --}}
                </div>
            </a>
        </div>

        <div class="col s6 m6 l6">
            <div class="card activity-content-card-2 activity-content-card-hover" style="border-radius: 10px;">
                <div class="card-image activity-content-card-image-2" style="padding: 55px; padding-top: 5%; padding-bottom: 5%">
                    <img src="{{ asset('images/icons_2/pemantauan-min.png') }}" alt="pemantauan">
                </div>
                <div class="card-content black-text activity-content-card-content-2" style="text-align: center; padding: 5%;">
                    <span class="card-title activity-content-card-title-2" style="line-height: 20px; font-size: 13px;"><b style="font-weight: 500;">PEMANTAUAN PEMBANGUNAN DAERAH</b></span>
                </div>
            </div>
        </div>

        <div class="col s6 m6 l6">
            <div class="card activity-content-card-2 activity-content-card-hover" style="border-radius: 10px;">
                <div class="card-image activity-content-card-image-2" style="padding: 55px; padding-top: 5%; padding-bottom: 5%">
                    <img src="{{ asset('images/icons_2/epd-min.png') }}" alt="epd">
                </div>
                <div class="card-content black-text activity-content-card-content-2" style="text-align: center; padding: 5%;">
                    <span class="card-title activity-content-card-title-2" style="line-height: 20px; font-size: 13px;"><b style="font-weight: 500;">EVALUASI PEMBANGUNAN DAERAH</b></span>
                </div>
            </div>
        </div>

        <div class="col s6 m6 l6">
            <div class="card activity-content-card-2 activity-content-card-hover" style="border-radius: 10px;">
                <div class="card-image activity-content-card-image-2" style="padding: 55px; padding-top: 5%; padding-bottom: 20%">
                    <img src="{{ asset('images/icons_2/koordinasi_pembangunan-min.png') }}" alt="Koordinasi">
                </div>
                <div class="card-content black-text activity-content-card-content-2" style="text-align: center; padding: 5%;">
                    <span class="card-title activity-content-card-title-2" style="line-height: 20px; font-size: 13px;"><b style="font-weight: 500;">KOORDINASI PEMBANGUNAN</b></span>
                </div>
            </div>
        </div>

  </div>
</div>


@push('script')
    <script>
        $(document).ready(function(){

            var width = $(window).width();

            if (width > 767) {
                $(".activity-content-card").addClass("horizontal");
            }else{
                $(".activity-content-card").removeClass("horizontal");
            }

        });

        $(window).on('resize', function() {
            
            var width = $(window).width();

            if (width > 767) {
                $(".activity-content-card").addClass("horizontal");
            }else{
                $(".activity-content-card").removeClass("horizontal");
            }

        });
    </script>
@endpush


