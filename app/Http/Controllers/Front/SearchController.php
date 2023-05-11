<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\SearchRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(SearchRequest $request)
    {
        $products = Product::where(function($query) use ($request){
            $query->where('name', "LIKE", "%$request->search%")
                    ->orWhere('names->fa', "LIKE", "%$request->search%")
                    ->orWhere('names->it', "LIKE", "%$request->search%");
        })->isVisible()
        ->orderBy($request->order ?? 'created_at', $request->direction ?? "desc")
        ->paginate(15);
        $search = $request->search;
        return view('front.search.index', compact('products', 'search'));
    }
}
