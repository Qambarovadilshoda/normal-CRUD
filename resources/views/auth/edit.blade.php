@extends('components.layouts.app')

@section('title', 'Edit Profile')

@section('content')

<div class="container mt-5">
    <h2 class="text-center">Edit Your Profile</h2>
    <div class="row justify-content-center mt-4">
        <div class="col-md-6 profile-card">
            <form action="{{route('profile.update', auth()->user()->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @error('name')
                {{$message}}
                @enderror
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{auth()->user()->name}}">
                </div>
                @error('email')
                {{$message}}
                @enderror
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" value="{{auth()->user()->email}}">
                </div>
                @error('image')
                {{$message}}
                @enderror
                <div class="form-group">
                    <label for="avatar">Upload New Image</label>
                    <input type="file" class="form-control-file" name="image">
                </div>
                <button type="submit" class="btn btn-secondary btn-block">Save Changes</button>
            </form>
        </div>
    </div>
</div>

@endsection