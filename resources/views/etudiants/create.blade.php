@extends('parents.master')
@section('contenu')
    
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" src="{{ asset('images/defaultAvatar.png') }}">
            {{-- <h3 class="font-weight-bold">{{ "QQ5" }}</h3>
                 --}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-3">
                <div class="d-flex justify-content-between ">
                    <h4 class="text-right">Ajouter un étudiant</h4>
                </div>
                <form action="{{ route('etudiants.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Prénom</label>
                        <input type="text" name="prenom" value="{{ old('prenom') }}" class="form-control"  placeholder="Votre prenom">
                        @error('prenom')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Nom</label>
                        <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" placeholder="Votre nom">
                        @error('nom')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Téléphone</label>
                        <input type="number" name="telephone" value="{{ old('telephone') }}" class="form-control" placeholder="Votre numéro de téléphone">
                        @error('telephone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Adresse email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Votre adresse email">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Age</label>
                        <input type="number" name="age" value="{{ old('age') }}" class="form-control" placeholder="Votre age">
                        @error('age')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="col-md-12">
                        <label class="labels">Classe</label>
                        <select name="classe_id" class="form-control">
                            <option value="">*** Choisisr une classe ***</option>
                            @foreach ($classes as $classe)
                                <option value="{{ $classe->id }}"> {{ $classe->code ." : ". $classe->libelle }}</option>   
                            @endforeach
                        </select>
                        @error('classe_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 mt-3">
                        <input class="labels" type="file" name="avatar" >
                        @error('avatar')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                
                <div class="mt-5 text-center">
                    <button class="btn btn-success profile-button" type="submit">Enregister
                    </button>
                    
                </div>
            </form>
            </div>
        </div>
        
    </div>
</div>
</div>
</div>

@endsection