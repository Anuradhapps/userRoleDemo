<x-layout>
    <x-header />
    <x-sidebar />
    <main id="main" class="main" style="min-height: 80vh">
        <x-pagetitle title="Add user" />
        <section class="section">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add New User</h5>

                            <!-- General Form Elements -->
                            <form action="{{ url('/panel/user/insert') }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-12 col-form-label">User name</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                </div>


                                <div class=" mb-3 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Add</button>
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
