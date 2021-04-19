{{-- author  : Muhamad Munawir Amin
Email        : muhamadmunawiramin@gmail.com
Last Update  : 3 Februari 2021 --}}

@push('style')
    <link
      href="{{ asset('css/hardcode/guide_content.css') }}"
      type="text/css"
      rel="stylesheet"
      media="screen,projection"
    />
@endpush

<div class="container" style="width: 100%;">
    <h6 class="menu-title" id="publication-content" style="text-align: left; position: absolute; margin-top: 0;"><b><i class="tiny material-icons">bookmark</i> PETUNJUK</b></h6>
    <h6 class="menu-title activity-content-title" id="activity-content" style="text-align: right;"><b><i class="tiny material-icons">list</i> LIHAT SEMUA</b></h6>
    <hr>
    <div class="row">

        <div class="col s12 m6 l4">
            <div class="card guide-list-content-card hoverable" style="border-radius: 10px 10px 10px 10px;">
                <div class="card-image guide-list-content-card-image" style="background-color: #1F3984;">
                    <img src="{{ asset('images/icons_2/pedoman_sistem_ppd_pengguna_daerah_provinsi.png') }}" alt="Pedoman Sistem PPD Pengguna Daerah (provinsi)">
                    <div class="overlay">
                        <a href="#" class="icon" title="Download Pedoman Sistem PPD Pengguna Daerah (provinsi)">
                            <i class="fa fa-download"></i>
                        </a>
                    </div>
                </div>
                <div class="card-content guide-list-content-card-content" style="text-align: center; font-size: 13px; padding: 13px;">
                    <p><b>Pedoman Sistem PPD Pengguna Daerah (provinsi)</b></p>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l4">
            <div class="card guide-list-content-card hoverable" style="border-radius: 10px 10px 10px 10px;">
                <div class="card-image guide-list-content-card-image" style="background-color: #1F3984;">
                    <img src="{{ asset('images/icons_2/pedoman_sistem_ppd_pengguna_daerah_provinsi.png') }}" alt="Pedoman Sistem PPD Pengguna Daerah (provinsi)">
                    <div class="overlay">
                        <a href="#" class="icon" title="Download Pedoman Sistem PPD Pengguna Daerah (provinsi)">
                            <i class="fa fa-download"></i>
                        </a>
                    </div>
                </div>
                <div class="card-content guide-list-content-card-content" style="text-align: center; font-size: 13px; padding: 13px;">
                    <p><b>Pedoman Sistem PPD Pengguna Daerah (provinsi)</b></p>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l4">
            <div class="card guide-list-content-card hoverable" style="border-radius: 10px 10px 10px 10px;">
                <div class="card-image guide-list-content-card-image" style="background-color: #1F3984;">
                    <img src="{{ asset('images/icons_2/pedoman_sistem_ppd_pengguna_daerah_provinsi.png') }}" alt="Pedoman Sistem PPD Pengguna Daerah (provinsi)">
                    <div class="overlay">
                        <a href="#" class="icon" title="Download Pedoman Sistem PPD Pengguna Daerah (provinsi)">
                            <i class="fa fa-download"></i>
                        </a>
                    </div>
                </div>
                <div class="card-content guide-list-content-card-content" style="text-align: center; font-size: 13px; padding: 13px;">
                    <p><b>Pedoman Sistem PPD Pengguna Daerah (provinsi)</b></p>
                </div>
            </div>
        </div>

    </div>
</div>

@push('script')
    <script>

        $(document).ready(function(){
            $("#guide_search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".guide-list-row").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

    </script>
@endpush