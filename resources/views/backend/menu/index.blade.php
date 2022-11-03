@extends('backend.layouts.base')
@section('content')

    @include('backend.partials.alert')
    <h5>Menu</h5>

        <div class="row">
            <div class="col-lg-12">
                {!! Menu::render() !!}
            </div>
        </div>

@endsection
@push('script')
    {!! Menu::scripts() !!}
@endpush
