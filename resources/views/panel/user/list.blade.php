<x-layout>
    <x-header></x-header>
    <x-sidebar></x-sidebar>
    <main id="main" class="main" style="min-height: 80vh">
        <x-pagetitle title="users"></x-pagetitle>
        <section class="section">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">User List</h5>
                                @if (in_array('user add', $permissionNames))
                                    <a href="{{ url('panel/user/add') }}" class="btn btn-primary">Add</a>
                                @endif
                            </div>
                            <x-_message />

                            <!-- Default Table -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Created At</th>
                                            @if (in_array('user edit', $permissionNames) || in_array('user delete', $permissionNames))
                                                <th scope="col">Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <th scope="row">{{ $user->id }}</th>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->role->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                @if (in_array('user edit', $permissionNames) || in_array('user delete', $permissionNames))
                                                    <td class="d-flex justify-between gap-1">
                                                        <form action="{{ url('panel/user/edit/' . $user->id) }}"
                                                            method="GET">
                                                            @csrf
                                                            @if (in_array('user edit', $permissionNames))
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-success">Edit</button>
                                                            @endif
                                                        </form>

                                                        <form action="{{ url('panel/user/delete/' . $user->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            @if (in_array('user delete', $permissionNames))
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-danger">Delete</button>
                                                            @endif

                                                        </form>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-footer></x-footer>
</x-layout>
