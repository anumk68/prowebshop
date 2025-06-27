@extends('admin.layout.app')
@section('styles')
@endsection

@section('content')
    <div class="container custom-width mt-3">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                {{-- <h6 class="m-0 font-weight-bold text-primary">{{ isset($type) ? 'Update' : 'Enter' }} Your data</h6> --}}
                {{-- <h5 style="text-align: end"> --}}
                <h1 class="h3 mb-2 text-gray-800">Add Type
                    <a href="{{ route('types') }}" class="btn btn-dark" style="float: inline-end">Back</a>
                </h1>
            </div>

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('save-type') }}"
                        id="type-form" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($type))
                            @method('PUT')
                        @endif


                        <label for="type" class="form-group"
                            style="color: #495057;font-weight:400;font-size:14px">Type</label><br>
                        <input type="type" name="type" id="type" placeholder="Enter type type" style="margin-top:5px"
                            class="form-control"><br>
                        @error('type')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <button class="btn btn-primary" type="submit">Submit
                        </button>
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
    <script>
        $(document).ready(function() {
            $('#type-form').submit(function(e) {
                e.preventDefault();
                for (let instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }
                const formData = new FormData($(this)[0]);

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.redirect) {
                            window.location.href = response.redirect;
                        } else {
                            console.error(response);
                        }
                    },
                    error: function(xhr, status, error) {
                        let errorText = '';

                        if (xhr.status === 422) {
                            // Validation errors
                            const errorJson = JSON.parse(xhr.responseText);
                            $.each(errorJson.errors, function(key, value) {
                                errorText += value[0] + '\n';
                            });
                        } else if (xhr.status === 500) {
                            // Server error
                            errorText = 'An unknown error occurred. Please try again.';
                        } else {
                            // Other errors
                            errorText = xhr.statusText;
                        }

                        alert(errorText);
                    }
                });
            });
        });
    </script>
@endsection
