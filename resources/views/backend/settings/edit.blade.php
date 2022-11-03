@extends('backend.layouts.base')
@section('content')

    @include('backend.partials.alert')
    <div class="d-md-flex align-items-center m-b-20">
        <h5 class="card-title mb-0">Edit Post</h5>
        <div>
            <a href="{{ route('post.create') }}" class="btn btn-primary ml-3"><strong>+ Add New Post</strong></a>
        </div>
    </div>

    <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-lg-9 col-sm-1">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="col-form-label">Title *</label>
                            <input type="text" value="{{ $post->title ? $post->title : '' }}" class="form-control" name="title" id="title" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Slug *</label>
                            <input type="text" value="{{ $post->slug ? $post->slug : '' }}" class="form-control" name="slug" id="slug" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Content</label>
                            <textarea name="content" class="summernote form-control">{{ $post->content ? $post->content : '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Excerpt</label>
                            <textarea name="excerpt" class="form-control">{{ $post->excerpt ? $post->excerpt : '' }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="col-form-label">SEO Title</label>
                            <input type="text" name="seo_title" value="{{ $post->seo_title ? $post->seo_title : '' }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">SEO Keyword</label>
                            <input type="text" name="seo_keyword" value="{{ $post->seo_keyword ? $post->seo_keyword : '' }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">SEO Description</label>
                            <textarea name="seo_desc" class="form-control">{{ $post->seo_desc ? $post->seo_desc : '' }}</textarea>
                        </div>
                    </div>
                </div>


            </div>

            <div class="col-lg-3 col-sm-1">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="published" {{ $post->status == 'published' ? 'selected' : ''}}>Published</option>
                                <option value="draft" {{ $post->status == 'draft' ? 'selected' : ''}}>Draft</option>
                            </select>
                        </div>
                        <label class="mt-2">
                            <input type="checkbox" name="featured_post" class="custom-switch-input" {{ $post->featured_post == 1 ? 'checked' : ''}}>
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Featured post</span>
                        </label>

                        <button type="submit" class="btn btn-primary m-t-15 waves-effect" style="width: 100%">Submit</button>

                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Category *</label>
                            <select  class="form-control" name="category_id" id="category" required>
                                <option value="">Select</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{ $category->id == $post->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="col-form-label">Featured image</label>
                            <input type="file" name="featured_image" class="form-control">
                            @if(!empty($post->featured_image))
                                <img class="mt-2" src="{{ asset('uploads/'. $post->featured_image) }}" alt="" width="230" height="150">
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <label class="mt-2">
                            <input type="checkbox" name="editor_pick" class="custom-switch-input" {{ $post->editor_pick == 1 ? 'checked' : ''}}>
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Editor pick</span>
                        </label>
                    </div>
                </div>


            </div>
        </div>
    </form>
@endsection


@push('script')
    <script>
        $('document').ready(function () {
            $(document).on('change', 'input#title', function() {
                $.get('{{ route('post.checkSlug') }}',
                    { 'title': $(this).val() },
                    function (data) {
                        $('#slug').val(data.slug)
                    }
                );
            });

        });
    </script>
@endpush
