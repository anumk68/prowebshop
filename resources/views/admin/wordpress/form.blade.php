@extends('admin.layout.app')
@section('styles')
@endsection

@section('content')
    <div class="container custom-width mt-3">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                {{-- <h6 class="m-0 font-weight-bold text-primary">{{ isset($wordpress) ? 'Update' : 'Enter' }} Your data</h6> --}}
                {{-- <h5 style="text-align: end"> --}}
                <h1 class="h3 mb-2 text-gray-800">{{ isset($wordpress) ? 'Edit' : 'Add' }} Package
                    <a href="{{ route('wordpresss') }}" class="btn btn-dark" style="float: inline-end">Back</a>
                </h1>
            </div>

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ isset($wordpress) ? route('update-wordpress', $wordpress->id) : route('save-wordpress') }}"
                        id="wordpress-form" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($wordpress))
                            @method('PUT')
                        @endif


                        <label for="title" class="form-group"
                            style="color: #495057;font-weight:400;font-size:14px">Title</label><br>
                        <input type="title" name="title" id="title" placeholder="Enter wordpress title"
                            class="form-control" value="{{ isset($wordpress) ? $wordpress->title : '' }}"><br>
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                          <label for="amount" class="form-group"
                            style="color: #495057;font-weight:400;font-size:14px">Amount</label><br>
                        <input type="amount" name="amount" id="amount" placeholder="Enter wordpress amount"
                            class="form-control" value="{{ isset($wordpress) ? $wordpress->amount : '' }}"><br>
                        @error('amount')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                           <label for="ideal" class="form-group"
                            style="color: #495057;font-weight:400;font-size:14px">Ideal For:</label><br>
                        <input type="ideal" name="ideal" id="ideal" placeholder="Enter wordpress ideal"
                            class="form-control" value="{{ isset($wordpress) ? $wordpress->ideal : '' }}"><br>
                        @error('ideal')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="description" class="form-group"
                            style="color: #495057;font-weight:400;font-size:14px">Description</label><br>
                        <textarea name="description" id="description" placeholder="Enter Description" class="form-control">{{ isset($wordpress) ? $wordpress->description : '' }}</textarea><br>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


                        <label for="image" class="form-group"
                            style="color: #495057;font-weight:400;font-size:14px">Image</label><br>
                        <input type="file" name="image" id="image" placeholder="Enter About image"
                            class="form-control" value="{{ isset($wordpress) ? $wordpress->image : '' }}">
                        @if (isset($wordpress) && $wordpress->image)
                            <div>
                                <br>
                                <img src="{{ asset('storage/' . $wordpress->image) }}" width="100" height="100"
                                    alt="Old Image"><br>
                            </div>
                        @endif
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <br>

                        <button class="btn btn-primary" type="submit">{{ isset($wordpress) ? 'Update' : 'Submit' }}
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
            $('#wordpress-form').submit(function(e) {
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
