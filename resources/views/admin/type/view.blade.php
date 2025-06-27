@extends('admin.layout.app')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
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

        input:checked+.slider {
            background-color: #28a745;
        }

        input:checked+.slider:before {
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
                        <h4>Types
                            <a href="{{ route('addtypes') }}" style="float: inline-end"><button class="btn btn-dark mt-2">Add
                                    Type</button></a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Type</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="cate">
                                    @foreach ($type as $item)
                                        <tr>
                                            <td>{{ $loop->iteration  }}</td>
                                            <td>{{ $item->type }}</td>
                                            <td>
                                                <form action="{{ route('toggleStatus-type', $item->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm"
                                                        style="border:none; background:none;">
                                                        <label class="switch">
                                                            <input type="checkbox" onchange="this.form.submit()"
                                                                {{ $item->is_active ? 'checked' : '' }}>
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </button>
                                                </form>
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

