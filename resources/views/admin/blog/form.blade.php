@extends('admin.layout.app')
@section('styles')
@endsection

@section('content')
    <div class="container custom-width mt-3">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="h3 mb-2 text-gray-800">{{ isset($blog) ? 'Edit' : 'Add' }} Blog
                    <a href="{{ route('blogss') }}" class="btn btn-dark" style="float: inline-end">Back</a>
                </h1>
            </div>

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ isset($blog) ? route('update-blog', $blog->id) : route('save-blog') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @if (isset($blog))
                            @method('PUT')
                        @endif

                        <div class="form-group mb-3">
                            <label for="blog">Select Blog</label>
                            <select name="blog" id="blog" class="form-control @error('blog') is-invalid @enderror">
                                <option value="">-- Select a blog --</option>
                                @foreach ($allBlogs as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('blog', $blog->blog ?? '') == $category->id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('blog')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" placeholder="Enter blog title"
                                class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title', $blog->title ?? '') }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image"
                                class="form-control @error('image') is-invalid @enderror">
                            @if (isset($blog) && $blog->image)
                                <br>
                                <img src="{{ asset('public/storage/' . $blog->image) }}" width="100" height="100"
                                    alt="Old Image">
                            @endif
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="short_description">Short Description</label>
                            <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror"
                                placeholder="Enter short description">{{ old('short_description', $blog->short_description ?? '') }}</textarea>
                            @error('short_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                                placeholder="Enter description">{{ old('description', $blog->description ?? '') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title" placeholder="Enter blog meta title"
                                class="form-control @error('meta_title') is-invalid @enderror"
                                value="{{ old('meta_title', $blog->meta_title ?? '') }}">
                            @error('meta_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="meta_image">Meta Image</label>
                            <input type="file" name="meta_image" id="meta_image"
                                class="form-control @error('meta_image') is-invalid @enderror">
                            @if (isset($blog) && $blog->meta_image)
                                <br>
                                <img src="{{ asset('public/storage/' . $blog->meta_image) }}" width="100" height="100"
                                    alt="Old Meta Image">
                            @endif
                            @error('meta_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="image_alt">Image Alt</label>
                            <input type="text" name="image_alt" id="image_alt" placeholder="Enter Image Alt"
                                class="form-control @error('image_alt') is-invalid @enderror"
                                value="{{ old('image_alt', $blog->image_alt ?? '') }}">
                            @error('image_alt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="meta_description">Meta Description</label>
                            <textarea name="meta_description" class="form-control @error('meta_description') is-invalid @enderror"
                                placeholder="Enter meta description">{{ old('meta_description', $blog->meta_description ?? '') }}</textarea>
                            @error('meta_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="meta_keyword">Meta Keyword</label>
                            <input type="text" name="meta_keyword" id="meta_keyword" placeholder="e.g., blog, tech, news"
                                class="form-control @error('meta_keyword') is-invalid @enderror"
                                value="{{ old('meta_keyword', $blog->meta_keyword ?? '') }}">
                            @error('meta_keyword')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-primary" type="submit">{{ isset($blog) ? 'Update' : 'Submit' }}</button>
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
@endsection
