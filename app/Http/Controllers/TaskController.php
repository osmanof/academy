<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function newTask(string $thema_id) {
        $user = Auth::user();
        $thema = DB::table("themas")->where("id", $thema_id)->first();

        $title = $thema->title;
        $type = $thema->type;

        if (!$type) {
            return view("new-task", [
                "user" => $user,
                "thema_id" => $thema_id
            ]);
        } else {
            return "не повезло!";
        }
        

    }
}
