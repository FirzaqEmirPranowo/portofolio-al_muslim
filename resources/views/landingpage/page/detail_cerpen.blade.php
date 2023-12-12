@extends('landingpage.partial.layout')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.html">Home</a></li>
                <li><a href="blog.html">Cerpen</a></li>
                <li>Detail Cerpen</li>
            </ol>
            <h2>Detail Cerpen</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry entry-single">

                        <div class="entry-img">
                            <img src="{{ Storage::url('public/cerpens/').$cerpen->gambar }}" alt="" class="img-fluid">
                        </div>

                        <h2 class="entry-title">
                            <a href="#">{{$cerpen->judul}}</a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="#">{{$cerpen->user->name}}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                        href="#">{{$cerpen->created_at}}</a></li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            <p>{!! $cerpen->isi !!}</p>

                        </div>

                    </article><!-- End blog entry -->

                </div><!-- End blog entries list -->

                <div class="col-lg-4">

                    <div class="sidebar">

                        <h3 class="sidebar-title">Recent Posts</h3>
                        <div class="sidebar-item recent-posts">
                            @foreach ($new as $nw)
                            <div class="post-item clearfix">
                                <h4><a href="{{route('cerpen.detail', ['slug' => $nw->slug])}}">{{$nw->judul}}</a></h4>
                                <time datetime="2020-01-01">{{$nw->created_at}}</time>
                            </div>
                            @endforeach

                        </div><!-- End sidebar recent posts-->



                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->

            </div>

        </div>
    </section><!-- End Blog Single Section -->

</main><!-- End #main -->

@endsection