<?php


namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Show individual post
    public function show(Post $post) {
        //$post = Post::findOrFail($id);
        return view('blog-post', ['post'=> $post]);
    }

    // Create post form
    public function create() {
        //$post = Post::findOrFail($id);
        return view('admin.posts.create');
    }

    // Create save post
    public function store() {
        $inputs = request()->validate([
            'title'=>'required|min:8|max:200',
            'post_image'=>'file',
            'body'=>'required'
        ]);

        if(request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
        }
    }
}
