<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Register - Portofolio Al Muslim</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets-admin/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets-admin/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets-admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets-admin/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
@include('sweetalert::alert')

<body style="background-image: url({{ asset('assets-admin/img/18410.jpg') }});">

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    {{-- <img src="{{ asset('assets-admin/img/logo.png') }}" alt=""> --}}
                                    <span class="d-none d-lg-block">Portofolio Al Muslim</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2" style="text-align: center">

                                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                        <p class="text-center small">Enter your personal details to create account</p>
                                        <img width="300px" height="auto"
                                            src="{{ asset('assets-admin/img/gambarlogin.png') }}" alt="">
                                    </div>

                                    <form class="row g-3 needs-validation" method="POST"
                                        action="{{ route('proses.register') }}">
                                        @csrf
                                        <div class="col-12">
                                            <label for="name" class="form-label">Nama Lengkap</label>
                                            <div class="input-group has-validation">
                                                {{-- <span class="input-group-text" id="inputGroupPrepend">@</span> --}}
                                                <input type="text" name="name" class="form-control" id="name" required>
                                                <div class="invalid-feedback">Please enter your name.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <div class="input-group has-validation">
                                                {{-- <span class="input-group-text" id="inputGroupPrepend">@</span> --}}
                                                <input type="email" name="email" class="form-control" id="email"
                                                    required>
                                                <div class="invalid-feedback">Please enter your email.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="no_hp" class="form-label">Nomor Hp</label>
                                            <div class="input-group has-validation">
                                                {{-- <span class="input-group-text" id="inputGroupPrepend">@</span> --}}
                                                <input type="number" name="no_hp" class="form-control" id="no_hp"
                                                    required>
                                                <div class="invalid-feedback">Please enter your phone number.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="nis" class="form-label">NIS(Nomor Induk Siswa)</label>
                                            <div class="input-group has-validation">
                                                {{-- <span class="input-group-text" id="inputGroupPrepend">@</span> --}}
                                                <input type="number" name="nis" class="form-control" id="nis" required>
                                                <div class="invalid-feedback">Please enter your NIS.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="kelas" class="form-label">Kelas</label>
                                            <div class="input-group has-validation">
                                                {{-- <span class="input-group-text" id="inputGroupPrepend">@</span> --}}
                                                <select name="kelas" id="kelas" class="form-select" required
                                                    aria-label="Default select example">
                                                    <option value="" disabled selected>-- Pilih --</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                                <div class="invalid-feedback">Please enter your kelas.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="gender" class="form-label">Gender</label>
                                            <div class="input-group has-validation">
                                                {{-- <span class="input-group-text" id="inputGroupPrepend">@</span> --}}
                                                <select name="gender" id="gender" class="form-select" required
                                                    aria-label="Default select example">
                                                    <option value="" disabled selected>-- Pilih --</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                                <div class="invalid-feedback">Please enter your gender.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                {{-- <span class="input-group-text" id="inputGroupPrepend">@</span> --}}
                                                <input type="text" name="username" class="form-control"
                                                    id="yourUsername" required>
                                                <div class="invalid-feedback">Please enter your username.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="password" class="form-label">Password <span
                                                    style="color: red">(Min 8 Karakter)</span></label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="auth-remember-check" onclick="ubahPassword()">
                                                <label class="form-check-label" for="auth-remember-check">Lihat
                                                    Password</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Already have an account?<a href="{{ route('login')}}">
                                                    Login</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <div class="credits">
                                <!-- All the links in the footer should remain intact. -->
                                <!-- You can delete the links only if you purchased the pro version. -->
                                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets-admin/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets-admin/js/main.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    <script>
        function ubahPassword() {
                   var x = document.getElementById("password");
                   var y = document.getElementById("new_password");
                   var z = document.getElementById("new_confirm_password");
                   if (x.type === "password") {
                       x.type = "text";
                       y.type = "text";
                       z.type = "text";
                   } else {
                       x.type = "password";
                       y.type = "password";
                       z.type = "password";
                   }
               }
    </script>

</body>

</html>