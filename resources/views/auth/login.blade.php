<form action="" method="post">
    @csrf
    <div class="field">
        <label for="username-or-email">Username or Email</label>
        <input type="text" name="username-or-email" id="username-or-email" placeholder="Username or Email">
    </div>
    <div class="field">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Password">
    </div>

    <button class="submit-button">Login</button>
    <p>Doesn't have an account? <a href="/auth/register">Sign Up</a></p>
</form>
