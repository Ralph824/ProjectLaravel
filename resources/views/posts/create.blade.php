@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="post">
    @csrf
        <div class="row">
        <div class="col-8 offset-2">
            <div class="row">
                <h1> Add New Post</h1>
            </div>
                <label for="caption" class="col-md-4 col-form-label">Post caption</label>
                <div class="col-md-6">
                    <input id="caption" 
                        type="text" 
                        class="form-control @error('caption') is-invalid @enderror"
                        name="caption" 
                        value="{{ old('caption') }}"  
                        autocomplete="caption" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Post image</label>

                    <input type="file" class="form-controll-file" id="image" name="image">

                    @error('name')
                            <strong>{{ $message }}</strong>                   
                    @enderror
                </div>
                <div class="pt-4">
                    <button class="btn btn-primary">Add New Post</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
