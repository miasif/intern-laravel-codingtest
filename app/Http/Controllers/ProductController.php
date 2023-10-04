<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        $products = Product::where('name', 'like', '%' . $keyword . '%')
        ->orWhere('description', 'like', '%' . $keyword . '%')
        ->orWhere('price', 'like', '%' . $keyword . '%')
        ->get();

        return view('product.view', compact('products'));
    }

    public function searchProduct(Request $request)
    {
        $keyword = $request->input('keyword');

        $products = Product::where('name', 'like', '%' . $keyword . '%')->orWhere('description', 'like', '%' . $keyword . '%')->orWhere('price', 'like', '%' . $keyword . '%')->get();

        return response()->json($products);

    }

}
