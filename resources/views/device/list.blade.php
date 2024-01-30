@include('head')
<h2>Devices List</h2>

@php $devices = \App\Models\Device::all(); @endphp

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
    @foreach($devices as $device)
        <tr class="rowlink" data-href="/device/{{ $device->id }}">
            <th scope="row">{{ $device->id }}</th>
            <th scope="row">{{ $device->name }}</th>
            <th scope="row">{{ $device->type }}</th>
            <th scope="row">{{ $device->ref }}</th>
            <th scope="row">{{ $device->version }}</th>
            <th scope="row">{{ $device->tel }}</th>
            <th scope="row"><img src="data:image/png;base64,{{ base64_encode($device->image) }}"></th>
        </tr>
    @endforeach
    </tbody>
</table>

<a href="/home">Back</a>
@include('footer')
