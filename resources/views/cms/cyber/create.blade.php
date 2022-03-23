@extends('cms.parent')
@section('title','cybersecurtiy create')
@section('page-big-title','cybersecurtiy')
@section('page-main-title','cybersecurtiys')
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
                        <h3 class="card-title">cybersecurtiy Create</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create-form">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">pages </label>
                                <select class="form-control" name="" id="pages">
                                    <option value="">select the Level</option>
                                    <option value="1">level one</option>
                                    <option value="2">level two</option>
                                    <option value="3">level three</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">title </label>
                                <input type="text" class="form-control"id="title" placeholder="Enter name">
                            </div>

                            <div class="form-group">
                                <label for="name">rating </label>
                                <select class="form-control" name="rating" id="rating">
                                    @for ($i = 1; $i < 6; $i++)
                                        <option>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" id="description" rows="3"
                                    placeholder="Enter Descriptions ..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">Cover Image </label>
                                <input type="file" class="form-control" id="image" placeholder="Enter Image">
                            </div>
                            <div class="form-group">
                                <label for="name">Vedio URL </label>
                                <input type="text" class="form-control" id="video" placeholder="Enter Video url">
                            </div>
                        </div>

                        <div class="card-footer">
                            {{-- <button type="button" onclick="store()" class="btn btn-primary">Submit</button> --}}

                            <a href="#" onclick="cybersecurtiyStore()" class="btn btn-info">submit</i></a>

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
    function cybersecurtiyStore() {
    let formData = new FormData();
        formData.append('title',document.getElementById('title').value);
        formData.append('description',document.getElementById('description').value);
        formData.append('pages',document.getElementById('pages').value);
        formData.append('rating',document.getElementById('rating').value);
        formData.append('image', document.getElementById('image').files[0])
        formData.append('video',document.getElementById('video').value);
        store('/admin/cybers', formData),'/admin/cybers/create';
    }
</script>
@endsection
