    <h4 class="text-center mt-5">APLIKASI ABSENSI MAGANG</h4>
    <h4 class="text-center">SMK SYAFI'I AKROM</h4>

    <div class="offset-md-4 col-md-4 mt-3">
        <div class="card mb-4 rounded-3 shadow-sm mx-2">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal text-center">Login</h4>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate>
                    <div class="row g-3">
                        <div class="col-12">
                            <input type="text" class="form-control mt-3 p-2" id="firstName" placeholder="Username" value=""
                                required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                        <div class="col-12">
                            <input type="password" class="form-control mt-2 p-2" id="lastName" placeholder="Password" value=""
                                required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>

                        <div class="col-md-12 text-center mb-2 mt-4">
                            <button type="button" class="btn btn-success px-5">LOGIN</button>
                        </div>

                        <span class="text-center mb-2">Belum Punya Akun ?  <a href="<?= base_url('auth_siswa/registrasi') ?>">Daftar</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>