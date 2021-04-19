{{-- author  : Muhamad Munawir Amin
Email   : muhamadmunawiramin@gmail.com
Date    : 29 January 2021 --}}


@push('style')
    <!-- Start WOWSlider.com HEAD section -->
    <link 
      rel="stylesheet" 
      type="text/css" 
      href="{{ asset('engine1/style.css') }}" 
    />
@endpush


<!-- Start WOWSlider.com BODY section -->
<div id="wowslider-container1">
    <div class="ws_images">
        <ul>
            <li><img src="{{ asset('data1/images/carousel/carousel_1_1min.png') }}" alt="Penghargaan Pembangunan Daerah" title="Penghargaan Pembangunan Daerah" id="wows1_0"/></li>
            <li><a href="http://wowslider.com"><img src="{{ asset('data1/images/carousel/carousel_2_1min.png') }}" alt="Penyerahan Piala Penghargaan Pembangunan Daerah 2019 Oleh Presiden RI" title="Penyerahan Piala Penghargaan Pembangunan Daerah 2019 Oleh Presiden RI" id="wows1_1"/></a></li>
            <li><img src="{{ asset('data1/images/carousel/carousel_3_1min.png') }}" alt="Penghargaan Pembangunan Daerah" title="Penghargaan Pembangunan Daerah" id="wows1_2"/></li>
            <li><img src="{{ asset('data1/images/carousel/carousel_4_1min.png') }}" alt="Pemantauan Pembangunan Daerah" title="Pemantauan Pembangunan Daerah" id="wows1_2"/></li>
            <li><img src="{{ asset('data1/images/carousel/carousel_5_1min.png') }}" alt="Evaluasi Pembangunan Daerah" title="Evaluasi Pembangunan Daerah" id="wows1_2"/></li>
            <li><img src="{{ asset('data1/images/carousel/carousel_6_1min.png') }}" alt="BAPPENAS RI" title="BAPPENAS RI" id="wows1_2"/></li>
        </ul>
    </div>
    <div class="ws_bullets">
        <div>
            <a href="http://wowslider.com" title="Penghargaan Pembangunan Daerah"><span><img src="{{ asset('data1/tooltips/carousel/carousel_1_1min.png') }}" alt="Penghargaan Pembangunan Daerah" title="Penghargaan Pembangunan Daerah"/>1</span></a>
            <a href="http://wowslider.com" title="Penyerahan Piala Penghargaan Pembangunan Daerah 2019 Oleh Presiden RI"><span><img src="{{ asset('data1/tooltips/carousel/carousel_2_1min.png') }}" alt="Penyerahan Piala Penghargaan Pembangunan Daerah 2019 Oleh Presiden RI" title="Penyerahan Piala Penghargaan Pembangunan Daerah 2019 Oleh Presiden RI"/>2</span></a>
            <a href="http://wowslider.com" title="BAPPENAS RI"><span><img src="{{ asset('data1/tooltips/carousel/carousel_3_1min.png') }}" alt="Penghargaan Pembangunan Daerah" title="Penghargaan Pembangunan Daerah"/>3</span></a>
            <a href="http://wowslider.com" title="BAPPENAS RI"><span><img src="{{ asset('data1/tooltips/carousel/carousel_4_1min.png') }}" alt="Pemantauan Pembangunan Daerah" title="Pemantauan Pembangunan Daerah"/>4</span></a>
            <a href="http://wowslider.com" title="BAPPENAS RI"><span><img src="{{ asset('data1/tooltips/carousel/carousel_5_1min.png') }}" alt="Evaluasi Pembangunan Daerah" title="Evaluasi Pembangunan Daerah"/>5</span></a>
            <a href="http://wowslider.com" title="BAPPENAS RI"><span><img src="{{ asset('data1/tooltips/carousel/carousel_6_1min.png') }}" alt="BAPPENAS RI" title="BAPPENAS RI"/>6</span></a>
        </div>
    </div>
    {{-- <div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.com/vi">carousel jquery</a> by WOWSlider.com v7.8</div> --}}
    <div class="ws_shadow"></div>
</div>
<!-- End WOWSlider.com BODY section -->


@push('script')
    <!-- End WOWSlider.com HEAD section -->
    <script type="text/javascript" src="{{ asset('engine1/jquery-3.5.1.js') }}"></script>

    <script type="text/javascript" src="{{ asset('engine1/wowslider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('engine1/script.js') }}"></script>
@endpush