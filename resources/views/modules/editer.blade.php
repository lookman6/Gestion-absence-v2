@extends('layouts.mainlayout')

@section('content')

    <div class="pagetitle">
      <h1>Nouveau Module</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('index')}}">Accueil</a></li>
          <li class="breadcrumb-item">Nodules</li>
          <li class="breadcrumb-item active">Nouvelle module</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section">
      <div class="row">
        <div class="col-lg-6 center" >

          <div class="card">
            <div class="card-body">
              
              <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Modification d'un module</h5>
                <p class="text-center small">Entrer les informations du module</p>
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

              <form class="row g-3 needs-validation" novalidate id="email-form"  action="{{ route('modules.update',$module) }}"   method="POST">
                @csrf
                @method('put')
                <div class="col-12">
                  <label for="codeModule" class="form-label">Code Module</label>
                  <input type="text" name="codeModule" class="form-control" id="codeModule" required value="{{$module->codeModule}}">
                  <div class="invalid-feedback">Veuillez entrer le code du module</div>
                </div>
                <div class="col-12">
                  <label for="intitule" class="form-label">Intitule</label>
                  <input type="text" name="intitule" class="form-control" id="intitule" required value="{{$module->intitule}}">
                  <div class="invalid-feedback">Veuillez entrer l'intitule</div>
                </div>

                <div class="col-12">
                  <label class="form-label">Niveau</label>
                     <select class="form-select" aria-label="Default select example" name="niveaux_id">
                       <option value="{{$module->level->id}}"> {{$module->level->intitule}} </option>
                       @foreach($nivaux as $niveau)
                          <option value="{{$niveau->id}}"> {{$niveau->intitule}} </option>
                       @endforeach
                     </select>
                  </div>

                <div class="col-12">
                  <label class="form-label">Semestre</label>
                     <select class="form-select" aria-label="Default select example" name="semestre">
                       <option >Choisissez</option>
                       <option value="{{$module->semestre}}" selected>{{$module->semestre}}</option>
                       <option value="1">1</option>
                       <option value="2">2</option>
                       <option value="3">3</option>
                       <option value="4">4</option>
                       <option value="5">5</option>
                     </select>
                  </div>

                <div class="col-12">
                <label class="form-label">Responsable Module</label>
                   <select class="form-select" aria-label="Default select example" name="responsableModule">
                     <option value="{{$module->professeur->id}}" selected> {{$module->professeur->user->lastname}} </option>
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
