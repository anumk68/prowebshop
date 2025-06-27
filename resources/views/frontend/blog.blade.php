@extends('frontend.layout.app')

@section('content')


    <div class="banner-about tran5s wow fadeInUp"
        style="
        background: linear-gradient(90deg, #7B7B7B 0%, rgba(84, 81, 81, 0.73) 23.44%, rgba(27, 25, 25, 0.00) 100%),
                    url('{{ asset('public/frontend/img/react_about.jpg') }}') no-repeat center center;
        background-size: cover;
        background-repeat: no-repeat;
        width: 100%;
        min-height: 400px;">
        <div class="container pt-286 pb-170 md-pt-150 md-pb-90">
            <div class="row d-flex align-items-center">
                <div class="text-center" style="margin-top: 140px">
                    <h2 class="h2 mb-20 md-mb-10 position-relative text-white">Blog</h2>
                    {{-- <p><a href="{{ route('blogs') }}">Home - Blog</a></p> --}}
                </div>
            </div>
        </div>
    </div>

    <!--================================banner section end ===========================  -->

    <section class="blog" style="margin-top: 50px;margin-bottom:60px">
        <div class="container">
            <div class="row">
                @foreach ($blogssss as $blogD)
                    <div class="col-md-4 mb-4 d-flex" style="color: black">
                        <a href="{{ route('blog-detail', $blogD->slug ?? '') }}">
                            <div class="card w-100 shadow-sm h-100">
                                <img src="{{ asset('public/storage/' . $blogD->image) }}" class="card-img-top"
                                    style="height: 350px;" alt="Blog Image">

                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $blogD->title }}</h5>

                                    @php
                                        $cleanText = strip_tags($blogD->short_description);
                                        $shortDescription = implode(
                                            ' ',
                                            array_slice(preg_split('/\s+/', $cleanText), 0, 25),
                                        );
                                    @endphp

                                    <p class="card-text text-muted">
                                        {{ \Illuminate\Support\Str::words($blogD->short_description, 20, '...') }}
                                    </p>

                                    <div>
                                        <a href="{{ route('blog-detail', $blogD->slug ?? '') }}">
                                        <button  class="btn_theme">
                                            Read More
                                        </button>
                                        </a>
                                    </div>

                                    {{-- <a href="{{ route('blog-detail', $blogD->slug ?? '') }}"
                                    class="btn btn-primary btn-sm mt-auto w-auto">
                                    Read More
                                </a> --}}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach


            </div>
        </div>
    </section>

    <!--================================blog-page end ===========================  -->
@endsection
@section('scripts')
@endsection
