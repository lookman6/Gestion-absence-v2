@extends('layouts.mainlayout')

@section('content')
    <div class="pagetitle">
      <h1>Modifier un etudiant</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('index')}}">Accueil</a></li>
          <li class="breadcrumb-item">Etudiants</li>
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
                      <h5 class="card-title text-center pb-0 fs-4">Modifier un etudiant</h5>
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
                    <form class="row g-3 needs-validation" novalidate action="{{ route('etudiants.update',$etudiants->id) }}" method="post">
                        {!! csrf_field() !!}
                        @method("PATCH")
                        <input type="hidden" name="id" id="id" value="{{$etudiants->id}}" id="id" />
                        <input type="hidden" name="user_id" id="user_id" value="{{$etudiants->user_id}}" id="user_id" />
                      <div class="col-12">
                        <label for="cin" class="form-label">CNI</label>
                        <input type="text" name="cin" class="form-control" id="cin" value="{{$etudiants->user->cin}}" required>
                        <div class="invalid-feedback">Veuillez entrer votre CIN</div>
                      </div>
                      <div class="col-6">
                        <label for="cne" class="form-label">CNE</label>
                        <input type="text" name="cne" value="{{$etudiants->cne}}" class="form-control" id="cne" required>
                        <div class="invalid-feedback">Veuillez entrer votre CNE</div>
                      </div>
                      <div class="col-6">
                        <label for="codeApoge" class="form-label">Code apogé</label>
                        <input type="text" name="codeApoge" value="{{$etudiants->codeApoge}}" class="form-control" id="codeApoge" required>
                        <div class="invalid-feedback">Veuillez entrer votre Code apogé</div>
                      </div>
                      <div class="col-6">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" name="lastname" class="form-control" id="nom" value="{{$etudiants->user->lastname}}" required>
                        <div class="invalid-feedback">Veuillez entrer votre nom !</div>
                      </div>
                      <div class="col-6">
                        <label for="prenom" class="form-label">Prenom</label>
                        <input type="text" name="firstname" class="form-control" id="prenom" value="{{$etudiants->user->firstname}}" required>
                        <div class="invalid-feedback">Veuillez entrer votre prenom</div>
                      </div>

                      <div class="col-12">
                        <label class="form-label">Niveau</label>
                           <select class="form-select" aria-label="Default select example" name="niveaux_id">
                            <option value="{{$etudiants->level->id}}"> {{$etudiants->level->intitule}} </option>
                             @foreach($nivaux as $niveau)
                                <option value="{{$niveau->id}}"> {{$niveau->intitule}} </option>
                             @endforeach
                           </select>
                        </div>

                      <div class="col-12">
                        <label for="dateNaissance" class="form-label">Date de naissance</label>
                        <input type="date" data-provide="datepicker" data-date-autoclose="true" name="birthday" value="{{$etudiants->user->birthday}}"  class="form-control" id="dateNaissance" required>
                        <div class="invalid-feedback">Choisir votre date de naissance</div>
                      </div>
                      <div class="col-12">
                        <fieldset class="row mb-3">
                          <legend class="col-form-label col-sm-2 pt-0">Sexe</legend>
                          <div class="col-sm-10">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="sex" id="masculin" value="masculin" {{ $etudiants->user->sex == "masculin" ? 'checked' : '' }}>
                              <label class="form-check-label" for="masculin">
                                Masculin
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="sex" id="feminin" value="feminin" {{ $etudiants->user->sex == "feminin" ? 'checked' : '' }}>
                              <label class="form-check-label" for="feminin">
                                Feminin
                              </label>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                      <div class="row mb-3">
                        {{-- <label class="col-sm-2 col-form-label">Selectionner un niveau</label>
                        <div class="col-sm-10">
                          <select class="form-select" aria-label="Default select example">
                            @foreach($niveaux as $niveau) --}}
                            {{-- <option value="{{$niveau->codeNiveau}}">{{$niveau->codeNiveau}}</option> --}}
                            {{-- @endforeach
                          </select>
                        </div>
                      </div> --}}
                      <div class="col-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" value="{{$etudiants->user->email}}" class="form-control" id="email" required>
                        <div class="invalid-feedback">Veuillez entrer votre adresse email</div>
                      </div>
                      <div class="col-6">
                        <label for="telephone" class="form-label">Telephone</label>
                        <input type="text" name="phone" value="{{$etudiants->user->phone}}" class="form-control" id="telephone" required>
                        <div class="invalid-feedback">Veuillez entrer votre numero de telephone</div>
                      </div>
                      {{-- <div class="col-12">
                        <label for="login" class="form-label">Login</label>
                        <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend">@</span> --}}
                          {{-- <input type="text" name="login"  value="{{$etudiants->login}}"  class="form-control" id="login" required> --}}
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