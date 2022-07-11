@extends('layouts.mainlayout')

@section('content')
<div class="pagetitle">
      <h1>Gestion d'absences</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('index')}}">Accueil</a></li>
          <li class="breadcrumb-item">Absence</li>
          <li class="breadcrumb-item active">Ajouter</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <label for="filiere">Filières</label>


    <select name="filiere" id="filiere">
        <option  value="0">Choisir filiere</option>
        @foreach($filieres as $filiere)
            <option  value="{{ $filiere->id }}">{{ $filiere->codeNiveau }}</option>
        @endforeach
    </select>

    <label for="matiere">Matieres</label>
    <select name="matiere" id="matiere"></select>

    <label for="creneau">Creneaux</label>
    <select name="creneau" id="creneau"></select>

    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Liste des etudiants</h5>
                <!-- Table with stripped rows -->
                @if($message = Session::get('success'))
                  <p style="color: green">{{$message}}</p>
                  <br/>
                @endif
                <table class="table datatable">
                  <br/><br/>
                  <thead>
                    <tr>
                      <th scope="col">Code apoge</th>
                      <th scope="col">Nom</th>
                      <th scope="col">Prenom</th>
                      <th scope="col">Presence</th>
                    </tr>
                  </thead>
                  <tbody id="list-etd">
                  </tbody>
                </table>
                <a href="{{route('absences.store')}}"><button type="button" class="btn btn-primary" id="absence">Soumettre</button></a>

                <!-- End Table with stripped rows -->

              </div>
            </div>

          </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>
       $(function() {

 // Récupération des id pour filiere et matiere
 var filiere_id = {{ old('filiere', 0) }};
 $('filiere').val("1");

 // Sélection de la filiere
 $('#filiere').val(filiere_id).prop('selected', true);
 // Synchronisation des matieres
 matiereUpdate(filiere_id);

// Synchronisation des etudiants
etudiantUpdate(filiere_id);


 // Changement de filiere
 $('#filiere').on('change', function(e) {
     var filiere_id = e.target.value;
    //  matiere_id = false;
     matiereUpdate(filiere_id);
     etudiantUpdate(filiere_id);
 });

//  Requête Ajax pour les matiere
 function matiereUpdate(filiereId) {
    $.get('{{ url('matieres') }}/'+ filiereId + "'", function(data) {
         $('#matiere').empty();
        $.each(data, function(index, matieres) {
             $('#matiere').append($('<option>', {
                 value: matieres.id,
                 text : matieres.intitule
             }));
             var matiere_id= document.getElementById('matiere').value;
             creneauUpdate(matiere_id);
        });
        //  if(matiere_id) {
        //      $('#matiere').val(matiere_id).prop('selected', true);
        //  }
 })};


 //  Requête Ajax pour les matiere
    function etudiantUpdate(filiereId)
    {
        $.get('{{ url('etudiant') }}/'+ filiereId + "'", function(data)
        {
            $('#list-etd').empty();
            var $value="CSS";
            $.each(data, function(index, etudiants) {
            $("#list-etd").append(
                "<tr>"+
                    "<td>" + etudiants.codeApoge + "</td>"+
                    "<td>" + etudiants.firstname + "</td>"+
                    "<td>" + etudiants.lastname + "</td>"+
                    "<td id="+'"presence"'+">"+
                        "<input type="+'"radio"'+"id="+'"P"'+"name="+'"'+etudiants.id+'"'+ " value="+'"P"'+" checked="+'"checked"'+">"+
                        "<label for="+'"P"'+" >P &nbsp;</label>"+
                        "<input type="+'"radio"'+"id="+'"AJ"'+"name="+'"'+etudiants.id+'"'+ " value="+'"AJ"'+">"+
                        "<label for="+'"AJ"'+">AJ &nbsp;</label>"+
                        "<input type="+'"radio"'+"id="+'"ANJ"'+"name="+'"'+etudiants.id+'"'+ " value="+'"ANJ"'+">"+
                        "<label for="+'"ANJ"'+">ANJ &nbsp;</label>"+
                    "</td>"+

                    "</tr>");
            })

        })
    };


    document.getElementById('absence').onclick = function() {
    var buttonRadios = document.getElementsByTagName('input');
    var matiere_id= document.getElementById('matiere').value;
    var creneau_id= document.getElementById('creneau').value;
    var absences={
        constructor(id,p){
            this.id=id;
            this.p=p;
        }
    };
    var tabs=[];
    for (var rad of buttonRadios)
    {
        if (rad.type == 'radio' && rad.checked) {
            tabs.push({
                'id':rad.name,
                'present':rad.value
            });
        }
    }

    jQuery.ajax({
                  url: "{{ url('/absenceStore') }}",
                  method: 'post',
                  data: {"_token": "{{ csrf_token() }}",
                            "abs":tabs,
                            "mat_id":matiere_id,
                            "cren_id":creneau_id
                        },
                  success: function(result){
                     console.log(result);
                  }});
}

});

//  Requête Ajax pour les creneau
function creneauUpdate(matId) {
    $.get('{{ url('creneaux') }}/'+ matId + "'", function(data) {
         $('#creneau').empty();
        $.each(data, function(index, creneau) {
             $('#creneau').append($('<option>', {
                 value: creneau.id,
                 text : creneau.heureDebut + " - "+ creneau.heureFin
             }));
        });
 })};

      </script>
@endsection
