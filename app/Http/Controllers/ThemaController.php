<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function naturalText(int $number) {
    if (strval($number)[-1] == "1") {
        return "а";
    } elseif ((strval($number)[-1] == "2" || strval($number)[-1] == "3" || strval($number)[-1] == "4")) {
        if ($number > 9) {
            if (strval($number)[-2] == "1") {
                return "";
            }
        }

        return "и";
    } else {
        return "";
    }
}

class ThemaController extends Controller
{
    public function index(string $id) {
        $user = Auth::user();
        $role = $user->role;

        $thema = DB::table('themas')->where("id", "=", $id)->first();
        $tasks = DB::table("tasks")->where("thema_id","=", $id)->get();

        $count = $tasks->count();

        $count_text = $count ? strval($count) . " задач" . naturalText($count) : "";

        $class_tasks = DB::table("tasks")->where("thema_id","=", $id)->where("type", "=", 0)->get();
        $home_tasks = DB::table("tasks")->where("thema_id","=", $id)->where("type", "=", 1)->get();
        $hard_tasks = DB::table("tasks")->where("thema_id","=", $id)->where("type", "=", 2)->get();
        
        if ($role) {
            return view("student.thema", [
                "user" => $user,
                "ttitle" => $thema -> title,
                "count_text" => $count_text,
                "class_tasks" => $class_tasks,
                "home_tasks" => $home_tasks,
                "hard_tasks" => $hard_tasks
            ]);
        } else {
            return view("thema", [
                "user" => $user,
                "ttitle" => $thema -> title
            ]);
        }

    }
}
