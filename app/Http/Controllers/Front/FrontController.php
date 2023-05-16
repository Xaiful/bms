<?php

namespace App\Http\Controllers\Front;
use App\Models\Post;

use App\Models\Header;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Footer;
use App\Models\Intro;
use App\Models\Logo;
use App\Models\Popular;
use App\Models\Slider;

class FrontController extends Controller
{
    public function index()
    {
        $data['headers'] = Header::all();
        $data['logos'] = Logo::all();
        $data['sliders'] = Slider::all();
        $data['intros'] = Intro::all();
        $data['companies'] = Company::all();
        $data['categories'] = Category::all();
        $data['populars'] = Popular::all();
        $data['footers'] = Footer::all();
        return view('frontend.home',$data);
    }

    public function product()
    {   
        $data['headers'] = Header::all();
        $data['logos'] = Logo::all();
        $data['sliders'] = Slider::all();
        $data['categories'] = Category::all();
        $data['footers'] = Footer::all();
        $data['posts'] = Post::all();
        // $data['intros'] = Intro::all();
        // $data['companies'] = Company::all();
        // $data['populars'] = Popular::all();
        return view('frontend.product',$data);
    }
}
