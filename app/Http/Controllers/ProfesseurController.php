<?php

namespace App\Http\Controllers;

use App\Models\Professeur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfesseurController extends Controller
{

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professeurs = Professeur::all();
        return view('professeurs.index',compact('professeurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professeurs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request)
    {
        //dd('Inscription effectuee !');
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::create([
            "role"=>"enseignant",
            "cin"=>$request->input('cin'),
            "lastname"=>$request->input('lastname'),
            "firstname"=>$request->input('firstname'),
            'birthday'=>$request->input('birthday'),
            "sex"=>$request->input('sex'),
            "phone"=>$request->input('phone'),
            "email"=>$request->input('email'),
            'password' => Hash::make($request->password),
        ]);

        Professeur::create([
            "matricule"=>$request->input('matricule'),
            "grade"=>$request->input('grade'),
            "statut"=>$request->input('statut'),
            'user_id'=>$user->id,
        ]);
        return redirect('professeurs')->with('success', 'Ajout effectué !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Professeur  $professeur
     * @return \Illuminate\Http\Response
     */
    //public function show(Professeur $professeur)
    public function show($id)
    {
        $professeur = Professeur::findOrFail($id);
        return view('professeurs.show')->with('professeurs', $professeur);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Professeur  $professeur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // return view('professeurs.edit');
        $professeur = Professeur::findOrFail($id);
        return view('professeurs.edit')->with('professeurs', $professeur);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Professeur  $professeur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $professeur = Professeur::findOrFail($id);
        $input = $request->all();
        $professeur->user()->update([
            "cin"=>$request->cin,
            "lastname"=>$request->lastname,
            "firstname"=>$request->firstname,
            "birthday"=>$request->birthday,
            "phone"=>$request->phone,
            "sex"=>$request->sex,
            "email"=>$request->email,
        ]);
        $professeur->update($input);
        return redirect('professeurs')->with('success', 'Modification effectuée !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Professeur  $professeur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $professeur = Professeur::with('user')->findOrFail($id);
        User::destroy($professeur->user_id);
        Professeur::destroy($id);
        return redirect('professeurs')->with('success', 'Suppression effectuée !!!');
    }
}
