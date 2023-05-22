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

}
