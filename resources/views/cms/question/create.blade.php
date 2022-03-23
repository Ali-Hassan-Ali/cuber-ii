@extends('cms.parent')
@section('title','questions create')
@section('page-big-title','questions')
@section('page-main-title','questions')
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
                        <h3 class="card-title">questions Create</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create-form">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Titel of Questions </label>
                                <select class="form-control" name="" id="cybersecurity_id">
                                    <option value="">select the title</option>
                                    @foreach ($items as $item )
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Guestion </label>
                                <input type="text" class="form-control"id="question" placeholder="Enter question ">
                            </div>


                        <div class="card-footer">
                            {{-- <button type="button" onclick="store()" class="btn btn-primary">Submit</button> --}}

                            <a href="#" onclick="questionstore()" class="btn btn-info">submit</i></a>

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

<script>
    function questionstore() {
    let formData = new FormData();
        formData.append('question',document.getElementById('question').value);
        formData.append('cybersecurity_id',document.getElementById('cybersecurity_id').value);

        store('/admin/questions', formData),'/admin/questions/create';

}
</script>
@endsection
