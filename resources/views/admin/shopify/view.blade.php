@extends('admin.layout.app')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
    <div class="container custom-width mt-3 mb-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Shopify Packages
                            <a href="{{ route('create-shopify') }}" style="float: inline-end"><button
                                    class="btn btn-dark mt-2">Add Package</button></a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Sort Column</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="cate">
                                    @foreach ($shopify as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td> {!! implode(' ', array_slice(explode(' ', strip_tags($item->description)), 0, 8)) . '...' !!}</td>
                                            <td>{{ $item->amount }}</td>
                                            <td>
                                                @if ($item->image && file_exists('storage/' . $item->image))
                                                    <img src="{{ asset('storage/' . $item->image) }}" width="100"
                                                        height="100" alt="About Image">
                                                @else
                                                    {{ '' }}
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('create-shopify', $item->id) }}"
                                                        class="btn btn-info btn-sm mx-2"> <i class="fa fa-edit"
                                                            style="font-size:20px;color:#fff;"></i></a>
                                                    <form action="{{ route('updateStatus-shopify', $item->id) }}"
                                                        method="post" id="delete-form-{{ $item->id }}"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="confirmDelete({{ $item->id }})"> <i
                                                                class="fa fa-trash"
                                                                style="font-size:20px;color:#fff"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function confirmDelete(id) {
            const confirmation = confirm("Are you sure you want to delete this record?");
            if (confirmation) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
@endsection
