<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Psy\Exception\FatalErrorException;

class ProductsController extends Controller {

    private $productModel;
    private $categoryModel;
    private $productImage;

    public function __construct(Product $product, Category $category, ProductImage $productImage)
    {
        $this->productModel  = $product;
        $this->categoryModel = $category;
        $this->productImage  = $productImage;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        $products = $this->productModel->paginate(10);

        return view('products.index',  compact('products'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = $this->categoryModel->lists('name', 'id');

        return view('products.create', compact('categories'));
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
        $categories = $this->categoryModel->lists('name', 'id');

        return view('products.edit', compact('product', 'categories'));

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
	 * Remove images specified the product
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $product = $this->productModel->find($id);


        foreach($product->images as $img) {

            //remove files
            if(file_exists(public_path() . '/uploads/'.$img->id.'.'.$img->extension)) {
                Storage::disk('public_local')->delete($img->id . '.' . $img->extension);
            }

            //delete registers
            $this->productImage->find($img->id)->delete();
        }

        $product->delete();

        return redirect()->route('products');

	}


    public function images($id)
    {

        $product = $this->productModel->find($id);

        return view('products.images', compact('product'));

    }

    public function createImage($id)
    {

        $product = $this->productModel->find($id);

        return view('products.create_image', compact('product'));

    }

    public function storeImage(Requests\ProductImageRequest $request, $id, ProductImage $productImage)
    {

        $file      = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create(['product_id' => $id, 'extension' => $extension]);

        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('products.images', ['id' => $id]);

    }


    public function destroyImage($id)
    {

        $image = $this->productImage->find($id);

        if(file_exists(public_path() . '/uploads/'.$image->id.'.'.$image->extension)) {
            Storage::disk('public_local')->delete($image->id . '.' . $image->extension);
        }

        $product = $image->product;
        $image->delete();

        return redirect()->route('products.images', ['id' => $product->id]);

    }

}
