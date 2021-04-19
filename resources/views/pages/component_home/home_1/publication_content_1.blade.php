{{-- author  : Muhamad Munawir Amin
Email        : muhamadmunawiramin@gmail.com
Last Update  : 3 Februari 2021 --}}


<div class="container" style="width: 90%;">
    <h5 class="menu-title" id="publication-content" style="text-align: center;"><b>-PUBLIKASI-</b></h5>
    <div style="background-color: #b7c6ca; margin-top: 1%; border-radius: 15px 15px 15px 15px;">
        <div class="row">

            <div class="col s4 m4" style="padding: 10px;">
                <div class="card publication-card hoverable horizontal">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="{{ asset('images/sample-1.jpg') }}" alt="sample">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Knowledge Sharing '19<!-- <i class="material-icons right">more_vert</i> --></span>
                        <!-- <p><a href="#">This is a link</a></p> -->
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Knowledge Sharing '19<i class="material-icons right">close</i></span>
                        <p>
                            Hasil dari penghargaan kami sajikan dalam bentuk buku yang mudah dibaca.
                            <a class="waves-effect waves-light btn btn-small" style="color:white;">Selengkapnya<i class="material-icons right">format_align_left</i></a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col s4 m4" style="padding: 10px;">
                <div class="card publication-card hoverable horizontal">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="{{ asset('images/sample-1.jpg') }}" alt="sample">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Knowledge Sharing '19<!-- <i class="material-icons right">more_vert</i> --></span>
                        <!-- <p><a href="#">This is a link</a></p> -->
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Knowledge Sharing '19<i class="material-icons right">close</i></span>
                        <p>
                            Hasil dari penghargaan kami sajikan dalam bentuk buku yang mudah dibaca.
                            <a class="waves-effect waves-light btn btn-small" style="color:white;">Selengkapnya<i class="material-icons right">format_align_left</i></a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col s4 m4" style="padding: 10px;">
                <div class="card publication-card hoverable horizontal">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="{{ asset('images/sample-1.jpg') }}" alt="sample">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Knowledge Sharing '19<!-- <i class="material-icons right">more_vert</i> --></span>
                        <!-- <p><a href="#">This is a link</a></p> -->
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Knowledge Sharing '19<i class="material-icons right">close</i></span>
                        <p>
                            Hasil dari penghargaan kami sajikan dalam bentuk buku yang mudah dibaca.
                            <a class="waves-effect waves-light btn btn-small" style="color:white;">Selengkapnya<i class="material-icons right">format_align_left</i></a>
                        </p>
                    </div>
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