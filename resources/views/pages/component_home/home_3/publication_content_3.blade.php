{{-- author  : Muhamad Munawir Amin
Email        : muhamadmunawiramin@gmail.com
Last Update  : 3 Februari 2021 --}}

<div class="container" style="width: 100%;">
    <h6 class="menu-title" id="publication-content" style="text-align: left; position: absolute; margin-top: 0px;"><b><i class="tiny material-icons">bookmark</i> PUBLIKASI</b></h6>
    <h6 class="menu-title activity-content-title" id="activity-content" style="text-align: right;"><b><i class="tiny material-icons">list</i> LIHAT SEMUA</b></h6>
    <hr>
    <div class="row">

        <div class="col s12 m12 l12">
            <div class="card publication-list-content-card hoverable horizontal" style="border-radius: 10px 10px 10px 10px;">
                <div class="card-image publication-list-content-card-image">
                    <img src="{{ asset('images/icons_2/knowledge_sharing_final_book.png') }}" alt="Knowledge Sharing Pembangunan Daerah Praktik - Praktik Cerdas" style="min-width: 301px !important;">
                    {{-- <span class="card-title">Card Title</span> --}}
                </div>
                <div class="card-content publication-list-content-card-content" style="text-align: left; padding: 16px !important;">
                    <p>
                        <i style="font-size: 12px;">February 8, 2021</i>
                        <span class="new badge" data-badge-caption="" style="font-size: 12px;">Knowledge Sharing</span>
                    </p>
                    <h7 style="font-size: 13px;"><b>Knowledge Sharing Pembangunan Daerah Praktik - Praktik Cerdas</b></h7>
                    <p style="font-size: 12px;">Gaung pelaksanaan pembangunan daerah 2018 meninggalkan kesan kuat di pelosok negeri. Banyak media... <i><a href="{{ asset('documents/Knowledge_Sharing_Final_Book.pdf') }}" target="_blank" rel="noopener" title="Knowledge Sharing Pembangunan Daerah Praktik - Praktik Cerdas">selengkapnya</a></i></p><br>
                </div>
            </div>
        </div>

        <div class="col s12 m12 l12">
            <div class="card publication-list-content-card hoverable horizontal" style="border-radius: 10px 10px 10px 10px;">
                <div class="card-image publication-list-content-card-image">
                    <img src="{{ asset('images/icons_2/knowledge_sharing_final_book.png') }}" alt="Knowledge Sharing Pembangunan Daerah Praktik - Praktik Cerdas" style="min-width: 301px !important;">
                    {{-- <span class="card-title">Card Title</span> --}}
                </div>
                <div class="card-content publication-list-content-card-content" style="text-align: left; padding: 16px !important;">
                    <p>
                        <i style="font-size: 12px;">February 8, 2021</i>
                        <span class="new badge" data-badge-caption="" style="font-size: 12px;">Knowledge Sharing</span>
                    </p>
                    <h7 style="font-size: 13px;"><b>Knowledge Sharing Pembangunan Daerah Praktik - Praktik Cerdas</b></h7>
                    <p style="font-size: 12px;">Gaung pelaksanaan pembangunan daerah 2018 meninggalkan kesan kuat di pelosok negeri. Banyak media... <i><a href="{{ url('/publication/knowledge-sharing-pembangunan-daerah-praktik-praktik-cerdas') }}" target="_blank" rel="noopener" title="Knowledge Sharing Pembangunan Daerah Praktik - Praktik Cerdas">selengkapnya</a></i></p><br>
                </div>
            </div>
        </div>

        <div class="col s12 m12 l12">
            <div class="card publication-list-content-card hoverable horizontal" style="border-radius: 10px 10px 10px 10px;">
                <div class="card-image publication-list-content-card-image">
                    <img src="{{ asset('images/icons_2/knowledge_sharing_final_book.png') }}" alt="Knowledge Sharing Pembangunan Daerah Praktik - Praktik Cerdas" style="min-width: 301px !important;">
                    {{-- <span class="card-title">Card Title</span> --}}
                </div>
                <div class="card-content publication-list-content-card-content" style="text-align: left; padding: 16px !important;">
                    <p>
                        <i style="font-size: 12px;">February 8, 2021</i>
                        <span class="new badge" data-badge-caption="" style="font-size: 12px;">Knowledge Sharing</span>
                    </p>
                    <h7 style="font-size: 13px;"><b>Knowledge Sharing Pembangunan Daerah Praktik - Praktik Cerdas</b></h7>
                    <p style="font-size: 12px;">Gaung pelaksanaan pembangunan daerah 2018 meninggalkan kesan kuat di pelosok negeri. Banyak media... <i><a href="{{ asset('documents/Knowledge_Sharing_Final_Book.pdf') }}" target="_blank" rel="noopener" title="Knowledge Sharing Pembangunan Daerah Praktik - Praktik Cerdas">selengkapnya</a></i></p><br>
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
                $(".publication-card").addClass("horizontal");
            }else{
                $(".publication-card").removeClass("horizontal");
            }

        });

        $(window).on('resize', function() {
            
            var width = $(window).width();

            if (width > 767) {
                $(".publication-card").addClass("horizontal");
            }else{
                $(".publication-card").removeClass("horizontal");
            }

        });

        
        $(document).ready(function(){
            $("#publication_search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                // $(".publication-list-row").filter(function() {
                $(".publication-list-content-card").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

    </script>
@endpush