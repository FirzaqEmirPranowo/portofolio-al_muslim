@extends('adminpage.partial.layout')
@section('content')
@include('sweetalert::alert')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Cerpen</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Cerpen</a></li>
                <li class="breadcrumb-item">Daftar Cerpen</li>
                <li class="breadcrumb-item active">Edit Cerpen</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Cerpen</h5>

                        <!-- General Form Elements -->
                        <form action="{{ route('cerpen.update',['id' => $cerpen->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                        name="gambar">

                                    <!-- error message untuk title -->
                                    @error('gambar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                        name="judul" value="{{ old('judul', $cerpen->judul) }}"
                                        placeholder="Masukkan Judul Infografis" required>

                                    <!-- error message untuk judul -->
                                    @error('judul')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="isi" class="col-sm-2 col-form-label">Konten</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control @error('isi') is-invalid @enderror" name="isi"
                                        rows="5" placeholder="Masukkan Konten Infografis"
                                        required>{{ old('isi', $cerpen->isi) }}</textarea>

                                    <!-- error message untuk isi -->
                                    @error('isi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
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

@push('js')
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'isi' );
</script>
@endpush