<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\FaqCatagory;
use App\Models\HeroSlider;
use App\Models\Services;
use App\Models\WebSetting;
use App\Models\Order;
use App\Models\ProductReview;
use App\Models\Review;

class PublicController extends Controller
{
    public function index(Request $request){
         $totalProducts = Product::count();

     $categories = Category::select('id','title','image','description','slug','thumbnail','priority','status')
            ->where('status', 1)
            ->orderBy('priority')
            ->limit(4)
             ->get();


       $products = Product::select('id', 'name', 'category_id', 'sub_category_id', 'price', 'priority', 'status', 'image', 'description')
            ->with(['category:id,title', 'subCategory:id,title'])
            ->where('status', 1)
            ->orderBy('priority', 'asc')
            ->limit(4)
            ->get();



        $heroSliders = HeroSlider::select('id', 'sub_title', 'main_title', 'badge_text', 'text_one', 'text_two', 'image')
            ->latest();


            $services = Services::select(
                'id', 'service_title', 'status',
                // Fresh Apple
                'fresh_title', 'fresh_offer_text', 'fresh_image', 'fresh_link',
                'fresh_bg_color', 'fresh_content_bg_color', 'fresh_title_color', 'fresh_offer_color',
                // Tasty Fruits
                'tasty_title', 'tasty_offer_text', 'tasty_image', 'tasty_link',
                'tasty_bg_color', 'tasty_content_bg_color', 'tasty_title_color', 'tasty_offer_color',
                // Exotic Fruits
                'exotic_title', 'exotic_offer_text', 'exotic_image', 'exotic_link',
                'exotic_bg_color', 'exotic_content_bg_color', 'exotic_title_color', 'exotic_offer_color'
            )
            ->first();

        $vegetableProducts = Product::whereHas('category', function($query) {
                $query->where('title', 'like', '%Vegetable%');
            })->where('status', 1)->latest()->get();

               $bestsellerProducts = Product::where('status', 1)
        ->orderBy('sold_count', 'desc') // বেশি বিক্রি হওয়া প্রোডাক্ট আগে আসবে
        ->take(6) // টোটাল ৬টি প্রোডাক্ট দেখাবে (আপনি চাইলে সংখ্যা পরিবর্তন করতে পারেন)
        ->get();

        return view('frontend.pages.app', compact('bestsellerProducts','totalProducts','categories', 'products','heroSliders','services','vegetableProducts'));
    }
    public function master(){
        $categoriesCount = Category::count();
        $totalProducts = Product::count();
        $orders_count = Order::count();
        $totalRevenue = Order::where('status', 'success')->sum('total_amount');

        $completedOrdersCount = Order::where('status', 'completed')->count();
       $recentOrders = Order::with('user')
        ->latest()
        ->take(5)
        ->get();

         $recentReviews = Review::with(['user', 'product'])
        ->latest()
        ->take(4)
        ->get();


    $recentPayments = Order::with('user')
        ->where('status', 'completed')
        ->latest()
        ->take(7)
        ->get();
        return view('backend.pages.app', compact('categoriesCount','totalProducts','orders_count','totalRevenue',
                'completedOrdersCount','recentOrders','recentReviews','recentPayments'
        ));






    }

       public function category(Request $request){

        $query = Category::query();
         if ($request->search) {
                $query->where('title', 'like', '%' . $request->search . '%');
            }

            $categories = $query->latest()->paginate(10);

        return view('frontend.pages.category', compact('categories'));
    }

    public function faq(){
          $faqs = Faq::with('category')
                ->where('status', 1)
                ->latest()
                ->get();

        $faqCatagories = FaqCatagory::where('status', 1)->get();

        return view('frontend.pages.faq', compact('faqCatagories','faqs'));
    }

      public function contact(){
         $settings = WebSetting::first();
        return view('frontend.pages.contact',compact('settings'));
    }

    public function about(){
        $about = AboutUs::first();
        return view('frontend.pages.about', compact('about'));
    }

    public function privacyPolicy(){
        return view('frontend.pages.privacyPolicy');
    }

  public function organicProduct(Request $request)
{
    // ১. প্রোডাক্টের বেস কুয়েরি শুরু করা হলো
    $query = Product::where('status', 1);

    // ২. রেডিও বাটনের 'type' অনুযায়ী কন্ডিশনাল ডাইনামিক কুয়েরি
    if ($request->has('type')) {
        $type = $request->type;

        if ($type == 'organic') {
            // ধরি ডেসক্রিপশন বা নামে organic শব্দ আছে অথবা আপনার আলাদা কলাম আছে
            $query->where('description', 'like', '%organic%');
        }
        elseif ($type == 'fresh') {
            // সাম্প্রতিক যুক্ত হওয়া ফ্রেশ আইটেম
            $query->latest();
        }
        elseif ($type == 'sales') {
            // আপনার sold_count ভ্যালিডেশন কলাম অনুযায়ী সর্বোচ্চ বিক্রি হওয়া পণ্য
            $query->orderBy('sold_count', 'desc');
        }
        elseif ($type == 'discount') {

            $query->whereNotNull('discount_price')->orWhere('price', '<', 5);
        }
    }

    $products = $query->paginate(9);
    $categories = Category::all();

      $featuredProducts = Product::where('status', 1)
        ->orderBy('priority', 'desc')
        ->take(3)
        ->get();

    return view('frontend.pages.organic-products', compact('products', 'categories','featuredProducts'));
}
}
