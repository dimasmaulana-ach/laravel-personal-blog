<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Category;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.blogs.index', [
            'title' => 'Blogs',
            'blogs' => Blogs::where('user_id', auth()->user()->id)->latest()->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.blogs.create', [
            'title' => 'Create Blogs',
            'category' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->file('image')->store('blogs-image');

        $validateData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:blogs',
            'image' => 'image|file|max:2048',
            'category_id' => 'required',
            'body' => 'required'
        ]);

        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('blogs-image');
        }

        $validateData['user_id'] = auth()->user()->id;
        Blogs::create($validateData);
        return redirect('dashboard/blogs')->with('success', 'New Blogs has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blogs $blogs)
    {
        return view('dashboard.blogs.details', [
            'title' => 'Blogs',
            'blogs' => $blogs,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blogs $blogs)
    {
        return view('dashboard.blogs.edit', [
            'title' => 'Edit Blogs',
            'blogs' => $blogs,
            'category' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blogs $blogs)
    {
        $rules = ([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:2048',
            'body' => 'required'
        ]);

        if ($request->slug != $blogs->slug) {
            $rules['slug'] = 'required|unique:blogs';
        }

        $validateData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('blogs-image');
        }

        $validateData['user_id'] = auth()->user()->id;
        Blogs::where('id', $blogs->id)
            ->update($validateData);
        return redirect('dashboard/blogs')->with('success', 'Blogs has been updated successfully ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blogs $blogs)
    {
        if($blogs->image){
            Storage::delete($blogs->image);
        }
        Blogs::destroy($blogs->id);
        return redirect()->intended('dashboard/blogs')->with('success', 'User deleted successfully');
    }

    public function generateSlug(Request $title)
    {
        $slug = SlugService::createSlug(Blogs::class, 'slug', $title->title);
        return response()->json(['slug' => $slug]);
    }
}
