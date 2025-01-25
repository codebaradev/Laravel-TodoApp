<form action="" method="post">
    @csrf
    <div class="field">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="Username">
    </div>
    <div class="field">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="Email">
    </div>
    <div class="field">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Password">
    </div>
    <div class="field">
        <label for="password-r">Retype Password</label>
        <input type="password" name="password-r" id="password-r" placeholder="Retype Password">
    </div>

    <button class="submit-button">Sign Up</button>
    <p>Already have an account? <a href="/auth/login">Login</a></p>
</form>
