@extends('layouts.mainlayout')

@section('content')
    <div class="pagetitle">
      <h1>Modifier un professeur</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('index')}}">Accueil</a></li>
          <li class="breadcrumb-item">Professeurs</li>
          <li class="breadcrumb-item active">Modifier</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
              <div class="col-lg-6">
      
                <div class="card">
                  <div class="card-body">
                    
                    <div class="pt-4 pb-2">
                      <h5 class="card-title text-center pb-0 fs-4">Modifier un professeur</h5>
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
                    <form class="row g-3 needs-validation" novalidate action="{{ route('professeurs.update',$professeurs->id) }}" method="post">
                        {!! csrf_field() !!}
                        @method("PATCH")
                        <input type="hidden" name="id" id="id" value="{{$professeurs->id}}" id="id" />
                        <div class="col-12">
                          <label for="cin" class="form-label">CNI</label>
                          <input type="text" name="cin" class="form-control" id="cin" value="{{$professeurs->user->cin}}" required>
                          <div class="invalid-feedback">Veuillez entrer votre CIN</div>
                        </div>
                      <div class="col-12">
                        <label for="matricule" class="form-label">Matricule</label>
                        <input type="text" name="matricule" value="{{$professeurs->matricule}}" class="form-control" id="matricule" required>
                        <div class="invalid-feedback">Veuillez entrer votre Matricule</div>
                      </div>
                      <div class="col-6">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" name="lastname" class="form-control" id="nom" value="{{$professeurs->user->lastname}}" required>
                        <div class="invalid-feedback">Veuillez entrer votre nom !</div>
                      </div>
                      <div class="col-6">
                        <label for="prenom" class="form-label">Prenom</label>
                        <input type="text" name="firstname" class="form-control" id="prenom" value="{{$professeurs->user->firstname}}" required>
                        <div class="invalid-feedback">Veuillez entrer votre prenom</div>
                      </div>
                      <div class="col-12">
                        <label for="dateNaissance" class="form-label">Date de naissance</label>
                        <input type="date" data-provide="datepicker" data-date-autoclose="true" name="birthday" value="{{$professeurs->user->birthday}}"  class="form-control" id="dateNaissance" required>
                        <div class="invalid-feedback">Choisir votre date de naissance</div>
                      </div>
                      <div class="col-12">
                        <fieldset class="row mb-3">
                          <legend class="col-form-label col-sm-2 pt-0">Sexe</legend>
                          <div class="col-sm-10">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="sex" id="masculin" value="masculin" {{ $professeurs->user->sex == "masculin" ? 'checked' : '' }}>
                              <label class="form-check-label" for="masculin">
                                Masculin
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="sex" id="feminin" value="feminin" {{ $professeurs->user->sex == "feminin" ? 'checked' : '' }}>
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
                              <input class="form-check-input" type="radio" name="grade" id="PROFESSEUR" value="PROFESSEUR" {{ $professeurs->grade == "PROFESSEUR" ? 'checked' : '' }}>
                              <label class="form-check-label" for="PROFESSEUR">
                                PROFESSEUR
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="grade" id="DOCTORANT" value="DOCTORANT" {{ $professeurs->grade == "DOCTORANT" ? 'checked' : '' }}>
                              <label class="form-check-label" for="DOCTORANT">
                                DOCTORANT
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="grade" id="PFE" value="PFE" {{ $professeurs->grade == "PFE" ? 'checked' : '' }}>
                              <label class="form-check-label" for="PFE">
                                PFE
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="grade" id="PA" value="PA" {{ $professeurs->grade == "PA" ? 'checked' : '' }}>
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
                              <input class="form-check-input" type="radio" name="statut" id="PERMANENT" value="PERMANENT" {{ $professeurs->statut == "PERMANENT" ? 'checked' : '' }}>
                              <label class="form-check-label" for="PERMANENT">
                                PERMANENT
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="statut" id="VACATAIRE" value="VACATAIRE" {{ $professeurs->statut == "VACATAIRE" ? 'checked' : '' }}>
                              <label class="form-check-label" for="VACATAIRE">
                                VACATAIRE
                              </label>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                      <div class="col-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" value="{{$professeurs->user->email}}" class="form-control" id="email" required>
                        <div class="invalid-feedback">Veuillez entrer votre adresse email</div>
                      </div>
                      <div class="col-6">
                        <label for="telephone" class="form-label">Telephone</label>
                        <input type="text" name="phone" value="{{$professeurs->user->phone}}" class="form-control" id="telephone" required>
                        <div class="invalid-feedback">Veuillez entrer votre numero de telephone</div>
                      </div>
                      {{-- <div class="col-12">
                        <label for="login" class="form-label">Login</label>
                        <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend">@</span> --}}
                          {{-- <input type="text" name="login"  value="{{$professeurs->login}}"  class="form-control" id="login" required> --}}
                          {{-- <div class="invalid-feedback">Choisir un login.</div>
                        </div>
                      </div> --}}
      
                      
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