<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Filiere;
use App\Models\Level;

class NiveauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $niveaux = Level::all();
        return view("niveaux/index",compact(['niveaux']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filieres = Filiere::all();
        return view("niveaux/create",compact(['filieres']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $filiereId = Filiere::where("codeFiliere",$request->filiereIntitule)->first(['id'])->id;
        Level::create([
            "codeNiveau" => $request->codeNiveau,
            "intitule" => $request->intitule,
            "filiere_id" => $request->input('filiere_id')
        ]);
        return redirect(route("niveaux.index"));
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
    public function edit(Level $niveau)
    {
        $filieres = Filiere::all();
        return view("niveaux/edit",compact('filieres','niveau'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $niveau)
    {
        // $filiereId = Filiere::where("codeFiliere",$request->filiereIntitule)->first(['id'])->id;
        Level::where("id",$niveau->id)->update([
            "codeNiveau" => $request->codeNiveau,
            "intitule" => $request->intitule,
            "filiere_id" => $request->input('filiere_id')
        ]);

        return redirect(route("niveaux.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Level $niveau)
    {
        $niveau->delete();
        return redirect(route("niveaux.index"));
    }
}
