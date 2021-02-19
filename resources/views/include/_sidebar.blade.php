<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a class="nav-link active" data-toggle="pill" aria-selected="true">Dashboard</a>
    <a class="nav-link" data-toggle="pill" aria-selected="false">Employee Management</a>
    <a class="nav-link" data-toggle="collapse" href="#system">
        System Management
        <ul class="list-group list-group-flush collapse" id="system">
            <li class="list-group-item">
                <a href="{{ route('country.index') }}">Country</a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('state.index') }}">State</a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('city.index') }}">City</a>
            </li>
            <li class="list-group-item">
                <a href="{{  route('department.index') }}">Department</a>
            </li>
        </ul>
    </a>
    <a class="nav-link" data-toggle="collapse" href="#user">
        User Management
        <ul class="list-group list-group-flush collapse" id="user">
            <li class="list-group-item">
                <a href="{{ route('users.index') }}">User</a>
            </li>
            <li class="list-group-item">Role</li>
            <li class="list-group-item">Permission</li>
        </ul>
    </a>
</div>