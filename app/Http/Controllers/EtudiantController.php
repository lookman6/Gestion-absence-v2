<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Level;
use App\Models\Etudiant;
use App\Http\Controllers\ServiceController;

use Illuminate\Http\Request;
use App\Imports\EtudiantImport;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class EtudiantController extends Controller
{
    protected $serviceController;

  public function __construct(ServiceController $serviceController)
  {
     $this->serviceController = $serviceController;
  }
    
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function mesAbsences(Request $request)
    {
        
        $mesDonnees = $this->serviceController->getAllAbsEtudByMat($request->user()->id);
        $nombreAsencesDuneMatiere = $mesDonnees[0];
        $nomMatieres = $mesDonnees[1];
        return view('etudiants.mesAbsences',compact('nomMatieres','nombreAsencesDuneMatiere'));
    }
    public function index()
    {
        $etudiants = Etudiant::all();
        $niveaux = Level::all();
        return view('etudiants.index',compact('etudiants','niveaux'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nivaux = Level::all();
        return view('etudiants.create',compact('nivaux'));
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
            "cin"=>$request->input('cin'),
            "lastname"=>$request->input('lastname'),
            "firstname"=>$request->input('firstname'),
            'birthday'=>$request->input('birthday'),
            "sex"=>$request->input('sex'),
            "phone"=>$request->input('phone'),
            "email"=>$request->input('email'),
            'password' => Hash::make($request->password),
        ]);

        Etudiant::create([
            "codeApoge"=>$request->input('codeApoge'),
            "cne"=>$request->input('cne'),
            "level_id"=>$request->input('niveaux_id'),
            "user_id"=>$user->id]
        );
        $user->role()->attach(3);
        return redirect('etudiants')->with('success', 'Etudiant Ajoutée!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    //public function show(Etudiant $etudiant)
    public function show($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        return view('etudiants.show')->with('etudiants', $etudiant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // return view('etudiants.edit');
        $nivaux = Level::all();
        $etudiant = Etudiant::findOrFail($id);
        return view('etudiants.edit',compact('nivaux'))->with('etudiants', $etudiant);

        //$etudiant = Etudiant::with('user')->findOrFail($id);
        //$etudiant->load('user');
        // $user = User::findOrFail($etudiant->user_id);
        //return view('etudiants.edit')->with('etudiants', $etudiant)->with('users', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$etudiant = Etudiant::findOrFail($id);
        //$user = User::findOrFail($etudiant->user_id);

        $etudiant = Etudiant::with('user')->findOrFail($id);
        // $etudiant->load('user');

        $input = $request->all();

        // //$user->update($input);
        $etudiant->user()->update([
            "cin"=>$request->cin,
            "lastname"=>$request->lastname,
            "firstname"=>$request->firstname,
            "birthday"=>$request->birthday,
            "phone"=>$request->phone,
            "sex"=>$request->sex,
            "email"=>$request->email,
        ]);
        $etudiant->update($input);

        //$etudiant->fill($updateData);
        //$etudiant->save();
        return redirect('etudiants')->with('success', 'Etudiant modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $etudiant = Etudiant::with('user')->findOrFail($id);
        User::destroy($etudiant->user_id);
        Etudiant::destroy($id);
        return redirect('etudiants')->with('success', 'Etudiant supprimée!');
    }

    public function import(Request $request)
    {
        Excel::import(new EtudiantImport, $request->file('etudiantFile'));
        return back();
    }
}
