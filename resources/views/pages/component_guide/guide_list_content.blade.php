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

<div class="container guide-list-content-container" style="width: 100%;">
    <h5 class="menu-title guide-list-content-title" id="guide-list-content" style="text-align: center;"><b>-PEDOMAN-</b></h5>

    <div class="row container">
        {{-- <form class="col s12"> --}}
            <div class="row">
                <div class="input-field col s12 right">
                    <i class="material-icons prefix">search</i>
                    <input id="guide_search" type="text" class="validate">
                    <label for="guide_search">Cari Pedoman...</label>
                </div>
            </div>
        {{-- </form> --}}
    </div>
        

    <div class="row guide-list-row">

        <!-- <h6 style="padding: 10px;"><b>Penghargaan Pembangunan Daerah</b></h6> -->
        
        @foreach($list_guides as $list)
        <div class="col s12 m6 l4">
            <div class="card guide-list-content-card hoverable" style="border-radius: 10px 10px 10px 10px;">
                <div class="card-image guide-list-content-card-image" style="background-color: #1F3984;">
                    <img src="{{ asset('file_guide/'.Str::slug($list->name, '-').'/'.$list->title_picture) }}" alt="{{ $list->name }}">
                    {{-- <span class="card-title"><b>PEPPD</b></span> --}}
                    <div class="overlay">
                        <a href="#" class="icon" title="{{ $list->name }}">
                            <i class="fa fa-download"></i>
                        </a>
                    </div>
                </div>
                <div class="card-content guide-list-content-card-content" style="text-align: center;">
                    <p>{{ $list->name }}</p>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>

    <!-- <div class="row guide-list-row">

        <h6 style="padding: 10px;"><b>Pemantauan Pembangunan Daerah</b></h6>
        
        <div class="col s12 m6 l4">
            <div class="card guide-list-content-card hoverable" style="border-radius: 10px 10px 10px 10px;">
                <div class="card-image guide-list-content-card-image" style="background-color: #1F3984;">
                    <img src="{{ asset('images/icons_2/pedoman_pelaksanaan_ppd_2021.png') }}" alt="Pedoman Pelaksanaan PPD 2021">
                    {{-- <span class="card-title"><b>PEPPD</b></span> --}}
                    <div class="overlay">
                        <a href="#" class="icon" title="Download Pedoman Pelaksanaan PPD 2021">
                            <i class="fa fa-download"></i>
                        </a>
                    </div>
                </div>
                <div class="card-content guide-list-content-card-content" style="text-align: center;">
                    <p>PEDOMAN PELAKSANAAN PPD 2021</p>
                </div>
            </div>
        </div>

    </div> -->

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