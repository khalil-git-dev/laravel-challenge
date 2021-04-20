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
    {{-- <div class="row float-right">
        <div class="form-group mr-3 float-right">
            <select class="form-control" name="classe">
                <option value="">*** Filtrer par classe *** </option>
                @foreach ($classes as $classe)
                    <option value="{{$classe->id}}"> {{ $classe->code }} </option>      
                @endforeach
            </select>
        </div>
        <div>
            <a href="{{ route('etudiants.index', $classe->id) }}" class="btn btn-primary btn-floating  mr-1"><i class="fa fa-search"></i> Filtrer</a>
        </div>
    </div> --}}

<div class="affichage mt-2 mb-2">
    <h3>Liste des étudiants</h3>
</div>
<a href="{{  route('etudiants.create') }}" class="float-right btn btn-outline-success mt-2 mb-2">Ajouter un étudiant</a>
                     
<div class="table-liste mt-3">
<table class="table table-bordered ">
    <thead>
      <tr>
        <th scope="col">N°</th>
        <th scope="col"> Profil</th>
        <th scope="col">Matricule</th>
        <th scope="col">Nom complet </th>
        {{-- <th scope="col">Age</th> --}}
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
                <td><img src="{{ $etudiant->avatarUser() }}" class="rounded" alt="i" width="40" height="40"></td>
                <td>{{ $etudiant->matricule }}</td>
                <td>{{ $etudiant->prenom ." ". $etudiant->nom }}</td>
                {{-- <td>{{ $etudiant->age }}</td> --}}
                <td>{{ $etudiant->telephone }}</td>
                <td>{{ $etudiant->classe->code }}</td>
                <td>{{ $etudiant->classe->universite->code }}</td>
                <td>
                    <div class="row ml-1">
                    <a href="{{ route('etudiants.show', $etudiant->id) }}" class="btn btn-primary btn-floating  mr-1"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-primary btn-floating  mr-1"><i class="fa fa-edit"></i></a>
                    <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-floating mr-1"><i class="fa fa-trash"></i></button>
                    </form>
                    </div>
                </td>
            </tr>
        @endforeach
      </tbody>
  </table>
</div>
    
@endsection
