{{-- author  : Muhamad Munawir Amin
Email        : muhamadmunawiramin@gmail.com
Last Update  : 3 Februari 2021 --}}

<div class="container" style="width: 100%; margin-top: -2%;">
    <br>
    <h6 class="menu-title" id="publication-content" style="text-align: left; position: absolute;"><b><i class="tiny material-icons">bookmark</i> PUBLIKASI</b></h6>
    <h6 class="menu-title activity-content-title" id="activity-content" style="text-align: right;"><b><i class="tiny material-icons">list</i> LIHAT SEMUA</b></h6>
    <hr>
    <div class="row">

    @foreach($articles as $article)

        <div class="col s12 m12 l12">
            <div class="card publication-list-content-card hoverable horizontal" style="border-radius: 10px 10px 10px 10px;">
                <div class="card-image publication-list-content-card-image">
                    <img src="{{ asset('images/summernote/'.$article->slug.'/'.$article->title_picture) }}" width="400" height="215" alt="{{ $article->title }}" style="min-width: 400px !important;">
                    {{-- <span class="card-title">Card Title</span> --}}
                </div>
                <div class="card-content publication-list-content-card-content" style="text-align: left; padding: 16px !important;">
                    <p>
                        <i>{{ $article->created_at->diffForHumans() }}</i>
                        <span class="new badge" data-badge-caption="">{{ $article->category->name }}</span>
                    </p>
                    <h6><b>{{ $article->title }}</b></h6>
                    <p>{{ Str::limit($article->description, 130) }}<i><a target="_blank" rel="noopener" href="{{ url('publication/'.$article->slug) }}" title="{{ $article->title }}">selengkapnya</a></i></p><br>
                </div>
            </div>
        </div>

    @endforeach

    <div class="right">
        {{ $articles->links('vendor.pagination.materializecss') }}
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

        {{-- https://www.youtube.com/watch?v=aYn-K47ZfBw --}}
        {{-- $(document).ready(function() {
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                alert(page);
            })
        }); --}}

    </script>
@endpush