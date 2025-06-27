@extends('admin.layout.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container custom-width mt-3 mb-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Setting</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('meta.store') }}" method="POST" class="mt-4">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="meta_type">Select Meta Type:</label>
                                <select class="form-control @error('meta_type') is-invalid @enderror" id="meta_type"
                                    name="meta_type">
                                    <option value="">Select your meta type</option>
                                    <option value="description" {{ old('meta_type') == 'description' ? 'selected' : '' }}>
                                        Description</option>
                                    <option value="keywords" {{ old('meta_type') == 'keywords' ? 'selected' : '' }}>Keywords
                                    </option>
                                    <option value="title" {{ old('meta_type') == 'title' ? 'selected' : '' }}>Title
                                    </option>
                                </select>
                                @error('meta_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="meta_name">Name:</label>
                                <input type="text" class="form-control @error('meta_name') is-invalid @enderror"
                                    id="meta_name" name="meta_name" value="{{ old('meta_name') }}">
                                @error('meta_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="meta_value">Value To Display:</label>
                                <input type="text" class="form-control @error('meta_value') is-invalid @enderror"
                                    id="meta_value" name="meta_value" value="{{ old('meta_value') }}">
                                @error('meta_value')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Add Value</button>
                        </form>

                        <ul class="nav nav-tabs" id="metaTabs" role="tablist" style="margin-top:1%">
                            <li class="nav-item">
                                <a class="nav-link active" id="description-tab-btn" data-bs-toggle="tab"
                                    href="#description-tab" role="tab">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="keywords-tab-btn" data-bs-toggle="tab" href="#keywords-tab"
                                    role="tab">Keywords</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="title-tab-btn" data-bs-toggle="tab" href="#title-tab"
                                    role="tab">Title</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-4">

                            <div class="tab-pane fade show active" id="description-tab" role="tabpanel">
                                <table class="table table-bordered text-center" style="background-color: #d1e7dd;">
                                    <thead>
                                        <tr>
                                            <th>Sr.no</th>
                                            <th><strong>Meta Name</strong></th>
                                            <th><strong>Meta Value</strong></th>
                                            <th><strong>Action</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($descriptions as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->meta_name }}</td>
                                                <td>{{ $item->meta_value }}</td>
                                                <td>
                                                    <a href="{{ url('meta-edit/' . $item->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="keywords-tab" role="tabpanel">
                                <table class="table table-bordered text-center" style="background-color: #d1e7dd;">
                                    <thead>
                                        <tr>
                                            <th>Sr.no</th>
                                            <th><strong>Meta Name</strong></th>
                                            <th><strong>Meta Value</strong></th>
                                            <th><strong>Action</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($keywords as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->meta_name }}</td>
                                                <td>{{ $item->meta_value }}</td>
                                                <td>
                                                    <a href="{{ url('meta-edit/' . $item->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="title-tab" role="tabpanel">
                                <table class="table table-bordered text-center" style="background-color: #d1e7dd;">
                                    <thead>
                                        <tr>
                                            <th>Sr.no</th>
                                            <th><strong>Meta Name</strong></th>
                                            <th><strong>Meta Value</strong></th>
                                            <th><strong>Action</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($titles as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->meta_name }}</td>
                                                <td>{{ $item->meta_value }}</td>
                                                <td>
                                                    <a href="{{ url('meta-edit/' . $item->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
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
    </div>
@endsection
