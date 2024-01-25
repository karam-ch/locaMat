<h2>Device n°{{ $device->id }} : {{ $device->name }}</h2>

<form action="/device/{{ $device->id }}/delete" method="POST">
    @csrf
    <input type="submit" value="Delete">

    @if($device->currentBorrow())
        <p>{{ $device->currentBorrow()->user->lastname }}</p>
    @else
        <p>Available</p>
    @endif
</form>

<form method="POST" action="/device/{{ $device->id }}/return">
    @csrf
    <input type="submit" value="Return">
</form>
