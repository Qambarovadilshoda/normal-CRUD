@extends('components.layouts.app')

@section('title', 'Create Post')

@section('content')

<h1 style="text-align:center;">Create Post</h1>
<div class="container-fluid py-4">
    <div class="v-50">
        <div class="row" style="margin-left:25%">
            <div class="col-lg-7 mb-5 mb-lg-0">
                <div class="contact-form">
                    <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="control-group">
                            <input type="text" class="form-control p-4" name="title" value="{{ old('title') }}" placeholder="Title" required />
                            @error('title')
                            <p class="help-block text-danger">{{ ' * ' . $message }}</p>
                            @enderror
                        </div><br>
                        <div class="control-group">
                            <textarea class="form-control p-4" rows="6" name="description" placeholder="Your content" required>{{ old(  'description') }}</textarea>
                            @error('description')
                            <p class="help-block text-danger">{{ ' * ' . $message }}</p>
                            @enderror
                        </div><br>
                        <div class="control-group">
                            <input class="form-control p-1" type="file" name="image" value="{{old('image')}}">
                        </div><br>

                        <div>
                            <button class="btn btn-primary btn-block py-3 px-5" type="submit"">Create Post</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Contact End -->
@endsection