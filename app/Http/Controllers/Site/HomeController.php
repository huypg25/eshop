<?php

namespace App\Http\Controllers\Site;
use Darryldecode\Cart\Facades\CartFacade as Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Contracts\AttributeContract;

class HomeController extends Controller
{
    protected $productRepository;
    protected $attributeRepository;


    public function __construct(ProductContract $productRepository, AttributeContract $attributeRepository)
    {
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeRepository;
    }

    public function show()
    {
        $products = $this->productRepository->findRandPro();
        $attributes = $this->attributeRepository->listAttributes();
        // dd($product);
        return view('site.pages.homepage', compact('products', 'attributes'));
    }
    public function addToCart(Request $request)
    {
        $product = $this->productRepository->findProductById($request->input('productId'));
        $options = $request->except('_token', 'productId', 'price', 'qty');

        Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty'), $options);

        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }
}
