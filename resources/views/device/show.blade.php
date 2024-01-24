<h2>Device n°{{ $device->id }} : {{ $device->name }}</h2>

<form action="/device/{{ $device->id }}/delete" method="POST">
    @csrf
    <input type="submit" value="Delete">
</form>
