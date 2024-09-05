
   @extends('layouts.app')
   @section('content')
        <div class="container">
            <div class="row ">
                <div class="col-md-8 mx-auto mt-5">
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
                                        <a href="" class="btn btn-danger">Delete</a>
                                        <a href="" class="btn btn-secondary">Edit</a>
                                    </td>                                    
                                </tr>
                                @endforeach
                                @endif
                        </tbody>

                    </table>


                </div>
            </div>
        </div>
@endsection
