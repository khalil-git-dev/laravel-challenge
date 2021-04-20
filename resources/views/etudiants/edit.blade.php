@extends('parents.master')
@section('contenu')
    
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                @if (!empty($etudiant->avatarUser()))
                    <img class="rounded-circle mt-5" alt="avatar etudiant" src="{{ $etudiant->avatarUser() }}">                   
                @else
                    <img class="rounded-circle mt-5" src="{{ asset('images/defaultAvatar.png') }}">                   
                @endif
            <h3 class="font-weight-bold">{{ $etudiant->matricule }}</h3>
                
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-3">
                <div class="d-flex justify-content-between ">
                    <h4 class="text-right">Modifier étudiant</h4>
                </div>
                <form action="{{ route('etudiants.update', $etudiant->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Prénom</label>
                        <input type="text" name="prenom" value="{{ $etudiant->prenom }}" class="form-control"  placeholder="Votre prenom">
                        @error('prenom')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Nom</label>
                        <input type="text" name="nom" class="form-control" value="{{ $etudiant->nom }}" placeholder="Votre nom">
                        @error('nom')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Téléphone</label>
                        <input type="number" name="telephone" value="{{ $etudiant->telephone }}" class="form-control" placeholder="Votre numéro de téléphone">
                        @error('telephone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Adresse email</label>
                        <input type="email" name="email" value="{{ $etudiant->email }}" class="form-control" placeholder="Votre adresse email">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Age</label>
                        <input type="number" name="age" value="{{ $etudiant->age }}" class="form-control" placeholder="Votre age">
                        @error('age')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="col-md-12">
                        <label class="labels">Classe</label>
                        <select name="classe_id" class="form-control">
                            <option value="{{ $etudiant->classe->id }}">{{ $etudiant->classe->code ." : ".$etudiant->classe->libelle }}</option>
                            @foreach ($classes as $classe)
                                @if ($etudiant->classe->id != $classe->id)
                                    <option value="{{ $classe->id }}"> {{ $classe->code ." : ". $classe->libelle }}</option>     
                                @endif
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
                    <button class="btn btn-primary profile-button" type="submit">Modifier
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