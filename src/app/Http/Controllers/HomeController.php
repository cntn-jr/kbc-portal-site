<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        switch (Auth::user()->MODEL_TYPE){
            case 'admin':
                return redirect()->route('semester.select_at_admin');
                break;
            case 'teacher':
                return redirect()->route('semester.select_at_teacher');
                break;
            case 'student':
                return redirect()->route('semester.select_at_student');
                break;
        }
        return view('auth.login');
    }
}
