@extends('backend.layouts.base')
@include('backend.partials.alert')

@section('content')
    <h3>Dashboard</h3>
    <br>
    <div class="row">

        <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-bg">
                    <div class="d-flex justify-content-between text-center">
                        <div class="col" style="padding: 30px">
                            <h3 class="font-weight-bold mb-0" style="color: #8490EE">{{ $posts ? $posts : 0}}</h3>
                            <h4 class="mb-0">Blog Posts</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-bg">
                    <div class="d-flex justify-content-between text-center">
                        <div class="col" style="padding: 30px">
                            <h3 class="font-weight-bold mb-0" style="color: #8490EE">{{ $categories ? $categories : 0 }}</h3>
                            <h4 class="mb-0">Categories</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-bg">
                    <div class="d-flex justify-content-between text-center">
                        <div class="col" style="padding: 30px">
                            <h3 class="font-weight-bold mb-0" style="color: #8490EE">{{ $pages ? $pages : 0 }}</h3>
                            <h4 class="mb-0">Pages</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-bg">
                    <div class="d-flex justify-content-between text-center">
                        <div class="col" style="padding: 30px">
                            <h3 class="font-weight-bold mb-0" style="color: #8490EE">{{ $comments ? $comments : 0 }}</h3>
                            <h4 class="mb-0">Comments</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
