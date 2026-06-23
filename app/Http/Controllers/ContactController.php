<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use RealRashid\SweetAlert\Facades\Alert;
use App\Events\ContactSubmittedEvent;
use App\Models\AboutUs;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $contacts = Contact::latest()->paginate(10);
        return view('backend.admin.contact.index', compact('contacts'));
    }

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string|min:5',
    ]);

    Contact::create($request->only('name', 'email', 'message'));

    event(new ContactSubmittedEvent(
        $request->name,
        $request->email
    ));

    Alert::success('Success', 'Message sent successfully!')
        ->toast()
        ->position('top-end');

    return redirect()->back();
}

   public function destroy($id)
    {

        $contact = Contact::findOrFail($id);
        $contact->delete();
        Alert::success('Success', 'Contact Message Deleted Successfully')->toast()->position('top-end');
        return redirect()->route('contact.index');
    }


    public function sendReply(Request $request)
    {
        $request->validate([
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        $toEmail = $request->email;
        $replyMessage = $request->message;

        Mail::raw($replyMessage, function ($message) use ($toEmail) {
            $message->to($toEmail)
                    ->subject('Reply to your contact message');
        });

        // Ekhaneo SweetAlert toast use kora holo consistency-r jonno
        Alert::success('Success', 'Reply email has been sent successfully!')->toast()->position('top-end');

        return back();
    }



    public function about(){
          $about = AboutUs::first();

    return view('backend.admin.contact.about', compact('about'));
    }


public function aboutupdate(Request $request, $id = null)
{

    $request->validate([
        'sub_title'          => 'required|string|max:255',
        'title'              => 'nullable|string|max:255',
        'description_top'    => 'nullable|string',
        'description_bottom' => 'nullable|string',
        'experience_year'    => 'nullable|string|max:50',
        'experience_text'    => 'nullable|string|max:255',
        'mission_title'      => 'nullable|string|max:255',
        'mission_description'=> 'nullable|string',
        'vision_title'       => 'nullable|string|max:255',
        'vission_description'=> 'nullable|string',
        'core_value_title'   => 'nullable|string|max:255',
        'core_value_description' => 'nullable|string',
        'status'             => 'required|in:0,1',
        'image'              => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        'feature_one_icon'          => 'nullable|string',
        'feature_one_title'              => 'nullable|string',
        'feature_two_icon'    => 'nullable|string',
        'feature_two_title' => 'nullable|string',
        'about_title'    => 'nullable|string|',
        'about_name'    => 'nullable|string',
    ]);


    $about = $id ? AboutUs::find($id) : AboutUs::first();
    if (!$about) {
        $about = new AboutUs();
    }


    $data = $request->only([
        'sub_title', 'title', 'description_top', 'description_bottom',
        'experience_year', 'experience_text', 'mission_title',
        'mission_description', 'vision_title', 'vission_description',
        'core_value_title', 'core_value_description', 'status','feature_one_icon','feature_one_title','feature_two_icon',
        'feature_two_title','about_title','about_name',
    ]);


    if ($request->hasFile('image')) {
        if ($about->image) {
            $oldImagePath = public_path('uploads/about/' . $about->image);

            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }

        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/about'), $filename);
        $data['image'] = $filename;
    }


    if ($about->exists) {
        $about->update($data);
    } else {
        AboutUs::create($data);
    }


    Alert::success('Success', 'About Us updated successfully!')
        ->toast()
        ->position('top-end');

    return redirect()->back();
}


}
