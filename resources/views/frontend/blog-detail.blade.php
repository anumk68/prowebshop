@extends('frontend.layout.app')
@section('content')
    <div class="banner-about tran5s wow fadeInUp blog_detail_banner"
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
                    <h1>{{ $blogDetails->title }}</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="blog_detail_page">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @if ($blogDetails->image)
                        <img src="{{ asset('public/storage/' . $blogDetails->image) }}" class="img-fluid rounded mb-4"
                            alt="{{ $blogDetails->title }}" style="height: 500px; width: 100%;">
                    @endif
                    <div class="blog-description">
                        {!! $blogDetails->description !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="mb-3">Recent Posts</h5>
                    <div class="list-group">
                        @foreach ($recentBlogs as $recent)
                            <a href="{{ route('blog-detail', $recent->slug) }}"
                                class="list-group-item list-group-item-action d-flex align-items-start">
                                <img src="{{ asset('public/storage/' . $recent->image) }}" alt="{{ $recent->title }}"
                                    class="me-3 rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">{{ Str::limit($recent->title, 40) }}</h6>
                                    <small class="text-muted">{{ $recent->created_at->format('M d, Y') }}</small>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
