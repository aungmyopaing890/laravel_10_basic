<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'same:password',
        ]);
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->save();
        return redirect()->route('auth.login')->with('message', "Student Register Succesful!");
    }

    public function login()
    {
        return view('auth.login');
    }

    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:students,email',
            'password' => 'required|min:8',
        ], ["email.exists" => "Email or Password Wrong"]);

        $student = Student::where("email", $request->email)->first();
        if (!Hash::check($request->password, $student->password)) {
            return redirect()->route("auth.login")->withErrors(["email" => "Email or Password Wrong"]);
        }
        session(['auth' => $student]);
        return redirect()->route("dashboard.home");
    }

    public function logout()
    {
        session()->forget('auth');
        return redirect()->route('auth.login');
    }

    public function passwordChange()
    {
        return view("auth.changepassword");
    }

    public function passwordChanging(Request $request)
    {
        $request->validate([
            'current_password' => 'required|min:8',
            'password' => 'required|min:8|confirmed',
        ], ["email.exists" => "Email or Password Wrong"]);
        if (!Hash::check($request->current_password, session('auth')->password)) {
            return redirect()->route("auth.passwordChange")->withErrors(["current_password" => "Old Password Wrong"]);
        }
        $student = Student::find(session('auth')->id);
        $student->password = Hash::make($request->password);
        $student->update();
        session()->forget('auth');
        return redirect()->route('auth.login');
    }
}
