@extends('layouts.mainlayout')

@section('content')
<body>

	<form method="post" action="/export-excel">
	@csrf


		<input type="text" name="idProf"  hidden value="{{ auth()->user()->id }}">


		<label for="matiere">Matiere : </label>
		<select name="matiere" required>
                @foreach($matieres as $matiere)
                    <option> {{$matiere->intitule}} </option>
                @endforeach
        </select><br><br>

		<label for="debut">Date de Debut :</label>
		<input type="date" name="dateDebut" id="debut" required><br><br>

		<label for="fin">Date de Fin :</label>
		<input type="date" name="dateFin" id="fin" required><br><br>

		<input type="submit" name="Export" value="Exporter">

	</form> 

@endsection