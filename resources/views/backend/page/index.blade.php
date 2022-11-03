@extends('backend.layouts.base')
@section('content')

    @include('backend.partials.alert')
    <div class="col-12 col-md-12 col-lg-12 mt-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center m-b-50">
                    <h5 class="card-title mb-0">All Pages</h5>
                    <div>
                        <a href="{{ route('page.create') }}" class="btn btn-primary ml-3"><strong>+ Add New Page</strong></a>
                    </div>
                </div>

                <table id="basic-datatable" class="table table-striped dt-responsive w-100">
                    <thead>
                    <tr>
                        <th>Page Title</th>
                        <th>Page Slug</th>
                        <th>Status</th>
                        <th class="custom-width-action">Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach ($pages as $page)
                        <!-- single item -->
                        <tr>
                            <td>
                                <h6 class="media-title"><a href="{{ route('page.edit', $page->id) }}">{{ $page->title }}</a></h6>
                            </td>
                            <td>{{ $page->slug }}</td>
                            <td><div class="badge badge-{{ $page->status === 'published' ? 'success' : 'light' }}">{{ $page->status }}</div></td>
                            <td>
                                <div>
                                    <a href="{{ route('page.edit', $page->id) }}" class="btn tblEditBtn" data-original-title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn tblDelBtn" data-toggle="modal"
                                       data-target="#deleteModal{{ $page->id }}" data-original-title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <!--end single item -->

                        <!-- Modal Delete -->
                        <div class="modal fade" id="deleteModal{{ $page->id }}" tabindex="-1" role="dialog"
                             aria-labelledby="teamModalCenterTitle" aria-hidden="false">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="teamModalCenterTitle">Delete</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center"><h5>Are you sure?</h5></div>
                                    <div class="modal-footer">
                                        <form class="d-inline-block"
                                              action="{{ route('page.destroy', $page->id) }}" method="POST">
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

@endsection
