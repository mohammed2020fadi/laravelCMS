<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('VerifyCategoriesCounr')->only(['create', 'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request()->query('search');
        if ($search) {
            $posts = 
                Post::where('title', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%")
                ->orWhere('content', 'LIKE', "%{$search}%")->paginate(4);
        } else {
            $posts = Post::paginate(4);
        }
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->isAdmin()) {
            return view('posts.create')->with('categories', Category::all())->with('tags', Tag::all());
        } else {
            session()->flash('error', 'Soory you are not have permisstion to visit this page');
            return view('posts.index')->with('posts', Post::all());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        // Upload the image
        $image = $request->image->store('posts');

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'published_at' => $request->published_at,
            'image' => $image,
            'category_id' => $request->category_id
        ]);
        
        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }
        session()->flash('success', 'Post Created :)');
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (auth()->user()->isAdmin()) {
            return view('posts.create')->with('post', $post)->with('categories', Category::all())->with('tags', Tag::all());
        } else {
            session()->flash('error', 'Soory you are not have permisstion to visit this page');
            return view('posts.index')->with('posts', Post::all());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only(['title', 'description', 'content', 'published_at', 'category_id']);
        // Check if new image
        if ($request->hasFile('image')) {

            // Upload new image
                $image = $request->image->store('posts');    
                $data['image'] = $image;
            // Delete old image
                $post->deleteImage();
        }

        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }

        $post->update($data);
        session()->flash('success', 'Post Updated :)');
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        if ($post->trashed()) {
            
            $post->deleteImage();
            $post->forceDelete();
            
        } else {
            
            $post->delete();

        }

        session()->flash('success', 'Post Deleted :)');
        return redirect()->back();
    }

    /**
     * Trashe the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function trashed(Post $post)
    {
        $trashed = Post::onlyTrashed()->paginate(4);
        return view('posts.index')->with('posts', $trashed);
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        $post->restore();
        session()->flash('success', 'Post Restored :)');
        return redirect()->back();
    }
}
