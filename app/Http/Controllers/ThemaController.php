<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ThemaController extends Controller
{
    public function index(string $id) {
        $user = Auth::user();

        $thema = DB::table('themas')->where("id", "=", $id)->first();
        
        return view("thema", [
            "user" => $user,
            "ttitle" => $thema -> title
        ]);
    }
}
