<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\InfoPost;
use App\Tag;
use Illuminate\Support\Str;

class PostController extends Controller
{
    private $postValidation = [
        'title' => 'required|string|max:100',
        'subtitle' => 'required|string|max:150',
        'text' => 'required|string',
        'author' => 'required|string|max:60'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data["slug"] = Str::slug($data["title"]);

        $request->validate($this->postValidation);


        $post = new Post();
        $post->fill($data);
        $postSaveResult = $post->save();


        $data["post_id"] = $post->id;
        $infoPost = new InfoPost();
        $infoPost->fill($data);
        $infoPostSaveResult = $infoPost->save();


        if ($postSaveResult && !empty($data["tags"])) {
            $post->tags()->attach($data["tags"]);
        }


        return redirect()
            ->route('posts.index')
            ->with('message', "Post '". $post->name ."' creato correttamente!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();

        return view('posts.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        $data["slug"] = Str::slug($data["title"]);

        $request->validate($this->postValidation);

        $post->update($data);


        $infoPost = $post->infoPost;
        // $infoPost = InfoPost::where('post_id', $post->id)->first();
        // $data["post_id"] = $post->id;
        $infopost->update($data);


        if (empty($data["tags"])) {
            $post->tags()->detach();
        } else {
            $post->tags()->sync($data["tags"]);
        }


        return redirect()
            ->route('posts.index')
            ->with('message', "Post '". $post->name ."' aggiornato correttamente!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $name = $post->name;
        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('message', "Post '". $name ."' eliminato correttamente!");
    }
}
