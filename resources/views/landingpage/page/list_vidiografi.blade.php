@extends('landingpage.partial.layout')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.html">Home</a></li>
                <li>Videografi</li>
            </ol>
            <h2>Videografi</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">
                    {{-- foreach --}}
                    @foreach($list_vidiografi as $item)
                    <article class="entry">
                        <br>
                        <div class="entry-img text-center">
                            {{-- <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid"> --}}
                            <iframe width="660" height="315" src="{{$item->vidio}}" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>

                        <h2 class="entry-title">
                            {{-- <a href="blog-single.html">{{$item->judul}}</a> --}}
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