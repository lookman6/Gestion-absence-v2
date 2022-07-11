@extends('layouts.mainlayout')

@section('content')
<div class="pagetitle">
      <h1>Listes des filières</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('index')}}">Accueil</a></li>
          <li class="breadcrumb-item">Filières</li>
          <li class="breadcrumb-item active">Liste</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Liste des filières</h5>
              <!-- Table with stripped rows -->
              @if($message = Session::get('success'))
                <p style="color: green">{{$message}}</p>
                <br/>
              @endif
              <a href="{{ route('filieres.create') }}"><button type="button" class="btn btn-primary">Nouvelle filiere</button></a>
              <table class="table datatable">
                <br/><br/>
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">code filière</th>
                    <th scope="col">Intitule</th>
                    <th scope="col">responsable filière</th>
                    <th scope="col">Options</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($filieres as $filiere)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $filiere->codeFiliere }}</td>
                        <td>{{ $filiere->intitule }}</td>
                        <td>{{ $filiere->professeur->user->lastname}}</td>
                        <td>
                            <a href="{{ route('filieres.edit',$filiere) }}" title="Edit filiere"><button type="button" class="btn btn-info btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></button></a>

                         <a href="{{ route('filieres.delete',$filiere->id) }}" title="supprimer"><button type="button"  title="Delete" class="btn btn-danger btn-sm js-sweetalert" data-type="confirm" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="bi bi-trash"></i></button></a>
                             

                        </td>
                    </tr>
                @endforeach 
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
@endsection

