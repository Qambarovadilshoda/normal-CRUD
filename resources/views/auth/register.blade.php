@extends('components.layouts.app')
@section('title', 'Register')


@section('content')
<style>
    .input-field {
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 6px;
    }

    .input-field input {
        border: none;
        outline: none;
        flex: 1;
    }

    .input-field span {
        margin-right: 10px;
    }

    .panel {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>
<div class="container">
    <div class="row">
        <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
            <div class="panel border bg-white">
                <div class="panel-heading">
                    <h3 style="text-align:center;" class="pt-3 font-weight-bold">Register</h3>
                </div>
                <div class="panel-body p-3">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group py-2">
                            <div class="input-field">
                                <span class="far fa-user p-2"></span>
                                <input type="text" placeholder="Username" value="{{old('name')}}" name="name" required>
                            </div>
                        </div>
                        @error('name')
                        <p class="help-block text-danger">{{ ' * ' . $message }}</p>
                        @enderror

                        <div class="form-group py-2">
                            <div class="input-field">
                                <span class="far fa-user p-2"></span>
                                <input type="text" placeholder="Email" value="{{old(key: 'email')}}" name="email" required>
                            </div>
                        </div>
                        @error('email')
                        <p class="help-block text-danger">{{ ' * ' . $message }}</p>
                        @enderror

                        <div class="form-group py-2">
                            <div class="input-field">
                                <span class="far fa-user p-2"></span>
                                <input type="file" value="{{old(key: 'image')}}" name="image" required>
                            </div>
                        </div>
                        @error('image')
                        <p class="help-block text-danger">{{ ' * ' . $message }}</p>
                        @enderror
                        <div class="form-group py-1 pb-2">
                            <div class="input-field">
                                <span class="fas fa-lock px-2"></span>
                                <input type="password" placeholder="Enter your Password" value="{{old(key: 'password')}}" name="password" required>
                                <button type="submit" class="btn bg-white text-muted">
                                    <span class="far fa-eye-slash"></span>
                                </button>
                            </div>
                        </div>
                        @error('password')
                        <p class="help-block text-danger">{{ ' * ' . $message }}</p>
                        @enderror
                        <div class="form-group py-1 pb-2">
                            <div class="input-field">
                                <span class="fas fa-lock px-2"></span>
                                <input type="password" placeholder="Confirm Password" value="{{old(key: 'confirm_password')}}" name="confirm_password" required>
                                <button type="submit" class="btn bg-white text-muted">
                                    <span class="far fa-eye-slash"></span>
                                </button>
                            </div>
                        </div>
                        @error('confirm_password')
                        <p class="help-block text-danger">{{ ' * ' . $message }}</p>
                        @enderror
                        <button type="submit" class="btn btn-primary btn-block mt-3">Register</button>
                        <div class="text-center pt-4 text-muted">
                            Have an account?
                            <a href="{{route('loginForm')}}">Log in</a>
                        </div>
                    </form>
                </div>
                <div class="mx-3 my-2 py-2 bordert">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection