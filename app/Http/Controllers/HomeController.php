<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        if (auth()->user()->hasRole('Quality Employee')){
            return  redirect(url('/qa/dashboard'));
        }elseif (auth()->user()->hasRole('QC')){
            return  redirect(url('/qc/dashboard'));
        }elseif (auth()->user()->hasRole('Assistant Manager')){
            return  redirect(url('/assistantmanager/dashboard'));
        }elseif (auth()->user()->hasRole('Purchase Employee')){
            return  redirect(url('/purchase'));
        }elseif (auth()->user()->hasRole('HR')){
            return  redirect(url('/admin/hr'));
        }elseif (auth()->user()->hasRole('Production Employee')){
            return  redirect(url('/production/dashboard'));
        }elseif (auth()->user()->hasRole('Gate Employee')){
            return  redirect(url('/gate/dashboard'));
        }

//        return  redirect(url('/dashboard'));








        return view('dashboard');
    }
}
