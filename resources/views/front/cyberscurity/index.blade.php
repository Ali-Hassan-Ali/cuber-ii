@extends('front.parent')
@section('content')
<section class="blog_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog_left_sidebar">

                    @forelse ($items as $item)
                    <article class="row blog_item">
                      <div class="col-md-3">

                      </div>
                       <div class="col-md-9">
                            <br><br>
                            <h2>
                                @switch($item->pages)
                                @case(1)
                                    {{ "level one" }}
                                    @break
                            @case(2)
                                {{ "level two" }}
                                @break
                            @case(3)
                                {{ "level three" }}
                                @break

                                @default

                            @endswitch
                            </h2>


                            <br><br>
                           <div class="blog_post">

                              <a href=""><img src="{{ asset('/uploads/cover_img/'.$item->cover_img) }}" style="width: 600px"  class="img-thumbnail" alt="">


                          </a>
                          <h1>{{ $item->id }}</h1>
                          @php
                              $count = \App\Models\Rating::where('cybersecurity_id', $item->id)->latest()->first();
                          @endphp
                          
                          @if ($count == null)

                              @for ($i = 1; $i < 6; $i++)
                                  
                                <span class="fa fa-star" data-count="{{ $i }}" data-id="{{ $item->id }}" data-user-id="{{ auth()->id() }}"></span>

                              @endfor
                              
                          @else

                              @for ($i = 1; $i < 6; $i++)
                                  
                                <span class="fa fa-star {{ $count->count >= $i ? 'checked' : '' }}" data-count="{{ $i }}" data-id="{{ $item->id }}" data-user-id="{{ auth()->id() }}"></span>

                              @endfor

                          @endif

                           <div class="my-rating"></div>
                                   <a href="#"><h2>{{ $item->title }}</h2></a>
                                   {{-- @for ($i = 0; $i < $item->rating; $i++)
                                       <i class="fa fa-star"></i>
                                   @endfor --}}
                                   <p>{{ $item->description }}.</p>
                                   @php
                                       $AnswerQuestionCount = App\Models\AnswerQuestion::where('level_id', $item->id)
                                                                ->where('user_id',auth()->id())->get();

                                            $totle = 0;

                                            if ($AnswerQuestionCount) {

                                                $answers     = App\Models\AnswerQuestion::where('level_id',$item->id)->pluck('answer_id')->unique();
                                                $answe_count = App\Models\Answer::whereIn('id', $answers)->where('answer_question_id',1)->count();

                                                $question_id = App\Models\AnswerQuestion::where('level_id',$item->id)->pluck('question_id')->unique();
                                                $data_count = App\Models\Question::with('answers')->whereIn('id',$question_id)->count();

                                                $totle = $data_count . '/' . $answe_count;

                                            }//end of if
                                   @endphp
                                   <p>{{ auth()->user()->name }} : {{ $totle }}</p>
                                   @if ($totle == 0)
                                   <a href="{{ route('cyberDetails',$item->id) }}" class="primary_btn"><span>View More</span></a>
                                   @else
                                   <p class="btn btn-success ">completed  </p>
                                   @endif
                               </div>
                           </div>
                       </div>
                   </article>
                      @empty
                      <h3 style="text-align: center">No Data Found</h3>
                  @endforelse

                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            <li class="page-item">


                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </div>
</section>
@endsection
