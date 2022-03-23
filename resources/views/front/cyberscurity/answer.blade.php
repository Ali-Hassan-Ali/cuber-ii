@extends('front.parent')
@section('content')
<section class="blog_area single-post-area section_gap" style="margin-top: 10%;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post row">


                    <div class="col-lg-9 col-md-9 blog_details">
                        {{-- <h2>{{ $item->title }}</h2> --}}
                        <p class="excert">
                            {{-- {{ $item->description }} --}}
                        </p>
                        
                        {{ $data_count }} / {{ $answe_count }}
                        
                    </div>

                </div>
                <hr>


            </div>
        </div>
    </div>
</section>
@endsection
