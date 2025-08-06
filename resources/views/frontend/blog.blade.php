@extends('frontend.layout.app')

@section('content')
    <div class="banner-about tran5s wow fadeInUp"
        style="
        background: linear-gradient(90deg, #7B7B7B 0%, rgba(84, 81, 81, 0.73) 23.44%, rgba(27, 25, 25, 0.00) 100%),
                    url('{{ asset('public/frontend/img/react_about.jpg') }}') no-repeat center center;
        background-size: cover;
        width: 100%;
        min-height: 400px;">
        <div class="container pt-286 pb-170 md-pt-150 md-pb-90">
            <div class="row d-flex align-items-center">
                <div class="text-center" style="margin-top: 140px">
                    <h1 class="h2 mb-20 md-mb-10 position-relative text-white">Blogs</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="blog" style="margin-top: 50px; margin-bottom: 60px;">
        <div class="container">
            <div class="row">
                @foreach ($blogssss->take(9) as $blogD) {{-- Shows max 9 blogs --}}
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="card h-100 shadow-sm">
                            <a href="{{ route('blog-detail', $blogD->slug ?? '') }}">
                                <img src="{{ asset('public/storage/' . $blogD->image) }}"
                                     class="card-img-top" alt="{{ $blogD->title }}"
                                     style="height: 250px; object-fit: cover;">
                            </a>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-dark">
                                    {{ \Illuminate\Support\Str::limit($blogD->title, 50, '...') }}
                                </h5>

                                @php
                                    $cleanText = strip_tags($blogD->short_description);
                                    $shortDescription = implode(
                                        ' ',
                                        array_slice(preg_split('/\s+/', $cleanText), 0, 25)
                                    );
                                @endphp

                                <p class="card-text text-muted">
                                    {{ Str::limit($shortDescription, 80, '...') }}
                                </p>

                                <div class="mt-auto">
                                    <a href="{{ route('blog-detail', $blogD->slug ?? '') }}">
                                        <button class="btn_theme btn_blog space_blog">
                                            Read More
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Static pagination design -->
            <div class="row">
                <div class="col-12 d-flex justify-content-center mt-4">
                    <ul class="pagination custom-pagination">
                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
@endsection
