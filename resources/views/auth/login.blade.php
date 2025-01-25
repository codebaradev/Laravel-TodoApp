<form action="" method="post">
    @csrf
    <div class="field">
        <label for="username-or-email">Username or Email</label>
        <input type="text" name="username_or_email" id="username-or-email" placeholder="Username or Email" value="{{ old('username_or_email')}}">
        @if ($errors->has('username_or_email'))
            <p class="error-message">{{ $errors->first('username_or_email') }}</p>
        @endif
    </div>
    <div class="field">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Password">
        @if ($errors->has('password'))
            <p class="error-message">{{ $errors->first('password') }}</p>
        @endif
    </div>

    <button class="submit-button">Login</button>
    <p>Doesn't have an account? <a href="/auth/register">Sign Up</a></p>
</form>
