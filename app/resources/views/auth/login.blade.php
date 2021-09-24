@extends('layout.master')
@section('title')
    Login
@stop
@section('sidebar')
@stop
@section('text')
@stop
@section('content')
    <section class="main-content">
        <div class="row">
            <div class="span12">
                <h4 class="title"><span class="text"><strong>Login</strong> Form</span></h4>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label">Email</label>
                            <div class="controls">
                                <input type="email"
                                       placeholder="Enter your email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required
                                       autocomplete="email"
                                       autofocus
                                       class="input-xlarge @error('email') is-invalid @enderror "
                                >
                                @error('email')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Password</label>
                            <div class="controls">
                                <input id="password"
                                       type="password"
                                       class="input-xlarge @error('password') is-invalid @enderror"
                                       required
                                       autocomplete="current-password"
                                       name="password"
                                       placeholder="Enter your password"
                                >
                                @error('password')
                                <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="checkbox" for="remember">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <div class="control-group">
                            <input tabindex="3" class="btn btn-inverse large" type="submit" value="{{ __('Login') }}">
                            <hr>
                            @if (Route::has('password.request'))
                                <p class="reset">
                                    <a tabindex="4"
                                       href="{{ route('password.request') }}"
                                       title="Recover your username or password">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </p>
                            @endif
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </section>
@stop
@section('js')
    @parent
@stop
