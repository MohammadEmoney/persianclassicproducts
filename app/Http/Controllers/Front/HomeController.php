<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = $this->homeData();
        return view('front.home.index', compact('data'));
    }

    public function homeData()
    {
        $data = [];
        $categories = Category::isActive()->get();

        foreach($categories as $category){
            $data[$category->name] = $this->getProducts($category->id);
        }
        return $data;
    }

    public function getProducts($categoryId)
    {
        return Product::where('category_id' , $categoryId)
                ->inRandomOrder()
                ->with('category', 'attributeValues', 'media')
                ->withCount('comments')
                ->isVisible()
                ->take(8)
                ->get();
    }
}
