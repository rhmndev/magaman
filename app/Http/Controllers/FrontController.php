<?php

namespace App\Http\Controllers;

use App\Models\ArticleNews;
use App\Models\Author;
use App\Models\Category;
use App\Models\BannerAdvertisement;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index() {
        $categories = Category::all();

        $articles = ArticleNews::with(['category'])
        ->where('is_featured', 'not_featured')
        ->latest()
        ->take(3)
        ->get();
        
        $featured_articles = ArticleNews::with(['category'])
        ->where('is_featured', 'featured')
        ->inRandomOrder()
        ->take(5)
        ->get();

        $authors = Author::all();

        $banner_ads = BannerAdvertisement::where('is_active', 'active')
        ->where('type', 'banner')
        ->inRandomOrder()
        // ->take(1)
        ->first();

        // Entertainment Acticles = "NOT FEATURED"
        $entertainment_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Entertainment');
        })
        ->where('is_featured', 'not_featured')
        ->latest()
        ->take(3)
        ->get();
        
        // Entertainment Acticles = "FEATURED"
        $entertainment_featured_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Entertainment');
        })
        ->where('is_featured', 'featured')
        ->inRandomOrder()
        ->first();

        // Business Articles = "NOT FEATURED"
        $business_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Business');
        })
        ->where('is_featured', 'not_featured')
        ->latest()
        ->take(3)
        ->get();

        // Business Acticles = "FEATURED"
        $business_featured_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Business');
        })
        ->where('is_featured', 'featured')
        ->inRandomOrder()
        ->first();

        // Automotive Articles = "NOT FEATURED"
        $automotive_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Automotive');
        })
        ->where('is_featured', 'not_featured')
        ->latest()
        ->take(3)
        ->get();

        // Automotive Acticles = "FEATURED"
        $automotive_featured_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Automotive');
        })
        ->where('is_featured', 'featured')
        ->inRandomOrder()
        ->first();

        return view('front.index', compact('entertainment_featured_articles','entertainment_articles','business_articles','business_featured_articles','automotive_articles', 'automotive_featured_articles', 'categories', 'articles', 'authors', 'featured_articles', 'banner_ads'));
    }

    public function category(Category $category) {
        $categories = Category::all();
        $banner_ads = BannerAdvertisement::where('is_active', 'active')
        ->where('type', 'banner')
        ->inRandomOrder()
        ->first();
        return view('front.category', compact('category', 'categories', 'banner_ads'));
    }

    public function author(Author $author) {
        $categories = Category::all();
        $banner_ads = BannerAdvertisement::where('is_active', 'active')
        ->where('type', 'banner')
        ->inRandomOrder()
        ->first();
        return view('front.author', compact('categories', 'author', 'banner_ads'));
    }
}
