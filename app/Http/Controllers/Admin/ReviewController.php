<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;

class ReviewController extends Controller
{

    public function index(Request $request)
    {

        $reviews = Review::with(['user', 'product'])->latest()->paginate(10);
        return view('backend.admin.reviews.index', compact('reviews'));
    }

    public function store(Request $request, $product_id)
    {

        $request->validate([
            'body'   => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);


        Review::create([
            'user_id'    => Auth::id(),
            'product_id' => $product_id,
            'body'       => $request->body,
            'rating'     => $request->rating,
            'status'     => 1,
        ]);


        Alert::success('Success', 'Review Added successfully!')
            ->toast()
            ->position('top-end');

        return redirect()->back();
    }


    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        Alert::success('Success', 'Review Delete successfully!')
            ->toast()
            ->position('top-end');

        return redirect()->back();
    }


    public function updateStatus($id)
    {
        $review = Review::findOrFail($id);
        $review->status = $review->status == 1 ? 0 : 1;
        $review->save();


        Alert::success('Success', 'Review status successfully!')
            ->toast()
            ->position('top-end');

        return redirect()->back();
    }


    public function reviewsendReply(Request $request)
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
        Alert::success('Success', 'Review Send  successfully!')
            ->toast()
            ->position('top-end');

        return redirect()->back();
    }
}
