@extends('layout.master')
@section('title')
    Forgot password
@stop
@section('sidebar')
@stop
@section('text')
@stop
@section('content')
    <section class="main-content">
        <div class="row">
            <div class="span12">
                <h4 class="title"><span class="text"><strong>Forgot</strong> password</span></h4>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label">{{ __('E-Mail Address') }}</label>
                            <div class="controls">
                                <input id="email"
                                       type="email"
                                       class="input-xlarge @error('email') is-invalid @enderror"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required
                                       autocomplete="email"
                                       autofocus
                                >
                                @error('email')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="control-group">
                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <input tabindex="3" class="btn btn-inverse large" type="submit" value=" {{ __('Send Password Reset Link') }}">
                            <hr>
                            <p class="reset">Go back in <a tabindex="4" href="{{ route('login') }}" title="Recover your username or password">Login</a></p>
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
