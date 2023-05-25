<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Rules\CheckPassword;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'same:password',
        ]);

        $verify_code = rand(100000, 999999);
        logger(" $request->email's verify code ==> $verify_code ");
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->verify_code = $verify_code;
        $student->user_token = md5($verify_code);
        $student->api_token = md5(rand(100000, 999999));
        $student->save();

        return response()->json(["message" => 'Created Successfully! ', "data" => $student], 200);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:students,email',
            'password' => ["required", "min:8", new CheckPassword],
        ], ["email.exists" => "Email or Password Wrong"]);

        $student = Student::where("email", $request->email)->first();
        if (!Hash::check($request->password, $student->password)) {
            return response()->json(["message" => 'Email or Password Wrong ', "data" => null], 200);
        }
        // session(["auth" => $student]);
        return response()->json(["message" => 'Login Successfully! ', "data" => $student, "api_token" => $student->api_token], 200);
    }

    public function logout()
    {
        $student = Student::find(session("auth")->id);
        $student->api_token = md5(rand(100000, 999999));
        $student->save();
        session()->forget('auth');
        return response()->json(["message" => 'Logout Success!'], 200);
    }
}
