{{-- author  : Muhamad Munawir Amin
Email        : muhamadmunawiramin@gmail.com
Last Update  : 8 Februari 2021 --}}

@extends('pages.component_publication.publication_index')

@section('publication')

<div class="container publication-list-content-container" style="width: 80%;">
    <h5 class="menu-title publication-list-content-title" id="publication-list-content" style="text-align: center;"><b>-PUBLIKASI-</b></h5>

    <div class="row container">
        {{-- <form class="col s12"> --}}
            <div class="row">
                <div class="input-field col s12 right">
                    <i class="material-icons prefix">search</i>
                    <input id="publication_search" type="text" class="validate">
                    <label for="publication_search">Cari Publikasi...</label>
                </div>
            </div>
        {{-- </form> --}}
    </div>
    
    <div class="row publication-list-row">

        <h6 style="padding: 10px;"><b>2020</b></h6>
        
        @foreach($articles as $article)

            <div class="col s12 m12 l12">
                <div class="card publication-list-content-card hoverable horizontal" style="border-radius: 10px 10px 10px 10px;">
                    <div class="card-image publication-list-content-card-image">
                        <img src="{{ asset('images/summernote/'.$article->slug.'/'.$article->title_picture) }}" width="300" height="175" alt="{{ $article->title }}" style="min-width: 300px !important;">
                        {{-- <span class="card-title">Card Title</span> --}}
                    </div>
                    <div class="card-content publication-list-content-card-content" style="text-align: left; padding: 16px !important;">
                        <p>
                            {{-- <i>{{ $article->created_at->format("F d, Y") }}</i> --}}
                            <i>{{ $article->created_at->diffForHumans() }}</i>
                            <span class="new badge" data-badge-caption="">{{ $article->category->name }}</span>
                        </p>
                        <h6><b>{{ $article->title }}</b></h6>
                        <p>{{ Str::limit($article->description, 130) }} <i><a target="_blank" rel="noopener" href="{{ url('publication/'.$article->slug) }}" title="{{ $article->title }}">selengkapnya</a></i></p><br>
                    </div>
                </div>
            </div>

        @endforeach
        
    </div>

    <div class="row publication-list-row">

        <h6 style="padding: 10px;"><b>2019</b></h6>

        <div class="col s12 m12 l12">
            <div class="card publication-list-content-card hoverable horizontal" style="border-radius: 10px 10px 10px 10px;">
                <div class="card-image publication-list-content-card-image">
                    <img src="{{ asset('images/icons_2/knowledge_sharing_final_book.png') }}" alt="Knowledge Sharing Pembangunan Daerah Praktik - Praktik Cerdas" style="min-width: 300px !important;">
                    {{-- <span class="card-title">Card Title</span> --}}
                </div>
                <div class="card-content publication-list-content-card-content" style="text-align: left; padding: 16px !important;">
                    <p>
                        <i>February 5, 2021</i>
                        <span class="new badge blue" data-badge-caption="">Dokumentasi</span>
                    </p>
                    <h6><b>Knowledge Sharing Pembangunan Daerah Praktik - Praktik Cerdas</b></h6>
                    <p>Gaung pelaksanaan pembangunan daerah 2018 meninggalkan kesan kuat di pelosok negeri. 
                    Banyak media cetak maupun <i>on-line</i> mengabarkan... <i><a href="{{ asset('documents/Knowledge_Sharing_Final_Book.pdf') }}" target="_blank" rel="noopener" title="Knowledge Sharing Pembangunan Daerah Praktik - Praktik Cerdas">selengkapnya</a></i></p><br>
                </div>
            </div>
        </div>
        
    </div>

</div>

@endsection


@push('script')
    <script>
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