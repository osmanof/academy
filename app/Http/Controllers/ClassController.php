<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


function executeCode(string $code) {
    file_put_contents("qwerty", $code);
    return shell_exec("python3 qwerty 2>&1");
}

function naturalText(int $number) {
    if (strval($number)[-1] == "1") {
        return "";
    } elseif ((strval($number)[-1] == "2" || strval($number)[-1] == "3" || strval($number)[-1] == "4")) {
        if ($number > 9) {
            if (strval($number)[-2] != "1") {
                return "ов";
            } else {
                return "a";
            }
        }
        
        if ($number > 15)
            return "а";
    
        return "a";
    } else {
        return "ов";
    }
}

class ClassController extends Controller
{
    public function test(Request $request) {
    }

    public function createClass(Request $request) {
        $code = strval(rand(1000000, 9999999));
        $user = Auth::user();

        $classroom = Classroom::create([
            'title' => $request->title,
            'tutor' => $request->tutor,
            'tutor_id' => $user->id,
            'code' => $code
        ]);
        return json_encode([
            "code" => $code
        ]);
    }

    public function classes(Request $request) {
        $user = Auth::user();

        $classrooms = DB::table('classrooms')->where("tutor_id", "=", $user->id);
        $classroomsArray = $classrooms->get();
        $count = $classrooms->count();
        $countText = $count ? strval($count) . " класс" . naturalText($count) : "";
        $counts = [];
        
        foreach ($classroomsArray as $key => $value) {
            $code = $value->code;
            $students = DB::table('users')->where('code', '=', $code)->count();
            $counts[] = $students;
        }
    
        return view('classes.classes', [
            "user" => $user,
            "cr" => $classroomsArray, 
            "countText" => $countText, 
            "counts" => $counts
        ]);        
    }

    public function homepage(Request $request) {
        if (Auth::user()) {
            $role = Auth::user()->role;
            if ($role == 0) {
                return redirect("classes");
            } elseif ($role == 1) {
                return "пока тут ничего нет, сорян :(";
            }
    
        } else {
            return view("main");
        }
    }

    public function class(Request $request, string $classcode) {
        $classrooms = Classroom::where("tutor_id", "=", Auth::user()->id);
        $classroom = $classrooms->where("code", "=", $classcode);
        $classroom_data = $classroom->first();

        $students = User::where("code", "=", $classcode)->get();
        $students_array = [];

        foreach ($students as $key => $value) {
            $name = $value->name;
            $surname = $value->surname;
            $lastname = $value->lastname;

            $students_array[] = [
                "name" => $surname . ' ' . $name . ' ' . $lastname,
                "rating" => 0,
                "progress" => 0
            ];
        }

        if ($classroom->exists()) {
            return view("class", [
                "user" => Auth::user(),
                "ctitle" => $classroom_data->title,
                "ccode" => $classcode,
                "students" => $students_array
            ]);

        } else {
            return "Ошибка!";
        }
    }

}
