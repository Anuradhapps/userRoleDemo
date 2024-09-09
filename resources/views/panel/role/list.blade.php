<x-layout>
    <x-header></x-header>
    <x-sidebar></x-sidebar>
    <main id="main" class="main" style="min-height: 80vh">
        <x-pagetitle title="Roles"></x-pagetitle>
        <section class="section">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Role List</h5>
                                <a href="{{ url('panel/role/add') }}" class="btn btn-primary">Add</a>
                            </div>
                            <x-_message/>

                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <th scope="row">{{ $role->id }}</th>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->created_at }}</td>
                                            <td class="d-flex justify-between gap-1">
                                                <form action="{{ url('panel/role/edit/' . $role->id) }}" method="POST" >
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success">Edit</button>
                                                </form>

                                                <form action="{{ url('panel/role/delete/' . $role->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-footer></x-footer>
</x-layout>
