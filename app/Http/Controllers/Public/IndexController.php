<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;


class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {
            $data = [];
            return view('frontend.index', $data);
        } catch (\Throwable $th) {
        }
    }
}
