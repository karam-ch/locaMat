<h2>User n°{{ $user->id }}</h2>

<form method="POST" action="/user/{{ $user->id }}/delete">
    @csrf
    <input type="submit" value="Delete">
</form>
