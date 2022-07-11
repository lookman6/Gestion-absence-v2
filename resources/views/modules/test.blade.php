@extends('layouts.mainlayout')

@section('content')
    <div>
    <h1>Modification</h1>
    <form id="email-form"  action="{{ route('modules.store') }}"  method="POST">
            @csrf
            <div class="div-block-11">
              <h3 class="heading-5">Editer</h3>
              <div class="html-embed w-embed">
                <hr style="display: block; height: 1px; border: 0; border-top: 1.5px solid black; margin: 0 0; padding: 0;">
              </div>
              <label for="codeModule">code Module</label>
              <input type="text" class="text-field-4 w-input"  maxlength="256" name="codeModule"  placeholder="Entrez le codeModule" id="codeModule">
               <br> <label for="intitule">intitule</label>
              <input type="text"  class="text-field-5 w-input" maxlength="256" name="intitule"  placeholder="Entrez l'intitulé du module" id="intitule">
              <br>

              <label for="responsableModule">responsableModule</label>
              <input type="text"  class="text-field-5 w-input" maxlength="256" name="responsableModule"  placeholder="Entrez le responsableModule" id="responsableModule">
              <br>

              <label for="semestre">semestre</label>
              <input type="text"  class="text-field-5 w-input" maxlength="256" name="semestre"  placeholder="Entrez le semestre" id="semestre">
              <br>
              <label for="filiereId">module</label>
              <select name="moduleIntitule">
                @foreach($filieres as $filiere)
                    <option> {{$filiere->codeFiliere}} </option>
                @endforeach
              </select>
            
            </div>
            <div class="div-block-12"> <button type="submit" class="btn btn-primary"> Créer</button></div>
        </form>
    </div>


@endsection

