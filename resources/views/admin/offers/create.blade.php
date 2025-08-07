@extends('admin.layout.app')

@section('content')
<div class="container mt-4">
    <h4>Add Offer</h4>


    <form action="{{ route('admin.offers.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="package_id" class="form-label">Select Package</label>
            <select name="package_id" class="form-control @error('package_id') is-invalid @enderror"  >
                <option value="">-- Select Package --</option>
                @foreach($packages as $package)
                    <option value="{{ $package->id }}" {{ old('package_id') == $package->id ? 'selected' : '' }}>
                        {{ $package->title }}
                    </option>
                @endforeach
            </select>
            @error('package_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Offer Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"   />
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Description (optional)</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Discount Value (%)</label>
            <input type="number" name="discount" step="0.01" class="form-control @error('discount') is-invalid @enderror" value="{{ old('discount') }}"   />
            @error('discount')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Start Date</label>
            <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}" />
            @error('start_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">End Date</label>
            <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}" />
            @error('end_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save Offer</button>
    </form>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const startDateInput = document.querySelector('input[name="start_date"]');
        const endDateInput = document.querySelector('input[name="end_date"]');

        // Set end date's min value when start date changes
        startDateInput.addEventListener('change', function () {
            if (startDateInput.value) {
                endDateInput.min = startDateInput.value;

                // If end date is before the new start date, clear it
                if (endDateInput.value && endDateInput.value < startDateInput.value) {
                    endDateInput.value = '';
                }
            } else {
                endDateInput.min = '';
            }
        });

        // If start date already exists on load, set min value for end date
        if (startDateInput.value) {
            endDateInput.min = startDateInput.value;
        }
    });
</script>
@endsection

@endsection
