@extends('layouts.mainlayout')

@section('content')
    {{-- <div>
    <h1>Modification</h1>
    <form id="email-form"  action="{{ route('niveaux.store') }}"  method="POST">
            @csrf
            <div class="div-block-11">
              <h3 class="heading-5">Editer</h3>
              <div class="html-embed w-embed">
                <hr style="display: block; height: 1px; border: 0; border-top: 1.5px solid black; margin: 0 0; padding: 0;">
              </div>
              <label for="codeNiveau">code Niveau</label>
              <input type="text" class="text-field-4 w-input"  maxlength="256" name="codeNiveau"  placeholder="Entrez le codeNiveau" id="codeNiveau">
               <br> <label for="intitule">intitule</label>
              <input type="text"  class="text-field-5 w-input" maxlength="256" name="intitule"  placeholder="Entrez l'intitulé du module" id="intitule">
              <br>
              <label for="filiereId">module</label>
              <select name="filiereIntitule">
                @foreach($filieres as $filiere)
                    <option> {{$filiere->codeFiliere}} </option>
                @endforeach
              </select>
            
            </div>
            <div class="div-block-12"> <button type="submit" class="btn btn-primary"> Créer</button></div>
        </form>
    </div> --}}


    <div class="pagetitle">
      <h1>creation d'un niveau</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('index')}}">Accueil</a></li>
          <li class="breadcrumb-item">Nivaux</li>
          <li class="breadcrumb-item active">Nouveau niveau</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section">
      <div class="row">
        <div class="col-lg-6 center" >

          <div class="card">
            <div class="card-body">
              
              <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Creation d'un niveau</h5>
                <p class="text-center small">Entrer les informations du niveau</p>
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

              <form class="row g-3 needs-validation" novalidate id="email-form"  action="{{ route('niveaux.store') }}"  method="POST">
                @csrf
                <div class="col-12">
                  <label for="codeFiliere" class="form-label">Code Niveau</label>
                  <input type="text" name="codeNiveau" class="form-control" id="codeFiliere" required>
                  <div class="invalid-feedback">Veuillez entrer le code du niveau</div>
                </div>
                <div class="col-12">
                  <label for="intitule" class="form-label">Intitule</label>
                  <input type="text" name="intitule" class="form-control" id="intitule" required>
                  <div class="invalid-feedback">Veuillez entrer l'intitule</div>
                </div>

                  <div class="col-12">
                    <label class="form-label"> Filiere</label>
                       <select class="form-select" aria-label="Default select example" name="filiere_id">
                         <option selected>Choisissez</option>
                         @foreach($filieres as $filiere)
                            <option value="{{$filiere->id}}"> {{$filiere->intitule}} </option>
                         @endforeach
                       </select>
                    </div>

                <div class="col-12">
                  <button class="btn btn-primary w-100" type="submit">Enregistrer</button>
                </div>
              </form>
    <section>

@endsection