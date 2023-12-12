@extends('adminpage.partial.layout')
@section('content')
@include('sweetalert::alert')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Videografi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Videografi</a></li>
                <li class="breadcrumb-item">Daftar Videografi</li>
                <li class="breadcrumb-item active">Tambah Videografi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Buat Videografi</h5>

                        <!-- General Form Elements -->
                        <form action="{{ route('vidiografi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="vidio" class="col-sm-2 col-form-label">Link Youtube</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('vidio') is-invalid @enderror"
                                        name="vidio" value="{{ old('vidio') }}" placeholder="Masukkan Link Video"
                                        required>

                                    <!-- error message untuk vidio -->
                                    @error('vidio')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <span style="color: red">* pastikan linknya berbentuk embed link <br>contohnya:
                                    https://www.youtube.com/embed/bi8f3JXV5es?si=WsZC9gNz1Or_uvp0 | bisa diambil
                                    dibagikan iframe</span>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>


        </div>
    </section>

</main><!-- End #main -->

@endsection