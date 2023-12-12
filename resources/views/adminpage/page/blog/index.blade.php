@extends('adminpage.partial.layout')
@section('content')
@include('sweetalert::alert')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Daftar Blog</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Blog</a></li>
                <li class="breadcrumb-item">Tambah Blog</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Blog</h5>

                        <a href="{{route('blog.create')}}" class="btn btn-md btn-success mb-3 float-right">Tambah
                            Blog</a>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Konten</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $no = 1; ?>
                                @foreach($data as $dt)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $dt->judul }}</td>
                                    <td>{!! $dt->isi !!}</td>
                                    <td><img class="rounded" style="width: 150px"
                                            src="{{ Storage::url('public/blogs/').$dt->gambar }}" alt="image"></td>
                                    <td class="text-center">
                                        <a href="{{ route('blog.edit', ['id' => $dt->id]) }}"
                                            class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('blog.delete', $dt->id) }}">
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection