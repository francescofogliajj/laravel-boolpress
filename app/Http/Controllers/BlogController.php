<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Comment;

class BlogController extends Controller
{
    public function index() {
        $posts = Post::all();

        return view('blog', compact('posts'));
    }

    public function show($slug) {
        $post = Post::where('slug', $slug)->firstOrFail();

        // if (empty($post)) {
        //     abort('404');
        // }

        return view('post', compact('post'));
    }

    public function addComment(Request $request, $id) {
        // dump($id);
        // dd($request->all());

        $data = $request->all();
        $data["post_id"] = $id;

        $newComment = new Comment();
        $newComment->fill($data);
        // $newComment->author = $data["author"];
        // $newComment->text = $data["text"];
        // $newComment->post_id = $id;
        $newComment->save();

        $post = Post::findOrFail($id);

        return redirect()
            ->route('post', $post->slug);
    }
}
