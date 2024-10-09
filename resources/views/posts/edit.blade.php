@extends('components.layouts.app')

@section('title', 'Edit Post')

@section('content')

<h1 style="text-align:center;">Edit Post</h1>
<div class="container-fluid py-4">
    <div class="v-50">
        <div class="row" style="margin-left:25%">
            <div class="col-lg-7 mb-5 mb-lg-0">
                <div class="contact-form">
                    <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="control-group">
                            <input type="text" class="form-control p-4" name="title" value="{{$post->title}}"  required />
                            @error('title')
                            <p class="help-block text-danger">{{ ' * ' . $message }}</p>
                            @enderror
                        </div><br>
                        <div class="control-group">
                            <textarea class="form-control p-4" rows="6" name="description"  required> {{$post->description}}</textarea>
                            @error('description')
                            <p class="help-block text-danger">{{ ' * ' . $message }}</p>
                            @enderror
                        </div><br>
                        <div class="control-group">
                            <input class="form-control p-1" type="file" name="image" value="{{$post->image->url}}">
                        </div><br>

                        <div>
                            <button class="btn btn-primary btn-block py-3 px-5" type="submit"">Edit Post</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection