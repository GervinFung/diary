@extends('layouts.app')
<link href="{{ URL::asset('scss/auth/sign-up.css') }}" rel="stylesheet">

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>
                    Update Profile
                </h2>
            </div>

            <div>
                <form method="POST" action="/api/user/update">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="name">{{ __('Name') }}</label>
                        @error('name')
                            <span class="error-msg" role="alert">
                                <strong>*{{ $message }}*</strong>
                            </span>
                        @enderror
                        <div>
                            <input id="name" type="text" name="name" value="{{ $user->name }}" autocomplete="name"
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
                            <input id="email" type="email" name="email" value="{{ $user->email }}" autocomplete="email"
                                placeholder="Email">
                        </div>
                    </div>

                    <div>
                        <label for="type">{{ __('User Type') }}</label>
                        @error('type')
                            <span class="error-msg" role="alert">
                                <strong>*{{ $message }}*</strong>
                            </span>
                        @enderror
                        <div>
                            <select class="user-type-selection" id="type" name="type" value="{{ $user->type }}"
                                autocomplete="type">
                                <option value="{{ $user->type }}" selected>{{ $user->type }}</option>
                                <option value="{{ $oppositeType }}">{{ $oppositeType }}</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="password">New Password</label>
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
                        <label for="password-confirm">Confirm New Password</label>
                        <div>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                autocomplete="new-password" placeholder="Confirm Password">
                        </div>
                    </div>

                    <div>
                        <label for="identity">Confirm your identity</label>
                        @error('identity')
                            <span class="error-msg" role="alert">
                                <strong>*{{ $message }}*</strong>
                            </span>
                        @enderror
                        <div>
                            <input id="identity" type="password" name="identity" autocomplete="new-password" required
                                placeholder="Old Password">
                        </div>
                    </div>

                    <div class="btn-container">
                        <button type="submit" class="btn sign-up-btn">
                            Update
                        </button>
                    </div>

                    <hr class="horizontal-line" />

                    <div class="btn-container">
                        <a href="/" class="btn sign-in-btn">
                            Back to Home
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
