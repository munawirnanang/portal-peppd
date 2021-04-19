{{-- author  : Muhamad Munawir Amin
Email        : muhamadmunawiramin@gmail.com
Last Update  : 17    Februari 2021 --}}

@extends('pages.component_publication.publication_index')

@section('publication')

<div class="container publication-article-container" style="width: 100%;">
    {{-- <h5 class="menu-title publication-article-title" id="publication-article" style="text-align: center;"><b>Sharing Knowledge </b></h5> --}}
        
    <div class="row container">
        <div class="card-panel white" style="width: 100%; display: flex;">
            <span class="black-text">
                {{-- <h5 style="text-align: center; font-size: 1.2rem"><b>Knowledge Sharing Pembangunan Daerah Praktik - Praktik Cerdas</b></h5> --}}
                <hr>
                <div class="col s12 m12 l6" style="float: right;">
                    <img src="{{ asset('images/summernote/'.$article->slug.'/'.$article->title_picture) }}" width="375" height="250" alt="article" style="width: 100%;">
                </div>
                <div class="col s12 m12 l6" style="text-align: justify;">
                    <p>
                        <i>{{ $article->created_at->format("F d, Y") }}</i>
                        <span class="new badge blue" data-badge-caption="">{{ $article->category->name }}</span>
                    </p>
                    <h5 style="text-align: left; font-size: 2rem">{{ $article->title }}</h5>
                    {{-- <p>Direktorat Pemantauan, Evaluasi, dan Pengendalian Pembangunan Daerah mempunyai tugas melaksanakan perumusan kebijakan perencanaan dan penyusunan kebijakan teknis, pemantauan, evaluasi, dan pengendalian serta penilaian atas capaian hasil kinerja pembangunan daerah.</p> --}}
                    <br>
                    <p>
                        <a href=""><span class="new badge" data-badge-caption="" style="float: left; background-color: #1877F2; margin-left: 0;"><i class="fa fa-facebook-official"></i> Share on Facebook</span></a>
                        <a href=""><span class="new badge" data-badge-caption="" style="float: left; background-color: #1B95E0;"><i class="fa fa-twitter"></i> Share on Twitter</span></a>
                    </p>
                </div>
                <div class="col s12 m12 l12" style="text-align: justify;">
                    <hr>
                    {!! $article->text !!}
                </div>
            </span>
        </div>
    </div>

</div>

@endsection