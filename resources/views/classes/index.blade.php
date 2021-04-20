@extends('parents.master')

@section('contenu')

<p>
    @if(session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
    @endif

    @if(session('messageDelete'))
    <div class="alert alert-danger" role="alert">
        {{ session('messageDelete') }}
    </div>
    @endif
</p>

<div class="affichage mt-3">
    <h3>Liste des classes</h3>
</div>
<a href="{{  route('classes.create') }}" class="float-right btn btn-outline-success mt-2 mb-2">Ajouter une classe</a>
 
<div class="table-liste mt-3">
<table class="table table-bordered ">
    <thead>
      <tr>
        <th scope="col">N°</th>
        <th scope="col">Code classe </th>
        <th scope="col">Nom Classe</th>
        <th scope="col">Université</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($classes as $key => $classe) 
            <tr>
            <th scope="row">{{ $key +1 }}</th>
                <td>{{ $classe->code }}</td>
                <td>{{ $classe->libelle }}</td>
                <td>{{ $classe->universite->code }}</td>
                <td>
                    <div class="row ml-2">
                    <a href="{{ route('classes.show', $classe->id) }}" class="btn btn-primary btn-floating  mr-1"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('classes.edit', $classe->id) }}" class="btn btn-primary btn-floating  mr-1"><i class="fa fa-edit"></i></a>
                    <form action="{{ route('classes.destroy', $classe->id) }}" method="POST">
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
