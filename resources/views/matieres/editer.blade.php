{{-- @extends('layouts.mainlayout')

@section('content')
    <div>
    <h1>Modification</h1>
    <form id="email-form"  action="{{ route('matieres.update',$matiere) }}"  method="POST">
            @csrf
            @method('put')
            <div class="div-block-11">
              <h3 class="heading-5">Editer</h3>
              <div class="html-embed w-embed">
                <hr style="display: block; height: 1px; border: 0; border-top: 1.5px solid black; margin: 0 0; padding: 0;">
              </div>
              
              <label for="codeMatiere">code Matière</label>
              <input type="text" class="text-field-4 w-input" value="{{$matiere->codeMatiere}}" maxlength="256" name="codeMatiere"  placeholder="Entrez le codeMatiere" id="codeMatiere">
               <br> <label for="intitule">intitule</label>
              <input type="text" value="{{$matiere->intitule}}" class="text-field-5 w-input" maxlength="256" name="intitule"  placeholder="Entrez l'intitulé du module" id="intitule">
              <br>

              <label for="responsableMatiere">responsableMatiere</label>
              <select name="responsableMatiere" id="">
                <option value="{{$matiere->responsableMatiere}}"></option>
                @foreach($profs as $prof)
                    <option> {{$prof->user->lastname}} </option>
                @endforeach
              </select>
              <input type="text" value="{{$matiere->responsableMatiere}}" class="text-field-5 w-input" maxlength="256" name="responsableMatiere"  placeholder="Entrez le responsableMatiere" id="responsableMatiere">
              <br>
              <label for="filiereId">module</label>
              <select name="moduleIntitule">
                <option value="{{$matiere->module->id}}"> {{$matiere->module->intitule}} </option>
                @foreach($modules as $module)
                    <option> {{$module->intitule}} </option>
                @endforeach
              </select>
            
            </div>
            <div class="div-block-12"> <button type="submit" class="btn btn-primary"> Modifier</button></div>
        </form>
    </div>
@endsection --}}


@extends('layouts.mainlayout')

@section('content')
   <div class="pagetitle">
    <h1>Modification Matiere</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('index')}}">Accueil</a></li>
        <li class="breadcrumb-item">Matieres</li>
        <li class="breadcrumb-item active">Modifier matiere</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


  <section class="section">
    <div class="row">
      <div class="col-lg-6 center" >

        <div class="card">
          <div class="card-body">
            
            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 fs-4">Modification d'une nouvelle matiere</h5>
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

            <form class="row g-3 needs-validation" novalidate id="email-form"  action="{{ route('matieres.update',$matiere) }}"  method="POST">
              @csrf
              @method('put')
              {{-- <div class="col-12">
                <label for="codeFiliere" class="form-label">Code Matiere</label>
                <input type="text" value="{{$matiere->codeMatiere}}" name="codeMatiere" class="form-control" id="codeFiliere" required>
                <div class="invalid-feedback">Veuillez entrer le code de la matiere</div>
              </div> --}}
              <div class="col-12">
                <label for="intitule" class="form-label">Intitule</label>
                <input type="text" value="{{$matiere->intitule}}" name="intitule" class="form-control" id="intitule" required>
                <div class="invalid-feedback">Veuillez entrer l'intitule</div>
              </div>

              <div class="col-12">
                <label class="form-label"> Module</label>
                   <select class="form-select" aria-label="Default select example" name="module_id">
                     <option value="{{$matiere->module->id}}" selected>{{$matiere->module->intitule}}</option>
                     @foreach($modules as $module)
                        <option value="{{$module->id}}"> {{$module->intitule}} </option>
                     @endforeach
                   </select>
                </div>

              <div class="col-12">
              <label class="form-label">Responsable Matiere</label>
                 <select class="form-select" aria-label="Default select example" name="responsableMatiere">
                   <option selected value="{{$matiere->professeur->id}}">{{$matiere->professeur->user->lastname}}</option>
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



