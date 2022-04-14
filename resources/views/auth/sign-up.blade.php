@extends('layouts.app')
<link href="{{ URL::asset('scss/auth/sign-up.css') }}" rel="stylesheet">

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>
                    Welcome to Journivia
                </h2>
                <div>
                    By signing up you agreed to our <a href="#" class="terms-conditions">terms</a> and <a href="#"
                        class="terms-conditions">conditions</a>
                </div>
            </div>

            <div>
                <form method="POST" action="/api/user/sign-up">
                    @csrf
                    <div>
                        <label for="name">{{ __('Name') }}</label>
                        @error('name')
                            <span class="error-msg" role="alert">
                                <strong>*{{ $message }}*</strong>
                            </span>
                        @enderror
                        <div>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" autocomplete="name"
                                autofocus placeholder="Full Name">
                        </div>
                    </div>

                    <div>
                        <label for="email">{{ __('Email Address') }}</label>
                        @error('email')
                            <span class="error-msg" role="alert">
                                <strong>*{{ $message }}*</strong>
                            </span>
                        @enderror
                        <div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email"
                                placeholder="Email">
                        </div>
                    </div>

                    <div>
                        <label for="password">{{ __('Password') }}</label>
                        @error('password')
                            <span class="error-msg" role="alert">
                                <strong>*{{ $message }}*</strong>
                            </span>
                        @enderror
                        <div>
                            <input id="password" type="password" name="password" autocomplete="new-password"
                                placeholder="Password">
                        </div>
                    </div>

                    <div>
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        <div>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                autocomplete="new-password" placeholder="Confirm Password">
                        </div>
                    </div>

                    <div>
                        <label for="type">{{ __('Type') }}</label>
                        @error('type')
                            <span class="error-msg" role="alert">
                                <strong>*{{ $message }}*</strong>
                            </span>
                        @enderror
                        <div>
                            <select class="user-type-selection" id="type" name="type" value="{{ old('type') }}"
                                autocomplete="type">
                                <option value="" disabled selected>--Select User Type--</option>
                                <option value="Public">Public</option>
                                <option value="Private">Private</option>
                            </select>
                        </div>
                    </div>

                    <div class="btn-container">
                        <button type="submit" class="btn sign-up-btn">
                            Sign Up
                        </button>
                    </div>

                    <hr class="horizontal-line" />

                    <div class="alternative-solution">Already have an account?</div>

                    <div class="btn-container">
                        <a href="/user/sign-in" class="btn sign-in-btn">
                            Sign in
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
