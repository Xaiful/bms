<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $users = User::get();
        $categories = Category::get();
        $data = [
            'categories' => $categories,
            'users' => $users
        ];
        return view('admin.dashboard',$data);
    }
<<<<<<< HEAD
    
    public function userOnlineStatus()
    {
        $test = [];
        $users = User::all();
        foreach ($users as $user) {
            $test[] = Cache::has('user-is-online-' . $user->id);
            if (Cache::has('user-is-online-' . $user->id))
                echo $user->name . " is online. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " <br>";
            else
                echo $user->name . " is offline. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " <br>";
        }
        // dd($test);
    }
=======
>>>>>>> parent of 9875aff (First commit)
}
