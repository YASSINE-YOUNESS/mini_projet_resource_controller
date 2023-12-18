<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_posts = post::all();
        return view('post' , compact('all_posts'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        post::create([
            'nom' => $request->txt_nom ,
            'prenom' => $request->txt_prenom ,
        ]);

        return back();


    }


    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = post::where('id',$id)->first();
        return view('afficher_post' ,compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post =post::where('id',$id)->first();
        $post->update([
            'nom' => $request->txt_nom ,
            'prenom' => $request->txt_prenom ,
        ]);
        $all_posts = post::all();
        return view('post' , compact('all_posts'));

        // return redirect()->route('posts');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        post::destroy($id);
        return back();
    }
}
