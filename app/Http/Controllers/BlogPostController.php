<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blog.show')->with('categories', Category::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('blog.show')->with('categories', Category::all())->with('post', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function category(Category $category)
    {
        $search = request()->query('search');
        if ($search) {
            $posts = $category->posts()->where('title', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%")->paginate(4);
        } else {
            $posts = $category->posts()->paginate(4);
        }
        return view('blog.category')
            ->with('categories', Category::all())
            ->with('tags', Tag::all())
            ->with('posts', $posts)
            ->with('category', $category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tag(Tag $tag)
    {
        return view('blog.tag')
            ->with('categories', Category::all())
            ->with('tags', Tag::all())
            ->with('posts', $tag->posts()->paginate(4))
            ->with('tag', $tag);
    }
}
