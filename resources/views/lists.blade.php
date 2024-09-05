
   @extends('layouts.app')
   @section('content')
        <div class="container">
            <div class="row ">
                <div class="col-md-8 mx-auto mt-5">
                    @include('layouts.message')
                    <a href="{{ route('store') }}" class="btn btn-info float-end">Create</a>
                    <h2>From Data</h2>
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="table-light">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </thead>
                        <tbody 
                                @if ($users->isNotEmpty())
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>                                    
                                    <td>{{ $user->name }}</td>                                    
                                    <td>{{ $user->email }}</td>                                    
                                    <td>{{ $user->address }}</td>                                    
                                    <td>
                                        <a href="{{ route('editPage',$user->id) }}" class="btn btn-secondary">Edit</a>
                                        <a href="javascript:void(0)" onclick="deleteData('{{ $user->id }}')" class="btn btn-danger">Delete</a>
                                    </td>                                    
                                </tr>
                                @endforeach
                                @endif

                        </tbody>

                    </table>

                    {{ $users->links() }}

                </div>
            </div>
        </div>
@endsection
@section('script')
    <script>
        function deleteData(id){
            if(confirm("Are you sure you want to delete?")){
                $.ajax({
                    url : '{{ route("destroy") }}',
                    type: 'DELETE',
                    data: {id:id},
                    headers:{
                        'X-CSRF-TOKEN':'{{ csrf_token() }}',
                    },
                    success: function(response){
                        window.location.href= '{{ route("home") }}';
                    }
                });
            }
        }
    </script>
@endsection
