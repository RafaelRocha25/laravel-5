<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller {

    private $productModel;

    public function __construct(Product $product)
    {
        $this->productModel = $product;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        $products = $this->productModel->all();

        return view('products.index',  compact('products'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('products.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\ProductRequest $request)
	{

        $input = $request->all();

        $product = $this->productModel->fill($input);
        $product->save();

        return redirect()->route('products');

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

        $product = $this->productModel->find($id);

        return view('products.edit', compact('product'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request ProductRequest int  $id
	 * @return Response
	 */
	public function update(Requests\ProductRequest $request ,$id)
	{
        $data = $request->all();

        if(!isset($data['featured'])) {
            $data['featured'] = 'off';
        }
        if(!isset($data['recommend'])) {
            $data['recommend'] = 'off';
        }

        $this->productModel->find($id)->update($data);

        return redirect()->route('products');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

        $this->productModel->find($id)->delete();

        return redirect()->route('products');

	}

}
