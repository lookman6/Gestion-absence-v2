@extends('layouts.mainlayout')

@section('content')
    <div class="pagetitle">
      <h1>Nouveau professeur</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('index')}}">Accueil</a></li>
          <li class="breadcrumb-item">Professeurs</li>
          <li class="breadcrumb-item active">Nouveau professeur</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-6 center" >

          <div class="card">
            <div class="card-body">
              
              <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Creer un compte</h5>
                <p class="text-center small">Entrez vos details personnels pour creer un compte</p>
              </div>
              @if($errors->any())
                <div class="alert alert-danger">
                  <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{$error}}</li>
                  @endforeach
                  </ul>
                </div>
              @endif
              <form class="row g-3 needs-validation" novalidate action="{{ route('professeurs.store') }}" method="post">
                @csrf
                <div class="col-12">
                  <label for="cin" class="form-label">CNI</label>
                  <input type="text" name="cin" class="form-control" id="cin" required>
                  <div class="invalid-feedback">Veuillez entrer votre CNI</div>
                </div>
                <div class="col-12">
                  <label for="matricule" class="form-label">Matricule</label>
                  <input type="text" name="matricule" class="form-control" id="matricule" required>
                  <div class="invalid-feedback">Veuillez entrer votre Matricule</div>
                </div>
                <div class="col-6">
                  <label for="nom" class="form-label">Nom</label>
                  <input type="text" name="lastname" class="form-control" id="nom" required>
                  <div class="invalid-feedback">Veuillez entrer votre nom !</div>
                </div>
                <div class="col-6">
                  <label for="prenom" class="form-label">Prenom</label>
                  <input type="text" name="firstname" class="form-control" id="prenom" required>
                  <div class="invalid-feedback">Veuillez entrer votre prenom</div>
                </div>
                <div class="col-12">
                  <label for="dateNaissance" class="form-label">Date de naissance</label>
                  <input type="date" data-provide="datepicker" data-date-autoclose="true" name="birthday" class="form-control" id="dateNaissance" required>
                  <div class="invalid-feedback">Choisir votre date de naissance</div>
                </div>
                <div class="col-12">
                  <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Sexe</legend>
                    <div class="col-sm-10">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="sex" id="masculin" value="masculin" checked>
                        <label class="form-check-label" for="masculin">
                          Masculin
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="sex" id="feminin" value="feminin">
                        <label class="form-check-label" for="feminin">
                          Feminin
                        </label>
                      </div>
                    </div>
                  </fieldset>
                </div>
                <div class="col-12">
                  <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Grade</legend>
                    <div class="col-sm-10">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="grade" id="PROFESSEUR" value="PROFESSEUR" checked>
                        <label class="form-check-label" for="PROFESSEUR">
                          PROFESSEUR
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="grade" id="DOCTORANT" value="DOCTORANT">
                        <label class="form-check-label" for="DOCTORANT">
                          DOCTORANT
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="grade" id="PFE" value="PFE">
                        <label class="form-check-label" for="PFE">
                          PFE
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="grade" id="PA" value="PA">
                        <label class="form-check-label" for="PA">
                          PA
                        </label>
                      </div>
                    </div>
                  </fieldset>
                </div>
                <div class="col-12">
                  <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Statut</legend>
                    <div class="col-sm-10">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="statut" id="PERMANENT" value="PERMANENT" checked>
                        <label class="form-check-label" for="PERMANENT">
                          PERMANENT
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="statut" id="VACATAIRE" value="VACATAIRE">
                        <label class="form-check-label" for="VACATAIRE">
                          VACATAIRE
                        </label>
                      </div>
                    </div>
                  </fieldset>
                </div>
                <div class="col-6">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="email" required>
                  <div class="invalid-feedback">Veuillez entrer votre adresse email</div>
                </div>
                <div class="col-6">
                  <label for="telephone" class="form-label">Telephone</label>
                  <input type="text" name="phone" class="form-control" id="telephone" required>
                  <div class="invalid-feedback">Veuillez entrer votre numero de telephone</div>
                </div>
              

                <div class="col-12">
                  <label for="motDePasse" class="form-label">Mot de passe</label>
                  <input type="password" name="password" class="form-control" id="password" required>
                  <div class="invalid-feedback">Veuillez entrer votre mot de passe</div>
                </div>

                
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="submit">Enregistrer</button>
                </div>
              </form>


            </div>
          </div>

        </div>
      </div>
    </section>
@endsection