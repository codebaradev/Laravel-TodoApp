@extends('settings.index')

@push('styles')
    <link rel="stylesheet" href="/styles/settings/account/change-password.css">
@endpush
    
@section('setting-content')
    <div class="setting-container">
        <h3>Change Account Password</h3>

        @if ($errors->any())
            <div class="errors-container">
                <p>{{ $errors->first() }}</p>
            </div>
        @endif
        
        <form action="" method="post">
            @csrf
            <div class="text-field">
                <label for="old_password">Old Password</label>
                <input type="password" id="old_password" name="old_password" placeholder="Old Password">
            </div>
            <div class="text-field">
                <label for="password">New Password</label>
                <input type="password" id="password" name="password" placeholder="New Password">
            </div>
            <div class="text-field">
                <label for="password_confirmation">Retype New Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Retype New Password">
            </div>

            <div class="button-container">
                <a class="cancel-button" href="/settings/account">Cancel</a>
                <button class="save-button" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection