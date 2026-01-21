<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Get search value from url
        $search = request()->query('search');
        
        // Get all posts
        $posts = Post::select("*")
        ->when($search, function($query, $search){
            return $query->where('title', 'LIKE', "%{$search}%");
        })
        ->orderBy('id','asc')
        ->paginate(5);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view('posts.create');
        return view('posts.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'image' => 'nullable|image'
        ]);

        $data = [
            'title' => $request->title,
            'content' => $request->content
        ];

        /* if ($request->hasFile('image_name')) {
            $file = $request->file('image_name');
            $imageName = time()."_".$file->getClientOriginalName();

            // Save image
            $file->move(public_path('uploads/posts'), $imageName);
            //public_path('uploads/posts')Laravel helper function return public directory path.
            // /var/www/html/your-project/public/uploads/posts
            $data['image_name'] = $imageName;
        } */

        if($request->hasFile('image_name')){
            $file = $request->file('image_name');
            $imageName = time()."_".$file->getClientOriginalName();
            $file->move(public_path('uploads/posts'),$imageName);

            $data['image_name'] = $imageName;
        }
        $post = Post::create($data);

        return redirect()->route('posts.index')->with('success','Post create successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find id
        $post = Post::findOrFail($id);

        //return view('posts.edit',compact('post'));
        return view('posts.form',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validation
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image_name' => 'nullable|image'
        ]);

        // update data
        $data = [
            'title' => $request->title,
            'content' => $request->content
        ];

        if($request->hasFile('image_name')){
            $file = $request->file('image_name');
            $imageName = time()."_".$file->getClientOriginalName();
            $file->move(public_path('uploads/posts'),$imageName);

            $data['image_name'] = $imageName;
        }

        $post = Post::where('id',$id)
        ->update($data);

        //Redirect
        return redirect()->route('posts.index')->with('success','Post update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Find is
        $post = Post::findOrFail($id);

        //Delete Post
        $post = Post::where('id',$id)->delete();

        // Redirect to posts
        return redirect()->route('posts.index')->with('success', 'Post Deleted successfully');
    }
}
