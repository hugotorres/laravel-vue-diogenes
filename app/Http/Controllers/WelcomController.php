<?php

namespace App\Http\Controllers;
use App\Category;
use App\Profile;

use Illuminate\Http\Request;

class WelcomController extends Controller
{




    /*  htis will make these controllers available only to auth users

    public function __construct()
    {
        $this->middleware('auth');
    } */


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $profiles =Profile::all();

        $newProfiles = array_map(function($prod) {
            $images = explode('--',$prod['image']);
            array_shift($images);
            $prod['image'] = $images;
            return $prod;
        }, $profiles->toArray());

        $profiles = collect($newProfiles);

        return view('welcome', ['categories' => $categories,'profiles'=>$profiles->toJson()]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


     function fixImages(){
        dd(profile);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
