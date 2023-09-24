<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Devision;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:dashboard-show', ['only' => ['index']]);
    }
    public function index()
    {
        $data['users'] = User::count();
        $data['roles'] = Role::count();
        $data['permissions'] = Permission::count();
        $data['devision'] = Devision::get();
        return view('backend.index',$data);
    }
}
