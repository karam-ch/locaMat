<h2>Choose your password</h2>
<form method="POST">
    @csrf
    <label>
        Fill in your password
        <input type="password" name="password" required>
    </label>
    <label>
        Confirm your password
        <input type="password" name="password_confirmation" required>
    </label>
    <input type="submit" value="Confirm password">

    @if($errors->any())
        {!! implode('', $errors->all('<div class="errors">:message</div>')) !!}
    @endif
</form>
