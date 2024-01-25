<form method="POST">
    @csrf
    <label>
        Lastname
        <input type="text" name="lastname">
    </label>

    <label>
        Firstname
        <input type="text" name="firstname">
    </label>

    <label>
        Email
        <input type="email" name="email">
    </label>

    <label>
        Role
        <select name="role">
            <option value="borrower">Borrower</option>
            <option value="administrator">Administrator</option>
        </select>
    </label>

    <input type="submit" value="Create the user">

    @if($errors->any())
        {!! implode('', $errors->all('<div class="errors">:message</div>')) !!}
    @endif

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif
</form>
