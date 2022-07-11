@extends('layouts.mainlayout')

@section('content')

<div class="pagetitle">
  <h1>Modification d'un niveau</h1>
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
            <h5 class="card-title text-center pb-0 fs-4">Modification d'un niveau</h5>
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

          <form class="row g-3 needs-validation" novalidate id="email-form"  action="{{ route('niveaux.update',$niveau) }}"  method="POST">
            @csrf
            @method('put')
            <div class="col-12">
              <label for="codeFiliere" class="form-label">Code Niveau</label>
              <input type="text" name="codeNiveau" class="form-control" id="codeFiliere" required value="{{$niveau->codeNiveau}}">
              <div class="invalid-feedback">Veuillez entrer le code du niveau</div>
            </div>
            <div class="col-12">
              <label for="intitule" class="form-label">Intitule</label>
              <input type="text" name="intitule" class="form-control" id="intitule" required value="{{$niveau->intitule}}">
              <div class="invalid-feedback">Veuillez entrer l'intitule</div>
            </div>

              <div class="col-12">
                <label class="form-label"> Filiere</label>
                   <select class="form-select" aria-label="Default select example" name="filiere_id">
                     <option value="{{$niveau->filiere->id}}" selected>{{$niveau->filiere->intitule}}</option>
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




