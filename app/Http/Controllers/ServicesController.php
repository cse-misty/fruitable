<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $services = Services::first();
        if (!$services) {
            $services = Services::create([]);
        }

        return view('backend.admin.services.index', compact('services'));
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
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Services $services)
    {
        $services = Services::first() ?? Services::create([]);
        return view('backend.admin.services.index', compact('services'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request)
{

    $request->validate([
        'service_title' => 'nullable|string',

        // Fresh
        'fresh_title' => 'nullable|string',
        'fresh_offer_text' => 'nullable|string',
        'fresh_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        'fresh_link' => 'nullable|string',
        'fresh_bg_color' => 'nullable|string',
        'fresh_content_bg_color' => 'nullable|string',
        'fresh_title_color' => 'nullable|string',
        'fresh_offer_color' => 'nullable|string',

        // Tasty
        'tasty_title' => 'nullable|string',
        'tasty_offer_text' => 'nullable|string',
        'tasty_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        'tasty_link' => 'nullable|string',
        'tasty_bg_color' => 'nullable|string',
        'tasty_content_bg_color' => 'nullable|string',
        'tasty_title_color' => 'nullable|string',
        'tasty_offer_color' => 'nullable|string',

        // Exotic
        'exotic_title' => 'nullable|string',
        'exotic_offer_text' => 'nullable|string',
        'exotic_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        'exotic_link' => 'nullable|string',
        'exotic_bg_color' => 'nullable|string',
        'exotic_content_bg_color' => 'nullable|string',
        'exotic_title_color' => 'nullable|string',
        'exotic_offer_color' => 'nullable|string',

        'status' => 'nullable|string',
    ]);


    $services = Services::first();
    if (!$services) {
        $services = new Services();
    }


    $services->service_title = $request->service_title;

    // Fresh
    $services->fresh_title = $request->fresh_title;
    $services->fresh_offer_text = $request->fresh_offer_text;
    $services->fresh_link = $request->fresh_link;
    $services->fresh_bg_color = $request->fresh_bg_color;
    $services->fresh_content_bg_color = $request->fresh_content_bg_color;
    $services->fresh_title_color = $request->fresh_title_color;
    $services->fresh_offer_color = $request->fresh_offer_color;


    $services->tasty_title = $request->tasty_title;
    $services->tasty_offer_text = $request->tasty_offer_text;
    $services->tasty_link = $request->tasty_link;
    $services->tasty_bg_color = $request->tasty_bg_color;
    $services->tasty_content_bg_color = $request->tasty_content_bg_color;
    $services->tasty_title_color = $request->tasty_title_color;
    $services->tasty_offer_color = $request->tasty_offer_color;


    $services->exotic_title = $request->exotic_title;
    $services->exotic_offer_text = $request->exotic_offer_text;
    $services->exotic_link = $request->exotic_link;
    $services->exotic_bg_color = $request->exotic_bg_color;
    $services->exotic_content_bg_color = $request->exotic_content_bg_color;
    $services->exotic_title_color = $request->exotic_title_color;
    $services->exotic_offer_color = $request->exotic_offer_color;

    $services->status = $request->status;


    if ($request->hasFile('fresh_image')) {
        $oldImagePath = public_path('uploads/services/' . $services->fresh_image);
        if (!empty($services->fresh_image) && File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }

        $image = $request->file('fresh_image');
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/services'), $imageName);

        $services->fresh_image = $imageName;
    }

 // tastyimage
    if ($request->hasFile('tasty_image')) {
        $oldTastyPath = public_path('uploads/services/' . $services->tasty_image);
        if (!empty($services->tasty_image) && File::exists($oldTastyPath)) {
            File::delete($oldTastyPath);
        }

        $tastyImage = $request->file('tasty_image');
        $tastyImageName = time() . '_tasty_' . uniqid() . '.' . $tastyImage->getClientOriginalExtension();
        $tastyImage->move(public_path('uploads/services'), $tastyImageName);

        $services->tasty_image = $tastyImageName;
    }

    // exotic image
    if ($request->hasFile('exotic_image')) {
        $oldExoticPath = public_path('uploads/services/' . $services->exotic_image);
        if (!empty($services->exotic_image) && File::exists($oldExoticPath)) {
            File::delete($oldExoticPath);
        }

        $exoticImage = $request->file('exotic_image');
        $exoticImageName = time() . '_exotic_' . uniqid() . '.' . $exoticImage->getClientOriginalExtension();
        $exoticImage->move(public_path('uploads/services'), $exoticImageName);

        $services->exotic_image = $exoticImageName;
    }


    $services->save();

    Alert::success('Success', 'Services updated successfully');

    return redirect()->route('services.index');
}



    public function toggleStatus()
    {

        $services = Services::first();

        if (!$services) {
            $services = Services::create([]);
        }

        $services->fresh_status = ($services->fresh_status == 1) ? 0 : 1;
        $services->save();

        Alert::success('Success', 'Status updated successfully');

        return redirect()->back();
    }


}
