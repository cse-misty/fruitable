<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Faq;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\FaqCatagory;
use App\Models\WebSetting;

class PublicController extends Controller
{
    public function index(Request $request){

     $categories = Category::select('id','title','image','description','slug','thumbnail','priority','status',)
            ->where('status', 1)
            ->orderBy('priority')
            ->limit(4)
             ->get();


        $products = Product::select('id','name','category_id','price','priority','status','image','description')
            ->where('status', 1)
            ->orderBy('priority')
            ->limit(4)
             ->get();
        return view('frontend.pages.app', compact('categories', 'products'));
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
         $setting = WebSetting::first();
        return view('frontend.pages.contact');
    }
}
