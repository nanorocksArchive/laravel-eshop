@extends('layout.master')
@section('title')
    Reset password
@stop
@section('sidebar')
@stop
@section('text')
@stop
@section('content')
    <section class="main-content">
        <div class="row">
            <div class="span12">
                <h4 class="title"><span class="text"><strong>Reset</strong> password</span></h4>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ request()->route('token') }}">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label">{{ __('E-Mail Address') }}</label>
                            <div class="controls">
                                <input id="email"
                                       type="email"
                                       class="input-xlarge @error('email') is-invalid @enderror"
                                       name="email"
                                       value="{{ request()->get('email') ?? old('email') }}"
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
                            <label class="control-label">Password</label>
                            <div class="controls">
                                <input id="password"
                                       type="password"
                                       class="input-xlarge @error('password') is-invalid @enderror"
                                       name="password"
                                       required
                                       autocomplete="new-password"
                                >
                                @error('password')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Confirm password</label>
                            <div class="controls">
                                <input id="password-confirm"
                                       type="password"
                                       class="input-xlarge"
                                       name="password_confirmation"
                                       required
                                       autocomplete="new-password"
                                >
                            </div>
                        </div>
                        <div class="control-group">
                            <input tabindex="3" class="btn btn-inverse large" type="submit" value="{{ __('Reset Password') }}">
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
