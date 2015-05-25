<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CategoriesController extends Controller {

    private $categoryModel;

    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

	public function index()
    {

        $categories = $this->categoryModel->all();

        return view('categories.index', compact('categories'));

    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Requests\CategoryRequest $request)
    {
        $input = $request->all();

        $category = $this->categoryModel->fill($input);
        $category->save();

        return redirect()->route('categories');
    }

    public function destroy($id)
    {
        $this->categoryModel->find($id)->delete();

        return redirect()->route('categories');
    }

}