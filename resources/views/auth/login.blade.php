@extends('layouts.app')

@section('content')
<section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <img src="../assets/img/stisla-fill.svg" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
            <h4 class="text-dark font-weight-normal">{{ __('Welcome to') }} <span class="font-weight-bold">{{ env('APP_NAME')}}</span></h4>
            <p class="text-muted">Before you get started, you must login or register if you don't already have an account.</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
              <div class="form-group">
                <label for="email">{{ __('E-mail') }}</label>
                <input id="email" type="email" class="form-control" name="email" tabindex="1" required="" value="{{ old('email') }}" autofocus="">
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">{{ __('Password') }}</label>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" required="">
              </div>

              <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me" {{ old('remember') ? 'checked' : '' }}>
                  <label class="custom-control-label" for="remember-me">{{ __('Remember me') }}</label>
                </div>
              </div>

              <div class="form-group text-right">
                <a href="auth-forgot-password.html" class="float-left mt-3">
                  {{ __('Forgot password') }}?
                </a>
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  {{ __('Login') }}
                </button>
              </div>

              <div class="mt-5 text-center">
                {{ __('No account') }}? <a href="{{ route('register') }}">{{ __('Create an account') }}</a>
              </div>
            </form>

            <div class="text-center mt-5 text-small">
              Copyright {{ date('Y') }} © {{ env('APP_NAME') }}.
              <div class="mt-2">
                <a href="#">Privacy Policy</a>
                <div class="bullet"></div>
                <a href="#">Terms of Service</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="https://images.unsplash.com/photo-1530179123598-38d05c67c1b1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9" style="background-image: url(&quot;https://images.unsplash.com/photo-1530179123598-38d05c67c1b1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&quot;);">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold">Have a great day!</h1>
                <h5 class="font-weight-normal text-muted-transparent">Sweden</h5>
              </div>
              Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/@robert_gramner">Robert Gramner</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
