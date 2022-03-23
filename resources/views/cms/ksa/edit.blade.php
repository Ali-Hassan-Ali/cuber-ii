
@extends('cms.parent')
@section('title','ksa edit')
@section('page-big-title','ksa')
@section('page-main-title','ksas')
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
            <h3 class="card-title">Quick Example</h3>
          </div>
          <!-- /.card-header -->
            <!-- form start -->
            <form id="create-form">
                <div class="card-body">
                <div class="form-group">
                    <label for="name">Title </label>
                    <input type="text" class="form-control" id="title" value="{{ $ksa->title }}"  placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" id="description" rows="3" placeholder="Enter ...">{{ $ksa->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="link">Linke </label>
                    <input type="text" class="form-control" id="link" value="{{ $ksa->title }}"  placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="name">Image </label>
                    <input type="file" class="form-control" id="image" value="{{ $ksa->image }}"  placeholder="Enter name">
                </div>
                <td><img src="{{ $ksa->image_path }}" style="width: 80px"  class="img-thumbnail" alt=""></td>


                <div class="card-footer">
                {{--  <button type="button" onclick="store()" class="btn btn-primary">Submit</button>  --}}

                <a href="#" onclick="performEdit()"  class="btn btn-info">update</i></a>

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
    formData.append('description',document.getElementById('description').value);
    formData.append('link',document.getElementById('link').value);


    formData.append('image', document.getElementById('image').files[0])
    store('/admin/ksas/{{$ksa->id}}',formData,'/admin/ksas');

}


</script>
@endsection
