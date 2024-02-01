@extends('layouts.app')

@section('content')
<div class="container"> 
<form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
    @csrf
    @method('PATCH')
        <div class="row">
        <div class="col-8 offset-2">
            <div class="row">
                <h1> Edit Profile</h1>
            </div>
                <label for="title" class="col-md-4 col-form-label">Title</label>
                <div class="col-md-6">
                    <input id="title" 
                        type="text" 
                        class="form-control @error('title') is-invalid @enderror"
                        name="title" 
                        value="{{ old('title') ?? $user->profile->title }}"  
                        autocomplete="title" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <label for="description" class="col-md-4 col-form-label">Description</label>
                <div class="col-md-6">
                    <input id="description" 
                        type="text" 
                        class="form-control @error('description') is-invalid @enderror"
                        name="description" 
                        value="{{ old('description') ?? $user->profile->description}}"  
                        autocomplete="description" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <label for="url" class="col-md-4 col-form-label">URL</label>
                <div class="col-md-6">
                    <input id="url" 
                        type="text" 
                        class="form-control @error('url') is-invalid @enderror"
                        name="url" 
                        value="{{ old('url') ?? $user->profile->url }}"  
                        autocomplete="url" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Profile image</label>

                    <input type="file" class="form-controll-file" id="image" name="image">

                    @error('name')
                            <strong>{{ $message }}</strong>                   
                    @enderror
                </div>
                <div class="pt-4">
                    <button class="btn btn-primary">Save Profile</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection