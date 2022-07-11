@extends('layouts.mainlayout')

@section('content')
<div class="pagetitle">
      <h1>Listes des matières</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('index')}}">Accueil</a></li>
          <li class="breadcrumb-item">Matières</li>
          <li class="breadcrumb-item active">Liste</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Liste des niveaus</h5>
              <!-- Table with stripped rows -->
              @if($message = Session::get('success'))
                <p style="color: green">{{$message}}</p>
                <br/>
              @endif
              <a href="{{ route('niveaux.create') }}"><button type="button" class="btn btn-primary">Nouveau niveau</button></a>
              <table class="table datatable">
                <br/><br/>
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">code niveau</th>
                    <th scope="col">intitulé</th>
                    <th scope="col">filière</th>
                    <th scope="col">Options</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($niveaux as $niveau)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $niveau->codeNiveau }}</td>
                        <td>{{ $niveau->intitule}}</td>
                        <td>{{ $niveau->filiere->codeFiliere}}</td>
                        <td>
                        <a href="{{route('niveaux.edit',$niveau) }}" title="Edit niveau"><button type="button" class="btn btn-info btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></button></a>
                         <a href="{{route('niveaux.delete',$niveau) }}" title="supprimer"><button type="button"  title="Delete" class="btn btn-danger btn-sm js-sweetalert" data-type="confirm" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="bi bi-trash"></i></button></a>
                            
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



