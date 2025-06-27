@extends('admin.layout.app')

@section('styles')


    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 24px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #28a745;
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }
    </style>
@endsection

@section('content')
    <div class="container custom-width mt-3 mb-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Packages
                            <a href="{{ route('addPackages') }}" class="float-end">
                                <button class="btn btn-dark mt-2">Add Package</button>
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center display responsive nowrap" id="dataTable" width="100%">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Type</th>
                                        <th>Title</th>
                                        <th>Ideal</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($package as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->typess->type ?? '' }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{!! implode(' ', array_slice(explode(' ', strip_tags($item->ideal)), 0, 2)) . '...' !!}</td>
                                            <td>{!! implode(' ', array_slice(explode(' ', strip_tags($item->description)), 0, 5)) . '...' !!}</td>
                                            <td>{{ $item->amount }}</td>
                                            <td>
                                                @if ($item->image && file_exists('storage/' . $item->image))
                                                    <img src="{{ asset('storage/' . $item->image) }}" width="100" height="100" alt="Package Image">
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('addPackages', $item->id) }}" class="btn btn-info btn-sm mx-2">
                                                        <i class="fa fa-edit" style="font-size:20px;color:#fff;"></i>
                                                    </a>
                                                    <form action="{{ route('updateStatus-package', $item->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm" style="border: none; background: none;">
                                                            <label class="switch">
                                                                <input type="checkbox" onchange="this.form.submit()" {{ $item->is_active ? 'checked' : '' }}>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </button>
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

