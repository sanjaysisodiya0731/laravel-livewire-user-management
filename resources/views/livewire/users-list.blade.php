<div>

    @if(session()->has('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if($userAction=='add')
        <h2>Livewire Users: List</h2>
        <button wire:click="redirectAddUser">Add User</button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>FullName</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $key=>$user)
                <tr>
                    <td>{{ $key+1}}</td>
                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <a href="javascript:void(0)" wire:click="deleteUser({{$user->id}})">Delete</a>
                        <button wire:click="editUser({{$user->id}})">Edit</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{$users->links()}}
        </div>
    @else

        <livewire:edit-user :userData="$userData" :edit_id="$edit_id" :first_name="$first_name" :last_name="$last_name" :email="$email"/>
    @endif
</div>
