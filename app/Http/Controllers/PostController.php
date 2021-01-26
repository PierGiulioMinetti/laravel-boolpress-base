<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('posts.index', compact('posts'));
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
        // GET DATA
        $data = $request->all();
        // dd($data);

        // VALIDATION
        $request->validate($this->ruleValidation());

        // SET POST SLUG
        $data['slug']= Str::slug($data['title'], '-');
        // dd($data);

        // se la img è presente
        if(!empty($data['path_img'])) {
            $data['path_img'] = Storage::disk('public')->put('images', $data['path_img']);
        }

        // SAVE TO DB
        $newPost = new Post();
        $newPost->fill($data);
        $saved = $newPost->save();

        if($saved){
            return redirect()->route('posts.index');
        } else {
            return redirect()->route('homepage');
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // return $slug;
        $post = Post::where('slug', $slug)->first();
        // dd($post);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {                           
                            // due parametri è uguaglianza
        $post = Post::where('slug', $slug)->first();

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // GET DATA FROM FORM
        $data = $request->all();

        // VALIDATE
        $request->validate($this->ruleValidation());

        // GET POST TO UPDATE
        $post = Post::find($id);

        // UPDATE SLUG WHEN I CHANGE NAME
        $data['slug'] = Str::slug($data['title'], '-');

        // IF IMG CHANGE
        // check if I have an img posted
        if(!empty($data['path_img'])) {
            // delete previous one before posting the new one
            if(!empty($post->path_img));{
                Storage::disk('public')->delete($post->path_img);
            }
            // upload new img
            $data['path_img'] = Storage::disk('public')->put('images', $data['path_img']);
        }

            // UPDATE DB 
            $updated = $post->update($data);  // <--- fillable nel Model

            // CHECK IF WORKED
            if($updated){
                return redirect()->route('posts.show', $post->slug);
            } else {
                return redirect()->route('homepage');
            }
            //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // siamo all'interno della classe PostController
    private function ruleValidation() {
        return [
            'title'=> 'required',
            'body'=> 'required',
            'path_img'=> 'image',
        ];
    }

}
