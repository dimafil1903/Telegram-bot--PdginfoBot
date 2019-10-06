<?php


namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MainController  extends Controller
{
    public function show()
    {
        $users_count = DB::table('user')->count();
        $messages_count = DB::table('digests')->count();
        $streets_count = DB::table('street')->count();
        $percent=$users_count/20000;
        $percent_echo= number_format($percent, 3, ',', ' ');

        return view('welcome')->with(compact('users_count','messages_count',"percent_echo","streets_count"));
    }
}