@extends('layouts.master_home')

@section('home_content')

        <main id="main">

            <!-- ======= Breadcrumbs ======= -->
            <section id="breadcrumbs" class="breadcrumbs">
                <div class="container">

                    <div class="d-flex justify-content-between align-items-center">
                        <h2>Portfolio</h2>
                        <ol>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li>Portoflio</li>
                        </ol>
                    </div>

                </div>
            </section><!-- End Breadcrumbs -->

            <!-- ======= Portfolio Section ======= -->
            <section id="portfolio" class="portfolio">
                <div class="container">

                    <div class="section-title" data-aos="fade-up">
                        <h2>Portfolio</h2>
                    </div>

                    <div class="row" data-aos="fade-up">
                        <div class="col-lg-12 d-flex justify-content-center">
                            {{-- <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-app">App</li>
                            <li data-filter=".filter-card">Card</li>
                            <li data-filter=".filter-web">Web</li>
                        </ul> --}}
                        </div>
                    </div>

                    <div class="row portfolio-container" data-aos="fade-up">

                        @foreach ($images as $image)

                            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                                <img src="{{ asset($image->image) }}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>App 1</h4>
                                    <p>App</p>
                                    <a href="{{ asset($image->image) }}" data-gall="portfolioGallery"
                                        class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                                    {{-- <a href="" class="details-link" title="More Details"><i
                                    class="bx bx-link"></i></a> --}}
                                </div>
                            </div>

                        @endforeach

                    </div>

                </div>
            </section><!-- End Portfolio Section -->

        </main><!-- End #main -->

    @endsection
