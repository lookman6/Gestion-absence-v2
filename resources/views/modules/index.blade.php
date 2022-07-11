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
              <h5 class="card-title">Liste des modules</h5>
              <!-- Table with stripped rows -->
              @if($message = Session::get('success'))
                <p style="color: green">{{$message}}</p>
                <br/>
              @endif
              <a href="{{ route('modules.create') }}"><button type="button" class="btn btn-primary">Nouvelle module</button></a>
              <table class="table datatable">
                <br/><br/>
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">code module</th>
                    <th scope="col">intitulé</th>
                    <th scope="col">semestre</th>
                    <th scope="col">responsable module</th>
                    <th scope="col">Options</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($modules as $module)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $module->codeModule }}</td>
                        <td>{{ $module->intitule}}</td>
                        <td>{{ $module->semestre }}</td>
                        <td>{{ $module->professeur->user->lastname }}</td>
                        <td>
                        <a href="{{ route('modules.edit',$module) }}" title="Edit module"><button type="button" class="btn btn-info btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></button></a>
                         <a href="{{ route('modules.delete',$module) }}" title="supprimer"><button type="button"  title="Delete" class="btn btn-danger btn-sm js-sweetalert" data-type="confirm" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="bi bi-trash"></i></button></a>
                            
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

