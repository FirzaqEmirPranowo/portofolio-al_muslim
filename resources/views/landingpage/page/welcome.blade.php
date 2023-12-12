@extends('landingpage.partial.layout')
@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Website Portofolio SMA Al Muslim</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">Sebuah platform untuk mempublikasikan karya siswa siswi SMA
                    Al Muslim</h2>
                <div data-aos="fade-up" data-aos-delay="600">
                    <div class="text-center text-lg-start">
                        <a href="{{route('register')}}"
                            class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>Register</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{ asset('assets/img/hero-img.png') }}" class="img-fluid" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">

        <div class="container" data-aos="fade-up">
            <div class="row gx-0">

                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="content">
                        <h3>Ekskul Coding</h3>
                        <h2>Mengikuti ekskul coding web akan membantu meningkatkan keterampilan teknis dalam
                            pengembangan
                            web. Peserta akan belajar
                            tentang HTML, CSS, JavaScript, dan PHP.</h2>
                        <p>
                            Membantu peserta memahami konsep-konsep dasar pemrograman, seperti logika
                            pemrograman, pengelolaan data, dan struktur
                            algoritma.
                        </p>
                        <div class="text-center text-lg-start">
                            <a href="{{route('login')}}"
                                class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Login</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('assets/img/about.jpg') }}" class="img-fluid" alt="">
                </div>

            </div>
        </div>

    </section><!-- End About Section -->






    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2>Portfolio Fotografi</h2>
                <a href="{{route('home.list-fotografi')}}">
                    <p>Lihat Karya Fotografi Kami</p>
                </a>

            </header>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                    </ul>
                </div>
            </div>

            <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                @foreach($list_fotografi as $lf)
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="{{ Storage::url('public/fotografis/').$lf->gambar }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>{{$lf->user->name}}</h4>
                            <p>{{$lf->created_at}}</p>
                            <div class="portfolio-links">
                                <a href="{{ Storage::url('public/fotografis/').$lf->gambar }}"
                                    data-gallery="portfolioGallery" class="portfokio-lightbox" title="App 1"><i
                                        class="bi bi-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>

    </section><!-- End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2>Portofolio Cerpen</h2>
                <a href="{{route('home.list-cerpen')}}">
                    <p>Baca Karya Cerpen Kami</p>
                </a>
            </header>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
                <div class="swiper-wrapper">
                    @foreach($list_cerpen as $lc)
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <a href="{{route('cerpen.detail', ['slug' => $lc->slug])}}">
                                <p>
                                    " {{$lc->judul}} "
                                </p>
                            </a>

                            <div class="profile">
                                <img src="{{ Storage::url('public/cerpens/').$lc->gambar }}" class="testimonial-img"
                                    alt="">
                                <h3>{{$lc->user->name}}</h3>
                                <h4>{{$lc->created_at}}</h4>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>

    </section><!-- End Testimonials Section -->

    <!-- ======= Values Section ======= -->
    <section id="values" class="values">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2>Portofolio Video</h2>
                <a href="{{route('home.list-vidiografi')}}">
                    <p>Lihat Karya Video Kami</p>
                </a>
            </header>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
                <div class="swiper-wrapper">
                    @foreach($list_vidiografi as $lv)
                    <div class="swiper-slide">
                        <div class="testimonial-item" data-aos="fade-up" data-aos-delay="600">
                            <div class="box">
                                <iframe width="360" height="auto" src="{{$lv->vidio}}" title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                                <br>
                                <br>
                                <br>
                                <h3>{{$lv->user->name}}</h3>
                                <p>{{$lv->created_at}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>

        </div>

    </section><!-- End Values Section -->



    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2>Portofolio Blog</h2>
                <a href="{{route('home.list-blog')}}">
                    <p>Baca Informasi Diblog Kami</p>
                </a>
            </header>

            <div class="row">
                @foreach($list_blog as $lb)
                <div class="col-lg-4">
                    <div class="post-box">
                        <div class="post-img"><img src="{{ Storage::url('public/blogs/').$lb->gambar }}"
                                class="img-fluid" alt=""></div>
                        <span class="post-date">{{$lb->created_at}}</span>
                        <h3 class="post-title">{{$lb->judul}}</h3>
                        <a href="{{route('blog.detail', ['slug' => $lb->slug])}}"
                            class="readmore stretched-link mt-auto"><span>Read More</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                @endforeach


            </div>

        </div>

    </section><!-- End Recent Blog Posts Section -->


    <!-- ======= Features Section ======= -->
    <section id="features" class="features">

        <div class="container" data-aos="fade-up">

            {{-- <header class="section-header">
                <h2>Features</h2>
                <p>Laboriosam et omnis fuga quis dolor direda fara</p>
            </header> --}}
            <!-- Feature Icons -->
            <div class="row feature-icons" data-aos="fade-up">
                <h3>Inilah Website Karya Kelas Ekstrakulikuler Coding</h3>

                <div class="row">

                    <div class="col-xl-4 text-center" data-aos="fade-right" data-aos-delay="100">
                        <img src="{{ asset('assets/img/features-3.png') }}" class="img-fluid p-4" alt="">
                    </div>

                    <div class="col-xl-8 d-flex content">
                        <div class="row align-self-center gy-4">

                            <div class="col-md-6 icon-box" data-aos="fade-up">
                                <i class="ri-line-chart-line"></i>
                                <div>
                                    <h4>Peningkatan Keterampilan Teknis</h4>
                                    <p>Membantu meningkatkan keterampilan teknis dalam pengembangan web</p>
                                </div>
                            </div>

                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                                <i class="ri-stack-line"></i>
                                <div>
                                    <h4>Pemahaman Konsep Pemrograman</h4>
                                    <p>Membantu peserta memahami konsep-konsep dasar pemrograman, seperti logika
                                        pemrograman, pengelolaan data, dan struktur
                                        algoritma</p>
                                </div>
                            </div>

                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                                <i class="ri-brush-4-line"></i>
                                <div>
                                    <h4>Kreativitas dan Desain</h4>
                                    <p>Memungkinkan peserta untuk menggabungkan keterampilan teknis dengan kreativitas
                                        dalam desain web</p>
                                </div>
                            </div>

                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                                <i class="ri-magic-line"></i>
                                <div>
                                    <h4>Kolaborasi Tim</h4>
                                    <p>Memungkinkan peserta untuk mengembangkan keterampilan kolaborasi
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                                <i class="ri-command-line"></i>
                                <div>
                                    <h4>Pemecahan Masalah</h4>
                                    <p>Peserta dapat mengasah keterampilan pemecahan masalah mereka dengan mengatasi
                                        tantangan dan bug dalam kode
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                                <i class="ri-radar-line"></i>
                                <div>
                                    <h4>Pertemanan dan Jaringan</h4>
                                    <p>Memungkinkan peserta untuk bertemu dengan orang-orang yang memiliki minat serupa
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div><!-- End Feature Icons -->

        </div>

    </section><!-- End Features Section -->


</main><!-- End #main -->
@endsection