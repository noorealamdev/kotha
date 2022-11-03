@extends('backend.layouts.base')
@section('content')

    @include('backend.partials.alert')
    <div class="d-md-flex align-items-center m-b-20">
        <h5 class="card-title mb-0">Edit Page</h5>
        <div>
            <a href="{{ route('page.create') }}" class="btn btn-primary ml-3"><strong>+ Add New Page</strong></a>
        </div>
    </div>

    <form action="{{ route('page.update', $page->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-lg-9 col-sm-1">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="col-form-label">Title *</label>
                            <input type="text" value="{{ $page->title ? $page->title : '' }}" class="form-control" name="title" id="title" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Content</label>
                            <textarea name="content" class="summernote form-control">{{ $page->content ? $page->content : '' }}</textarea>
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
                                <option value="published" {{ $page->status == 'published' ? 'selected' : ''}}>Published</option>
                                <option value="draft" {{ $page->status == 'draft' ? 'selected' : ''}}>Draft</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary m-t-15 waves-effect" style="width: 100%">Submit</button>

                    </div>
                </div>

            </div>
        </div>
    </form>

@endsection
