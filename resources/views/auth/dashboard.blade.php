@extends('components.layouts.app')

@section('title' , 'Profile User')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center mt-4">
        <div class="col-md-4 profile-card">
            <h4 class="text-center">Your Profile</h4>
            <p>Name: <strong>{{auth()->user()->name}}</strong></p>
            <p>Email: <strong>{{auth()->user()->email}}</strong></p>
            <div class="text-center">
                <img src="{{asset('storage/'. '/' . auth()->user()->image->url)}}" alt="Avatar" class="img-fluid rounded-circle mb-3" width="150">
                <p><a href="{{route('profile.edit', auth()->user()->id)}}" class="btn btn-secondary">Edit Profile</a></p>
            </div>
        </div>
    </div>
</div>
@endsection