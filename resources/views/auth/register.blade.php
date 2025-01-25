<form action="" method="post">
    @csrf
    <div class="field">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="Username" value="{{ old('username')}}">
        @if ($errors->has('username'))
            <p class="error-message">{{ $errors->first('username') }}</p>
        @endif
    </div>
    <div class="field">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="Email" value="{{ old('email')}}">
        @if ($errors->has('email'))
            <p class="error-message">{{ $errors->first('email') }}</p>
        @endif
    </div>
    <div class="field">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Password">
        @if ($errors->has('password'))
            <p class="error-message">{{ $errors->first('password') }}</p>
        @endif
    </div>
    <div class="field">
        <label for="password_confirmation">Retype Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Retype Password">
    </div>

    <button class="submit-button">Sign Up</button>
    <p>Already have an account? <a href="/auth/login">Login</a></p>
</form>
