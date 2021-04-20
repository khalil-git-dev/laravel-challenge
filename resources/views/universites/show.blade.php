@extends('parents.master')

@section('contenu')

    <div class="form m-5">

        <h3>{{ $universite->code }}</h3>
        <h5>{{ $universite->nom }}</h5>
        <p>{{ $universite->adresse }}</p>
        
    </div>
    

@endsection