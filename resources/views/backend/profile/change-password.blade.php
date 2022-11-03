@extends('backend.layouts.base')

@section('content')

    @include('backend.partials.alert')
    <div class="col-8 col-md-8 col-lg-8 mt-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex justify-content-between align-items-center m-b-50">
                    <h6 class="card-title mb-0">Change Password</h6>
                </div>

                <form action="{{ route('profile.change_password_update', $user->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="currentPass">{{ 'Current Password' }} <span class="field-required">*</span></label>
                        <input id="currentPass" name="current_password" type="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">{{ 'New Password' }} <span class="field-required">*</span></label>
                        <input id="password" name="password" type="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmPass">{{ 'Confirm Password' }} <span class="field-required">*</span></label>
                        <input id="confirmPass" name="password_confirmation" type="password" class="form-control" required>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
