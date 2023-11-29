<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


function checkCode(string $code, int $task_id) {
    $token = strval(rand(100000000000, 999999999999));
    $path = "../cfiles/". $token .".py";

    file_put_contents($path, $code);

    $raw = shell_exec("python3 ../tcs/main.py ". $path ." ../tcs/". $task_id .".json");
    $result = json_decode($raw);

    return $result;
}

function runTCSScript($script, $test_cases)
{
    $tcs_host = env("TCS_HOST");
    $dir = env('APP_DIR') . '/tcs';
    if (!empty($tcs_host)) {
        $ssh = new \phpseclib3\Net\SSH2(env("TCS_HOST"), env("TCS_PORT"));

        if (!$ssh->login(env("TCS_USER"), env("TCS_PASSWORD"))) {
            exit('Login Failed');
        }
        
        return $ssh->exec('cd '.$dir.' && ~/.local/bin/python3 main.py '.$script.' '.$test_cases);
    } else {
        return shell_exec('cd '.$dir.' && python3 main.py '.$script.' '.$test_cases);
    }
}

// hello

class TaskController extends Controller
{
    public function test() {
        return runTCSScript('624799574502.py', '3.json');
    }

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
            return "Система создания контрольных и самостоятельных задач находится в разработке.";
        }
    }

    public function task(string $task_id)  {
        $user = Auth::user();

        $task = DB::table("tasks")->where("id", "=", $task_id)->first();
        $thema_id = $task->thema_id;

        $thema = DB::table("themas")->where("id","=", $thema_id)->first();
        $course_id = $thema->course_id;

        $course = DB::table("courses")->where("id","=", $course_id)->first();
        $course_title = $course->title;

        $task_title = $task->title;
        $task_text = $task->task_text;
        $task_stdin = $task->stdin;
        $task_stdout = $task->stdout;
        $task_samples = $task->samples;

        $thema_title = $thema->title;

        $solved = false;
        $last_code = 'print("Hello!")';
        $last_status = 300;

        return view("student.task", [
            "user" => $user,
            "task_title" => $task_title,
            "task_data" => [
                "Условие" => $task_text,
                "Формат входных данных" => $task_stdin,
                "Формат выходных данных" => $task_stdout,
                //"Примеры" => $task_samples
            ],
            "thema_title" => $thema_title,
            "course_title" => $course_title,
            "last_status" => $last_status,
            "last_code" => $last_code
        ]);
    }

    public function sendSolution(Request $request, $task_id) {
        $code = $request->code;
        
        $result = checkCode($code, $task_id);

        return $result;
    }
}
