<x-layout>
    <x-header />
    <x-sidebar />
    <main id="main" class="main" style="min-height: 80vh">
        <x-pagetitle title="Add Role" />
        <section class="section">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Update Role</h5>

                            <!-- General Form Elements -->
                            <form action="{{ url('/panel/role/update/'.$role->id) }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-12 col-form-label">Role name</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="name" class="form-control" value="{{ $role->name }}" required>
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
