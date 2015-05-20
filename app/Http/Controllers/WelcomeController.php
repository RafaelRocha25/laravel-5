<?php namespace CodeComerce\Http\Controllers;

class WelcomeController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('welcome');
	}

    public function example()
    {
        $data['name'] = "Rafael da Rocha";
        $data['sobrenome'] = "Borges";

        return view('example', $data);

    }

}
