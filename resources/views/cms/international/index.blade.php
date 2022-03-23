@extends('cms.parent')
@section('title', 'Categories')
@section('page-big-title', 'international')
@section('page-main-title', 'categories')
@section('page-sub-title', 'index')
@section('styles')

@endsection
@section('content')
    <div class="card-body table-responsive p-0" style="word-break: break-all">
        <table class="table table-hover text-nowrap border">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Descripions</th>
                    <th>Link</th>
                    <th>Image</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($internationals as $international)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ @$international->title }}</td>
                        <td>{{ $international->description }}</td>
                        <td>{{ $international->link }}</td>

                        <td><img src="{{ $international->image_path }}" style="width: 80px" class="img-thumbnail" alt="">
                        </td>



                        <td>{{ $international->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.internationals.edit', $international->id) }}" class="btn btn-info">
                                <i class="fas fa-edit"> </i></a>
                            <a href="#" onclick="confirmDestroy('{{ $international->id }}' ,this)"
                                class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
    <script>
        function confirmDestroy(id, reference) {
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
            axios.delete('/admin/internationals/' + id)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    reference.closest('tr').remove();
                    showMessage(response.data);
                })
                .catch(function(error) {
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
