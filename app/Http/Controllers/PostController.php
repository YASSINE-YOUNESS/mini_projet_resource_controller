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
        // code validation si les champs vide ou non
        $request->validate([
            'txt_nom'=>'required' ,
            'txt_prenom'=>'required' ,
        ]);

        // code Ajouter
        post::create([
            'nom' => $request->txt_nom ,
            'prenom' => $request->txt_prenom ,
        ]);

        $notification = array(
            'message_id' => 'Ajouter Avec Succees',
            'alert-type' => 'success'
        );

        return back()->with($notification);



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


        $notification = array(
            'message_id' => 'Modifier Avec Success',
            'alert-type' => 'info'
        );



        return view('post', compact('all_posts'));





    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        post::destroy($id);

        $notification = array(
            'message_id' => 'Supprimer Avec Succees',
            'alert-type' => 'warning'
        );

        return back()->with($notification);

    }
}
