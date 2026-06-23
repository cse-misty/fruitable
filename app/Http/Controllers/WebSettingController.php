<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\WebSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class WebSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $setting = WebSetting::first();
        return view('backend.admin.webSetting.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(WebSetting $webSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WebSetting $webSetting)
    {
        $setting = WebSetting::first();
        return view('admin.web_settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */public function update(Request $request)
{
    $request->validate([
        // Basic Information
        'site_name'         => 'required|string|max:255',
        'site_title'        => 'nullable|string|max:255',
        'meta_description'  => 'nullable|string',
        'meta_keywords'     => 'nullable|string|max:500',

        // Logos
        'logo_header'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        'logo_footer'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        'favicon'           => 'nullable|image|mimes:ico,png,jpg,jpeg,svg|max:1024',

        // Contact Information
        'phone_1'           => 'nullable|string|max:50',
        'phone_2'           => 'nullable|string|max:50',
        'email_primary'     => 'required|email|max:255',
        'email_support'     => 'nullable|email|max:255',
        'address'           => 'nullable|string',
        'google_map_url'    => 'nullable|url',

        // Social Media
        'facebook_url'      => 'nullable|url',
        'twitter_url'       => 'nullable|url',
        'linkedin_url'      => 'nullable|url',
        'youtube_url'       => 'nullable|url',
        'instagram_url'     => 'nullable|url',

        // Footer
        'copyright_text'    => 'nullable|string|max:255',
    ]);


    $setting = WebSetting::first();

    if (!$setting) {
        $setting = new WebSetting();
    }

    $data = $request->except(['logo_header', 'logo_footer', 'favicon']);

    // HEADER LOGO
    if ($request->hasFile('logo_header')) {

        if ($setting->logo_header && Storage::disk('public')->exists($setting->logo_header)) {
            Storage::disk('public')->delete($setting->logo_header);
        }

        $data['logo_header'] = $request->file('logo_header')->store('settings', 'public');
    }

    // FOOTER LOGO
    if ($request->hasFile('logo_footer')) {

        if ($setting->logo_footer && Storage::disk('public')->exists($setting->logo_footer)) {
            Storage::disk('public')->delete($setting->logo_footer);
        }

        $data['logo_footer'] = $request->file('logo_footer')->store('settings', 'public');
    }

    // FAVICON
    if ($request->hasFile('favicon')) {

        if ($setting->favicon && Storage::disk('public')->exists($setting->favicon)) {
            Storage::disk('public')->delete($setting->favicon);
        }

        $data['favicon'] = $request->file('favicon')->store('settings', 'public');
    }

    // SAVE DATA
    $setting->fill($data)->save();

    // SUCCESS MESSAGE (FIXED TEXT)
    Alert::success('Success', 'Website settings updated successfully!');

    return redirect()->route('web_settings.index');


}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WebSetting $webSetting)
    {
        //
    }
}
