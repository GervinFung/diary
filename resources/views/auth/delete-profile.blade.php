@extends('layouts.app')
<link href="{{ URL::asset('scss/auth/sign-up.css') }}" rel="stylesheet">

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>
                    Update Profile
                </h2>
                <div>Are you sure about this? There is no going back after this</div>
            </div>

            <form method="POST" action="/api/user/delete">
                @csrf
                @method('DELETE')
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
                        Delete
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
@endsection
