<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiere;
use App\Models\Professeur;
use App\Models\Responsabilite;
use App\Models\Role;
use App\Models\role_user;
use App\Models\User;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filieres = Filiere::all();
        return view("filieres/index",compact(['filieres']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profs = Professeur::all();
        return view("filieres/ajouterFiliere",compact(['profs']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "codeFiliere"=>"required",
            "intitule"=>"required",
            "responsableFiliere"=>"required",

        ]);

        Filiere::create([
            "codeFiliere" => $request->input('codeFiliere'),
            "intitule" => $request->input('intitule'),
            "professeur_id" => $request->input('responsableFiliere')
        ]);

        $prof = Professeur::where('id',$request->input('responsableFiliere'))->first();
        $user = User::where('id',$prof->user->id)->first();
        $role=Role::where('intitule','responsable filiere')->first();
        $user->role()->attach($role);

        return redirect(route("filieres.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Filiere $filiere)
    {
        $profs = Professeur::all();
        return view('filieres/editer',compact('filiere','profs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filiere $filiere)
    {
        Filiere::where('id',$filiere->id)->update([
            "codeFiliere" => $request->codeFiliere,
            "intitule" => $request->intitule,
            "professeur_id"=>$request->responsableFiliere
        ]);

        
        return redirect(route("filieres.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Filiere $filiere)
    {
        $filiere->delete();
        return redirect(route("filieres.index"));
    }
}
