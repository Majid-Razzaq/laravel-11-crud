@extends('layouts.app')
@section('content')

   <div class="container">
        <div class="row">
            <div class="col-md-6 rounded mx-auto mt-3 border border-dark bg-light">

                <div class="mb-2 mt-2">
                    <a href="{{ route('home') }}" class="btn btn-secondary float-end">Lists</a>
                </div>
                <h2 class="mb-3 text-center">laravel CRUD Form</h2>

                <form action="{{ route('store') }}" method="POST" class="p-4">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name<span class="text-danger">*</span></label>
                        <input value="{{ old('name') }}" type="text" name="name" class="form-control mb-2 @error('name') is-invalid @enderror" id="name">
                        @error('name')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email address<span class="text-danger">*</span></label>
                        <input value="{{ old('email') }}" type="text" name="email" class="form-control mb-2 @error('email') is-invalid @enderror" id="email">
                        @error('email')
                                <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control mb-2 @error('password') is-invalid @enderror" id="password">
                        @error('password')
                                <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Address<span class="text-danger">*</span></label>
                        <Textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="5">{{ old('address') }}</Textarea>
                        @error('address')
                                <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                </div>
                    <button type="submit" class="btn btn-primary my-3 float-end">Submit</button>
                </form>
            </div>
        </div>
    </div>
    
@endsection
   
