@extends('front.parent')
@section('content')
<section class="blog_area single-post-area section_gap" style="margin-top: 10%;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post row">

                    <div class="col-lg-12">
                        <div class="feature-img">
                            <iframe width="750" height="400" src=" {{ $item->video }}" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>

                    <div class="col-lg-9 col-md-9 blog_details">
                        <h2>{{ $item->title }}</h2>
                        <p class="excert">
                            {{ $item->description }}
                        </p>
                        @for ($i = 0; $i < $item->rating; $i++)
                            <i class="fa fa-star"></i>
                        @endfor
                    </div>

                </div>
                <hr>
                <div>
                    <h4 class="text-center">questions</h4>
                    <form method="POST" action="{{ route('answer_to') }}">
                        @csrf
                    <div class="media-body">
                        @foreach ($questionss as $question)
                        <a>
                            <h3>{{ $question->question }}</h3>
                            <input type="number" name="question_id[]" value="{{ $question->id }}" hidden>
                            <input type="number" name="user_id" value="{{ auth()->id() }}" hidden>
                            <input type="number" name="iid" value="{{ $iid }}" hidden>
                        </a>
                        <ol>
                            @foreach ($question->answers  as $answer)
                                
                                <li>
                                    <input type="radio" id="vehicle1" name="answer_id[{{ $question->id }}]" value="{{ $answer->id }}" required> 
                                    {{ $answer->answer }}
                                </li>

                            @endforeach
                        </ol>
                        @endforeach

                    </div>

                        @if ($questions->count() > 0)
                            <button class="btn btn-primary">Next</button>
                        @else
                            <input type="number" name="iid" value="{{ $iid }}" hidden>
                            <input type="number" name="ii" value="{{ $iid }}" hidden>
                            <button class="btn btn-primary">finish</button>
                        @endif
                        {{-- <button class="btn btn-black">Back</button> --}}
                    </form>
                    {{-- {{ $questions->appends(request()->query())->links() }} --}}
                </div>





            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">


                    <aside class="single_sidebar_widget popular_post_widget div-scroll-news" style="word-wrap: break-word;">
                        <h3 class="">Comments</h3>
                        @foreach ($comments as  $comment)
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">

                                <div class="desc">
                                    <h5><a href="#"><p >{{ $comment->user->name }}</p></a></h5>
                                    <p class="comment" >
                                        {{ $comment->comment }} <br>
                                    <p class="date"> {{ $comment->created_at->format('y/m/d') }}

                                    </p>
                                </div>
                            </div>

                        </div>
                    @endforeach

                        <div class="br"></div>

                    </aside>
                    <div class="comment-form">
                        <h4>Leave a Comments</h4>
                        <form action="{{ route('addComment') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control mb-10" rows="5" name="comment" placeholder="Comment" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                            </div>

                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            {{--  <input type="hidden" name="grc_id" value="{{ $item->id }}">  --}}
                            <input type="hidden" name="cybersecurity_id" value="{{ $item->id }}">
                            <button  class="primary-btn primary_btn mycomment_button" ><span>Post Comment</span></button>

                        </form>
                    </div>


                </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
