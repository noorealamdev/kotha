@extends('backend.layouts.base')

@section('content')

    @include('backend.partials.alert')
    <form action="{{ route('profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
    <div class="col-8 col-md-8 col-lg-8 mt-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex justify-content-between align-items-center m-b-50">
                    <h6 class="card-title mb-0">Profile</h6>
                </div>

                    <div class="form-group">
                        <label for="name">{{ 'Name' }} <span class="field-required">*</span></label>
                        <input id="name" name="name" type="text" class="form-control" value="{{ $user->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">{{ 'Email' }} <span class="field-required">*</span></label>
                        <input id="email" name="email" type="email" class="form-control" value="{{ $user->email }}" required>
                    </div>
                    <div class="form-group">
                        <label>Image (size 128 x 128) (.svg, .jpg, .jpeg, .png)</label>
                        <input class="form-control" type="file" name="profile_photo_path">
                        @if(!empty($user->profile_photo_path))
                            <img src="{{ asset('uploads/'. $user->profile_photo_path) }}" alt="" width="130" height="130">
                        @endif
                    </div>

            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h6>Author About</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <textarea name="about" class="form-control">{{ ($user && $user->about) ? $user->about : '' }}</textarea>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h6>Social Links</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="col-form-label">Facebook url</label>
                    <input type="text" class="form-control" name="facebook_url" value="{{ ($user && $user->facebook_url) ? $user->facebook_url : '' }}">
                </div>
                <div class="form-group">
                    <label class="col-form-label">Twitter url</label>
                    <input type="text" class="form-control" name="twitter_url" value="{{ ($user && $user->twitter_url) ? $user->twitter_url : '' }}">
                </div>
                <div class="form-group">
                    <label class="col-form-label">Instagram url</label>
                    <input type="text" class="form-control" name="instagram_url" value="{{ ($user && $user->instagram_url) ? $user->instagram_url : '' }}">
                </div>
                <div class="form-group">
                    <label class="col-form-label">Pinterest url</label>
                    <input type="text" class="form-control" name="pinterest_url" value="{{ ($user && $user->pinterest_url) ? $user->pinterest_url : '' }}">
                </div>
                <div class="form-group">
                    <label class="col-form-label">Youtube url</label>
                    <input type="text" class="form-control" name="youtube_url" value="{{ ($user && $user->youtube_url) ? $user->youtube_url : '' }}">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary m-t-15 waves-effect" style="width: 100%">Save Profile</button>
    </div>

    </form>
@endsection
