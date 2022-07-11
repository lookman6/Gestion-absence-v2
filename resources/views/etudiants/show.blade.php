@extends('layouts.mainlayout')

@section('content')
    <div class="pagetitle">
      <h1>Afficher un etudiant</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('index')}}">Accueil</a></li>
          <li class="breadcrumb-item">Etudiants</li>
          <li class="breadcrumb-item active">Affichage</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
                  <h5 class="card-title">Details de l'etudiant</h5>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">CIN</div>
                    <div class="col-lg-9 col-md-8">{{ $etudiants->user->cin }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">CNE</div>
                    <div class="col-lg-9 col-md-8">{{ $etudiants->cne }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Code Apogé</div>
                    <div class="col-lg-9 col-md-8">{{ $etudiants->codeApoge }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nom</div>
                    <div class="col-lg-9 col-md-8">{{ $etudiants->user->lastname }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Prenom</div>
                    <div class="col-lg-9 col-md-8">{{ $etudiants->user->firstname }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Niveau</div>
                    <div class="col-lg-9 col-md-8">{{ $etudiants->level->intitule }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Date de naissance</div>
                    <div class="col-lg-9 col-md-8">{{ $etudiants->user->birthday }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Sexe</div>
                    <div class="col-lg-9 col-md-8">{{ $etudiants->user->sex }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Email</div>
                    <div class="col-lg-9 col-md-8">{{ $etudiants->user->email }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Telephone</div>
                    <div class="col-lg-9 col-md-8">{{ $etudiants->user->phone }}</div>
                  </div>
                  {{-- <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Login</div> --}}
                    {{-- <div class="col-lg-9 col-md-8">{{ $etudiants->user->login }}</div> --}}
                  {{-- </div> --}}
                  <br/><br/>
                  <div>
                    <a href="{{ route('etudiants.edit',$etudiants->id) }}" style="margin-right: 15px;"><button type="button" class="btn btn-info">Modifier</button></a>
                    <form method="POST" action="{{ route('etudiants.destroy',$etudiants->id) }}" accept-charset="UTF-8" style="display:inline">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-danger js-sweetalert" title="Delete" data-type="confirm" onclick="return confirm(&quot;Confirm delete?&quot;)">Supprimer</button>
                  </form>
                  </div>

                </div>

            </div>
          </div>

        </div>
      </div>
    </section>

    @endsection