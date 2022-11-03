@extends('backend.layouts.base')
@section('content')

    @include('backend.partials.alert')
    <div class="col-12 col-md-12 col-lg-12 mt-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center m-b-50">
                    <h5 class="card-title mb-0">Categories</h5>
                    <div>
                        <button type="button" class="btn btn-primary ml-3" data-toggle="modal"
                                data-target="#categoryModal"><strong>+ Add Category</strong></button>
                    </div>
                </div>

                <table id="basic-datatable" class="table table-striped dt-responsive w-100">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th class="custom-width-action">Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($categories as $category)
                        <!-- single item -->
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->category_slug }}</td>
                            <td><div class="badge badge-{{ $category->status === 1 ? 'success' : 'danger' }}">{{ $category->status === 1 ? 'Active' : 'Inactive' }}</div></td>
                            <td>
                                <div>
                                    <a href="#" class="btn tblEditBtn" data-toggle="modal"
                                       data-target="#editModal{{ $category->id }}" data-original-title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn tblDelBtn" data-toggle="modal"
                                       data-target="#deleteModal{{ $category->id }}" data-original-title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <!--end single item -->

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1" role="dialog"
                             aria-labelledby="categorySectionModalLabel"
                             aria-hidden="false">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="categorySectionModalLabel">Edit Category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group">
                                                <label>Category Name <span class="field-required">*</span></label>
                                                <input type="text" class="form-control" value="{{ $category->name }}" name="name" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="1" {{ $category->status === 1 ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ $category->status === 0 ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save Changes
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Delete -->
                        <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" role="dialog"
                             aria-labelledby="teamModalCenterTitle" aria-hidden="false">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="teamModalCenterTitle">Delete</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center"><h5>This can not be undone. All posts belongs to this category also deleted</h5></div>
                                    <div class="modal-footer">
                                        <form class="d-inline-block"
                                              action="{{ route('category.destroy', $category->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel
                                            </button>
                                            <button type="submit" class="btn btn-success">Yes, delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Create -->
    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel"
         aria-hidden="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Category Name <span class="field-required">*</span></label>
                            <input type="text" class="form-control" value="" name="name" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Status</label>
                            <select class="form-control" name="status">
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
