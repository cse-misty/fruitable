<?php

namespace App\Http\Controllers;

use App\Models\HeroSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class HeroSliderController extends Controller
{

    public function index(Request $request)
    {
        $heroSliders = HeroSlider::latest()->get();
        return view('backend.admin.heroSlider.index', compact('heroSliders'));
    }


    public function edit(HeroSlider $heroSlider)
    {
        return view('backend.admin.heroSlider.edit', compact('heroSlider'));
    }


  public function update(Request $request, HeroSlider $heroSlider)
{
    $request->validate([
        'sub_title'  => 'nullable|string',
        'main_title' => 'nullable|string',
        'badge_text' => 'nullable|string',
        'text_one'   => 'nullable|string',
        'text_two'   => 'nullable|string',
        'image'      => 'nullable|array',
        'image.*'    => 'image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $imagePaths = $heroSlider->image ?? [];

    if ($request->hasFile('image')) {

        foreach ($imagePaths as $oldImage) {
            if (Storage::disk('public')->exists($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }
        }

        $imagePaths = [];

        foreach ($request->file('image') as $file) {
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $file->storeAs('heroslider', $filename, 'public');

            $imagePaths[] = 'heroslider/' . $filename;
        }
    }

    $heroSlider->update([
        'sub_title'  => $request->sub_title,
        'main_title' => $request->main_title,
        'badge_text' => $request->badge_text,
        'text_one'   => $request->text_one,
        'text_two'   => $request->text_two,
        'image'      => $imagePaths,
    ]);

    Alert::success('Success', 'Slider Updated Successfully');

    return redirect()->back();
}
}
