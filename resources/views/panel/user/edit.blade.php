<x-layout>
    <x-header />
    <x-sidebar />
    <main id="main" class="main" style="min-height: 80vh">
        <x-pagetitle title="Edit user" />
        <section class="section">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit User</h5>

                            <!-- General Form Elements -->
                            <form  method="POST" action="{{ url('/panel/user/update/' . $user->id) }}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-12 col-form-label">User name</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                                    </div>
                                </div>
                                @error('name')
                                    <x-error_message>{{ $message }}</x-error_message>
                                @enderror
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-12 col-form-label">email</label>
                                    <div class="col-sm-12">
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                                    </div>
                                </div>
                                @error('email')
                                    <x-error_message>{{ $message }}</x-error_message>
                                @enderror
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-12 col-form-label">Password</label>
                                    <div class="col-sm-12">
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                </div>
                                @error('password')
                                    <x-error_message>{{ $message }}</x-error_message>
                                @enderror
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-12 col-form-label">Select Role</label>
                                    <div class="col-sm-12">
                                        <select class="form-select" name="role_id" id="">
                                            @foreach ($roles as $role)
                                                <option {{ ($user->role_id==$role->id ? 'selected' : '') }} value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
