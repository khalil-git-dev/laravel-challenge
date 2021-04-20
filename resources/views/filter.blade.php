@extends('parents.master')

@section('contenu')

<p>
    {{-- Message a afficher apres ajout  --}}
    @if(session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
    @endif
    {{-- Message a afficher apres suppression  --}}
    @if(session('messageDelete'))
    <div class="alert alert-danger" role="alert">
        {{ session('messageDelete') }}
    </div>
    @endif
</p>

<div class="affichage mt-4  mb-3 float-right">
    <select class="form" name="classe" id="">
        <option value="classe">cl1 </option>
    </select>
</div>

<div class="affichage mt-2 mb-2">
    <h3>Liste des étudiants</h3>
</div>

<div class="table-liste mt-3">
<table class="table table-bordered ">
    <thead>
      <tr>
        <th scope="col">N°</th>
        <th scope="col">Matricule</th>
        <th scope="col">Nom complet </th>
        <th scope="col">Age</th>
        <th scope="col">Téléphone</th>
        <th scope="col">Classe</th>
        <th scope="col">Université</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($etudiants as $key => $etudiant) 
            <tr>
            <th scope="row">{{ $key +1 }}</th>
                <td>{{ $etudiant->matricule }}</td>
                <td>{{ $etudiant->prenom ." ". $etudiant->nom }}</td>
                <td>{{ $etudiant->age }}</td>
                <td>{{ $etudiant->telephone }}</td>
                <td>{{ $etudiant->classe->code }}</td>
                <td>{{ $etudiant->classe->universite->code }}</td>
                <td>
                    <div class="row ml-2">
                    <a href="{{ route('etudiants.show', $etudiant->id) }}" class="btn btn-primary btn-floating  mr-1"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-primary btn-floating  mr-1"><i class="fa fa-edit"></i></a>
                    <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-floating"><i class="fa fa-trash"></i></button>
                    </form>
                    </div>
                </td>
            </tr>
        @endforeach
      </tbody>
  </table>
</div>
    
@endsection
