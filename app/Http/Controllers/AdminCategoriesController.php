<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

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

        return view('category.admin.list', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('category.admin.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        return view('category.admin.create');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $category = $this->categories->find($id);

        return view('category.admin.show', compact('category'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->categories->find($id);

        return view('category.admin.edit', compact('category'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {

        $category = $this->categories->find($id);

        return view('category.admin.edit', compact('category'));

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return view('category.admin.create');
    }

}
