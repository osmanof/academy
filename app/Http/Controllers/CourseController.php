<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Thema;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

class CourseController extends Controller
{
    public function courses(Request $request) {
        $user = Auth::user();

        $courses = DB::table('courses')->where("tutor_id", "=", $user->id);
        $coursesArray = $courses->get();
        $count = $courses->count();
        $countText = $count ? strval($count) . " курс" . naturalText($count) : "";
        $themas_counts = [];
        $tasks_counts = [];
    
        foreach ($coursesArray as $key => $value) {
            $themas_counts[] = 0;
            $tasks_counts[] = 0;
        }

        return view("courses.courses", [
            "user" => Auth::user(),
            "coursesArray" => $coursesArray,
            "themasCount" => $themas_counts,
            "tasksCount" => $tasks_counts,
            "countText" => $countText
        ]);
    }

    public function course(string $id) {
        $course = DB::table('courses')->where("id", "=", $id)->first();

        return view("course", [
            "user" => Auth::user(),
            "title" => $course->title
        ]);
    }

    public function createCourse(Request $request) {
        $user = Auth::user();
        $title = $request->title;
        $color = $request->color;
        $accessibility = $request->accessibility;
        $id = $request->id;

        $classroom = Course::create([
            'title' => $title,
            'color' => $request->color,
            'accessibility' => $accessibility,
            'tutor_id' => $id
        ]);

        return json_encode([
            "status" => 200
        ]);

    }

    public function createThema(Request $request, string $id) {
        $title = $request->title;
        $date = $request->date;
        $time = $request->time;
        $type = $request->type;

        $thema = Thema::create([
            'title' => $title,
            'deadline_date' => $date,
            'deadline_time' => $time,
            'type' => $type,
            'course_id' => $id
        ]);

        return json_encode([
            "status" => 200
        ]);
    }
}
