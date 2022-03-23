@extends('cms.parent')
@section('title','answer create')
@section('page-big-title','answer')
@section('page-main-title','answer')
@section('page-sub-title','create')
@section('styles')

@endsection
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">answer Create</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @php
                        $answers = ['anser 1','answer 2','answer 3','answer 4'];
                    @endphp
                    <form method="POST" action="{{ route('admin.answers.store') }}">
                        @csrf
                        @method('post')

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Titel of Questions </label>
                                <select name="question_id" class="form-control" required id="question_id">
                                    <option value="">select the Question</option>
                                    @foreach ($items as $item)
                                    @if ($item->answers_count > 0)
                                        
                                    @else
                                        <option value="{{ $item->id }}">
                                            {{ $item->question }}
                                            {{-- {{ $item->answers_count }} --}}
                                        </option>

                                    @endif
                                    @endforeach
                                </select>
                            </div>

                            @foreach ($answers as $key=> $answe)

                            <div class="form-group">
                                <label for="name">{{ $answe }}</label>
                                <div class="form-check">
                                    <input type="radio" name="answer_question_id" id="gridRadios1" value="{{ $key }}">
                                    <label for="gridRadios1" class="text-success">Success</label>
                                </div>
                                <input type="text" class="form-control" name="answers[]" required placeholder="Enter Answer">
                            </div>
                                
                            @endforeach

                        <div class="card-footer">
                            <button class="btn btn-primary">Submit</button>
                            {{-- <a href="#" onclick="questionstore()" class="btn btn-info">submit</i></a> --}}

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

@endsection
@section('scripts')

<script type="text/javascript">
    $(document).ready(function() {
        
        // alert('aSome');

    });
</script>

<script>
    function questionstore() {
    let formData = new FormData();
        formData.append('answer',document.getElementById('answer').value);
        formData.append('question_id',document.getElementById('question_id').value);

        store('/admin/answers', formData),'/admin/answers/create';

}
</script>
@endsection
