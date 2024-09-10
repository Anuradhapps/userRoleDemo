<x-layout>
    <x-header />
    <x-sidebar />
    <main id="main" class="main" style="min-height: 80vh">
        <x-pagetitle title="Add Role" />
        <section class="section">
            <div class="row">
                <div class="col-lg-10">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Update Role</h5>

                            <!-- General Form Elements -->
                            <form action="{{ url('/panel/role/update/' . $role->id) }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-12 col-form-label">Role name</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $role->name }}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-12 col-form-label"><strong>Permissions</strong>
                                    </label>
                                    @foreach ($data as $permissions)
                                        <div class="row mb-3">
                                            <div class="col-md-2 ps-3  p-1 me-1">
                                                {{ $permissions['name'] }}
                                            </div>
                                            <div class="col-md-9 border border-1">
                                                <div class="row">
                                                    @foreach ($permissions['group'] as $permission)
                                                        @php
                                                            $checked = '';
                                                        @endphp
                                                        @foreach ($permissionIds as $permissionId)
                                                            @if ($permission['id'] == $permissionId)
                                                                @php
                                                                    $checked = 'checked';
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                        <div class="col-md-3 p-1 rounded-sm">
                                                            <input type="checkbox" {{ $checked }}
                                                                name="permission_id[]" value="{{ $permission['id'] }}">
                                                            {{ $permission['name'] }}
                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class=" mb-3 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>

                            </form><!-- End General Form Elements -->

                        </div>
                    </div>

                </div>

            </div>
        </section>


    </main>
    <x-footer />
</x-layout>
