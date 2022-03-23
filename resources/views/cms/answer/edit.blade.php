@extends('cms.parent')
@section('title','cybersecurtiy edit')
@section('page-big-title','cybersecurtiy')
@section('page-main-title','cybersecurtiys')
@section('page-sub-title','edit')
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
                        <h3 class="card-title">cybersecurtiy edit</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create-form">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Level </label>
                                <select class="form-control" name="" id="pages">
                                    <option value="">select the level</option>
                                    <option value="1" {{ $cybersecurity->level == 1 ? 'selected': ' ' }}</option>level one</option>
                                    <option value="2"  {{ $cybersecurity->level == 2 ? 'selected': ' ' }}>level two</option>
                                    <option value="3"  {{ $cybersecurity->level == 3 ? 'selected': ' ' }}>level three</option>



                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">title </label>
                                <input type="text" class="form-control" value="{{ $cybersecurity->title }}" id="title" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" id="description" rows="3"
                                    placeholder="Enter Descriptions ...">{{ $cybersecurity->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="name">Vedio URL </label>
                                <input type="text" class="form-control" value="{{ $cybersecurity->video }}" id="video" placeholder="Enter Video url">
                            </div>
                        </div>

                        <div class="card-footer">
                            {{-- <button type="button" onclick="store()" class="btn btn-primary">Submit</button> --}}

                            <a href="#" onclick=" performEdit()" class="btn btn-info">submit</i></a>

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


function performEdit() {
    let formData = new FormData();
    formData.append('_method', 'PUT');
    formData.append('title',document.getElementById('title').value);
    formData.append('pages',document.getElementById('pages').value);
    formData.append('description',document.getElementById('description').value);
    formData.append('video',document.getElementById('video').value);


    store('/admin/cybers/{{$cybersecurity->id}}',formData,'/admin/cybers');
}
</script>
@endsection
