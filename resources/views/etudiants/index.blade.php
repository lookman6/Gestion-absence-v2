@extends('layouts.mainlayout')

@section('content')
    <div class="pagetitle">
      <h1>Listes des étudiants</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('index')}}">Accueil</a></li>
          <li class="breadcrumb-item">Etudiants</li>
          <li class="breadcrumb-item active">Liste</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Liste des étudiants</h5>
              <!-- Table with stripped rows -->
              @if($message = Session::get('success'))
                <p style="color: green">{{$message}}</p>
                <br/>
              @endif
              <table>
                <tr>

                  <td>

                    <a href="{{ route('etudiants.create') }}"><button type="button" class="btn btn-primary">Nouvel étudiant</button></a>

                  </td>

                  <td>

                  </td>

                  <td>

                    <form action="{{ route('etudiant.import') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <input type="file" name="etudiantFile" accept=".xlsx,.xls,.csv" required>
                      <input type="submit" value="Upload data">
                    </form>

                  </td>

              </tr>
              </table>              <table class="table datatable">
                <br/><br/>
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">CNE</th>
                    <th scope="col">Code Apogé</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Options</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($etudiants as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->cne }}</td>
                        <td>{{ $item->codeApoge }}</td>
                        <td>{{ $item->user->lastname }}</td>
                        <td>{{ $item->user->firstname }}</td>
                        <td>{{ $item->user->email }}</td>
                        <td>{{ $item->user->phone }}</td>
                        <td>
                            <a href="{{ route('etudiants.show',$item->id) }}" title="View Student"><button type="button" class="btn btn-light btn-sm" title="View"><i class="bi bi-eye"></i></button></a>
                            <a href="{{ route('etudiants.edit',$item->id) }}" title="Edit Student"><button type="button" class="btn btn-info btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></button></a>

                            <form method="POST" action="{{ route('etudiants.destroy',$item->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm js-sweetalert" title="Delete" data-type="confirm" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="bi bi-trash"></i></button>
                            </form>
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
