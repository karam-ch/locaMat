@include('head')
<div class='user-list-container'>
    <h2>Users List</h2>
    
    @php $users = \App\Models\User::all(); @endphp
    
    <table>
        <thead>
            <tr class='user-list-tr'>
                <th scope="col" class='user-list-th'>ID</th>
                <th scope="col" class='user-list-th'>First Name</th>
                <th scope="col" class='user-list-th'>Last Name</th>
                <th scope="col" class='user-list-th'>Email</th>
                <th scope="col" class='user-list-th'>Role</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr class="rowlink user-list-tr" data-href="/user/{{ $user->id }}">
                <th scope="row" class='user-list-th'>{{ $user->id }}</th>
                <th scope="row" class='user-list-th'>{{ $user->firstname }}</th>
                <th scope="row" class='user-list-th'>{{ $user->lastname }}</th>
                <th scope="row" class='user-list-th'>{{ $user->email }}</th>
                <th scope="row" class='user-list-th'>{{ $user->administrator ? 'Administrator' : 'Borrower' }}</th>
                <th>
                    <a href="/user/{{ $user->id }}/edit"><button class='back'>Modify</button></a>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/home"><button class='back'>Back</button></a>
</div>
@include('footer')
