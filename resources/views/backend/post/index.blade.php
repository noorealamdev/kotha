@extends('backend.layouts.base')
@section('content')

    @include('backend.partials.alert')
    <div class="col-12 col-md-12 col-lg-12 mt-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center m-b-50">
                    <h5 class="card-title mb-0">All Posts</h5>
                    <div>
                        <a href="{{ route('post.create') }}" class="btn btn-primary ml-3"><strong>+ Add New Post</strong></a>
                    </div>
                </div>

                <table id="basic-datatable" class="table table-striped dt-responsive w-100">
                    <thead>
                    <tr>
                        <th>Post Title</th>
                        <th>Featured Image</th>
                        <th>Author</th>
                        <th>Category</th>
{{--                        <th>Status</th>--}}
                        <th>Publish Date</th>
                        <th class="custom-width-action">Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach ($posts as $post)
                        <!-- single item -->
                        <tr>
                            <td>
                                <h6 class="media-title"><a href="{{ route('post.edit', $post->id) }}">{{ $post->title }}</a> {{ $post->featured_post == 1 ? '--Featured' : '' }} {{ $post->status == 'draft' ? '--Draft' : '' }} {{ $post->editor_pick == 1 ? '--Editor picked' : '' }}</h6>
                                <a target="_blank" href="{{ url('/post/'.$post->slug.'') }}"><span style="color: #0a0a0a">View Post</span></a>
                            </td>
                            <td>
                                @if(!empty($post->featured_image))
                                    <img src="{{ asset('uploads/'. $post->featured_image) }}" alt="" width="100" height="70">
                                    @else
                                    no image
                                @endif
                            </td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->category->name }}</td>
{{--                            <td><div class="badge badge-{{ $post->status === 'published' ? 'success' : 'light' }}">{{ $post->status }}</div></td>--}}
                            <td>{{ Carbon\Carbon::parse($post->created_at)->format('d-m-Y') }}</td>
                            <td>
                                <div>
                                    <a href="{{ route('post.edit', $post->id) }}" class="btn tblEditBtn" data-original-title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn tblDelBtn" data-toggle="modal"
                                       data-target="#deleteModal{{ $post->id }}" data-original-title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <!--end single item -->

                        <!-- Modal Delete -->
                        <div class="modal fade" id="deleteModal{{ $post->id }}" tabindex="-1" role="dialog"
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
                                              action="{{ route('post.destroy', $post->id) }}" method="POST">
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
