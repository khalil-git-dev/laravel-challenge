@extends('parents.master')

@section('contenu')
    <div class="row mt-5">
        
    
        
        <div class="col-lg-7">
            <form action="{{ route('universites.store') }}" method="post">
                @csrf 
                <div>
                    <h3> Ajouter une université</h3>
                </div>   
                <div class="form-group mt-5">
                    <label for="exampleInputText1">Sigle</label>
                    <input type="text" value="{{ old('code') }}" name="code" class="form-control @error('code') is-invalid @enderror"  placeholder="Enter le sigle de l'université">
                    @error('code')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror    
                </div>
                <div class="form-group">
                    <label for="exampleInputText1">Libelle Université</label>
                    <input type="text" value="{{ old('nom') }}"  name="nom" class="form-control @error('nom') is-invalid @enderror" placeholder="Libelle Université">
                    @error('nom')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror 
                </div>
                <div class="form-group">
                    <label for="exampleInputText1">Adresse Université</label>
                    <textarea name="adresse" class="form-control @error('adresse') is-invalid @enderror" cols="30" rows="3"> {{ old('adresse') }} </textarea>                
                    @error('adresse')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <input type="submit" value="Enregistrer" class="btn btn-primary btn-block mt-5">
            </form>

        </div>
        <div class="col-lg-3 m-5">
            <img src="{{asset("images/graduation.jpg")}}" alt="université image">
        </div>        

    </div>

@endsection
