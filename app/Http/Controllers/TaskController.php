<?php

namespace App\Http\Controllers;

use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


function runTCS($script, $test_cases)
{
    $tcs_host = env("TCS_HOST");
    $tcs_dir = env('APP_DIR') . '/tcs/';
    $cfiles_dir = env('APP_DIR') . '/cfiles/';

    $test_cases_path = $tcs_dir . $test_cases;
    $script_path = $cfiles_dir . $script;

    $result = "";

    if (!empty($tcs_host)) {
        $ssh = new \phpseclib3\Net\SSH2(env("TCS_HOST"), env("TCS_PORT"));

        if (!$ssh->login(env("TCS_USER"), env("TCS_PASSWORD"))) {
            exit('Login Failed');
        }

        $result = $ssh->exec('cd '.$tcs_dir.' && ~/.local/bin/python3 main.py '.$script_path.' '.$test_cases);

    } else {
        $result = shell_exec('cd '.$tcs_dir.' && python3 main.py '.$script_path.' '.$test_cases);

    }

    //unlink($test_cases_path);
    unlink($script_path);

    return $result;
}


function checkCode(string $code, int $task_id) {
    $user_id = Auth::id();

    $token = strval(rand(100000000000, 999999999999));
    $dir = env('APP_DIR') . '/cfiles';
    $name = $token . ".py";


    $dir . '/' . $name . '   ' . $code;

    file_put_contents($dir . '/' . $name, $code);

    $raw_result = runTCS($name, $task_id.".json");
    $result = json_decode($raw_result);

    $classroom = Solution::create([
        'user_id' => $user_id,
        'code' => $code,
        'task_id' => $task_id,
        'status' => $result->status
    ]);

    return $raw_result;
}




// hello

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
            return "Система создания контрольных и самостоятельных задач находится в разработке.";
        }
    }


    public function is_solved(string $thema_id) {
        return true;
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

        $solutions = DB::table("solutions")->where("user_id", "=", $user->id)->where("task_id", "=", $task_id);

        $latest_solution = $solutions->latest()->first();
        $last_status = "0";

        $last_code = "";

        if ($latest_solution) {
            $last_status = $latest_solution->status;

            $last_code = $latest_solution->code;
        }

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

        return $code;
    }
}
