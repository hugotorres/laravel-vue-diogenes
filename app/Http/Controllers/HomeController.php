<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        return view('welcome', ['categories' => $categories]);
    }


    public function options(Request $request, Response $response)
    {
        $origin = $request->header('origin') ?: $request->url();

        $response->header('Access-Control-Allow-Origin', $origin);
        $response->header('Access-Control-Allow-Headers', 'origin, content-type, accept');
        $response->header('Access-Control-Allow-Methods', 'GET, HEAD, OPTIONS, POST, PATCH, DELETE');

        return $response;
    }
}
