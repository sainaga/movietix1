@extends('layouts.master')

@section('content')
<div style="height: 97px;"></div>
<div class="container">
    <h3 class="text-center">Register As New User</h3>
    <div class="row">
        <div class="col-md-2 d-none"></div>
        <div class="col-md-8 mx-auto">
            <div class="card"> 
                <div class="card-heading text-center">Register</div>

                <div class="card-body mx-auto">
                    <form class="" method="POST" id="register-form" @submit.prevent="validateRegisterSubmit" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="title" class="col-md-4 control-label">Title</label>
                            <div class="col-md-8">
                                <select name="title" id="title" class="form-control" required>
                                    <option value="0">Student</option>
                                    <option value="1">Staff</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" :class="{'has-error': errors.has('firstname') }">
                            <label for="firstname" class="col-md-4 control-label">First Name</label>
                            <div class="col-md-8">
                                <input id="firstname" v-model="firstname" v-validate.initial="firstname" data-vv-rules="required|alpha" type="text" class="form-control" name="firstname" placeholder="Enter Firstname" required autofocus>
                                <p class="text-danger" v-if="errors.has('firstname')">@{{ errors.first('firstname') }}</p>
                            </div>
                        </div>
                        <div class="form-group row" :class="{'has-error': errors.has('lastname') }">
                            <label for="lastname" class="col-md-4 control-label">Last Name</label>
                            <div class="col-md-8">
                                <input id="lastname" v-model="lastname" v-validate.initial="lastname" data-vv-rules="required|alpha" type="text" class="form-control" name="lastname" placeholder="Enter Lastname" required autofocus>
                                <p class="text-danger" v-if="errors.has('lastname')">@{{ errors.first('lastname') }}</p>
                            </div>
                        </div>

                        <div class="form-group row" :class="{'has-error': errors.has('email') }">
                            <label for="email" class="col-md-4 control-label">Email</label>
                            <div class="col-md-8">
                                <input id="email" v-model="email" v-validate.initial="email" data-vv-rules="required|email" type="email" class="form-control" name="email" placeholder="Enter Email" required>
                                <p class="text-danger" v-if="errors.has('email')">@{{ errors.first('email') }}</p>
                            </div>
                        </div>
                        <div class="form-group row" :class="{'has-error': errors.has('username') }">
                            <label for="username" class="col-md-4 control-label">Username</label>
                            <div class="col-md-8">
                                <input id="username" v-model="username" v-validate.initial="username" data-vv-rules="required|alpha|min:6" type="text" class="form-control" name="username" placeholder="Enter Username" required autofocus min="6">
                                <small id="usernameHelp" class="form-text text-muted">At least 6 letters.</small>
                                <p class="text-danger" v-if="errors.has('username')">@{{ errors.first('username') }}</p>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row" :class="{'has-error': errors.has('password') }">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-8">
                                <input id="password" v-model="password" v-validate.initial="password" data-vv-rules="required|alpha_num|min:8" type="password" class="form-control" name="password" placeholder="Type Password" required min="8" v-on:keyup="keyup">
                                <p class="text-danger" v-if="errors.has('password')">@{{ errors.first('password') }}</p>
                                <small id="passwordHelp" class="form-text text-muted">At least 8 letters.</small>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row" :class="{'has-error': errors.has('confirm_password') }">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-8">
                                <input id="password-confirm" v-model="confirm_password" v-validate.initial="confirm_password" data-vv-rules="required|alpha_num|min:8" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required min="8" v-on:keyup="keyup">
                                <p class="text-danger" v-if="errors.has('confirm_password')">@{{ errors.first('confirm_password') }}</p>
                                <p class="text-danger">@{{ password_match }}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 control-label"></label>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Create Account
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
