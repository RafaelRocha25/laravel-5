<?php namespace CodeComerce\Http\Controllers;

use CodeComerce\Category;
use CodeComerce\Http\Requests;
use CodeComerce\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminCategoriesController extends Controller {

    private $categories;

    public function __construct(Category $category)
    {
        $this->categories = $category;
    }

    public function index()
    {

        $categories = $this->categories->all();

        return view('category.list', compact('categories'));

    }

}
