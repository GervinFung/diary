@extends('layouts.app')
<link href="{{ URL::asset('scss/auth/password/email.css') }}" rel="stylesheet">

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Reset Password</h2>
            </div>

            <div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div>
                        <label for="email">{{ __('Email Address') }}</label>
                        @error('email')
                            <span class="error-msg" role="alert">
                                <strong>*{{ $message }}*</strong>
                            </span>
                        @enderror
                        <div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                autocomplete="email" placeholder="Email" autofocus>
                        </div>
                    </div>

                    <div class="btn-container">
                        <button type="submit" class="btn send-email-btn">
                            Send Password Reset Link
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
