<?php namespace CodeComerce\Http\Controllers;

use CodeComerce\Http\Requests;
use CodeComerce\Http\Controllers\Controller;

use CodeComerce\Product;
use Illuminate\Http\Request;

class AdminProductsController extends Controller {

    private $products;

	public function __construct(Product $product)
    {
        $this->products = $product;
    }

    public function index()
    {
        $products = $this->products->all();

        return view('product.list', compact('products'));
    }

}
