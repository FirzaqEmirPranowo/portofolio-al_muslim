@extends('adminpage.partial.layout')
@section('content')
@include('sweetalert::alert')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Daftar Videografi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Videografi</a></li>
                <li class="breadcrumb-item">Tambah Videografi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Videografi</h5>

                        <a href="{{route('vidiografi.create')}}" class="btn btn-md btn-success mb-3 float-right">Tambah
                            Videografi</a>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Link Youtube Video</th>
                                    <th scope="col">Preview</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $no = 1; ?>
                                @foreach($data as $dt)
                                <tr>
                                    <td>{{ $no++ }}</td>

                                    <td>{{ $dt->vidio }}</td>
                                    <td>
                                        <iframe width="560" height="315" src="{{$dt->vidio}}"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen></iframe>

                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('vidiografi.edit', ['id' => $dt->id]) }}"
                                            class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('vidiografi.delete', $dt->id) }}">
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