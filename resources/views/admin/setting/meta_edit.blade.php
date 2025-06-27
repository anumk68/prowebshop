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
                        <h4>Setting Edit</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('meta-update/' . $meta->id) }}" method="POST" class="mt-4">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="meta_value">Value To Display:</label>
                                <textarea class="form-control @error('meta_value') is-invalid @enderror" id="meta_value" name="meta_value"
                                    rows="4">{{ old('meta_value', $meta->meta_value ?? '') }}</textarea>
                                @error('meta_value')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-success">Edit Value</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
