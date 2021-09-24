@extends('layout.master')
@section('title')
    Register
@stop
@section('sidebar')
@stop
@section('text')
@stop
@section('content')
    <section class="main-content">
        <div class="row">
            <div class="span12">
                <h4 class="title"><span class="text"><strong>Register</strong> Form</span></h4>
                <form method="POST" action="{{ route('register') }}" class="form-stacked">
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label">Name:</label>
                            <div class="controls">
                                <input id="name"
                                       type="text"
                                       class="input-xlarge @error('name') is-invalid @enderror"
                                       name="name"
                                       value="{{ old('name') }}"
                                       required
                                       autocomplete="name"
                                       autofocus
                                       placeholder="Enter your name"
                                >
                                @error('name')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Email address:</label>
                            <div class="controls">
                                <input id="email"
                                       type="email"
                                       class="input-xlarge @error('email') is-invalid @enderror"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required
                                       autocomplete="email"
                                       placeholder="Enter your email"
                                >
                                @error('email')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Password:</label>
                            <div class="controls">
                                <input id="password"
                                       type="password"
                                       class="input-xlarge @error('password') is-invalid @enderror"
                                       name="password"
                                       required
                                       autocomplete="new-password"
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
                            <label class="control-label">Confirm Password:</label>
                            <div class="controls">
                                <input id="password-confirm"
                                       type="password"
                                       class="input-xlarge"
                                       name="password_confirmation"
                                       required
                                       autocomplete="new-password"
                                       placeholder="Confirm password"
                                >
                            </div>
                        </div>
                        <hr>
                        <div class="actions">
                            <input tabindex="9" class="btn btn-inverse large" type="submit" value="Register">
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
