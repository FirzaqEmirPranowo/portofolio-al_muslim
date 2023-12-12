@extends('landingpage.partial.layout')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.html">Home</a></li>
                <li>Cerpen</li>
            </ol>
            <h2>Cerpen</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">
                    {{-- foreach --}}
                    @foreach ($list_cerpen as $item)
                    <article class="entry">

                        <h2 class="entry-title">
                            <a href="{{route('cerpen.detail', ['slug' => $item->slug])}}">{{$item->judul}}</a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i>
                                    <a
                                        href="{{route('cerpen.detail', ['slug' => $item->slug])}}">{{$item->user->name}}</a>
                                </li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                        href="{{route('cerpen.detail', ['slug' => $item->slug])}}">{{$item->created_at}}</a>
                                </li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            <p>{{$item->isi}}</p>
                        </div>

                    </article><!-- End blog entry -->
                    @endforeach
                </div><!-- End blog entries list -->

                <div class="col-lg-4">

                    <div class="sidebar">


                        <h3 class="sidebar-title">Recent Posts</h3>
                        <div class="sidebar-item recent-posts">
                            {{-- foreach --}}
                            @foreach ($recent_cerpen as $new)
                            <div class="post-item clearfix">
                                <h4><a href="{{route('cerpen.detail', ['slug' => $item->slug])}}">{{$new->judul}}</a>
                                </h4>
                                <time datetime="2020-01-01">{{$new->created_at}}</time>
                            </div>
                            @endforeach

                        </div><!-- End sidebar recent posts-->


                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->

            </div>

        </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->
@endsection