<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absence;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DashboardController extends Controller
{
    
    public function Recup_array($array,String $val) {
        $result = array();
        $i = 0;
        foreach ($array as $key => $value) {
            $result[$i++] =  $value[$val];
        }
        return $result;
    }

    public function diagram(Request $request)
    {
        // $data= Absence::get()
        //                     ->groupBy(function($item) {
        //                     return $item->created_at->month;
        // dd($data);
        //                 });
        $absences_module = Absence::join('etudiants', 'etudiants.id', '=', 'absences.etudiant_id')
                            ->join('levels', 'levels.id', '=', 'etudiants.level_id')
                            ->join('modules', 'levels.id', '=', 'modules.level_id')
                            ->where('absences.statut', '=', "ANJ")
                            ->select('modules.codeModule as module','levels.codeNiveau as niveau', DB::raw("count(etudiants.id) as count"))
                            ->groupBy('modules.codeModule', 'levels.codeNiveau')
                            ->get();
        $absences_module_M = Absence::join('etudiants', 'etudiants.id', '=', 'absences.etudiant_id')
                            ->join('users', 'users.id', '=', 'etudiants.user_id')
                            ->join('levels', 'levels.id', '=', 'etudiants.level_id')
                            ->join('modules', 'levels.id', '=', 'modules.level_id')
                            ->where('absences.statut', '=', "ANJ")
                            ->where('users.sex', '=', "M")
                            ->select('modules.codeModule as module','levels.codeNiveau as niveau', DB::raw("count(etudiants.id) as count"))
                            ->groupBy('modules.codeModule', 'levels.codeNiveau')
                            ->get();
        $absences_module_F = Absence::join('etudiants', 'etudiants.id', '=', 'absences.etudiant_id')
                            ->join('users', 'users.id', '=', 'etudiants.user_id')
                            ->join('levels', 'levels.id', '=', 'etudiants.level_id')
                            ->join('modules', 'levels.id', '=', 'modules.level_id')
                            ->where('absences.statut', '=', "ANJ")
                            ->where('users.sex', '=', "F")
                            ->select('modules.codeModule as module','levels.codeNiveau as niveau', DB::raw("count(etudiants.id) as count"))
                            ->groupBy('modules.codeModule', 'levels.codeNiveau')
                            ->get();
        $array_module = $absences_module->toArray();
        $array_module_M = $absences_module_M->toArray();
        $array_module_F = $absences_module_F->toArray();
        //dd($array_module_M);
        //$module = DashboardController::Recup_array($array_module_F,'module');
        //dd($module);
        //     $array_module_dataset = array(array());
    //     $i = 0;
    //     foreach ($array_module as $key => $value) {
    //         foreach ($value as $sub_key => $sub_val) {
    //             if($sub_key == 'niveau')
    //                 $array_module_dataset[$i]['name'] = 'Niveau '.$sub_val;
    //             elseif ($sub_key == 'count') {
    //                 $array_module_dataset[$i]['data'] = $sub_val;
    //             }
    //         }
    //         $i++;
    //     }
    //    dd($array_module_dataset);
        $absences_module = (new LarapexChart)->setTitle('Absences')
            ->setXAxis(DashboardController::Recup_array($array_module,'module'))
            ->setDataset(DashboardController::Recup_array($array_module,'count'))
            ->setLabels(DashboardController::Recup_array($array_module,'module'));
        $absences_module_sex = (new LarapexChart)->setTitle('Absences par modules')
        ->setSubtitle('Pour chaque sexe')
        ->setType('bar')
        ->setColors(['#ff455f', '#008FFB'])
        //->setHorizontal(true)
        ->setXAxis(DashboardController::Recup_array($array_module,'module'))
        ->setGrid(true)
        ->setDataset([
            [
                'name' => 'Filles',
                'data' => DashboardController::Recup_array($array_module_F,'count')
            ],
            [
                'name' => 'Garcons',
                'data' => DashboardController::Recup_array($array_module_M,'count')
            ]
        ])
        ->setStroke(1);


        $absences_filiere = Absence::join('etudiants', 'etudiants.id', '=', 'absences.etudiant_id')
                            ->join('levels', 'levels.id', '=', 'etudiants.level_id')
                            ->join('filieres', 'filieres.id', '=', 'levels.filiere_id')
                            ->where('absences.statut', '=', "ANJ")
                            ->select('filieres.codeFiliere as filiere','levels.codeNiveau as niveau', DB::raw("count(etudiants.id) as count"))
                            ->groupBy('filieres.codeFiliere', 'levels.codeNiveau')
                            ->get();
        $absences_filiere_F = Absence::join('etudiants', 'etudiants.id', '=', 'absences.etudiant_id')
                            ->join('users', 'users.id', '=', 'etudiants.user_id')
                            ->join('levels', 'levels.id', '=', 'etudiants.level_id')
                            ->join('filieres', 'filieres.id', '=', 'levels.filiere_id')
                            ->where('absences.statut', '=', "ANJ")
                            ->where('users.sex', '=', "F")
                            ->select('filieres.codeFiliere as filiere','levels.codeNiveau as niveau', DB::raw("count(etudiants.id) as count"))
                            ->groupBy('filieres.codeFiliere', 'levels.codeNiveau')
                            ->get();
        $absences_filiere_M = Absence::join('etudiants', 'etudiants.id', '=', 'absences.etudiant_id')
                            ->join('users', 'users.id', '=', 'etudiants.user_id')
                            ->join('levels', 'levels.id', '=', 'etudiants.level_id')
                            ->join('filieres', 'filieres.id', '=', 'levels.filiere_id')
                            ->where('absences.statut', '=', "ANJ")
                            ->where('users.sex', '=', "M")
                            ->select('filieres.codeFiliere as filiere','levels.codeNiveau as niveau', DB::raw("count(etudiants.id) as count"))
                            ->groupBy('filieres.codeFiliere', 'levels.codeNiveau')
                            ->get(); 
        $array_filiere = $absences_filiere->toArray();
        $array_filiere_M = $absences_filiere_M->toArray();
        $array_filiere_F = $absences_filiere_F->toArray();
        $absences_filiere = (new LarapexChart)->setTitle('Absences')
            ->setXAxis(DashboardController::Recup_array($array_filiere,'filiere'))
            ->setDataset(DashboardController::Recup_array($array_filiere,'count'))
            ->setLabels(DashboardController::Recup_array($array_filiere,'filiere'));
        $absences_filiere_sex = (new LarapexChart)->setTitle('Absences par filieres')
        ->setSubtitle('Pour chaque sexe')
        ->setType('bar')
        ->setColors(['#ff455f', '#008FFB'])
        //->setHorizontal(true)
        ->setXAxis(DashboardController::Recup_array($array_filiere,'filiere'))
        ->setGrid(true)
        ->setDataset([
            [
                'name' => 'Filles',
                'data' => DashboardController::Recup_array($array_filiere_F,'count')
            ],
            [
                'name' => 'Garcons',
                'data' => DashboardController::Recup_array($array_filiere_M,'count')
            ]
        ])
        ->setStroke(1);


        $absences_matiere = Absence::join('etudiants', 'etudiants.id', '=', 'absences.etudiant_id')
                            ->join('levels', 'levels.id', '=', 'etudiants.level_id')
                            ->join('modules', 'levels.id', '=', 'modules.level_id')
                            ->join('matieres', 'matieres.module_id', '=', 'modules.id')
                            ->where('absences.statut', '=', "ANJ")
                            ->select('matieres.intitule as matiere','levels.codeNiveau as niveau', DB::raw("count(etudiants.id) as count"))
                            ->groupBy('matieres.intitule', 'levels.codeNiveau') //,DB::select('select MONTH(dateCreneau) from creneaus')
                            ->get();
        $absences_matiere_F = Absence::join('etudiants', 'etudiants.id', '=', 'absences.etudiant_id')
                            ->join('users', 'users.id', '=', 'etudiants.user_id')
                            ->join('levels', 'levels.id', '=', 'etudiants.level_id')
                            ->join('modules', 'levels.id', '=', 'modules.level_id')
                            ->join('matieres', 'matieres.module_id', '=', 'modules.id')
                            ->where('absences.statut', '=', "ANJ")
                            ->where('users.sex', '=', "F")
                            ->select('matieres.intitule as matiere','levels.codeNiveau as niveau', DB::raw("count(etudiants.id) as count"))
                            ->groupBy('matieres.intitule', 'levels.codeNiveau')
                            ->get();
        $absences_matiere_M = Absence::join('etudiants', 'etudiants.id', '=', 'absences.etudiant_id')
                            ->join('users', 'users.id', '=', 'etudiants.user_id')
                            ->join('levels', 'levels.id', '=', 'etudiants.level_id')
                            ->join('modules', 'levels.id', '=', 'modules.level_id')
                            ->join('matieres', 'matieres.module_id', '=', 'modules.id')
                            ->where('absences.statut', '=', "ANJ")
                            ->where('users.sex', '=', "M")
                            ->select('matieres.intitule as matiere','levels.codeNiveau as niveau', DB::raw("count(etudiants.id) as count"))
                            ->groupBy('matieres.intitule', 'levels.codeNiveau')
                            ->get();
        $array_matiere = $absences_matiere->toArray();
        $array_matiere_M = $absences_matiere_M->toArray();
        $array_matiere_F = $absences_matiere_F->toArray();
        $absences_matiere = (new LarapexChart)->setTitle('Absences')
            ->setXAxis(DashboardController::Recup_array($array_matiere,'matiere'))
            ->setWidth('450')
            ->setDataset(DashboardController::Recup_array($array_matiere,'count'))
            ->setLabels(DashboardController::Recup_array($array_matiere,'matiere'));
        $absences_matiere_sex = (new LarapexChart)->setTitle('Absences par matieres')
        ->setSubtitle('Pour chaque sexe')
        ->setType('bar')
        ->setColors(['#ff455f', '#008FFB'])
        //->setHorizontal(true)
        ->setXAxis(DashboardController::Recup_array($array_matiere,'matiere'))
        ->setGrid(true)
        ->setDataset([
            [
                'name' => 'Filles',
                'data' => DashboardController::Recup_array($array_matiere_F,'count')
            ],
            [
                'name' => 'Garcons',
                'data' => DashboardController::Recup_array($array_matiere_M,'count')
            ]
        ])
        ->setStroke(1);                    
        return view('index',compact('absences_module','absences_module_sex',
                                    'absences_filiere','absences_filiere_sex',
                                    'absences_matiere','absences_matiere_sex'));
        
    }
}
