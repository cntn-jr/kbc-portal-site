<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SemesterController;
use App\Models\Administrator;
use App\Models\Classes;
use App\Models\Semester;
use App\Models\Student;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:teacher')->except('logout');
        $this->middleware('guest:student')->except('logout');
    }

    //管理者ログインフォーム
    public function adminLoginForm(){
        return view('admin.login', ['authgroup' => 'admin']);
    }

    public function adminAuthentication(Request $request){
        //認証機能
        if(checkPasswordAdmin($request->password1, $request->password2)){
            $request->session()->regenerate();

            Auth::guard('admin')->login(Administrator::first());

            return redirect()->route('semester.select_at_admin');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    // 教師ログインフォーム
    public function teacherLoginForm(){
        return view('teacher.login');
    }

    public function teacherAuthentication(Request $request){
        //認証機能
        if(Auth::guard('teacher')->attempt(['email'=>$request->email, 'password'=>$request->password])){
            $request->session()->regenerate();

            $semester_model = new Semester();
            $last_semester = $semester_model->getLastSemester();
            return redirect()->route('class.select', $last_semester->id);
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    // 生徒ログインフォーム
    public function studentLoginForm(){
        return view('student.login');
    }

    public function studentAuthentication(Request $request){
        //認証機能
        if(Auth::guard('student')->attempt(['email'=>$request->email, 'password'=>$request->password])){
            $request->session()->regenerate();

            $student = Student::where('email', $request->email)->first();
            $class_model = new Classes();
            $last_class_id = $class_model->getLastClassBelongStudent($student->id);

            return redirect()->route('class.show_at_student', $last_class_id);
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

}
