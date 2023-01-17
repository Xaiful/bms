<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function index(){
        $posts = Post::get();
        $users = User::get();
        $categories = Category::get();
        $data = [
            'categories' => $categories,
            'posts' => $posts,
            'users' => $users
        ];
        return view('admin.dashboard',$data);
    }
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
}
