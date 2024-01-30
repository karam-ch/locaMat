@include('head')
<h2>Login</h2>
<form method="POST">
    @csrf
    <label>
        Email
        <input type="email" name="email" required>
    </label>
    <label>
        Password
        <input type="password" name="password" required>
    </label>
    <input type="submit" value="Login">
</form>
@include('footer')
