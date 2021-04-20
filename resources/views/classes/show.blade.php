@extends('parents.master')

@section('contenu')

    <div class="form m-5">

        <h3>{{ $classe->code }}</h3>
        <h5>{{ $classe->libelle }}</h5>
        <p>{{ $classe->universite->code ." ".$classe->universite->nom }}</p>
        
    </div>
    

@endsection