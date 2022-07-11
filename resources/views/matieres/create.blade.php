@extends('layouts.mainlayout')

@section('content')
   <div class="pagetitle">
    <h1>Nouveau Matiere</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('index')}}">Accueil</a></li>
        <li class="breadcrumb-item">Matieres</li>
        <li class="breadcrumb-item active">Nouvelle matiere</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


  <section class="section">
    <div class="row">
      <div class="col-lg-6 center" >

        <div class="card">
          <div class="card-body">
            
            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 fs-4">Creation d'une matiere</h5>
              <p class="text-center small">Informations relatives a la matiere</p>
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

            <form class="row g-3 needs-validation" novalidate id="email-form"  action="{{ route('matieres.store') }}"  method="POST">
              @csrf
              {{-- <div class="col-12">
                <label for="codeFiliere" class="form-label">Code Matiere</label>
                <input type="text" name="codeMatiere" class="form-control" id="codeFiliere" required>
                <div class="invalid-feedback">Veuillez entrer le code de la matiere</div>
              </div> --}}
              <div class="col-12">
                <label for="intitule" class="form-label">Intitule</label>
                <input type="text" name="intitule" class="form-control" id="intitule" required>
                <div class="invalid-feedback">Veuillez entrer l'intitule</div>
              </div>

              <div class="col-12">
                <label class="form-label"> Module</label>
                   <select class="form-select" aria-label="Default select example" name="module_id">
                     <option selected>Choisissez</option>
                     @foreach($modules as $module)
                        <option value="{{$module->id}}"> {{$module->intitule}} </option>
                     @endforeach
                   </select>
                </div>

              <div class="col-12">
              <label class="form-label">Responsable Matiere</label>
                 <select class="form-select" aria-label="Default select example" name="responsableMatiere">
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



@endsection

