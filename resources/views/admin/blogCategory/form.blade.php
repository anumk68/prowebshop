@extends('admin.layout.app')
@section('styles')
@endsection

@section('content')
    <div class="container custom-width mt-3">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h3 mb-2 text-gray-800">Add Blog Category
                    <a href="{{ route('blogCategorys') }}" class="btn btn-dark" style="float: inline-end">Back</a>
                </h1>
            </div>

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card-body">
                <div class="table-responsive">
                    <form
                        action="{{ route('save-blogCategory') }}"
                        id="blogCategory-form" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($blogCategory))
                            @method('PUT')
                        @endif

                        <label for="category_name" class="form-group"
                            style="color: #495057;font-weight:400;font-size:14px">Category Name </label><br>
                        <input type="text" name="category_name" id="category_name" placeholder="Enter Blog Category category_name"
                            class="form-control" value="{{ isset($blogCategory) ? $blogCategory->category_name : '' }}"><br>
                        @error('category_name')
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
                toolbar: [{
                        name: 'basicstyles',
                        items: ['Bold', 'Italic', 'Underline', 'Strike']
                    },
                    {
                        name: 'paragraph',
                        items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent']
                    },
                    {
                        name: 'links',
                        items: ['Link', 'Unlink']
                    },
                    {
                        name: 'insert',
                        items: ['Image', 'Table', 'HorizontalRule']
                    },
                    {
                        name: 'styles',
                        items: ['Format', 'Font', 'FontSize']
                    },
                    {
                        name: 'colors',
                        items: ['TextColor', 'BGColor']
                    },
                    {
                        name: 'tools',
                        items: ['Maximize']
                    },
                    {
                        name: 'document',
                        items: ['Source']
                    }
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
            $('#blogCategory-form').submit(function(e) {
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
