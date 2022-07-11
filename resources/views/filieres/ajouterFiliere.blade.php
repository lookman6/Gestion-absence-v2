@extends('layouts.mainlayout')

@section('content')
    {{-- <h1>Ajouter filière</h1>
    <form id="email-form"  action="{{ route('filieres.store') }}"  method="POST">
            @csrf
            <div class="div-block-11">
              <h3 class="heading-5">Informations relatives à la filière</h3>
              <div class="html-embed w-embed">
                <hr style="display: block; height: 1px; border: 0; border-top: 1.5px solid black; margin: 0 0; padding: 0;">
              </div>
              <label for="codeFiliere">code Filière</label>
              <input type="text" class="text-field-4 w-input" maxlength="256" name="codeFiliere"  placeholder="Entrez le codeFiliere" id="codeFiliere">
              <label for="responsableFiliere">responsable Filiere</label>
              <input type="text" class="text-field-5 w-input" maxlength="256" name="responsableFiliere"  placeholder="Entrez le responsableFiliere" id="responsableFiliere">
            </div>
            <div class="div-block-12"> <button type="submit" class="btn btn-primary">
                                    créer
                                </button></div>
    </form> --}}
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
                <h5 class="card-title text-center pb-0 fs-4">Creation d'une filiere</h5>
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

              <form class="row g-3 needs-validation" novalidate id="email-form"  action="{{ route('filieres.store') }}"  method="POST">
                @csrf
                <div class="col-12">
                  <label for="codeFiliere" class="form-label">Code Filiere</label>
                  <input type="text" name="codeFiliere" class="form-control" id="codeFiliere" required>
                  <div class="invalid-feedback">Veuillez entrer le code de la filiere</div>
                </div>
                <div class="col-12">
                  <label for="intitule" class="form-label">Intitule</label>
                  <input type="text" name="intitule" class="form-control" id="intitule" required>
                  <div class="invalid-feedback">Veuillez entrer l'intitule</div>
                </div>

                <div class="col-12">
                <label class="form-label">Responsable Filiere</label>
                   <select class="form-select" aria-label="Default select example" name="responsableFiliere">
                     <option selected>Choisissez</option>
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