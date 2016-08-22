@extends('layouts.app')

@section('title', 'Sign in')
@section('meta_description', 'Log in to have access to Agnieszka Krol Client Photogallery')

@section('content')
<div id="login">
    <div class="login-wrapper">
        <div class="login-heading">Sign in</div>
        <div class="login-panel">
            <div class="form-error-msg">
                @include('errors/errors')
            </div>
            <form class="form sign-in" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">E-Mail Address</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                </div>

                <div class="clearfix form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Password</label>

                        <input id="password" type="password" class="form-control" name="password">
                        {{-- <a href="{{ url('/password/reset') }}">Forgot Your Password?</a> --}}
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Sign in" data-after-submit-value="Signing in&hellip;">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('customJS')

<script>
    $('.top-navbar .logo').addClass('white-logo');
</script>

@endsection
