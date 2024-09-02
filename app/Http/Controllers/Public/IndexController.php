<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Partner;
use App\Models\Program;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->program= new Program();
        $this->partner= new Partner();
        $this->event= new Event();
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
            $data['programs']=$this->program->where('status',true)->paginate(15);
            $data['partners']=$this->partner->where('status',true)->orderby('position','asc')->paginate(15);
            $data['events']=$this->event->where('status',true)->orderby('position','asc')->paginate(15);
            return view('frontend.index', $data);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
