@extends('admin.layout.app')

@section('styles')
@endsection

@section('content')
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3">
        <a href="{{ route('packages') }}">
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Packages</p>
                                <h4 class="my-1">{{ $packages }}</h4>
                            </div>
                            <div class="widget-icon-large bg-gradient-purple text-white ms-auto"><i
                                    class="bi bi-basket2-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{ route('types') }}">
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Package Type</p>
                                <h4 class="my-1">{{ $typess }}</h4>
                            </div>
                            <div class="widget-icon-large bg-gradient-purple text-white ms-auto"><i
                                    class="bi bi-basket2-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        {{-- <a href="{{ route('users') }}">
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Today Register User's</p>
                                <h4 class="my-1">{{ $todayUsers }}</h4>
                            </div>
                            <div class="widget-icon-large bg-gradient-purple text-white ms-auto">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a> --}}
        {{-- <a href="{{ route('users') }}">
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total User's</p>
                                <h4 class="my-1">{{ $users }}</h4>
                            </div>
                            <div class="widget-icon-large bg-gradient-purple text-white ms-auto"><i
                                    class="bi bi-person-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a> --}}

        <a href="{{ route('blogss') }}">
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Blogs</p>
                                <h4 class="my-1">{{ $totalblogs }}</h4>
                            </div>
                            <div class="widget-icon-large bg-gradient-purple text-white ms-auto">
                                <i class="bi bi-journal-text"></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <a href="{{ route('orders.list') }}">
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Orders</p>
                                <h4 class="my-1">
                                    @php
                                      $order =  App\Models\Order::get();

                                    @endphp
                                     {{$order->count();}}
                                </h4>
                            </div>
                            <div class="widget-icon-large bg-gradient-purple text-white ms-auto">
                           <i class="bi bi-journal-text me-2"></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        {{--  <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Blog Categories</p>
                            <h4 class="my-1">{{$categories}}</h4>
                        </div>
                        <div class="widget-icon-large bg-gradient-purple text-white ms-auto"><i
                                class="bi bi-basket2-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                        <div>
                            <p class="mb-0 text-secondary">Mails</p>
                            <h4 class="my-1">{{$mailss}}</h4>
                        </div>
                        <div class="widget-icon-large bg-gradient-purple text-white ms-auto"><i
                                class="bi bi-basket2-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
@section('scripts')
@endsection
