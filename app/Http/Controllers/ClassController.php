<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Course;
use App\Models\Thema;
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
            'course_id' => 0,
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
        $user = Auth::user();
        if ($user) {
            $role = $user->role;
            if ($role == 0) {
                return redirect("classes");
            } elseif ($role == 1) {
                $code = $user->code;
                $class = Classroom::where("code", "=", $code)->first();
                $course_id = $class->course_id;

                if ($course_id) {
                    $themas = Thema::where("course_id", "=", $course_id)->where("show", "=", "1")->get();
                    $course = Course::where("id", "=", $course_id)->first();

                    $course_title = $course->title;

                    $count = $themas->count();
    
                    $count_text = $count ? strval($count) . " урок" . naturalText($count) : "";
    
                    return view("student.themas", [
                        "user" => $user,
                        "themas" => $themas,
                        "count_text" => $count_text,
                        "course_title" => $course_title
                    ]);
                } else {
                    return "Учитель не назначил тему.";
                }

            }
    
        } else {
            return view("main");
        }
    }

    public function class(Request $request, string $classcode) {
        $user = Auth::user();
        $user_id = $user->id;

        $classrooms = Classroom::where("tutor_id", "=", $user_id);
        $classroom = $classrooms->where("code", "=", $classcode);
        $classroom_data = $classroom->first();

        $courses = DB::table('courses')->where("tutor_id", "=", $user_id)->get();

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
                "course_id" => $classroom_data->course_id,
                "ccode" => $classcode,
                "students" => $students_array,
                "courses" => $courses
            ]);

        } else {
            return "Ошибка!";
        }
    }

    public function changeCourse(Request $request, string $class) {
        $course_id = intval($request->course_id);
        $user = Auth::user();
        $user_id = $user->id;

        $course = DB::table('courses')->where("id", "=", $course_id)->where("tutor_id", "=", $user_id);

        if ($course->exists() || !$course_id) {
            $classroom = DB::table('classrooms')->where("code", "=", $class);

            $classroom->update([
                "course_id" => $course_id
            ]);

            return json_encode([
                "status" => 500
            ]);
        }

        return json_encode([
            "status" => 200
        ]);
    }

}
