@include('head')
<div class="add-user-form-container">
    <h1>Add a user</h1>
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
    </form>
</div>
@include('footer')
