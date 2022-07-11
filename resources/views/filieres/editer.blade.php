@extends('layouts.mainlayout')

@section('content')
    <h1>Ajouter filière</h1>

          <div class="pagetitle">
            <h1>Nouvelle filiere</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('index')}}">Accueil</a></li>
                <li class="breadcrumb-item">Filieres</li>
                <li class="breadcrumb-item active">Nouvelle filiere</li>
              </ol>
            </nav>
          </div><!-- End Page Title -->
      
      
          <section class="section">
            <div class="row">
              <div class="col-lg-6 center" >
      
                <div class="card">
                  <div class="card-body">
                    
                    <div class="pt-4 pb-2">
                      <h5 class="card-title text-center pb-0 fs-4">Edition d'une filiere</h5>
                      <p class="text-center small">Entrer les informations de la filiere</p>
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
      
                    <form class="row g-3 needs-validation" novalidate id="email-form"  action="{{ route('filieres.update',$filiere) }}"  method="POST">
                      @csrf
                      @method('put')
                      <div class="col-12">
                        <label for="codeFiliere" class="form-label">Code Filiere</label>
                        <input type="text" name="codeFiliere" class="form-control" id="codeFiliere" required value="{{$filiere->codeFiliere}}">
                        <div class="invalid-feedback">Veuillez entrer le code de la filiere</div>
                      </div>
                      <div class="col-12">
                        <label for="intitule" class="form-label">Intitule</label>
                        <input type="text" name="intitule" class="form-control" id="intitule" required value="{{$filiere->intitule}}">
                        <div class="invalid-feedback">Veuillez entrer l'intitule</div>
                      </div>
      
                      <div class="col-12">
                      <label class="form-label">Responsable Filiere</label>
                         <select class="form-select" aria-label="Default select example" name="responsableFiliere">
                           <option value="{{$filiere->professeur->id}}">{{$filiere->professeur->user->lastname}}</option>
                           @foreach($profs as $prof)
                              <option value="{{$prof->id}}"> {{$prof->user->lastname}} </option>
                           @endforeach
                         </select>
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