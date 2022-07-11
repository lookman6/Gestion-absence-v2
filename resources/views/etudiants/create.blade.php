@extends('layouts.mainlayout')

@section('content')
    <div class="pagetitle">
      <h1>Nouvel Etudiant</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('index')}}">Accueil</a></li>
          <li class="breadcrumb-item">Etudiants</li>
          <li class="breadcrumb-item active">Nouvel Etudiant</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-6">

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
              <form class="row g-3 needs-validation" novalidate action="{{ route('etudiants.store') }}" method="post">
                @csrf
                <div class="col-12">
                  <label for="cin" class="form-label">CNI</label>
                  <input type="text" name="cin" class="form-control" id="cin" required>
                  <div class="invalid-feedback">Veuillez entrer votre CNI</div>
                </div>
                <div class="col-6">
                  <label for="cne" class="form-label">CNE</label>
                  <input type="text" name="cne" class="form-control" id="cne" required>
                  <div class="invalid-feedback">Veuillez entrer votre CNE</div>
                </div>
                <div class="col-6">
                  <label for="codeApoge" class="form-label">Code apogé</label>
                  <input type="text" name="codeApoge" class="form-control" id="codeApoge" required>
                  <div class="invalid-feedback">Veuillez entrer votre Code apogé</div>
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
                  <label class="form-label">Niveau</label>
                     <select class="form-select" aria-label="Default select example" name="niveaux_id">
                       <option selected>Choisissez</option>
                       @foreach($nivaux as $niveau)
                          <option value="{{$niveau->id}}"> {{$niveau->intitule}} </option>
                       @endforeach
                     </select>
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
                {{-- <div class="col-12">
                  <label for="login" class="form-label">Login</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="text" name="login" class="form-control" id="login" required>
                    <div class="invalid-feedback">Choisir un login.</div>
                  </div>
                </div> --}}

                <div class="col-12">
                  <label for="motDePasse" class="form-label">Mot de passe</label>
                  <input type="password" name="password" class="form-control" id="motDePasse" required>
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