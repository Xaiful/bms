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
}
