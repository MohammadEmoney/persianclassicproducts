<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::find(3);
        // return $category->names[0]['data']['fa'];
        return $category;
    }

    public function show(Category $category)
    {
        $products = $category->products()->paginate(15);
        return view('front.categories.index', compact('products', 'category'));
    }
}
