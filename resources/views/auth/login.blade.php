@extends('layouts.default')

@section('title', 'Login')

@section('content')
<body>
<div class="login-background">
    <div class="login-container">
        <div class="login-form">
            @if(session()->has("success"))
               <div class="alert alert-success">
                  {{ session()->get("success") }}
               </div>
            @endif

            @if(session()->has("error"))
               <div class="alert alert-danger">
                  {{ session()->get("error") }}
               </div>
            @endif
            
            <div class="login-header">
                <h2>Welcome Back</h2>
                <p>Please enter your credentials to sign in</p>
            </div>
            
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember Me</label>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="login-button">Sign In</button>
                </div>
                
                <div class="form-links">
                    <p>Dont have Account?  <a href="{{ route('register.post') }}">Register
                    </a></p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection