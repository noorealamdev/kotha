@extends('backend.layouts.base')
@section('content')

    @include('backend.partials.alert')
    <h5>Settings</h5>

    @if (isset($settings))
        <form action="{{ route('settings.update', $settings->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
    @else
        <form action="{{ route('settings.store') }}" method="post" enctype="multipart/form-data">
         @csrf
    @endif
        <div class="row">
            <div class="col-lg-9 col-sm-1">
                <div class="card">
                    <div class="card-header">
                        <h6>General Settings</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="col-form-label">Site title</label>
                            <input type="text" class="form-control" name="site_title" value="{{ ($settings && $settings->site_title) ? $settings->site_title : '' }}">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Site description</label>
                            <textarea name="site_description" class="form-control">{{ ($settings && $settings->site_description) ? $settings->site_description : '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Site Logo (size: 120x26)</label>
                            <input type="file" name="logo" class="form-control">

                            @if(!empty($settings->logo))
                                <img src="{{ asset('uploads/'. $settings->logo) }}" alt="" width="100" height="26">
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h6>Social Settings</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="col-form-label">Facebook url</label>
                            <input type="text" class="form-control" name="facebook_url" value="{{ ($settings && $settings->facebook_url) ? $settings->facebook_url : '' }}">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Twitter url</label>
                            <input type="text" class="form-control" name="twitter_url" value="{{ ($settings && $settings->twitter_url) ? $settings->twitter_url : '' }}">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Instagram url</label>
                            <input type="text" class="form-control" name="instagram_url" value="{{ ($settings && $settings->instagram_url) ? $settings->instagram_url : '' }}">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Pinterest url</label>
                            <input type="text" class="form-control" name="pinterest_url" value="{{ ($settings && $settings->pinterest_url) ? $settings->pinterest_url : '' }}">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Youtube url</label>
                            <input type="text" class="form-control" name="youtube_url" value="{{ ($settings && $settings->youtube_url) ? $settings->youtube_url : '' }}">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h6>Carousel Settings</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Home page carousel category</label>
                            <select  class="form-control" name="home_ctaegory_id">
                                <option value="">Select</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Sidebar carousel category</label>
                            <select  class="form-control" name="sidebar_ctaegory_id">
                                <option value="">Select</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h6>Ad Settings</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="col-form-label">Home page ad image(size: 736x126)</label>
                            <input type="file" name="homepage_ad_image" class="form-control">
                            @if(!empty($settings->homepage_ad_image))
                                <img src="{{ asset('uploads/'. $settings->homepage_ad_image) }}" alt="" width="736" height="126">
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Home page ad url</label>
                            <input type="text" class="form-control" name="homepage_ad_url" value="{{ ($settings && $settings->homepage_ad_url) ? $settings->homepage_ad_url : '' }}">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Sidebar ad image(size: 356x316)</label>
                            <input type="file" name="sidebar_ad_image" class="form-control">
                            @if(!empty($settings->sidebar_ad_image))
                                <img src="{{ asset('uploads/'. $settings->sidebar_ad_image) }}" alt="" width="356" height="361">
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Sidebar ad url</label>
                            <input type="text" class="form-control" name="sidebar_ad_url" value="{{ ($settings && $settings->sidebar_ad_url) ? $settings->sidebar_ad_url : '' }}">
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h6>Copyright</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="col-form-label">Copyright text</label>
                            <input type="text" class="form-control" name="copyright" value="{{ ($settings && $settings->copyright) ? $settings->copyright : '' }}">
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        <h6>Google analytics</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="col-form-label">Google analytics id</label>
                            <input type="text" class="form-control" placeholder="UA-83414378-1" name="google_analytics_id" value="{{ ($settings && $settings->google_analytics_id) ? $settings->copyright : '' }}">
                        </div>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary m-t-15 waves-effect" style="width: 100%">Save Settings</button>

            </div>
        </div>
    </form>

@endsection
