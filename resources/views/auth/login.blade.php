@extends('layouts.master')

@section('content')
<div class="container">
    <div style="height: 97px;"></div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-6 mx-auto">
            <div class="card border-0">
                <div class="card-header bg-light"><h5 class="text-center">Login</h5></div>

                <div class="card-body mx-ato">
                    <form class="form-horizontal" @submit.prevent="validateBeforeSubmit" id="login-form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row" :class="{'has-error': errors.has('username') }">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-8">
                                <input id="email" type="text" v-model="username" v-validate.initial="username" data-vv-rules="required|alpha|min:6" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Enter Username (only letters)">
                                 <p class="text-danger" v-if="errors.has('username')">@{{ errors.first('username') }}</p>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row" :class="{'has-error': errors.has('password') }">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-8">
                                <input id="password" type="password" v-model="password" v-validate.initial="password" data-vv-rules="required|alpha_num|min:8" class="form-control" name="password" placeholder="Type Password (only letters and numbers)" required>
                                <p class="text-danger" v-if="errors.has('password')">@{{ errors.first('password') }}</p>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4"></div>
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4"></div>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
