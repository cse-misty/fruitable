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

class PublicController extends Controller
{
    public function index(Request $request){

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




        return view('frontend.pages.app', compact('categories', 'products','heroSliders','services',));
    }
    public function master(){
        $categoriesCount = Category::count();
        return view('backend.pages.app', compact('categoriesCount'));
    }

       public function category(Request $request){

        $query = Category::query();
         if ($request->search) {
                $query->where('title', 'like', '%' . $request->search . '%');
            }

            $categories = $query->latest()->paginate(4);

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
}
