@extends('basic-authentication::apps')

@section('title')
    Register | GET
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row">
            <h1>Register</h1>

            @if (Session::get('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

            @if (Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
            @endif

            <form action="{{ route(config('basic-authentication.registerStoreName')) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Code Tieumomo"
                        value="{{ old('name') }}">
                    <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com"
                        value="{{ old('email') }}">
                    <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="******">
                    <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password Confirmation</label>
                    <input type="password" class="form-control" id="password" name="password_confirmation"
                        placeholder="******">
                </div>
                <div class="col-12">
                    <button class="btn btn-primary me-2" type="submit">Register</button>
                    <a href="{{ route(config('basic-authentication.loginShowName')) }}">Have account? Login</a>
                </div>
            </form>
        </div>
    </div>
@endsection
