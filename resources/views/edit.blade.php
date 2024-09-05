@extends('layouts.app')
@section('content')

   <div class="container">
        <div class="row">
            <div class="col-md-6 rounded mx-auto mt-3 border border-dark bg-light">

                <div class="mb-2 mt-2">
                    <a href="{{ route('home') }}" class="btn btn-secondary float-end">Back</a>
                </div>
                <h2 class="mb-3 text-center">Edit Form</h2>

                <form action="{{ route('updatePage',$user->id) }}" method="POST" class="p-4">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name<span class="text-danger">*</span></label>
                        <input value="{{ $user->name }}" type="text" name="name" class="form-control mb-2 @error('name') is-invalid @enderror" id="name">
                        @error('name')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email address<span class="text-danger">*</span></label>
                        <input value="{{ $user->email }}" type="text" name="email" class="form-control mb-2 @error('email') is-invalid @enderror" id="email">
                        @error('email')
                                <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Address<span class="text-danger">*</span></label>
                        <Textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="5">{{ $user->address }}</Textarea>
                        @error('address')
                                <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                </div>
                    <button type="submit" class="btn btn-primary my-3 float-end">Update</button>
                </form>
            </div>
        </div>
    </div>
    
@endsection
   
