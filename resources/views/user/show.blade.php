@include('head')
<h2>User n°{{ $user->id }}</h2>
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
        <tr class="rowlink" data-href="/user/{{ $user->id }}">
            <th scope="row">{{ $user->id }}</th>
            <th scope="row">{{ $user->firstname }}</th>
            <th scope="row">{{ $user->lastname }}</th>
            <th scope="row">{{ $user->email }}</th>
            <th scope="row">{{ $user->administrator ? 'Administrator' : 'Borrower' }}</th>
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
    @foreach($user->current_borrows() as $borrow)
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
    @foreach($user->old_borrows() as $borrow)
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
        <a href="/user/{{ $user->id }}/edit">Modify</a>
    </div>

    <div class="action">
        <form action="/user/{{ $user->id }}/delete" method="POST">
            @csrf
            <input type="submit" value="Delete">
        </form>
    </div>
</div>

<a href="/user/list">Back</a>

@include('footer')
