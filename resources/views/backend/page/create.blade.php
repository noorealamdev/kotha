@extends('backend.layouts.base')
@section('content')

    @include('backend.partials.alert')
    <h5>Add New Post</h5>


    <form action="{{ route('page.store') }}" method="post" enctype="multipart/form-data">
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
                            <label class="col-form-label">Content</label>
                            <textarea name="content" class="summernote form-control"></textarea>
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

                        <button type="submit" class="btn btn-primary m-t-15 waves-effect" style="width: 100%">Submit</button>

                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection
