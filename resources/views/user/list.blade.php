@include('head')
<h2>Users List</h2>

@php $users = \App\Models\User::all(); @endphp

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
    @foreach($users as $user)
        <tr class="rowlink" data-href="/user/{{ $user->id }}">
            <th scope="row">{{ $user->id }}</th>
            <th scope="row">{{ $user->firstname }}</th>
            <th scope="row">{{ $user->lastname }}</th>
            <th scope="row">{{ $user->email }}</th>
            <th scope="row">{{ $user->administrator ? 'Administrator' : 'Borrower' }}</th>
        </tr>
    @endforeach
    </tbody>
</table>

<a href="/home">Back</a>
@include('footer')
