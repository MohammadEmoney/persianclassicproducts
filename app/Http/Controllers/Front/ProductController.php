<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\CommentRequest;
use App\Models\AttributeType;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $product->load(['category', 'comments' => function ($query) {
            $query->where('is_approved', 1);
        }]);
        $attributeTypes = AttributeType::whereHas('attributeValues.products', function ($query) use ($product) {
            $query->where('products.id', $product->id);
        })->get();

        $relatedProducts = Product::isVisible()
            ->inRandomOrder()
            ->where('id', "!=", $product->id)
            ->where('category_id', $product->category_id)
            ->latest()
            ->take(6)
            ->get();
        $product->increment('views');
        return view('front.products.show', compact('product', 'relatedProducts', 'attributeTypes'));
    }

    public function comment(Product $product, CommentRequest $request)
    {
        $product->comments()->create($request->validated());
        return back()->with(['message' => __('messages.comment_created')]);
    }
}
