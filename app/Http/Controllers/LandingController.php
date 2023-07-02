<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\Category;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.home.index', [
            'title' => 'Home'
        ]);
    }
    public function about(){
        return view('landing.about.index', [
            'title' => 'About'
        ]);
    }
    public function blogs(){
        return view('landing.blogs.index', [
            'title' => 'Blogs',
            'blogs' => Blogs::latest()->filters(request(['search', 'category', 'user']))->paginate(10)->withQueryString(),
            'category' => Category::all()
        ]);
    }
    public function details(Blogs $blogs)
    {
        return view('landing.blogs.details', [
            'title' => 'Blogs',
            'blogs' => $blogs->load('category', 'user')
        ]);
    }
    public function contact()
    {
        return view('landing.contact.index', [
            'title' => 'Contact'
        ]);
    }
}
