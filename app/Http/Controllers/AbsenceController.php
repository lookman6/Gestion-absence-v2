<?php

namespace App\Http\Controllers;

use App\Models\Creneau;
use App\Models\Matiere;
use App\Models\Professeur;
use Illuminate\Http\Request;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MatiereController;
use App\Models\Absence;
use App\Exports\AbsenceExport;
use \Maatwebsite\Excel\Facades\Excel;
use Auth;

class AbsenceController extends Controller
{

    protected $serviceController;

  public function __construct(ServiceController $serviceController)
  {
     $this->serviceController = $serviceController;
  }

public function exportIntoExcel(Request $request)
    {
       // return (new AbsenceExport($request->dateDebut,$request->dateFin))->download('absenceList.xlsx');
       // return (new AbsenceExport($this->dateDebut,$this->dateFin))->download('absenceList.xlsx');
        //return Excel::download(new AbsenceExport,'absenceList.xlsx');
        //dd("absenceList_".$request->dateDebut."-".$request->dateFin."xlsx");
        return Excel::download(new AbsenceExport($request->dateDebut,$request->dateFin,$request->idProf,$request->matiere),"absenceList_".$request->dateDebut."-".$request->dateFin.".xlsx");
    }

    public function exportIntoCSV(Request $request)
    {
        return Excel::download(new AbsenceExport($request->dateDebut,$request->dateFin,$request->idProf,$request->matiere),"absenceList_".$request->dateDebut."-".$request->dateFin.".csv");
        //return Excel::download(new AbsenceExport,'absenceList.csv');
    }

    public function afficher()
    {
        //$matieres = Matiere::where('professeur_id','=', Auth::user()->id)->get();
        // $filieres= $this->serviceController->getFilieresWhereProfessorTeaches(Auth::user()->id);
        $matieres = Matiere::all();
        return view('professeurs.export', compact('matieres'));

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filieres= $this->serviceController->getFilieresWhereProfessorTeaches($request->user()->id);
        return view('absences.ajouter',compact('filieres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('absences.ajouter');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd("bonjour");
        $abs=$request->abs;
        $matiere_id=$request->mat_id;
        $creneau_id= $request->cren_id;

        foreach($abs as $a){
            $abse= Absence::create([
                'statut'=>$a['present'],
                'etudiant_id'=>$a['id'],
                'creneau_id'=>$creneau_id
            ]);
            dd($abse);
        }
        return redirect(route("absences.index"));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function modifier(Request $request)
    {

        $filieres= $this->serviceController->getFilWhereAbs($request->user()->id);
        $matieres= $this->serviceController->getMatWhereAbs($request->user()->id);
        $date= $this->serviceController->getDateoFAbs($request->user()->id);
        $etudiants= $this->serviceController->getEtdAbs($request->user()->id);
        $creneaux= $this->serviceController->getCrenAbs($request->user()->id);

        return view('absences.modifier',compact(
                                                'filieres',
                                                'matieres',
                                                'date',
                                                'etudiants',
                                                'creneaux'
                                            ));
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
        $abs=$request->abs;
        $matiere_id=$request->mat_id;
        $creneau_id= $request->cren_id;
        foreach($abs as $a){
           Absence::where('id',$a["id"])
           ->update([
            "statut" => $a["present"]
           ]);

        }
        return redirect(route("absences.modifier"))->with('success', 'Modification effectuée !!');
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

    public function getMatByFilProf(Request $request,$id)
    {
       return $this->serviceController->getMatByFilProf($request->user()->id,$id);

    }

    public function getEtudByNiv($id)
    {
      return $this->serviceController->getEtudByNiv($id);

    }

    public function getCrenByProfMat(Request $request, $id){
        return $this->serviceController->getCrenByProfMat($request->user()->id,$id);
    }
}
