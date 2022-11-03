@extends('backend.layouts.base')
@section('content')

    @include('backend.partials.alert')
    <h5>Add New Post</h5>


    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="col-lg-9 col-sm-1">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="col-form-label">Title *</label>
                            <input type="text" class="form-control" name="title" id="title" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Slug *</label>
                            <input type="text" class="form-control" name="slug" id="slug" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Content</label>
                            <textarea name="content" class="summernote form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Excerpt</label>
                            <textarea name="excerpt" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="col-form-label">SEO Title</label>
                            <input type="text" class="form-control" name="seo_title">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">SEO Keyword</label>
                            <input type="text" class="form-control" name="seo_keyword">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">SEO Description</label>
                            <textarea name="seo_desc" class="form-control"></textarea>
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
                                <option value="published" selected>Published</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>

                        <label class="mt-2">
                            <input type="checkbox" name="featured_post" class="custom-switch-input">
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
                                    <option value="{{$category->id}}">{{$category->name}}</option>
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
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <label class="mt-2">
                            <input type="checkbox" name="editor_pick" class="custom-switch-input">
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
