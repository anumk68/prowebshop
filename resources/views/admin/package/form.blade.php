@extends('admin.layout.app')

@section('styles')
@endsection

@section('content')
<div class="container custom-width mt-3">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-2 text-gray-800">
                {{ isset($package) ? 'Edit' : 'Add' }} Package
                <a href="{{ route('packages') }}" class="btn btn-dark" style="float: inline-end">Back</a>
            </h1>
        </div>

        @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif

        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ isset($package) ? route('update-package', $package->id) : route('save-package') }}"
                    id="package-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($package))
                        @method('PUT')
                    @endif

                    {{-- Type --}}
                    <div class="form-group mb-3">
                        <label for="type" class="form-label" style="color: #495057;font-weight:400;font-size:14px">
                            Select Package Type
                        </label>
                        <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                            <option value="">-- Select a type --</option>
                            @if (isset($packagetype) && $packagetype->count() > 0)
                                @foreach ($packagetype as $type)
                                    <option value="{{ $type->id }}"
                                        {{ old('type', isset($package) ? $package->type : '') == $type->id ? 'selected' : '' }}>
                                        {{ $type->type }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Title --}}
                    <div class="form-group mb-3">
                        <label for="title" class="form-label" style="color: #495057;font-weight:400;font-size:14px">Title</label>
                        <input type="text" name="title" id="title"
                            class="form-control @error('title') is-invalid @enderror"
                            placeholder="Enter package title"
                            value="{{ old('title', isset($package) ? $package->title : '') }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Amount --}}
                    <div class="form-group mb-3">
                        <label for="amount" class="form-label" style="color: #495057;font-weight:400;font-size:14px">Amount</label>
                        <input type="text" name="amount" id="amount"
                            class="form-control @error('amount') is-invalid @enderror"
                            placeholder="Enter package amount"
                            value="{{ old('amount', isset($package) ? $package->amount : '') }}">
                        @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Ideal --}}
                    <div class="form-group mb-3">
                        <label for="ideal" class="form-label" style="color: #495057;font-weight:400;font-size:14px">Ideal For</label>
                        <input type="text" name="ideal" id="ideal"
                            class="form-control @error('ideal') is-invalid @enderror"
                            placeholder="Enter ideal for"
                            value="{{ old('ideal', isset($package) ? $package->ideal : '') }}">
                        @error('ideal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="form-group mb-3">
                        <label for="description" class="form-label" style="color: #495057;font-weight:400;font-size:14px">Description</label>
                        <textarea name="description" id="description"
                            class="form-control @error('description') is-invalid @enderror"
                            placeholder="Enter description">{{ old('description', isset($package) ? $package->description : '') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Image --}}
                    <div class="form-group mb-3">
                        <label for="image" class="form-label" style="color: #495057;font-weight:400;font-size:14px">Image</label>
                        <input type="file" name="image" id="image"
                            class="form-control @error('image') is-invalid @enderror">
                        @if (isset($package) && $package->image)
                            <br>
                            <img src="{{ asset('storage/' . $package->image) }}" width="100" height="100" alt="Old Image"><br>
                        @endif
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <button class="btn btn-primary" type="submit">{{ isset($package) ? 'Update' : 'Submit' }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('description', {
                height: 300,
                toolbar: [
                    { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike'] },
                    { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'] },
                    { name: 'links', items: ['Link', 'Unlink'] },
                    { name: 'insert', items: ['Image', 'Table', 'HorizontalRule'] },
                    { name: 'styles', items: ['Format', 'Font', 'FontSize'] },
                    { name: 'colors', items: ['TextColor', 'BGColor'] },
                    { name: 'tools', items: ['Maximize'] },
                    { name: 'document', items: ['Source'] }
                ],
                removeButtons: '',
                format_tags: 'p;h1;h2;h3;h4;h5;h6;pre;address;div',
                allowedContent: true,
                versionCheck: false
            });
        });
    </script>
@endsection
