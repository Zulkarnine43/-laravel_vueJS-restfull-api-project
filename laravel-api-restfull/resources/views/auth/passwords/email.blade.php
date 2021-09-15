@extends('layouts.admin_layout')

@section('body_content')

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              
              <div class="col-lg-9">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">{{ __('Reset Password') }}?</h1>
                    <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
                  </div>
                    
                     @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  <form  method="POST" action="{{ route('password.email') }}" class="user">
                     @csrf
                      <div class="form-group">
                      <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"  id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email Address...">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <button class="btn btn-primary btn-user btn-block">
                      {{ __('Send Password Reset Link') }}
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="{{route('register')}}">Create an Account!</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="{{route('login_form')}}">Already have an account? Login!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

@endsection
