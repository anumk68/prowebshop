@extends('admin.layout.app')

@section('content')
<div class="container mt-4">
    <h4>Edit Offer</h4>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops! There were some problems with your input.</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.offers.update', $offer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Select Package</label>
            <select name="package_id" class="form-control" required>
                <option value="">-- Select Package --</option>
                @foreach($packages as $package)
                    <option value="{{ $package->id }}" {{ old('package_id', $offer->package_id) == $package->id ? 'selected' : '' }}>
                        {{ $package->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Offer Title</label>
            <input type="text" name="title" value="{{ old('title', $offer->title) }}" class="form-control" required />
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ old('description', $offer->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Discount Value</label>
            <input type="number" name="discount" value="{{ old('discount', $offer->discount) }}" class="form-control" step="0.01" required />
        </div>

        <div class="mb-3">
            <label class="form-label">Start Date</label>
            <input type="date" name="start_date" value="{{ old('start_date', $offer->start_date) }}" class="form-control" />
        </div>

        <div class="mb-3">
            <label class="form-label">End Date</label>
            <input type="date" name="end_date" value="{{ old('end_date', $offer->end_date) }}" class="form-control" />
        </div>

        <div class="mb-3">
    <label class="form-label">Status</label>
    <select name="is_active" class="form-control" required>
        <option value="1" {{ old('is_active', $offer->is_active) == 1 ? 'selected' : '' }}>Active</option>
        <option value="0" {{ old('is_active', $offer->is_active) == 0 ? 'selected' : '' }}>Inactive</option>
    </select>
</div>

        <button type="submit" class="btn btn-success">Update Offer</button>
        <a href="{{ route('admin.offers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const startDateInput = document.querySelector('input[name="start_date"]');
        const endDateInput = document.querySelector('input[name="end_date"]');

        startDateInput.addEventListener('change', function () {
            if (startDateInput.value) {
                endDateInput.min = startDateInput.value;

                if (endDateInput.value && endDateInput.value < startDateInput.value) {
                    endDateInput.value = '';
                }
            } else {
                endDateInput.min = '';
            }
        });

        if (startDateInput.value) {
            endDateInput.min = startDateInput.value;
        }
    });
</script>
@endsection

@endsection
