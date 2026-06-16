<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use RealRashid\SweetAlert\Facades\Alert;
use App\Events\ContactSubmittedEvent;

class ContactController extends Controller
{
    public function index(Request $request){
       $contacts = Contact::latest()->paginate(10);
        return view('backend.admin.contact.index', compact('contacts'));
    }
    public function store(Request $request)
    {
        // 1. Data Validation (Professional Way)
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string|min:5',
        ]);

        // 2. Database-e Data Save kora
        Contact::create($validated);
        event(new ContactSubmittedEvent($request->name, $request->email));

        // 3. Success Message shoho redirect kora
        return redirect()->back()->with('success', 'Thank you! Your message has been sent successfully.');
    }

   public function destroy($id)
{
    $category = Contact::findOrFail($id);

    $category->delete();

    Alert::success('Success', 'Category Deleted Successfully');

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


    \Illuminate\Support\Facades\Mail::raw($replyMessage, function ($message) use ($toEmail) {
        $message->to($toEmail)
                ->subject('Reply to your contact message');
    });

//    Alert::success('Success', 'Reply email has been sent successfully!')->toast();

 return back()->with('success', 'Reply email has been sent successfully!');
}


}
