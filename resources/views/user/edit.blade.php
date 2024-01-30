@include('head')
<h2>User n°{{ $user->id }}</h2>

<form method="POST">
    @csrf

    <label>
        Lastname
        <input type="text" name="lastname" value="{{ $user->lastname }}">
    </label>

    <label>
        Firstname
        <input type="text" name="firstname" value="{{ $user->firstname }}">
    </label>

    <label>
        Email
        <input type="email" name="email" value="{{ $user->email }}">
    </label>

    <input type="submit" value="Modify the user">
</form>
@include('footer')
