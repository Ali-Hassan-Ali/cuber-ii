@extends('cms.parent')
@section('title', 'Cyberscurity ')
@section('page-big-title','Cyberscurities')
@section('page-main-title','Cyberscurities')
@section('page-sub-title','index')
@section('styles')

@endsection
@section('content')
<div class="card-body table-responsive p-0" style="word-break: break-all" >
    <table class="table table-hover text-nowrap border">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Descripions</th>
          <th>Level</th>
          <th>Video Link</th>
          <th>Created At</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($cybers as $cyber )
      <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ @$cyber->title }}</td>
          <td>{{ $cyber->description }}</td>
          <td>
            @switch($cyber->pages)
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
          </td>
          <td>
            <iframe width="150" height="150" src=" {{ $cyber->video }}" frameborder="0" allowfullscreen>
            </iframe>
              </td>


          <td>{{ $cyber->created_at }}</td>
          <td>
              <a href="{{ route('admin.cybers.edit',$cyber->id) }}" class="btn btn-info"> <i class="fas fa-edit"> </i></a>
              <a href="#" onclick="confirmDestroy('{{ $cyber->id }}' ,this)"  class="btn btn-danger"><i class="fas fa-trash"></i></a>
          </td>
      </tr>
          @endforeach


      </tbody>
    </table>
  </div>
@endsection
@section('scripts')
  <script>
      function confirmDestroy(id, reference){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
                destroy(id, reference);

            }
          });
      }
      function destroy(id, reference) {
        //JS axios
        axios.delete('/admin/cybers/'+id)
            .then(function (response) {
            // handle success
            console.log(response);
            reference.closest('tr').remove();
            showMessage(response.data);
            })
            .catch(function (error) {
            // handle error
            console.log(error);
            showMessage(error.response.data);
            })
      }
      function showMessage(data) {
        Swal.fire({
            icon: data.icon,
            title: data.title,
            showConfirmButton: false,
            timer: 1500
          });
      }
  </script>
@endsection
