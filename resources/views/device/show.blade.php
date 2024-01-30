@include('head')
<h2>Device n°{{ $device->id }} : {{ $device->name }}</h2>
<table>
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Type</th>
        <th scope="col">Reference</th>
        <th scope="col">Version</th>
        <th scope="col">Num tel</th>
        <th scope="col">Photo</th>
    </tr>
    </thead>
    <tbody>
        <tr class="rowlink" data-href="/device/{{ $device->id }}">
            <th scope="row">{{ $device->id }}</th>
            <th scope="row">{{ $device->name }}</th>
            <th scope="row">{{ $device->type }}</th>
            <th scope="row">{{ $device->ref }}</th>
            <th scope="row">{{ $device->version }}</th>
            <th scope="row">{{ $device->tel }}</th>
            <th scope="row"><img src="data:image/png;base64,{{ base64_encode($device->image) }}"></th>
        </tr>
    </tbody>
</table>

<div class="actions">
    @if(Auth::user()->administrator)
        <div class="action">
            <a href="/device/{{ $device->id }}/edit">Modify</a>
        </div>

        <div class="action">
            <form action="/device/{{ $device->id }}/delete" method="POST">
                @csrf
                <input type="submit" value="Delete">
            </form>
        </div>
    @endif

    <div class="action">
        <form action="/device/{{ $device->id }}/borrow" method="POST">
            @csrf
            <label>
                Date
                <input type="date" name="date">
            </label>
            @if($device->currentBorrow())
                <input type="submit" disabled value="Borrow">
            @else
                <input type="submit" value="Borrow">
            @endif
        </form>
    </div>
</div>

<div class="info">
    @if($device->currentBorrow())
        @if($device->currentBorrow()->user->id == Auth::user()->id)
            <p>You are currently borrowing this device. Click bellow to return it.</p>
            <form action="/device/{{ $device->id }}/return" method="POST">
                @csrf
                <input type="submit" value="Return">
            </form>
        @else
            <p>This device is borrowed by {{ $device->currentBorrow()->user->lastname }} until the {{ $device->currentBorrow()->end_date }}.</p>
        @endif
    @else
        <p>This device is available.</p>
    @endif
</div>

<a href="/device/list">Back</a>

@include('footer')
