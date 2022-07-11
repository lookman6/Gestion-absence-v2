@extends('layouts.mainlayout')

@section('content')
<div class="pagetitle">
      <h1>Gestion d'absences</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('index')}}">Accueil</a></li>
          <li class="breadcrumb-item">Absence</li>
          <li class="breadcrumb-item active">Modifier</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <p><label for="filiere">Filières</label>


    <select name="filiere" id="filiere">
        <option  value="0">Choisir filiere</option>
        @foreach($filieres as $filiere)
            <option  value="{{ $filiere->niveauId }}">{{ $filiere->codeNiveau }}</option>
        @endforeach
    </select>

    <label for="matiere">Matiere</label>
    <select name="matiere" id="matiere">
        @foreach($matieres as $matiere)
            <option  value="{{ $matiere->matiereId }}">{{ $matiere->intitule }}</option>
        @endforeach
    </select>

    <label for="absenceDate">Absences du</label>
    <select name="absenceDate" id="absenceDate"></select>

    <label for="creneau">Creneaux</label>
    <select name="creneau" id="creneau"></select>
</p>
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
                      <th scope="col" id="head-presence">Presence</th>
                    </tr>
                  </thead>
                  <tbody id="list-etd">
                  </tbody>
                </table>
                <a href="#"><button type="button" class="btn btn-primary" id="absence">Appliquer les modifications</button></a>

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
 // Changement de filiere
 $('#filiere').on('change', function(e) {
     var filiere_id = e.target.value;
     matiereUpdate(filiere_id);
 });
//  Requête Ajax pour les matiere
function matiereUpdate(filiereId) {
    var matieres= @json($matieres);
    $('#matiere').empty();
        for(var m of matieres) {
            if(m.niveauId==filiereId){
                $('#matiere').append($('<option>', {
                 value: m.matiereId,
                 text : m.intitule
             }));
            }
        };
            var matiere_id= document.getElementById('matiere').value;
            absenceDateUpdate(matiere_id);
        //  if(matiere_id) {
        //      $('#matiere').val(matiere_id).prop('selected', true);
        //  }
 };
});
//  Requête Ajax pour les creneau
function absenceDateUpdate(matId) {
    var dateAbs= @json($date);
    $('#absenceDate').empty();
    for(var d of dateAbs){
        if(matId==d.matiereId){
            $('#absenceDate').append($('<option>', {
                 value: d.absenceDate,
                 text : d.absenceDate
             }));
        }
    }
    var date= document.getElementById('absenceDate').value;
    creneauxUpdate(matId,date);
};
$('#absenceDate').on('change', function(e) {
     var dateAbs = e.target.value;
     var mat= document.getElementById('matiere').value;
     creneauxUpdate(mat,dateAbs);
 });
//  Requête Ajax pour les matiere
    function etudiantUpdate(dateAbs,creneauId)
    {
        var etds= @json($etudiants);
        // var cren= @json($creneaux);
        //document.getElementById("head-presence").colSpan = '"'+cren.lenght+'"';
        $('#list-etd').empty();
    for(var e of etds){
        if(dateAbs==e.absenceDate && creneauId==e.creneauId){
            var radAbs1="<input type="+'"radio"'+"id="+'"P"'+"name="+'"'+e.absenceId+'"'+ " value="+'"P"'+">";
            var radAbs2="<input type="+'"radio"'+"id="+'"AJ"'+"name="+'"'+e.absenceId+'"'+ " value="+'"AJ"'+">";
            var radAbs3="<input type="+'"radio"'+"id="+'"ANJ"'+"name="+'"'+e.absenceId+'"'+ " value="+'"ANJ"'+">";
            switch(e.statut){
                case 'P':
                radAbs1="<input type="+'"radio"'+"id="+'"P"'+"name="+'"'+e.absenceId+'"'+ " value="+'"P"'+" checked="+'"checked"'+">";
                break;
                case 'AJ':
                radAbs2="<input type="+'"radio"'+"id="+'"AJ"'+"name="+'"'+e.absenceId+'"'+ " value="+'"AJ"'+" checked="+'"checked"'+">"
                break;
                case 'ANJ':
                radAbs3="<input type="+'"radio"'+"id="+'"ANJ"'+"name="+'"'+e.absenceId+'"'+ " value="+'"ANJ"'+" checked="+'"checked"'+">"
                break;
            }
            $("#list-etd").append(
                "<tr>"+
                    "<td>" + e.codeApoge + "</td>"+
                    "<td>" + e.firstname + "</td>"+
                    "<td>" + e.lastname + "</td>"+
                    "<td id="+'"presence"'+">"+
                        radAbs1+
                        "<label for="+'"P"'+" >P &nbsp;</label>"+
                        radAbs2+
                        "<label for="+'"AJ"'+">AJ &nbsp;</label>"+
                        radAbs3+
                        "<label for="+'"ANJ"'+">ANJ &nbsp;</label>"+
                    "</td>"+
                    "</tr>");
        }
    }
    };
    function creneauxUpdate(matId,dateValue) {
    var creneaux= @json($creneaux);
    $('#creneau').empty();
    for(var c of creneaux){
        if(matId==c.matiereId && c.absenceDate==dateValue){
            $('#creneau').append($('<option>', {
                 value: c.creneauId,
                 text : c.heureDebut +" - "+c.heureFin
             }));
        }
    }
    var creneauId= document.getElementById('creneau').value;
    etudiantUpdate(dateValue,creneauId);
};
$('#creneau').on('change', function(e) {
     var creneauId = e.target.value;
     var dateAbs= document.getElementById('absenceDate').value;
     etudiantUpdate(dateAbs,creneauId);
 });

 document.getElementById('absence').onclick = function() {
    var buttonRadios = document.getElementsByTagName('input');
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

    var userId= {{auth()->user()->id}};

    jQuery.ajax({
                  url: "{{ route('absences.update',auth()->user()->id) }}",
                  method: 'put',
                  data: {"_token": "{{ csrf_token() }}",
                            "abs":tabs,
                        },
                  success: function(result){
                     console.log(result);
                  }});

}

      </script>
@endsection
