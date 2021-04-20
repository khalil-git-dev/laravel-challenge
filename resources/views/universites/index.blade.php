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
    <h3>Liste des universites</h3>
</div>
<a href="{{  route('universites.create') }}" class="float-right btn btn-outline-success mt-2 mb-2">Ajouter une universite</a>
 
<div class="table-liste mt-3">
<table class="table table-bordered ">
    <thead>
      <tr>
        <th scope="col">N°</th>
        <th scope="col">Sigle </th>
        <th scope="col">Nom université</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($universites as $key => $universite) 
            <tr>
            <th scope="row">{{ $key +1 }}</th>
                <td>{{ $universite->code }}</td>
                <td>{{ $universite->nom }}</td>
                <td>
                    <div class="row ml-2">
                        <a href="{{ route('universites.show', $universite->id) }}" class="btn btn-primary btn-floating mr-1"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('universites.edit', $universite->id) }}" class="btn btn-primary btn-floating  mr-1"><i class="fa fa-edit"></i></a>
                        <form action="{{ route('universites.destroy', $universite->id) }}" method="POST">
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
