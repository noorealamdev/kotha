<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingsController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->orderBy('name')->get();

        $settings = Settings::where('settings_id', 1)->first();

        return view('backend.settings.create', compact('settings', 'categories'));
    }

    public function store(Request $request, Settings $settings)
    {
        $settings->site_title = $request->input('site_title');
        $settings->site_description = $request->input('site_description');
        $settings->google_analytics_id = $request->input('google_analytics_id');
        $settings->facebook_url = $request->input('facebook_url');
        $settings->twitter_url = $request->input('twitter_url');
        $settings->instagram_url = $request->input('instagram_url');
        $settings->pinterest_url = $request->input('pinterest_url');
        $settings->youtube_url = $request->input('youtube_url');
        $settings->home_ctaegory_id = $request->get('home_ctaegory_id');
        $settings->sidebar_ctaegory_id = $request->get('sidebar_ctaegory_id');
        $settings->homepage_ad_url = $request->input('homepage_ad_url');
        $settings->sidebar_ad_url = $request->input('sidebar_ad_url');
        $settings->copyright = $request->input('copyright');


        if($request->hasFile('logo')) {
            $inputImage = $request->file('logo');
            $imageName = time() . '.' . $inputImage->extension();
            // Delete Image
            File::delete('uploads/'.$settings->logo);
            $inputImage->move(public_path('uploads'), $imageName);
            $settings->logo = $imageName;
        }

        if($request->hasFile('homepage_ad_image')) {
            $inputImage = $request->file('homepage_ad_image');
            $imageName = time() . '.' . $inputImage->extension();
            // Delete Image
            File::delete('uploads/'.$settings->homepage_ad_image);
            $inputImage->move(public_path('uploads'), $imageName);
            $settings->homepage_ad_image = $imageName;
        }

        if($request->hasFile('sidebar_ad_image')) {
            $inputImage = $request->file('sidebar_ad_image');
            $imageName = time() . '.' . $inputImage->extension();
            // Delete Image
            File::delete('uploads/'.$settings->sidebar_ad_image);
            $inputImage->move(public_path('uploads'), $imageName);
            $settings->sidebar_ad_image = $imageName;
        }


        $settings->save();

        return redirect()->route('settings')->with(['msg' => 'Saved Successfully', 'type' => 'success']);
    }

    public function update(Request $request, $id)
    {

        $settings = Settings::find($id);

        $settings->site_title = $request->input('site_title');
        $settings->site_description = $request->input('site_description');
        $settings->google_analytics_id = $request->input('google_analytics_id');
        $settings->facebook_url = $request->input('facebook_url');
        $settings->twitter_url = $request->input('twitter_url');
        $settings->instagram_url = $request->input('instagram_url');
        $settings->pinterest_url = $request->input('pinterest_url');
        $settings->youtube_url = $request->input('youtube_url');
        $settings->home_ctaegory_id = $request->get('home_ctaegory_id');
        $settings->sidebar_ctaegory_id = $request->get('sidebar_ctaegory_id');
        $settings->homepage_ad_url = $request->input('homepage_ad_url');
        $settings->sidebar_ad_url = $request->input('sidebar_ad_url');
        $settings->copyright = $request->input('copyright');


        if($request->hasFile('logo')) {
            $inputImage = $request->file('logo');
            $imageName = time() . '.' . $inputImage->extension();
            // Delete Image
            File::delete('uploads/'.$settings->logo);
            $inputImage->move(public_path('uploads'), $imageName);
            $settings->logo = $imageName;
        }

        if($request->hasFile('homepage_ad_image')) {
            $inputImage = $request->file('homepage_ad_image');
            $imageName = time() . '.' . $inputImage->extension();
            // Delete Image
            File::delete('uploads/'.$settings->homepage_ad_image);
            $inputImage->move(public_path('uploads'), $imageName);
            $settings->homepage_ad_image = $imageName;
        }

        if($request->hasFile('sidebar_ad_image')) {
            $inputImage = $request->file('sidebar_ad_image');
            $imageName = time() . '.' . $inputImage->extension();
            // Delete Image
            File::delete('uploads/'.$settings->sidebar_ad_image);
            $inputImage->move(public_path('uploads'), $imageName);
            $settings->sidebar_ad_image = $imageName;
        }

        $settings->save();

        return redirect()->route('settings')->with(['msg' => 'Saved Successfully', 'type' => 'success']);
    }
}
