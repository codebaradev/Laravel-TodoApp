@extends('settings.index')

@push('styles')
    <link rel="stylesheet" href="/styles/settings/account/index.css">
@endpush
    
@section('setting-content')
    <div class="setting-container">
        <h3><span>Account</span> Settings</h3>
        
        <form action="" method="post">
            @csrf
            <div class="text-field">
                <label for="">Username</label>
                <input type="text" id="username" name="username" value="{{ $user->username }}" required>
                @if ($errors->has('username'))
                    <p class="error-message">{{ $errors->first('username') }}</p>
                @endif
            </div>
            <div class="text-field">
                <label for="">Email</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" required>
                @if ($errors->has('email'))
                    <p class="error-message">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="password-field">
                <div>
                    <label for="">Password</label> 
                    <a class="change-password-button" href="/settings/account/change-password">Change Password</a>
                </div>
                <input type="password" value="..." disabled>
            </div>
            <button style="display: none" type="submit"></button>
        </form>

        <a class="logout-button" href="/auth/logout">Logout</a>
    </div>
@endsection