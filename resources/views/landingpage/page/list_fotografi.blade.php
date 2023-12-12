@extends('landingpage.partial.layout')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.html">Home</a></li>
                <li>Fotografi</li>
            </ol>
            <h2>Fotografi</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">
                    {{-- foreach --}}
                    @foreach($list_fotografi as $item)
                    <article class="entry">
                        <br>
                        <div class="text-center">
                            <img class="rounded" style="width: 450px"
                                src="{{ Storage::url('public/fotografis/').$item->gambar }}" alt="image">

                        </div>

                        <h2 class="entry-title">
                            <a href="blog-single.html">{{$item->judul}}</a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="blog-single.html">{{$item->user->name}}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                        href="blog-single.html">{{$item->created_at}}</a></li>
                            </ul>
                        </div>

                    </article><!-- End blog entry -->
                    @endforeach
                </div><!-- End blog entries list -->



            </div>

        </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->
@endsection