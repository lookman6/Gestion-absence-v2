@extends('layouts.mainlayout')

@section('content')
    <div class="pagetitle">
      <h1>Afficher un professeur</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('index')}}">Accueil</a></li>
          <li class="breadcrumb-item">Professeurs</li>
          <li class="breadcrumb-item active">Affichage</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
                  <h5 class="card-title">Details du professeur</h5>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">CIN</div>
                    <div class="col-lg-9 col-md-8">{{ $professeurs->user->cin }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Matricule</div>
                    <div class="col-lg-9 col-md-8">{{ $professeurs->matricule }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nom</div>
                    <div class="col-lg-9 col-md-8">{{ $professeurs->user->lastname }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Prenom</div>
                    <div class="col-lg-9 col-md-8">{{ $professeurs->user->firstname }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Date de naissance</div>
                    <div class="col-lg-9 col-md-8">{{ $professeurs->user->birthday }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Sexe</div>
                    <div class="col-lg-9 col-md-8">{{ $professeurs->user->sex }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Grade</div>
                    <div class="col-lg-9 col-md-8">{{ $professeurs->grade }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Statut</div>
                    <div class="col-lg-9 col-md-8">{{ $professeurs->statut }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Email</div>
                    <div class="col-lg-9 col-md-8">{{ $professeurs->user->email }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Telephone</div>
                    <div class="col-lg-9 col-md-8">{{ $professeurs->user->phone }}</div>
                  </div>
                  {{-- <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Login</div> --}}
                    {{-- <div class="col-lg-9 col-md-8">{{ $professeurs->user->login }}</div> --}}
                  {{-- </div>
                   --}}
                  <br/><br/>
                  <div>
                    <a href="{{ route('professeurs.edit',$professeurs->id) }}" style="margin-right: 15px;"><button type="button" class="btn btn-info">Modifier</button></a>
                    <form method="POST" action="{{ route('professeurs.destroy',$professeurs->id) }}" accept-charset="UTF-8" style="display:inline">
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