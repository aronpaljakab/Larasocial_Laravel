<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'text' => 'required'
        ]);
        $post = new Post();
        $post->text = $request->text;
        $post->like = 0;
        $post->user_id = Auth::user()->id;
        $post->save();
        return redirect('/')->with('success', 'Sikeres feltöltés');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with(compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if($post->user->id != Auth::user()->id){
            return redirect('/')->with('error', 'Nincs jogosultságod az oldal megtekintéséhez');
        }
        return view('posts.edit')->with(compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'text' => 'required'
        ]);
        $post = Post::find($id);
        if($post->user->id != Auth::user()->id){
            return redirect('/')->with('error', 'Nincs jogosultságod az oldal megtekintéséhez');
        }
        $post->text = $request->text;
        $post->save();
        return redirect('/')->with('success', 'Sikeres feltöltés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $post = Post::find($id);
        if($post->user->id != Auth::user()->id){
            return redirect('/')->with('error', 'Nincs jogosultságod az oldal megtekintéséhez');
        }
        $post->delete();
        return redirect('/')->with('success', 'Sikeres törlés');
    }

    public function like($id)
    {
        $post = Post::find($id);
        if($post->user->id != Auth::user()->id){
            return redirect('/')->with('error', 'Nincs jogosultságod az oldal megtekintéséhez');
        }
        
        $post->like = $post->like + 1;
        $post->save();
        return redirect('/')->with('success', 'Sikeres like');
    }
}
