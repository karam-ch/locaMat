@include('head')
<div class='device-list-container'>
    <h2>Devices List</h2>
    @php $devices = \App\Models\Device::all(); @endphp
    <table>
        <thead>
            <tr class='device-list-tr'>
                <th scope="col" class='device-list-th'>ID</th>
                <th scope="col" class='device-list-th'>Name</th>
                <th scope="col" class='device-list-th'>Type</th>
                <th scope="col" class='device-list-th'>Reference</th>
                <th scope="col" class='device-list-th'>Version</th>
                <th scope="col" class='device-list-th'>Num tel</th>
                <th scope="col" class='device-list-th'>Photo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($devices as $device)
            <tr class="rowlink device-list-tr" data-href="/device/{{ $device->id }}">
                <th scope="row" class='device-list-th'>{{ $device->id }}</th>
                <th scope="row" class='device-list-th'>{{ $device->name }}</th>
                <th scope="row" class='device-list-th'>{{ $device->type }}</th>
                <th scope="row" class='device-list-th'>{{ $device->ref }}</th>
                <th scope="row" class='device-list-th'>{{ $device->version }}</th>
                <th scope="row" class='device-list-th'>{{ $device->tel }}</th>
                <th scope="row" class='device-list-th'><img src="data:image/png;base64,{{ base64_encode($device->image) }}"></th>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/home"><button class='back'>Back</button></a>
</div>

@include('footer')
