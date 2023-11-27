<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Student;
use App\Models\Classroom;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function tcreate() {
        return view("auth.register");
    }

    public function screate() {
        return view("student.register");
    }

    public function tstore(Request $request) {
        $user = User::create([
            'name' => $request->tname,
            'surname' => $request->tsname,
            'lastname' => $request->tlname,
            'role' => 0,
            'email' => $request->temail,
            'password' => $request->tpass
        ]);

        Auth::login($user);

        return redirect('/');
    }

    public function sstore(Request $request) {
        $user = User::create([
            'name' => $request->sname,
            'surname' => $request->ssname,
            'lastname' => $request->slname,
            'role' => 1,
            'email' => $request->semail,
            'code' => $request->ccode,
            'password' => $request->spass
        ]);

        Auth::login($user);

        return redirect('/');
    }

    public function tlogin(Request $request) {
        return view('auth.login');
    }

    public function login(Request $request) {
        $data = $request->all();

        $email = $data["email"];
        $password = $data["password"];

        if (Auth::attempt(["email"=> $email,"password"=> $password])) {
            return json_encode([
                "status" => 200
            ]);
        } else {
            return json_encode([
                "status" => 500
            ]);
        }
    }

    public function checkCode(Request $request) {
        $classroom = Classroom::where("code", "=", $request->code)->exists();

        return json_encode([
            "status" => $classroom
        ]);
    }

}
