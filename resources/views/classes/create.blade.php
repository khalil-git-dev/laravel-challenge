@extends('parents.master')

@section('contenu')
    <div class="row mt-5">
        
    
        
        <div class="col-lg-7">
            <form action="{{ route('classes.store') }}" method="post">
                @csrf 
                
                <div>
                    <h3> Ajouter une classe</h3>
                </div>   
                <div class="form-group mt-5">
                    <label for="exampleInputText1">Code classe</label>
                    <input type="text" value="{{ old('code') }}" name="code" class="form-control @error('code') is-invalid @enderror"  placeholder="Enter le code de la classe">
                    @error('code')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror    
                </div>
                <div class="form-group">
                    <label for="exampleInputText1">Libelle classe</label>
                    <input type="text" value="{{ old('libelle') }}"  name="libelle" class="form-control @error('libelle') is-invalid @enderror" placeholder="Libelle la classe">
                    @error('libelle')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror 
                </div>
                <div class="form-group">
                    <label for="exampleInputText1">Université</label>
                    <select name="universite_id" class="form-control @error('universite_id') is-invalid @enderror">
                        <option value=""> Choisir une université </option>
                        @foreach ($universites as $universite)
                            <option value="{{ $universite->id }}"> {{ $universite->code ." ". $universite->nom }}</option>
                        @endforeach
                        
                    </select>
                    @error('universite_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <input type="submit" value="Enregistrer" class="btn btn-primary btn-block mt-5">
            </form>

        </div>
        <div class="col-lg-3">
            <img src="{{asset("images/graduation2.jpg")}}" height="400" width="400" alt="université image">
        </div>        

    </div>

@endsection
