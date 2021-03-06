<?php namespace App\Http\Controllers;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

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
	public function welcome()
	{
		return view('welcome');
	}

	public function app()
	{
		return view('app');
	}

	public function home()
	{
		//$user = User::find(1);
		//$user = 'Pras Thp';
		//var_dump($user->name);
		return view('home');
	}

	public function dashboard()
	{
		return view('dashboard');
	}

    public function dashboard2()
    {
        
        return view('dashboard2');
    }

}
