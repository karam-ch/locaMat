@include('head')
<div class='me-container'>
    <h2>User n°{{ Auth::user()->id }}</h2>
    <table>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr class="rowlink" data-href="/user/{{ Auth::user()->id }}">
                <th scope="row">{{ Auth::user()->id }}</th>
                <th scope="row">{{ Auth::user()->firstname }}</th>
                <th scope="row">{{ Auth::user()->lastname }}</th>
                <th scope="row">{{ Auth::user()->email }}</th>
                <th scope="row">{{ Auth::user()->administrator ? 'Administrator' : 'Borrower' }}</th>
            </tr>
        </tbody>
    </table>

    <h3>Current Devices List</h3>
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
        @foreach(Auth::user()->current_borrows() as $borrow)
        <tr class="rowlink" data-href="/device/{{ $borrow->device->id }}">
            <th scope="row">{{ $borrow->device->id }}</th>
            <th scope="row">{{ $borrow->device->name }}</th>
                <th scope="row">{{ $borrow->device->type }}</th>
                <th scope="row">{{ $borrow->device->ref }}</th>
                <th scope="row">{{ $borrow->device->version }}</th>
                <th scope="row">{{ $borrow->device->tel }}</th>
                <th scope="row"><img src="data:image/png;base64,{{ base64_encode($borrow->device->image) }}"></th>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Old Devices List</h3>
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
            <th scope="col">Return</th>
        </tr>
    </thead>
    <tbody>
        @foreach(Auth::user()->old_borrows() as $borrow)
            <tr class="rowlink" data-href="/device/{{ $borrow->device->id }}">
                <th scope="row">{{ $borrow->device->id }}</th>
                <th scope="row">{{ $borrow->device->name }}</th>
                <th scope="row">{{ $borrow->device->type }}</th>
                <th scope="row">{{ $borrow->device->ref }}</th>
                <th scope="row">{{ $borrow->device->version }}</th>
                <th scope="row">{{ $borrow->device->tel }}</th>
                <th scope="row"><img src="data:image/png;base64,{{ base64_encode($borrow->device->image) }}"></th>
                <th scope="row">{{ $borrow->end_date }}</th>
            </tr>
            @endforeach
        </tbody>
    </table>


    <div class="actions">
        <div class="action">
            <a href="/user/{{ Auth::user()->id }}/edit">Modify</a>
        </div>

        <div class="action">
            <form action="/user/{{ Auth::user()->id }}/delete" method="POST">
                @csrf
                <input type="submit" value="Delete">
            </form>
        </div>
        @if(Auth::user()->administrator)
            <a href="/home" class='back'>Back</a>
        @else
            <a href="/device/list" class="back">Back</a>
        @endif
    </div>

</div>

@include('footer')
