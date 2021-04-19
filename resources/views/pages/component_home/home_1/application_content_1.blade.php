{{-- author  : Muhamad Munawir Amin
Email        : muhamadmunawiramin@gmail.com
Last Update  : 3 Februari 2021 --}}

@push('style')
    <link
      href="{{ asset('css/hardcode/application_content.css') }}"
      type="text/css"
      rel="stylesheet"
      media="screen,projection"
    />
@endpush

<div class="container application-content-container" style="width: 70%;">
    <h5 class="menu-title application-content-title" id="application-content" style="text-align: center;"><b>-APLIKASI-</b></h5>

    <div class="row">
        
        <div class="col s4 m4">
            <div class="card application-content-card hoverable" style="border-radius: 10px 10px 10px 10px;">
                <div class="card-image application-content-card-image" style="background-color: #1F3984;">
                    <img src="{{ asset('images/icons_2/penilaian_ppd.png') }}" alt="Login Sistem Penilaian">
                    {{-- <span class="card-title"><b>PEPPD</b></span> --}}
                </div>
                <div class="card-content application-content-card-content" style="text-align: center;">
                    <p>LOGIN SISTEM PENILAIAN</p>
                </div>
            </div>
        </div>

        <div class="col s4 m4">
            <div class="card application-content-card hoverable" style="border-radius: 10px 10px 10px 10px;">
                <div class="card-image application-content-card-image">
                    <img src="{{ asset('images/icons_2/penilaian_ppd.png') }}" alt="Login Sistem Penilaian">
                    <div class="overlay">
                        <a href="#" class="icon" title="Login Sistem Penilaian">
                            <i class="fa fa-external-link"></i>
                        </a>
                    </div>
                </div>
                <div class="card-content application-content-card-content" style="text-align: center;">
                    <p>LOGIN SISTEM PENILAIAN</p>
                </div>
            </div>
        </div>

        <div class="col s4 m4">
            <div class="card application-content-card hoverable" style="border-radius: 10px 10px 10px 10px;">
                <div class="card-image application-content-card-image">
                    <img src="{{ asset('images/icons_2/penilaian_ppd.png') }}" alt="Login Sistem Penilaian">
                </div>
                <div class="card-content application-content-card-content" style="text-align: center;">
                    <p>LOGIN SISTEM PENILAIAN</p>
                </div>
            </div>
        </div>
        
    </div>

</div>
