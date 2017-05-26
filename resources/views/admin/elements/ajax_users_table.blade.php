@if(!$users->isEmpty())
    <table class="table table-bordered">
        <tbody><tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->roleName}}</td>
                <td><span class="label {{Statuses::getClassName($user->statusName)}}">{{$user->statusName}}</span></td>
                <td>
                    <a href="/admin/editUser/{{$user->id}}"><span class="label label-warning"><i class="icon fa fa-close"></i> Edit</span></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
    <span>Empty</span>
@endif