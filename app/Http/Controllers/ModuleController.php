<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiere;
use App\Models\Module;
use App\Models\Level;
use App\Models\Professeur;
use App\Models\Responsabilite;
use App\Models\Role;
use App\Models\User;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::all();
        return view("modules/index",compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nivaux = Level::all();
        $profs = Professeur::all();
        return view('modules/create',compact(['nivaux','profs']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $filiereId = Filiere::where('codeFiliere',$request->moduleIntitule)->first(['id'])->id;
        Module::create([
            "codeModule" => $request->input('codeModule'),
            "intitule" => $request->input('intitule'),
            "semestre" => $request->input('semestre'),
            "responsableModule" => $request->input('responsableModule'),
            "level_id" => $request->input('niveaux_id'),
            "professeur_id" => $request->input('responsableModule')
        ]);

        $prof = Professeur::where('id',$request->input('responsableModule'))->first();

        $prof = Professeur::where('id',$request->input('responsableModule'))->first();
        $user = User::where('id',$prof->user->id)->first();
        $role=Role::where('intitule','responsable module')->first();
        $user->role()->attach($role);

       return redirect(route("modules.index"));
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
    public function edit(Module $module)
    {
        $nivaux = Level::all();
        $profs = Professeur::all();
        return view('modules/editer',compact(['module','nivaux','profs']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
     

        Module::where('id',$module->id)->update([
            "codeModule" => $request->input('codeModule'),
            "intitule" => $request->input('intitule'),
            "semestre" => $request->input('semestre'),
            "level_id" => $request->input('niveaux_id'),
            "professeur_id" => $request->input('responsableModule')
        ]);
        
        return redirect(route("modules.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Module $module)
    {
        $module->delete();
        return redirect(route("modules.index"));

    }
}
