@extends('components.layouts.app')

@section('title', 'Post Detail')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="mb-5">
                <h1 class="section-title mb-3 text-dark font-weight-bold">{{$post->title}}</h1>
            </div>
            <div class="mb-5">
                <img src="{{ asset('storage/' . $post->image->url) }}" class="img-fluid rounded shadow-sm" alt="Image">
                <p class="mt-3 text-justify">{{$post->description}}</p>
                <div class="d-flex mb-2 text-muted">
                    <p class="text-uppercase font-weight-medium">{{$post->created_at->format('F j, Y')}}</p>
                </div>
                @if (auth()->user()->id === $post->user_id)
                    
                <div>
                    <form style="display:inline;" action="{{route('posts.destroy', $post->id)}}" method="POST"
                    onSubmit="return confirm('Are you sure you wish to delete?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger mr-2">Delete</button>
                </form>
                <a class="btn btn-sm btn-outline-secondary" href="{{route('posts.edit', $post->id)}}">Edit</a>
                </div>
            @endif
            </div>
        </div>
        <div class="col-lg-4 mt-5 mt-lg-0">
            <div class="d-flex flex-column text-center bg-secondary rounded mb-5 py-5 px-4 text-white shadow">
                <img src="{{asset('/storage' . '/' . $post->user->image->url)}}" class="img-fluid rounded-circle mx-auto mb-3" style="width: 100px;">
                <h3 class="mb-3">{{$post->user->name}}</h3>
                <p class="m-0">This post was posted by {{$post->user->name}}.</p>
                <a href="{{route('profile.edit', $post->user_id)}}"></a>
            </div>
        </div>
    </div>
</div>
@endsection