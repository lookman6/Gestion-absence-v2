@extends('layouts.mainlayout')

@section('content')
<div class="pagetitle">
      <h1>Absences</h1>
  
    </div><!-- End Page Title -->

    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Mes absences</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <br/><br/>
                <thead>
                  <tr>
                    <th scope="col">Matières</th>
                    <th scope="col">Nb.Présences</th>
                    <th scope="col">Nb.Absences justifiées</th>
                    <th scope="col">NB.Absences non justifiées</th>
                  </tr>
                </thead>
                <tbody>
                @isset($nomMatieres)
                @foreach($nomMatieres as $nomMatiere)
                    <tr>
                        <td >{{ $nomMatiere}}</td>
                        <td ><center>{{ $nombreAsencesDuneMatiere[$loop->iteration - 1]["P"] }}</center></td>
                        <td><center>{{ $nombreAsencesDuneMatiere[$loop->iteration - 1]["AJ"] }}</center></td>
                        <td><center>{{$nombreAsencesDuneMatiere[$loop->iteration - 1 ]["ANJ"]}}</center> </td>
                    </tr>
                @endforeach 
                @endisset
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
@endsection

