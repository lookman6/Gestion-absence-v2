<?php

namespace App\Exports;

use App\Models\Absence;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AbsenceExport implements FromCollection, WithHeadings
//class AbsenceExport implements FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    protected $dateDebut;
    protected $dateFin;
    protected $idProf;
    protected $matiere;


      public function __construct($dateDebut, $dateFin, $idProf, $matiere)
    {
        $this->dateFin=$dateFin;
        $this->dateDebut=$dateDebut;
        $this->idProf = $idProf;
        $this->matiere = $matiere;
      
    }

     public function headings():array{
        return [
                'CodeApoge',
                'Date',
                'Heure debut',
                'Heure fin',
                'Matiere',
                'Matricule Enseignant',
                'Statut'];
    }

   /* public function query()
    {

       // dd($this->dateFin);
        $data = Absence::join('etudiants', 'etudiants.id', '=', 'absences.etudiant_id')
                       ->join('creneaus', 'creneaus.id', '=', 'absences.creneau_id')
                       ->join('matieres', 'matieres.id', '=', 'creneaus.matiere_id')
                       ->join('professeurs', 'professeurs.id', '=', 'creneaus.professeur_id')
                       ->whereDate('creneaus.dateCreneau', '>=', $this->dateDebut)
                       ->whereDate('creneaus.dateCreneau', '<=', $this->dateFin)
                       ->get(['etudiants.codeApoge','creneaus.dateCreneau','creneaus.heureDebut','creneaus.heureFin','matieres.intitule','professeurs.matricule', 'absences.statut']);
                       //dd($data);
                       return $data;
    }*/

    /*public function map($AbsenceExport): array[


    ]
    {

    }*/

     public function collection()
    {
       $data = Absence::join('etudiants', 'etudiants.id', '=', 'absences.etudiant_id')
                       ->join('creneaus', 'creneaus.id', '=', 'absences.creneau_id')
                       ->join('matieres', 'matieres.id', '=', 'creneaus.matiere_id')
                       ->join('professeurs', 'professeurs.id', '=', 'creneaus.professeur_id')
                     //  ->where('professeurs.id', '=', $this->idProf)
                     //  ->whereIn('matieres.intitule', Matiere::where('professeur_id',$idProf)->get())
                       ->where('matieres.intitule', '=', $this->matiere)
                     //  ->where('filieres.codeFiliere', '=', $this->filiere)
                       ->whereDate('creneaus.dateCreneau', '>=', $this->dateDebut)
                       ->whereDate('creneaus.dateCreneau', '<=', $this->dateFin)
                       ->get(['etudiants.codeApoge','creneaus.dateCreneau','creneaus.heureDebut','creneaus.heureFin','matieres.intitule','professeurs.matricule', 'absences.statut']);
                       //dd($data);
                       return $data;
    }

   /* public function collection()
    {
       $data = Absence::join('etudiants', 'etudiants.id', '=', 'absences.etudiant_id')
                       ->join('creneaus', 'creneaus.id', '=', 'absences.creneau_id')
                       ->join('matieres', 'matieres.id', '=', 'creneaus.matiere_id')
                       ->join('professeurs', 'professeurs.id', '=', 'creneaus.professeur_id')
                       ->whereDate('creneaus.dateCreneau', '>=', $this->dateDebut)
                       ->whereDate('creneaus.dateCreneau', '<=', $this->dateFin)
                       ->get(['etudiants.codeApoge','creneaus.dateCreneau','creneaus.heureDebut','creneaus.heureFin','matieres.intitule','professeurs.matricule', 'absences.statut']);
                       //dd($data);
                       return $data;
    }*/

    /*public function collection()
    {
        $data = Absence::join('etudiants', 'etudiants.id', '=', 'absences.etudiant_id')
                       ->join('creneaus', 'creneaus.id', '=', 'absences.creneau_id')
                       ->join('matieres', 'matieres.id', '=', 'creneaus.matiere_id')
                       ->join('professeurs', 'professeurs.id', '=', 'creneaus.professeur_id')
                       ->get(['etudiants.codeApoge','creneaus.dateCreneau','creneaus.heureDebut','creneaus.heureFin','matieres.intitule','professeurs.matricule']);
        return $data;
    }*/
}